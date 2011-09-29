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

/**
 * Various parameters for the module
 */

// Location of attached files (url and physical path on your disk)
if(!defined("OLEDRION_ATTACHED_FILES_URL")) {
	// Define here the place where files attached to products are saved
	define("OLEDRION_ATTACHED_FILES_URL", XOOPS_UPLOAD_URL);		// WITHOUT Trailing slash
	define("OLEDRION_ATTACHED_FILES_PATH", XOOPS_UPLOAD_PATH);	// WITHOUT Trailing slash

	// Define here where pictures are saved
	define("OLEDRION_PICTURES_URL", XOOPS_UPLOAD_URL);		// WITHOUT Trailing slash
	define("OLEDRION_PICTURES_PATH", XOOPS_UPLOAD_PATH);		// WITHOUT Trailing slash

	// Maximum length of product's summary for pages (in characters)
	define("OLEDRION_SUMMARY_MAXLENGTH", 150);

	// Used in checkout to select a default country
	define("OLEDRION_DEFAULT_COUNTRY", 'FR');

	// RSS Feed cache duration (in minutes)
	define("OLEDRION_RSS_CACHE", 3600);

	// Dimensions of the popup used to select product(s) when there are a lot of products
	define("OLEDRION_MAX_PRODUCTS_POPUP_WIDTH", 800);
	define("OLEDRION_MAX_PRODUCTS_POPUP_HEIGHT", 600);

	// Newsletter URL (the folder must be writable)
	define("OLEDRION_NEWSLETTER_URL", XOOPS_URL.'/uploads/oledrion_newsletter.txt');
	// Newsletter PATH (the folder must be writable)
	define("OLEDRION_NEWSLETTER_PATH", XOOPS_ROOT_PATH.'/uploads/oledrion_newsletter.txt');

	// CSV path (the folder must be writable)
	define("OLEDRION_CSV_PATH", XOOPS_UPLOAD_PATH);
	// CSV URL (the folder must be writable)
	define("OLEDRION_CSV_URL", XOOPS_UPLOAD_URL);
	// CSV Separator
	define("OLEDRION_CSV_SEP", ';');

	// Gateway log's path (must be writable)
	define("OLEDRION_GATEWAY_LOG_PATH", XOOPS_UPLOAD_PATH.'/loggateway_oledrion.php');

	// Do you want to show the list of main categories on the category page when user is on category.php (without specifying a category to see)
	define("OLEDRION_SHOW_MAIN_CATEGORIES", true);
	// Do you want to sho the list of sub categories of the current category on the category page (when viewing a specific category)
	define("OLEDRION_SHOW_SUB_CATEGORIES", true);

	// String to use to join the list of manufacturers of each product
	define("OLEDRION_STRING_TO_JOIN_MANUFACTURERS", ', ');

	// Thumbs prefix (when thumbs are automatically created)
	define("OLEDRION_THUMBS_PREFIX", 'thumb_');

	// Popup width and height (used in the product.php page to show the media.php page)
	define("OLEDRION_POPUP_MEDIA_WIDTH", 640);
	define("OLEDRION_POPUP_MEDIA_HEIGHT", 480);

	// Maximum attached files count to display on the product page
	define("OLEDRION_MAX_ATTACHMENTS", 20);

	// Define the MP3 player's dimensions (dewplayer)
	define("OLEDRION_DEWPLAYER_WIDTH", 240);		// I do not recommend to go lower than 240 pixels !!!!
	define("OLEDRION_DEWPLAYER_HEIGHT", 20);

	// Place for the "duplicated" text inside the product's title
	define("OLEDRION_DUPLICATED_PLACE", 'right');    // or 'left'

	// Define the excluded tabs in the module's administration
	// '' = don't remove anything
	// To remove the first, third and fourth tabs only, type : '0,2,4'
	define("OLEDRION_EXCLUDED_TABS", '');

	// When this option is set to false, if Product A has Product B as a related product but Product A is not noted as related to Product B then the display of product A will display Product B as a related product.
	// But Product B will not show Product A as a related product.
	// When this option is set to true, Product A and Product B display each other as two related products even if Product A was not set as a related product to Product A.
	define("OLEDRION_RELATED_BOTH", true);

	// Do we resize pictures when they are smaller than defined dimensions  ?
	define("OLEDRION_DONT_RESIZE_IF_SMALLER", true);

	// Do you want to automatically fill the manual date when you create a new product ?
	define("OLEDRION_AUTO_FILL_MANUAL_DATE", true);

    // Set this option to true if you can't see the products when you add them to your cart
	define("OLEDRION_CART_BUG", false);

	// Set this option to true if your theme uses jQuery, else, set it to false
	define("OLEDRION_MY_THEME_USES_JQUERY", false);
}
?>