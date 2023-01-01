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
define("_MI_OLEDRION_NAME", "My Shop");

// A brief description of this module
define("_MI_OLEDRION_DESC", "Crea uno shop online per mostrare e vendere prodotti.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1", "Prodotti recenti");
define("_MI_OLEDRION_BNAME2", "Prodotti Top");
define("_MI_OLEDRION_BNAME3", "Categorie");
define("_MI_OLEDRION_BNAME4", "Prodotti pi&ugrave; venduti");
define("_MI_OLEDRION_BNAME5", "Prodotti pi&ugrave; votati");
define("_MI_OLEDRION_BNAME6", "Prodotti casuali");
define("_MI_OLEDRION_BNAME7", "Prodotti in promozione");
define("_MI_OLEDRION_BNAME8", "Carrello");
define("_MI_OLEDRION_BNAME9", "Prodotti raccomandati");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1", "Carrello");
define("_MI_OLEDRION_SMNAME2", "Indice");
define("_MI_OLEDRION_SMNAME3", "Categorie");
define("_MI_OLEDRION_SMNAME4", "Mappa Categorie");
define("_MI_OLEDRION_SMNAME5", "Chi &egrave; chi");
define("_MI_OLEDRION_SMNAME6", "Tutti i prodotti");
define("_MI_OLEDRION_SMNAME7", "Cerca");
define("_MI_OLEDRION_SMNAME8", "Condizioni generali di vendita");
define("_MI_OLEDRION_SMNAME9", "Prodotti raccomandati");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0", "Venditori");
define("_MI_OLEDRION_ADMENU1", "IVA");
define("_MI_OLEDRION_ADMENU2", "Categorie");
define("_MI_OLEDRION_ADMENU3", "Produttori");
define("_MI_OLEDRION_ADMENU4", "Prodotti");
define("_MI_OLEDRION_ADMENU5", "Ordini");
define("_MI_OLEDRION_ADMENU6", "Sconti");
define("_MI_OLEDRION_ADMENU7", "Newsletter");
define("_MI_OLEDRION_ADMENU8", "Testi");
define("_MI_OLEDRION_ADMENU9", "Stock in esaurimento");
define("_MI_OLEDRION_ADMENU10", "Dashboard");
define("_MI_OLEDRION_ADMENU11", "File allegati");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', 'Seleziona il numero massimo di nuovi prodotti da visualizzare nella pagina principale');
define('_MI_OLEDRION_PERPAGE', 'Seleziona il numero massimo di prodotti da visualizzare in ogni pagina');

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Globale');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Lista delle notifiche globali.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nuova categoria');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Notificami la creazione di una nuova categoria prodotti.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Richiede una notifica ogni volta che viene creata una nuova categoria di prodotti.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Nuova categoria prodotti');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Nuovo prodotto');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', 'Notificami la pubblicazione di un nuovo prodotto.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', 'Richiede una notifica ogni volta che viene pubblicato una nuovo prodotto.');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Nuovo prodotto');

define('_MI_OLEDRION_PAYPAL_EMAIL', "Indirizzo email Paypal");
define('_MI_OLEDRION_PAYPAL_EMAILDSC', "Indirizzo da utilizzare per le notifiche degli ordini e pagamenti PayPal.<br /><u><b>Se questo campo non viene inserito, il pagamento online sar&agrave; disattivato..</u></b>");
define('_MI_OLEDRION_PAYPAL_TEST', "Utilizza la sandbox PayPal?");
define("_MI_OLEDRION_FORM_OPTIONS", "Opzioni form");
define("_MI_OLEDRION_FORM_OPTIONS_DESC", "Seleziona l'editor da utilizzare. Se hai un'installazione base (es. solo xoops con l'editor standard incorporato), sono disponibili solo DHTML e Compatta");

