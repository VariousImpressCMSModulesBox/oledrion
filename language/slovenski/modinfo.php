<?php
/**
 * ****************************************************************************
 * Oledrion - MODULE FOR XOOPS
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
 *        
 *         Translator : Srdan Crevar
 *         ****************************************************************************
 */

// The name of this module
define("_MI_OLEDRION_NAME", "Oledrion");

// A brief description of this module
define("_MI_OLEDRION_DESC", "Ustvari spletno trgovino Oledrion, ki prikazije in prodaja artikle.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1", "Novi artikli");
define("_MI_OLEDRION_BNAME2", "Naj artikli");
define("_MI_OLEDRION_BNAME3", "Skupine artiklov");
define("_MI_OLEDRION_BNAME4", "Najbolje prodajani artikli");
define("_MI_OLEDRION_BNAME5", "Najbolje ocenjeni artikli");
define("_MI_OLEDRION_BNAME6", "Naklju�ni artikli");
define("_MI_OLEDRION_BNAME7", "Artikli in promocije");
define("_MI_OLEDRION_BNAME8", "Nakupovalna ko�arica");
define("_MI_OLEDRION_BNAME9", "Priporo�amo");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1", "Nakupovalna ko�arica");
define("_MI_OLEDRION_SMNAME2", "Prva stran");
define("_MI_OLEDRION_SMNAME3", "Skupine artiklov");
define("_MI_OLEDRION_SMNAME4", "Mapa kategorij");
define("_MI_OLEDRION_SMNAME5", "Proizvajalci");
define("_MI_OLEDRION_SMNAME6", "Vsi artilki");
define("_MI_OLEDRION_SMNAME7", "Iskanje");
define("_MI_OLEDRION_SMNAME8", "Splo�ni pogoji prodaje");
define("_MI_OLEDRION_SMNAME9", "Priporo�eni artikli");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0", "Prodajalci");
define("_MI_OLEDRION_ADMENU1", "Dav�ne stopnje");
define("_MI_OLEDRION_ADMENU2", "Skupine artiklov");
define("_MI_OLEDRION_ADMENU3", "Proizvajalci");
define("_MI_OLEDRION_ADMENU4", "Artikli");
define("_MI_OLEDRION_ADMENU5", "Naro�ila");
define("_MI_OLEDRION_ADMENU6", "Popusti");
define("_MI_OLEDRION_ADMENU7", "Novice");
define("_MI_OLEDRION_ADMENU8", "Besedila");
define("_MI_OLEDRION_ADMENU9", "Kriti�ne zaloge");
define("_MI_OLEDRION_ADMENU10", "NADZOR");
define("_MI_OLEDRION_ADMENU11", "Priponke");
define("_MI_OLEDRION_ADMENU12", "Pla�ilni sis.");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', 'Izberi najve�je �tevilo artiklov prikazanih na prvi strani');
define('_MI_OLEDRION_PERPAGE', 'Izberi najve�je �tevilo izdelkov prikazanih na vsaki strani');

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Globalno');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Globalni seznami mo�nosti obve��anj.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nova kategorija');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Obvesti me, ko je ustvarjena nova kategorija artikla.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Prejmi obvestilo, ko je ustvarjena nova kategorija artikla.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} samodejno obvestilo : Kategorija novega artikla');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Nov artikel');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', 'Obvesti me, ko je objavljen nov artikel.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', 'Prejmi obvestilo, ko je objavljen nov artikel.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} samodejno obvestilo : Nov artikel');

define('_MI_OLEDRION_PAYPAL_EMAIL', "Paypal E-mail naslov");
define('_MI_OLEDRION_PAYPAL_EMAILDSC', "Naslov uporabljan za pla�ila in obvestila o naro�ilih.<br /><u><b>�e ne izpolnite teh polj bo pla�evanje preko spleta onemogo�eno.</u></b>");
define('_MI_OLEDRION_PAYPAL_TEST', "Uporabi Paypal sandbox?");
define("_MI_OLEDRION_FORM_OPTIONS", "Ustvari opcijo");
define("_MI_OLEDRION_FORM_OPTIONS_DESC", "Izberi urejevalnik za uporabo. �e imate 'preprosto' instalacijo (npr. uporabljate samo xoops core editor class, ki se nahaja v standardnem Xoops core paketu), lahko samo izberete DHTML in Compact");

