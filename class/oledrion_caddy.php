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
 * Gestion des caddy
 */
require 'classheader.php';

class oledrion_caddy extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('caddy_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('caddy_product_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('caddy_qte',XOBJ_DTYPE_INT,null,false);
		$this->initVar('caddy_price',XOBJ_DTYPE_TXTBOX,null,false);			// Prix TTC
		$this->initVar('caddy_cmd_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('caddy_shipping',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('caddy_pass',XOBJ_DTYPE_TXTBOX,null,false);
	}

	/**
	 * Retourne les �l�ments du produits format�s pour affichage
	 *
	 * @param string $format	Le format � utiliser
	 * @return array	Les informations format�es
	 */
	function toArray($format = 's')
	{
		$ret = array();
		$ret = parent::toArray($format);
		$oledrion_Currency = oledrion_Currency::getInstance();
		$ret['caddy_price_fordisplay'] = $oledrion_Currency->amountForDisplay($this->getVar('caddy_price'));
		$ret['caddy_shipping_fordisplay'] = $oledrion_Currency->amountForDisplay($this->getVar('caddy_shipping'));
		return $ret;
	}
}


class OledrionOledrion_caddyHandler extends Oledrion_XoopsPersistableObjectHandler
{
	const CADDY_NAME =	'oledrion_caddie';	// Nom du panier en session

	function __construct($db)
	{	//						  Table				Classe		 	Id
		parent::__construct($db, 'oledrion_caddy', 'oledrion_caddy', 'caddy_id');
	}

	/**
	 * Renvoie, si on en trouve un, un produit qui s'est bien vendu avec un produit particulier
	 *
	 * @param integer $caddy_product_id Identifiant du produit dont on recherche le jumeau
	 * @return integer Le n� du produit le plus vendu avec le produit en question
	 */
	function getBestWith($caddy_product_id)
	{
		$sql = 'SELECT caddy_product_id, sum(caddy_qte) mv FROM '.$this->table.' WHERE caddy_cmd_id IN (SELECT caddy_cmd_id FROM '.$this->table.' WHERE caddy_product_id='.intval($caddy_product_id).') GROUP BY caddy_product_id ORDER BY mv DESC';
		$result = $this->db->query($sql, 1);
        if (!$result) {
            return 0;
        }
        $myrow = $this->db->fetchArray($result);
        $id = $myrow['caddy_product_id'];
        if($id != $caddy_product_id) {
        	return $id;
        } else {
        	return 0;
        }
	}


	/**
	 * Renvoie la liste des produits les plus vendus toutes cat�gories confondues
	 *
	 * @param integer $start D�but de la recherche
	 * @param integer $limit Nombre maximum d'enregistrements � retourner
	 * @return array Les identifiants des X produits les plus vendus dans cette cat�gorie
	 */
	function getMostSoldProducts($start = 0, $limit = 0, $product_cid = 0, $withQuantity=false)
	{
	    require_once 'lite.php';
		$ret = array();
		if(is_array($product_cid) && count($product_cid) > 0) {
			$sql = 'SELECT c.caddy_product_id, sum( c.caddy_qte ) AS mv FROM '.$this->table.' c, '.$this->db->prefix('oledrion_products').' b WHERE (c.caddy_product_id = b.product_id) AND b.product_cid IN ('.implode(',', $product_cid).') GROUP BY c.caddy_product_id ORDER BY mv DESC';
		} elseif($product_cid > 0) {
			$sql = 'SELECT c.caddy_product_id, sum( c.caddy_qte ) AS mv FROM '.$this->table.' c, '.$this->db->prefix('oledrion_products').' b WHERE (c.caddy_product_id = b.product_id) AND b.product_cid = '.intval($product_cid).' GROUP BY c.caddy_product_id ORDER BY mv DESC';
		} else {
			$sql = 'SELECT caddy_product_id, sum( caddy_qte ) as mv FROM '.$this->table.' GROUP BY caddy_product_id ORDER BY mv DESC';
		}
		$Cache_Lite = new oledrion_Cache_Lite($this->cacheOptions);
		$id = $this->_getIdForCache($sql, $start, $limit);
		$cacheData = $Cache_Lite->get($id);
		if ($cacheData === false) {
            $result = $this->db->query($sql, $limit, $start);
            if ($result) {
    			while ($myrow = $this->db->fetchArray($result)) {
				    if(!$withQuantity) {
    					$ret[$myrow['caddy_product_id']] = $myrow['caddy_product_id'];
				    } else {
    					$ret[$myrow['caddy_product_id']] = $myrow['mv'];
				    }
			    }
            }
            $Cache_Lite->save($ret);
            return $ret;
		} else {
		    return $cacheData;
		}
	}

