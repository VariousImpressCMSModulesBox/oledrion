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
define("_MI_OLEDRION_NAME", "Mein Shop");

// A brief description of this module
define("_MI_OLEDRION_DESC", "Erstellt einen Online Shop zum Anzeigen und Verkaufen von Produkten.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1", "Aktuelle Produkte");
define("_MI_OLEDRION_BNAME2", "Top Produkte");
define("_MI_OLEDRION_BNAME3", "Kategorien");
define("_MI_OLEDRION_BNAME4", "Best verkaufte Produkte");
define("_MI_OLEDRION_BNAME5", "Best bewertete Produkte");
define("_MI_OLEDRION_BNAME6", "Zufällige Produkte");
define("_MI_OLEDRION_BNAME7", "Produkte in der Werbung");
define("_MI_OLEDRION_BNAME8", "Warenkorb");
define("_MI_OLEDRION_BNAME9", "Empfohlene Produkte");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1", "Warenkorb");
define("_MI_OLEDRION_SMNAME2", "Index");
define("_MI_OLEDRION_SMNAME3", "Kategorien");
define("_MI_OLEDRION_SMNAME4", "Kategorie Karte");
define("_MI_OLEDRION_SMNAME5", "Wer ist wer");
define("_MI_OLEDRION_SMNAME6", "Alle Produkte");
define("_MI_OLEDRION_SMNAME7", "Suche");
define("_MI_OLEDRION_SMNAME8", "Verkaufsbedingungen");
define("_MI_OLEDRION_SMNAME9", "Empfohlene Produkte");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0", "Lieferanten");
define("_MI_OLEDRION_ADMENU1", "MwSt");
define("_MI_OLEDRION_ADMENU2", "Kategorien");
define("_MI_OLEDRION_ADMENU3", "Hersteller");
define("_MI_OLEDRION_ADMENU4", "Produkte");
define("_MI_OLEDRION_ADMENU5", "Bestellungen");
define("_MI_OLEDRION_ADMENU6", "Rabatte");
define("_MI_OLEDRION_ADMENU7", "Newsletter");
define("_MI_OLEDRION_ADMENU8", "Texte");
define("_MI_OLEDRION_ADMENU9", "Lager");
define("_MI_OLEDRION_ADMENU10", "Übersicht");
define("_MI_OLEDRION_ADMENU11", "Angehängte Dateien");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', 'Anzahl der neuen Produkte die auf der Startseite angezeigt werden');
define('_MI_OLEDRION_PERPAGE', 'Anzahl der Produkte die auf jeder Seite angezeigt werden');

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Global');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Globale Liste für Benachrichtigungen.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Neu Kategorie');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Benachrichtigen, wenn eine neue Kategorie angelegt wurde.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Benachrichtigung wenn eine neue Kategorie angelegt wird.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Benachrichtigung : Neue Kategorie');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Neues Produkt');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', 'Benachrichtigen, wenn ein neues Produkt eingestellt wurde.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', 'Benachrichtigung wenn ein neues Produkt angelegt wird.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Benachrichtigung : Neues Produkt');

define('_MI_OLEDRION_PAYPAL_EMAIL', "Paypal E-Mail Adresse");
define('_MI_OLEDRION_PAYPAL_EMAILDSC', "Diese Adresse wird für Bezahlungen und Auftrags Benachrichtigungen verwendent.<br /><u><b>Wenn Sie dieses Feld nicht ausfüllen ist die Online Bezahlung deaktiviert!</u></b>");

define('_MI_OLEDRION_PAYPAL_TEST', "Benutze Paypal Sandbox ?");
define("_MI_OLEDRION_FORM_OPTIONS", "Form Option");
define("_MI_OLEDRION_FORM_OPTIONS_DESC", "Editor auswählen:");

