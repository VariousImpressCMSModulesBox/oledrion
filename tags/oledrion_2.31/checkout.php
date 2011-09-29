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
 * Saisie des données du client + affichage des informations saisies pour validation avec redirection vers la passerelle de paiement
 */
require 'header.php';
$GLOBALS['current_category'] = -1;
$xoopsOption['template_main'] = 'oledrion_command.html';
require_once XOOPS_ROOT_PATH.'/header.php';
require_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
require_once XOOPS_ROOT_PATH.'/class/xoopslists.php';
require_once OLEDRION_PATH.'class/registryfile.php';

$uid = oledrion_utils::getCurrentUserID();

// Passage de commandes réservé aux utilisateurs enregistrés
if(oledrion_utils::getModuleOption('restrict_orders', false) == 1 && $uid == 0) {
	$registry = new oledrion_registryfile();
	$text = $registry->getfile(OLEDRION_TEXTFILE5);
	oledrion_utils::redirect(xoops_trim($text), 'index.php', 5);
}

$op = 'default';
if(isset($_POST['op'])) {
	$op = $_POST['op'];
}

$xoopsTpl->assign('op', $op);
$cartForTemplate = array();
$emptyCart = false;
$shippingAmount = $commandAmount = $vatAmount = $commandAmountTTC = $discountsCount = 0;
$goOn = '';
$discountsDescription = array();


function listCart()
{
	global $cartForTemplate, $emptyCart, $shippingAmount, $commandAmount, $vatAmount, $goOn, $commandAmountTTC, $discountsDescription;
	$reductions = new oledrion_reductions();
	$reductions->computeCart($cartForTemplate, $emptyCart, $shippingAmount, $commandAmount, $vatAmount, $goOn, $commandAmountTTC, $discountsDescription, $discountsCount);
}

$oledrion_Currency = & oledrion_Currency::getInstance();

$gateway = null;
$gateway = oledrion_gateways::getGatewayObject();
if(is_object($gateway)) {
    $countries = $gateway->getCountriesList();
} else {
    die(_OLEDRION_ERROR20);
}


