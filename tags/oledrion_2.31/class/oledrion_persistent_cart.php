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
 * Panier persistant
 *
 * Lorque l'option correspondante dans le module est activée, tout produit rajouté dans le panier est
 * enregistré en base de données (à condition que l'utilisateur soit connecté).
 * Si l'utilisateur quitte le site et revient plus tard, cela permet de recharger son panier.
 */
require 'classheader.php';

class oledrion_persistent_cart extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('persistent_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('persistent_product_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('persistent_uid',XOBJ_DTYPE_INT,null,false);
		$this->initVar('persistent_date',XOBJ_DTYPE_INT,null,false);
		$this->initVar('persistent_qty',XOBJ_DTYPE_INT,null,false);
	}
}


class OledrionOledrion_persistent_cartHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//						  Table						Classe		 				  Id
		parent::__construct($db, 'oledrion_persistent_cart', 'oledrion_persistent_cart', 'persistent_id');
	}

	/**
	 * Supprime un produit des paniers enregistrés
	 *
	 * @param mixed $persistent_product_id	L'ID du produit à supprimer ou un tableau d'identifiants à supprimer
	 * @return boolean
	 */
	function deleteProductForAllCarts($persistent_product_id)
	{
	    if(oledrion_utils::getModuleOption('persistent_cart') ==  0) {
	        return true;
	    }
		if(is_array($persistent_product_id)) {
			$criteria = new Criteria('persistent_product_id', '('.implode(',', $persistent_product_id).')', 'IN');
		} else {
			$criteria = new Criteria('persistent_product_id', $persistent_product_id, '=');
		}
		return $this->deleteAll($criteria);
	}

	/**
	 * Purge des produits d'un utilisateur
	 *
	 * @param integer $persistent_uid	L'identifiant de l'utilisateur
	 * @return boolean	Le résultat de la suppression
	 */
	function deleteAllUserProducts($persistent_uid = 0)
	{
	    if(oledrion_utils::getModuleOption('persistent_cart') ==  0) {
	        return true;
	    }
		$persistent_uid = $persistent_uid == 0 ? oledrion_utils::getCurrentUserID() : $persistent_uid;

		$criteria = new Criteria('persistent_uid', $persistent_uid, '=');
		return $this->deleteAll($criteria);
	}

	/**
	 * Supprime UN produit d'un utilisateur
	 *
	 * @param integer $persistent_product_id	L'identifiant du produit
	 * @param integer $persistent_uid	L'identifiant de l'utilisateur
	 * @return boolean	Le résultat de la suppression
	 */
	function deleteUserProduct($persistent_product_id, $persistent_uid = 0)
	{
	    if(oledrion_utils::getModuleOption('persistent_cart') ==  0) {
	        return true;
	    }
		$persistent_uid = $persistent_uid == 0 ? oledrion_utils::getCurrentUserID() : $persistent_uid;
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('persistent_uid', $persistent_uid, '='));
		$criteria->add(new Criteria('persistent_product_id', $persistent_product_id, '='));
		return $this->deleteAll($criteria);
	}

	/**
	 * Ajoute un produit au panier d'un utilisateur
	 *
	 * @param integer $persistent_product_id	L'ID du produit
	 * @param integer $persistent_qty	La quantité de produits
	 * @param integer $persistent_uid	L'ID de l'utilisateur
	 * @return boolean	Le résultat de l'ajout du produit
	 */
	function addUserProduct($persistent_product_id, $persistent_qty, $persistent_uid = 0)
	{
	    if(oledrion_utils::getModuleOption('persistent_cart') ==  0) {
	        return true;
	    }
		$persistent_uid = $persistent_uid == 0 ? oledrion_utils::getCurrentUserID() : $persistent_uid;
		$persistent_cart = $this->create(true);
		$persistent_cart->setVar('persistent_product_id', $persistent_product_id);
		$persistent_cart->setVar('persistent_uid', $persistent_uid);
		$persistent_cart->setVar('persistent_date', time());
		$persistent_cart->setVar('persistent_qty', $persistent_qty);
		return $this->insert($persistent_cart, true);
	}

    /**
     * Mise à jour de la quantité de produit d'un utilisateur
     *
     * @param integer $persistent_product_id	L'identifiant du produit
     * @param integer $persistent_qty	La quantité de produit
     * @param integer $persistent_uid	L'ID de l'utilisateur
     * @return boolean	Le résultat de la mise à jour
     */
	function updateUserProductQuantity($persistent_product_id, $persistent_qty, $persistent_uid = 0)
	{
	    if(oledrion_utils::getModuleOption('persistent_cart') ==  0) {
	        return true;
	    }
		$persistent_uid = $persistent_uid == 0 ? oledrion_utils::getCurrentUserID() : $persistent_uid;
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('persistent_uid', $persistent_uid, '='));
		$criteria->add(new Criteria('persistent_product_id', $persistent_product_id, '='));
		return $this->updateAll('persistent_qty', $persistent_qty, $criteria, true);
	}

    /**
     * Indique s'il existe un panier pour un utilisateur
     *
     * @param integer $persistent_uid	L'id de l'utilisateur
     * @return boolean
     */
	function isCartExists($persistent_uid = 0)
	{
	    if(oledrion_utils::getModuleOption('persistent_cart') ==  0) {
	        return false;
	    }
		$persistent_uid = $persistent_uid == 0 ? oledrion_utils::getCurrentUserID() : $persistent_uid;
		$criteria = new Criteria('persistent_uid', $persistent_uid, '=');
		return (bool) $this->getCount($criteria);
	}

    /**
     * Retourne les produits d'un utilisateur
     *
     * @param integer $persistent_uid	L'ID de l'utilisateur
     * @return array	Tableaux d'objets de type oledrion_persistent_cart
     */
	function getUserProducts($persistent_uid = 0)
	{
	    if(oledrion_utils::getModuleOption('persistent_cart') ==  0) {
	        return false;
	    }
		$persistent_uid = $persistent_uid == 0 ? oledrion_utils::getCurrentUserID() : $persistent_uid;
		$criteria = new Criteria('persistent_uid', $persistent_uid, '=');
		return $this->getObjects($criteria);
	}
}
?>