define("_MI_OLEDRION_FORM_COMPACT", "Compact");
define("_MI_OLEDRION_FORM_DHTML", "DHTML");
define("_MI_OLEDRION_FORM_SPAW", "Spaw Editor");
define("_MI_OLEDRION_FORM_HTMLAREA", "HtmlArea Editor");
define("_MI_OLEDRION_FORM_FCK", "FCK Editor");
define("_MI_OLEDRION_FORM_KOIVI", "Koivi Editor");
define("_MI_OLEDRION_FORM_TINYEDITOR", "TinyEditor");

define("_MI_OLEDRION_INFOTIPS", "Dol�ina opisa");
define("_MI_OLEDRION_INFOTIPS_DES", "�e uporabite to opcijo, bodo povezave povezane z artikli vsebovale prvih (n) znakov artikla. �e nastavite to vrednost na 0 potem bodo namigi prazni");
define('_MI_OLEDRION_UPLOADFILESIZE', 'Najve�ja velikost prene�ene datoteke (KB) 1048576 = 1 Meg');

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'Artikli istega proizvajalca');

define('_MI_OLEDRION_PREVNEX_LINK', 'Prika�i predhodnjo in naslednjo povezavo?');
define('_MI_OLEDRION_PREVNEX_LINK_DESC', 'Ko je ta opcija nastavljena na \'Da\', sta dve novi povezavi vidni na dnu vsakega artikla. Te povezave se uporabljajo za prestavljanje med predhodnjim in naslednjim artiklom v skladu z datumom objave');

define('_MI_OLEDRION_SUMMARY1_SHOW', 'Prika�i nedavne artikle v vseh kategorijah?');
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC', 'Ko uporabite to opcijo je na dnu vsakega artikla viden povzetek, ki vsebuje vse povezave do nedavno objavljenih artiklov');

define('_MI_OLEDRION_SUMMARY2_SHOW', 'Prika�i nedavne izdelke v trenutni kategoriji?');
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC', 'Ko uporabite to opcijo je na dnu vsakega artikla viden povzetek, ki vsebuje vse povezave do nedavno objavljenih artiklov');

define('_MI_OLEDRION_OPT23', "[METAGEN] - Najve�je �tevilo generiranih klju�nih besed");
define('_MI_OLEDRION_OPT23_DSC', "Izberi najve�je �tevilo klju�nih besed, ki bodo samodejno generirane.");

define('_MI_OLEDRION_OPT24', "[METAGEN] - Zaporedje klju�nih besed");
define('_MI_OLEDRION_OPT241', "Ustvari jih v zaporedju v katerem se pojavljajo v besedilu");
define('_MI_OLEDRION_OPT242', "Zaporedje po pogostosti besede");
define('_MI_OLEDRION_OPT243', "Obratno zaporedje po pogostosti besede");

define('_MI_OLEDRION_OPT25', "[METAGEN] - �rna lista");
define('_MI_OLEDRION_OPT25_DSC', "Vnesite besede (lo�ene z vejico), da jih odstranite iz meta klju�nih besed");
define('_MI_OLEDRION_RATE', 'Omogo�i uporabnikom, da ocenjujejo artikle?');

define("_MI_OLEDRION_ADVERTISEMENT", "Reklama");
define("_MI_OLEDRION_ADV_DESCR", "Vnesite besedilo ali javascript kodo, ki naj bo prikazana na va�ih artiklih");
define("_MI_OLEDRION_MIMETYPES", "Vnesite avtorizirane Mime Tipe za upload (lo�ite jih z novo vrstico)");
define('_MI_OLEDRION_STOCK_EMAIL', "Elektronski naslov na katerega naj bo sporo�eno stanje o kriti�nih zalogah");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "Ne natipkajte ni�esar, �e ne �elite uporabiti te funkcije.");

define('_MI_OLEDRION_OPT7', "Uporabi RSS?");
define('_MI_OLEDRION_OPT7_DSC', "Zadnji artikli bodo na voljo preko RSS");

