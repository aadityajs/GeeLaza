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
<div class="previous_deal_ani_27">
<div class="previous_deal_ani_27_top"></div>
<div class="previous_deal_ani_27_mid">
<div><p><a href="<?php echo SITE_URL; ?>?action=sold&id=<?php echo $previous_res['deal_id']; ?>"><?php echo truncate_string($previous_details['title'], 100); ?></a></p></div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="8" /></div>
<div class="previous_left_ani_27"><img src="<?php echo UPLOAD_PATH.$previous_image['file']; ?>" alt="" width="171" height="131" /></div>
<div class="previous_right_ani_27">
<div class="left_grey_ani_27">
<p><?php echo $previous_buy[0]; ?></p>
<span style="text-align:center;">sold</span>
</div>
<div class="clear"></div>
<!--<div class="left_green_ani_27">-->
<div class="blue_00a2e8"><p>Price - <?php echo '&pound;'.$previous_details['discounted_price']; ?></p></div>
<div class="blue_99d9ea"><p><span style="font-size: 11px; font-weight: normal; color: #000000;">Savings -
<?php echo '&pound;'. ($previous_details['full_price'] - $previous_details['discounted_price']); ?></span></p></div>
<!--<p>Discount
<?php echo intval($previous_details['discounted_price']*100/$previous_details['full_price']); ?>%</p>-->
<!--</div>-->
<!--<div class="left_green_ani_27">
<p style="font-size: 11px; font-weight: normal; color: #000000;">Value - 
<?php echo '&pound;'.$previous_details['full_price']; ?></p>
</div>-->
</div>
</div>
<div class="previous_deal_ani_27_bot"></div>
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