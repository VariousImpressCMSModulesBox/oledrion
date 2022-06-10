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

define("_AM_OLEDRION_GO_TO_MODULE","Go to the module");
define("_AM_OLEDRION_PREFERENCES","Settings");
define("_AM_OLEDRION_ADMINISTRATION","Administration");
define("_AM_OLEDRION_CATEGORIES","Categories");
define("_AM_OLEDRION_CATEG_CONFIG","Chunks configuration on the categories pages");
define("_AM_OLEDRION_CHUNK","Chunk");
define("_AM_OLEDRION_POSITION","Position & Visibility");
define("_AM_OLEDRION_INVISIBLE","Invisible");
define("_AM_OLEDRION_OK","Ok");
define("_AM_OLEDRION_SAVE_OK","Data was saved successfully");
define("_AM_OLEDRION_SAVE_PB","There was a problem while saving data");
define("_AM_OLEDRION_ACTION","Action");
define("_AM_OLEDRION_ADD_ITEM","Add an item");
define("_AM_OLEDRION_CONF_DELITEM","Do you really want to delete this item ?");
define("_AM_OLEDRION_LIST","List");
define("_AM_OLEDRION_ID","Id");
define("_AM_OLEDRION_RATE","Rate");
define("_AM_OLEDRION_MAINTAIN", "Maintain tables and cache");

define("_AM_OLEDRION_ADD_VAT","Add a VAT");
define("_AM_OLEDRION_EDIT_VAT","Edit a VAT");

define("_AM_OLEDRION_ADD_CATEG","Add a category");
define("_AM_OLEDRION_EDIT_CATEG","Edit a category");

define("_AM_OLEDRION_ADD_VENDOR","Add a vendor");
define("_AM_OLEDRION_EDIT_VENDOR","Edit a vendor");

define("_AM_OLEDRION_ADD_FILE","Add a file");
define("_AM_OLEDRION_EDIT_FILE","Edit a file");

define("_AM_OLEDRION_ADD_MANUFACTURER","Add a Manufacturer");
define("_AM_OLEDRION_EDIT_MANUFACTURER","Edit a Manufacturer");

define("_AM_OLEDRION_ADD_PRODUCT","Add a product");
define("_AM_OLEDRION_EDIT_PRODUCT","Edit a product");

define("_AM_OLEDRION_ADD_DSICOUNT","Add a discount");
define("_AM_OLEDRION_EDIT_DISCOUNT","Edit a discount");

define("_AM_OLEDRION_ADD_ATTRIBUTE","Add an attribute");
define("_AM_OLEDRION_EDIT_ATTRIBUTE","Edit an attribute");

define("_AM_OLEDRION_ERROR_1","Error, no ID specified");
define("_AM_OLEDRION_ERROR_2","Error, impossible to delete this vat, it is used by some products");
define("_AM_OLEDRION_ERROR_3","Error while uploading file ");
define("_AM_OLEDRION_ERROR_4","Error, impossible to delete this category, it is used by some products");
define("_AM_OLEDRION_ERROR_5","Error, impossible to delete this manufacturer, it is used by some products");
define("_AM_OLEDRION_ERROR_6","Error, impossible to delete this vendor, it is used by a product");
define("_AM_OLEDRION_ERROR_7","Error, impossible to create the export file");
define("_AM_OLEDRION_ERROR_8","Error, please create at least one category before to create a product");
define("_AM_OLEDRION_ERROR_9","Error, please create at least one VAT before to create a product");
define("_AM_OLEDRION_ERROR_10","Error, unknow category");
define("_AM_OLEDRION_ERROR_11","Error, unknow export format");
define("_AM_OLEDRION_ERROR_12","Error, unknown action");
define("_AM_OLEDRION_NOT_FOUND", "Error, item not found");
define("_AM_OLEDRION_CONF_DEL_CATEG", "Do you really want to delete this category and its sub-categories ?<br />%s");

define("_AM_OLEDRION_MODIFY", "Modify");
define("_AM_OLEDRION_ADD", "Add");

define("_AM_OLEDRION_PARENT_CATEG", "Parent Category");
define("_AM_OLEDRION_CURRENT_PICTURE", "Current Picture");
define("_AM_OLEDRION_CURRENT_FILE", "Current File");
define("_AM_OLEDRION_PICTURE", "Picture");
define("_AM_OLEDRION_DESCRIPTION", "Description");

