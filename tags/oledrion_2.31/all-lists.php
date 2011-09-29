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
 * Toutes les listes publiques
 *
 * @param integer $start	Position de départ dans les listes
 */
require 'header.php';
$GLOBALS['current_category'] = -1;
$xoopsOption['template_main'] = 'oledrion_all_lists.html';
require_once XOOPS_ROOT_PATH.'/header.php';
require_once XOOPS_ROOT_PATH.'/class/pagenav.php';

$xoopsTpl->assign('mod_pref', $mod_pref);	// Préférences du module
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$limit = oledrion_utils::getModuleOption('perpage');

if($limit > 0) {
	$handlers = oledrion_handler::getInstance();
	$itemsCount = $handlers->h_oledrion_lists->getRecentListsCount(OLEDRION_LISTS_ALL_PUBLIC);
	if($itemsCount > $limit) {
		$pagenav = new XoopsPageNav( $itemsCount, $limit, $start, 'start');
		$xoopsTpl->assign('pagenav', $pagenav->renderNav());
	}
	$items = array();
	$items = $handlers->h_oledrion_lists->getRecentLists(new oledrion_parameters(array('start' => $start, 'limit' => $limit, 'sort' => 'list_date', 'order' => 'DESC', 'idAsKey' => true, 'listType' => OLEDRION_LISTS_ALL_PUBLIC)));
	if(count($items) > 0) {
		foreach($items as $item) {
			$xoopsTpl->append('lists', $item->toArray());
		}
	}
}

oledrion_utils::setCSS();
oledrion_utils::loadLanguageFile('modinfo.php');

$xoopsTpl->assign('global_advert', oledrion_utils::getModuleOption('advertisement'));
$xoopsTpl->assign('breadcrumb', oledrion_utils::breadcrumb(array(OLEDRION_URL.basename(__FILE__) => _MI_OLEDRION_SMNAME11)));

$title = _MI_OLEDRION_SMNAME11.' - '.oledrion_utils::getModuleName();
oledrion_utils::setMetas($title, $title);
require_once XOOPS_ROOT_PATH.'/footer.php';
?>