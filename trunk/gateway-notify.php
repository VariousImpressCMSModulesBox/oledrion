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
 * Page appelée par la passerelle de paiement dans le cas de l'utilisation de l'IPN (ou d'une méthode similaire)
 * Dialogue entre le site et la passerelle
 */
@error_reporting(0);
@$xoopsLogger->activated = false;
require 'header.php';
@error_reporting(0);
@$xoopsLogger->activated = false;
$gateway = oledrion_gateways::getCurrentGateway();
$temporaryGateway = null;
$temporaryGateway = oledrion_gateways::getGatewayObject();
if(is_object($temporaryGateway)) {
    if(!file_exists(OLEDRION_GATEWAY_LOG_PATH)) {
        file_put_contents(OLEDRION_GATEWAY_LOG_PATH, '<?php exit(); ?>');
    }
    $temporaryGateway->gatewayNotify(OLEDRION_GATEWAY_LOG_PATH);
    unset($temporaryGateway);
}
?>