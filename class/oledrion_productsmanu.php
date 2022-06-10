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
 * Classe chargée de faire la liaison entre les produits et les fabricants
 */
require 'classheader.php';

class oledrion_productsmanu extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('pm_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('pm_product_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('pm_manu_id',XOBJ_DTYPE_INT,null,false);
		// Pour autoriser le html
		$this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
	}
}


class OledrionOledrion_productsmanuHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//							Table					Classe				Id
		parent::__construct($db, 'oledrion_productsmanu', 'oledrion_productsmanu', 'pm_id');
	}

	/**
	 * Retourne le nombre de produits associé à un fabricant
	 *
	 * @param integer $pm_manu_id	L'identifiant du fabricant
	 * @return integer	Le nombre de fabricants
	 */
	function getManufacturerProductsCount($pm_manu_id)
	{
		$criteria = new Criteria('pm_manu_id', $pm_manu_id, '=');
		return $this->getCount($criteria);
	}

	/**
	 * Retourne des fabricants de produits en fonction de leur IDs
	 *
	 * @param array $ids	Les identifiants des produits
	 * @return array	Tableau d'objets de type oledrion_productsmanu
	 */
	function getFromProductsIds($ids)
	{
		$ret = array();
		if(is_array($ids)) {
			$criteria = new Criteria('pm_product_id', '('.implode(',', $ids).')', 'IN');
			$ret = $this->getObjects($criteria, true, true, '*', false);
		}
		return $ret;
	}

	/**
	 * Retourne les identifiants des produits d'un fabricant
	 *
	 * @param intege $pm_manu_id	L'identifiant du fabricant
	 * @return array	Les ID des produits
	 */
	function getProductsIdsFromManufacturer($pm_manu_id, $start = 0, $limit = 0)
	{
		$ret = array();
		$criteria = new Criteria('pm_manu_id', $pm_manu_id , '=');
		$criteria->setStart($start);
		$criteria->setLimit($limit);
		$items = $this->getObjects($criteria, false, false, 'pm_product_id', false);
		if(count($items) > 0) {
			foreach($items as $item) {
				$ret[] = $item['pm_product_id'];
			}
		}
		return $ret;
	}

	/**
	 * Supprime un produit d'un fabricant
	 *
	 * @param integer $pm_product_id
	 * @return boolean
	 */
	function removeManufacturerProduct($pm_product_id)
	{
		$pm_product_id = intval($pm_product_id);
		return $this->deleteAll(new criteria('pm_product_id', $pm_product_id, '='));
	}
}
?>