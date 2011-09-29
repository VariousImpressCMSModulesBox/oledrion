<?php
/**
 * ****************************************************************************
 * oledrion - MODULE FOR XOOPS
 * Copyright (c) Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         oledrion
 * @author 			Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * Version : $Id:
 * ****************************************************************************
 */

/**
 * Script pour tout ce qui est relatif à Ajax et JSON
 *
 * @since 2.3.2009.03.17
 */
require_once 'header.php';
error_reporting(0);
@$xoopsLogger->activated = false;

$op = isset($_POST['op']) ? $_POST['op'] : '';
if($op =='') {
	$op = isset($_GET['op']) ? $_GET['op'] : '';
}
$return = '';
$uid = oledrion_utils::getCurrentUserID();
$isAdmin = oledrion_utils::isAdmin();


switch($op) {
	// ****************************************************************************************************************
	case 'updatePrice':	// Mise à jour du prix du produit en fonction des attributs sélectionnés
	// ****************************************************************************************************************
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
	    if(isset($_POST['formcontent']) && $product_id > 0) {
	        $data = $data = $attributesIds = $attributes = $templateProduct = array();
	        $handlers = oledrion_handler::getInstance();
	        $product = null;
	        $product = $handlers->h_oledrion_products->get($product_id);
	        if(!is_object($product)) {
	            return _OLEDRION_NA;
	        }
            if(!$product->isProductVisible()) {
                return _OLEDRION_NA;
            }
            $vat_id = $product->getVar('product_vat_id');

            if( intval($product->getVar('product_discount_price', '')) != 0 ) {
                $productPrice = floatval($product->getVar('product_discount_price', 'e'));
            } else {
                $productPrice = floatval($product->getVar('product_price', 'e'));
            }

            parse_str(utf8_decode(urldecode($_POST['formcontent'])), $data);
/*
            require_once 'FirePHPCore/FirePHP.class.php';
            $firephp = FirePHP::getInstance(true);
            $firephp->log($data, 'Iterators');
*/
            // On récupère les ID des attributs valorisés
            foreach($data as $key => $value) {
                $attributesIds[] = oledrion_utils::getId($key);
            }
            if(count($attributesIds) == 0) {
                return _OLEDRION_NA;
            }
            // Puis les attributs
            $attributes = $handlers->h_oledrion_attributes->getItemsFromIds($attributesIds);
            if(count($attributes) == 0) {
                return _OLEDRION_NA;
            }

            // Et on recalcule le prix
            foreach($attributes as $attribute) {
                $attributeNameInForm = xoops_trim($attribute->getVar('attribute_name').'_'.$attribute->getVar('attribute_id'));
                if(isset($data[$attributeNameInForm])) {
                    $attributeValues = $data[$attributeNameInForm];
                    if(is_array($attributeValues)) {
                        foreach($attributeValues as $attributeValue) {
                            $optionName = oledrion_utils::getName($attributeValue);
                            $optionPrice = $attribute->getOptionPriceFromValue($optionName);
                            $productPrice += $optionPrice;
                        }
                    } else {
                        $optionPrice = $attribute->getOptionPriceFromValue(oledrion_utils::getName($attributeValues));
                        $productPrice += $optionPrice;
                    }
                }
            }
            // Mise en template
			include_once XOOPS_ROOT_PATH.'/class/template.php';
			$template = new XoopsTpl();
            $vat = null;
            $vat = $handlers->h_oledrion_vat->get($vat_id);
            $productPriceTTC = oledrion_utils::getAmountWithVat($productPrice, $vat_id);

            $oledrion_Currency = oledrion_Currency::getInstance();

            $templateProduct = $product->toArray();
            $templateProduct['product_final_price_ht_formated_long'] = $oledrion_Currency->amountForDisplay($productPrice, 'l');
            $templateProduct['product_final_price_ttc_formated_long'] = $oledrion_Currency->amountForDisplay($productPriceTTC, 'l');
            if(is_object($vat)) {
                $templateProduct['product_vat_rate'] = $vat->toArray();
            }
            $templateProduct['product_vat_amount_formated_long'] = $oledrion_Currency->amountForDisplay($productPriceTTC - $productPrice, 'l');
            $template->assign('product', $templateProduct);
            $return = $template->fetch('db:oledrion_product_price.html');
        }
	    break;
}
echo utf8_encode($return);
?>