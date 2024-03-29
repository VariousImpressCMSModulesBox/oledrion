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
 * Affiche les listes de l'utilisateur
 *
 * @param array $options [0] = Nombre maximum de listes � voir
 * @return array
 */
function b_oledrion_my_lists_show($options) {
	require ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	oledrion_utils::loadLanguageFile('modinfo.php');
	$start = 0;
	$limit = intval($options[0]);
	$uid = oledrion_utils::getCurrentUserID();
	if ($uid == 0) {
		return null;
	}
	$listType = OLEDRION_LISTS_ALL;
	$block = array();
	$handlers = oledrion_handler::getInstance();
	$items = array();
	$items = $handlers->h_oledrion_lists->getRecentLists(new oledrion_parameters(array(
		'start' => $start,
		'limit' => $limit,
		'sort' => 'list_date',
		'order' => 'DESC',
		'idAsKey' => true,
		'listType' => $listType,
		'list_uid' => $uid)));
	if (count($items) > 0) {
		foreach ($items as $item) {
			$block['my_lists'][] = $item->toArray();
		}
	}
	return $block;
}

/**
 * Edition des param�tres du bloc
 *
 * @param array $options [0] = Nombre maximum de listes � voir
 * @return array
 */
function b_oledrion_my_lists_edit($options) {
	include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	$form = '';
	$form .= "<table border='0'>";
	$form .= '<tr><td>' . _MB_OLEDRION_LISTS_COUNT . "</td><td><input type='text' name='options[]' id='options' value='" . intval($options[0]) . "' /></td></tr>";
	$form .= '</table>';
	return $form;
}

/**
 * Bloc � la vol�e
 */
function b_oledrion_my_lists_duplicatable($options) {
	$options = explode('|', $options);
	$block = &b_oledrion_my_lists_show($options);

	$tpl = new XoopsTpl();
	$tpl->assign('block', $block);
	$tpl->display('db:oledrion_block_my_lists.html');
}
?>