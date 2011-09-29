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

// The name of this module
define("_MI_OLEDRION_NAME","My Shop");

// A brief description of this module
define("_MI_OLEDRION_DESC","Cria uma loja on-line para mostrar e vender produtos.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1","Produtos Recentes");
define("_MI_OLEDRION_BNAME2","Top Products");
define("_MI_OLEDRION_BNAME3","Categorias");
define("_MI_OLEDRION_BNAME4","Melhores Vendedores");
define("_MI_OLEDRION_BNAME5","Produtos Melhor Avaliados");
define("_MI_OLEDRION_BNAME6","Produtos aleatórios");
define("_MI_OLEDRION_BNAME7","Produtos em promoção");
define("_MI_OLEDRION_BNAME8","Carrinho");
define("_MI_OLEDRION_BNAME9","Produtos Recomendados");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1","Carrinho");
define("_MI_OLEDRION_SMNAME2","Index");
define("_MI_OLEDRION_SMNAME3","Categorias");
define("_MI_OLEDRION_SMNAME4","Categories map");
define("_MI_OLEDRION_SMNAME5","Quem é quem");
define("_MI_OLEDRION_SMNAME6","Todos os produtos");
define("_MI_OLEDRION_SMNAME7","Pesquisar");
define("_MI_OLEDRION_SMNAME8","General Conditions Of Sale");
define("_MI_OLEDRION_SMNAME9","Produtos Recomendados");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0","Vendedores");
define("_MI_OLEDRION_ADMENU1","VAT");
define("_MI_OLEDRION_ADMENU2","Categorias");
define("_MI_OLEDRION_ADMENU3","Fabricantes");
define("_MI_OLEDRION_ADMENU4","Produtos");
define("_MI_OLEDRION_ADMENU5","Encomendas");
define("_MI_OLEDRION_ADMENU6","Descontos");
define("_MI_OLEDRION_ADMENU7","Newsletter");
define("_MI_OLEDRION_ADMENU8", "Textos");
define("_MI_OLEDRION_ADMENU9", "Baixos estoques");
define("_MI_OLEDRION_ADMENU10", "Painel");
define("_MI_OLEDRION_ADMENU11", "Arquivos anexados");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', 'Selecione o número máximo de novos produtos exibidos na página principal');
define('_MI_OLEDRION_PERPAGE', 'Selecione o número máximo de produtos exibidos em cada página');

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Global');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Global lists notification options.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nova Categoria');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Notificar-me quando uma novo produto da categoria é criado.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Receber notificação quando um novo produto da categoria é criado.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New Product category');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Novo Produto');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', 'Notify me when any new product is posted.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', 'Receive notification when any new product is posted.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New Product');

define('_MI_OLEDRION_PAYPAL_EMAIL', "Paypal Email address");
define('_MI_OLEDRION_PAYPAL_EMAILDSC', "Address to use for payments and orders notifications.<br /><u><b>If you don't fill this fields, then online payment is deactivated.</u></b>");
define('_MI_OLEDRION_PAYPAL_TEST', "Use Paypal sandbox ?");
define("_MI_OLEDRION_FORM_OPTIONS","Form Option");
define("_MI_OLEDRION_FORM_OPTIONS_DESC","Select the editor to use. If you have a 'simple' install (e.g you use only xoops core editor class, provided in the standard Xoops core package), then you can just select DHTML and Compact");

define("_MI_OLEDRION_FORM_COMPACT","Compact");
define("_MI_OLEDRION_FORM_DHTML","DHTML");
define("_MI_OLEDRION_FORM_SPAW","Spaw Editor");
define("_MI_OLEDRION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_OLEDRION_FORM_FCK","FCK Editor");
define("_MI_OLEDRION_FORM_KOIVI","Koivi Editor");
define("_MI_OLEDRION_FORM_TINYEDITOR","TinyEditor");

define("_MI_OLEDRION_INFOTIPS","Length of tooltips");
define("_MI_OLEDRION_INFOTIPS_DES","If you use this option, links related to products will contains the first (n) characters of the product. If you set this value to 0 then the infotips will be empty");
define('_MI_OLEDRION_UPLOADFILESIZE', 'MAX Filesize Upload (KB) 1048576 = 1 Meg');

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'Products by the same manufacturer');

define('_MI_OLEDRION_PREVNEX_LINK','Show Previous and Next link ?');
define('_MI_OLEDRION_PREVNEX_LINK_DESC','When this option is set to \'Yes\', two new links are visibles at the bottom of each product. Those links are used to go to the previous and next product according to the publish date');

define('_MI_OLEDRION_SUMMARY1_SHOW','Show recent products in all categories?');
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC','When you use this option, a summary containing links to all the recent published products is visible at the bottom of each product');

