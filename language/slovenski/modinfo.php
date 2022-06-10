<?php
/**
 * ****************************************************************************
 * Oledrion - MODULE FOR XOOPS
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
 
 * Translator : Srdan Crevar
 * ****************************************************************************
 */

// The name of this module
define("_MI_OLEDRION_NAME","Oledrion");

// A brief description of this module
define("_MI_OLEDRION_DESC","Ustvari spletno trgovino Oledrion, ki prikazije in prodaja artikle.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1","Novi artikli");
define("_MI_OLEDRION_BNAME2","Naj artikli");
define("_MI_OLEDRION_BNAME3","Skupine artiklov");
define("_MI_OLEDRION_BNAME4","Najbolje prodajani artikli");
define("_MI_OLEDRION_BNAME5","Najbolje ocenjeni artikli");
define("_MI_OLEDRION_BNAME6","Nakljuèni artikli");
define("_MI_OLEDRION_BNAME7","Artikli in promocije");
define("_MI_OLEDRION_BNAME8","Nakupovalna košarica");
define("_MI_OLEDRION_BNAME9","Priporoèamo");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1","Nakupovalna košarica");
define("_MI_OLEDRION_SMNAME2","Prva stran");
define("_MI_OLEDRION_SMNAME3","Skupine artiklov");
define("_MI_OLEDRION_SMNAME4","Mapa kategorij");
define("_MI_OLEDRION_SMNAME5","Proizvajalci");
define("_MI_OLEDRION_SMNAME6","Vsi artilki");
define("_MI_OLEDRION_SMNAME7","Iskanje");
define("_MI_OLEDRION_SMNAME8","Splošni pogoji prodaje");
define("_MI_OLEDRION_SMNAME9","Priporoèeni artikli");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0","Prodajalci");
define("_MI_OLEDRION_ADMENU1","Davène stopnje");
define("_MI_OLEDRION_ADMENU2","Skupine artiklov");
define("_MI_OLEDRION_ADMENU3","Proizvajalci");
define("_MI_OLEDRION_ADMENU4","Artikli");
define("_MI_OLEDRION_ADMENU5","Naroèila");
define("_MI_OLEDRION_ADMENU6","Popusti");
define("_MI_OLEDRION_ADMENU7","Novice");
define("_MI_OLEDRION_ADMENU8", "Besedila");
define("_MI_OLEDRION_ADMENU9", "Kritiène zaloge");
define("_MI_OLEDRION_ADMENU10", "NADZOR");
define("_MI_OLEDRION_ADMENU11", "Priponke");
define("_MI_OLEDRION_ADMENU12", "Plaèilni sis.");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', 'Izberi najveèje število artiklov prikazanih na prvi strani');
define('_MI_OLEDRION_PERPAGE', 'Izberi najveèje število izdelkov prikazanih na vsaki strani');

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Globalno');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Globalni seznami možnosti obvešèanj.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nova kategorija');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Obvesti me, ko je ustvarjena nova kategorija artikla.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Prejmi obvestilo, ko je ustvarjena nova kategorija artikla.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} samodejno obvestilo : Kategorija novega artikla');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Nov artikel');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', 'Obvesti me, ko je objavljen nov artikel.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', 'Prejmi obvestilo, ko je objavljen nov artikel.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} samodejno obvestilo : Nov artikel');

define('_MI_OLEDRION_PAYPAL_EMAIL', "Paypal E-mail naslov");
define('_MI_OLEDRION_PAYPAL_EMAILDSC', "Naslov uporabljan za plaèila in obvestila o naroèilih.<br /><u><b>èe ne izpolnite teh polj bo plaèevanje preko spleta onemogoèeno.</u></b>");
define('_MI_OLEDRION_PAYPAL_TEST', "Uporabi Paypal sandbox?");
define("_MI_OLEDRION_FORM_OPTIONS","Ustvari opcijo");
define("_MI_OLEDRION_FORM_OPTIONS_DESC","Izberi urejevalnik za uporabo. èe imate 'preprosto' instalacijo (npr. uporabljate samo xoops core editor class, ki se nahaja v standardnem Xoops core paketu), lahko samo izberete DHTML in Compact");

