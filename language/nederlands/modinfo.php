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

// The name of this module
define("_MI_OLEDRION_NAME", "WebShop");

// A brief description of this module
define("_MI_OLEDRION_DESC", "Creeer een webshop om producten de tonen en te verkopen..");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1", "Nieuwe Producte");
define("_MI_OLEDRION_BNAME2", "Top Producten");
define("_MI_OLEDRION_BNAME3", "Categorieen");
define("_MI_OLEDRION_BNAME4", "Meest Verkocht");
define("_MI_OLEDRION_BNAME5", "Best Beoordeelde Producten");
define("_MI_OLEDRION_BNAME6", "Willekeurig Product");
define("_MI_OLEDRION_BNAME7", "Aanbiedingen");
define("_MI_OLEDRION_BNAME8", "Winkelmand");
define("_MI_OLEDRION_BNAME9", "aanbevolen producten");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1", "Winkelmand");
define("_MI_OLEDRION_SMNAME2", "Index");
define("_MI_OLEDRION_SMNAME3", "Categorieen");
define("_MI_OLEDRION_SMNAME4", "Categorie overzicht");
define("_MI_OLEDRION_SMNAME5", "Wie is wie");
define("_MI_OLEDRION_SMNAME6", "Alle producten");
define("_MI_OLEDRION_SMNAME7", "Zoeken");
define("_MI_OLEDRION_SMNAME8", "Leveringsvoorwaarden");
define("_MI_OLEDRION_SMNAME9", "Aanbevolen producten");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0", "Verkopers");
define("_MI_OLEDRION_ADMENU1", "BTW");
define("_MI_OLEDRION_ADMENU2", "Categorieen");
define("_MI_OLEDRION_ADMENU3", "Producent");
define("_MI_OLEDRION_ADMENU4", "Producten");
define("_MI_OLEDRION_ADMENU5", "Bestellingen");
define("_MI_OLEDRION_ADMENU6", "Kortingen");
define("_MI_OLEDRION_ADMENU7", "Nieuwsbrief");
define("_MI_OLEDRION_ADMENU8", "Text");
define("_MI_OLEDRION_ADMENU9", "Lage voorraad");
define("_MI_OLEDRION_ADMENU10", "Dashboard");
define("_MI_OLEDRION_ADMENU11", "Attachments");
define("_MI_OLEDRION_ADMENU12", "Gateways");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', 'Selecteer het maximum aantal nieuwe producten getoond op de voorpagina');
define('_MI_OLEDRION_PERPAGE', 'Selecteer het maximum aantal nieuwe producten getoond op elke pagina');

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Globall');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Global lists notification options.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nieuwe Categorie');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Stuur mij een Notificatie wanneer een nieuwe product category is aangemaakt.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Ontvang een notificatie wanneer een nieuwe product-categorie is aangemaakt.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische notificatie : Nieuwe product-categorie');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Nieuw Product');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', 'Stuur mij een Notificatie wanneer een nieuw product is toegevoegd.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', 'Ontvang een notificatie wanneer een nieuwe product is toegevoegd.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische notificatie : Nieuwe product');

define("_MI_OLEDRION_FORM_OPTIONS", "Formulier opties");
define("_MI_OLEDRION_FORM_OPTIONS_DESC", "Select welke texteditor u wenst te gebruiken. Indien u een 'eenvoudige installatie' heeft (bv. U gebruikt enkel de xoops basis-editor class , voorzien in de standaard Xoops core package), kan u enkel DHTML en Compact selecteren");

define("_MI_OLEDRION_FORM_COMPACT", "Compact");
define("_MI_OLEDRION_FORM_DHTML", "DHTML");
define("_MI_OLEDRION_FORM_SPAW", "Spaw Editor");
define("_MI_OLEDRION_FORM_HTMLAREA", "HtmlArea Editor");
define("_MI_OLEDRION_FORM_FCK", "FCK Editor");
define("_MI_OLEDRION_FORM_KOIVI", "Koivi Editor");
define("_MI_OLEDRION_FORM_TINYEDITOR", "TinyEditor");

