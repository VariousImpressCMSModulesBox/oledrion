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
 * Affiche le bloc des cat�gories en fonction de la cat�gorie en cours (fonctionne de paire avec les pages du module)
 */
function b_oledrion_category_show($options) {
	global $xoopsTpl;
	$block = array();
	include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	$url = OLEDRION_URL . 'include/oledrion.css';
	$xoopsTpl->assign("xoops_module_header", "<link rel=\"stylesheet\" type=\"text/css\" href=\"$url\" />");
	$block['nostock_msg'] = oledrion_utils::getModuleOption('nostock_msg');

	if (intval($options[0]) == 0) { // Cat�gories selon la page en cours
		$block['block_option'] = 0;
		if (!isset($GLOBALS['current_category']) || $GLOBALS['current_category'] == -1) {
			return false;
		}
		$cat_cid = intval($GLOBALS['current_category']);
		include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';

		if ($cat_cid > 0) {
			include_once ICMS_ROOT_PATH . '/class/tree.php';
			$tbl_categories = $tblChilds = $tbl_tmp = array();
			$tbl_categories = $h_oledrion_cat->getAllCategories(new oledrion_parameters());
			$mytree = new XoopsObjectTree($tbl_categories, 'cat_cid', 'cat_pid');
			$tblChilds = $mytree->getAllChild($cat_cid);
			// $tblChilds = array_reverse($tblChilds);
			foreach ($tblChilds as $item) {
				$tbl_tmp[] = "<a href='" . $item->getLink() . "' title='" . oledrion_utils::makeHrefTitle($item->getVar('cat_title')) . "'>" . $item->getVar('cat_title') . "</a>";
			}
			$block['block_categories'] = $tbl_tmp;

			$category = null;
			if ($cat_cid > 0) {
				$category = $h_oledrion_cat->get($cat_cid);
				if (is_object($category)) {
					$block['block_current_category'] = $category->toArray();
				}
			}
		} else { // On est � la racine, on n'affiche donc que les cat�gories m�res
			$tbl_categories = array();
			$criteria = new Criteria('cat_pid', 0, '=');
			$criteria->setSort('cat_title');
			$tbl_categories = $h_oledrion_cat->getObjects($criteria, true);
			foreach ($tbl_categories as $item) {
				$tbl_tmp[] = "<a href='" . $item->getLink() . "' title='" . oledrion_utils::makeHrefTitle($item->getVar('cat_title')) . "'>" . $item->getVar('cat_title') . "</a>";
			}
			$block['block_categories'] = $tbl_tmp;
		}
	} elseif (intval($options[0]) == 1) { // Affichage classique
		$block['block_option'] = 1;
		include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
		include_once OLEDRION_PATH . 'class/tree.php';
		$tbl_categories = $h_oledrion_cat->getAllCategories(new oledrion_parameters());
		$mytree = new Oledrion_XoopsObjectTree($tbl_categories, 'cat_cid', 'cat_pid');
		$jump = OLEDRION_URL . "category.php?cat_cid=";
		$additional = "onchange='location=\"" . $jump . "\"+this.options[this.selectedIndex].value'";
		if (isset($GLOBALS['current_category']) && $GLOBALS['current_category'] != -1) {
			$cat_cid = intval($GLOBALS['current_category']);
		} else {
			$cat_cid = 0;
		}
		$htmlSelect = $mytree->makeSelBox('cat_cid', 'cat_title', '-', $cat_cid, false, 0, $additional);
		$block['htmlSelect'] = $htmlSelect;
	} else { // Affichage de toute l'arborescence, d�pli�e
		$block['block_option'] = 2;
		$block['liMenu'] = $h_oledrion_cat->getUlMenu('category_title');
	}
	return $block;
}

function b_oledrion_category_edit($options) {
	global $xoopsConfig;
	include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';

	$checkeds = array(
		'',
		'',
		'');
	$checkeds[$options[0]] = 'checked';
	$form = '';
	$form .= '<b>' . _MB_OLEDRION_TYPE_BLOCK . "</b><br /><input type='radio' name='options[]' id='options[]' value='0' " . $checkeds[0] . " />" . _MB_OLEDRION_TYPE_BLOCK2 . "<br /><input type='radio' name='options[]' id='options[]' value='1' " . $checkeds[1] . " />" . _MB_OLEDRION_TYPE_BLOCK1 . "<br /><input type='radio' name='options[]' id='options[]' value='2' " . $checkeds[2] . " />" . _MB_OLEDRION_TYPE_BLOCK3 . '</td></tr>';
	return $form;
}

/**
 * Bloc � la vol�e
 */
function b_oledrion_category_duplicatable($options) {
	$options = explode('|', $options);
	$block = &b_oledrion_category($options);

	$tpl = new XoopsTpl();
	$tpl->assign('block', $block);
	$tpl->display('db:oledrion_block_categories.html');
}
?>