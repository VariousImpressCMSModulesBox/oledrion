************* Version 2.31 ************* - Changelog.txt was renamed to
changelog.php - Code refactoring - The block used to show categories can
now show all categories unfolded (useful if you need to create a
scrolling menu) - You have 2 new options to select the columns count on
the module's index page and on the category page - The page used to show
the list of recommended products was added to the Xoops menu - In the
orders manager, you can now see the total of your orders - Addition of
wish lists. There are some new pages and blocks - The module does not
use anymore extJs (the module is lighter of 6 Mb), so the "all products"
page was changed - The module does not use anymore swfobject, instead it
uses a jQuery plugin - Corrections in the module's administration, in
the part used to manage files attached to products - Correction of a bug
in the PayPal's Gateway - You can set a message to display on the
checkout form - Some changes in the gateways structures - Correction of
a bug in the module's administration, in the products filters - Bug
correction in the CSV export - Addition of a new option to enable
clients to enter their VAT number - Addition of a new block : Recently
Sold This block shows the products that were recently sold - Addition of
a new parameter in config.php, OLEDRION_CART_BUG, set this to true if
you can't see products when you add them to the cart - Correction of
several bugs in the cart, be sure to update your templates
(Herv�/sailjapan) - The product's page now uses a lightview effect to
show the product's picture - You have a new tab, "blocks", to see the
module's blocks - The module will automatically update the monetary
fields in its tables to decimal(10,2) to accept billions - You have a
news preferences called "Maximum products count to display before to
replace the list with an adapted list". When the module reach a certain
count of products, they are too much to be seen in the module's list so
the module replace this standard lists with a new kind of list (and
search). - The module now uses jQuery intensively - Several bugs
corrections when a product is removed - Addition of products attributes
Addition of 3 new templates (for attributes) : -
oledrion_attribute_select.html - oledrion_attribute_checkbox.html -
oledrion_attribute_radio.html - YOU MUST UPDATE THE MODULE IN THE XOOPS
MODULES MANAGER - YOU MUST GO AT LEAST ONE TIME IN THE MODULE'S
ADMINISTRATION (to create some new tables in the database) For this
moment, persistent cart does not save products attributes - You can now
use and create plugins for the module (see the "plugins" folder for
examples) As an example, the notifications on a new product and new
category are made with plugins - Notes for the translators: - There is a
new file (in your language folder) called messages.js to translate, take
care, this file is a Javascript file - There's also a picture to
"translate", in your language folder, addtocart.png (this picture is
used when products have attributes) and addtowishlist.png *************
Version 2.2 ************* - Code refactoring - Bugs corrections in the
checkout page - New option in config.php :
OLEDRION_DONT_RESIZE_IF_SMALLER, when this option is on "true", if
pictures are smaller than defined dimensions, then they are not resized
- Addition of a new option in config.php =>
OLEDRION_AUTO_FILL_MANUAL_DATE When this option is set to true, the
module will automatically fill the manual date when you create a new
product - Bugs correction in the advanced search and addition of a pager
- Better support of Xoops 2.3 - Change in the gateways class and
structure - In the module's administration, manufacturer's name are now
clickable - In the module's administration, the count of products is now
visible - When you add a product, in the module's administration, the
module shows you an example for the "Path of the file to download" field
- Correction of several bugs with the Paypal gateway and orders records
on some hosts (burning/herve) - Bug correction in the shelf class
(Bezoops/Herv�) - There were 2 minor changes in the translations, see
lang.diff ************* Version 2.1 ************* - You can now use the
Xoops TAG module - In the file config.php, you can select where to place
the "duplicated" word (at the beginning or at the end of the product's
title and in the reductions) - In config.php, addition of an option to
select the visible tabs in the module's administration (see config.php
for some explanations) - There was a problem in the CSS class used to
represent the breadcrumb in the categories page - The products
duplication had several problems : a) The attached files were not save
b) The product's picture and thumb was identical to the original product
so in case of deletion (the original product), the pictures of the clone
product were also removed (de facto) - Addition of a new parameter in
config.php, "OLEDRION_RELATED_BOTH" When this option is set to false, if
Product A has Product B as a related product but Product A is not noted
as related to Product B then the display of product A will display
Product B as a related product. But Product B will not show Product A as
a related product. When this option is set to true, Product A and
Product B display each other as two related products even if Product A
was not set as a related product to Product A. By default this option is
set to false to respect the initial module's behavior. - When sending
template mails, the module is now verifying that the language folder for
your translation exists (if you are not English). If the translation
folder does not exist then it will use the English folder. - The cache
Lite class was updated - New translations (see lang.diff) *************
Version 2.0 ************* - It was not possible to see a product if you
did not defined a VAT - philou - When you duplicate a product you are
now redirected to the product - philou - It was not possible to see the
list of all products when you was not using the price field - philou -
Bug correction in the categories list (categories were duplicated) -
philou - There was a bug, still in the categories list, when you was not
using the price field - philou - Correction on the product's page
(product.php) and in the page used to rate a product (rate-product.php),
it was not possible to vote for products - blueteen - There were many
changes in the translations (see lang.diff) There is a new file to
translate here :
/xoops/modules/admin/gateways/paypal/language/mylanguage/main.php - Bug
correction in the reductions when prices was not used - philou - Bug
correction in the cart when a product was removed but still present in a
user's cart - philou - Some templates were modified so you need to
update them - Addition of a new table in the database to manage gateways
options - Addition of a new field (cmd_comment) in the
"oledrion_commands" table - In the module's administration, and in the
part used to manage the products, the products list was changed, you can
now filter products - The templates used to send emails were changed
(command_shop.tpl, command_shop_verified.tpl, command_shop_fraud.tpl,
command_shop_pending.tpl, command_shop_failed.tpl,
command_shop_cancel.tpl) I have added {COMMENT} - The file config.php
was changed - The module was deeply modified to be able to use other
payment gateways (that's why the module's version was changed to a major
one) - YOU MUST UPDATE THE MODULE IN THE XOOPS MODULES MANAGER - YOU
MUST GO AT LEAST ONE TIME IN THE MODULE'S ADMINISTRATION (to create a
new table in the database) - YOU MUST REVALIDATE AT LEAST ONE TIME THE
MODULE'S PREFENCES - YOU MUST GO IN THE MODULE'S ADMINISTRATION AND IN
THE "GATEWAY" TAB, SELECT PAYPAL AND SET ITS PREFERENCES *************
Version 1.65 ************* - The module's administration will verify
that the cache folder is writable - Some bugs were corrected in the page
called category.php - Bug correction in the shopping cart - The module
is capable of using the editors of Xoops 2.3 more easily - In the
module's search, there was a problem with the categories selector - The
support for the Spaw editor is abandoned - The support of Xoops 2.2.x is
abandoned - You can use tinymce if you are running Xoops 2.3 (but there
are some bugs in Xoops) - TCPDF was updated - No changes in the
translations (except some typo corrections in the english translation) -
Some changes in the templates ************* Version 1.64 ************* -
Correction of a bug in the csv export - TCPDF was updated - Correction
of a bug in the products prices in the PDF catalog - Addition of a pager
in the module's index page - Correction of a bug in the discount system,
there was a problem when you was creating a discount with a starting and
ending date - Correction of a bug in the cart's template (for the link
used to remove a product from the cart) - New module option to select if
you want to multiply the produt's shipping amount by the product's
quantity. New translation in modinfo.php :
_MI_OLEDRION_SHIPPING_QUANTITY ************* Version 1.63 *************
- Bug correction in the PDF catalog - Bug correction in the shipping's
calculation (quantites was not used for shipping calculation) - Bug
correction in the cart/order tables (as a consequence, there was some
bugs in the invoice and dashboard) - Bugs corrections in the emails sent
to the website and to the client after his/her order - You have a plugin
for RssFit & Sitemap ************* Version 1.62 ************* -
Correction of a bug in download.php (thank you Trabis) - TCPDF was
updated - Correction of a bug when the product's quantity as changed in
the cart (thank you Trabis) ************* Version 1.61 ************* -
Rajout d'une option permettant de d�sactiver la zone prix (des produits)
- Dans la fiche d'un produit, la liste des produits r�cents ne contient
plus le produit en cours - Ajout d'une zone cat_footer dans les
cat�gories (pour pouvoir mettre un pied de page par cat�gorie) -
Eclatement de l'administration en plusieurs fichiers - M�nage dans
/admin/functions.php - Ajout de cache aux flux RSS - Beaucoup de
refactorisation du code (conventions d'�criture) - Ajout de ExtJs pour
la page qui liste tous les produits - Mise � jour de TCPDF -
Modification de la page des cat�gories afin de pouvoir y afficher les
cat�gories m�res ou les cat�gories filles (selon le cas) sur param�trage
(cf config.php) - Introduction d'une nouvelle classe, une fa�ade, pour
traiter les produits (oledrion_shelf.php) - Mise � jour de Cache Lite -
Ajout de l'�cotaxe et du d�lai de livraison - Ajout de la persistance du
panier - Ajout d'une option permettant de restreindre l'achat aux
utilisateurs enregistr�s - Passage � la librairie "wideimage" pour la
gestion des images (notamment le redimensionnement) - Ajout d'une option
permettant de redimensionner les images des produits et de cr�er
automatiquement les vignettes - Ajout d'une option permettant de
redimensionner les images des cat�gories et des fabricants (aux
dimensions d�finies pour les produits) - Ajout d'options aux blocs pour
qu'on puisse ne choisir comme p�riode que le mois en cours - Ajout d'une
nouvelle classe pour passer les param�tres � la fa�ade - Changement de
tous les ent�tes Php afin d'�tre plus explicite sur la licence (� cause
des voleurs de chez impress) ************ Version 1.6 ************ -
Refactorisation du code pour utiliser la classe oledrion_utils au lieu
des fonctions contenues dans include/functions.php - Mise � jour de
TCPDF - Remplacement des tous les book et livre par product et produit -
Mise � jour du PersistableObjectHandler - Renommage des classes Lite et
Pear avec le pr�fixe du module - Correction d'un bug dans la notation
(on pouvait donner la note qu'on voulait � un produit !) - Possibilit�
de supprimer un produit depuis la fiche produit (c�t� utilisateur) -
Refactorisation du code pour la suppression des produits - Rajout de
config.php pour pouvoir choisir l'emplacement des images, des fichiers
attach�s, du pays par d�faut et autres - Dans les pr�f�rences du module
(pour le s�parateur des milliers), il est maintenant possible d'utiliser
[space] pour "repr�senter" un espace (�tant donn� que Xoops supprime les
espaces dans les options de modules) - Possibilit� de choisir o� les
fichiers sont t�l�charg�s - Rajout d'une option afin de pouvoir d�cider
si on peut proposer � l'utilisateur de ne pas payer en ligne - L'adresse
email Paypal sert aussi d'indicateur pour activer ou d�sactiver le
paiement en ligne - Toutes les pages contiennent breadcrumb et publicit�
globale (ou de la cat�gorie) ************ Version 1.4 ************
6/12/2007 - Correction d'un bug lors de l'envoi du mail au client, le
lien vers la facture n'�tait pas affich� - Page d'accueil du module, il
n'�tait pas possible d'afficher 0 produits - Il manquait un espace dans
la liste des revendeurs - M�me lorsque l'option "afficher les liens vers
les produits pr�c�dents et suivants" �tait d�coch�e, le titre du bloc
�tait quand m�me visible - La description courte et compl�te ne
s'affichent plus si elles ne contiennent rien (le titre des blocs)

************ Version 1.3 ************ 15/11/2007 & 17/11/2007 - Ajout
d'une gestion de cache avec Cache_Lite (de Pear) - Possibilit� de
supprimer images et fichiers attach�s dans les cat�gories, fabricants et
produits - Modification de toutes les classes pour fonctionner avec Php5
- Modification de l'ORM - Rajout bloc de visualisation du caddy -
Correction d'un probl�me de formatage des montants dans la partie
r�ductions (dans l'administratin) - Le type mime dans le script
permettant de t�l�charger un fichier est enfin correctement d�tect�
(avec finfo) et l'affichage des fichiers envoy�s est correct

************ Version 1.2 ************ 03/08/2007 - Correction d'un bug
dans l'administration du module, il �tait possible d'uploader n'importe
quel type de fichier - Dans l'administration, les noms des produits sont
maintenant cliquables - Mise � jour de tcpdf ************ Version 1.1
************ 26/07/2007 - Ajout de nouvelles pr�f�rences afin de mieux
g�rer la monnaie (sa position par exemple) - Modification de tout le
module pour tenir compte de la gestion de la monnaie - Ajout de la
classe oledrion_currency.php
