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
 * Recherche avancée dans les produits, formulaire de sélection des critères
 */
if (!defined('XOOPS_ROOT_PATH')) {
	die('XOOPS root path not defined');
}
require_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
require_once OLEDRION_PATH.'class/tree.php';

$sform = new XoopsThemeForm(oledrion_utils::getModuleName().' - '._OLEDRION_SEARCHFOR, 'productsSearchForm', OLEDRION_URL.'search.php','post');
$sform->addElement(new XoopsFormText(_OLEDRION_TEXT,'product_text', 50, 255, ''), false);
$sform->addElement(new XoopsFormSelectMatchOption(_OLEDRION_TYPE, 'search_type', 3), false);

// Sélecteur de catégories ****************************************************
$categorySelect = new XoopsFormSelect(_OLEDRION_CATEGORY, 'product_category', 0);
$treeObject = new Oledrion_XoopsObjectTree($categories, 'cat_cid', 'cat_pid');
$tree = $treeObject->makeTreeAsArray('cat_title', '-', 0, _OLEDRION_ALL_CATEGORIES);
$categorySelect->addOptionArray($tree);
$sform->addElement($categorySelect, false);


// Sélecteur pour les fabricants *************************************************
$authorSelect = new XoopsFormSelect(_OLEDRION_MANUFACTURER, 'product_manufacturers', 0, 5, true);
$tblTmp = array();
$tblTmp[0] = _OLEDRION_ALL_MANUFACTURERS;
foreach($manufacturers as $item) {
	$tblTmp[$item->getVar('manu_id')] = $item->getVar('manu_commercialname').' '.$item->getVar('manu_name');
}
$authorSelect->addOptionArray($tblTmp);
$sform->addElement($authorSelect, false);


// Sélecteur pour les vendeurs *************************************************
$languageSelect = new XoopsFormSelect(_OLEDRION_VENDOR, 'product_vendors', 0, 1, false);
$tblTmp = array();
$tblTmp[0] = _OLEDRION_ALL_VENDORS;
foreach($vendors as $item) {
	$tblTmp[$item->getVar('vendor_id')] = $item->getVar('vendor_name');
}
$languageSelect->addOptionArray($tblTmp);
$sform->addElement($languageSelect, false);


$sform->addElement(new XoopsFormHidden('op', 'go'));

$button_tray = new XoopsFormElementTray('' ,'');
$submit_btn = new XoopsFormButton('', 'post', _SUBMIT, 'submit');
$button_tray->addElement($submit_btn);
$sform->addElement($button_tray);
?>