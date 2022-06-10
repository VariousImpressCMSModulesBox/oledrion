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
 * @copyright       Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         oledrion
 * @author 			Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * Version : $Id:
 * ****************************************************************************
 */

// The name of this module
define("_MI_OLEDRION_NAME","Ma Boutique");

// A brief description of this module
define("_MI_OLEDRION_DESC","Cr�ation d'une boutique en ligne pour vendre des produits.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_OLEDRION_BNAME1","Produits r�cents");
define("_MI_OLEDRION_BNAME2","Produits les plus vus");
define("_MI_OLEDRION_BNAME3","Cat�gories");
define("_MI_OLEDRION_BNAME4","Meilleures ventes");
define("_MI_OLEDRION_BNAME5","Produits les mieux not�s");
define("_MI_OLEDRION_BNAME6","Produit au hasard");
define("_MI_OLEDRION_BNAME7","Produits en promotion");
define("_MI_OLEDRION_BNAME8","Caddy");
define("_MI_OLEDRION_BNAME9","Produits recommand�s");
define("_MI_OLEDRION_BNAME10","Produits vendus r�cemment");
define("_MI_OLEDRION_BNAME11","Derni�res listes");
define("_MI_OLEDRION_BNAME12","Mes listes");
define("_MI_OLEDRION_BNAME13","Listes de la cat�gorie courante");
define("_MI_OLEDRION_BNAME14","Listes al�atoires");
define("_MI_OLEDRION_BNAME15","Listes les plus vues");

// Sub menu titles
define("_MI_OLEDRION_SMNAME1", "Panier");
define("_MI_OLEDRION_SMNAME2", "Index");
define("_MI_OLEDRION_SMNAME3", "Cat�gories");
define("_MI_OLEDRION_SMNAME4", "Plan des cat�gories");
define("_MI_OLEDRION_SMNAME5", "Annuaire des fabricants");
define("_MI_OLEDRION_SMNAME6", "Tous les produits");
define("_MI_OLEDRION_SMNAME7", "Recherche");
define("_MI_OLEDRION_SMNAME8", "Conditions G�n�rales de Vente");
define("_MI_OLEDRION_SMNAME9", "Produits Recommand�s");
define("_MI_OLEDRION_SMNAME10", "Mes listes");
define("_MI_OLEDRION_SMNAME11", "Toutes les listes");

// Names of admin menu items
define("_MI_OLEDRION_ADMENU0","Vendeurs");
define("_MI_OLEDRION_ADMENU1","TVA");
define("_MI_OLEDRION_ADMENU2","Cat�gories");
define("_MI_OLEDRION_ADMENU3","Fabricants");
define("_MI_OLEDRION_ADMENU4","Produits");
define("_MI_OLEDRION_ADMENU5","Commandes");
define("_MI_OLEDRION_ADMENU6","R�ductions");
define("_MI_OLEDRION_ADMENU7","Newsletter");
define("_MI_OLEDRION_ADMENU8","Textes");
define("_MI_OLEDRION_ADMENU9","Stocks bas");
define("_MI_OLEDRION_ADMENU10", "Tableau de bord");
define("_MI_OLEDRION_ADMENU11", "Fichiers attach�s");
define("_MI_OLEDRION_ADMENU12", "Passerelles de paiement");
define("_MI_OLEDRION_ADMENU13", "Attributs produits");
define("_MI_OLEDRION_ADMENU14", "Blocs");
define("_MI_OLEDRION_ADMENU15", "Listes");

// Title of config items
define('_MI_OLEDRION_NEWLINKS', "Choisissez le nombre maximum de nouveaux produits � afficher sur la page d'accueil");
define('_MI_OLEDRION_PERPAGE', "Choisissez le nombre maximum de produits � afficher sur chaque page");

// Description of each config items
define('_MI_OLEDRION_NEWLINKSDSC', '');
define('_MI_OLEDRION_PERPAGEDSC', '');

// Text for notifications

define('_MI_OLEDRION_GLOBAL_NOTIFY', 'Globale');
define('_MI_OLEDRION_GLOBAL_NOTIFYDSC', 'Options globales de notification.');

define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFY', 'Nouvelle cat�gorie');
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYCAP', "Notifiez-moi lorsqu'une nouvelle cat�gorie est cr��.");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYDSC', "Revecoir une notification lorsqu'une nouvelle cat�gorie est cr��e");
define('_MI_OLEDRION_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification : Nouvelle cat�gorie cr��e');

define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFY', 'Nouveau produit');
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYCAP', "Notifiez-moi quand un nouveau produit est publi�.");
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYDSC', "Recevoir une notification lorsqu'un nouveau produit est publi�.");
define('_MI_OLEDRION_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification : Nouveau produit');

// Ajouts Herv� Thouzard, Instant Zero ********************************************************************************
define("_MI_OLEDRION_FORM_OPTIONS","Option de formulaire");
define('_MI_OLEDRION_FORM_OPTIONS_DESC', "S&eacute;lectionnez l'�diteur � utiliser. Si vous avez une installation 'simple' (i.e vous utilisez seulement l'&eacute;diteur Xoops fourni en standard), alors vous ne pouvez que s&eacute;lectionner DHTML et Compact");

