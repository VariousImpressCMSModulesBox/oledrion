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

/**
 * Actions relatives aux TVA (affichage, �dition, suppression)
 */
if(!defined("OLEDRION_ADMIN")) exit();
switch($action) {
	// ****************************************************************************************************************
	case 'default':	// Gestion des TVA
	// ****************************************************************************************************************
        xoops_cp_header();
        oledrion_adminMenu(2);
		$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
		$vats = array();
		$form = "<form method='post' action='$baseurl' name='frmaddvat' id='frmaddvat'><input type='hidden' name='op' id='op' value='vat' /><input type='hidden' name='action' id='action' value='add' /><input type='hidden' name='action' id='action' value='add' /><input type='submit' name='btngo' id='btngo' value='"._AM_OLEDRION_ADD_ITEM."' /></form>";
		echo $form;
		oledrion_utils::htitle(_MI_OLEDRION_ADMENU1, 4);
		$vats = $h_oledrion_vat->getAllVats(new oledrion_parameters(array('start' => $start, 'limit' => $limit)));
		$class='';
		echo "<table width='100%' cellspacing='1' cellpadding='3' border='0' class='outer'>";
		echo "<tr><th align='center'>"._AM_OLEDRION_ID."</th><th align='center'>"._AM_OLEDRION_RATE."</th><th align='center'>"._AM_OLEDRION_ACTION."</th></tr>";
		foreach ($vats as $item) {
			$id = $item->getVar('vat_id');
			$class = ($class == 'even') ? 'odd' : 'even';
			$actions = array();
			$actions[] = "<a href='$baseurl?op=vat&action=edit&id=".$id."' title='"._OLEDRION_EDIT."'>".$icones['edit'].'</a>';
			$actions[] = "<a href='$baseurl?op=vat&action=delete&id=".$id."' title='"._OLEDRION_DELETE."'".$conf_msg.">".$icones['delete'].'</a>';
			echo "<tr class='".$class."'>\n";
			echo "<td>".$id."</td><td align='right'>".$oledrion_Currency->amountInCurrency($item->getVar('vat_rate'))."</td><td align='center'>".implode(' ', $actions)."</td>\n";
			echo "<tr>\n";
		}
		$class = ($class == 'even') ? 'odd' : 'even';
		echo "<tr class='".$class."'>\n";
		echo "<td colspan='3' align='center'>".$form."</td>\n";
		echo "</tr>\n";
		echo '</table>';
        show_footer();
		break;

	// ****************************************************************************************************************
	case 'add':		// Ajout d'une TVA
	case 'edit':	// Edition d'une TVA
	// ****************************************************************************************************************
        xoops_cp_header();
        oledrion_adminMenu(2);
		if($action == 'edit') {
			$title = _AM_OLEDRION_EDIT_VAT;
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			if(empty($id)) {
				oledrion_utils::redirect(_AM_OLEDRION_ERROR_1, $baseurl, 5);
			}
			// Item exits ?
			$item = null;
			$item = $h_oledrion_vat->get($id);
			if(!is_object($item)) {
				oledrion_utils::redirect(_AM_OLEDRION_NOT_FOUND, $baseurl, 5);
			}
			$edit = true;
			$label_submit = _AM_OLEDRION_MODIFY;
		} else {
			$title = _AM_OLEDRION_ADD_VAT;
			$item = $h_oledrion_vat->create(true);
			$label_submit = _AM_OLEDRION_ADD;
			$edit = false;
		}
		$sform = new XoopsThemeForm($title, 'frmaddvat', $baseurl);
		$sform->addElement(new XoopsFormHidden('op', 'vat'));
		$sform->addElement(new XoopsFormHidden('action', 'saveedit'));
		$sform->addElement(new XoopsFormHidden('vat_id', $item->getVar('vat_id')));
		$sform->addElement(new XoopsFormText(_AM_OLEDRION_RATE,'vat_rate',10,15, $item->getVar('vat_rate','e')), true);

		$button_tray = new XoopsFormElementTray('' ,'');
		$submit_btn = new XoopsFormButton('', 'post', $label_submit, 'submit');
		$button_tray->addElement($submit_btn);
		$sform->addElement($button_tray);
		$sform = oledrion_utils::formMarkRequiredFields($sform);
		$sform->display();
		show_footer();
		break;

	// ****************************************************************************************************************
	case 'saveedit':	// Sauvegarde d'une TVA
	// ****************************************************************************************************************
		xoops_cp_header();
		$id = isset($_POST['vat_id']) ? intval($_POST['vat_id']) : 0;
		if(!empty($id)) {
			$edit = true;
			$item = $h_oledrion_vat->get($id);
			if(!is_object($item)) {
				oledrion_utils::redirect(_AM_OLEDRION_NOT_FOUND, $baseurl, 5);
			}
			$item->unsetNew();
		} else {
			$item= $h_oledrion_vat->create(true);
		}
		$opRedirect = 'vat';
		$item->setVars($_POST);
		$res = $h_oledrion_vat->insert($item);
		if($res) {
			oledrion_utils::updateCache();
			oledrion_utils::redirect(_AM_OLEDRION_SAVE_OK, $baseurl.'?op='.$opRedirect, 2);
		} else {
			oledrion_utils::redirect(_AM_OLEDRION_SAVE_PB, $baseurl.'?op='.$opRedirect,5);
		}
		break;


	// ****************************************************************************************************************
	case 'delete':		// Suppression d'une TVA
	// ****************************************************************************************************************
        xoops_cp_header();
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		if(empty($id)) {
			oledrion_utils::redirect(_AM_OLEDRION_ERROR_1, $baseurl, 5);
		}
		$opRedirect = 'vat';
		// On v�rifie que cette TVA n'est pas utilis�e par des produits
		$cnt = $h_oledrion_vat->getVatProductsCount($id);
		if($cnt == 0) {
			$item = null;
			$item = $h_oledrion_vat->get($id);
			if(is_object($item)) {
				$res = $h_oledrion_vat->deleteVat($item);
				if($res) {
					oledrion_utils::updateCache();
					oledrion_utils::redirect(_AM_OLEDRION_SAVE_OK, $baseurl.'?op='.$opRedirect,2);
				} else {
					oledrion_utils::redirect(_AM_OLEDRION_SAVE_PB, $baseurl.'?op='.$opRedirect,5);
				}
			} else {
				oledrion_utils::redirect(_AM_OLEDRION_NOT_FOUND, $baseurl.'?op='.$opRedirect,5);
			}
		} else {
			oledrion_utils::redirect(_AM_OLEDRION_ERROR_2, $baseurl.'?op='.$opRedirect,5);
		}
		break;
}
?>