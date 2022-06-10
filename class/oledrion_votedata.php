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
 * Gestion des votes sur les produits
 */
require 'classheader.php';

class oledrion_votedata extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('vote_ratingid',XOBJ_DTYPE_INT,null,false);
		$this->initVar('vote_product_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('vote_uid',XOBJ_DTYPE_INT,null,false);
		$this->initVar('vote_rating',XOBJ_DTYPE_INT,null,false);
		$this->initVar('vote_ratinghostname',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('vote_ratingtimestamp',XOBJ_DTYPE_INT,null,false);
	}
}


class OledrionOledrion_votedataHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//								Table					Classe			 Id
		parent::__construct($db, 'oledrion_votedata', 'oledrion_votedata', 'vote_ratingid');
	}


	/**
	 * Renvoie le nombre total de votes pour un produit ainsi que la sommes des votes
	 *
	 * @param integer $product_id Identifiant du produit
	 * @param integer $totalVotes Variable pass�e par r�f�rence et devant contenir le nombre total de votes du produit
	 * @param integer $sumRating Variable pass�e par r�f�rence et devant contenir le cumul des votes
	 * @return none Rien
	 */
	function getCountRecordSumRating($product_id, &$totalVotes, &$sumRating)
	{
		$sql = "SELECT count( * ) AS cpt, sum( vote_rating ) AS sum_rating FROM ".$this->table." WHERE vote_product_id = ".intval($product_id);
        $result = $this->db->query($sql);
        if (!$result) {
            return 0;
        } else {
     		$myrow = $this->db->fetchArray($result);
			$totalVotes = $myrow['cpt'];
			$sumRating = $myrow['sum_rating'];
        }
	}

	/**
	 * Returns the (x) last votes
	 *
	 * @param integer $start Starting position
	 * @param integer $limit count of items to return
	 * @return array Array of votedata objects
	 */
	function getLastVotes($start = 0, $limit = 0)
	{
		$tbl_datas = array();
		$criteria = new Criteria('vote_ratingid', 0, '<>');
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort('vote_ratingtimestamp');
		$criteria->setOrder('DESC');
		$tbl_datas = $this->getObjects($criteria, true);
		return $tbl_datas;
	}

	/**
	 * Suppression des votes d'un produit
	 *
	 * @param integer $vote_product_id	L'identifiant du produit
	 * @return le r�sultat de la suppression
	 */
	function deleteProductRatings($vote_product_id)
	{
		$criteria = new Criteria('vote_product_id', $vote_product_id, '=');
		return $this->deleteAll($criteria);
	}

	/**
	 * Indique si un utilisateur a d�j� vot� pour un produit
	 *
	 * @param integer $vote_uid	L'identifiant de l'utilisateur
	 * @param integer $vote_product_id	Le num�ro du produit
	 * @return boolean	True s'il a d�j� vot� sinon False
	 */
	function hasUserAlreadyVoted($vote_uid, $vote_product_id)
	{
		if($vote_uid == 0) {
			$vote_uid = oledrion_utils::getCurrentUserID();
		}
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('vote_product_id', $vote_product_id, '='));
		$criteria->add(new Criteria('vote_uid', $vote_uid, '='));
		$count = $this->getCount($criteria);
		if($count > 0 ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Indique si un utilisateur anonyme a d�j� vot� (d'apr�s son adresse IP)
	 *
	 * @param string $ip	L'adresse IP
	 * @param integer $vote_product_id	Ld'identifiant du produit
	 * @return boolean
	 */
	function hasAnonymousAlreadyVoted($ip = '', $vote_product_id = 0)
	{
		if($ip == '') {
			$ip = oledrion_utils::IP();
		}
		$anonwaitdays = 1;
		$yesterday = (time()-(86400 * $anonwaitdays));
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('vote_product_id', $vote_product_id, '='));
		$criteria->add(new Criteria('vote_uid', 0, '='));
		$criteria->add(new Criteria('vote_ratinghostname', $ip, '='));
		$criteria->add(new Criteria('vote_ratingtimestamp', $yesterday, '>'));
		$count = $this->getCount($criteria);
		if($count > 0 ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Cr�e un vote pour un produit
	 *
	 * @param integer $vote_product_id	L'identifiant du produit
	 * @param integer $vote_uid	L'identifiant de l'utilisateur
	 * @param integer $vote_rating	Le vote
	 * @return le r�sultat de la cr�ation du vote
	 */
	function createRating($vote_product_id, $vote_uid, $vote_rating)
	{
		$product = $this->create(true);
		$product->setVar('vote_product_id', $vote_product_id);
		$product->setVar('vote_uid', $vote_uid);
		$product->setVar('vote_rating', $vote_rating);
		$product->setVar('vote_ratinghostname', oledrion_utils::IP());
		$product->setVar('vote_ratingtimestamp', time());
		return $this->insert($product);
	}
}
?>