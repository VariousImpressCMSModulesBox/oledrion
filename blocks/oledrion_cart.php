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
 * block to display items in cart
 *
 * @param integer $options[0] Count of items to show (0 = no limit)
 * @return array Block's content
 */
function b_oledrion_cart_show($options) {
	global $mod_pref, $xoopsConfig;
	include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	$productsCount = intval($options[0]);

	$cartForTemplate = $block = array();
	$emptyCart = false;
	$shippingAmount = $commandAmount = $vatAmount = $discountsCount = 0;
	$goOn = '';
	$commandAmountTTC = 0;
	$discountsDescription = array();
	// Calcul du montant total du caddy
	$reductions = new oledrion_reductions();
	$reductions->computeCart($cartForTemplate, $emptyCart, $shippingAmount, $commandAmount, $vatAmount, $goOn, $commandAmountTTC, $discountsDescription, $discountsCount);
	$dec = oledrion_utils::getModuleOption('decimals_count');
	if ($emptyCart) {
		return '';
	}
	$block['block_money_full'] = oledrion_utils::getModuleOption('money_full');
	$block['block_money_short'] = oledrion_utils::getModuleOption('money_short');
	$block['block_shippingAmount'] = sprintf("%0." . $dec . 'f', $shippingAmount); // Montant des frais de port
	$block['block_commandAmount'] = sprintf("%0." . $dec . 'f', $commandAmount); // Montant HT de la commande
	$block['block_vatAmount'] = sprintf("%0." . $dec . 'f', $vatAmount); // Montant de la TVA
	$block['block_commandAmountTTC'] = sprintf("%0." . $dec . 'f', $commandAmountTTC); // Montant TTC de la commande
	$block['block_discountsDescription'] = $discountsDescription; // Liste des r�ductions accord�es
	if (($productsCount > 0) && (count($cartForTemplate) > $productsCount)) {
		array_slice($cartForTemplate, 0, $productsCount - 1);
	}
	$block['block_caddieProducts'] = $cartForTemplate; // Produits dans le caddy
	return $block;
}

function b_oledrion_cart_edit($options) {
	global $xoopsConfig;
	include ICMS_ROOT_PATH . '/modules/oledrion/include/common.php';
	$form = '';
	$form .= "<table border='0'>";
	$form .= '<tr><td>' . _MB_OLEDRION_MAX_ITEMS . "</td><td><input type='text' name='options[]' id='options' value='" . $options[0] . "' /></td></tr>";
	$form .= '</table>';
	return $form;
}
?>