define("_MI_OLEDRION_FORM_COMPACT", "Compact");
define("_MI_OLEDRION_FORM_DHTML", "DHTML");
define("_MI_OLEDRION_FORM_SPAW", "Spaw Editor");
define("_MI_OLEDRION_FORM_HTMLAREA", "HtmlArea Editor");
define("_MI_OLEDRION_FORM_FCK", "FCK Editor");
define("_MI_OLEDRION_FORM_KOIVI", "Koivi Editor");
define("_MI_OLEDRION_FORM_TINYEDITOR", "TinyEditor");

define("_MI_OLEDRION_INFOTIPS", "Länge des Tooltips");
define("_MI_OLEDRION_INFOTIPS_DES", "Zeigt (n) Zeichen des Tooltips. Bei 0 wird kein Tooltip angezeigt.");
define('_MI_OLEDRION_UPLOADFILESIZE', 'Maximale Dateigröße für den Upload in KB (1048576 = 1 Meg)');

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'Produkte vom selben Hersteller');

define('_MI_OLEDRION_PREVNEX_LINK', 'Zeige \'vorherige und nächste\' Link?');
define('_MI_OLEDRION_PREVNEX_LINK_DESC', 'Steht diese Option auf \'Ja\', werden zwei neue Links am Fußende jedes Produkts angezeigt. Diese Links werden verwendet um vorherige und nächste Produkte im Bezug auf das Veröffentlichungsdateim anzuzeigen');

define('_MI_OLEDRION_SUMMARY1_SHOW', 'Zeige neue Produkte in allen Kategorien?');
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC', 'Wenn Sie diese Option benutzen wird eine Zusammenfassung mit Links zu allen neuen Produkten am Fußende jedes Produkts angezeigt');

define('_MI_OLEDRION_SUMMARY2_SHOW', 'Zeige neue Produkte in aktueller Kategorie?');
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC', 'WWenn Sie diese Option benutzen wird eine Zusammenfassung mit Links zu allen neuen Produkten am Fußende jedes Produkts angezeigt');

define('_MI_OLEDRION_OPT23', "[METAGEN] - Maximale Anzahl zur Schlüsselwort Erzeugung");
define('_MI_OLEDRION_OPT23_DSC', "Wähle die maximale Anzahl an Schlüsselwörtern die automatisch erzeugt werden soll.");

define('_MI_OLEDRION_OPT24', "[METAGEN] - Schlüsselwörter Reihenfolge");
define('_MI_OLEDRION_OPT241', "Erzeuge in der Reihenfolge in der Sie im Text enthalten sind");
define('_MI_OLEDRION_OPT242', "Reihenfolge nach Häufigkeit");
define('_MI_OLEDRION_OPT243', "Umgekehrte Reihenfolge nach Häufigkeit");

define('_MI_OLEDRION_OPT25', "[METAGEN] - Blacklist");
define('_MI_OLEDRION_OPT25_DSC', "Wörter eingeben (getrennt mit einem Beistrich) die von den automatisch erzeugten Schlüsselwörtern entfernt werden sollen");
define('_MI_OLEDRION_RATE', 'Erlaube Usern Produkte zu bewerten?');

define("_MI_OLEDRION_ADVERTISEMENT", "Werbung");
define("_MI_OLEDRION_ADV_DESCR", "Geben Sie Text oder Javascript ein, der bei Ihren Produkten angezeigt werden soll.");
define("_MI_OLEDRION_MIMETYPES", "Wählen Sie gültige Mime Typen zum Hochladen (nur ein Mimetyp je Zeile)");
define('_MI_OLEDRION_STOCK_EMAIL', "Gruppe, die über geringe Lagerbestände informiert wird:");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "Leer lassen, wenn Sie diese Funktion nicht nutzen wollen.");

define('_MI_OLEDRION_OPT7', "Benutze RSS Feeds ?");
define('_MI_OLEDRION_OPT7_DSC', "Die letzten Produkte sind als RSS Fedd abrufbar");