define("_AM_OLEDRION_ALL", "All");
define("_AM_OLEDRION_LIMIT_TO", "Filter");
define("_AM_OLEDRION_FILTER", "Filter");
define("_AM_OLEDRION_INDEX_PAGE", "Index Page");
define("_AM_OLEDRION_RELATED_HELP", "Warning, don't enter them until you have entered all products");
define("_AM_OLEDRION_SUBDATE_HELP", "Enter the date in the form of YYYY-MM-DD");
define("_AM_OLEDRION_IMAGE1_HELP", "Current large picture");
define("_AM_OLEDRION_IMAGE2_HELP", "Current picture of the thumb");
define("_AM_OLEDRION_IMAGE1_CHANGE", "Change product's picture");
define("_AM_OLEDRION_IMAGE2_CHANGE", "Change picture of the thumb");
define("_AM_OLEDRION_ATTACHED_HLP", "");
define("_AM_OLEDRION_CATEG_HLP", "Product's category");
define("_AM_OLEDRION_CATEG_TITLE", "Category's title");
define("_AM_OLEDRION_URL_HLP", "Product's url (optional)");
define("_AM_OLEDRION_SELECT_HLP", "Use the control key (or the apple key on Mac) to select more than one item");
define("_AM_OLEDRION_STOCK_HLP", "An email is sent to a group when the quantity is less than ...");
define("_AM_OLEDRION_DISCOUNT_HLP", "Promotional price (temporary) without VAT");
define("_AM_OLEDRION_DISCOUNT_DESCR", "Discount's Description (for your client)");
define("_AM_OLEDRION_DATE", "Date");
define("_AM_OLEDRION_CLIENT", "Client");
define("_AM_OLEDRION_TOTAL_SHIPP", "Total / Shipping");
define('_AM_OLEDRION_NEWSLETTER_BETWEEN', 'Select products published between');
define('_AM_OLEDRION_EXPORT_AND', ' and ');
define('_AM_OLEDRION_IN_CATEGORY', 'In the following categories');
define('_AM_OLEDRION_REMOVE_BR',"Convert the html &lt;br&gt; tag to a new line ?");
define('_AM_OLEDRION_NEWSLETTER_HTML_TAGS', "Remove html tags ?");
define('_AM_OLEDRION_NEWSLETTER_HEADER', "Header");
define('_AM_OLEDRION_NEWSLETTER_FOOTER', "Footer");
define('_AM_OLEDRION_CSV_EXPORT', "Export orders in the following format ");
define('_AM_OLEDRION_EXPORT_READY', "Your export file is ready for download, click on this link to get it");
define('_AM_OLEDRION_CSV_READY', "Your CSV file is ready for download, click on this link to get it");
define('_AM_OLEDRION_NEW_QUANTITY', "New quantity");
define('_AM_OLEDRION_UPDATE_QUANTITIES', "Update quantities");
define('_AM_OLEDRION_NEWSLETTER_READY', "Your newsletter is ready, click on this link to get it");
define('_AM_OLEDRION_DUPLICATED', "Duplicated");

// Added on 14/04/2007 17:11
define('_AM_OLEDRION_SORRY_NOREMOVE', "Sorry but we can't remove this product because it is part of some orders");
define('_AM_OLEDRION_SORRY_NOREMOVE2', "Sorry but we can't remove this attribute because it is part of some orders");
define('_AM_OLEDRION_CONF_VALIDATE', "Do you really want to validate this order ?");
define('_AM_OLEDRION_LAST_ORDERS', "Last Orders");
define('_AM_OLEDRION_LAST_VOTES', "Last Votes");
define('_AM_OLEDRION_NOTE', "Note");

define('_AM_OLEDRION_RECOMMEND_IT', "Recommend it");
define('_AM_OLEDRION_DONOTRECOMMEND_IT', "Stop recommending it");
define('_AM_OLEDRION_RECOMMENDED', "Recommended");
define('_AM_OLEDRION_RECOMM_TEXT', "Text to display on the recommended<br />products pages");
define('_AM_OLEDRION_META_KEYWORDS', "Meta keywords");
define('_AM_OLEDRION_META_DESCRIPTION', "Meta description");
define('_AM_OLEDRION_META_PAGETITLE', "Page's Title");

// Added in March & April 2008
define('_AM_OLEDRION_FILENAME', "File");
define('_AM_OLEDRION_VISIBLE_FILENAME', "Filename visible to the user");
define('_AM_OLEDRION_OFFLINEPAY_TEXT', "Text to display to the user when he/she choosed to not pay online?");
define('_AM_OLEDRION_FOOTER', "Text to display in the category's footer");

define('_AM_OLEDRION_RESTRICT_TEXT', "Text to display when orders are restricted to registred users");

