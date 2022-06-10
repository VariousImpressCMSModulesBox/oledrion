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
 * Gestion des options des passerelles de paiement
 */
require 'classheader.php';

class oledrion_gateways_options extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('option_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('option_gateway', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('option_name', XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar('option_value',XOBJ_DTYPE_TXTAREA, null, false);
	}
}


class OledrionOledrion_gateways_optionsHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//							    Table					    Classe				        Id
		parent::__construct($db, 'oledrion_gateways_options', 'oledrion_gateways_options', 'option_id');
	}

    /**
     * Retourne toutes les options d'une passerelle de paiement
     *
     * @param string $option_gateway	Le nom de la passerelle de paiement
     * @return array	Tableau d'objets de type oledrion_gateways_options
     */
	function getGatewayOptions($option_gateway)
	{
	    $criteria = new Criteria('option_gateway', $option_gateway, '=');
	    return $this->getObjects($criteria);
	}

    /**
     * Supprime toutes les options d'une passerelle de paiement
     *
     * @param string $option_gateway
     * @return boolean	Le r�sultat de la suppression des options
     */
	function deleteGatewayOptions($option_gateway)
	{
	    $criteria = new Criteria('option_gateway', $option_gateway, '=');
	    return $this->deleteAll($criteria);
	}

    /**
     * Retourne une option d'une passerelle de paiement
     *
     * @param string $option_gateway	Le nom de la passerelle de paiement
     * @param string $option_name		L'option que l'on souhaite r�cup�rer
     * @return object	Objet de type oledrion_gateways_options
     */
	function getGatewayOption($option_gateway, $option_name)
	{
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('option_gateway', $option_gateway, '='));
		$criteria->add(new Criteria('option_name', $option_name, '='));
		return $this->getObjects($criteria);
	}

    /**
     * Retourne la VALEUR d'une option d'une passerelle de paiement
     *
     * @param string $option_gateway	Le nom d'une passerelle de paiement
     * @param string $option_name		L'option que l'on souhaite r�cup�rer
     * @param string $format			Le format dans lequel on souhaite r�cup�rer la valeur (par rapport au getVar())
     * @param boolean $unserialize		Indique s'il faut d�s�rialiser la valeur de retour
     * @return mixed	La valeur de l'option ou null si l'option ne peut pas �tre trouv�e
     */
	function getGatewayOptionValue($option_gateway, $option_name, $format = 'N', $unserialize = false)
	{
	    $ret = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('option_gateway', $option_gateway, '='));
		$criteria->add(new Criteria('option_name', $option_name, '='));
		$ret = $this->getObjects($criteria);
		if(count($ret) > 0) {
		    if($unserialize) {
                return unserialize($ret[0]->getVar('option_value', $format));
		    } else {
		        return $ret[0]->getVar('option_value', $format);
		    }
		} else {
		    return null;
		}
	}

    /**
     * Positionne la valeur d'une option d'une passerelle de paiement et l'enregistre
     *
     * @param string $option_gateway	 Le nom de la passerelle de paiement
     * @param string $option_name		 Le nom de l'option
     * @param mixed $option_value		 La valeur de l'option
     * @param boolean $serialize		Indique s'il faut s�rialiser la valeur avant de l'enregistrer
     * @return boolean					Le r�sultat de la mise � jour (vrai si la mise � jour s'est faite sinon faux)
     */
	function setGatewayOptionValue($option_gateway, $option_name, $option_value, $serialize = false)
	{
	    $ret = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('option_gateway', $option_gateway, '='));
		$criteria->add(new Criteria('option_name', $option_name, '='));
		$ret = $this->getObjects($criteria);
		if(count($ret) > 0) {
		    $option = $ret[0];
		    if($serialize) {
                $option->setVar('option_value', serialize($option_value));
		    } else {
                $option->setVar('option_value', $option_value);
		    }
		    return $this->insert($option, true);
		} else {    // Option introuvable, on va la cr�er
		    $option = $this->create(true);
		    $option->setVar('option_gateway', $option_gateway);
		    $option->setVar('option_name', $option_name);
		    $option->setVar('option_value', $option_value);
		    return $this->insert($option, true);
		}
	}
}
?>