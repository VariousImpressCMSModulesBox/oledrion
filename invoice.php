<?php
/**
 * ****************************************************************************
 * oledrion - MODULE FOR XOOPS
 * Copyright (c) Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         oledrion
 * @author 			Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * Version : $Id:
 * ****************************************************************************
 */

/**
 * Visualisation d'une facture � l'�cran
 */
require 'header.php';
$GLOBALS['current_category'] = -1;
$xoopsOption['template_main'] = 'oledrion_bill.html';
require_once ICMS_ROOT_PATH.'/header.php';

if(isset($_GET['id'])) {
	$cmdId = intval($_GET['id']);
} else {
	oledrion_utils::redirect(_OLEDRION_ERROR11,'index.php',6);
}

if(isset($_GET['pass'])) {
	$pass = $_GET['pass'];
} else {
	if(!oledrion_utils::isAdmin()) {
		oledrion_utils::redirect(_OLEDRION_ERROR11,'index.php',6);
	}
}

$order = null;
$order = $h_oledrion_commands->get($cmdId);
if(!is_object($order)) {
	oledrion_utils::redirect(_OLEDRION_ERROR11, 'index.php', 6);
}

// V�rification du mot de passe (si pas admin)
if(!oledrion_utils::isAdmin()) {
	if($pass != $order->getVar('cmd_password')) {
		oledrion_utils::redirect(_OLEDRION_ERROR11, 'index.php', 6);
	}
}

// V�rification de la validit� de la facture (si pas admin)
if(!oledrion_utils::isAdmin()) {
	if($order->getVar('cmd_state') != OLEDRION_STATE_VALIDATED) {	// Commande non valid�e
		oledrion_utils::redirect(_OLEDRION_ERROR12, 'index.php', 6);
	}
}

$caddy = $tmp = $products = $vats = $manufacturers = $tmp2 = $manufacturers = $productsManufacturers = array();

// R�cup�ration des TVA
$vats = $h_oledrion_vat->getAllVats(new oledrion_parameters());

// R�cup�ration des caddy associ�s
$caddy = $h_oledrion_caddy->getCaddyFromCommand($cmdId);
if(count($caddy) == 0) {
	oledrion_utils::redirect(_OLEDRION_ERROR11, 'index.php',6);
}

// R�cup�ration de la liste des produits associ�s
foreach($caddy as $item) {
    $tmp[] = $item->getVar('caddy_product_id');
}

// Recherche des produits ***********************************************************************************************
$products = $h_oledrion_products->getProductsFromIDs($tmp, true);

// Recherche des fabricants **********************************************************************************************
$tmp2 = $h_oledrion_productsmanu->getFromProductsIds($tmp);
$tmp = array();
foreach($tmp2 as $item) {
	$tmp[] = $item->getVar('pm_manu_id');
	$productsManufacturers[$item->getVar('pm_product_id')][] = $item;
}
$manufacturers = $h_oledrion_manufacturer->getManufacturersFromIds($tmp);

// Informations sur la commande ***************************************************************************************
$xoopsTpl->assign('order', $order->toArray());
$xoopsTpl->assign('ask_vatnumber', oledrion_utils::getModuleOption('ask_vatnumber'));

$handlers = oledrion_handler::getInstance();

// Boucle sur le caddy ************************************************************************************************
foreach($caddy as $itemCaddy) {
	$productForTemplate = $tblJoin = $productManufacturers = $productAttributes = array();
	$product = $products[$itemCaddy->getVar('caddy_product_id')];
	$productForTemplate = $product->toArray();	// Produit
	// Est-ce qu'il y a des attributs ?
	if($handlers->h_oledrion_caddy_attributes->getAttributesCountForCaddy($itemCaddy->getVar('caddy_id')) > 0) {
        $productAttributes = $handlers->h_oledrion_caddy_attributes->getFormatedAttributesForCaddy($itemCaddy->getVar('caddy_id'), $product);
	}
	$productForTemplate['product_attributes'] = $productAttributes;

	$productManufacturers = $productsManufacturers[$product->getVar('product_id')];
	foreach($productManufacturers as $oledrion_productsmanu) {
		if(isset($manufacturers[$oledrion_productsmanu->getVar('pm_manu_id')])) {
			$manufacturer = $manufacturers[$oledrion_productsmanu->getVar('pm_manu_id')];
			$tblJoin[] = $manufacturer->getVar('manu_commercialname').' '.$manufacturer->getVar('manu_name');
		}
	}
	if(count($tblJoin) > 0) {
		$productForTemplate['product_joined_manufacturers'] = implode(', ', $tblJoin);
	}
	$productForTemplate['product_caddy'] = $itemCaddy->toArray();
	$xoopsTpl->append('products', $productForTemplate);
}

oledrion_utils::setCSS();
$title = _OLEDRION_BILL.' - '.oledrion_utils::getModuleName();
oledrion_utils::setMetas($title, $title);
require_once ICMS_ROOT_PATH.'/footer.php';
?>