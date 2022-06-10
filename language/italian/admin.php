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

define("_AM_OLEDRION_GO_TO_MODULE","Vai al modulo");
define("_AM_OLEDRION_PREFERENCES","Impostazioni");
define("_AM_OLEDRION_ADMINISTRATION","Amministrazione");
define("_AM_OLEDRION_CATEGORIES","Categorie");
define("_AM_OLEDRION_CATEG_CONFIG","Configurazione blocchi sulla pagina categorie");
define("_AM_OLEDRION_CHUNK","Blocchi");
define("_AM_OLEDRION_POSITION","Posizione & Visibilit&agrave;");
define("_AM_OLEDRION_INVISIBLE","Invisibile");
define("_AM_OLEDRION_OK","Ok");
define("_AM_OLEDRION_SAVE_OK","Dati salvati correttamente");
define("_AM_OLEDRION_SAVE_PB","Si &egrave; verificato un problema durante il salvataggio dati");
define("_AM_OLEDRION_ACTION","Azione");
define("_AM_OLEDRION_ADD_ITEM","Aggiungi un articolo");
define("_AM_OLEDRION_CONF_DELITEM","Vuoi veramente eliminare questo articolo?");
define("_AM_OLEDRION_LIST","Lista");
define("_AM_OLEDRION_ID","Id");
define("_AM_OLEDRION_RATE","Voto");
define("_AM_OLEDRION_MAINTAIN", "Manutenzione tabelle e cache");

define("_AM_OLEDRION_ADD_VAT","Aggiungi aliquota IVA");
define("_AM_OLEDRION_EDIT_VAT","Modifica aliquota IVA");

define("_AM_OLEDRION_ADD_CATEG","Aggiungi una categoria");
define("_AM_OLEDRION_EDIT_CATEG","Modifica categoria");

define("_AM_OLEDRION_ADD_VENDOR","Aggiungi venditore");
define("_AM_OLEDRION_EDIT_VENDOR","Modifica venditore");

define("_AM_OLEDRION_ADD_FILE","Aggiungi file");
define("_AM_OLEDRION_EDIT_FILE","Modifica file");

define("_AM_OLEDRION_ADD_MANUFACTURER","Aggiungi un produttore");
define("_AM_OLEDRION_EDIT_MANUFACTURER","Modifica produttore");

define("_AM_OLEDRION_ADD_PRODUCT","Aggiungi prodotto");
define("_AM_OLEDRION_EDIT_PRODUCT","Modifica prodotto");

define("_AM_OLEDRION_ADD_DSICOUNT","Aggiungi sconto");
define("_AM_OLEDRION_EDIT_DISCOUNT","Modifica sconto");

define("_AM_OLEDRION_ERROR_1","Errore, nessun ID specificato");
define("_AM_OLEDRION_ERROR_2","Errore, impossibile eliminare questa aliquota, &egrave; utilizzata da qualche articolo");
define("_AM_OLEDRION_ERROR_3","Errore durante l'upload ");
define("_AM_OLEDRION_ERROR_4","Errore, impossibile eliminare questa categoria, &egrave; utilizzato da alcuni prodotti");
define("_AM_OLEDRION_ERROR_5","Errore, impossibile questo produttore, &egrave; utilizzato da alcuni prodotti");
define("_AM_OLEDRION_ERROR_6","Errore, impossibile eliminare questo venditore, &egrave; utilizzato da alcuni prodotti");
define("_AM_OLEDRION_ERROR_7","Errore, impossibile creare il file di esportazione");
define("_AM_OLEDRION_ERROR_8","Errore, creare almeno una categoria prima di creare un prodotto");
define("_AM_OLEDRION_ERROR_9","Errore, creare almeno una aliquota IVA prima di creare un prodotto");
define("_AM_OLEDRION_ERROR_10","Errore, categoria sconosciuta");
define("_AM_OLEDRION_ERROR_11","Errore, formato di esportazione sconosciuto");
define("_AM_OLEDRION_NOT_FOUND", "Errore, articolo non trovato");
define("_AM_OLEDRION_CONF_DEL_CATEG", "Vuoi veramente eliminare questa categoria e tutte le sue sottocategorie?<br />%s");

define("_AM_OLEDRION_MODIFY", "Modifica");
define("_AM_OLEDRION_ADD", "Aggiungi");

define("_AM_OLEDRION_PARENT_CATEG", "Categoria padre");
define("_AM_OLEDRION_CURRENT_PICTURE", "Immagine corrente");
define("_AM_OLEDRION_CURRENT_FILE", "File corrente");
define("_AM_OLEDRION_PICTURE", "Immagine");
define("_AM_OLEDRION_DESCRIPTION", "Descrizione");

