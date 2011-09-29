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

if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

if( !defined("OLEDRION_DIRNAME") ) {
	define("OLEDRION_DIRNAME", 'oledrion');
	define("OLEDRION_URL", XOOPS_URL.'/modules/'.OLEDRION_DIRNAME.'/');
	define("OLEDRION_PATH", XOOPS_ROOT_PATH.'/modules/'.OLEDRION_DIRNAME.DIRECTORY_SEPARATOR);
	define("OLEDRION_IMAGES_URL", OLEDRION_URL.'images/');
	define("OLEDRION_JS_URL", OLEDRION_URL.'js/');
	define("OLEDRION_CLASS_PATH", OLEDRION_PATH.'class/');

	define("OLEDRION_ADMIN_URL", OLEDRION_URL.'admin/');
	define("OLEDRION_ADMIN_PATH", OLEDRION_PATH.'admin'.DIRECTORY_SEPARATOR);

	define("OLEDRION_GATEWAY_PATH", OLEDRION_ADMIN_PATH.'gateways'.DIRECTORY_SEPARATOR);
	define("OLEDRION_PLUGINS_PATH", OLEDRION_PATH.'plugins/');
	define("OLEDRION_PLUGINS_URL", OLEDRION_URL.'plugins/');

	define("OLEDRION_TEXTFILE1", 'oledrion_index.txt');
	define("OLEDRION_TEXTFILE2", 'oledrion_cgv.txt');
	define("OLEDRION_TEXTFILE3", 'oledrion_recomm.txt');
	define("OLEDRION_TEXTFILE4", 'oledrion_offlinepayment.txt');
	define("OLEDRION_TEXTFILE5", 'oledrion_restrictorders.txt');
	define("OLEDRION_TEXTFILE6", 'oledrion_checkout1.txt');
	define("OLEDRION_TEXTFILE7", 'oledrion_checkout2.txt');
	define("OLEDRION_CACHE_PATH", XOOPS_UPLOAD_PATH.DIRECTORY_SEPARATOR.OLEDRION_DIRNAME.DIRECTORY_SEPARATOR);
}
// Les classes pour les plugins
require_once OLEDRION_CLASS_PATH.'oledrion_plugins.php';	// Classe principale
require_once OLEDRION_PLUGINS_PATH.'models'.DIRECTORY_SEPARATOR.'oledrion_action.php';	// modèle
require_once OLEDRION_PLUGINS_PATH.'models'.DIRECTORY_SEPARATOR.'oledrion_filter.php';	// modèle

// Les classes métier ou utilitaires (non ORM)
require_once OLEDRION_CLASS_PATH.'oledrion_utils.php';
require_once OLEDRION_CLASS_PATH.'oledrion_handlers.php';
require_once OLEDRION_CLASS_PATH.'oledrion_parameters.php';
require_once OLEDRION_CLASS_PATH.'oledrion_currency.php';
require_once OLEDRION_CLASS_PATH.'oledrion_shelf.php';
require_once OLEDRION_CLASS_PATH.'oledrion_shelf_parameters.php';
require_once OLEDRION_CLASS_PATH.'PEAR.php';
require_once OLEDRION_CLASS_PATH.'oledrion_reductions.php';
require_once OLEDRION_CLASS_PATH.'oledrion_gateways.php';
require_once OLEDRION_ADMIN_PATH.'gateways/gateway.php';    // La classe abstraite

require OLEDRION_PATH.'config.php';

$oledrion_handlers = oledrion_handler::getInstance();

$myts = &MyTextSanitizer::getInstance();

// Chargement des handlers
$h_oledrion_manufacturer = $oledrion_handlers->h_oledrion_manufacturer;
$h_oledrion_products = $oledrion_handlers->h_oledrion_products;
$h_oledrion_productsmanu = $oledrion_handlers->h_oledrion_productsmanu;
$h_oledrion_caddy = $oledrion_handlers->h_oledrion_caddy;
$h_oledrion_cat = $oledrion_handlers->h_oledrion_cat;
$h_oledrion_commands = $oledrion_handlers->h_oledrion_commands;
$h_oledrion_related = $oledrion_handlers->h_oledrion_related;
$h_oledrion_vat = $oledrion_handlers->h_oledrion_vat;
$h_oledrion_votedata = $oledrion_handlers->h_oledrion_votedata;
$h_oledrion_discounts =  $oledrion_handlers->h_oledrion_discounts;
$h_oledrion_vendors =  $oledrion_handlers->h_oledrion_vendors;
$h_oledrion_files =  $oledrion_handlers->h_oledrion_files;
$h_oledrion_persistent_cart =  $oledrion_handlers->h_oledrion_persistent_cart;
$h_oledrion_gateways_options = $oledrion_handlers->h_oledrion_gateways_options;

$oledrion_shelf = new oledrion_shelf();	// Façade
$oledrion_shelf_parameters = new oledrion_shelf_parameters();	// Les paramètres de la façade

// Définition des images
if( !defined("_OLEDRION_EDIT")) {
	global $xoopsConfig;
	if (file_exists(OLEDRION_PATH.'language/'.$xoopsConfig['language'].'/main.php')) {
		include OLEDRION_PATH.'language/'.$xoopsConfig['language'].'/main.php';
	} else {
		include OLEDRION_PATH.'language/english/main.php';
	}
}
$icones = array(
	'edit' => "<img src='". OLEDRION_IMAGES_URL ."edit.gif' alt='" . _OLEDRION_EDIT . "' align='middle' />",
	'delete' => "<img src='". OLEDRION_IMAGES_URL ."delete.gif' alt='" . _OLEDRION_DELETE . "' align='middle' />",
	'online' => "<img src='". OLEDRION_IMAGES_URL ."online.gif' alt='" . _OLEDRION_ONLINE . "' align='middle' />",
	'offline' => "<img src='". OLEDRION_IMAGES_URL ."offline.gif' alt='" . _OLEDRION_OFFLINE . "' align='middle' />",
	'ok' => "<img src='". OLEDRION_IMAGES_URL ."ok.png' alt='" . _OLEDRION_VALIDATE_COMMAND . "' align='middle' />",
	'copy' => "<img src='". OLEDRION_IMAGES_URL ."duplicate.png' alt='" . _OLEDRION_DUPLICATE_PRODUCT . "' align='middle' />",
	'details' => "<img src='". OLEDRION_IMAGES_URL ."details.png' alt='"._OLEDRION_DETAILS."' align='middle' />"
);

// Chargement de quelques préférences
$mod_pref = array(
	'money_short' => oledrion_utils::getModuleOption('money_short'),
	'money_full' => oledrion_utils::getModuleOption('money_full'),
	'url_rewriting' => oledrion_utils::getModuleOption('urlrewriting'),
	'tooltip' => oledrion_utils::getModuleOption('infotips'),
	'advertisement' => oledrion_utils::getModuleOption('advertisement'),
	'rss' => oledrion_utils::getModuleOption('use_rss'),
	'nostock_msg' => oledrion_utils::getModuleOption('nostock_msg'),
	'use_price' => oledrion_utils::getModuleOption('use_price'),
	'restrict_orders' => oledrion_utils::getModuleOption('restrict_orders'),
	'isAdmin' => oledrion_utils::isAdmin()
);
?>