    /**
     * Retourne la liste des ID de produits vendus r�cemment
     *
     * @param integer $start
     * @param integer $limit
     * @return array
     * @since 2.3.2009.04.08
     */
	function getRecentlySoldProducts($start = 0, $limit = 0)
	{
	    require_once 'lite.php';
	    $ret = array();
	    $sql = 'SELECT c.caddy_product_id FROM '.$this->table.' c, '.$this->db->prefix('oledrion_commands').' o WHERE (c.caddy_cmd_id = o.cmd_id) AND (o.cmd_state = '.OLEDRION_STATE_VALIDATED.') ORDER BY cmd_date DESC';
		$Cache_Lite = new oledrion_Cache_Lite($this->cacheOptions);
		$id = $this->_getIdForCache($sql, $start, $limit);
		$cacheData = $Cache_Lite->get($id);
		if ($cacheData === false) {
            $result = $this->db->query($sql, $limit, $start);
            if ($result) {
    			while ($row = $this->db->fetchArray($result)) {
   					$ret[$row['caddy_product_id']] = $row['caddy_product_id'];
			    }
            }
            $Cache_Lite->save($ret);
            return $ret;
		} else {
		    return $cacheData;
		}
	}


	/**
	 * Indique si le caddy est vide ou pas
	 *
	 * @return boolean vide, ou pas...
	 */
	function isCartEmpty()
	{
		if(isset($_SESSION[self::CADDY_NAME])) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Vidage du caddy, s'il existe
	 */
	function emptyCart()
	{
	    global $xoopsUser, $h_oledrion_persistent_cart;
		if(isset($_SESSION[self::CADDY_NAME])) {
			unset($_SESSION[self::CADDY_NAME]);
			if(is_object($xoopsUser)) {
                $h_oledrion_persistent_cart->deleteAllUserProducts();
			}
		}
	}

    /**
     * Recharge le dernier panier de l'utilisateur
     *
     * @return boolean
     */
	function reloadPersistentCart()
    {
        global $xoopsUser, $h_oledrion_persistent_cart;
	    if(oledrion_utils::getModuleOption('persistent_cart') ==  0) {
	        return false;
	    }
	    if(is_object($xoopsUser)) {
	        $persistent_carts = array();
	        $persistent_carts = $h_oledrion_persistent_cart->getUserProducts();
	        if(count($persistent_carts) > 0) {
	            foreach($persistent_carts as $persistent_cart) {
	                $this->addProduct($persistent_cart->getVar('persistent_product_id'), $persistent_cart->getVar('persistent_qty'), null);
	            }
	        }
	    }
	    return true;
    }

	/**
	 * Ajout d'un produit au caddy
	 *
	 * @param integer $product_id Identifiant du produit
	 * @param integer $quantity Quantit� � ajouter
	 * @param array $attributes	Les attributs du produit
	 * @return void
	 * @note : Structure du panier (tableau en session) :
	 * 		[cl�] = num�ro de 1 � N
	 * 		[valeur] = array (
	 * 					'number' => num�ro de 1 � N
	 * 					'id' => ID du produit
	 * 					'qty' => Quantit� de produit
	 * 					'attributes' => array(
	 * 										'attr_id' => id attribut (son num�ro dans la base)
	 * 										'values' => array(valueId1, valueId2 ...)
	 * 									)
	 * 						)
	 */
	function addProduct($product_id, $quantity, $attributes = null)
	{
	    global $xoopsUser, $h_oledrion_persistent_cart;
		$tbl_caddie = $tbl_caddie2 = array();
		if(isset($_SESSION[self::CADDY_NAME])) {
			$tbl_caddie = $_SESSION[self::CADDY_NAME];
		}
		$exists = false;
		foreach($tbl_caddie as $produit) {
			if($produit['id'] == $product_id) {
				$exists = true;
				$produit['qty'] += $quantity;
				$produit['attributes'] = $attributes;
				$newQuantity = $produit['qty'];
			}
			$tbl_caddie2[] = $produit;
		}
		if(!$exists) {
			if(is_object($xoopsUser)) {
			    $h_oledrion_persistent_cart->addUserProduct($product_id, $quantity);
			}
			$datas = array();
			$datas['number'] = count($tbl_caddie) + 1;
			$datas['id'] = $product_id;
			$datas['qty'] = $quantity;
			$datas['attributes'] = $attributes;
			$tbl_caddie[] = $datas;
			$_SESSION[self::CADDY_NAME] = $tbl_caddie;
		} else {
			$_SESSION[self::CADDY_NAME] = $tbl_caddie2;
			if(is_object($xoopsUser)) {    // Le produit �tait d�j� dans le panier, on va mettre � jour la quantit�
			    $h_oledrion_persistent_cart->updateUserProductQuantity($product_id, $newQuantity);
			}
		}
	}

    /**
     * Inidique si un produit est dans le caddy
     *
     * @param integer $caddy_product_id	Le num�ro interne du produit dans la table Produits
     * @return mixed	False si le produit n'est pas dans le caddy sinon son indice dans le caddy
     * @since 2.3.2009.03.15
     */
	function isInCart($caddy_product_id)
	{
		$cart = array();
		if(isset($_SESSION[self::CADDY_NAME])) {
			$cart = $_SESSION[self::CADDY_NAME];
		} else {
		    return false;
		}
		$counter = 0;
		foreach($cart as $produit) {
			if($produit['id'] == $caddy_product_id) {
				return $counter;
			}
			$counter++;
		}
		return false;
	}

    /**
     * Retourne les attributs d'un produit depuis le panier
     *
     * @param integer $caddy_product_id	Le num�ro interne du produit dans la table Produits
     * @return mixed	False si le produit n'est pas dans le caddy sinon ses attributs sous la forme d'un tableau
     * @since 2.3.2009.03.15
	 */
	function getProductAttributesFromCart($caddy_product_id)
	{
		$cart = array();
		if(isset($_SESSION[self::CADDY_NAME])) {
			$cart = $_SESSION[self::CADDY_NAME];
		} else {
		    return false;
		}
		foreach($cart as $produit) {
			if($produit['id'] == $caddy_product_id) {
				return $produit['attributes'];
			}
		}
		return false;
	}


    /**
     * Renum�rotage des produits dans le caddy apr�s une suppression
     *
     * @param array	$caddy	Le caddy actuel
     * @return array	Le caddy avec 'number' renum�rot�
     */
	private function renumberCart($caddy)
	{
        $newCaddy = array();
        $counter = 1;
        foreach($caddy as $values) {
            $temporary = array();
            $temporary['number'] = $counter;
            $temporary['id'] = $values['id'];
            $temporary['qty'] = $values['qty'];
            $temporary['attributes'] = $values['attributes'];
            $newCaddy[] = $temporary;
            $counter++;
        }
        return $newCaddy;
	}

	/**
	 * Suppression d'un produit du caddy
	 *
	 * @param integer $indice Indice de l'�l�ment � supprimer
	 */
	function deleteProduct($indice)
	{
	    global $xoopsUser, $h_oledrion_persistent_cart;
		$tbl_caddie = array();
		if(isset($_SESSION[self::CADDY_NAME])) {
			$tbl_caddie = $_SESSION[self::CADDY_NAME];
			if(isset($tbl_caddie[$indice])) {
				if(is_object($xoopsUser)) {
			        $datas = array();
				    $datas = $tbl_caddie[$indice];
				    $h_oledrion_persistent_cart->deleteUserProduct($datas['id']);
				}
			    unset($tbl_caddie[$indice]);
				if(count($tbl_caddie) > 0) {
				    $tbl_caddie = $this->renumberCart($tbl_caddie);
					$_SESSION[self::CADDY_NAME] = $tbl_caddie;
				} else {
					unset($_SESSION[self::CADDY_NAME]);
				}
			}
		}
	}

	/**
	 * Mise � jour des quantit�s du caddy suite � la validation du formulaire du caddy
	 */
	function updateQuantites()
	{
		global $h_oledrion_products, $xoopsUser, $h_oledrion_persistent_cart;
		$tbl_caddie = $tbl_caddie2 = array();
		if(isset($_SESSION[self::CADDY_NAME])) {
			$tbl_caddie = $_SESSION[self::CADDY_NAME];
			foreach($tbl_caddie as $produit) {
				$number = $produit['number'];
				$name = 'qty_'.$number;
				if(isset($_POST[$name])) {
					$valeur = intval($_POST[$name]);
					if($valeur > 0) {
						$product_id = $produit['id'];
						$product = null;
						$product = $h_oledrion_products->get($product_id);
						if(is_object($product)) {
							if($product->getVar('product_stock') - $valeur > 0) {
								$produit['qty'] = $valeur;
								$tbl_caddie2[] = $produit;
							} else {
								$produit['qty'] = $product->getVar('product_stock');
								$tbl_caddie2[] = $produit;
							}
							if(is_object($xoopsUser)) {
							    $h_oledrion_persistent_cart->updateUserProductQuantity($product_id, $produit['qty']);
							}
						}
					}
				} else {
				    $tbl_caddie2[] = $produit;
				}
			}
			if(count($tbl_caddie2) > 0 ) {
				$_SESSION[self::CADDY_NAME] = $tbl_caddie2;
			} else {
				unset($_SESSION[self::CADDY_NAME]);
			}
		}
	}

	/**
	 * Renvoie les �l�ments constituants une commande
	 *
	 * @param integer $caddy_cmd_id Identifiant de la commande
	 * @return array Tableau d'objets caddy
	 */
	function getCaddyFromCommand($caddy_cmd_id)
	{
		$ret = array();
		$critere = new Criteria('caddy_cmd_id', $caddy_cmd_id, '=');
		$ret = $this->getObjects($critere);
		return $ret;
	}

	/**
	 * Retourne tous les produits d'un caddy
	 *
	 * @param array $carts	Objets de type oledrion_caddy
	 * @return array	Tableau d'objets de type oledrion_products, Cl� = Id produit
	 * @since 2.31.2009.07.25
	 */
	function getProductsFromCaddy($carts)
	{
		$ret = $productsIds = array();
		foreach($carts as $cart) {
			$productsIds[] = $cart->getVar('caddy_product_id');
		}
		if(count($productsIds) > 0) {
			$handlers = oledrion_handler::getInstance();
			$ret = $handlers->h_oledrion_products->getProductsFromIDs($productsIds, true);
		}
		return $ret;
	}

	/**
	 * Renvoie les ID de commandes pour un produit achet�
	 *
	 * @param integer $product_id Identifiant du produit
	 * @return array Les ID des commandes dans lesquelles ce produit a �t� command�
	 */
	function getCommandIdFromProduct($product_id)
	{
		$ret = array();
		$sql = 'SELECT caddy_cmd_id FROM '.$this->table.' WHERE caddy_product_id='.intval($product_id);
		$result = $this->db->query($sql);
        if (!$result) {
            return $ret;
        }
        while($myrow = $this->db->fetchArray($result)) {
        	$ret[] = $myrow['caddy_cmd_id'];
        }
        return $ret;
	}

	/**
	 * Retourne un caddy � partir de son mot de passe
	 *
	 * @param string $caddy_pass	Le mot de passe � utiliser
	 * @return mixed Soit un object de type oledrion_caddy ou null
	 */
	function getCaddyFromPassword($caddy_pass)
	{
		$ret = null;
		$caddies = array();
		$critere = new Criteria('caddy_pass', $caddy_pass, '=');
		$caddies = $this->getObjects($critere);
		if(count($caddies) > 0) {
			$ret = $caddies[0];
		}
		return $ret;
	}

	/**
	 * Marque un caddy comme ayant �t� t�l�charg�
	 *
	 * @param oledrion_caddy $caddy
	 * @return boolean	Le r�sultat de la mise � jour
	 */
	function markCaddyAsNotDownloadableAnyMore(oledrion_caddy $caddy)
	{
		$caddy->setVar('caddy_pass', '');
		return $this->insert($caddy, true);
	}

	/**
	 * Supprime les caddies associ�s � une commande
	 *
	 * @param integer $caddy_cmd_id
	 * @return boolean
	 */
	function removeCartsFromOrderId($caddy_cmd_id)
	{
		$caddy_cmd_id = intval($caddy_cmd_id);
		return $this->deleteAll(new criteria('caddy_cmd_id', $caddy_cmd_id, '='));
	}
}
?>