define("_MI_OLEDRION_FORM_COMPACT","Compact");
define("_MI_OLEDRION_FORM_DHTML","DHTML");
define("_MI_OLEDRION_FORM_SPAW","Spaw Editor");
define("_MI_OLEDRION_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_OLEDRION_FORM_FCK","FCK Editor");
define("_MI_OLEDRION_FORM_KOIVI","Koivi Editor");
define("_MI_OLEDRION_FORM_TINYEDITOR","TinyEditor");

define("_MI_OLEDRION_INFOTIPS","Nombre de caract�res pris en compte dans les infobulles");
define("_MI_OLEDRION_INFOTIPS_DES","Si vous utilisez cette option, les liens relatifs � des produits contiendront une infobulle reprennant les premiers (n) caract�res de chaque produit. Si vous param&eacute;trez cette valeur � 0, alors l'infobulle sera vide");

define("_MI_OLEDRION_UPLOADFILESIZE", "Taille maximale des fichiers joints en Ko (1048576 = 1 M�ga)");

define('_MI_PRODUCTSBYTHISMANUFACTURER', 'Produits du m�me fabricant');

define('_MI_OLEDRION_PREVNEX_LINK','Afficher les liens vers les produits pr&eacute;c&eacute;dents et suivants ?');
define("_MI_OLEDRION_PREVNEX_LINK_DESC","Si cette option est activ&eacute;e, deux nouveaux liens seront visibles en bas de chaque article. Ces liens seront utiles pour voir le produit pr&eacute;c&eacute;dent et suivant en fonction de la date de publication");

define('_MI_OLEDRION_SUMMARY1_SHOW',"Afficher une table listant les derniers produits toutes categories confondues ?");
define('_MI_OLEDRION_SUMMARY1_SHOW_DESC',"Quand vous utilisez cette option, une table contenant les liens vers tous les produits r&eacute;cents publi&eacute;s sera visible en bas de chaque produit");

define('_MI_OLEDRION_SUMMARY2_SHOW',"Afficher une table listant les derniers produits  publi�s dans la cat�gorie en cours");
define('_MI_OLEDRION_SUMMARY2_SHOW_DESC',"Quand vous utilisez cette option, une table contenant les liens vers tous les produits r&eacute;cents publi&eacute;s sera visible en bas de chaque produit");

define('_MI_OLEDRION_OPT23',"[METAGEN] - Nombre maximal de meta mots cl�s � g�n�rer");
define('_MI_OLEDRION_OPT23_DSC',"Choisissez le nombre maximum de mots cl�s qui seront g�n�r�s par le module � partir du contenu.");

define('_MI_OLEDRION_OPT24',"[METAGEN] - Ordre des mots cl�s");
define('_MI_OLEDRION_OPT241',"Ordre d'apparition dans le texte");
define('_MI_OLEDRION_OPT242',"Ordre de fr�quence des mots");
define('_MI_OLEDRION_OPT243',"Ordre inverse de la fr�quence des mots");

define('_MI_OLEDRION_OPT25',"[METAGEN] - Blacklist");
define('_MI_OLEDRION_OPT25_DSC',"Entrez des mots (s�par�s par une virgule) qui ne doivent pas faire partie des mots cl�s g�n�r�s.");

define('_MI_OLEDRION_RATE','Permettre aux utilisateurs de noter les produits ?');

define("_MI_OLEDRION_ADVERTISEMENT","Publicit�");
define("_MI_OLEDRION_ADV_DESCR","Entrez un texte ou du code javascript � afficher dans les pages de description des produits");
define("_MI_OLEDRION_MIMETYPES","Entrez les types mime autoris�s pour le t�l�chargement des pi�ces jointes dans les produits (s�parez les par un retour � la ligne)");

define('_MI_OLEDRION_STOCK_EMAIL', "Groupe � qui envoyer un email quand les stocks sont bas");
define('_MI_OLEDRION_STOCK_EMAIL_DSC', "Ne rien rentrer pour ne pas utiliser cette fonctionnalit� d'alerte en cas de stock bas");

define('_MI_OLEDRION_OPT7',"Utiliser les flux RSS ?");
define('_MI_OLEDRION_OPT7_DSC',"Si vous utilisez cette option, les derni&egrave;rs produits seront accessibles via un flux RSS.");

define('_MI_OLEDRION_CHUNK1',"Espace pour les produits les plus r�cents");
define('_MI_OLEDRION_CHUNK2',"Espace pour les produits les plus achet�s");
define('_MI_OLEDRION_CHUNK3',"Espace pour les produits les plus vus");
define('_MI_OLEDRION_CHUNK4',"Espace pour les produits les mieux not�s");
define('_MI_OLEDRION_ITEMSCNT',"Nombre d'�l�ments � afficher dans l'administration");
define('_MI_OLEDRION_PDF_CATALOG',"Autoriser l'utilisation du catalogue en PDF ?");
define('_MI_OLEDRION_URL_REWR',"Voulez vous utiliser l'url rewriting ?");