define("_MI_OLEDRION_FORM_COMPACT", "Compatta");
define("_MI_OLEDRION_FORM_DHTML", "DHTML");
define("_MI_OLEDRION_FORM_SPAW", "Editor Spaw");
define("_MI_OLEDRION_FORM_HTMLAREA", "Editor HtmlArea");
define("_MI_OLEDRION_FORM_FCK", "Editor FCK");
define("_MI_OLEDRION_FORM_KOIVI", "Editor Koivi");
define("_MI_OLEDRION_FORM_TINYEDITOR", "TinyEditor");

define("_MI_OLEDRION_INFOTIPS", "Lunghezza delle tooltip");
define("_MI_OLEDRION_INFOTIPS_DES", "Se attivi questa opzione, i link al prodotto conterranno i primi (n) caratteri del titolo prodotto. Se impostato a 0 allora la tooltip sar&agrave; vuota");
define('_MI_OLEDRION_UPLOADFILESIZE', 'Dimensione massima Upload (in KB) 1048576 KB = 1 Mega');

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'Prodotti dello stesso produttore');

define('_MI_OLEDRION_PREVNEX_LINK', 'Mostra pulsanti Prossimo e Precedente?');
define('_MI_OLEDRION_PREVNEX_LINK_DESC', 'Quanto impostato su \'S&igrave;\', due nuovi link saranno visibili in fondo a ogni scheda prodotto. Questi link sono usati per muoversi tra i prodotti in base alla loro data di pubblicazione');

define('_MI_OLEDRION_SUMMARY1_SHOW', 'Mostra prodotti recenti in tutte le categorie?');
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC', 'Quando utilizzi questa opzione, verr&agrave; mostrato un sommario contenente link a tutti i prodotti recentemente pubblicati in fondo a ogni scheda prodotto');

define('_MI_OLEDRION_SUMMARY2_SHOW', 'Mostra prodotti recenti nella categoria corrente?');
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC', 'Quando utilizzi questa opzione, verr&agrave; mostrato un sommario contenente link a tutti i prodotti recentemente pubblicati in questa categoria in fondo a ogni scheda prodotto');

define('_MI_OLEDRION_OPT23', "[METAGEN] - Numero massimo di parole chiave da generare");
define('_MI_OLEDRION_OPT23_DSC', "Seleziona il numero massimo di parole chiave da generare automaticamente.");

define('_MI_OLEDRION_OPT24', "[METAGEN] - Ordine parole chiave");
define('_MI_OLEDRION_OPT241', "Creare nell'ordine con cui appaiono nel testo");
define('_MI_OLEDRION_OPT242', "Ordine della frequenza della parola");
define('_MI_OLEDRION_OPT243', "Ordine inverso della frequenza della parola");

define('_MI_OLEDRION_OPT25', "[METAGEN] - Blacklist");
define('_MI_OLEDRION_OPT25_DSC', "Inserisci le parole (separate da virgola) da rimuovere dalle parole chiave");
define('_MI_OLEDRION_RATE', 'Abilita il voto degli utenti?');

define("_MI_OLEDRION_ADVERTISEMENT", "Pubblicit&agrave;");
define("_MI_OLEDRION_ADV_DESCR", "Inserisci un testo o un codice JavaScript da mostrare nelle schede prodotto");
define("_MI_OLEDRION_MIMETYPES", "Inserisci i Mime-Types abilitati in upload (separati da una nuova linea)");
define('_MI_OLEDRION_STOCK_EMAIL', "Indirizzo Email da utilizzare quanto la disponibilit&agrave; degli stock scende");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "Non inserire nulla per disabilitare questa funzione.");

define('_MI_OLEDRION_OPT7', "Utilizza feed RSS?");
define('_MI_OLEDRION_OPT7_DSC', "Gli ultimi prodotti saranno disponibili via feed RSS");