define('_MI_OLEDRION_SUMMARY2_SHOW','Show recent products in current category ?');
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC','When you use this option, a summary containing links to all the recent published products is visible at the bottom of each product');

define('_MI_OLEDRION_OPT23',"[METAGEN] - Maximum count of keywords to generate");
define('_MI_OLEDRION_OPT23_DSC',"Select the maximum count of keywords to automatically generate.");

define('_MI_OLEDRION_OPT24',"[METAGEN] - Keywords order");
define('_MI_OLEDRION_OPT241',"Create them in the order they appear in the text");
define('_MI_OLEDRION_OPT242',"Order of word's frequency");
define('_MI_OLEDRION_OPT243',"Reverse order of word's frequency");

define('_MI_OLEDRION_OPT25',"[METAGEN] - Blacklist");
define('_MI_OLEDRION_OPT25_DSC',"Enter words (separated by a comma) to remove from meta keywords");
define('_MI_OLEDRION_RATE','Enable users to rate Products ?');

define("_MI_OLEDRION_ADVERTISEMENT","Advertisement");
define("_MI_OLEDRION_ADV_DESCR","Enter a text or a javascript code to display in your products");
define("_MI_OLEDRION_MIMETYPES","Enter authorised Mime Types for upload (separated them on a new line)");
define('_MI_OLEDRION_STOCK_EMAIL', "Email address to use when stocks are low");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "Don't type anything if you don't want to use this function.");

define('_MI_OLEDRION_OPT7',"Use RSS feeds ?");
define('_MI_OLEDRION_OPT7_DSC',"The last Products will be available via an RSS Feed");

define('_MI_OLEDRION_CHUNK1',"Span for most recent Products");
define('_MI_OLEDRION_CHUNK2',"Span for most purchased Products");
define('_MI_OLEDRION_CHUNK3',"Span for most viewed Products");
define('_MI_OLEDRION_CHUNK4',"Span for best ranked Products");
define('_MI_OLEDRION_ITEMSCNT',"Items count to display in the administration");
define('_MI_OLEDRION_PDF_CATALOG',"Allow the use of the PDF catalog ?");
define('_MI_OLEDRION_URL_REWR',"Use Url Rewriting ?");

define('_MI_OLEDRION_MONEY_F',"Name of currency");
define('_MI_OLEDRION_MONEY_S',"Symbol for currency");
define('_MI_OLEDRION_MONEY_P',"Enter Paypal currency code");
define('_MI_OLEDRION_NO_MORE',"Display products even when there is no stock available ?");
define('_MI_OLEDRION_MSG_NOMORE',"Text to display when there's no more stock for a product");
define('_MI_OLEDRION_GRP_SOLD',"Group to send an email when a product is sold ?");
define('_MI_OLEDRION_GRP_QTY',"Group of users authorized to modify products quantities from the Product page");
define('_MI_OLEDRION_BEST_TOGETHER',"Display 'Better Together' ?");
define('_MI_OLEDRION_UNPUBLISHED',"Display product who's publication date if later than today ?");
define('_MI_OLEDRION_DECIMAL', "Decimal point for money");
define('_MI_OLEDRION_PDT', "Paypal - Payment Data Transfer Token (optional)");
define('_MI_OLEDRION_CONF04',"Thousands separator");
define('_MI_OLEDRION_CONF05', "Decimals separator");
define('_MI_OLEDRION_CONF00',"Money's position ?");
define('_MI_OLEDRION_CONF00_DSC', "Yes = right, No = left");
define('_MI_OLEDRION_MANUAL_META', "Enter meta data manually ?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "Do you want to enable offline payment?");
define('_MI_OLEDRION_OFF_PAY_DSC', "If you enable it, you must type some texts in the module's administration in the 'Texts' tab");

define('_MI_OLEDRION_USE_PRICE', "Do you want to use the price field?");
define('_MI_OLEDRION_USE_PRICE_DSC', "With this option you can disable products price (to do a catalog for example)");

define('_MI_OLEDRION_PERSISTENT_CART', "Do you want to use the persistent cart?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "when this option is set to Yes, the user's cart is saved (Warning, this option will consume resources)");

define('_MI_OLEDRION_RESTRICT_ORDERS', "Restrict orders to registred users ?");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "If you set this option to Yes then only the registred users can order products");

define('_MI_OLEDRION_RESIZE_MAIN', "Do you want to automatically resize the main picture of each product's picture ?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', '');

define('_MI_OLEDRION_CREATE_THUMBS', "Do you want the module to automatically create the product's thumb ?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "If you don't use this option then you will have to upload products thumbs yourself");

define('_MI_OLEDRION_IMAGES_WIDTH', "Images width");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Images height");

define('_MI_OLEDRION_THUMBS_WIDTH', "Thumbs width");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Thumbs height");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "Do you also want to resize categories'pictures and manufacturers pictures to the above dimensions ?");
?>