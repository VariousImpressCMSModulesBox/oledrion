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
 * @copyright Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package oledrion
 * @author Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 *        
 *         Version : $Id:
 *         ****************************************************************************
 */

// The name of this module
define("_MI_OLEDRION_NAME", "Obchod");

// A brief description of this module
define("_MI_OLEDRION_DESC", "Online obchod pro prodej Vašeho zboží.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1", "Nejnovější zboží");
define("_MI_OLEDRION_BNAME2", "TOP zboží");
define("_MI_OLEDRION_BNAME3", "Kategorie");
define("_MI_OLEDRION_BNAME4", "Nejprodávanější");
define("_MI_OLEDRION_BNAME5", "Nejlépe hodnocené");
define("_MI_OLEDRION_BNAME6", "Náhodné zboží");
define("_MI_OLEDRION_BNAME7", "Zboží v akci");
define("_MI_OLEDRION_BNAME8", "Nákupní košík");
define("_MI_OLEDRION_BNAME9", "Doporučené zboží");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1", "Nákupní košík");
define("_MI_OLEDRION_SMNAME2", "Index");
define("_MI_OLEDRION_SMNAME3", "Kategorie");
define("_MI_OLEDRION_SMNAME4", "Mapa kategorií");
define("_MI_OLEDRION_SMNAME5", "Kdo je kdo");
define("_MI_OLEDRION_SMNAME6", "Všechno zboží");
define("_MI_OLEDRION_SMNAME7", "Vyhledávání");
define("_MI_OLEDRION_SMNAME8", "Obchodní podmínky");
define("_MI_OLEDRION_SMNAME9", "Doporučené zboží");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0", "Prodejci");
define("_MI_OLEDRION_ADMENU1", "DPH");
define("_MI_OLEDRION_ADMENU2", "Kategorie");
define("_MI_OLEDRION_ADMENU3", "Výrobci");
define("_MI_OLEDRION_ADMENU4", "Zboží");
define("_MI_OLEDRION_ADMENU5", "Objednávky");
define("_MI_OLEDRION_ADMENU6", "Slevy");
define("_MI_OLEDRION_ADMENU7", "Novinky");
define("_MI_OLEDRION_ADMENU8", "Texty");
define("_MI_OLEDRION_ADMENU9", "Nízké stavy");
define("_MI_OLEDRION_ADMENU10", "Nástěnka");
define("_MI_OLEDRION_ADMENU11", "Připojené soubory");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', 'Zvolte maximální počet nového zboží zobrazeného na hlavní straně');
define('_MI_OLEDRION_PERPAGE', 'Zvolte maximální počet zboží zobrazeného na každé straně');

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Hlavní');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Hlavní přehled voleb upozorňování.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nová kategorie');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Informovat mě, pokud je vytvořena nová kategorie zboží.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Zaslat oznámení na email, pokud je vytvořena nová kategorie zboží.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Automatické-upozornění : Nová kategorie zboží');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Nové zboží');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', 'Informovat mě, pokud je vloženo nové zboží.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', 'Zaslat oznámení na email, pokud je vloženo nové zboží.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Automatické-upozornění : Nové zboží');

define('_MI_OLEDRION_PAYPAL_EMAIL', "Paypal - emailová adresa");
define('_MI_OLEDRION_PAYPAL_EMAILDSC', "Adresa použitá pro platby a vyrozumnění o objednávkách.<br /><u><b>Jestliže položku nevyplníte, online platba bude deaktivována.</u></b>");
define('_MI_OLEDRION_PAYPAL_TEST', "Používat Paypal sandbox?");
define("_MI_OLEDRION_FORM_OPTIONS", "Volby formuláře");
define("_MI_OLEDRION_FORM_OPTIONS_DESC", "Vyberte editor, který chcete ve formulářích využívat.");

define("_MI_OLEDRION_FORM_COMPACT", "Compact");
define("_MI_OLEDRION_FORM_DHTML", "DHTML");
define("_MI_OLEDRION_FORM_SPAW", "Spaw Editor");
define("_MI_OLEDRION_FORM_HTMLAREA", "HtmlArea Editor");
define("_MI_OLEDRION_FORM_FCK", "FCK Editor");
define("_MI_OLEDRION_FORM_KOIVI", "Koivi Editor");
define("_MI_OLEDRION_FORM_TINYEDITOR", "TinyEditor");

define("_MI_OLEDRION_INFOTIPS", "Length of tooltips");
define("_MI_OLEDRION_INFOTIPS_DES", "If you use this option, links related to products will contains the first (n) characters of the product. If you set this value to 0 then the infotips will be empty");
define('_MI_OLEDRION_UPLOADFILESIZE', 'Maximální velikost nahrávaného souboru (KB) 1048576 = 1MB');

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'Zboží stejného výrobce');

define('_MI_OLEDRION_PREVNEX_LINK', 'Zobrazovat odkaz předchozí a další?');
define('_MI_OLEDRION_PREVNEX_LINK_DESC', 'Pokud je nastaveno \'Ano\', tyto dva odkazy se objeví na konci každého zboží. Odkazy jsou používány k přechodu mezi zbožím dle data vložení.');

define('_MI_OLEDRION_SUMMARY1_SHOW', 'Zobrazovat nové zboží ve všech kategoriích?');
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC', 'Pokud využijete tuto volbu, přehled obsahující odkazy na nejnovější zboží bude viditelný na konci každého zboží.');

define('_MI_OLEDRION_SUMMARY2_SHOW', 'Zobrazovat nové zboží v aktuální kategorii?');
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC', 'Pokud využijete tuto volbu, přehled obsahující odkazy na nejnovější zboží bude viditelný na konci každého zboží.');

