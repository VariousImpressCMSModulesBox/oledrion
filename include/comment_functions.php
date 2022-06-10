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

if (!defined('ICMS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

function oledrion_com_update($product_id, $total_num)
{
	include ICMS_ROOT_PATH.'/modules/oledrion/include/common.php';
	global $h_oledrion_products;
	if(!is_object($h_oledrion_products)) {
		$handlers = oledrion_handler::getInstance();
		$h_oledrion_products = $handlers->oledrion_products;

	}
	$h_oledrion_products->updateCommentsCount($product_id, $total_num);
}

function oledrion_com_approve(&$comment)
{
	// notification mail here
}
?>