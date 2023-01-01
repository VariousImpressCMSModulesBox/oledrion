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
 * Plugin charg� de notifier les utilisateurs de la cr�ation d'un nouveau produit et d'une nouvelle cat�gorie
 *
 * @since 2.31
 */
class newelementsAction extends oledrion_action {

	public static function registerEvents() {
		/**
		 * La liste des �v�nements trait�s par le plugin se pr�sente sous la forme d'un tableau comppos� comme ceci :
		 *
		 * Indice Signification
		 * ----------------------
		 * 0 Ev�nement sur lequel se raccrocher (voir class/oledrion_plugins.php::EVENT_ON_PRODUCT_CREATE
		 * 1 Priorit� du plugin (de 1 � 5)
		 * 2 Script Php � inclure
		 * 3 Classe � instancier
		 * 4 M�thode � appeler
		 */
		$events = array();
		$events[] = array(
			oledrion_plugins::EVENT_ON_PRODUCT_CREATE,
			oledrion_plugins::EVENT_PRIORITY_1,
			basename(__FILE__),
			__CLASS__,
			'fireNewProduct');
		$events[] = array(
			oledrion_plugins::EVENT_ON_CATEGORY_CREATE,
			oledrion_plugins::EVENT_PRIORITY_1,
			basename(__FILE__),
			__CLASS__,
			'fireNewCategory');
		return $events;
	}

	/**
	 * M�thode appel�e pour indiquer qu'un nouveau produit a �t� cr�e
	 *
	 * @param object $product Le produit qui vient d'�tre cr�e
	 * @return void
	 */
	public function fireNewProduct($parameters) {
		$product = $parameters['product'];
		if (intval($product->getVar('product_online')) == 1) {
			$tags = array();
			$notification_handler = &xoops_gethandler('notification');
			$tags['PRODUCT_NAME'] = $product->getVar('product_title');
			$tags['PRODUCT_SUMMARY'] = strip_tags($product->getVar('product_summary'));
			$tags['PRODUCT_URL'] = $product->getLink();
			$notification_handler->triggerEvent('global', 0, 'new_product', $tags);
		}
	}

	/**
	 * M�thode appel�e pour indiquer qu'une nouvelle cat�gorie a �t� cr�e
	 *
	 * @param object $category
	 * @return void
	 */
	public function fireNewCategory($parameters) {
		$category = $parameters['category'];
		$notification_handler = &xoops_gethandler('notification');
		$tags = array();
		$tags['CATEGORY_NAME'] = $category->getVar('cat_title');
		$tags['CATEGORY_URL'] = $category->getLink(); // OLEDRION_URL.'category.php?cat_cid=' . $category->getVar('cat_cid');
		$tags['X_MODULE_URL'] = OLEDRION_URL;
		$notification_handler->triggerEvent('global', 0, 'new_category', $tags);
	}
}
?>