define('_MI_OLEDRION_OPT23', "[METAGEN] - Maximumální počet klíčových slov pro generování");
define('_MI_OLEDRION_OPT23_DSC', "Zvolte maximální počet klíčových slov, která budou automaticky generována.");

define('_MI_OLEDRION_OPT24', "[METAGEN] - Keywords order");
define('_MI_OLEDRION_OPT241', "Create them in the order they appear in the text");
define('_MI_OLEDRION_OPT242', "Order of word's frequency");
define('_MI_OLEDRION_OPT243', "Reverse order of word's frequency");

define('_MI_OLEDRION_OPT25', "[METAGEN] - Černá listina");
define('_MI_OLEDRION_OPT25_DSC', "Vložte slova (oddělujte čárkou), pro odstranění z klíčových slov");
define('_MI_OLEDRION_RATE', 'Povolit zákazníkům hodnotit zboží?');

define("_MI_OLEDRION_ADVERTISEMENT", "Oznámení");
define("_MI_OLEDRION_ADV_DESCR", "Vložte text nebo javascriptový kód, který bude zobrazen ve Vašem zboží");
define("_MI_OLEDRION_MIMETYPES", "Vložte autorizované přípony souborů pro nahrávání (oddělujte je novou řádkou)");
define('_MI_OLEDRION_STOCK_EMAIL', "Email použitý při nízkém stavu skladu");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "Nevkládejte nic, pokud tuto funkci nechcete využít.");

define('_MI_OLEDRION_OPT7', "Použít RSS zdroj?");
define('_MI_OLEDRION_OPT7_DSC', "Poslední zboží bude dostupné přes RSS zdroj");

define('_MI_OLEDRION_CHUNK1', "Rozsah pro nejnovější zboží");
define('_MI_OLEDRION_CHUNK2', "Rozsah pro nejprodávanější zboží");
define('_MI_OLEDRION_CHUNK3', "Rozsah pro nejprohlíženější zboží");
define('_MI_OLEDRION_CHUNK4', "Rozsah pro nejlépe hodnocené zboží");
define('_MI_OLEDRION_ITEMSCNT', "Počet položek zobrazených v administraci");
define('_MI_OLEDRION_PDF_CATALOG', "Povolit používání PDF katalogu?");
define('_MI_OLEDRION_URL_REWR', "Používat přepis adres?");

define('_MI_OLEDRION_MONEY_F', "Název měny");
define('_MI_OLEDRION_MONEY_S', "Symbol měny");
define('_MI_OLEDRION_MONEY_P', "Vložte kód měny pro Paypal");
define('_MI_OLEDRION_NO_MORE', "Zobrazovat zboží i když není skladem dostupné?");
define('_MI_OLEDRION_MSG_NOMORE', "Text, který se zobrazí tam, kde není zboží dostupné skladem");
define('_MI_OLEDRION_GRP_SOLD', "Zasílat email do skupiny, pokud je zboží vyprodané?");
define('_MI_OLEDRION_GRP_QTY', "Uživatelská skupina, která může měnit počet zboží z prostředí obchodu.");
define('_MI_OLEDRION_BEST_TOGETHER', "Zobrazovat 'Nejlépe společně'?");
define('_MI_OLEDRION_UNPUBLISHED', "Zobrazovat zboží, které má datum vložení pozdější než dnes?");
define('_MI_OLEDRION_DECIMAL', "Počet desetinných míst pro měnu");
define('_MI_OLEDRION_PDT', "Paypal - Payment Data Transfer Token (optional)");
define('_MI_OLEDRION_CONF04', "Oddělovač tisíců");
define('_MI_OLEDRION_CONF05', "Oddělovač desetin");
define('_MI_OLEDRION_CONF00', "Jaká bude pozice měny?");
define('_MI_OLEDRION_CONF00_DSC', "Ano = vpravo, Ne = vlevo");
define('_MI_OLEDRION_MANUAL_META', "Vložit meta data manuálně?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "Chcete povolit offline platby?");
define('_MI_OLEDRION_OFF_PAY_DSC', "Pokud to povolíte, musíte vyplnit nějaký text v administraci - 'Texty'");

define('_MI_OLEDRION_USE_PRICE', "Chcete používat položku ceny?");
define('_MI_OLEDRION_USE_PRICE_DSC', "Pokud tuto volbu vypnete, můžete obchod používat např. jako katalog.");

define('_MI_OLEDRION_PERSISTENT_CART', "Chcete používat persistentní nákupní košík?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "Pokud nastavíte na Ano, nákupní košík zákazníka je uložen (Upozornění - volba může spotřebovávat dostupné místo).");

define('_MI_OLEDRION_RESTRICT_ORDERS', "Omezení objednávek pro registrované zákazníky?");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "Pokud nastavíte na Ano, mohou objednávat zboží pouze registrovaní zákazníci.");

define('_MI_OLEDRION_RESIZE_MAIN', "Chcete automaticky měnit velikost hlavního obrázku každého obrázku zboží?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', '');

define('_MI_OLEDRION_CREATE_THUMBS', "Chcete aby modul automaticky vytvářel náhled zboží?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "Pokud volbu nepoužijete, musíte nahrávat náhledy ručně.");

define('_MI_OLEDRION_IMAGES_WIDTH', "Obrázky - šířka");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Obrázky - výška");

define('_MI_OLEDRION_THUMBS_WIDTH', "Náhledy - šířka");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Náhledy - výška");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "Chcete také změnit velikosti obrázků kategorií a výrobců dle výše uvedených rozměrů?");
?>
