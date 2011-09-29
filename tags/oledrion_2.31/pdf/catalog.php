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
 * Impression du catalogue au format PDF
 */

require '../../../mainfile.php';
require_once XOOPS_ROOT_PATH.'/modules/oledrion/include/common.php';

error_reporting(0);
@$xoopsLogger->activated = false;

if(oledrion_utils::getModuleOption('pdf_catalog') != 1) {
	die();
}

require_once XOOPS_ROOT_PATH.'/class/template.php';
$details = isset($_POST['catalogFormat']) ? intval($_POST['catalogFormat']) : 0;
$Tpl = new XoopsTpl();
$vatArray = $tbl_categories  = array();
$vatArray = $h_oledrion_vat->getAllVats(new oledrion_parameters());
$tbl_categories = $h_oledrion_cat->getAllCategories(new oledrion_parameters());
$Tpl->assign('mod_pref', $mod_pref);	// Préférences du module

$cat_cid = 0 ;
$tbl_tmp = array();
$products = array();
$products = $h_oledrion_products->getRecentProducts(new oledrion_parameters(array('start' => 0, 'limit' => 0, 'category' => $cat_cid)));

if(count($products) > 0) {
	oledrion_utils::loadLanguageFile('modinfo.php');
	$Tpl->assign('details', $details);
	$tblAuthors = $tbl_tmp = $tblManufacturersPerProduct = array();
	$tblAuthors = $h_oledrion_productsmanu->getObjects(new Criteria('pm_product_id', '('.implode(',', array_keys($products)).')', 'IN'), true);
	foreach($tblAuthors as $item) {
		$tbl_tmp[] = $item->getVar('pm_manu_id');
		$tblManufacturersPerProduct[$item->getVar('pm_product_id')][] = $item;
	}
	$tbl_tmp = array_unique($tbl_tmp);
	$tblAuthors = $h_oledrion_manufacturer->getObjects(new Criteria('manu_id', '('.implode(',', $tbl_tmp).')', 'IN'), true);
	foreach($products as $item) {
		$tbl_tmp = array();
		$tbl_tmp = $item->toArray();
		$tbl_tmp['product_category'] = isset($tbl_categories[$item->getVar('product_cid')]) ? $tbl_categories[$item->getVar('product_cid')]->toArray() : null;
		$tbl_tmp['product_price_ttc'] = oledrion_utils::getTTC($item->getVar('product_price'), $vatArray[$item->getVar('product_vat_id')]->getVar('vat_rate'), false, 's');
		$tbl_tmp['product_discount_price_ttc'] = oledrion_utils::getTTC($item->getVar('product_discount_price'), $vatArray[$item->getVar('product_vat_id')]->getVar('vat_rate') , false, 's');
		$tbl_join = array();
		foreach($tblManufacturersPerProduct[$item->getVar('product_id')] as $author) {
			$auteur = $tblAuthors[$author->getVar('pm_manu_id')];
			$tbl_join[] = $auteur->getVar('manu_commercialname').' '.$auteur->getVar('manu_name');
		}
		if(count($tbl_join) > 0) {
			$tbl_tmp['product_joined_manufacturers'] = implode(', ', $tbl_join);
		}
		$Tpl->append('products', $tbl_tmp);
	}
}

$content1 = utf8_encode($Tpl->fetch('db:oledrion_pdf_catalog.html'));
if(oledrion_utils::getModuleOption('use_price')) {
	$content2 = utf8_encode($Tpl->fetch('db:oledrion_purchaseorder.html'));
} else {
	$content2 = '';
}

// ****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
// ****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
// ****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************

$doc_title = _OLEDRION_CATALOG;
$doc_subject = _OLEDRION_CATALOG;
$doc_keywords = "Instant Zero";

require_once OLEDRION_PATH.'pdf/config/lang/'._LANGCODE.'.php';
require OLEDRION_PATH.'pdf/tcpdf.php';

//create new PDF document (document units are set by default to millimeters)
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor(PDF_AUTHOR);
$pdf->SetTitle($doc_title);
$pdf->SetSubject($doc_subject);
$pdf->SetKeywords($doc_keywords);

$firstLine = utf8_encode(oledrion_utils::getModuleName().' - '.$xoopsConfig['sitename']);
$secondLine = OLEDRION_URL.' - '.formatTimestamp(time(), 'm');
$pdf->SetHeaderData('', '', $firstLine, $secondLine);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->setLanguageArray($l); //set language items


//initialize document
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->writeHTML($content1, true, 0);
if(oledrion_utils::getModuleOption('use_price')) {
	$pdf->AddPage();
	$pdf->writeHTML($content2, true, 0);
}
$pdf->Output();
?>