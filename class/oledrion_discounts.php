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
 * Gestion des r�ductions
 */
require 'classheader.php';

// Les nouveaux define relatifs aux r�ductions ************************************************************************
define("OLEDRION_DISCOUNT_PRICE_TYPE0", 0); // R�duction non d�finie
define("OLEDRION_DISCOUNT_PRICE_TYPE1", 1); // R�duction d�gressive
define("OLEDRION_DISCOUNT_PRICE_TYPE2", 2); // R�duction d'un montant ou pourcentage

define('OLEDRION_DISCOUNT_PRICE_REDUCE_PERCENT', 1); // Pourcent
define('OLEDRION_DISCOUNT_PRICE_REDUCE_MONEY', 2); // Euros

define("OLEDRION_DISCOUNT_PRICE_AMOUNT_ON_PRODUCT", 1); // R�duction d'un montant ou d'un pourcentage sur le produit
define("OLEDRION_DISCOUNT_PRICE_AMOUNT_ON_CART", 2); // R�duction d'un montant ou d'un pourcentage sur le panier

define("OLEDRION_DISCOUNT_PRICE_CASE_ALL", 1); // Dans tous les cas
define("OLEDRION_DISCOUNT_PRICE_CASE_FIRST_BUY", 2); // si c'est le premier achat du client sur le site
define("OLEDRION_DISCOUNT_PRICE_CASE_PRODUCT_NEVER", 3); // si le produit n'a jamais �t� achet� par le client
define("OLEDRION_DISCOUNT_PRICE_CASE_QTY_IS", 4); // si la quantit� de produit est ...

define("OLEDRION_DISCOUNT_PRICE_QTY_COND1", 1); // si la quantit� de produit est > �
define("OLEDRION_DISCOUNT_PRICE_QTY_COND2", 2); // si la quantit� de produit est >= �
define("OLEDRION_DISCOUNT_PRICE_QTY_COND3", 3); // si la quantit� de produit est < �
define("OLEDRION_DISCOUNT_PRICE_QTY_COND4", 4); // si la quantit� de produit est <= �
define("OLEDRION_DISCOUNT_PRICE_QTY_COND5", 5); // si la quantit� de produit est = �

define("OLEDRION_DISCOUNT_PRICE_QTY_COND1_TEXT", '>'); // si la quantit� de produit est > �
define("OLEDRION_DISCOUNT_PRICE_QTY_COND2_TEXT", '>='); // si la quantit� de produit est >= �
define("OLEDRION_DISCOUNT_PRICE_QTY_COND3_TEXT", '<'); // si la quantit� de produit est < �
define("OLEDRION_DISCOUNT_PRICE_QTY_COND4_TEXT", '<='); // si la quantit� de produit est <= �
define("OLEDRION_DISCOUNT_PRICE_QTY_COND5_TEXT", '='); // si la quantit� de produit est = �

define('OLEDRION_DISCOUNT_SHIPPING_TYPE1', 1); // Les frais de port sont � payer dans leur int�gralit�
define('OLEDRION_DISCOUNT_SHIPPING_TYPE2', 2); // Les frais de port sont totalement gratuits
define('OLEDRION_DISCOUNT_SHIPPING_TYPE3', 3); // Les frais de port sont r�duits de ...
define('OLEDRION_DISCOUNT_SHIPPING_TYPE4', 4);

// Les frais de port sont d�gressifs
// ********************************************************************************************************************
class oledrion_discounts extends Oledrion_Object {

