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
 * Page appel�e par la passerelle apr�s le paiement en ligne
 */
require 'header.php';
$GLOBALS['current_category'] = -1;
$success = true;

$xoopsOption['template_main'] = 'oledrion_thankyou.html';
require_once ICMS_ROOT_PATH.'/header.php';
$h_oledrion_caddy->emptyCart();

// On donne la possibilit� � la passerelle de traiter la commande
$gateway = null;
$gateway = oledrion_gateways::getGatewayObject();
if(is_object($gateway) && method_exists($gateway, 'thankYou')) {
    if(!file_exists(OLEDRION_GATEWAY_LOG_PATH)) {
        file_put_contents(OLEDRION_GATEWAY_LOG_PATH, '<?php exit(); ?>');
    }
    $gateway->thankYou(OLEDRION_GATEWAY_LOG_PATH);
    unset($gateway);
}
$xoopsTpl->assign('success', $success);
$xoopsTpl->assign('global_advert', oledrion_utils::getModuleOption('advertisement'));
$xoopsTpl->assign('breadcrumb', oledrion_utils::breadcrumb(array(OLEDRION_URL.basename(__FILE__) => _OLEDRION_PURCHASE_FINSISHED)));

$title = _OLEDRION_PURCHASE_FINSISHED.' - '.oledrion_utils::getModuleName();
oledrion_utils::setMetas($title, $title);
oledrion_utils::setCSS();
require_once(ICMS_ROOT_PATH.'/footer.php');
?>
