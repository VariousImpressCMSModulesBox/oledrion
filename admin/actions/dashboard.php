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

/**
 * Actions relatives au Dashboard (affichage et suppression d'un vote)
 */
if(!defined("OLEDRION_ADMIN")) exit();
switch($action) {
	// ****************************************************************************************************************
	case 'default':	// Affichage du dashboard
	// ****************************************************************************************************************
		xoops_cp_header();
        oledrion_adminMenu(0);
		oledrion_utils::htitle(_MI_OLEDRION_ADMENU10, 4);
		$itemsCount = 5;	// Nombre d'�l�ments � afficher
		if($h_oledrion_products->getCount() > 0) {
			echo "<table border='0' width='100%' cellpadding='2' cellspacing='2'>";
			echo "<tr>\n";
			// Derni�res commandes ************************************************
			echo "<td valign='top' width='50%' align='center'><b>"._AM_OLEDRION_LAST_ORDERS."</b>";
			$tblTmp = array();
			$criteria = new CriteriaCompo();
			$criteria->add(new Criteria('cmd_id', 0, '<>'));
			$criteria->setSort('cmd_date');
			$criteria->setOrder('DESC');
			$criteria->setLimit($itemsCount);
			$criteria->setStart(0);
			$tblTmp = $h_oledrion_commands->getObjects($criteria);
			echo "<table border='0' cellpadding='2' cellspacing='2' width='100%'>";
			echo "<tr><th align='center'>"._AM_OLEDRION_DATE."</th><th align='center'>"._AM_OLEDRION_ID."</th><th align='center'>"._OLEDRION_TOTAL."</th></tr>\n";
			foreach($tblTmp as $item) {
				$date = formatTimestamp(strtotime($item->getVar('cmd_date')), 's');
				echo "<tr><td align='center'>".$date."</td><td align='center'>".$item->getVar('cmd_id')."</td><td align='right'>".$oledrion_Currency->amountForDisplay($item->getVar('cmd_total'))."</td></tr>";
			}
			echo "</table>";

			// Stocks bas *********************************************************
			echo "</td><td valign='top' width='50%' align='center'><b>"._MI_OLEDRION_ADMENU9."</b>";
			$tblTmp = array();
			$tblTmp = $h_oledrion_products->getLowStocks(0, $itemsCount);
			echo "<table border='0' cellpadding='2' cellspacing='2' width='100%'>";
			echo "<tr><th align='center'>"._OLEDRION_TITLE."</th><th align='center'>"._OLEDRION_STOCK_QUANTITY."</th></tr>\n";
			foreach($tblTmp as $item) {
				$link = "<a href='".OLEDRION_URL."product.php?product_id=".$item->getVar('product_id')."'>".$item->getVar('product_title').'</a>';
				echo "<tr><td>".$link."</td><td align='right'>".$item->getVar('product_stock')."</td></tr>";
			}
			echo "</table>";
			echo "</td></tr>";

			echo "<tr><td colspan='2'>&nbsp;</td></tr>";

			// produits les plus vendus *********************************************
			echo "<td valign='top' width='50%' align='center'><b>"._MI_OLEDRION_BNAME4."</b>";
			if($h_oledrion_commands->getCount() > 0) {
				$tblTmp = $tblTmp2 = array();
				$tblTmp2 = $h_oledrion_caddy->getMostSoldProducts(0, $itemsCount, 0, true);

				$tblTmp = $h_oledrion_products->getObjects(new Criteria('product_id', '('.implode(',', array_keys($tblTmp2)).')', 'IN'), true);
				echo "<table border='0' cellpadding='2' cellspacing='2' width='100%'>";
				echo "<tr><th align='center'>"._OLEDRION_TITLE."</th><th align='center'>"._OLEDRION_QUANTITY."</th></tr>\n";
				foreach($tblTmp2 as $key => $value) {
					$item = $tblTmp[$key];
					$link = "<a href='".OLEDRION_URL."product.php?product_id=".$item->getVar('product_id')."'>".$item->getVar('product_title').'</a>';
					echo "<tr><td>".$link."</td><td align='right'>".$value."</td></tr>";
				}
				echo "</table>";
			}
			// produits les plus vus ************************************************
			$tblTmp = array();
			$tblTmp = $h_oledrion_products->getMostViewedProducts(new oledrion_parameters(array('start' => 0, 'limit' => $itemsCount)));
			echo "</td><td valign='top' width='50%' align='center'><b>"._MI_OLEDRION_BNAME2."</b>";
			echo "<table border='0' cellpadding='2' cellspacing='2' width='100%'>";
			echo "<tr><th align='center'>"._OLEDRION_TITLE."</th><th align='center'>"._OLEDRION_HITS."</th></tr>\n";
			foreach($tblTmp as $item) {
				$link = "<a href='".OLEDRION_URL."product.php?product_id=".$item->getVar('product_id')."'>".$item->getVar('product_title').'</a>';
				echo "<tr><td>".$link."</td><td align='right'>".$item->getVar('product_hits')."</td></tr>";
			}
			echo "</table>";
			echo "</td></tr>";

			echo "<tr><td colspan='2'>&nbsp;</td></tr>";

			// Derniers votes *****************************************************
			echo "</td><td colspan='2' valign='top' align='center'><b>"._AM_OLEDRION_LAST_VOTES."</b>";
			if($h_oledrion_votedata->getCount() > 0) {
				$tblTmp = $tblTmp2 = $tblTmp3 = array();
				$tblTmp3 = $h_oledrion_votedata->getLastVotes(0, $itemsCount);
				foreach($tblTmp3 as $item) {
					$tblTmp2[] = $item->getVar('vote_product_id');
				}
				$tblTmp = $h_oledrion_products->getObjects(new Criteria('product_id', '('.implode(',', $tblTmp2).')', 'IN'), true);
				echo "<table border='0' cellpadding='2' cellspacing='2' width='100%'>";
				echo "<tr><th align='center'>"._OLEDRION_TITLE."</th><th align='center'>"._AM_OLEDRION_DATE."</th><th colspan='2' align='center'>"._AM_OLEDRION_NOTE."</th></tr>";
				foreach($tblTmp3 as $vote) {
					$item = $tblTmp[$vote->getVar('vote_product_id')];
					$link = "<a href='".OLEDRION_URL."product.php?product_id=".$item->getVar('product_id')."'>".$item->getVar('product_title').'</a>';
					$action_delete = "<a href='$baseurl?op=dashboard&action=deleterating&id=".$vote->getVar('vote_ratingid')."' title='"._OLEDRION_DELETE."'".$conf_msg.">".$icones['delete'].'</a>';
					echo "<tr><td>".$link."</td><td align='center'>".formatTimestamp($vote->getVar('vote_ratingtimestamp'), 's')."</td><td align='right'>".$vote->getVar('vote_rating')."</td><td>".$action_delete."</td></tr>";
				}
				echo "</table>\n";
			}
			echo "</td></tr>\n";
			echo "</table>\n";
		}
		show_footer();
		break;


	// ****************************************************************************************************************
	case 'deleterating':	// Delete a rating
	// ****************************************************************************************************************
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		if(empty($id)) {
			oledrion_utils::redirect(_AM_OLEDRION_ERROR_1, $baseurl, 5);
		}
		$opRedirect = 'dashboard';
		$item = $h_oledrion_votedata->get($id);
		if(is_object($item)) {
			$res = $h_oledrion_votedata->delete($item, true);
			if($res) {
				$product_id = $item->getVar('vote_product_id');
				$product = null;
				$product = $h_oledrion_products->get($product_id);
				if(is_object($product)) {	// Update Product's rating
					$totalVotes = $sumRating = $ret = $finalrating = 0;
					$ret = $h_oledrion_votedata->getCountRecordSumRating($product->getVar('product_id'), $totalVotes, $sumRating);
					if($totalVotes > 0 ) {
						$finalrating = $sumRating / $totalVotes;
						$finalrating = number_format($finalrating, 4);
					}
					$h_oledrion_products->updateRating($product_id, $finalrating, $totalVotes);
				}
				oledrion_utils::redirect(_AM_OLEDRION_SAVE_OK, $baseurl.'?op='.$opRedirect,2);
			} else {
				oledrion_utils::redirect(_AM_OLEDRION_SAVE_PB, $baseurl.'?op='.$opRedirect,5);
			}
		} else {
			oledrion_utils::redirect(_AM_OLEDRION_NOT_FOUND, $baseurl.'?op='.$opRedirect,5);
		}
		break;
}
?>