define("_MI_OLEDRION_INFOTIPS", "Lengte van de tooltips");
define("_MI_OLEDRION_INFOTIPS_DES", "Indien u deze optie gebruikt, bevatten de links gerelateerd naar het product, de eerste tekens van het product. Indien u deze waarde op 0 zet zullen de infotips leeg blijven");
define('_MI_OLEDRION_UPLOADFILESIZE', 'MAX Filesize Upload (KB) 1048576 = 1 Meg');

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'Producten van dezelfde producent.');

define('_MI_OLEDRION_PREVNEX_LINK', 'Toon vorige en volgende link ?');
define('_MI_OLEDRION_PREVNEX_LINK_DESC', 'Wanneer deze \'JA\' staat, twee nieuwe links zijn zichtbaar onder het product. Deze links zijn te gebruiken om naar het vorige en volgende item te gaan, gesorteerd op datum van toevoeging.');

define('_MI_OLEDRION_SUMMARY1_SHOW', 'Toon de nieuwste producten uit alle categorieen?');
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC', 'Bij gebruik van deze optie, een opsomming van alle recent toegevoegde artikelen zal zichtbaar worden onder het product.');

define('_MI_OLEDRION_SUMMARY2_SHOW', 'Toon recente producten van de huidige categorie ?');
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC', 'Bij gebruik van deze optie, zal een link naar alle recent toegevoegde artikelen zichtbaar worden onder het product.');

define('_MI_OLEDRION_OPT23', "[METAGEN] - Maximum aantal sleutelwoorden te genereren");
define('_MI_OLEDRION_OPT23_DSC', "Selecteer het maximum aantal sleutelwoorden welke automatisch gegenereerd worden.");

define('_MI_OLEDRION_OPT24', "[METAGEN] - Sleutelwoorden volgorde.");
define('_MI_OLEDRION_OPT241', "Creeër deze in de volgorde dat ze in de text voorkomen");
define('_MI_OLEDRION_OPT242', "Volgorde van woord-frequency");
define('_MI_OLEDRION_OPT243', "Draai de volgorde van de getoonde woord-frequency om");

define('_MI_OLEDRION_OPT25', "[METAGEN] - Blacklist");
define('_MI_OLEDRION_OPT25_DSC', "Vul de woorden in (gescheiden door komma's) welke verwijderd moeten worden uit de meta keywords");
define('_MI_OLEDRION_RATE', 'Sta toe dat gebruikers Producten beoordelen ?');

define("_MI_OLEDRION_ADVERTISEMENT", "Advertenties");
define("_MI_OLEDRION_ADV_DESCR", "Voeg een text of een javascript-code toe om te tonen bij de producten");
define("_MI_OLEDRION_MIMETYPES", "Toegestane Mime Types voor upload (elk gescheiden op een nieuwe regel)");
define('_MI_OLEDRION_STOCK_EMAIL', "Email voor melding van lage voorraad.");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "Vul hier niets in als u deze functie niet wenst te gebruiken.");

define('_MI_OLEDRION_OPT7', "Gebruik RSS feeds ?");
define('_MI_OLEDRION_OPT7_DSC', "De laatste welke beschikbaar zijn via RSS Feed");

define('_MI_OLEDRION_CHUNK1', "Ruimte voor meest recente Producten");
define('_MI_OLEDRION_CHUNK2', "Ruimte voor meest gekochte Producten");
define('_MI_OLEDRION_CHUNK3', "Ruimte voor meest bekeken Producten");
define('_MI_OLEDRION_CHUNK4', "Ruimte voor de best beoordeelde Producten");
define('_MI_OLEDRION_ITEMSCNT', "Items geteld om te tonen in administratie");
define('_MI_OLEDRION_PDF_CATALOG', "Sta gebruik van een PDF-catalog toe ?");
define('_MI_OLEDRION_URL_REWR', "Gebruik URL-hernoemen ?");

