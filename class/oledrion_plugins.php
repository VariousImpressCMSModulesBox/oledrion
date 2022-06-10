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
 * Gestion des plugins du module
 *
 * On distingue les "filtres" (plugin qui re�oit du contenu qu'il peut modifier et dont le retour est pass� au filtre suivant)
 * des "actions" (plugin qui est g�n�ralement appel� sur un �v�nement et qui ne doit rien modifier).
 *
 * Chaque plugin dispose d'une priorit� de 1 � 5, 1 �tant la priorit� la plus haute, 5 la plus basse
 *
 * Dans le r�pertoire plugins on a 2 sous r�pertoires, "actions" et "filters", en fonction du type du plugin
 *
 * Chaque plugin doit se trouver dans son propre sous-r�pertoire, par exemple :
 * 	/xoops/modules/oledrion/plugins/pdf/
 *
 * Cela permet aux plugins d'avoir plusieurs fichiers et de ne pas les m�langer avec les autres plugins
 *
 * Le module scrute ces 2 r�pertoires ("actions" et "filters") pour charger les plugins.
 * Chaque r�pertoire doit contenir un script "plugins.php" qui permet la descriptions des plugins qui se trouvent dans ce r�pertoire.
 * A titre d'exemple, voir ceux fournits de base avec le module
 *
 * Les mod�les de classe � �tendre se trouvent dans /xoops/modules/oledrion/plugins/modules/oledrion_action.php et oledrion_filter.php
 *
 * @since 2.31
 */
class oledrion_plugins
{
	/**
	 * Dictionnaire des �v�nements
	 */
	const EVENT_ON_PRODUCT_CREATE = 'onProductCreate';
	const EVENT_ON_CATEGORY_CREATE = 'onCategoryCreate';
	const EVENT_ON_PRODUCT_DOWNLOAD = 'onProductDownload';
	// **************************************************************

	/**
	 * Types d'�v�nements
	 */
	const PLUGIN_ACTION = 0;
	const PLUGIN_FILTER = 1;

	/**
	 * Nom du script Php inclut qui contient l'inscription des plugins
	 */
	const PLUGIN_SCRIPT_NAME = 'plugins.php';

	/**
	 * Dans le fichier Php qui contient l'inscription des plugins, m�thode � appeler pour r�cup�rer la liste des plugins
	 */
	const PLUGIN_DESCRIBE_METHOD = 'registerEvents';

	/**
	 * Nom de la variable de session qui contient la liste des plugins d�tach�s
	 */
	const PLUGIN_UNPLUG_SESSION_NAME = 'oledrion_plugins';

	/**
	 * Priorit�s des plugins
	 * @var constant
	 */
	const EVENT_PRIORITY_1 = 1;	// Priorit� la plus haute
	const EVENT_PRIORITY_2 = 2;
	const EVENT_PRIORITY_3 = 3;
	const EVENT_PRIORITY_4 = 4;
	const EVENT_PRIORITY_5 = 5;	// Priorit� la plus basse

	/**
	 * Utilis� pour construire le nom de la classe
	 */
	private $pluginsTypeLabel = array(self::PLUGIN_ACTION => 'Action', self::PLUGIN_FILTER => 'Filter');

	/**
	 * Nom des classes qu'il faut �tendre en tant que plugin
	 */
	private $pluginsClassName = array(self::PLUGIN_ACTION => 'oledrion_action', self::PLUGIN_FILTER => 'oledrion_filter');

	/**
	 * Nom de chacun des dossiers en fonction du type de plugin
	 */
	private $pluginsTypesFolder = array(self::PLUGIN_ACTION => 'actions', self::PLUGIN_FILTER => 'filters');

	/**
	 * Contient l'unique instance de l'objet
	 * @var object
	 */
	private static $instance = false;

	/**
	 * Liste des �v�nements
	 * @var array
	 */
	private static $events = array();


    /**
     * Retourne l'instance unique de la classe
     *
     * @return object
     */
	public static function getInstance()
	{
		if (!self::$instance instanceof self) {
      		self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Chargement des 2 types de plugins
	 *
	 * @return void
	 */
	private function __construct()
	{
		$this->events = array();
		$this->loadPlugins();
	}

	/**
	 * Chargement des plugins (actions et filtres)
	 * @return void
	 */
	function loadPlugins()
	{
		$this->loadPluginsFiles(OLEDRION_PLUGINS_PATH.$this->pluginsTypesFolder[self::PLUGIN_ACTION], self::PLUGIN_ACTION);
		$this->loadPluginsFiles(OLEDRION_PLUGINS_PATH.$this->pluginsTypesFolder[self::PLUGIN_FILTER], self::PLUGIN_FILTER);
	}


	/**
	 * V�rifie que le fichier Php pass� en param�tre contient bien une classe de filtre ou d'action et si c'est le cas, le charge dans la liste des plugins

	 * @param string $fullPathName	Chemin complet vers le fichier (r�pertoire + nom)
	 * @param integer $type			Type de plugin recherch� (action ou filtre)
	 * @param string $pluginFolder	Le nom du r�pertoire dans lequel se trouve le fichier (le "dernier nom")
	 * @return void
	 */
	private function loadClass($fullPathName, $type, $pluginFolder)
	{
		require_once $fullPathName;
		$className = strtolower($pluginFolder).$this->pluginsTypeLabel[$type];
		if(class_exists($className) && get_parent_class($className) == $this->pluginsClassName[$type]) {
			// TODO: V�rifier que l'�v�nement n'est pas d�j� en m�moire
			$events = call_user_func(array($className, self::PLUGIN_DESCRIBE_METHOD));
			foreach($events as $event) {
				$eventName = $event[0];
				$eventPriority = $event[1];
				$fileToInclude = OLEDRION_PLUGINS_PATH.$this->pluginsTypesFolder[$type].DIRECTORY_SEPARATOR.$pluginFolder.DIRECTORY_SEPARATOR.$event[2];
				$classToCall = $event[3];
				$methodToCall = $event[4];
				$this->events[$type][$eventName][$eventPriority][] = array('fullPathName' => $fileToInclude, 'className' => $classToCall, 'method' => $methodToCall);
			}
		}
	}

	/**
	 * Part � la recherche d'un type de plugin dans les r�pertoires
	 *
	 * @param string $path	La racine
	 * @param integer $type	Le type de plugin recherch� (action ou filtre)
	 * @return void
	 */
	private function loadPluginsFiles($path, $type)
	{
		$objects = new DirectoryIterator($path);
		foreach($objects as $object) {
	    	if($object->isDir() && !$object->isDot()) {
	    		$file = $path.DIRECTORY_SEPARATOR.$object->current().DIRECTORY_SEPARATOR.self::PLUGIN_SCRIPT_NAME;
	    		if(file_exists($file)) {
					$this->loadClass($file, $type, $object->current());
				}
	    	}
		}
	}

	/**
	 * D�clenchement d'une action et appel des plugins li�s
	 *
	 * @param string $eventToFire	L'action d�clench�e
	 * @param object $parameters	Les param�tres � passer � chaque plugin
	 * @return object				L'objet lui m�me pour cha�ner
	 */
	function fireAction($eventToFire, oledrion_parameters $parameters = null)
	{
		if(!isset($this->events[self::PLUGIN_ACTION][$eventToFire])) {
			trigger_error(sprintf(_OLEDRION_PLUGINS_ERROR_1, $eventToFire));
			return $this;
		}
		ksort($this->events[self::PLUGIN_ACTION][$eventToFire]);	// Tri par priorit�
		foreach($this->events[self::PLUGIN_ACTION][$eventToFire] as $priority => $events) {
			foreach($events as $event) {
				if($this->isUnplug(self::PLUGIN_ACTION, $eventToFire, $event['fullPathName'], $event['className'], $event['method'])) {
					continue;
				}
				require_once $event['fullPathName'];
				if(!class_exists($event['className'])) {
					$class = new $event['className'];
				}
				if(!method_exists($event['className'], $event['method'])) {
					continue;
				}
				call_user_func(array($event['className'], $event['method']), $parameters);
				unset($class);
			}
		}
		return $this;
	}

	/**
	 * D�clenchement d'un filtre et appel des plugins li�s
	 *
	 * @param string $eventToFire	Le filtre appel�
	 * @param object $parameters	Les param�tres � passer � chaque plugin
	 * @return object				Le contenu de l'objet pass� en param�tre
	 */
	function fireFilter($eventToFire, oledrion_parameters &$parameters)
	{
		if(!isset($this->events[self::PLUGIN_FILTER][$eventToFire])) {
			trigger_error(sprintf(_OLEDRION_PLUGINS_ERROR_1, $eventToFire));
			return $this;
		}
		ksort($this->events[self::PLUGIN_FILTER][$eventToFire]);	// Tri par priorit�
		foreach($this->events[self::PLUGIN_FILTER][$eventToFire] as $priority => $events) {
			foreach($events as $event) {
				if($this->isUnplug(self::PLUGIN_FILTER, $eventToFire, $event['fullPathName'], $event['className'], $event['method'])) {
					continue;
				}
				require_once $event['fullPathName'];
				if(!class_exists($event['className'])) {
					$class = new $event['className'];
				}
				if(!method_exists($event['className'], $event['method'])) {
					continue;
				}
				call_user_func(array($event['className'], $event['method']), $parameters);
				unset($class);
			}
		}

		if(!is_null($parameters)) {
			return $parameters;
		}
	}

	/**
	 * Indique si un plugin s'est d�tach� d'un �v�nement particulier
	 *
	 * @param integer $eventType
	 * @param string $eventToFire
	 * @param string $fullPathName
	 * @param string $className
	 * @param string $method
	 * @return boolean
	 */
	function isUnplug($eventType, $eventToFire, $fullPathName, $className, $method)
	{
		$unplug = array();
		if(isset($_SESSION[self::PLUGIN_UNPLUG_SESSION_NAME])) {
			$unplug = $_SESSION[self::PLUGIN_UNPLUG_SESSION_NAME];
		} else {
			return false;
		}
		return isset($unplug[$eventType][$eventToFire][$fullPathName][$className][$method]);
	}

	/**
	 * Permet � un plugin de se d�tacher d'un �v�nement
	 *
	 * @param integer $eventType
	 * @param string $eventToFire
	 * @param string $fullPathName
	 * @param string $className
	 * @param string $method
	 * @return void
	 */
	function unplugFromEvent($eventType, $eventToFire, $fullPathName, $className, $method)
	{
		$unplug = array();
		if(isset($_SESSION[self::PLUGIN_UNPLUG_SESSION_NAME])) {
			$unplug = $_SESSION[self::PLUGIN_UNPLUG_SESSION_NAME];
		}
		$unplug[$eventType][$eventToFire][$fullPathName][$className][$method] = true;
		$_SESSION[self::PLUGIN_UNPLUG_SESSION_NAME] = $unplug;
	}
}
?>