define("_AM_OLEDRION_ALL", "Tutto");
define("_AM_OLEDRION_LIMIT_TO", "Filtro");
define("_AM_OLEDRION_FILTER", "Filtro");
define("_AM_OLEDRION_INDEX_PAGE", "Indice");
define("_AM_OLEDRION_RELATED_HELP", "Attenzione, non entrare finch&egrave; non sono stati inseriti tutti i prodotti");
define("_AM_OLEDRION_SUBDATE_HELP", "Inserire la data nel formato AAAA-MM-GG");
define("_AM_OLEDRION_IMAGE1_HELP", "Immagine grande corrente");
define("_AM_OLEDRION_IMAGE2_HELP", "Miniatura corrente");
define("_AM_OLEDRION_IMAGE1_CHANGE", "Modifica immagine prodotto");
define("_AM_OLEDRION_IMAGE2_CHANGE", "Modifica miniatura prodotto");
define("_AM_OLEDRION_ATTACHED_HLP", "");
define("_AM_OLEDRION_CATEG_HLP", "Categoria prodotto");
define("_AM_OLEDRION_CATEG_TITLE", "Nome Categoria");
define("_AM_OLEDRION_URL_HLP", "URL prodotto (opzionale)");
define("_AM_OLEDRION_SELECT_HLP", "Utilizza il tasto Control (o il tasto Mela su Mac) per selezionare più di un articolo");
define("_AM_OLEDRION_STOCK_HLP", "Invia una email ad un gruppo quando uno stock &egrave; sceso sotto...");
define("_AM_OLEDRION_DISCOUNT_HLP", "Prezzo promozionale (temporaneo) senza IVA");
define("_AM_OLEDRION_DISCOUNT_DESCR", "Descrizione sconto (per il tuo cliente)");
define("_AM_OLEDRION_DATE", "Data");
define("_AM_OLEDRION_CLIENT", "Cliente");
define("_AM_OLEDRION_TOTAL_SHIPP", "Totale / Consegna");
define('_AM_OLEDRION_NEWSLETTER_BETWEEN', 'Seleziona prodotti pubblicati tra il ');
define('_AM_OLEDRION_EXPORT_AND', ' e il ');
define('_AM_OLEDRION_IN_CATEGORY', 'nelle seguenti categorie');
define('_AM_OLEDRION_REMOVE_BR',"Converti il tag &lt;br&gt; in nuova linea?");
define('_AM_OLEDRION_NEWSLETTER_HTML_TAGS', "Rimuovi tag HTML?");
define('_AM_OLEDRION_NEWSLETTER_HEADER', "Intestazione");
define('_AM_OLEDRION_NEWSLETTER_FOOTER', "Pi&eacute; di pagina");
define('_AM_OLEDRION_CSV_EXPORT', "Esporta ordini nel seguente formato ");
define('_AM_OLEDRION_EXPORT_READY', "Il tuo file di esportazione &egrave; pronto per il download, cliccare qui per scaricarlo");
define('_AM_OLEDRION_CSV_READY', "Il tuo file CSV &egrave; pronto per il download, cliccare qui per scaricarlo");
define('_AM_OLEDRION_NEW_QUANTITY', "Nuova quantit&agrave;");
define('_AM_OLEDRION_UPDATE_QUANTITIES', "Aggiorna quantit&agrave;");
define('_AM_OLEDRION_NEWSLETTER_READY', "La tua newsletter &egrave; pronta, cliccare qui per scaricarlo");
define('_AM_OLEDRION_DUPLICATED', "Duplicato");

// Added on 14/04/2007 17:11
define('_AM_OLEDRION_SORRY_NOREMOVE', "Spiacente, non &egrave; possibile rimuovere questo articolo in quanto presente in almeno un ordine");
define('_AM_OLEDRION_CONF_VALIDATE', "Vuoi veramente convalidare quest'ordine?");
define('_AM_OLEDRION_LAST_ORDERS', "Ultimi ordini");
define('_AM_OLEDRION_LAST_VOTES', "Ultimi voti");
define('_AM_OLEDRION_NOTE', "Note");

define('_AM_OLEDRION_RECOMMEND_IT', "Raccomandalo");
define('_AM_OLEDRION_DONOTRECOMMEND_IT', "Smetti di raccomandarlo");
define('_AM_OLEDRION_RECOMMENDED', "Raccomandato");
define('_AM_OLEDRION_RECOMM_TEXT', "Testo da mostrare sulle pagine dei <br />prodotti raccomandati");
define('_AM_OLEDRION_META_KEYWORDS', "Meta keywords");
define('_AM_OLEDRION_META_DESCRIPTION', "Meta description");
define('_AM_OLEDRION_META_PAGETITLE', "Titolo pagina");

// Added in March & April 2008
define('_AM_OLEDRION_FILENAME', "File");
define('_AM_OLEDRION_VISIBLE_FILENAME', "Filename visibile all'utente");
define('_AM_OLEDRION_OFFLINEPAY_TEXT', "Testo da mostrare quando l'utente sceglie di pagare offline?");
define('_AM_OLEDRION_FOOTER', "Testo da mostrare nel pi&eacute; di pagina delle categorie");