	function __construct() {
		$this->initVar('disc_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_title', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_group', XOBJ_DTYPE_INT, null, false); // Groupe Xoops concern� par la remise (0=tous les groupes)
		$this->initVar('disc_cat_cid', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_vendor_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_product_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_type', XOBJ_DTYPE_INT, null, false); // Type de r�duction (d�gressive, montant/pourcentage)
		$this->initVar('disc_price_degress_l1qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l1qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l1total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_price_degress_l2qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l2qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l2total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_price_degress_l3qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l3qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l3total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_price_degress_l4qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l4qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l4total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_price_degress_l5qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l5qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_price_degress_l5total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_price_amount_amount', XOBJ_DTYPE_TXTBOX, null, false); // Montant ou pourcentage de r�duction sur le prix
		$this->initVar('disc_price_amount_type', XOBJ_DTYPE_INT, null, false); // Pourcent ou Euros ?
		$this->initVar('disc_price_amount_on', XOBJ_DTYPE_INT, null, false); // Produit ou panier ?
		$this->initVar('disc_price_case', XOBJ_DTYPE_INT, null, false); // Dans quel cas ? (tous les cas, si c''est le premier achat, si le produit n''a jamais �t� achet� etc)
		$this->initVar('disc_price_case_qty_cond', XOBJ_DTYPE_INT, null, false); // Sup�rieur, inf�rieur, �gal
		$this->initVar('disc_price_case_qty_value', XOBJ_DTYPE_INT, null, false); // Quantit� de produit � tester
		$this->initVar('disc_shipping_type', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_free_morethan', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_shipping_reduce_amount', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_shipping_reduce_cartamount', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_shipping_degress_l1qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l1qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l1total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_shipping_degress_l2qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l2qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l2total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_shipping_degress_l3qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l3qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l3total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_shipping_degress_l4qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l4qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l4total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_shipping_degress_l5qty1', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l5qty2', XOBJ_DTYPE_INT, null, false);
		$this->initVar('disc_shipping_degress_l5total', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('disc_date_from', XOBJ_DTYPE_INT, null, false); // Date de d�but de la promo
		$this->initVar('disc_date_to', XOBJ_DTYPE_INT, null, false); // Date de fin de la promo
		$this->initVar('disc_description', XOBJ_DTYPE_TXTAREA, null, false);

		// Pour autoriser le html
		$this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
	}
}

class OledrionOledrion_discountsHandler extends Oledrion_XoopsPersistableObjectHandler {

	function __construct($db) { // Table Classe Id Libell�
		parent::__construct($db, 'oledrion_discounts', 'oledrion_discounts', 'disc_id', 'disc_title');
	}

	private function getDiscountedPrice($price, $discount) {
		return $price - ($price * ($discount / 100));
	}

	/**
	 * Retourne la liste des r�gles qui sont applicables sur la p�riode courante
	 *
	 * @param void
	 * @return array objets de type oledrion_discounts
	 */
	function getRulesForThisPeriod() {
		static $buffer = array();
		if (is_array($buffer) && count($buffer) > 0) {
			return $buffer;
		} else {
			$critere = new CriteriaCompo();
			$critere->add(new Criteria('disc_date_from', 0, '='));
			$critere->add(new Criteria('disc_date_to', 0, '='), 'OR');

			$critere2 = new CriteriaCompo();
			$critere2->add(new Criteria('disc_date_from', time(), '>='));
			$critere2->add(new Criteria('disc_date_to', time(), '<='));
			$critere->add($critere2);

			$buffer = $this->getObjects($critere);
		}
		return $buffer;
	}

	/**
	 *
	 * @deprecated
	 */

	/**
	 * Renvoie la liste des r�gles � appliquer sur chaque produit (avec gestion de cache) pour l'utilisateur courant
	 *
	 * @return array Tableau d'objets de type Discounts
	 */
	function getRulesOnEachProduct() {
		static $buffer = array();
		if (is_array($buffer) && count($buffer) > 0) {} else {
			$groups = oledrion_utils::getCurrentMemberGroups();
			$critere = new CriteriaCompo();
			$critere->add(new Criteria('disc_on_what', OLEDRION_DISCOUNT_ON3, '='));
			if (count($groups) > 0) {
				$critere->add(new Criteria('disc_group', '(' . implode(',', $groups) . ')', 'IN'));
			}
			$buffer = $this->getObjects($critere);
		}
		return $buffer;
	}

	/**
	 * Renvoie la liste des r�gles � appliquer sur tous les produits (avec gestion de cache) pour l'utilisateur courant
	 *
	 * @return array Tableau d'objets de type Discounts
	 */
	function getRulesOnAllProducts() {
		static $buffer = array();
		if (is_array($buffer) && count($buffer) > 0) {} else {
			$critere = new CriteriaCompo();
			$critere->add(new Criteria('disc_on_what', OLEDRION_DISCOUNT_ON2, '='));
			$tblGroups = oledrion_utils::getCurrentMemberGroups();
			$critere->add(new Criteria('disc_group', '(' . implode(',', $tblGroups) . ')', 'IN'));
			$buffer = $this->getObjects($critere);
		}
		return $buffer;
	}

	/**
	 * Renvoie la liste des r�gles � appliquer sur les frais de ports (avec gestion de cache) pour l'utilisateur courant
	 *
	 * @return array Tableau d'objets de type Discounts
	 */
	function getRulesOnShipping() {
		static $buffer = array();
		if (is_array($buffer) && count($buffer) > 0) {} else {
			$critere = new CriteriaCompo();
			$critere->add(new Criteria('disc_on_what', OLEDRION_DISCOUNT_ON4, '='));
			$tblGroups = oledrion_utils::getCurrentMemberGroups();
			$critere->add(new Criteria('disc_group', '(' . implode(',', $tblGroups) . ')', 'IN'));
			$buffer = $this->getObjects($critere);
		}
		return $buffer;
	}

	/**
	 * Renvoie la liste des r�gles � appliquer sur les frais de ports (avec gestion de cache) pour l'utilisateur courant
	 *
	 * @return array Tableau d'objets de type Discounts
	 */
	function getRulesOnShipping2() {
		static $buffer = array();
		if (is_array($buffer) && count($buffer) > 0) {} else {
			$critere = new CriteriaCompo();
			$critere->add(new Criteria('disc_on_what', OLEDRION_DISCOUNT_ON5, '='));
			$critere->add(new Criteria('disc_shipping', OLEDRION_DISCOUNT_SHIPPING2, '='));
			$tblGroups = oledrion_utils::getCurrentMemberGroups();
			$critere->add(new Criteria('disc_group', '(' . implode(',', $tblGroups) . ')', 'IN'));
			$buffer = $this->getObjects($critere);
		}
		return $buffer;
	}

	/**
	 * Renvoie la liste des r�gles � appliquer sur l'int�gralit� de la commande (avec gestion de cache) pour l'utilisateur courant
	 *
	 * @return array Tableau d'objets de type Discounts
	 */
	function getRulesOnCommand() {
		static $buffer = array();
		if (is_array($buffer) && count($buffer) > 0) {} else {
			$critere = new CriteriaCompo();
			$critere->add(new Criteria('disc_on_what', OLEDRION_DISCOUNT_ON1, '='));
			$tblGroups = oledrion_utils::getCurrentMemberGroups();
			$critere->add(new Criteria('disc_group', '(' . implode(',', $tblGroups) . ')', 'IN'));
			$buffer = $this->getObjects($critere);
		}
		return $buffer;
	}

	/**
	 * Deuxi�me lot de r�ductions, � appliquer sur les frais de port
	 *
	 * @param float $montantShipping Montant des frais de port
	 * @param float $commandAmount Le montant total de la commande
	 * @param array $discountsDescription Descriptions des r�ductions appliqu�es
	 */
	function applyDiscountOnShipping2(&$montantShipping, $commandAmount, &$discountsDescription) {
		$tblRules = array();
		$tblRules = $this->getRulesOnShipping2(); // Renvoie des objets Discounts
		if (count($tblRules) > 0) {
			foreach ($tblRules as $rule) {
				if ($commandAmount > floatval($rule->getVar('disc_if_amount'))) {
					$discountsDescription[] = $rule->getVar('disc_description');
					$montantShipping = 0;
				}
			}
		}
	}

	/**
	 * R�ductions � appliquer sur le montant global de la commande
	 *
	 * @param float $montantHT Montant HT des produits
	 * @param array $discountsDescription Descriptions des r�ductions appliqu�es
	 */
	function applyDiscountOnCommand(&$montantHT, &$discountsDescription) {
		global $h_oledrion_commands;
		$tblRules = array();
		$tblRules = $this->getRulesOnCommand(); // Renvoie des objets Discounts
		if (count($tblRules) > 0) {
			$uid = oledrion_utils::getCurrentUserID();
			foreach ($tblRules as $rule) {
				switch ($rule->getVar('disc_when')) {
					case OLEDRION_DISCOUNT_WHEN1: // Dans tous les cas
						if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
							$montantHT = $this->getDiscountedPrice($montantHT, $rule->getVar('disc_amount'));
							if ($montantHT < 0) {
								$montantHT = 0;
							}
						} else { // R�duction de x euros
							$montantHT -= $rule->getVar('disc_amount');
							if ($montantHT < 0) {
								$montantHT = 0;
							}
						}
						$discountsDescription[] = $rule->getVar('disc_description');
						break;

					case OLEDRION_DISCOUNT_WHEN2: // Si c'est le premier achat de l'utilisateur sur le site
						if ($h_oledrion_commands->isFirstCommand($uid)) {
							if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
								$montantHT = $this->getDiscountedPrice($montantHT, $rule->getVar('disc_amount'));
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							} else { // R�duction de x euros
								$montantHT -= $rule->getVar('disc_amount');
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							}
							$discountsDescription[] = $rule->getVar('disc_description');
						}
						break;
				}
			}
		}
	}

	/**
	 * R�ductions � appliquer sur les frais de port de chaque produit
	 *
	 * @param float $montantHT Montant HT des produits
	 * @param array $discountsDescription Descriptions des r�ductions appliqu�es
	 * @param integer $productQty Quantit� command�e du produit
	 */
	function applyDiscountOnShipping(&$montantHT, &$discountsDescription, $productQty) {
		global $h_oledrion_commands;
		$tblRules = array();
		$tblRules = $this->getRulesOnShipping(); // Renvoie des objets Discounts
		if (count($tblRules) > 0) {
			$uid = oledrion_utils::getCurrentUserID();
			foreach ($tblRules as $rule) {
				switch ($rule->getVar('disc_when')) {
					case OLEDRION_DISCOUNT_WHEN1: // Dans tous les cas
						if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
							$montantHT = $this->getDiscountedPrice($montantHT, $rule->getVar('disc_amount'));
							if ($montantHT < 0) {
								$montantHT = 0;
							}
						} else { // R�duction de x euros
							$montantHT -= $rule->getVar('disc_amount');
							if ($montantHT < 0) {
								$montantHT = 0;
							}
						}
						$discountsDescription[] = $rule->getVar('disc_description');
						break;

					case OLEDRION_DISCOUNT_WHEN2: // Si c'est le premier achat de l'utilisateur sur le site
						if ($h_oledrion_commands->isFirstCommand($uid)) {
							if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
								$montantHT = $this->getDiscountedPrice($montantHT, $rule->getVar('disc_amount'));
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							} else { // R�duction de x euros
								$montantHT -= $rule->getVar('disc_amount');
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							}
							$discountsDescription[] = $rule->getVar('disc_description');
						}
						break;

					case OLEDRION_DISCOUNT_WHEN4: // Si la quantit� est =, >, >=, <, <= � ...
						$qtyDiscount = false;
						switch ($rule->getVar('disc_qty_criteria')) {
							case 0: // =
								if ($productQty == $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 1: // >
								if ($productQty > $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 2: // >=
								if ($productQty >= $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 3: // <
								if ($productQty < $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 4: // <=
								if ($productQty <= $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;
						}
						if ($qtyDiscount) {
							if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcents
								$montantHT = $this->getDiscountedPrice($montantHT, $rule->getVar('disc_amount'));
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							} else { // R�duction de x euros
								$montantHT -= $rule->getVar('disc_amount');
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							}
							$discountsDescription[] = $rule->getVar('disc_description');
						}
						break;
				}
			}
		}
	}

	/**
	 * R�ductions � appliquer sur le montant HT de TOUS les produits
	 *
	 * @param float $montantHT Montant HT des produits
	 * @param array $discountsDescription Descriptions des r�ductions appliqu�es
	 * @param integer $productQty Quantit� command�e du produit
	 */
	function applyDiscountOnAllProducts(&$montantHT, &$discountsDescription, $productQty) {
		global $h_oledrion_commands;
		$tblRules = array();
		$tblRules = $this->getRulesOnAllProducts(); // Renvoie des objets Discounts
		if (count($tblRules) > 0) {
			$uid = oledrion_utils::getCurrentUserID();
			foreach ($tblRules as $rule) {
				switch ($rule->getVar('disc_when')) {
					case OLEDRION_DISCOUNT_WHEN1: // Dans tous les cas
						if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
							$montantHT = $this->getDiscountedPrice($montantHT, $rule->getVar('disc_amount'));
							if ($montantHT < 0) {
								$montantHT = 0;
							}
						} else { // R�duction de x euros
							$montantHT -= $rule->getVar('disc_amount');
							if ($montantHT < 0) {
								$montantHT = 0;
							}
						}
						$discountsDescription[] = $rule->getVar('disc_description');
						break;

					case OLEDRION_DISCOUNT_WHEN2: // Si c'est le premier achat de l'utilisateur sur le site
						if ($h_oledrion_commands->isFirstCommand($uid)) {
							if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
								$montantHT = $this->getDiscountedPrice($montantHT, $rule->getVar('disc_amount'));
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							} else { // R�duction de x euros
								$montantHT -= $rule->getVar('disc_amount');
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							}
							$discountsDescription[] = $rule->getVar('disc_description');
						}
						break;

					case OLEDRION_DISCOUNT_WHEN4: // Si la quantit� est =, >, >=, <, <= � ...
						$qtyDiscount = false;
						switch ($rule->getVar('disc_qty_criteria')) {
							case 0: // =
								if ($productQty == $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 1: // >
								if ($productQty > $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 2: // >=
								if ($productQty >= $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 3: // <
								if ($productQty < $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 4: // <=
								if ($productQty <= $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;
						}
						if ($qtyDiscount) {
							if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
								$montantHT = $this->getDiscountedPrice($montantHT, $rule->getVar('disc_amount'));
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							} else { // R�duction de x euros
								$montantHT -= $rule->getVar('disc_amount');
								if ($montantHT < 0) {
									$montantHT = 0;
								}
							}
							$discountsDescription[] = $rule->getVar('disc_description');
						}
						break;
				}
			}
		}
	}

	/**
	 * Recalcul du prix HT du produit en appliquant les r�ductions, s'il y a lieu
	 *
	 * @param integer $productId Identifiant du produit
	 * @param float $prixHT Prix HT du produit
	 * @param array $discountsDescription Descriptions des r�ductions appliqu�es
	 * @param integer $productQty Quantit� command�e du produit
	 */
	function applyDiscountOnEachProduct($productId, &$prixHT, &$discountsDescription, $productQty) {
		global $h_oledrion_commands;
		$rules = array();
		$rules = $this->getRulesOnEachProduct(); // Renvoie des objets Discounts
		if (count($rules) > 0) {
			$uid = oledrion_utils::getCurrentUserID();
			foreach ($rules as $rule) {
				switch ($rule->getVar('disc_when')) {
					case OLEDRION_DISCOUNT_WHEN1: // Dans tous les cas
						if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
							$prixHT = $this->getDiscountedPrice($prixHT, $rule->getVar('disc_amount'));
							if ($prixHT < 0) {
								$prixHT = 0;
							}
						} else { // R�duction de x euros
							$prixHT -= $rule->getVar('disc_amount');
							if ($prixHT < 0) {
								$prixHT = 0;
							}
						}
						$discountsDescription[] = $rule->getVar('disc_description');
						break;

					case OLEDRION_DISCOUNT_WHEN2: // Si c'est le premier achat de l'utilisateur sur le site
						if ($h_oledrion_commands->isFirstCommand($uid)) {
							if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
								$prixHT = $this->getDiscountedPrice($prixHT, $rule->getVar('disc_amount'));
								if ($prixHT < 0) {
									$prixHT = 0;
								}
							} else { // R�duction de x euros
								$prixHT -= $rule->getVar('disc_amount');
								if ($prixHT < 0) {
									$prixHT = 0;
								}
							}
							$discountsDescription[] = $rule->getVar('disc_description');
						}
						break;

					case OLEDRION_DISCOUNT_WHEN3: // Si le produit n'a jamais �t� achet�
						if (!$h_oledrion_commands->productAlreadyBought($uid, $productId)) {
							if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
								$prixHT = $this->getDiscountedPrice($prixHT, $rule->getVar('disc_amount'));
								if ($prixHT < 0) {
									$prixHT = 0;
								}
							} else { // R�duction de x euros
								$prixHT -= $rule->getVar('disc_amount');
								if ($prixHT < 0) {
									$prixHT = 0;
								}
							}
							$discountsDescription[] = $rule->getVar('disc_description');
						}
						break;

					case OLEDRION_DISCOUNT_WHEN4: // Si la quantit� est =, >, >=, <, <= � ...
						$qtyDiscount = false;
						switch ($rule->getVar('disc_qty_criteria')) {
							case 0: // =
								if ($productQty == $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 1: // >
								if ($productQty > $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 2: // >=
								if ($productQty >= $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 3: // <
								if ($productQty < $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;

							case 4: // <=
								if ($productQty <= $rule->getVar('disc_qty_value')) {
									$qtyDiscount = true;
								}
								break;
						}
						if ($qtyDiscount) {
							if ($rule->getVar('disc_percent_monney') == OLEDRION_DISCOUNT_TYPE1) { // R�duction de x pourcent
								$prixHT = $this->getDiscountedPrice($prixHT, $rule->getVar('disc_amount'));
								if ($prixHT < 0) {
									$prixHT = 0;
								}
							} else { // R�duction de x euros
								$prixHT -= $rule->getVar('disc_amount');
								if ($prixHT < 0) {
									$prixHT = 0;
								}
							}
							$discountsDescription[] = $rule->getVar('disc_description');
						}
						break;
				}
			}
		}
	}

	/**
	 * Supprime les remises associ�es � un produit
	 *
	 * @param integer $disc_product_id
	 * @return boolean
	 */
	function removeProductFromDiscounts($disc_product_id) {
		$disc_product_id = intval($disc_product_id);
		return $this->deleteAll(new Criteria('disc_product_id', $disc_product_id, '='));
	}
}
?>