switch ($op)
{
	// ****************************************************************************************************************
	case 'default':	// Présentation du formulaire
	// ****************************************************************************************************************
		if($h_oledrion_caddy->isCartEmpty()) {
			oledrion_utils::redirect(_OLEDRION_CART_IS_EMPTY, OLEDRION_URL, 4);
		}
		listCart();
		$notFound = true;

		if($uid > 0) {	// Si c'est un utlisateur enregistré, on recherche dans les anciennes commandes pour pré-remplir les champs
			$commande = null;
			$commande = $h_oledrion_commands->getLastUserOrder($uid);
			if(is_object($commande)) {
				$notFound = false;
			}
		}

		if($notFound) {
			$commande = $h_oledrion_commands->create(true);
			$commande->setVar('cmd_country', OLEDRION_DEFAULT_COUNTRY);
		}
		
		// texte à afficher
		$registry = new oledrion_registryfile();
		$text = $registry->getfile(OLEDRION_TEXTFILE6);
		$xoopsTpl->assign('text', xoops_trim($text));

		$sform = new XoopsThemeForm(_OLEDRION_PLEASE_ENTER, "informationfrm", OLEDRION_URL.'checkout.php', 'post');
		$sform->addElement(new XoopsFormHidden('op', 'gateway'));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_TOTAL, $oledrion_Currency->amountForDisplay($commandAmountTTC)));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_SHIPPING_PRICE, $oledrion_Currency->amountForDisplay($shippingAmount)));
		$sform->addElement(new XoopsFormText(_OLEDRION_LASTNAME,'cmd_lastname',50,255, $commande->getVar('cmd_lastname', 'e')), true);
		$sform->addElement(new XoopsFormText(_OLEDRION_FIRSTNAME,'cmd_firstname',50,255, $commande->getVar('cmd_firstname','e')), false);
		$sform->addElement(new XoopsFormTextArea(_OLEDRION_STREET,'cmd_adress', $commande->getVar('cmd_adress','e'), 3, 50), true);
		$sform->addElement(new XoopsFormText(_OLEDRION_CP,'cmd_zip',5,30, $commande->getVar('cmd_zip', 'e')), true);
		$sform->addElement(new XoopsFormText(_OLEDRION_CITY,'cmd_town',40,255, $commande->getVar('cmd_town', 'e')), true);
		$countriesList = new XoopsFormSelect(_OLEDRION_COUNTRY, 'cmd_country', $commande->getVar('cmd_country',' e'));
		$countriesList->addOptionArray($countries);
		$sform->addElement($countriesList, true);

		$sform->addElement(new XoopsFormText(_OLEDRION_PHONE,'cmd_telephone',15,50, $commande->getVar('cmd_telephone', 'e')), false);
		if($uid > 0) {
			$sform->addElement(new XoopsFormText(_OLEDRION_EMAIL,'cmd_email',50,255, $xoopsUser->getVar('email', 'e')), true);
		} else {
			$sform->addElement(new XoopsFormText(_OLEDRION_EMAIL,'cmd_email',50,255,''), true);
		}
		if(oledrion_utils::getModuleOption('ask_vatnumber')) {
		    $sform->addElement(new XoopsFormText(_OLEDRION_VAT_NUMBER, 'cmd_vat_number', 50, 255, $commande->getVar('cmd_vat_number', 'e')), false);
		}
		$sform->addElement(new XoopsFormRadioYN(_OLEDRION_INVOICE,'cmd_bill', 0), true);
		// Peut on proposer de ne pas payer en ligne ?
		if(oledrion_utils::getModuleOption('offline_payment') == 1 ) {
			$sform->addElement(new XoopsFormRadioYN(_OLEDRION_PAY_ONLINE, 'offline_payment', 1), true);
		}

		$button_tray = new XoopsFormElementTray('' ,'');
		$submit_btn = new XoopsFormButton('', 'post', _OLEDRION_SAVE, 'submit');
		$button_tray->addElement($submit_btn);
		$sform->addElement($button_tray);

		$sform = oledrion_utils::formMarkRequiredFields($sform);
		$xoopsTpl->assign('form', $sform->render());
		break;

	// ****************************************************************************************************************
	case 'gateway':	// Validation finale avant envoi sur la passerelle de paiement (ou arrêt)
	// ****************************************************************************************************************
		if($h_oledrion_caddy->isCartEmpty()) {
			oledrion_utils::redirect(_OLEDRION_CART_IS_EMPTY, OLEDRION_URL, 4);
		}
		listCart();
		$password = md5(xoops_makepass());
		$passwordCancel = md5(xoops_makepass());

		$commande = $h_oledrion_commands->create(true);
		$commande->setVars($_POST);
		$commande->setVar('cmd_uid',$uid);
		$commande->setVar('cmd_date',date("Y-m-d"));
		$commande->setVar('cmd_state',OLEDRION_STATE_NOINFORMATION);
		$commande->setVar('cmd_ip', oledrion_utils::IP());
		$commande->setVar('cmd_articles_count', count($cartForTemplate));
		$commande->setVar('cmd_total', oledrion_utils::formatFloatForDB($commandAmountTTC));
		$commande->setVar('cmd_shipping', oledrion_utils::formatFloatForDB($shippingAmount));
		$commande->setVar('cmd_password', $password);
		$commande->setVar('cmd_cancel', $passwordCancel);
		$commande->setVar('cmd_text', implode("\n",$discountsDescription));
		$res = $h_oledrion_commands->insert($commande, true);
		if(!$res) {
			oledrion_utils::redirect(_OLEDRION_ERROR10, OLEDRION_URL, 6);
		}

		// Enregistrement du panier
		$msgCommande = '';
		$handlers = oledrion_handler::getInstance();
		foreach($cartForTemplate as $line) {
			$panier = $h_oledrion_caddy->create(true);
			$panier->setVar('caddy_product_id', $line['product_id']);
			$panier->setVar('caddy_qte', $line['product_qty']);
			$panier->setVar('caddy_price', oledrion_utils::formatFloatForDB($line['totalPrice']));	// Attention, prix TTC avec frais de port
			$panier->setVar('caddy_cmd_id', $commande->getVar('cmd_id'));
			$panier->setVar('caddy_shipping', oledrion_utils::formatFloatForDB($line['discountedShipping']));
			$panier->setVar('caddy_pass', md5(xoops_makepass()));	// Pour le téléchargement
			$msgCommande .= str_pad(wordwrap($line['product_title'], 60), 60, ' ').' '.str_pad($line['product_qty'],8, ' ', STR_PAD_LEFT).' '.str_pad($line['totalPriceFormated'],10,' ',STR_PAD_LEFT).' '.str_pad($line['discountedShipping'],10,' ',STR_PAD_LEFT)."\n";
			$res = $h_oledrion_caddy->insert($panier, true);
			// Attributs
            if($res && is_array($line['attributes']) && count($line['attributes']) > 0) {
                // Enregistrement des attributs pour ce produit
                foreach($line['attributes'] as $attributeId => $attributeInformation) {
                    $caddyAttribute = $handlers->h_oledrion_caddy_attributes->create(true);
                    $caddyAttribute->setVar('ca_cmd_id', $commande->getVar('cmd_id'));
                    $caddyAttribute->setVar('ca_caddy_id', $panier->getVar('caddy_id'));
                    $caddyAttribute->setVar('ca_attribute_id', $attributeId);
                    $selectedOptions = $attributeInformation['attribute_options'];
                    $msgCommande .= '- '.$attributeInformation['attribute_title']."\n";
                    foreach($selectedOptions as $selectedOption) {
                        $caddyAttribute->addOption($selectedOption['option_name'], $selectedOption['option_value'], $selectedOption['option_price']);
                        $msgCommande .= '    '.$selectedOption['option_name'].' : '.$selectedOption['option_ttc_formated']."\n";
                    }
                    $handlers->h_oledrion_caddy_attributes->insert($caddyAttribute, true);
                }
            }
		}
		// Totaux généraux
		$msgCommande .= "\n\n"._OLEDRION_SHIPPING_PRICE.' '.$oledrion_Currency->amountForDisplay($shippingAmount)."\n";
		$msgCommande .= _OLEDRION_TOTAL." ".$oledrion_Currency->amountForDisplay($commandAmountTTC)."\n";
		if(count($discountsDescription) > 0) {
			$msgCommande .= "\n\n"._OLEDRION_CART4."\n";
			$msgCommande .= implode("\n",$discountsDescription);
			$msgCommande .= "\n";
		}
		$msg = array();
		$msg['COMMANDE'] = $msgCommande;
		$msg['NUM_COMMANDE'] = $commande->getVar('cmd_id');
		$msg['NOM'] = $commande->getVar('cmd_lastname');
		$msg['PRENOM'] = $commande->getVar('cmd_firstname');
		$msg['ADRESSE'] = $commande->getVar('cmd_adress', 'n');
		$msg['CP'] = $commande->getVar('cmd_zip');
		$msg['VILLE'] = $commande->getVar('cmd_town');
		$msg['PAYS'] = $countries[$commande->getVar('cmd_country')];
		$msg['TELEPHONE'] = $commande->getVar('cmd_telephone');
		$msg['EMAIL'] = $commande->getVar('cmd_email');
		$msg['URL_BILL'] = OLEDRION_URL.'invoice.php?id='.$commande->getVar('cmd_id').'&pass='.$password;
		$msg['IP'] = oledrion_utils::IP();
		if($commande->getVar('cmd_bill') == 1) {
			$msg['FACTURE'] = _YES;
		} else {
			$msg['FACTURE'] = _NO;
		}
		// Envoi du mail au client
		oledrion_utils::sendEmailFromTpl('command_client.tpl', $commande->getVar('cmd_email'), sprintf(_OLEDRION_THANKYOU_CMD, $xoopsConfig['sitename']), $msg);
		// Envoi du mail au groupe de personne devant recevoir le mail
		oledrion_utils::sendEmailFromTpl('command_shop.tpl', oledrion_utils::getEmailsFromGroup(oledrion_utils::getModuleOption('grp_sold')), _OLEDRION_NEW_COMMAND, $msg);

		// Présentation du formulaire pour envoi à la passerelle de paiement
		// Présentation finale avec panier en variables cachées ******************************
		$registry = new oledrion_registryfile();
		$text = $registry->getfile(OLEDRION_TEXTFILE7);
		$xoopsTpl->assign('text', xoops_trim($text));
		
		if((oledrion_utils::getModuleOption('offline_payment') == 1  && isset($_POST['offline_payment']) && intval($_POST['offline_payment']) == 0) || $commandAmountTTC == 0) {
			$payURL = XOOPS_URL;
			$text = $registry->getfile(OLEDRION_TEXTFILE4);
			$xoopsTpl->append('text', "<br />".xoops_trim($text));
			$sform = new XoopsThemeForm(_OLEDRION_FINISH, 'payform', $payURL, 'post');
			$h_oledrion_caddy->emptyCart();
		} else {
		    if(is_object($gateway)) {
			    $payURL = $gateway->getRedirectURL();
		    } else {
		        $payURL = XOOPS_URL;
		    }
			$sform = new XoopsThemeForm(_OLEDRION_PAY_GATEWAY, 'payform', $payURL, 'post');
			$elements = array();
			if(is_object($gateway)) {
			    $elements = $gateway->getCheckoutFormContent($commande);
			}
			foreach($elements as $key => $value) {
				$sform->addElement(new XoopsFormHidden($key, $value));
			}
		}
		$sform->addElement(new XoopsFormLabel(_OLEDRION_TOTAL, $oledrion_Currency->amountForDisplay($commandAmountTTC)));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_SHIPPING_PRICE, $oledrion_Currency->amountForDisplay($shippingAmount)));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_LASTNAME, $commande->getVar('cmd_lastname')));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_FIRSTNAME, $commande->getVar('cmd_firstname')));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_STREET, $commande->getVar('cmd_adress')));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_CP, $commande->getVar('cmd_zip')));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_CITY, $commande->getVar('cmd_town')));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_COUNTRY, $countries[$commande->getVar('cmd_country')]));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_PHONE, $commande->getVar('cmd_telephone')));
		$sform->addElement(new XoopsFormLabel(_OLEDRION_EMAIL, $commande->getVar('cmd_email')));
		if(oledrion_utils::getModuleOption('ask_vatnumber')) {
		    $sform->addElement(new XoopsFormLabel(_OLEDRION_VAT_NUMBER, $commande->getVar('cmd_vat_number')));
		}

		if($commande->getVar('cmd_bill') == 0) {
			$sform->addElement(new XoopsFormLabel(_OLEDRION_INVOICE, _NO));
		} else {
			$sform->addElement(new XoopsFormLabel(_OLEDRION_INVOICE, _YES));
		}
		$button_tray = new XoopsFormElementTray('' ,'');
		if((oledrion_utils::getModuleOption('offline_payment') == 1  && isset($_POST['offline_payment']) && intval($_POST['offline_payment']) == 0) || $commandAmountTTC == 0) {
			$submit_btn = new XoopsFormButton('', 'post', _OLEDRION_FINISH, 'submit');
		} else {
			$submit_btn = new XoopsFormButton('', 'post', _OLEDRION_PAY_GATEWAY, 'submit');
		}
		$button_tray->addElement($submit_btn);
		$sform->addElement($button_tray);
		$xoopsTpl->assign('form', $sform->render());
		break;
}

$xoopsTpl->assign('global_advert', oledrion_utils::getModuleOption('advertisement'));
$xoopsTpl->assign('breadcrumb', oledrion_utils::breadcrumb(array(OLEDRION_URL.basename(__FILE__) => _OLEDRION_VALIDATE_CMD)));

$title = _OLEDRION_VALIDATE_CMD.' - '.oledrion_utils::getModuleName();
oledrion_utils::setMetas($title, $title);
oledrion_utils::setCSS();
require_once(XOOPS_ROOT_PATH.'/footer.php');
?>