define('_AM_OLEDRION_RESTRICT_TEXT', "Testo da mostrare quando solo gli utenti registrati possono effettuare ordini");

// Pour les réductions
define("_AM_OLEDRION_DISCOUNT_INFORMATION", "Informazioni sconto");
define("_AM_OLEDRION_DISCOUNT_TITLE", "Titolo sconto (uso interno)");
define("_AM_OLEDRION_DISCOUNT_DESCRIPTION", "Descrizione sconto (per i clienti)");
define("_AM_OLEDRION_DISCOUNT_PERIOD", "Per il periodo");
define("_AM_OLEDRION_DISCOUNT_PERFROM", "Da");
define("_AM_OLEDRION_DISCOUNT_PERTO", "a");
define("_AM_OLEDRION_DISCOUNT_WHOWHAT", "A chi o cosa si applica la riduzione?");
define("_AM_OLEDRION_DISCOUNT_XOOPS_GROUP", "Al gruppo");
define("_AM_OLEDRION_DISCOUNT_CATEGORY", "Alla categoria");
define("_AM_OLEDRION_DISCOUNT_MANUFACTURER", "Produttore");
define("_AM_OLEDRION_DISCOUNT_VENDOR", "Venditore");
define("_AM_OLEDRION_DISCOUNT_PRODUCT", "Prodotto");
define("_AM_OLEDRION_DISCOUNT_REDUCTION_PRICE", "Riduzione sul prezzo del prodotto o sul totale ordine");
define("_AM_OLEDRION_DISCOUNT_REDUCTION_TYPE", "Applica riduzione");
define("_AM_OLEDRION_DISCOUNT_QUANTITY_FROM", "Da");
define("_AM_OLEDRION_DISCOUNT_QUANTITY_TO", "a");
define("_AM_OLEDRION_DISCOUNT_QUANTITY_INCLUDED", "prodotti (inclusi)");
define("_AM_OLEDRION_DISCOUNT_DEGRESSIV", "Decrescente");
define("_AM_OLEDRION_DISCOUNT_AMOUNT_PERCENT", "Importo o percentuale di sconto sul prezzo");
define("_AM_OLEDRION_DISCOUNT_PERCENT", "Per cento");
define("_AM_OLEDRION_DISCOUNT_ON", "Su");
define("_AM_OLEDRION_DISCOUNT_THE_PRODUCT", "il prodotto");
define("_AM_OLEDRION_DISCOUNT_THE_CART", "Il carrello");
define("_AM_OLEDRION_DISCOUNT_IN_WHICH_CASE", "In quale caso?");
define("_AM_OLEDRION_DISCOUNT_ALL_CASES", "In ogni caso");
define("_AM_OLEDRION_DISCOUNT_FIRST_PURCHASE", "Se &egrave; acquisto di questo utente sul sito");
define("_AM_OLEDRION_DISCOUNT_NEVER_BOUGHT", "Se il prodotto non &egrave; mai stato acquistato");
define("_AM_OLEDRION_DISCOUNT_QUANTITY_IS", "Se la quantit&agrave; del prodotto &egrave;");
define("_AM_OLEDRION_DISCOUNT_SHIPPING_REDUCTIONS", "Sconti sulle spese di spedizione");
define("_AM_OLEDRION_DISCOUNT_SHIPPINGS_ARE", "Le spese di spedizione sono");
define("_AM_OLEDRION_DISCOUNT_FULL_PAY", "Totalmente da pagare");
define("_AM_OLEDRION_DISCOUNT_SHIPPING_FREE", "Totalmente gratuite");
define("_AM_OLEDRION_DISCOUNT_ORDER_OVER", "se l'ordine &egrave; superiore a ");
define("_AM_OLEDRION_DISCOUNT_REDUCED_FOR", "le spese di spedizione sono ridotte di ");
define("_AM_OLEDRION_DISCOUNT_REDUCED_IF", "se l'ordine &egrave; superiore a ");

define("_AM_OLEDRION_DISCOUNT_HELP1", "Non &egrave; necessario specificare una categoria e/o un venditore se &egrave; stato selezionato un articolo");
define("_AM_OLEDRION_DISCOUNT_HELP2", "Se specifichi un gruppo Xoops, la riduzione verr&agrave; applicata solo ad esso.");
define("_AM_OLEDRION_DISCOUNT_HELP3", "Se specifichi una categoria, la riduzione verr&agrave; applicata solo ai suoi articoli.");
define("_AM_OLEDRION_DISCOUNT_HELP4", "Se specifichi un venditore, la riduzione verr&agrave; applicata solo ai suoi articoli.");
define("_AM_OLEDRION_DISCOUNT_HELP5", "Se specifichi un venditore e una categoria, la riduzione verr&agrave; applicata solo ai suoi articoli appartenenti alla categoria inserita.");
define("_AM_OLEDRION_DISCOUNT_HELP6", "Se specifichi un prodotto, la riduzione verr&agrave; applicata solo ad esso.");
?>