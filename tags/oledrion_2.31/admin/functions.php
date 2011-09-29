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
function oledrion_adminMenu($currentoption = 0, $breadcrumb = '')
{
	global $xoopsConfig, $xoopsModule;
	oledrion_utils::loadLanguageFile('modinfo.php');

	require XOOPS_ROOT_PATH.'/modules/oledrion/admin/menu.php';

	echo "<style type=\"text/css\">\n";
	echo "#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }\n";
	echo "#buttonbar { float:left; width:100%; background: #e7e7e7 url('../images/modadminbg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }\n";
	echo "#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }\n";
	echo "#buttonbar li { display:inline; margin:0; padding:0; }";
	echo "#buttonbar a { float:left; background:url('../images/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }\n";
	echo "#buttonbar a span { float:left; display:block; background:url('../images/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }\n";
	echo "/* Commented Backslash Hack hides rule from IE5-Mac \*/\n";
	echo "#buttonbar a span {float:none;}\n";
	echo "/* End IE5-Mac hack */\n";
	echo "#buttonbar a:hover span { color:#333; }\n";
	echo "#buttonbar .current a { background-position:0 -150px; border-width:0; }\n";
	echo "#buttonbar .current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }\n";
	echo "#buttonbar a:hover { background-position:0% -150px; }\n";
	echo "#buttonbar a:hover span { background-position:100% -150px; }\n";
	echo "</style>\n";

	echo "<div id=\"buttontop\">\n";
	echo "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\">\n";
	echo "<tr>\n";
	echo "<td style=\"width: 70%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\">\n";
	echo "<a href=\"../index.php\">"._AM_OLEDRION_GO_TO_MODULE."</a> | <a href=\"".XOOPS_URL."/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule->getVar('mid')."\">"._AM_OLEDRION_PREFERENCES."</a> | <a href='index.php?op=maintain'>"._AM_OLEDRION_MAINTAIN."</a>\n";
	echo "</td>\n";
	echo "<td style=\"width: 30%; font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;\">\n";
	echo "<b>".$xoopsModule->getVar('name')."&nbsp;"._AM_OLEDRION_ADMINISTRATION."</b>&nbsp;".$breadcrumb."\n";
	echo "</td>\n";
	echo "</tr>\n";
	echo "</table>\n";
	echo "</div>\n";
	echo "<div id=\"buttonbar\">\n";
	echo "<ul>\n";
	$visibleTabsRule = OLEDRION_EXCLUDED_TABS;
	$tabs = array();
	$tabs = $adminmenu;
    if($visibleTabsRule != '' ) {
        if(strstr(OLEDRION_EXCLUDED_TABS, ',') !== false) {
            $excludedTabs = explode(',', OLEDRION_EXCLUDED_TABS);
            array_walk($excludedTabs, 'trim');
        } else {
            $excludedTabs = array(OLEDRION_EXCLUDED_TABS);
        }
        if(count($excludedTabs) > 0) {
            $newtTabs = array();
            foreach($adminmenu as $key=>$link) {
                if(!in_array($key, $excludedTabs)) {
                    $newtTabs[$key] = $link;
                }
            }
            $tabs = $newtTabs;
        }
    }
	foreach($tabs as $key=>$link) {
		if($key == $currentoption) {
			echo "<li class=\"current\">\n";
		} else {
			echo "<li>\n";
		}
		echo "<a href=\"".XOOPS_URL."/modules/oledrion/".$link['link']."\"><span>".$link['title']."</span></a>\n";
		echo "</li>\n";
	}
	echo "</ul>\n";
	echo "</div>\n";
	echo "<br style=\"clear:both;\" />\n";

}

/**
 * Internal function
 */
function oledrion_get_mid() {
	global $xoopsModule;
	return $xoopsModule->getVar('mid');

}

/**
 * Internal function
 */
function oledrion_get_config_handler()
{
	$config_handler = null;
	$config_handler =& xoops_gethandler('config');
	if(!is_object($config_handler)) {
		trigger_error("Error, unable to get and handler on the Config object");
		exit;
	} else {
		return $config_handler;
	}

}

/**
 * Returns a module option
 *
 * @param string	$option_name	The module's option
 * @return object	The requested module's option
 */
function oledrion_get_module_option($optionName = '')
{
	$ret = null;
	$tbl_options = array();
	$mid = oledrion_get_mid();
	$config_handler = oledrion_get_config_handler();
	$critere = new CriteriaCompo();
	$critere->add(new Criteria('conf_modid', $mid, '='));
	$critere->add(new Criteria('conf_name', $optionName, '='));
	$tbl_options = $config_handler->getConfigs($critere, false, false);
	if(count($tbl_options) >0 ) {
		$option = $tbl_options[0];
		$ret = $option;
	}
	return $ret;
}


/**
 * Set a module's option
 */
function oledrion_set_module_option($optionName = '', $optionValue = '')
{
	$config_handler = oledrion_get_config_handler();
	$option = oledrion_get_module_option($optionName, true);
	$option->setVar('conf_value', $optionValue);
	$retval = $config_handler->insertConfig($option, true);
	return $retval;
}


/**
 * Affichage du pied de page de l'administration
 *
 * @return string	La chaine à afficher
 */
function show_footer()
{
	echo "<br /><br /><div align='center'><a href='http://www.instant-zero.com' target='_blank'><img src='../images/instantzero.gif'></a></div>";
}
?>