// Pour les réductions
define("_AM_OLEDRION_DISCOUNT_INFORMATION", "Discount information");
define("_AM_OLEDRION_DISCOUNT_TITLE", "Discount title (used internally)");
define("_AM_OLEDRION_DISCOUNT_DESCRIPTION", "Discount description (for you clients)");
define("_AM_OLEDRION_DISCOUNT_PERIOD", "For the period");
define("_AM_OLEDRION_DISCOUNT_PERFROM", "From");
define("_AM_OLEDRION_DISCOUNT_PERTO", "to");
define("_AM_OLEDRION_DISCOUNT_WHOWHAT", "To who or to what apply the reduction ?");
define("_AM_OLEDRION_DISCOUNT_XOOPS_GROUP", "If the Xoops group is");
define("_AM_OLEDRION_DISCOUNT_CATEGORY", "If the category is");
define("_AM_OLEDRION_DISCOUNT_MANUFACTURER", "Manufacturer");
define("_AM_OLEDRION_DISCOUNT_VENDOR", "Vendor");
define("_AM_OLEDRION_DISCOUNT_PRODUCT", "Product");
define("_AM_OLEDRION_DISCOUNT_REDUCTION_PRICE", "Reduction on the product price or the amount of the order");
define("_AM_OLEDRION_DISCOUNT_REDUCTION_TYPE", "Apply a reduction");
define("_AM_OLEDRION_DISCOUNT_QUANTITY_FROM", "From");
define("_AM_OLEDRION_DISCOUNT_QUANTITY_TO", "to");
define("_AM_OLEDRION_DISCOUNT_QUANTITY_INCLUDED", "products (included)");
define("_AM_OLEDRION_DISCOUNT_DEGRESSIV", "Degressiv");
define("_AM_OLEDRION_DISCOUNT_AMOUNT_PERCENT", "Amount or percentage discount on the price");
define("_AM_OLEDRION_DISCOUNT_PERCENT", "Percent");
define("_AM_OLEDRION_DISCOUNT_ON", "On");
define("_AM_OLEDRION_DISCOUNT_THE_PRODUCT", "The product");
define("_AM_OLEDRION_DISCOUNT_THE_CART", "The cart");
define("_AM_OLEDRION_DISCOUNT_IN_WHICH_CASE", "In which case ?");
define("_AM_OLEDRION_DISCOUNT_ALL_CASES", "In all the cases");
define("_AM_OLEDRION_DISCOUNT_FIRST_PURCHASE", "If this is the first customer's purchase on the site");
define("_AM_OLEDRION_DISCOUNT_NEVER_BOUGHT", "If the product has never been bought");
define("_AM_OLEDRION_DISCOUNT_QUANTITY_IS", "If the product's quantity is");
define("_AM_OLEDRION_DISCOUNT_SHIPPING_REDUCTIONS", "Reductions on shipping");
define("_AM_OLEDRION_DISCOUNT_SHIPPINGS_ARE", "Porterages are");
define("_AM_OLEDRION_DISCOUNT_FULL_PAY", "Payable in full");
define("_AM_OLEDRION_DISCOUNT_SHIPPING_FREE", "Are totally free");
define("_AM_OLEDRION_DISCOUNT_ORDER_OVER", "if a customer orders over");
define("_AM_OLEDRION_DISCOUNT_REDUCED_FOR", "Porterages are reduced by");
define("_AM_OLEDRION_DISCOUNT_REDUCED_IF", "if the order is more than");

define("_AM_OLEDRION_DISCOUNT_HELP1", "It's not necessary to specify a category and/or a vendor if you select a product");
define("_AM_OLEDRION_DISCOUNT_HELP2", "If you specify a Xoops group then the reduction will only apply to them.");
define("_AM_OLEDRION_DISCOUNT_HELP3", "If you specify a category then the reduction will apply only to the products of this category.");
define("_AM_OLEDRION_DISCOUNT_HELP4", "If you specify a vendor, only the products of this vendor will benefit from this reduction.");
define("_AM_OLEDRION_DISCOUNT_HELP5", "If you specify a vendor and a category, only the products of the vendor and of this category will benefit from this reduction.");
define("_AM_OLEDRION_DISCOUNT_HELP6", "If you specify a product, only that product will benefit from the reduction.");
define("_AM_OLEDRION_INSTALLED_GATEWAYS", "Installed Gateways");
define("_AM_OLEDRION_GATEWAYS_NAME", "Name");
define("_AM_OLEDRION_GATEWAYS_VERSION", "Version");
define("_AM_OLEDRION_GATEWAYS_DESCRIPTION", "Description");
define("_AM_OLEDRION_GATEWAYS_AUTHOR", "Author");
define("_AM_OLEDRION_GATEWAYS_DATE", "Release date");
define("_AM_OLEDRION_GATEWAYS_USED", "Used");
define("_AM_OLEDRION_GATEWAYS_CREDITS", "Credits : ");
define("_AM_OLEDRION_GATEWAYS_PARAMETERS", "Parameters");
define("_AM_OLEDRION_GATEWAYS_UPDATE", "Update");
define("_AM_OLEDRION_GATEWAYS_ERROR1", "Error, impossible to find the gateway's class file");
define("_AM_OLEDRION_GATEWAYS_ERROR2", "Error, impossible to find any translation file for this gateway");
define("_AM_OLEDRION_GATEWAYS_ERROR3", "Error, the gateway's Php class can't be found or is not named correctly");
define("_AM_OLEDRION_GATEWAYS_ERROR4", "Error, the gateway's Php class does not extends the abstract class");
define("_AM_OLEDRION_GATEWAYS_ERROR5", "Error, unknown gateway");
define("_AM_OLEDRION_GATEWAYS_SEELOG", "See the log's content");

