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
 * Gestion des cat�gories de produits
 */

require 'classheader.php';

class oledrion_cat extends Oledrion_Object
{
	function __construct()
	{
		$this->initVar('cat_cid',XOBJ_DTYPE_INT,null,false);
		$this->initVar('cat_pid',XOBJ_DTYPE_INT,null,false);
		$this->initVar('cat_title',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('cat_imgurl',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('cat_description',XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('cat_advertisement',XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('cat_metakeywords',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('cat_metadescription',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('cat_metatitle',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('cat_footer',XOBJ_DTYPE_TXTAREA, null, false);
		// Pour autoriser le html
		$this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
	}

	/**
	 * Retourne l'URL de l'image de la cat�gorie courante
	 * @return string	L'URL
	 */
	function getPictureUrl()
	{
		return OLEDRION_PICTURES_URL.'/'.$this->getVar('cat_imgurl');
	}

	/**
	 * Retourne le chemin de l'image de la cat�gorie courante
	 * @return string	Le chemin
	 */
	function getPicturePath()
	{
		return OLEDRION_PICTURES_PATH.DIRECTORY_SEPARATOR.$this->getVar('cat_imgurl');
	}

	/**
	 * Indique si l'image de la cat�gorie existe
	 *
	 * @return boolean	Vrai si l'image existe sinon faux
	 */
	function pictureExists()
	{
		$return = false;
		if(xoops_trim($this->getVar('cat_imgurl')) != '' && file_exists(OLEDRION_PICTURES_PATH.DIRECTORY_SEPARATOR.$this->getVar('cat_imgurl'))) {
			$return = true;
		}
		return $return;
	}

	/**
	 * Supprime l'image associ�e � une cat�gorie
	 * @return void
	 */
	function deletePicture()
	{
		if($this->pictureExists()) {
			@unlink(OLEDRION_PICTURES_PATH.DIRECTORY_SEPARATOR.$this->getVar('cat_imgurl'));
		}
		$this->setVar('cat_imgurl', '');
	}

	/**
	 * Retourne l'url � utiliser pour acc�der � la cat�gorie en tenant compte des pr�f�rences du module
	 *
	 * @return string	L'url � utiliser
	 */
	function getLink()
	{
		$url = '';
		if(oledrion_utils::getModuleOption('urlrewriting') == 1) {	// On utilise l'url rewriting
			$url = OLEDRION_URL.'category-'.$this->getVar('cat_cid').oledrion_utils::makeSeoUrl($this->getVar('cat_title', 'n')).'.html';
		} else {	// Pas d'utilisation de l'url rewriting
			$url = OLEDRION_URL.'category.php?cat_cid='.$this->getVar('cat_cid');
		}
		return $url;
	}

	/**
	 * Rentourne la chaine � envoyer dans une balise <a> pour l'attribut href
	 *
	 * @return string
	 */
	function getHrefTitle()
	{
		return oledrion_utils::makeHrefTitle($this->getVar('cat_title'));
	}


	/**
	 * Retourne les �l�ments du produits format�s pour affichage
	 *
	 * @param string $format
	 * @return array
	 */
	function toArray($format = 's')
    {
		$ret = array();
		$ret = parent::toArray($format);
		$ret['cat_full_imgurl'] = $this->getPictureUrl();
		$ret['cat_href_title'] = $this->getHrefTitle();
		$ret['cat_url_rewrited'] = $this->getLink();
		return $ret;
    }
}


class OledrionOledrion_catHandler extends Oledrion_XoopsPersistableObjectHandler
{
	function __construct($db)
	{	//						Table				Classe		 Id		  Libell�
		parent::__construct($db, 'oledrion_cat', 'oledrion_cat', 'cat_cid', 'cat_title');
	}

	/**
	 * Renvoie (sous forme d'objets) la liste de toutes les cat�gories
	 *
	 * @param integer $start Indice de d�but de recherche
	 * @param integer $limit Nombre maximum d'enregsitrements � renvoyer
	 * @param string $sort Champ � utiliser pour le tri
	 * @param string $order Ordre du tire (asc ou desc)
	 * @param boolean $idaskey Indique s'il faut renvoyer un tableau dont la cl� est l'identifiant de l'enregistrement
	 * @return array Taleau d'objets (cat�gories)
	 */
	function getAllCategories(oledrion_parameters $parameters)
	{
		$parameters = $parameters->extend(new oledrion_parameters(array('start' => 0, 'limit' => 0, 'sort' => 'cat_title', 'order' => 'ASC', 'idaskey' => true)));
		$critere = new Criteria('cat_cid', 0 ,'<>');
		$critere->setLimit($parameters['limit']);
		$critere->setStart($parameters['start']);
		$critere->setSort($parameters['sort']);
		$critere->setOrder($parameters['order']);
		$categories = array();
		$categories = $this->getObjects($critere, $parameters['idaskey']);
		return $categories;
	}

	/**
	 * Fonction interne pour faire une vue d�velopp�e des cat�gories
	 *
	 * @param string $fieldName
	 * @param string $key
	 * @param string $ret
	 * @param object $tree
	 * @return string
	 */
	private function _makeLi($fieldName, $key, &$ret, $tree)
	{
        if ($key > 0) {
            $ret .= '<li><a href="';
			$ret .= $tree[$key]['obj']->getLink().'">'.$tree[$key]['obj']->getVar('cat_title').'</a>';
        }
        if (isset($tree[$key]['child']) && !empty($tree[$key]['child'])) {
        	$ret .= "\n<ul>\n";
            foreach ($tree[$key]['child'] as $childkey) {
                $this->_makeLi($fieldName, $childkey, $ret, $tree);
            }
            $ret .= "</ul>\n";
        }
        $ret .= "</li>\n";
	}

	/**
	 * Make a menu from the categories list
	 *
	 * @param   string  $fieldName       Name of the member variable from the node objects that should be used as the title for the options.
	 * @param   integer $key             ID of the object to display as the root of select options
	 * @return  string  HTML select box
	 */
	function getUlMenu($fieldName, $key = 0)
    {
		include_once ICMS_ROOT_PATH.'/class/tree.php';
		$items = $this->getAllCategories(new oledrion_parameters());
		$treeObject = new XoopsObjectTree($items, 'cat_cid', 'cat_pid');
		$tree = $treeObject->getTree();

        $ret = '';
        $this->_makeLi($fieldName, $key, $ret, $tree);
        if(xoops_trim($ret) != '') {
        	$ret = substr($ret, 0, -6);
        }
        return $ret;
    }

	/**
	 * Supprime une cat�gorie (et tout ce qui lui est relatif)
	 *
	 * @param oledrion_cat $category
	 * @return boolean	Le r�sultat de la suppression
	 */
	function deleteCategory(oledrion_cat $category)
	{
		global $xoopsModule;
		$category->deletePicture();
		xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'new_category', $category->getVar('cat_cid'));
		return $this->delete($category, true);
	}

	/**
	 * Retourne le nombre de produits d'une ou de plusieurs cat�gories
	 *
	 * @param integer	$cat_cid	L'identifiant de la cat�gorie dont on veut r�cup�rer le nombre de produits
	 * @param boolean	$withNested	Faut il inclure les sous-cat�gories ?
	 * @return integer	Le nombre de produits
	 */
	function getCategoryProductsCount($cat_cid, $withNested = true)
	{
		global $h_oledrion_products;
		$childsIDs = array();
		$childsIDs[] = $cat_cid;

		if($withNested) {	// Recherche des sous cat�gories de cette cat�gorie
			$items = $childs = array();
			include_once ICMS_ROOT_PATH.'/class/tree.php';
			$items = $this->getAllCategories(new oledrion_parameters());
			$mytree = new XoopsObjectTree($items, 'cat_cid', 'cat_pid');
			$childs = $mytree->getAllChild($cat_cid);
			if(count($childs) > 0) {
				foreach ($childs as $onechild) {
					$childsIDs[] = $onechild->getVar('cat_cid');
				}
			}
		}
		return $h_oledrion_products->getCategoryProductsCount($childsIDs);
	}

	/**
	 * Retourne des cat�gories selon leur ID
	 *
	 * @param array $ids	Les ID des cat�gories � retrouver
	 * @return array	Objets de type oledrion_cat
	 */
	function getCategoriesFromIds($ids)
	{
		$ret = array();
		if(is_array($ids) && count($ids) > 0) {
			$criteria = new Criteria('cat_cid', '('.implode(',', $ids).')', 'IN');
			$ret = $this->getObjects($criteria, true, true, '*', false);
		}
		return $ret;
	}

	/**
	 * Retourne la liste des cat�gories m�res (sous forme d'un tableau d'objets)
	 *
	 * @return array	Objets de type oledrion_cat
	 */
	function getMotherCategories()
	{
		$ret = array();
		$criteria = new Criteria('cat_pid', 0, '=');
		$criteria->setSort('cat_title');
		$ret = $this->getObjects($criteria);
		return $ret;
	}
}
?>