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
 * @copyright Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package oledrion
 * @author Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 *        
 *         Version : $Id:
 *         ****************************************************************************
 */

/**
 * Affiche les produits r�cents
 */
function b_oledrion_new_show($options) {
	// '10|0|0'; // Voir 10 produits, pour toutes les cat�gories ou une cat�gorie particuli�re, uniquement les produits du mois ?
	global $xoopsConfig, $xoopsTpl;
	include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	$start = 0;
	$limit = $options[0];
	$categoryId = $options[1];
	$thisMonthOnly = intval($options[2]);

	$oledrion_shelf_parameters->resetDefaultValues()->setProductsType('recent')->setStart($start)->setLimit($limit)->setSort('product_submitted DESC, product_title')->setCategory($categoryId)->setThisMonthOnly($thisMonthOnly);
	$products = $oledrion_shelf->getProducts($oledrion_shelf_parameters);
	if (isset($products['lastTitle'])) {
		unset($products['lastTitle']);
	}
	if (count($products) > 0) {
		$url = OLEDRION_URL . 'include/oledrion.css';
		$block = array();
		$block['nostock_msg'] = oledrion_utils::getModuleOption('nostock_msg');
		$block['block_products'] = $products;
		$xoopsTpl->assign("xoops_module_header", "<link rel=\"stylesheet\" type=\"text/css\" href=\"$url\" />");
		return $block;
	} else {
		return false;
	}
}

/**
 * Param�tres du bloc
 */
function b_oledrion_new_edit($options) {
	// '10|0|0'; // Voir 10 produits, pour toutes les cat�gories, uniquement les produits du mois ?
	global $xoopsConfig;
	include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	include_once OLEDRION_PATH . 'class/tree.php';
	$tblCategories = array();
	$tblCategories = $h_oledrion_cat->getAllCategories(new oledrion_parameters());
	$mytree = new Oledrion_XoopsObjectTree($tblCategories, 'cat_cid', 'cat_pid');
	$form = '';
	$form .= "<table border='0'>";
	$form .= '<tr><td>' . _MB_OLEDRION_PRODUCTS_CNT . "</td><td><input type='text' name='options[]' id='options' value='" . $options[0] . "' /></td></tr>";
	$select = $mytree->makeSelBox('options[]', 'cat_title', '-', $options[1], _MB_OLEDRION_ALL_CATEGORIES);
	$form .= '<tr><td>' . _MB_OLEDRION_CATEGORY . '</td><td>' . $select . '</td></tr>';

	$checked = array(
		'',
		'');
	$checked[$options[2]] = "checked='checked'";
	$form .= '<tr><td>' . _MB_OLEDRION_THIS_MONTH . "</td><td><input type='radio' name='options[]' id='options' value='1'" . $checked[1] . " />" . _YES . " <input type='radio' name='options[]' id='options' value='0'" . $checked[0] . " />" . _NO . "</td></tr>";

	$form .= '</table>';
	return $form;
}

/**
 * Bloc � la vol�e
 */
function b_oledrion_new_show_duplicatable($options) {
	$options = explode('|', $options);
	$block = &b_oledrion_new_show($options);

	$tpl = new XoopsTpl();
	$tpl->assign('block', $block);
	$tpl->display('db:oledrion_block_new.html');
}
?>