define("_MI_OLEDRION_FORM_COMPACT","Compact");
define("_MI_OLEDRION_FORM_DHTML","DHTML");
define("_MI_OLEDRION_FORM_SPAW","Spaw Editor");
define("_MI_OLEDRION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_OLEDRION_FORM_FCK","FCK Editor");
define("_MI_OLEDRION_FORM_KOIVI","Koivi Editor");
define("_MI_OLEDRION_FORM_TINYEDITOR","TinyEditor");

define("_MI_OLEDRION_INFOTIPS","Dolžina opisa");
define("_MI_OLEDRION_INFOTIPS_DES","Èe uporabite to opcijo, bodo povezave povezane z artikli vsebovale prvih (n) znakov artikla. Èe nastavite to vrednost na 0 potem bodo namigi prazni");
define('_MI_OLEDRION_UPLOADFILESIZE', 'Najveèja velikost prenešene datoteke (KB) 1048576 = 1 Meg');

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'Artikli istega proizvajalca');

define('_MI_OLEDRION_PREVNEX_LINK','Prikaži predhodnjo in naslednjo povezavo?');
define('_MI_OLEDRION_PREVNEX_LINK_DESC','Ko je ta opcija nastavljena na \'Da\', sta dve novi povezavi vidni na dnu vsakega artikla. Te povezave se uporabljajo za prestavljanje med predhodnjim in naslednjim artiklom v skladu z datumom objave');

define('_MI_OLEDRION_SUMMARY1_SHOW','Prikaži nedavne artikle v vseh kategorijah?');
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC','Ko uporabite to opcijo je na dnu vsakega artikla viden povzetek, ki vsebuje vse povezave do nedavno objavljenih artiklov');

define('_MI_OLEDRION_SUMMARY2_SHOW','Prikaži nedavne izdelke v trenutni kategoriji?');
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC','Ko uporabite to opcijo je na dnu vsakega artikla viden povzetek, ki vsebuje vse povezave do nedavno objavljenih artiklov');

define('_MI_OLEDRION_OPT23',"[METAGEN] - Najveèje število generiranih kljuènih besed");
define('_MI_OLEDRION_OPT23_DSC',"Izberi najveèje število kljuènih besed, ki bodo samodejno generirane.");

define('_MI_OLEDRION_OPT24',"[METAGEN] - Zaporedje kljuènih besed");
define('_MI_OLEDRION_OPT241',"Ustvari jih v zaporedju v katerem se pojavljajo v besedilu");
define('_MI_OLEDRION_OPT242',"Zaporedje po pogostosti besede");
define('_MI_OLEDRION_OPT243',"Obratno zaporedje po pogostosti besede");

define('_MI_OLEDRION_OPT25',"[METAGEN] - Èrna lista");
define('_MI_OLEDRION_OPT25_DSC',"Vnesite besede (loèene z vejico), da jih odstranite iz meta kljuènih besed");
define('_MI_OLEDRION_RATE','Omogoèi uporabnikom, da ocenjujejo artikle?');

define("_MI_OLEDRION_ADVERTISEMENT","Reklama");
define("_MI_OLEDRION_ADV_DESCR","Vnesite besedilo ali javascript kodo, ki naj bo prikazana na vaših artiklih");
define("_MI_OLEDRION_MIMETYPES","Vnesite avtorizirane Mime Tipe za upload (loèite jih z novo vrstico)");
define('_MI_OLEDRION_STOCK_EMAIL', "Elektronski naslov na katerega naj bo sporoèeno stanje o kritiènih zalogah");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "Ne natipkajte nièesar, èe ne želite uporabiti te funkcije.");

define('_MI_OLEDRION_OPT7',"Uporabi RSS?");
define('_MI_OLEDRION_OPT7_DSC',"Zadnji artikli bodo na voljo preko RSS");

