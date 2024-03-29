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
function oledrion_search($queryarray, $andor, $limit, $offset, $userid) {
	global $xoopsDB;
	require ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	require_once ICMS_ROOT_PATH . '/modules/oledrion/class/oledrion_products.php';

	// Recherche dans les produits
	$sql = 'SELECT product_id, product_title, product_submitted, product_submitter FROM ' . $xoopsDB->prefix('oledrion_products') . ' WHERE (product_online = 1';
	if (oledrion_utils::getModuleOption('show_unpublished') == 0) { // Ne pas afficher les produits qui ne sont pas publi�s
		$sql .= ' AND product_submitted <= ' . time();
	}
	if (oledrion_utils::getModuleOption('nostock_display') == 0) { // Se limiter aux seuls produits encore en stock
		$sql .= ' AND product_stock > 0';
	}
	if ($userid != 0) {
		$sql .= '  AND product_submitter = ' . $userid;
	}
	$sql .= ') ';

	$tmpObject = new oledrion_products();
	$datas = $tmpObject->getVars();
	$tblFields = array();
	$cnt = 0;
	foreach ($datas as $key => $value) {
		if ($value['data_type'] == XOBJ_DTYPE_TXTBOX || $value['data_type'] == XOBJ_DTYPE_TXTAREA) {
			if ($cnt == 0) {
				$tblFields[] = $key;
			} else {
				$tblFields[] = ' OR ' . $key;
			}
			$cnt++ ;
		}
	}

	$count = count($queryarray);
	$more = '';
	if (is_array($queryarray) && $count > 0) {
		$cnt = 0;
		$sql .= ' AND (';
		$more = ')';
		foreach ($queryarray as $oneQuery) {
			$sql .= '(';
			$cond = " LIKE '%" . $oneQuery . "%' ";
			$sql .= implode($cond, $tblFields) . $cond . ')';
			$cnt++ ;
			if ($cnt != $count) {
				$sql .= ' ' . $andor . ' ';
			}
		}
	}
	$sql .= $more . ' ORDER BY product_submitted DESC';
	$i = 0;
	$ret = array();
	$myts = &MyTextSanitizer::getInstance();
	$result = $xoopsDB->query($sql, $limit, $offset);
	while ($myrow = $xoopsDB->fetchArray($result)) {
		$ret[$i]['image'] = 'images/product.png';
		$ret[$i]['link'] = "product.php?product_id=" . $myrow['product_id'];
		$ret[$i]['title'] = $myts->htmlSpecialChars($myrow['product_title']);
		$ret[$i]['time'] = $myrow['product_submitted'];
		$ret[$i]['uid'] = $myrow['product_submitter'];
		$i++ ;
	}
	return $ret;
}
?>
