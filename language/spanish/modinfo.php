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
 * @traducci�n		Don Curioso - H2Ol� (http://www.h2ole.com) - Espa�ol es-ES - Satrebil
 * Version : $Id:
 * ****************************************************************************
 */

// The name of this module
define("_MI_OLEDRION_NAME", "Mi tienda");

// A brief description of this module
define("_MI_OLEDRION_DESC", "Este m�dulo crea una tienda en l�nea que permite mostrar y vender todo tipo de productos.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1", "Productos recientes");
define("_MI_OLEDRION_BNAME2", "Productos m�s vistos");
define("_MI_OLEDRION_BNAME3", "Categor�as");
define("_MI_OLEDRION_BNAME4", "Los m�s vendidos");
define("_MI_OLEDRION_BNAME5", "Los m�s votados");
define("_MI_OLEDRION_BNAME6", "Productos aleatorios");
define("_MI_OLEDRION_BNAME7", "Productos en promoci�n");
define("_MI_OLEDRION_BNAME8", "Carrito");
define("_MI_OLEDRION_BNAME9", "Productos recomendados");
define("_MI_OLEDRION_BNAME10", "Vendidos recientemente");
define("_MI_OLEDRION_BNAME11", "�ltimas listas");
define("_MI_OLEDRION_BNAME12", "Mis listas");
define("_MI_OLEDRION_BNAME13", "Listas de la categor�a actual");
define("_MI_OLEDRION_BNAME14", "Listas aleatorias");
define("_MI_OLEDRION_BNAME15", "Listas m�s vistas");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1", "Carrito");
define("_MI_OLEDRION_SMNAME2", "Inicio");
define("_MI_OLEDRION_SMNAME3", "Categor�as");
define("_MI_OLEDRION_SMNAME4", "Mapa de categor�as");
define("_MI_OLEDRION_SMNAME5", "Qui�n es qui�n");
define("_MI_OLEDRION_SMNAME6", "Todos los productos");
define("_MI_OLEDRION_SMNAME7", "Buscar");
define("_MI_OLEDRION_SMNAME8", "Condiciones Generales de Venta");
define("_MI_OLEDRION_SMNAME9", "Productos recomendados");
define("_MI_OLEDRION_SMNAME10", "Mis listas");
define("_MI_OLEDRION_SMNAME11", "Todas las listas");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0", "Vendedores");
define("_MI_OLEDRION_ADMENU1", "Impuestos");
define("_MI_OLEDRION_ADMENU2", "Categor�as");
define("_MI_OLEDRION_ADMENU3", "Fabricantes");
define("_MI_OLEDRION_ADMENU4", "Productos");
define("_MI_OLEDRION_ADMENU5", "Pedidos");
define("_MI_OLEDRION_ADMENU6", "Descuentos");
define("_MI_OLEDRION_ADMENU7", "Bolet�n de novedades");
define("_MI_OLEDRION_ADMENU8", "Textos");
define("_MI_OLEDRION_ADMENU9", "Stock bajo");
define("_MI_OLEDRION_ADMENU10", "Men� r�pido");
define("_MI_OLEDRION_ADMENU11", "Archivos adjuntos");
define("_MI_OLEDRION_ADMENU12", "Pasarelas de pago");
define("_MI_OLEDRION_ADMENU13", "Atributos de los productos");
define("_MI_OLEDRION_ADMENU14", "Bloques");
define("_MI_OLEDRION_ADMENU15", "Listas");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', 'Seleccionar el m�ximo n�mero de productos a mostrar en la p�gina');
define('_MI_OLEDRION_PERPAGE', 'Seleccionar el m�ximo n�mero de productos a mostrar por cada p�gina');

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Global');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Opciones de las listas globales de notificaci�n.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nueva categor�a');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Notificarme cuando una nueva categor�a de productos es creada.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Notificarme cuando una nueva categor�a de productos es creada.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificaci�n : Nueva categor�a');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Nuevo producto');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', 'Notificarme cuando un nuevo producto es creado.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', 'Notificarme cuando un nuevo producto es creado.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificaci�n : Nuevo producto');

define("_MI_OLEDRION_FORM_OPTIONS", "Opciones de formulario");
define("_MI_OLEDRION_FORM_OPTIONS_DESC", "Seleccionar el editor a usar, por defecto DHTML.<br />Para otros editores, se requieren funcionalidades extra<br /> que no se incluyen en �ste m�dulo.<br />Seleccione uno de ellos s�lo si dispone de �stas funcionalidades.<br />En caso contrario, no toque �sta opci�n.");

