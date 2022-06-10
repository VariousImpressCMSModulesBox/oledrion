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

function oledrion_notify_iteminfo($category, $item_id)
{
	global $xoopsModule, $xoopsModuleConfig;
	$item_id = intval($item_id);

	if (empty($xoopsModule) || $xoopsModule->getVar('dirname') != 'oledrion') {
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname('oledrion');
		$config_handler =& xoops_gethandler('config');
		$config =& $config_handler->getConfigsByCat(0,$module->getVar('mid'));
	} else {
		$module =& $xoopsModule;
		// TODO: Jamais utilisé !!!
		$config =& $xoopsModuleConfig;
	}

	if ($category == 'global') {
		$item['name'] = '';
		$item['url'] = '';
		return $item;
	}

	if ($category == 'new_category') {
		include OLEDRION_PATH.'include/common.php';
		$category = null;
		$category = $h_oledrion_cat->get($item_id);
		if(is_object($category)) {
			$item['name'] = $category->getVar('cat_title');
			$item['url'] = OLEDRION_URL.'category.php?cat_cid=' . $item_id;
		}
		return $item;
	}

	if ($category == 'new_product') {
		include OLEDRION_PATH.'include/common.php';
		$product = null;
		$product = $h_oledrion_products->get($item_id);
		if(is_object($product)) {
			$item['name'] = $product->getVar('product_title');
			$item['url'] = OLEDRION_URL.'product.php?product_id=' . $item_id;
		}
		return $item;
	}
}
?>