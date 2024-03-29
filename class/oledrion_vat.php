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
 * Gestion des TVA
 */
require 'classheader.php';

class oledrion_vat extends Oledrion_Object {

	function __construct() {
		$this->initVar('vat_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('vat_rate', XOBJ_DTYPE_TXTBOX, null, false);
	}

	function toArray($format = 's') {
		$ret = array();
		$ret = parent::toArray($format);
		$oledrion_Currency = oledrion_Currency::getInstance();
		$ret['vat_rate_formated'] = $oledrion_Currency->amountInCurrency(floatval($this->getVar('vat_rate', 'e')));
		return $ret;
	}
}

class OledrionOledrion_vatHandler extends Oledrion_XoopsPersistableObjectHandler {

	function __construct($db) { // Table Classe Id
		parent::__construct($db, 'oledrion_vat', 'oledrion_vat', 'vat_id');
	}

	/**
	 * Renvoie la liste de toutes les TVA du module
	 *
	 * @param integer $start Position de d�part
	 * @param integer $limit Nombre total d'enregistrements � renvoyer
	 * @param string $order Champ sur lequel faire le tri
	 * @param string $order Ordre du tri
	 * @param boolean $idaskey Indique si le tableau renvoy� doit avoir pour cl� l'identifiant unique de l'enregistrement
	 * @return array tableau d'objets de type TVA
	 */
	function getAllVats(oledrion_parameters $parameters) {
		$parameters = $parameters->extend(new oledrion_parameters(array(
			'start' => 0,
			'limit' => 0,
			'sort' => 'vat_id',
			'order' => 'ASC',
			'idaskey' => true)));
		$critere = new Criteria('vat_id', 0, '<>');
		$critere->setLimit($parameters['limit']);
		$critere->setStart($parameters['start']);
		$critere->setSort($parameters['sort']);
		$critere->setOrder($parameters['order']);
		$vats = array();
		$vats = $this->getObjects($critere, $parameters['idaskey']);
		return $vats;
	}

	/**
	 * Suppression d'une TVA
	 *
	 * @param oledrion_vat $vat
	 * @return boolean Le r�sultat de la suppressin
	 */
	function deleteVat(oledrion_vat $vat) {
		return $this->delete($vat, true);
	}

	/**
	 * Retourne le nombre de produits associ�s � une TVA
	 *
	 * @param integer $vat_id L'ID de la TVA
	 * @return integer Le nombre de produits
	 */
	function getVatProductsCount($vat_id) {
		global $h_oledrion_products;
		return $h_oledrion_products->getVatProductsCount($vat_id);
	}
}
?>