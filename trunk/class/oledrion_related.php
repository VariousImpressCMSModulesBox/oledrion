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
 * Gestion des produits relatifs
 */
require 'classheader.php';

class oledrion_related extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('related_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('related_product_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('related_product_related',XOBJ_DTYPE_INT,null,false);
	}
}


class OledrionOledrion_relatedHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//							Table				Classe					 Id
		parent::__construct($db, 'oledrion_related', 'oledrion_related', 'related_id');
	}

	/**
	 * Supprime les produits relatifs rattachés à un produit
	 *
	 * @param integer $related_product_id	L'identifiant du produit pour lequel il faut faire la suppression
	 */
	function deleteProductRelatedProducts($related_product_id)
	{
		$criteria = new Criteria('related_product_id', $related_product_id, '=');
		$this->deleteAll($criteria);
	}

	/**
	 * Retourne la liste des produits relatifs d'une liste de produits
	 *
	 * @param array $ids	Les ID des produits dont on recherche les produits relatifs
	 * @return array	Objets de type oledrion_related
	 */
	function getRelatedProductsFromProductsIds($ids)
	{
		$ret = array();
		if(is_array($ids)) {
			$criteria = new Criteria('related_product_id', '('.implode(',', $ids).')', 'IN');
			$ret = $this->getObjects($criteria, true, true, '*', false);
		}
		return $ret;
	}
}
?>