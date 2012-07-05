<?php include("include/header.php");?>
<?php
error_reporting(E_ERROR && E_STRICT);
?>
<div id="container">
<div style="margin-top: 0;" id="leftcol">
<div class="deal_info">
<div class="top_about">
<p>Previous Deals</p>
</div>
<div class="clear"></div>
<div class="midbg">
<div class="today_deal">

<?php 
	
	//$omit_sql_today = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_end_time LIKE '".date("Y-m-d")."%' LIMIT 0, 1";
	//$omit_today_res = mysql_fetch_array(mysql_query($omit_sql_today));

	//$sql_previous = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_end_time NOT LIKE '".date("Y-m-d")."%' LIMIT 0, 30";
	//$sql_previous = "SELECT * FROM ".TABLE_TRANSACTION." WHERE transaction_status = 'success' AND deal_id != '".$omit_today_res['deal_id']."' LIMIT 0, 30";
	$sql_previous = "SELECT * FROM ".TABLE_DEALS." WHERE is_previous = 'y'";
	$qr = mysql_num_rows(mysql_query($sql_previous));
	$sql_previous_res = mysql_query($sql_previous);
	
	while ($previous_res = mysql_fetch_array($sql_previous_res)) {
		
		$sql_previous_details = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_id = '".$previous_res['deal_id']."' LIMIT 0, 30";
		$previous_details = mysql_fetch_array(mysql_query($sql_previous_details));
		
		$sql_previous_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$previous_res['deal_id'];
		$previous_buy = mysql_fetch_array(mysql_query($sql_previous_buy));
		
		$sql_previous_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$previous_res['deal_id'];
		$previous_image = mysql_fetch_array(mysql_query($sql_previous_image));
		
?>

<!-- deal box start -->
<div class="previous_deal1">
<!--<div><p>£24.50 instead of £65 for two people to enjoy a three course meal, including pork loin in Madeira..</p></div>-->
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="8" /></div>
<div class="previous_left1"><img src="<?php echo UPLOAD_PATH.$previous_image['file']; ?>" alt="" width="280" height="187"/></div>
<div class="previous_right1">
<div class="previous_rightbox">
<div class="clear"></div>
<div class="left_green2">
<p>Value</p>
<span style="text-align:center;"><?php echo '&pound;'.$previous_details['full_price']; ?></span>
</div>
<div class="left_green2">
<div id="sold_deal"><p>SOLD<br/><?php echo $previous_buy[0]; ?></p></div>
<p>Discount</p>
<span style="text-align:center;"><?php echo intval($previous_details['discounted_price']*100/$previous_details['full_price']); ?>%</span>
</div>
<div class="left_green2">
<p>You Save</p>
<span style="text-align:center;"><?php echo '&pound;'. ($previous_details['full_price'] - $previous_details['discounted_price']); ?></span>
</div>
</div>
<div class="clear"></div>
<div><p><strong><a href="<?php echo SITE_URL; ?>?action=sold&id=<?php echo $previous_res['deal_id']; ?>"><?php echo truncate_string($previous_details['title'], 100); ?></a></strong></p></div>
</div>
</div>
<?php } 	// End while ?>
<!-- deal box ends -->




<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="30" /></div>
</div>
</div>
<div class="bot_about"></div>
</div>
</div>
</div>
</div>
</div>
<?php include ('include/sidebar.php');?>
</div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
<?php include ('include/footer.php'); ?>