define('_MI_OLEDRION_CHUNK1',"Razpon za nedavno objavljene artikle");
define('_MI_OLEDRION_CHUNK2',"Razpon za najbolj prodajane artikle");
define('_MI_OLEDRION_CHUNK3',"Razpon za artikle z najveè ogledi");
define('_MI_OLEDRION_CHUNK4',"Razpon za najbolje ocenjene artikle");
define('_MI_OLEDRION_ITEMSCNT',"Število predmetov prikazanih v administraciji");
define('_MI_OLEDRION_PDF_CATALOG',"Dovoli uporabo PDF kataloga?");
define('_MI_OLEDRION_URL_REWR',"Uporabi Url prepisovanje?");

define('_MI_OLEDRION_MONEY_F',"Ime valute");
define('_MI_OLEDRION_MONEY_S',"Simbol valute");
define('_MI_OLEDRION_MONEY_P',"Vnesi kodo Paypal valute");
define('_MI_OLEDRION_NO_MORE',"Prikaži artikle tudi, ko niso na zalogi?");
define('_MI_OLEDRION_MSG_NOMORE',"Besedilo, ki bo prikazano, ko artikla ne bo veè na zalogi");
define('_MI_OLEDRION_GRP_SOLD',"Skupina, ki naj prejme elektronsko sporoèilo, ko je artikel prodan?");
define('_MI_OLEDRION_GRP_QTY',"Skupina uporabnikov avtorizirana, da spreminja kolièino artiklov s strani artiklov");
define('_MI_OLEDRION_BEST_TOGETHER',"Prikaži 'Boljši Skupaj'?");
define('_MI_OLEDRION_UNPUBLISHED',"Prikaži artikel katerega datum objave je kasnejši od danes?");
define('_MI_OLEDRION_DECIMAL', "Število decimalnih mest");
define('_MI_OLEDRION_PDT', "Paypal - Payment Data Transfer Token (po želji)");
define('_MI_OLEDRION_CONF04',"Loèilo za tisoèe");
define('_MI_OLEDRION_CONF05', "Loèilo za decimalke");
define('_MI_OLEDRION_CONF00',"Postavitev znaka valute?");
define('_MI_OLEDRION_CONF00_DSC', "Da = desno, Ne = levo");
define('_MI_OLEDRION_MANUAL_META', "Vnesi meta podatke roèno?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "Ali želite omogoèiti offline plaèilo?");
define('_MI_OLEDRION_OFF_PAY_DSC', "Èe želite to omogoèiti morate natipkati nekaj besedil v modulovi administraciji pod 'Besedila'");

define('_MI_OLEDRION_USE_PRICE', "Ali želite uporabiti polje za ceno?");
define('_MI_OLEDRION_USE_PRICE_DSC', "S to opcijo lahko onemogoèite ceno artikla (da naredite katalog na primer)");

define('_MI_OLEDRION_PERSISTENT_CART', "Ali želite uporabiti trajno košarico?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "ko je ta opcija nastavljena na Da se uporabnikova nakupovalna košarica shrani (Pozor, ta opcija bo uporabljala sredstva)");

define('_MI_OLEDRION_RESTRICT_ORDERS', "Omeji naroèila na registrirane uporabnike?");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "Èe nastavite to opcijo na Da lahko artikle naroèajo le registrirani uporabniki");

define('_MI_OLEDRION_RESIZE_MAIN', "Ali želite samodejno spremeniti velikost glavne slike vsakega artikla?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', '');

define('_MI_OLEDRION_CREATE_THUMBS', "Ali želite, da modul samodejno ustvari slièico artikla?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "Èe ne uporabite te opcije, morate sami nastaviti slièico artikla");

define('_MI_OLEDRION_IMAGES_WIDTH', "Širina slike");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Višina slike");

define('_MI_OLEDRION_THUMBS_WIDTH', "Širina slièice");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Višina slièice");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "Ali prav tako želite spremeniti velikost slik kategorij in slik proizvajalcev na zgoraj navedene dimenzije?");

define('_MI_OLEDRION_SHIPPING_QUANTITY', "Pomnoži kolièino poslanih artiklov s kolièino artikla?");


define('_MI_OLEDRION_USE_TAGS', "Ali želite uporabiti xoops tage ? (modul tag mora biti namešèen)");
define('_MI_OLEDRION_TAG_CLOUD', "Modul Tag");
define('_MI_OLEDRION_TOP_TAGS', "Tagi");

?>