define('_MI_OLEDRION_CHUNK1', "Intervallo per Prodotti recenti");
define('_MI_OLEDRION_CHUNK2', "Intervallo per i Prodotti pi&ugrave; venduti");
define('_MI_OLEDRION_CHUNK3', "Intervallo per i Prodotti pi&ugrave; visti");
define('_MI_OLEDRION_CHUNK4', "Intervallo per i Prodotti pi&ugrave; votati");
define('_MI_OLEDRION_ITEMSCNT', "Numero oggetti da visualizzare in amministrazione");
define('_MI_OLEDRION_PDF_CATALOG', "Permetti l'uso del catalogo PDF?");
define('_MI_OLEDRION_URL_REWR', "Utilizza Url Rewriting ?");

define('_MI_OLEDRION_MONEY_F', "Valuta");
define('_MI_OLEDRION_MONEY_S', "Simbolo valuta");
define('_MI_OLEDRION_MONEY_P', "Inserisci codice valuta Paypal");
define('_MI_OLEDRION_NO_MORE', "Mostra prodotti anche se non disponibili in stock?");
define('_MI_OLEDRION_MSG_NOMORE', "Testo da mostrare quando la disponibilit&agrave; prodotto &egrave; esaurita");
define('_MI_OLEDRION_GRP_SOLD', "Gruppo a cui inviare una mail quando un prodotto viene venduto?");
define('_MI_OLEDRION_GRP_QTY', "Gruppo autorizzato a modificare le quantit&agrave; disponibili dalla pagina Prodotto");
define('_MI_OLEDRION_BEST_TOGETHER', "Mostra 'Meglio insieme a ' ?");
define('_MI_OLEDRION_UNPUBLISHED', "Mostra data pubblicazione quando futura rispetto alla data odierna?");
define('_MI_OLEDRION_DECIMAL', "Separatore decimale per la valuta");
define('_MI_OLEDRION_PDT', "Paypal - Trasferimento token con dati pagamento (opzionale)");
define('_MI_OLEDRION_CONF04', "Separatore migliaia");
define('_MI_OLEDRION_CONF05', "Separatore decimale");
define('_MI_OLEDRION_CONF00', "Posiziona valuta?");
define('_MI_OLEDRION_CONF00_DSC', "S&igrave = destra, No = sinistra");
define('_MI_OLEDRION_MANUAL_META', "Inserisci i meta data manualmente?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "Vuoi abilitare i pagamenti offline?");
define('_MI_OLEDRION_OFF_PAY_DSC', "Se abilitato, &egrave; necessario inserire i dati nel campo 'Testi'");

define('_MI_OLEDRION_USE_PRICE', "Vuoi utilizzare il campo Prezzo?");
define('_MI_OLEDRION_USE_PRICE_DSC', "Con questa opzione &egrave; possibile disabilitare la visualizzazione del prezzo (per fare ad esempio un catalogo semplice)");

define('_MI_OLEDRION_PERSISTENT_CART', "Vuoi utilizzare il carrello persistente?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "Se attivato, il carrello utente verr&agrave; salvato (ATTENZIONE, questa opzione consuma risorse)");

define('_MI_OLEDRION_RESTRICT_ORDERS', "Permetti ordini solo agli utenti registrati?");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "Se attivato, solo gli utenti registrati potranno inviare ordini");

define('_MI_OLEDRION_RESIZE_MAIN', "Vuoi effettuare il ridimensionamento automatico delle immagini di ogni prodotto?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', '');

define('_MI_OLEDRION_CREATE_THUMBS', "Vuoi creare automaticamente le miniature del prodotto?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "Se non attivato, sar&agrave; necessario caricare manualmente tutte le miniature prodotto");

define('_MI_OLEDRION_IMAGES_WIDTH', "Larghezza immagini");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Altezza immagini");

define('_MI_OLEDRION_THUMBS_WIDTH', "Larghezza miniature");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Altezza miniature");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "Vuoi ridimensionare anche le immagini delle categorie e dei produttori alle dimensioni inserite sopra?");
?>