define("_AM_OLEDRION_DOWNLOAD_EXAMPLE", "For example :");
define("_AM_OLEDRION_ATTRIBUTES_LIST", "Attributs list");
define("_AM_OLEDRION_TITLE", "Title");
define("_AM_OLEDRION_WEIGHT", "Weight");
define("_AM_OLEDRION_TYPE", "Type");
define("_AM_OLEDRION_TYPE_RADIO", "Radio Button");
define("_AM_OLEDRION_TYPE_CHECKBOX", "Check box");
define("_AM_OLEDRION_TYPE_LIST", "Scrolling list");
define("_AM_OLEDRION_ATTRIBUTE_NAME", "Name");
define("_AM_OLEDRION_ATTRIBUTE_REQUIRED", "Required");
define("_AM_OLEDRION_ATTRIBUTE_PRODUCT", "Attached product");
define("_AM_OLEDRION_ATTRIBUTE_OPTIONS", "Options");
define("_AM_OLEDRION_ATTRIBUTE_ADD_OPTION", "Add option");
define("_AM_OLEDRION_ATTRIBUTE_DEFAULT_VALUE", "Default value ?");
define("_AM_OLEDRION_ATTRIBUTE_TITLE", "Title");
define("_AM_OLEDRION_ATTRIBUTE_VALUE", "Value");
define("_AM_OLEDRION_ATTRIBUTE_PRICE", "Price");
define("_AM_OLEDRION_ATTRIBUTE_STOCK", "Stock");
define("_AM_OLEDRION_ATTRIBUTE_DEF_VALUE", "ReplaceMe");
define("_AM_OLEDRION_ATTRIBUTE_DEF_AMOUNT", 1);
define("_AM_OLEDRION_ATTRIBUTE_MOVE_UP", "Move Up");        // Warning, this text goes in a javascript code
define("_AM_OLEDRION_ATTRIBUTE_MOVE_DOWN", "Move Down");    // Warning, this text goes in a javascript code
define("_AM_OLEDRION_ATTRIBUTE_DELIMITER", "Delimeter for check boxes and radio buttons");
define("_AM_OLEDRION_ATTRIBUTE_DELIMITER1", "white space");
define("_AM_OLEDRION_ATTRIBUTE_DELIMITER2", "line break");
define("_AM_OLEDRION_ATTRIBUTE_VISIBLE_OPTIONS", "Number of visible options");
define("_AM_OLEDRION_ATTRIBUTE_MULTI_OPTIONS", "Returns multiple values?");
define("_AM_OLEDRION_ATTRIBUTE_PARAMETERS", "Attribut's settings");

define("_AM_OLEDRION_USER", "User");
define("_AM_OLEDRION_ANONYMOUS", "Anonymous");

define('_AM_OLEDRION_CHECKOUT_TEXT1', "Text to display on the first checkkout screen");
define('_AM_OLEDRION_CHECKOUT_TEXT2', "Text to display on the second checkkout screen");

define('_AM_OLEDRION_SELECT_OTHER_P', "Select other products");		// Several products
define('_AM_OLEDRION_SELECT_PRODUCT', "Select another product");	// ONE product
define('_AM_OLEDRION_REMOVE_SELECTED', "Remove selected items");
define('_AM_OLEDRION_SEARCH', "Search");
define('_AM_OLEDRION_SELECT', "Select");
define('_AM_OLEDRION_CLOSE_WINDOW', "Close this window");
define('_AM_OLEDRION_REPLACE', "Replace");
?>