define("_MI_OLEDRION_FORM_COMPACT", "Compacto");
define("_MI_OLEDRION_FORM_DHTML", "DHTML");
define("_MI_OLEDRION_FORM_SPAW", "Spaw");
define("_MI_OLEDRION_FORM_HTMLAREA", "HtmlArea");
define("_MI_OLEDRION_FORM_FCK", "FCK");
define("_MI_OLEDRION_FORM_KOIVI", "Koivi");
define("_MI_OLEDRION_FORM_TINYEDITOR", "Tiny");

define("_MI_OLEDRION_INFOTIPS", "Descripci�n de la ventana de informaci�n emergente llamada tooltip");
define("_MI_OLEDRION_INFOTIPS_DES", "Si usa �sta opci�n, los enlaces relacionados a los productos contendr�n el primer (n) caracter del producto.<br />Si ajustas �ste valor a cero, no habr� tooltips o quedar�n vacios");
define('_MI_OLEDRION_UPLOADFILESIZE', 'Tama�o m�ximo para subir un archivo (KB) 1048576 = 1 Mega');

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'productos del mismo fabricante');

define('_MI_OLEDRION_PREVNEX_LINK', '�Mostrar enlace de anterior y posterior?');
define('_MI_OLEDRION_PREVNEX_LINK_DESC', 'Ajustando �sto a \Si\, dos nuevos enlaces apareceran al pie de cada producto,<br /> visualizados por fecha de publicaci�n');

define('_MI_OLEDRION_SUMMARY1_SHOW', '�Mostrar productos nuevos en cada categor�a?');
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC', 'Usando �sta opci�n, aparecer� al pie de cada producto un listado<br/>que mostrar� los productos m�s recientes en cada categor�a');

define('_MI_OLEDRION_SUMMARY2_SHOW', '�Mostrar productos nuevos en la actual categor�a?');
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC', 'Usando �sta opci�n, aparecer� al pie de cada producto un listado<br />que mostrar� los productos m�s recientes en �sta categor�a');

define('_MI_OLEDRION_OPT23', "[METAGEN] - �Cantidad m�xima de palabras clave a autogenerarse?");
define('_MI_OLEDRION_OPT23_DSC', "Indique la cantidad de palabras clave que desee autogenerar");

define('_MI_OLEDRION_OPT24', "[METAGEN] - Orden de las palabras clave");
define('_MI_OLEDRION_OPT241', "Creatarlas en el orden que aparecen en el texto");
define('_MI_OLEDRION_OPT242', "Orden de la frecuencia de las palabras");
define('_MI_OLEDRION_OPT243', "Invertir el orden de la frecuencia de las palabras");

define('_MI_OLEDRION_OPT25', "[METAGEN] - Lista negra");
define('_MI_OLEDRION_OPT25_DSC', "Escriba aqu� las palabras que no quiere que sean claves");
define('_MI_OLEDRION_RATE', '�Permite a los usuarios votar los productos?');

define("_MI_OLEDRION_ADVERTISEMENT", "Publicidad");
define("_MI_OLEDRION_ADV_DESCR", "Ingrese texto o javascript a mostrar con los productos");
define("_MI_OLEDRION_MIMETYPES", "Ingrese tipos MIME autorizados para la subida (separados por una linea nueva)");
define('_MI_OLEDRION_STOCK_EMAIL', "Email que se usar� cuando el stock de alg�n producto est� bajo m�nimos");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "No escribir nada aqu� desactiva �sta funci�n");

define('_MI_OLEDRION_OPT7', "�Usar RSS feeds?");
define('_MI_OLEDRION_OPT7_DSC', "Los �ltimos productos estar�n disponibles v�a RSS Feed");

define('_MI_OLEDRION_CHUNK1', "Tabla para los productos m�s recientes");
define('_MI_OLEDRION_CHUNK2', "Tabla para los productos m�s vendidos");
define('_MI_OLEDRION_CHUNK3', "Tabla para los productos m�s vistos");
define('_MI_OLEDRION_CHUNK4', "Tabla para los productos mejor considerados");
define('_MI_OLEDRION_ITEMSCNT', "Cantidad de productos a mostrar en la administraci�n");
define('_MI_OLEDRION_PDF_CATALOG', "�Permite usar el cat�logo en PDF?");
define('_MI_OLEDRION_URL_REWR', "�Usar reescritura de Url's?");