define('_MI_OLEDRION_CHUNK1', "Razpon za nedavno objavljene artikle");
define('_MI_OLEDRION_CHUNK2', "Razpon za najbolj prodajane artikle");
define('_MI_OLEDRION_CHUNK3', "Razpon za artikle z najve� ogledi");
define('_MI_OLEDRION_CHUNK4', "Razpon za najbolje ocenjene artikle");
define('_MI_OLEDRION_ITEMSCNT', "�tevilo predmetov prikazanih v administraciji");
define('_MI_OLEDRION_PDF_CATALOG', "Dovoli uporabo PDF kataloga?");
define('_MI_OLEDRION_URL_REWR', "Uporabi Url prepisovanje?");

define('_MI_OLEDRION_MONEY_F', "Ime valute");
define('_MI_OLEDRION_MONEY_S', "Simbol valute");
define('_MI_OLEDRION_MONEY_P', "Vnesi kodo Paypal valute");
define('_MI_OLEDRION_NO_MORE', "Prika�i artikle tudi, ko niso na zalogi?");
define('_MI_OLEDRION_MSG_NOMORE', "Besedilo, ki bo prikazano, ko artikla ne bo ve� na zalogi");
define('_MI_OLEDRION_GRP_SOLD', "Skupina, ki naj prejme elektronsko sporo�ilo, ko je artikel prodan?");
define('_MI_OLEDRION_GRP_QTY', "Skupina uporabnikov avtorizirana, da spreminja koli�ino artiklov s strani artiklov");
define('_MI_OLEDRION_BEST_TOGETHER', "Prika�i 'Bolj�i Skupaj'?");
define('_MI_OLEDRION_UNPUBLISHED', "Prika�i artikel katerega datum objave je kasnej�i od danes?");
define('_MI_OLEDRION_DECIMAL', "�tevilo decimalnih mest");
define('_MI_OLEDRION_PDT', "Paypal - Payment Data Transfer Token (po �elji)");
define('_MI_OLEDRION_CONF04', "Lo�ilo za tiso�e");
define('_MI_OLEDRION_CONF05', "Lo�ilo za decimalke");
define('_MI_OLEDRION_CONF00', "Postavitev znaka valute?");
define('_MI_OLEDRION_CONF00_DSC', "Da = desno, Ne = levo");
define('_MI_OLEDRION_MANUAL_META', "Vnesi meta podatke ro�no?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "Ali �elite omogo�iti offline pla�ilo?");
define('_MI_OLEDRION_OFF_PAY_DSC', "�e �elite to omogo�iti morate natipkati nekaj besedil v modulovi administraciji pod 'Besedila'");

define('_MI_OLEDRION_USE_PRICE', "Ali �elite uporabiti polje za ceno?");
define('_MI_OLEDRION_USE_PRICE_DSC', "S to opcijo lahko onemogo�ite ceno artikla (da naredite katalog na primer)");

define('_MI_OLEDRION_PERSISTENT_CART', "Ali �elite uporabiti trajno ko�arico?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "ko je ta opcija nastavljena na Da se uporabnikova nakupovalna ko�arica shrani (Pozor, ta opcija bo uporabljala sredstva)");

define('_MI_OLEDRION_RESTRICT_ORDERS', "Omeji naro�ila na registrirane uporabnike?");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "�e nastavite to opcijo na Da lahko artikle naro�ajo le registrirani uporabniki");

define('_MI_OLEDRION_RESIZE_MAIN', "Ali �elite samodejno spremeniti velikost glavne slike vsakega artikla?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', '');

define('_MI_OLEDRION_CREATE_THUMBS', "Ali �elite, da modul samodejno ustvari sli�ico artikla?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "�e ne uporabite te opcije, morate sami nastaviti sli�ico artikla");

define('_MI_OLEDRION_IMAGES_WIDTH', "�irina slike");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Vi�ina slike");

define('_MI_OLEDRION_THUMBS_WIDTH', "�irina sli�ice");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Vi�ina sli�ice");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "Ali prav tako �elite spremeniti velikost slik kategorij in slik proizvajalcev na zgoraj navedene dimenzije?");

define('_MI_OLEDRION_SHIPPING_QUANTITY', "Pomno�i koli�ino poslanih artiklov s koli�ino artikla?");

define('_MI_OLEDRION_USE_TAGS', "Ali �elite uporabiti xoops tage ? (modul tag mora biti name��en)");
define('_MI_OLEDRION_TAG_CLOUD', "Modul Tag");
define('_MI_OLEDRION_TOP_TAGS', "Tagi");

?>