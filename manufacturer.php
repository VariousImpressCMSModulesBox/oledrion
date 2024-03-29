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
 * Page d'informations sur un fabricant
 */
require 'header.php';
$GLOBALS['current_category'] = -1;
$xoopsOption['template_main'] = 'oledrion_manufacturer.html';
require_once ICMS_ROOT_PATH . '/header.php';
require_once ICMS_ROOT_PATH . '/class/pagenav.php';

// Les tests **************************************************************************************
if (isset($_GET['manu_id'])) {
	$manu_id = intval($_GET['manu_id']);
} else {
	oledrion_utils::redirect(_OLEDRION_ERROR7, 'index.php', 5);
}
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;

// Le fabricant existe ?
$manufacturer = null;
$manufacturer = $h_oledrion_manufacturer->get($manu_id);
if (!is_object($manufacturer)) {
	oledrion_utils::redirect(_OLEDRION_ERROR7, 'index.php', 5);
}

$xoopsTpl->assign('mod_pref', $mod_pref); // Pr�f�rences du module
$xoopsTpl->assign('manufacturer', $manufacturer->toArray());
$limit = oledrion_utils::getModuleOption('perpage');

// Lecture des TVA ********************************************************************************
$vatArray = array();
$vatArray = $h_oledrion_vat->getAllVats(new oledrion_parameters());

// Recherche des produits de ce fabricant *********************************************************
// On commence par chercher le nombre total de ses produits
$itemsCount = $h_oledrion_manufacturer->getManufacturerProductsCount($manu_id);
if ($itemsCount > $limit) {
	$pagenav = new XoopsPageNav($itemsCount, $limit, $start, 'start', 'manu_id=' . $manu_id);
	$xoopsTpl->assign('pagenav', $pagenav->renderNav());
}

$products = array();
$products = $h_oledrion_manufacturer->getManufacturerProducts($manu_id, $start, $limit);
if (count($products) > 0) {
	$tmp = $categories = array();
	foreach ($products as $product) { // Recherche des cat�gories
		$tmp[] = $product->getVar('product_cid');
	}
	$tmp = array_unique($tmp);
	sort($tmp);
	if (count($tmp) > 0) {
		$categories = $h_oledrion_cat->getCategoriesFromIds($tmp);
	}
	$cpt = 1;
	foreach ($products as $product) {
		$productForTemplate = array();
		$productForTemplate = $product->toArray();
		$productForTemplate['count'] = $cpt;
		$productForTemplate['product_category'] = isset($categories[$product->getVar('product_cid')]) ? $categories[$product->getVar('product_cid')]->toArray() : null;
		$xoopsTpl->append('products', $productForTemplate);
		$cpt++ ;
	}
}

oledrion_utils::setCSS();
oledrion_utils::loadLanguageFile('modinfo.php');

$xoopsTpl->assign('global_advert', oledrion_utils::getModuleOption('advertisement'));
$breadcrumb = array(
	OLEDRION_URL . 'whoswho.php' => _OLEDRION_MANUFACTURERS,
	OLEDRION_URL . basename(__FILE__) => $manufacturer->getVar('manu_name') . ' ' . $manufacturer->getVar('manu_commercialname'));
$xoopsTpl->assign('breadcrumb', oledrion_utils::breadcrumb($breadcrumb));

$title = $manufacturer->getVar('manu_name') . ' ' . $manufacturer->getVar('manu_commercialname') . ' - ' . oledrion_utils::getModuleName();
oledrion_utils::setMetas($title, $title, oledrion_utils::createMetaKeywords($manufacturer->getVar('manu_name') . ' ' . $manufacturer->getVar('manu_commercialname') . ' ' . $manufacturer->getVar('manu_bio')));
require_once ICMS_ROOT_PATH . '/footer.php';
?>