define('_MI_OLEDRION_MONEY_F', "Naam van munteenheid");
define('_MI_OLEDRION_MONEY_S', "Symbool voor munteenheid");
define('_MI_OLEDRION_NO_MORE', "Toon producten zelfs wanneer deze niet voorradig zijn ?");
define('_MI_OLEDRION_MSG_NOMORE', "Text welke getoond wordt indien dit product niet meer op voorraad is.");
define('_MI_OLEDRION_GRP_SOLD', "Selecteer een groep welke een e-mail ontvangt wanneer dit product niet voorradig is. ?");
define('_MI_OLEDRION_GRP_QTY', "Groep of gebruikers welke geauthoriseerd zijn om aanpassingen te maken aan de voorraad in de product-pagina's");
define('_MI_OLEDRION_BEST_TOGETHER', "Toon 'Geadviseerd in combinatie met' ?");
define('_MI_OLEDRION_UNPUBLISHED', "Toon de producten welke later dan vandaag getoond worden ?");
define('_MI_OLEDRION_DECIMAL', "Decimaal-markering voor valuta");
define('_MI_OLEDRION_CONF04', "Duizendtal-scheidingsteken");
define('_MI_OLEDRION_CONF05', "Decimaal scheidingsteken");
define('_MI_OLEDRION_CONF00', "Valuta positie ?");
define('_MI_OLEDRION_CONF00_DSC', "Ja = Rechts, Nee = Links");
define('_MI_OLEDRION_MANUAL_META', "Voeg data manueel toe ?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "Offline-betalingen uitschakelen?");
define('_MI_OLEDRION_OFF_PAY_DSC', "Wanneer u dit uitschakeld, dient u text in te voeren in de administratiemodule bij de text-TABS");

define('_MI_OLEDRION_USE_PRICE', "Wenst u het prijs-veld te gebruiken?");
define('_MI_OLEDRION_USE_PRICE_DSC', "Met deze optie kan u de prijs uitschakelen (voor een voorbeeldcatalogus)");

define('_MI_OLEDRION_PERSISTENT_CART', "Moet per gebruiker het winkelmandje opgeslagen worden?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "indien u hiervoor kiest, zal het mandje opgeslagen worden (Let op, dit kan extra systeembelasting opleveren.)");

define('_MI_OLEDRION_RESTRICT_ORDERS', "Sta enkel geregistreerde gebruikers toe bestellingen te plaatsen.");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "Indien dit ingeschakeld is kunnen alleen geregistreerde gebruikers bestellingen plaatsen.");

define('_MI_OLEDRION_RESIZE_MAIN', "Wenst u automatisch de hoofdafbeelding van elk product te resizen?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', '');

define('_MI_OLEDRION_CREATE_THUMBS', "Moet de module automatisch de productafbeelding tonen?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "Bij gebruik van deze optie dient u zelf productafbeeldingen (thumbs) te uploaden.");

define('_MI_OLEDRION_IMAGES_WIDTH', "Afbeelding breedte");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Afbeelding hoogte");

define('_MI_OLEDRION_THUMBS_WIDTH', "Thumbs breedte");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Thumbs hoogte");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "Dienen de categorie- en producentenafbeeldingen ook aangepast te worden aan bovenvermelde afmetingen?");
define('_MI_OLEDRION_SHIPPING_QUANTITY', "Vermenigvuldig de verzendkosten met het aantal producten ?");

define('_MI_OLEDRION_USE_TAGS', "Wenst u het tags system te gebruiken ? (the Xoops TAG module moet geinstalleerd zijn)");
define('_MI_OLEDRION_TAG_CLOUD', "Module Tag Cloud");
define('_MI_OLEDRION_TOP_TAGS', "Module Top Tags");
?>