define('_MI_OLEDRION_CHUNK1', "Bereich für aktuellste Produkte");
define('_MI_OLEDRION_CHUNK2', "Bereich für meist verkaufte Produkte");
define('_MI_OLEDRION_CHUNK3', "Bereich für meist gesehene Produkte");
define('_MI_OLEDRION_CHUNK4', "Bereich für best bewertete Produkte");
define('_MI_OLEDRION_ITEMSCNT', "Anzahl Objekte die in der Administration angezeigt werden sollen");
define('_MI_OLEDRION_PDF_CATALOG', "Erlaube die Verwendung des PDF Katalog?");
define('_MI_OLEDRION_URL_REWR', "Benutze URL Rewriting?");

define('_MI_OLEDRION_MONEY_F', "Name der Währung");
define('_MI_OLEDRION_MONEY_S', "Symbol der Währung");
define('_MI_OLEDRION_MONEY_P', "Paypal Währungscode");
define('_MI_OLEDRION_NO_MORE', "Produkte anzeigen die nicht lagernd sind?");
define('_MI_OLEDRION_MSG_NOMORE', "Text der angezeigt wird wenn der Lagerbestand des Produkts erschöpft ist");
define('_MI_OLEDRION_GRP_SOLD', "Gruppe die eine Email bekommt, wenn ein Produkt verkauft wurde:");
define('_MI_OLEDRION_GRP_QTY', "Gruppe, die die Bestandsmenge der Produkte von der Produktseite aus bearbeiten dürfen:");
define('_MI_OLEDRION_BEST_TOGETHER', "Zeige 'Besser zusammen' ?");
define('_MI_OLEDRION_UNPUBLISHED', "Zeige Produkte deren Erscheinungsdatum später als das aktuelle Datum ist?");
define('_MI_OLEDRION_DECIMAL', "Dezimalstellen für Peis");
define('_MI_OLEDRION_PDT', "Paypal - Payment Data Transfer Token (optional)");
define('_MI_OLEDRION_CONF04', "Tausender Trennzeichen");
define('_MI_OLEDRION_CONF05', "Dezimal Trennzeichen");
define('_MI_OLEDRION_CONF00', "Währung Position?");
define('_MI_OLEDRION_CONF00_DSC', "Ja = rechts, Nein = links");
define('_MI_OLEDRION_MANUAL_META', "Enter meta data manually ?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "Soll die Offline Bezahlung aktiviert werden?");
define('_MI_OLEDRION_OFF_PAY_DSC', "Wenn ja muss im Tab 'Texte' ein Anzeigetext definiert werden");

define('_MI_OLEDRION_USE_PRICE', "Soll das Preisfeld benutzt werden?");
define('_MI_OLEDRION_USE_PRICE_DSC', "Mit dieser Option kann der Preis ausgeschaltet werden (z.B. für einen Katalog)");

define('_MI_OLEDRION_PERSISTENT_CART', "Wollen Sie einen beständigen Warenkorb?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "Wenn diese Option auf ja gesetzt wird, wird der Warenkorb des Users gespeichert (Diese Option benötigt zusätzliche Resourcen!)");

define('_MI_OLEDRION_RESTRICT_ORDERS', "Beschränke Aufträge nur auf registrierte User?");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "Wenn diese Option auf ja gesetzt wird können nur registrierte User Produkte bestellen");

define('_MI_OLEDRION_RESIZE_MAIN', "Soll das Produktbild automatisch ein resize bekommen ?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', '');

define('_MI_OLEDRION_CREATE_THUMBS', "Soll automatisch vom Produktbild ein Vorschaubild erzeugt werden?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "Bei nein muss ein extra Vorschaubild hochgeladen werden.");

define('_MI_OLEDRION_IMAGES_WIDTH', "Bildbreite");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Bildhöhe");

define('_MI_OLEDRION_THUMBS_WIDTH', "Vorschaubreite");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Vorschauhöhe");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "Sollen die Kategorie- und Herstellerbilder ebenfalls mit den Daten (wie oben) geändert werden??");
?>