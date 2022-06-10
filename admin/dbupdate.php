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
 * Mise à jour des structures de données
 */

if(!defined("OLEDRION_ADMIN")) exit();

$wasUpdated = false;
// Présence des nouvelles tables et nouvelles zones dans la base de données
// Nouvelle table oledrion_gateways_options
$tableName = $xoopsDB->prefix('oledrion_gateways_options');
if(!oledrion_tableExists($tableName)) {
	$sql = "CREATE TABLE ".$tableName." (
  	        `option_id` int(10) unsigned NOT NULL auto_increment,
            `option_gateway` varchar(50) NOT NULL COMMENT 'nom de la passerelle de paiement',
            `option_name` varchar(50) NOT NULL,
            `option_value` text NOT NULL,
            PRIMARY KEY  (`option_id`),
            KEY `option_gateway` (`option_gateway`),
            KEY `option_name` (`option_name`),
            KEY `option_gateway_name` (`option_gateway`,`option_name`)
            ) ENGINE=InnoDB";
    $xoopsDB->queryF($sql);
    $wasUpdated = true;
}

// Nouveau champ cmd_comment dans oledrion_commands
$tableName = $xoopsDB->prefix('oledrion_commands');
if(!oledrion_fieldExists('cmd_comment', $tableName)) {
    oledrion_addField('cmd_comment TEXT NOT NULL', $tableName);
    $wasUpdated = true;
}

if(!oledrion_fieldExists('cmd_vat_number', $tableName)) {
    oledrion_addField('cmd_vat_number VARCHAR( 255 ) NOT NULL', $tableName);
    $wasUpdated = true;
}

/**
 * Nouvelle table oledrion_lists
 * @since 2.2.2009.01.29
 */
$tableName = $xoopsDB->prefix('oledrion_lists');
if(!oledrion_tableExists($tableName)) {
	$sql = "CREATE TABLE ".$tableName." (
  			`list_id` int(10) unsigned NOT NULL auto_increment,
  			`list_uid` mediumint(8) unsigned NOT NULL,
  			`list_title` varchar(255) NOT NULL,
  			`list_date` int(10) unsigned NOT NULL,
  			`list_productscount` mediumint(8) unsigned NOT NULL,
  			`list_views` mediumint(8) unsigned NOT NULL,
  			`list_password` varchar(50) NOT NULL,
  			`list_type` tinyint(3) unsigned NOT NULL,
  			`list_description` text NOT NULL,
  			PRIMARY KEY  (`list_id`),
  			KEY `list_uid` (`list_uid`)
            ) ENGINE=InnoDB";
    $xoopsDB->queryF($sql);
    $wasUpdated = true;
}

/**
 * Nouvelle table oledrion_lists
 * @since 2.2.2009.01.29
 */
$tableName = $xoopsDB->prefix('oledrion_products_list');
if(!oledrion_tableExists($tableName)) {
	$sql = "CREATE TABLE ".$tableName." (
  			`productlist_id` int(10) unsigned NOT NULL auto_increment,
  			`productlist_list_id` int(10) unsigned NOT NULL,
  			`productlist_product_id` int(10) unsigned NOT NULL,
  			PRIMARY KEY  (`productlist_id`),
  			KEY `productlist_list_id` (`productlist_list_id`),
  			KEY `productlist_product_id` (`productlist_product_id`)
            ) ENGINE=InnoDB";
    $xoopsDB->queryF($sql);
    $wasUpdated = true;
}

if(!oledrion_fieldExists('productlist_date', $tableName)) {
    oledrion_addField('productlist_date DATE NOT NULL', $tableName);
    $wasUpdated = true;
}


/**
 * Nouvelle table oledrion_attributes
 * @since 2.3.2009.03.09
 */
$tableName = $xoopsDB->prefix('oledrion_attributes');
if(!oledrion_tableExists($tableName)) {
    $sql = "CREATE TABLE `$tableName` (
          `attribute_id` int(10) unsigned NOT NULL auto_increment,
          `attribute_weight` mediumint(7) unsigned default NULL,
          `attribute_title` varchar(255) default NULL,
          `attribute_name` varchar(255) NOT NULL,
          `attribute_type` tinyint(3) unsigned default NULL,
          `attribute_mandatory` tinyint(1) unsigned default NULL,
          `attribute_values` text,
          `attribute_names` text,
          `attribute_prices` text,
          `attribute_stocks` text,
          `attribute_product_id` int(11) unsigned default NULL,
          `attribute_default_value` varchar(255) default NULL,
          `attribute_option1` mediumint(7) unsigned default NULL,
          `attribute_option2` mediumint(7) unsigned default NULL,
          PRIMARY KEY  (`attribute_id`),
          KEY `attribute_product_id` (`attribute_product_id`),
          KEY `attribute_weight` (`attribute_weight`)
        ) ENGINE=InnoDB;";
    $xoopsDB->queryF($sql);
    $wasUpdated = true;
}

/**
 * Nouvelle table oledrion_caddy_attributes
 * @since 2.3.2009.03.10
 */
$tableName = $xoopsDB->prefix('oledrion_caddy_attributes');
if(!oledrion_tableExists($tableName)) {
    $sql = "CREATE TABLE `$tableName` (
          `ca_id` int(10) unsigned NOT NULL auto_increment,
          `ca_cmd_id` int(10) unsigned NOT NULL,
          `ca_caddy_id` int(10) unsigned NOT NULL,
          `ca_attribute_id` int(10) unsigned NOT NULL,
          `ca_attribute_values` text NOT NULL,
          `ca_attribute_names` text NOT NULL,
          `ca_attribute_prices` text NOT NULL,
          PRIMARY KEY  (`ca_id`),
          KEY `ca_cmd_id` (`ca_cmd_id`),
          KEY `ca_caddy_id` (`ca_caddy_id`),
          KEY `ca_attribute_id` (`ca_attribute_id`)
    ) ENGINE=InnoDB;";
    $xoopsDB->queryF($sql);
    $wasUpdated = true;
}

/**
 * Augmentation des types numéraires pour accepter le million
 * @since 2.3.2009.04.20
 */
$definition = oledrion_getFieldDefinition('product_price', $xoopsDB->prefix('oledrion_products'));
if($definition != '') {
    if(xoops_trim($definition['Type']) == 'decimal(7,2)') {
        $tablesToUpdates = array(
            'oledrion_products' => array('product_price', 'product_shipping_price', 'product_discount_price', 'product_ecotaxe'),
            'oledrion_caddy' => array('caddy_price'),
            'oledrion_commands' => array('cmd_shipping'),
            'oledrion_discounts' => array('disc_price_degress_l1total', 'disc_price_degress_l2total', 'disc_price_degress_l3total', 'disc_price_degress_l4total', 'disc_price_degress_l5total'),
        );
        foreach($tablesToUpdates as $tableName => $fields) {
            foreach($fields as $field) {
                $sql = 'ALTER TABLE '.$xoopsDB->prefix($tableName).' CHANGE `'.$field.'` `'.$field.'` DECIMAL( 10, 2 ) NOT NULL';
                $xoopsDB->queryF($sql);
            }
        }
        $wasUpdated = true;
    }
}

if($wasUpdated) {
    $op = 'maintain';    // On force la mise à jour du cache de requêtes
}
?>