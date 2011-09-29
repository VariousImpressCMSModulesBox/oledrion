CREATE TABLE `oledrion_manufacturer` (
  `manu_id` int(10) unsigned NOT NULL auto_increment,
  `manu_name` varchar(255) NOT NULL,
  `manu_commercialname` varchar(255) NOT NULL,
  `manu_email` varchar(255) NOT NULL,
  `manu_bio` text NOT NULL,
  `manu_url` varchar(255) NOT NULL,
  `manu_photo1` varchar(255) NOT NULL,
  `manu_photo2` varchar(255) NOT NULL,
  `manu_photo3` varchar(255) NOT NULL,
  `manu_photo4` varchar(255) NOT NULL,
  `manu_photo5` varchar(255) NOT NULL,
  PRIMARY KEY  (`manu_id`),
  KEY `manu_name` (`manu_name`),
  KEY `manu_commercialname` (`manu_commercialname`),
  FULLTEXT KEY `manu_bio` (`manu_bio`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_products` (
  `product_id` int(11) unsigned NOT NULL auto_increment,
  `product_cid` int(5) unsigned NOT NULL default '0',
  `product_title` varchar(255) NOT NULL default '',
  `product_vendor_id` int(10) unsigned NOT NULL,
  `product_sku` varchar(60) NOT NULL COMMENT 'numéro interne du produit',
  `product_extraid` varchar(50) NOT NULL,
  `product_width` varchar(50) NOT NULL,
  `product_length` varchar(50) NOT NULL,
  `product_unitmeasure1` varchar(20) NOT NULL,
  `product_url` varchar(255) NOT NULL COMMENT 'URL vers une page externe ',
  `product_image_url` varchar(255) NOT NULL COMMENT 'URL de la grande image',
  `product_thumb_url` varchar(255) NOT NULL COMMENT 'URL de la vignette',
  `product_submitter` int(11) unsigned NOT NULL default '0',
  `product_online` tinyint(1) NOT NULL default '0',
  `product_date` varchar(255) NOT NULL COMMENT 'date de publication du produit',
  `product_submitted` int(10) unsigned NOT NULL default '0' COMMENT 'Date à laquelle le produit a été soumis sur le site',
  `product_hits` int(11) unsigned NOT NULL default '0' COMMENT 'Nombre de fois où la fiche du produit a été vue',
  `product_rating` double(6,4) NOT NULL default '0.0000',
  `product_votes` int(11) unsigned NOT NULL default '0',
  `product_comments` int(11) unsigned NOT NULL default '0',
  `product_price` decimal(10,2) NOT NULL,
  `product_shipping_price` decimal(10,2) NOT NULL,
  `product_discount_price` decimal(10,2) NOT NULL,
  `product_stock` mediumint(8) unsigned NOT NULL COMMENT 'Quantité de produi disponible en stock',
  `product_alert_stock` mediumint(8) unsigned NOT NULL COMMENT 'Quantité à partir de laquelle il faut émettre une alerte',
  `product_summary` text NOT NULL,
  `product_description` text NOT NULL,
  `product_attachment` varchar(255) NOT NULL,
  `product_weight` varchar(20) NOT NULL,
  `product_unitmeasure2` varchar(20) NOT NULL,
  `product_vat_id` mediumint(8) unsigned NOT NULL,
  `product_download_url` varchar(255) NOT NULL COMMENT 'URL de téléchargement du produit',
  `product_recommended` date NOT NULL,
  `product_metakeywords` varchar(255) NOT NULL,
  `product_metadescription` varchar(255) NOT NULL,
  `product_metatitle` varchar(255) NOT NULL,
  `product_delivery_time` mediumint(8) unsigned NOT NULL,
  `product_ecotaxe` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`product_id`),
  KEY `product_cid` (`product_cid`),
  KEY `product_online` (`product_online`),
  KEY `product_title` (`product_title`),
  KEY `product_unitmeasure1` (`product_unitmeasure1`),
  KEY `product_weight` (`product_weight`),
  KEY `product_vendor_id` (`product_vendor_id`),
  KEY `product_extraid` (`product_extraid`),
  KEY `product_width` (`product_width`),
  KEY `recent_online` (`product_online`,`product_submitted`),
  KEY `product_recommended` (`product_recommended`),
  FULLTEXT KEY `product_summary` (`product_summary`),
  FULLTEXT KEY `product_description` (`product_description`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_productsmanu` (
  `pm_id` int(10) unsigned NOT NULL auto_increment,
  `pm_product_id` int(10) unsigned NOT NULL,
  `pm_manu_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`pm_id`),
  KEY `pm_product_id` (`pm_product_id`),
  KEY `pm_manu_id` (`pm_manu_id`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_caddy` (
  `caddy_id` int(10) unsigned NOT NULL auto_increment,
  `caddy_product_id` int(10) unsigned NOT NULL,
  `caddy_qte` mediumint(8) unsigned NOT NULL,
  `caddy_price` decimal(10,2) NOT NULL,
  `caddy_cmd_id` int(10) unsigned NOT NULL,
  `caddy_shipping` double(7,2) NOT NULL,
  `caddy_pass` varchar(32) NOT NULL,
  PRIMARY KEY  (`caddy_id`),
  KEY `caddy_cmd_id` (`caddy_cmd_id`),
  KEY `caddy_pass` (`caddy_pass`),
  KEY `caddy_product_id` (`caddy_product_id`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_cat` (
  `cat_cid` int(5) unsigned NOT NULL auto_increment,
  `cat_pid` int(5) unsigned NOT NULL default '0',
  `cat_title` varchar(255) NOT NULL default '',
  `cat_imgurl` varchar(255) NOT NULL default '',
  `cat_description` text NOT NULL,
  `cat_advertisement` text NOT NULL COMMENT 'Publicité de la catégorie',
  `cat_metatitle` varchar(255) NOT NULL,
  `cat_metadescription` varchar(255) NOT NULL,
  `cat_metakeywords` varchar(255) NOT NULL,
  `cat_footer` text NOT NULL,
  PRIMARY KEY  (`cat_cid`),
  KEY `cat_pid` (`cat_pid`),
  FULLTEXT KEY `cat_title` (`cat_title`),
  FULLTEXT KEY `cat_description` (`cat_description`)
) ENGINE=MyISAM ;

CREATE TABLE `oledrion_commands` (
  `cmd_id` int(10) unsigned NOT NULL auto_increment,
  `cmd_uid` int(10) unsigned NOT NULL COMMENT 'ID utilisateur Xoops',
  `cmd_date` date NOT NULL,
  `cmd_state` tinyint(1) unsigned NOT NULL,
  `cmd_ip` varchar(32) NOT NULL,
  `cmd_lastname` varchar(255) NOT NULL,
  `cmd_firstname` varchar(255) NOT NULL,
  `cmd_adress` text NOT NULL,
  `cmd_zip` varchar(30) NOT NULL,
  `cmd_town` varchar(255) NOT NULL,
  `cmd_country` varchar(3) NOT NULL,
  `cmd_telephone` varchar(30) NOT NULL,
  `cmd_email` varchar(255) NOT NULL,
  `cmd_articles_count` mediumint(8) unsigned NOT NULL,
  `cmd_total` double(7,2) NOT NULL,
  `cmd_shipping` decimal(10,2) NOT NULL,
  `cmd_bill` tinyint(1) unsigned NOT NULL default '0' COMMENT 'Le client à demandé une facture papier ?',
  `cmd_password` varchar(32) NOT NULL COMMENT 'Utilisé pour imprimer les factures en ligne',
  `cmd_text` text NOT NULL,
  `cmd_cancel` varchar(32) NOT NULL,
  `cmd_comment` text NOT NULL,
  `cmd_vat_number` varchar(255) NOT NULL,
  PRIMARY KEY  (`cmd_id`),
  KEY `cmd_date` (`cmd_date`),
  KEY `cmd_state` (`cmd_state`),
  KEY `cmd_uid` (`cmd_uid`)
) ENGINE=MyISAM ;

CREATE TABLE `oledrion_related` (
  `related_id` int(10) unsigned NOT NULL auto_increment,
  `related_product_id` int(10) unsigned NOT NULL COMMENT 'Id du produit maître',
  `related_product_related` int(10) unsigned NOT NULL COMMENT 'Id du produit à afficher avec le maître',
  PRIMARY KEY  (`related_id`),
  KEY `seealso` (`related_product_id`,`related_product_related`),
  KEY `related_product_id` (`related_product_id`),
  KEY `related_product_related` (`related_product_related`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_vat` (
  `vat_id` mediumint(8) unsigned NOT NULL auto_increment,
  `vat_rate` double(5,2) NOT NULL,
  PRIMARY KEY  (`vat_id`),
  KEY `vat_rate` (`vat_rate`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_votedata` (
  `vote_ratingid` int(11) unsigned NOT NULL auto_increment,
  `vote_product_id` int(11) unsigned NOT NULL default '0',
  `vote_uid` int(11) unsigned NOT NULL default '0',
  `vote_rating` tinyint(3) unsigned NOT NULL default '0',
  `vote_ratinghostname` varchar(60) NOT NULL default '',
  `vote_ratingtimestamp` int(10) NOT NULL default '0',
  PRIMARY KEY  (`vote_ratingid`),
  KEY `vote_ratinguser` (`vote_uid`),
  KEY `vote_ratinghostname` (`vote_ratinghostname`),
  KEY `vote_product_id` (`vote_product_id`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_discounts` (
  `disc_id` int(10) unsigned NOT NULL auto_increment,
  `disc_title` varchar(255) NOT NULL,
  `disc_group` int(10) unsigned NOT NULL COMMENT 'Groupe Xoops concerné par la remise (0=tous les groupes)',
  `disc_cat_cid` int(10) unsigned NOT NULL COMMENT 'Catégorie concernée par la remise (0=toutes les catégories)',
  `disc_vendor_id` int(10) unsigned NOT NULL COMMENT 'Quand la réduction concerne les produits d''un vendeur  (0=tous les vendeurs)',
  `disc_product_id` int(10) unsigned NOT NULL COMMENT 'Si la réduction concerne un produit (0=tous les produits)',
  `disc_price_type` tinyint(1) unsigned NOT NULL COMMENT 'Type de réduction (dégressive, montant/pourcentage)',
  `disc_price_degress_l1qty1` mediumint(8) unsigned NOT NULL,
  `disc_price_degress_l1qty2` mediumint(8) unsigned NOT NULL,
  `disc_price_degress_l1total` decimal(10,2) NOT NULL,
  `disc_price_degress_l2qty1` mediumint(9) NOT NULL,
  `disc_price_degress_l2qty2` mediumint(9) NOT NULL,
  `disc_price_degress_l2total` decimal(10,2) NOT NULL,
  `disc_price_degress_l3qty1` mediumint(9) NOT NULL,
  `disc_price_degress_l3qty2` mediumint(9) NOT NULL,
  `disc_price_degress_l3total` decimal(10,2) NOT NULL,
  `disc_price_degress_l4qty1` mediumint(9) NOT NULL,
  `disc_price_degress_l4qty2` mediumint(9) NOT NULL,
  `disc_price_degress_l4total` decimal(10,2) NOT NULL,
  `disc_price_degress_l5qty1` mediumint(9) NOT NULL,
  `disc_price_degress_l5qty2` mediumint(9) NOT NULL,
  `disc_price_degress_l5total` decimal(10,2) NOT NULL,
  `disc_price_amount_amount` double(7,2) NOT NULL COMMENT 'Montant ou pourcentage de réduction sur le prix',
  `disc_price_amount_type` tinyint(1) unsigned NOT NULL COMMENT 'Pourcent ou Euros ?',
  `disc_price_amount_on` tinyint(1) unsigned NOT NULL COMMENT 'Produit ou panier ?',
  `disc_price_case` tinyint(1) unsigned NOT NULL COMMENT 'Dans quel cas ? (tous les cas, si c''est le premier achat, si le produit n''a jamais été acheté etc)',
  `disc_price_case_qty_cond` tinyint(1) NOT NULL COMMENT 'Supérieur, inférieur, égal',
  `disc_price_case_qty_value` mediumint(8) NOT NULL COMMENT 'Quantité de produit à tester',
  `disc_shipping_type` tinyint(1) unsigned NOT NULL,
  `disc_shipping_free_morethan` double(7,2) NOT NULL,
  `disc_shipping_reduce_amount` double(7,2) NOT NULL,
  `disc_shipping_reduce_cartamount` double(7,2) NOT NULL,
  `disc_shipping_degress_l1qty1` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l1qty2` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l1total` double(7,2) NOT NULL,
  `disc_shipping_degress_l2qty1` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l2qty2` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l2total` double(7,2) NOT NULL,
  `disc_shipping_degress_l3qty1` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l3qty2` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l3total` double(7,2) NOT NULL,
  `disc_shipping_degress_l4qty1` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l4qty2` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l4total` double(7,2) NOT NULL,
  `disc_shipping_degress_l5qty1` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l5qty2` mediumint(8) unsigned NOT NULL,
  `disc_shipping_degress_l5total` double(7,2) NOT NULL,
  `disc_date_from` int(10) unsigned NOT NULL COMMENT 'Date de début de la promo',
  `disc_date_to` int(10) unsigned NOT NULL COMMENT 'Date de fin de la promo',
  `disc_description` text NOT NULL,
  PRIMARY KEY  (`disc_id`),
  KEY `disc_group` (`disc_group`),
  KEY `disc_title` (`disc_title`),
  KEY `disc_price_type` (`disc_price_type`),
  KEY `disc_price_case` (`disc_price_case`),
  KEY `disc_date` (`disc_date_from`,`disc_date_to`),
  KEY `disc_shipping_type` (`disc_shipping_type`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_vendors` (
  `vendor_id` int(10) unsigned NOT NULL auto_increment,
  `vendor_name` varchar(150) NOT NULL,
  PRIMARY KEY  (`vendor_id`),
  KEY `vendor_name` (`vendor_name`)
) ENGINE=MyISAM;

CREATE TABLE `oledrion_files` (
  `file_id` int(10) unsigned NOT NULL auto_increment,
  `file_product_id` int(10) unsigned NOT NULL,
  `file_filename` varchar(255) NOT NULL,
  `file_description` varchar(255) NOT NULL,
  `file_mimetype` varchar(255) NOT NULL,
  PRIMARY KEY  (`file_id`),
  KEY `file_product_id` (`file_product_id`),
  KEY `file_filename` (`file_filename`),
  KEY `file_description` (`file_description`)
) ENGINE=InnoDB;

CREATE TABLE `oledrion_persistent_cart` (
  `persistent_id` int(10) unsigned NOT NULL auto_increment,
  `persistent_product_id` int(10) unsigned NOT NULL,
  `persistent_uid` mediumint(8) unsigned NOT NULL,
  `persistent_date` int(10) unsigned NOT NULL,
  `persistent_qty` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY  (`persistent_id`),
  KEY `persistent_product_id` (`persistent_product_id`),
  KEY `persistent_uid` (`persistent_uid`),
  KEY `persistent_date` (`persistent_date`)
) ENGINE=InnoDB;

CREATE TABLE `oledrion_gateways_options` (
  `option_id` int(10) unsigned NOT NULL auto_increment,
  `option_gateway` varchar(50) NOT NULL COMMENT 'nom de la passerelle de paiement',
  `option_name` varchar(50) NOT NULL,
  `option_value` text NOT NULL,
  PRIMARY KEY  (`option_id`),
  KEY `option_gateway` (`option_gateway`),
  KEY `option_name` (`option_name`),
  KEY `option_gateway_name` (`option_gateway`,`option_name`)
) ENGINE=InnoDB COMMENT='Enregistre les préférences des passerelles de paiement';

CREATE TABLE `oledrion_lists` (
  `list_id` int(10) unsigned NOT NULL auto_increment,
  `list_uid` mediumint(8) unsigned NOT NULL,
  `list_title` varchar(255) NOT NULL,
  `list_date` int(10) unsigned NOT NULL,
  `list_productscount` mediumint(8) unsigned NOT NULL,
  `list_views` mediumint(8) unsigned NOT NULL,
  `list_password` varchar(50) NOT NULL,
  `list_type` tinyint(3) unsigned NOT NULL,
  `list_description` text NOT NULL,
  PRIMARY KEY  (`list_id`),
  KEY `list_uid` (`list_uid`)
) ENGINE=InnoDB;

CREATE TABLE `oledrion_products_list` (
  `productlist_id` int(10) unsigned NOT NULL auto_increment,
  `productlist_list_id` int(10) unsigned NOT NULL,
  `productlist_product_id` int(10) unsigned NOT NULL,
  `productlist_date` date NOT NULL,
  PRIMARY KEY  (`productlist_id`),
  KEY `productlist_list_id` (`productlist_list_id`),
  KEY `productlist_product_id` (`productlist_product_id`)
) ENGINE=InnoDB;

CREATE TABLE `oledrion_attributes` (
  `attribute_id` int(10) unsigned NOT NULL auto_increment,
  `attribute_weight` mediumint(7) unsigned default NULL,
  `attribute_title` varchar(255) default NULL,
  `attribute_name` varchar(255) NOT NULL,
  `attribute_type` tinyint(3) unsigned default NULL,
  `attribute_mandatory` tinyint(1) unsigned default NULL,
  `attribute_values` text,
  `attribute_names` text,
  `attribute_prices` text,
  `attribute_stocks` text,
  `attribute_product_id` int(11) unsigned default NULL,
  `attribute_default_value` varchar(255) default NULL,
  `attribute_option1` mediumint(7) unsigned default NULL,
  `attribute_option2` mediumint(7) unsigned default NULL,
  PRIMARY KEY  (`attribute_id`),
  KEY `attribute_product_id` (`attribute_product_id`),
  KEY `attribute_weight` (`attribute_weight`)
) ENGINE=InnoDB;

CREATE TABLE `oledrion_caddy_attributes` (
  `ca_id` int(10) unsigned NOT NULL auto_increment,
  `ca_cmd_id` int(10) unsigned NOT NULL,
  `ca_caddy_id` int(10) unsigned NOT NULL,
  `ca_attribute_id` int(10) unsigned NOT NULL,
  `ca_attribute_values` text NOT NULL,
  `ca_attribute_names` text NOT NULL,
  `ca_attribute_prices` text NOT NULL,
  PRIMARY KEY  (`ca_id`),
  KEY `ca_cmd_id` (`ca_cmd_id`),
  KEY `ca_caddy_id` (`ca_caddy_id`),
  KEY `ca_attribute_id` (`ca_attribute_id`)
) ENGINE=InnoDB;