define('_MI_OLEDRION_MONEY_F', "Nombre de la moneda");
define('_MI_OLEDRION_MONEY_S', "S�mbolo de la moneda");
define('_MI_OLEDRION_NO_MORE', "�Mostrar productos aunque no haya existencias de ellos?");
define('_MI_OLEDRION_MSG_NOMORE', "Texto a mostrar cuando no hay existencias");
define('_MI_OLEDRION_GRP_SOLD', "�Grupo al que se le enviar� un e-mail cuando un producto se haya vendido?");
define('_MI_OLEDRION_GRP_QTY', "Grupo de usuarios autorizados a modificar cantidades en la p�gina de productos");
define('_MI_OLEDRION_BEST_TOGETHER', "�Mostrar 'Mejor Juntos'?");
define('_MI_OLEDRION_UNPUBLISHED', "�Mostrar productos a la espera de publicaci�n?");
define('_MI_OLEDRION_DECIMAL', "Decimales");
define('_MI_OLEDRION_CONF04', "Separador de miles");
define('_MI_OLEDRION_CONF05', "Separador de decimales");
define('_MI_OLEDRION_CONF00', "�posici�n del simbolo de moneda?");
define('_MI_OLEDRION_CONF00_DSC', "Si = derecha, No = izquierda");
define('_MI_OLEDRION_MANUAL_META', "�Ingresar metadatos manualmente?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "�Quieres activar los pagos fuera de l�nea (transferencias, ingresos en cuenta, ...)?");
define('_MI_OLEDRION_OFF_PAY_DSC', "Si activas �sta forma de pago, indica c�mo hacer un pago off-line, p/ej, mediante transferencia.<br /> Para ello, utiliza la pesta�a 'Texto' en el men� de administraci�n");

define('_MI_OLEDRION_USE_PRICE', "�Quieres usar el campo de precios?");
define('_MI_OLEDRION_USE_PRICE_DSC', "Con �sta opci�n, puedes usar el m�dulo c�mo tienda con precios o c�mo cat�logo sin precios.");

define('_MI_OLEDRION_PERSISTENT_CART', "�Quieres usar el carrito en formato persistente?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "Cuando se activa �sta opci�n, el carrito se graba (ATENCI�N, �sta opci�n consume recursos en el servidor)");

define('_MI_OLEDRION_RESTRICT_ORDERS', "�Restringir pedidos para usuarios registrados?");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "Si ajustas �sta opci�n en Si, s�lo los usuarios registrados pueden realizar pedidos, �til en el modo cat�logo");

define('_MI_OLEDRION_RESIZE_MAIN', "�Quieres redimensionar de forma autom�tica la imagen de cada producto?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', 'Activando �sta opci�n, la imagen de cada producto se redimensionar� de acuerdo a los par�metros indicados.');

define('_MI_OLEDRION_CREATE_THUMBS', "�Quieres que el m�dulo te cree las miniaturas de forma autom�tica?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "Si no usas �sta opci�n, tendr�s que subir las miniaturas si quieres usarlas");

define('_MI_OLEDRION_IMAGES_WIDTH', "Ancho de las im�genes");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Alto de las im�genes");

define('_MI_OLEDRION_THUMBS_WIDTH', "Ancho de las miniaturas");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Alto de las miniaturas");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "�Quieres tambi�n redimensionar las im�genes de las categor�as y fabricantes?");
define('_MI_OLEDRION_SHIPPING_QUANTITY', "�Quieres multiplicar el importe de env�o del producto por la cantidad?");

define('_MI_OLEDRION_USE_TAGS', "�Quieres usar el sistema de etiquetas?<br />(El m�dulo de etiquetas ha de estar instalado)");
define('_MI_OLEDRION_TAG_CLOUD', "Nube de etiquetas del m�dulo");
define('_MI_OLEDRION_TOP_TAGS', "Etiquetas m�s vistas del m�dulo");

define('_MI_OLEDRION_ASK_VAT_NUMBER', "�Quiere preguntarle a sus clientes el n�mero de IVA?");
define('_MI_OLEDRION_USE_STOCK_ATTRIBUTES', "�Quiere gestionar los stocks en los atributos de producto?");

define('_MI_OLEDRION_COLUMNS_INDEX', "N�mero de columnas de productos en la p�gina �ndice del m�dulo");
define('_MI_OLEDRION_COLUMNS_CATEGORY', "N�mero de columnas de productos en las p�ginas de categor�as");
define('_MI_OLEDRION_ADAPTED_LIST', "N�mero m�ximo de productos que se mostrar�n antes de reemplazar la lista con una lista adaptada");
?>