define('_MI_OLEDRION_MONEY_F',"Libell� long de la monnaie");
define('_MI_OLEDRION_MONEY_S',"Libell� court de la monnaie");
define('_MI_OLEDRION_NO_MORE',"Afficher les produits m�me lorsqu'il n'y a plus de stock ?");
define('_MI_OLEDRION_MSG_NOMORE',"Texte � afficher lorsqu'il n'y a plus d'un produit");
define('_MI_OLEDRION_GRP_SOLD',"Groupe � qui envoyer un email lorsqu'un produit est vendu");
define('_MI_OLEDRION_GRP_QTY',"Groupe autoris� � modifier les quantit�s de produits disponibles depuis la page d'un produit");
define('_MI_OLEDRION_BEST_TOGETHER',"Afficher 'Deux, c'est mieux !' ?");
define('_MI_OLEDRION_UNPUBLISHED',"Afficher les produits dont la date de mise en ligne est sup�rieure � aujourd'hui ?");
define('_MI_OLEDRION_DECIMAL', "Nombre de d�cimales");

define('_MI_OLEDRION_CONF04',"S�parateur des milliers");
define('_MI_OLEDRION_CONF05', "S�parateur des d�cimales");
define('_MI_OLEDRION_CONF00',"Emplacement de la monnaie ?");
define('_MI_OLEDRION_CONF00_DSC', "Oui = � droite, Non = � gauche");
define('_MI_OLEDRION_MANUAL_META', "Entrer les meta donn�es manuellement ?");

define('_MI_OLEDRION_OFFLINE_PAYMENT', "Voulez vous permettre aux utilisateurs de ne pas payer en ligne ?");
define('_MI_OLEDRION_OFF_PAY_DSC', "Si vous activez cette option, vous devez renseigner des zones de texte dans l'administration du module, sur l'onglet 'Texts'");

define('_MI_OLEDRION_USE_PRICE', "Voulez-vous utiliser le champ 'prix' ?");
define('_MI_OLEDRION_USE_PRICE_DSC', "Avec cette option, vous pouvez d�sactiver le prix des produits (pour faire un catalogue par exemple)");

define('_MI_OLEDRION_PERSISTENT_CART', "Voulez-vous utiliser le panier persistant ?");
define('_MI_OLEDRION_PERSISTENT_CART_DSC', "Lorsque cette option est sur Oui, le panier de l'utilisateur est enregistr� (Attention, cette option consomme des ressources)");

define('_MI_OLEDRION_RESTRICT_ORDERS', "Restreindre l'achat aux utilisateurs enregistr�s ?");
define('_MI_OLEDRION_RESTRICT_ORDERS_DSC', "Si vous mettez cette option � Oui, seuls les utilisateurs enregistr�s pourront passer commande des produits");

define('_MI_OLEDRION_RESIZE_MAIN', "Voulez-vous que le module redimensionne automatiquement l'images principale des produits ?");
define('_MI_OLEDRION_RESIZE_MAIN_DSC', '');

define('_MI_OLEDRION_CREATE_THUMBS', "Voulez-vous que le module cr�e automatiquement la vignette de l'image principale des produits ?");
define('_MI_OLEDRION_CREATE_THUMBS_DSC', "Si vous n'utilisez pas cette option vous devrez t�l�charger vous-m�me les vignettes des produits et redimensionner les images");

define('_MI_OLEDRION_IMAGES_WIDTH', "Largeur des images");
define('_MI_OLEDRION_IMAGES_HEIGHT', "Hauteur des images");

define('_MI_OLEDRION_THUMBS_WIDTH', "Largeur des vignettes");
define('_MI_OLEDRION_THUMBS_HEIGHT', "Hauteur des vignettes");

define('_MI_OLEDRION_RESIZE_CATEGORIES', "Voulez-vous aussi redimensionner les images des cat�gories et des fabricants aux dimensions ci-dessus ?");
define('_MI_OLEDRION_SHIPPING_QUANTITY', "Multiplier les frais de port du produit par la quantit� command�e ?");

define('_MI_OLEDRION_USE_TAGS', "Voulez-vous utiliser le syst�me de mots cl�s (tags) ? (Le module Xoops TAG doit �tre install�)");
define('_MI_OLEDRION_TAG_CLOUD', "Nuage de mots cl�s du module");
define('_MI_OLEDRION_TOP_TAGS', "Top mots cl�s du module");

define('_MI_OLEDRION_ASK_VAT_NUMBER', "Voulez-vous demander � vos clients leur num�ro de TVA ?");
define('_MI_OLEDRION_USE_STOCK_ATTRIBUTES', "Voulez-vous g�rer les stock dans les attributs des produits ?");

define('_MI_OLEDRION_COLUMNS_INDEX', "Nombre de colonnes de produits sur la page d'index");
define('_MI_OLEDRION_COLUMNS_CATEGORY', "Nombre de colonnes de produits sur la page cat�gorie");
define('_MI_OLEDRION_ADAPTED_LIST', "Nombre maximum de produits � afficher avant d'utiliser une liste adapt�e");
?>