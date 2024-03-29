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
 * Affichage des listes les plus vues
 *
 * @param array $options [0] = Nombre maximum de listes � voir, [1] = Type de listes (0 = les 2, 1 = liste cadeaux, 2 = produits recommand�s)
 * @return array
 */
function b_oledrion_category_lists_show($options) {
	require ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	oledrion_utils::loadLanguageFile('main.php');
	$limit = intval($options[0]);
	$listType = intval($options[1]);
	$block = array();
	if (isset($GLOBALS['current_category']) && intval($GLOBALS['current_category']) > 0) {
		$handlers = oledrion_handler::getInstance();
		$items = array();
		$items = $handlers->h_oledrion_lists->listsFromCurrentCategory($GLOBALS['current_category'], $listType, $limit);
		if (count($items) > 0) {
			foreach ($items as $item) {
				$block['category_lists'][] = $item->toArray();
			}
		}
	}
	return $block;
}

/**
 * Edition des param�tres du bloc
 *
 * @param array $options [0] = Nombre maximum de listes � voir, [1] = Type de listes (0 = les 2, 1 = liste cadeaux, 2 = produits recommand�s)
 * @return array
 */
function b_oledrion_category_lists_edit($options) {
	include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	$form = '';
	$form .= "<table border='0'>";
	$form .= '<tr><td>' . _MB_OLEDRION_LISTS_COUNT . "</td><td><input type='text' name='options[]' id='options' value='" . intval($options[0]) . "' /></td></tr>";
	$listTypes = oledrion_lists::getTypesArray();
	$listTypeSelect = oledrion_utils::htmlSelect('options[]', $listTypes, intval($options[1]), false);
	$form .= '<tr><td>' . _MB_OLEDRION_LISTS_TYPE . "</td><td>" . $listTypeSelect . "</td></tr>";
	$form .= '</table>';
	return $form;
}

/**
 * Bloc � la vol�e
 */
function b_oledrion_category_lists_duplicatable($options) {
	$options = explode('|', $options);
	$block = &b_oledrion_category_lists_show($options);

	$tpl = new XoopsTpl();
	$tpl->assign('block', $block);
	$tpl->display('oledrion_block_category_lists.html');
}
?>