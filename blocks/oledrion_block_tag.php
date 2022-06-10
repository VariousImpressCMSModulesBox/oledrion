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

function oledrion_tag_block_cloud_show($options)
{
	require_once ICMS_ROOT_PATH.'/modules/tag/blocks/block.php';
	return tag_block_cloud_show($options, 'oledrion');
}
function oledrion_tag_block_cloud_edit($options)
{
	require_once ICMS_ROOT_PATH.'/modules/tag/blocks/block.php';
	return tag_block_cloud_edit($options);
}
function oledrion_tag_block_top_show($options)
{
	require_once ICMS_ROOT_PATH.'/modules/tag/blocks/block.php';
	return tag_block_top_show($options, 'oledrion');
}
function oledrion_tag_block_top_edit($options)
{
	require_once ICMS_ROOT_PATH.'/modules/tag/blocks/block.php';
	return tag_block_top_edit($options);
}

?>