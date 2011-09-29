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
 * This block shows the products that were recently sold
 * @param array $options	[0] = Nombre maximum de produits à voir
 * @return array
 */
function b_oledrion_recentlysold_show($options)
{
	global $xoopsConfig, $xoopsTpl;
	require XOOPS_ROOT_PATH.'/modules/oledrion/include/common.php';
	$categoryId = 0;
	$start = 0;
	$limit = $options[0];
	$oledrion_shelf_parameters->resetDefaultValues()->setProductsType('recentlysold')->setStart($start)->setLimit($limit);
	$products = $oledrion_shelf->getProducts($oledrion_shelf_parameters);
	if(isset($products['lastTitle'])) {
		unset($products['lastTitle']);
	}
	if(count($products) > 0) {
		$url = OLEDRION_URL.'include/oledrion.css';
		$block = array();
		$block['nostock_msg'] = oledrion_utils::getModuleOption('nostock_msg');
		$block['block_products']= $products;
		$xoopsTpl->assign("xoops_module_header", "<link rel=\"stylesheet\" type=\"text/css\" href=\"$url\" />");
		return $block;
	} else {
		return false;
	}
}

/**
 * Edition des paramètres du blocs
 *
 * @param array $options	[0] = Nombre maximum de produits à voir
 * @return string
 */
function b_oledrion_recentlysold_edit($options)
{
	require XOOPS_ROOT_PATH.'/modules/oledrion/include/common.php';
	$form = '';
	$form .= "<table border='0'>";
	$form .= '<tr><td>'._MB_OLEDRION_PRODUCTS_CNT . "</td><td><input type='text' name='options[]' id='options' value='".$options[0]."' /></td></tr>";
	$form .= '</table>';
	return $form;
}

/**
 * Bloc à la volée
 * @param string $options
 * @return string
 */
function b_oledrion_recentlysold_duplicatable($options)
{
	$options = explode('|',$options);
	$block = & b_oledrion_bestsales_show($options);

	$tpl = new XoopsTpl();
	$tpl->assign('block', $block);
	$tpl->display('db:oledrion_block_recentlysold.html');
}
?>