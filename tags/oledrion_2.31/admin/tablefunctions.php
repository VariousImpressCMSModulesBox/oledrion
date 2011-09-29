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
 * Verify that a mysql table exists
 *
 * @package Oledrion
 * @author Instant Zero (http://xoops.instant-zero.com)
 * @copyright (c) Instant Zero
*/
function oledrion_tableExists($tablename)
{
	global $xoopsDB;
	$result = $xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");
	return($xoopsDB->getRowsNum($result) > 0);
}

/**
 * Verify that a field exists inside a mysql table
 *
 * @package Oledrion
 * @author Instant Zero (http://xoops.instant-zero.com)
 * @copyright (c) Instant Zero
*/
function oledrion_fieldExists($fieldname, $table)
{
	global $xoopsDB;
	$result = $xoopsDB->queryF("SHOW COLUMNS FROM $table LIKE '$fieldname'");
	return($xoopsDB->getRowsNum($result) > 0);
}

/**
 * Retourne la définition d'un champ
 *
 * @param string $fieldname
 * @param string $table
 * @return array
 */
function oledrion_getFieldDefinition($fieldname, $table)
{
	global $xoopsDB;
	$result = $xoopsDB->queryF("SHOW COLUMNS FROM $table LIKE '$fieldname'");
	if($result) {
	    return $xoopsDB->fetchArray($result);
	}
	return '';
}

/**
 * Add a field to a mysql table
 *
 * @package Oledrion
 * @author Instant Zero (http://xoops.instant-zero.com)
 * @copyright (c) Instant Zero
 */
function oledrion_addField($field, $table)
{
	global $xoopsDB;
	$result = $xoopsDB->queryF("ALTER TABLE $table ADD $field;");
	return $result;
}
?>