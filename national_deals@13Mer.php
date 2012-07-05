<?php include("include/header.php");?>


<?php
error_reporting(E_ERROR && E_STRICT);
?>

<script src="js/countdown.js" type="text/javascript" charset="utf-8"></script>


<?php

 //echo $_COOKIE['subscribe'];

?>

<?php
// best_deal treated as National Deal here.
//if ($_GET['nd'] != "") {
	$deal_id = $_GET['nd'];

	$sql_today = "SELECT *,DATEDIFF(`deal_end_time`,NOW()) as date_diff FROM ".TABLE_DEALS." WHERE status >= 1 AND best_deal = 'y' AND deal_end_time >= NOW() LIMIT 0, 1";
	$today_res = mysql_fetch_array(mysql_query($sql_today));
	$no_of_deal = mysql_num_rows(mysql_query($sql_today));

	$sql_todays_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$today_res['deal_id'];
	$total_buy = mysql_fetch_array(mysql_query($sql_todays_buy));

	$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
	$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));

//}
?>
<div class="topbg">
<ul>
<li><p><strong>DEAL INFORMATION</strong></p></li>
<li><img src="images/spacer.gif" alt="" width="160" height="1" /></li>
<li>Recommend This Deal By:</li>
<li><img src="images/email.png" alt="" width="19" height="18" /></li>
<li><a id="various1" href="#inline1">Email</a></li>
<!-- <li><img src="images/facebook.png" alt="" width="19" height="18" /></li> -->
<li><a name="fb_share" type="icon_link">Facebook</a>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share"
	        type="text/javascript">
	</script>
</li>
<!-- <li><img src="images/twitter.png" alt="" width="19" height="18" /></li> -->
<li>
	<a href="https://twitter.com/share" class="twitter-share-button" data-text="Twitter" data-via="unifiedinfotech" data-count="none"></a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</li>
</ul>
</div>

<?php include 'recommendation_popup.php';?>

<div class="clear"></div>
<?php if($no_of_deal > 0) { ?>
<div class="midbg">


<div class="today_deal">

<div style="height: auto;"></div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="1" /></div>

   <?php if ($_GET['action'] == "sold") { ?>
   	<div class="tab_button1"></div>
   <?php } else { ?>
   	<a href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>">
   		<div class="tab_button"></div>
   	</a>
   <?php } ?>

<!--

<div style="height: auto;"><?php if ($_GET['action'] != "sold") { ?><a href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>"><?php } ?><h1><?php echo strip_tags($today_res['title']); ?></h1><?php if ($_GET['action'] != "sold") { ?></a><?php } ?></div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="1" /></div>
	  <div class="<?php if ($_GET['action'] == "sold") { echo "tab_button1"; } else {echo "tab_button"; } ?>"><span>&pound;<?php echo strip_tags($today_res['discounted_price']); ?></span><a href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>"><?php if ($_GET['action'] != "sold") { ?><span class="tab_buy">&nbsp;&nbsp;&nbsp;</span><?php } ?></a></div>


 -->

	  <div class="deal_left">
	  <div class="pric"><span>&pound;<?php echo strip_tags($today_res['discounted_price']); ?></span></div>

	  <div class="blue_box"  style="margin-top:55px;">
	  <div class="timer_box2">
	  <ul>
	  <li><p>Value<br/><span>&pound;<?php echo strip_tags($today_res['full_price']); ?></span></p></li>
	  <li><p>Discount <br/><span><?php echo intval($today_res['discounted_price']*100/$today_res['full_price']); ?>%</span></p></li>
	  <li style="border-right: 0;"><p>Saving<br/><span>&pound;<?php echo strip_tags($today_res['full_price'] - $today_res['discounted_price']); ?></span></p></li>
	  </ul>
	  </div>
	  </div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	<?php //if ($_GET['action'] == "view") { ?>
	  <div class="blue_box">
	  <div class="timer_box1">
	  <ul>
	  <li><img src="images/gift.gif" alt="" width="42" height="35" /></li>
	  <li><p><a id="gift" href="#giftdiv" >Buy it for a friend!</a></p></li>
	  </ul>
	  </div>
	  </div>
	<?php //} ?>

	<div style="display: none;">
		<div id="giftdiv" style="width:701px;height:px;overflow:auto; background-color: transparent;">
	<?php if (isset($_SESSION['user_id'])) {?>

	<form action="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>" name="frmgift" method="post">
		<div class="deal_recomm">
				<div class="top_recomm">
				<p>Buy it for a friend!</p>
				</div>
				<div class="clear"></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="clear"></div>
				<div class="recomm_mid">

				<div class="invita_deal">
				<div><p>Friend's name:</p></div>
				<div class="clear"></div>
				<div class="massage">
				<div class="massage_left"><input name="frndname" type="text" class="mailbox1"  style="width: 430px;"/></div>
				</div>
				</div>

				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>

				<div class="invita_deal">
				<div><p>Friend's email address:</p></div>
				<div class="clear"></div>
				<div class="massage">
				<div class="massage_left"><input name="frndemail" type="text" class="mailbox1" style="width: 430px;"/></div>
				</div>
				</div>

				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>

				<div class="invita_deal">
				<div><p>Your Message:</p></div>
				<div class="clear"></div>
				<div class="massage">
				<div class="massage_left"><textarea name="frndmsg" class="textarea2"></textarea></div>
				</div>
				</div>
				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
				<div style="width: auto; margin: 0 230px 0 0; float:right;">
					<input type="submit" name="Submit" class="tellbtn" value="Send as Gift"/>
					<!-- href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>&gift=gifting" -->
				</div>

				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>

				</div>
				<div class="clear"></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="recomm_bot"></div>
				</div>
		</form>
		<?php } else { ?>
		<div class="top_recomm">
			<p>Please login to Gift deals to friends.</p>
		</div>
		<div class="clear"></div>
		<div style="border-bottom: 3px solid #7fd7fb;"></div>
		<div class="recomm_bot"></div>
		<?php } ?>
		</div>
</div>




<?php if ($_GET['action'] != "sold") { ?>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	 <div class="blue_box">
	  <div><h3>Time left to buy this deal:</h3></div>

	<?php
	  if($today_res['date_diff'] != 0)
	  {
	  ?>
	  <div class="timer_box">

	  <?php
	$time1=explode("-",$today_res['deal_end_time']);
	$year=$time1[0];
	$month=$time1[1];
	$time2=explode(" ",$time1[2]);
	$day=$time2[0];
	$time4=explode(":",$time2[1]);
	$hour_deal=$time4[0];
	$minute_deal=$time4[1];
	$secon_deal=$time4[2];
	$time=$hour_deal.":".$minute_deal.":".$secon_deal;
	$last_deal_time=$month."/".$day."/".$year." ".$time;
	//echo $last_deal_time;
	//exit;

	$time_now=date("m/d/Y H:i:s");



	  ?>

	  <script language="javascript">
	  <?php
	  if($today_res['date_diff'] != 0)
	  {
	  ?>
	var cd<?php echo $today_res['deal_id'];?>a   = new countdown('cd<?php echo $today_res['deal_id'];?>a');
	cd<?php echo $today_res['deal_id'];?>a.Div   = "clock<?php echo $today_res['deal_id'];?>a";
	cd<?php echo $today_res['deal_id'];?>a.TargetDate = "<?php echo $last_deal_time;?>";
	cd<?php echo $today_res['deal_id'];?>a.CurDate  = "<?php echo $time_now;?>";
	cd<?php echo $today_res['deal_id'];?>a.DisplayFormat = "<span  style='margin: 0 0 0 5px;'>%%D%%</span>";
	<?php
	}
	?>

	var cd<?php echo $today_res['deal_id'];?>b			= new countdown('cd<?php echo $today_res['deal_id'];?>b');
	cd<?php echo $today_res['deal_id'];?>b.Div			= "clock<?php echo $today_res['deal_id'];?>b";
	cd<?php echo $today_res['deal_id'];?>b.TargetDate	= "<?php echo $last_deal_time;?>";
	cd<?php echo $today_res['deal_id'];?>b.CurDate		= "<?php echo $time_now;?>";
	cd<?php echo $today_res['deal_id'];?>b.DisplayFormat	= "<span  style='margin: 0 0 0 5px;'>%%H%%</span>";

	var cd<?php echo $today_res['deal_id'];?>c			= new countdown('cd<?php echo $today_res['deal_id'];?>c');
	cd<?php echo $today_res['deal_id'];?>c.Div			= "clock<?php echo $today_res['deal_id'];?>c";
	cd<?php echo $today_res['deal_id'];?>c.TargetDate	= "<?php echo $last_deal_time;?>";
	cd<?php echo $today_res['deal_id'];?>c.CurDate		= "<?php echo $time_now;?>";
	cd<?php echo $today_res['deal_id'];?>c.DisplayFormat	= "<span  style='margin: 0 0 0 5px;'>%%M%%</span>";

	var cd<?php echo $today_res['deal_id'];?>d			= new countdown('cd<?php echo $today_res['deal_id'];?>d');
	cd<?php echo $today_res['deal_id'];?>d.Div			= "clock<?php echo $today_res['deal_id'];?>d";
	cd<?php echo $today_res['deal_id'];?>d.TargetDate	= "<?php echo $last_deal_time;?>";
	cd<?php echo $today_res['deal_id'];?>d.CurDate		= "<?php echo $time_now;?>";
	cd<?php echo $today_res['deal_id'];?>d.DisplayFormat	= "<span  style='margin: 0 0 0 5px;'>%%S%%</span>";

</script>


	  <ul>
	  <?php
	  if($today_res['date_diff'] != 0)
	  {
	  ?>
		  <li class="hours"><p style="padding:5px 0 0 0;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>a"></span><br/><span>Days</span></p></li>
		<?php
		}
		?>
		  <li class="hours"><p style="padding:5px 0 0 0;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>b"></span><br/><span>Hrs.</span></p></li>
		  <li class="hours"><p style="padding:5px 0 0 0px;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>c"></span><br/><span>Min.</span></p></li>
		  <li class="hours"><p style="padding:5px 0 0 0px;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>d"></span><br/><span>Sec.</span></p></li>
	  </ul>



 <script language="javascript">
 <?php
	  if($today_res['date_diff'] != 0)
	  {
	  ?>
 				cd<?php echo $today_res['deal_id'];?>a.Setup();
				<?php
				}
				?>
				cd<?php echo $today_res['deal_id'];?>b.Setup();
				cd<?php echo $today_res['deal_id'];?>c.Setup();
				cd<?php echo $today_res['deal_id'];?>d.Setup();
			</script>

	  </div>
	<?php } else { ?>

	<div class="timer_box" style="background:url(images/timmer_bg2.png) 65% top no-repeat; width:188px;">

		  <?php



		$time1=explode("-",$today_res['deal_end_time']);
		$year=$time1[0];
		$month=$time1[1];
		$time2=explode(" ",$time1[2]);
		$day=$time2[0];
		$time4=explode(":",$time2[1]);
		$hour_deal=$time4[0];
		$minute_deal=$time4[1];
		$secon_deal=$time4[2];
		$time=$hour_deal.":".$minute_deal.":".$secon_deal;
		$last_deal_time=$month."/".$day."/".$year." ".$time;
		//echo $last_deal_time;
		//exit;

		$time_now=date("m/d/Y H:i:s");



		  ?>

		  <script language="javascript">

		var cd<?php echo $today_res['deal_id'];?>a   = new countdown('cd<?php echo $today_res['deal_id'];?>a');
		cd<?php echo $today_res['deal_id'];?>a.Div   = "clock<?php echo $today_res['deal_id'];?>a";
		cd<?php echo $today_res['deal_id'];?>a.TargetDate = "<?php echo $last_deal_time;?>";
		cd<?php echo $today_res['deal_id'];?>a.CurDate  = "<?php echo $time_now;?>";
		cd<?php echo $today_res['deal_id'];?>a.DisplayFormat = "<span  style='margin: 0 0 0 5px;'>%%D%%</span>";


		var cd<?php echo $today_res['deal_id'];?>b			= new countdown('cd<?php echo $today_res['deal_id'];?>b');
		cd<?php echo $today_res['deal_id'];?>b.Div			= "clock<?php echo $today_res['deal_id'];?>b";
		cd<?php echo $today_res['deal_id'];?>b.TargetDate	= "<?php echo $last_deal_time;?>";
		cd<?php echo $today_res['deal_id'];?>b.CurDate		= "<?php echo $time_now;?>";
		cd<?php echo $today_res['deal_id'];?>b.DisplayFormat	= "<span  style='margin: 0 0 0 5px;'>%%H%%</span>";

		var cd<?php echo $today_res['deal_id'];?>c			= new countdown('cd<?php echo $today_res['deal_id'];?>c');
		cd<?php echo $today_res['deal_id'];?>c.Div			= "clock<?php echo $today_res['deal_id'];?>c";
		cd<?php echo $today_res['deal_id'];?>c.TargetDate	= "<?php echo $last_deal_time;?>";
		cd<?php echo $today_res['deal_id'];?>c.CurDate		= "<?php echo $time_now;?>";
		cd<?php echo $today_res['deal_id'];?>c.DisplayFormat	= "<span  style='margin: 0 0 0 5px;'>%%M%%</span>";

		var cd<?php echo $today_res['deal_id'];?>d			= new countdown('cd<?php echo $today_res['deal_id'];?>d');
		cd<?php echo $today_res['deal_id'];?>d.Div			= "clock<?php echo $today_res['deal_id'];?>d";
		cd<?php echo $today_res['deal_id'];?>d.TargetDate	= "<?php echo $last_deal_time;?>";
		cd<?php echo $today_res['deal_id'];?>d.CurDate		= "<?php echo $time_now;?>";
		cd<?php echo $today_res['deal_id'];?>d.DisplayFormat	= "<span  style='margin: 0 0 0 5px;'>%%S%%</span>";

	</script>


		  <ul>

			  <li class="hours"><p style="padding:5px 0 0 0;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>b"></span><br/><span>Hrs.</span></p></li>
			  <li class="hours"><p style="padding:5px 0 0 30px;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>c"></span><br/><span>Min.</span></p></li>
			  <li class="hours"><p style="padding:5px 0 0 40px;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>d"></span><br/><span>Sec.</span></p></li>
		  </ul>



	 <script language="javascript">
	 <?php
		  if($today_res['date_diff'] != 0)
		  {
		  ?>
	 				cd<?php echo $today_res['deal_id'];?>a.Setup();
					<?php
					}
					?>
					cd<?php echo $today_res['deal_id'];?>b.Setup();
					cd<?php echo $today_res['deal_id'];?>c.Setup();
					cd<?php echo $today_res['deal_id'];?>d.Setup();
				</script>

		  </div>

	<?php } ?>
	  </div>
	  <?php } 	// action == view end?>

	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>

	  <div class="blue_box">
	<div class="brought" style="border-bottom:0px;">
   <div class="font24px" >
   	<?php if ($total_buy[0] >= $today_res['min_coupons']) {

   		if ($_GET['action'] != "sold") {
   			if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "1 Bought!";}
   		 	}
   		//if ($_GET['action'] == "sold") { echo "Deal Completed!";}
   	} else {
   		if ($_GET['action'] != "sold") {
   		if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "1 Bought!";}
   		 	}
   		//if ($_GET['action'] == "sold") { echo "Deal Completed!";}
   	}
   	?>
	  <?php /*if ($_GET['action'] != "sold") {
   			if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";}
   		 	}*/
   		if ($_GET['action'] == "sold") { echo "Deal Completed!";}

   		?>
<style type="text/css">

.ui-progressbar { height:6px; text-align: left; overflow: hidden; width: 100%;}
.ui-progressbar {margin: -1px; height:100%;
	/*background: url(images/redAerrow.png) center left no-repeat !important;*/
}
.ui-widget-content {
    border: 1px solid #c3c3c3;
    color: #222222;
    padding: 3px;
}
.ui-progressbar-value{
	border: 1px solid #9a9347 !important;
	background: #edeb6e !important;
	margin: -1px; height:100%;
	/* url(images/redAerrow.png) center right no-repeat  */
}
.timer_icon{
	background: url(images/timer_icon.png ) center center no-repeat;
	width: 18px;
	height: 31px;
	position: absolute;
	margin: -8px 0 0 190px;
}
</style>


   </div>
	<div>
	<ul>
	<li><?php if ($_GET['action'] != "sold") { ?><img src="images/icon_tick.png" alt="" width="30" height="28" style="margin: 0px -15px 0 15px; float:left;"/>&nbsp;&nbsp;&nbsp;&nbsp; Deal is on!<?php } ?></li>
	<li style="padding: 0 0 0 0;">


		<?php if ($total_buy[0] < $today_res['min_coupons']) {
			//if ($_GET['action'] != "sold") {
			?>

			<!--
				<script>
				$(function() {
					$( "#progressbar" ).progressbar({
						value: <?php if ($total_buy[0] != 0) {echo $total_buy[0]; } else {echo '0';} ?>,
						max: <?php echo $today_res['max_coupons']; ?>
					});
				});
			</script>
			<?php echo intval($today_res['min_coupons'] - $total_buy[0]) ; ?> More deals need to buy to active the deal
			<div class="demo" style="width:87%;">
                <div class="timer_icon"></div>
				<div id="progressbar" style="height:8px;"></div>
	             <div class="main_box" style="width:200px;">
                	 <p style="float:left; font:bold 14px/28px Tahoma,Arial,Helvetica,sans-serif; color:#414141; padding:0px;"><?php echo $today_res['min_coupons']; ?></p>
                    <p style="float:right; font:bold 14px/28px Tahoma,Arial,Helvetica,sans-serif; color:#414141; padding:0 12px 0 0;"><?php echo $today_res['max_coupons']; ?></p>
                 <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
                </div>

			</div><!-- End progressbar -->

			<?php
		//	}
			if ($_GET['action'] == "sold") {
		 	if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";}
			}
		} else {
			//if ($_GET['action'] != "sold") { echo 'Deal is on!';}
			if ($_GET['action'] == "sold") {
		 	if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";}
		}
   		?>

   		<?php /*if ($_GET['action'] != "sold") { echo "Deal is on!";}
			if ($_GET['action'] == "sold") {
		 	if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";} */
 		} ?>

	</li>
	</ul>
	</div>
     </div>
	  </div>
	   <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>


	  <div class="blue_box">
	  <div class="font_11">Share with friends!</div>
	<div class="timer_box3" style="border-bottom:0px;">
	<ul>
	<li><img src="images/email.png" alt="" width="18" height="18" /></li>
	<li><a id="various2" href="#inline1">Email</a></li>
	<!-- <li><img src="images/facebook.png" alt="" width="19" height="18" /></li> -->
	<li><a name="fb_share" type="icon_link">Facebook</a>
		<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share"
		        type="text/javascript">
		</script>
	</li>
	<!-- <li><img src="images/twitter.png" alt="" width="19" height="18" /></li> -->
	<li>
		<a href="https://twitter.com/share" class="twitter-share-button" data-text="Twitter" data-via="unifiedinfotech" data-count="none"></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</li>
	</ul>
     </div>
	  </div>
 	<?php if ($_GET['action'] == "sold") { ?>
 	<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	<div style="float: none; margin: 0 13px; width: 229px;"><a href="#"><img src="images/sold_btn.gif" alt="" width="229" height="96" border="0" /></a></div>
	  <?php } ?>
	  </div>
	  <div class="box683_right">
  <div><img src="<?php echo UPLOAD_PATH.$todays_image['file']; ?>" alt="" width="439" height="293" /></div>
  <div class="highlights">
		<?php if ($_GET['action'] != "sold") { ?><a href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>"><?php } ?><h1><?php echo strip_tags($today_res['title']); ?></h1><?php if ($_GET['action'] != "sold") { ?></a><?php } ?>

    <!--
    	<div style="width:200px; float: left; margin: 0 auto;">
     <?php //echo $today_res['highlights']; ?>

    </div>
    <div style="width:196px; float: right; margin: 0 auto;">

     <?php //echo $today_res['fineprint']; ?>

    </div>

     -->
  </div>
  <div>&nbsp;</div>
  <div class="main_box">
  	 <ul style="float:left; width:49%;">
     	<li style="padding:5px 0;"><img src="images/txt_01.gif" alt="" /></li>
        <li style="padding:5px 0;"><img src="images/txt_02.gif" alt="" /></li>
     </ul>
      <ul style="float:right; width:49%;">
     	<li style="padding:5px 0;"><img src="images/txt_03.gif" alt="" /></li>
        <li style="padding:5px 0;"><img src="images/txt_04.gif" alt="" /></li>
     </ul>
  </div>
</div>
</div>

<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
</div>
<?php
}
else
{
	echo '<div class="midbg" style="text-align:center; padding:20px;"><h3><br>There is no National Deal right now! <br><br>Please visit later. Thanks<br></h3></div>';
}
?>
<div class="botbg">

<div style="width: 200px;  height: auto; margin: 5px 0 0 15px ; z-index: 1000; float: right;">

<div style="float: right; width: 80px; display:inline-block; margin-right: 10px;">
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<a href="https://twitter.com/share" class="twitter-share-button"
	data-via="santanu_patra" data-lang="en" data-related="santanu_patra"
	data-hashtags="santanu_patra">Tweet</a>
</div>

<div  id='fb-root' style="float:right; margin-right: 0; width: 80px; height: 20px;">
<b:if cond='data:blog.pageType == "item"'>
<script>
window.fbAsyncInit = function() {
FB.init({appId: '197123393709565', status: true, cookie: true,
xfbml: true});
};
(function() {
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol +
'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);
}());
</script>

<fb:like action='like' colorscheme='light' expr:href='data:Post.url'
layout='button_count' show_faces='true' width='80'/>
</b:if>
</div>


<div class="clear"></div>
</div>

</div>
</div>
<div class="clear"></div>

<?php if($no_of_deal > 0) { ?>
<div id="dealbg_bot">

			<script type="text/javascript" language="javascript">
	<!--
		function show_tab(ID)
		{
			for(i=1; i<=5; i++)
			{
				document.getElementById("myaccount_"+i).style.display = "none";
				/*document.getElementById("tab_"+i).style.backgroundPosition = "";
				document.getElementById("stab_"+i).style.backgroundPosition = "";
				document.getElementById("stab_"+i).style.color = "";
				document.getElementById("tab_"+i).style.color = "";*/
				$('#tab_'+i).removeClass('here');
				/*if (i == 2) {
					document.getElementById("myaccount_"+i+"_b").style.display = "none";
					}*/

			}
			document.getElementById("myaccount_"+ID).style.display = "block";
			/*document.getElementById("tab_"+ID).style.backgroundPosition = "0% -29px";
			document.getElementById("stab_"+ID).style.backgroundPosition = "100% -29px";
			document.getElementById("tab_"+ID).style.color = "#000";
			document.getElementById("stab_"+ID).style.color = "#000";*/

			$('#tab_'+ID).addClass('here');

			/*if (ID == 2) {
				document.getElementById("myaccount_"+ID+"_b").style.display = "block";
				}*/

		}

		//-->
	</script>




<div style="width:685px; float: left; margin: 0  0 0 8px;">

   	<div class="tabs">
		<a href="javascript: show_tab(1);" id="tab_1" style="text-decoration: none; margin-right: 32px;">Deal information</a>
		<a href="javascript: show_tab(2);" id="tab_2" style="text-decoration: none; margin-right: 32px;">Highlights</a>
		<a href="javascript: show_tab(3);" id="tab_3" style="text-decoration: none; margin-right: 32px;">Fine Prints</a>
		<a href="javascript: show_tab(4);" id="tab_4" style="text-decoration: none; margin-right: 32px;">Company</a>
		<a href="javascript: show_tab(5);" id="tab_5" style="text-decoration: none; margin-left: 10px;">Postage</a>
		<!-- <a href="javascript: show_tab(6);" id="tab_6">Temp</a> -->

    </div>

    <!--<div class="TabbedPanels">
      <ul>
        <li><a href="javascript: show_tab(1);" id="tab_1">My Order</a></li>
        <li><a href="javascript: show_tab(2);" id="tab_2">My Credit</a></li>
        <li><a href="javascript: show_tab(3);" id="tab_3">General</a></li>
        <li><a href="javascript: show_tab(4);" id="tab_4">Security</a></li>
        <li><a href="javascript: show_tab(5);" id="tab_5">Subscriptions</a></li>
       </ul>
	 </div>-->

    <div class="TabbedPanels1 dealbg_right" id="myaccount_1">
		<?php echo $today_res['offer_details']; ?>
    </div>	<!-- 1 ends here  -->

	<div class="TabbedPanels1 dealbg_right" id="myaccount_2" style="display:none;">
		<?php echo $today_res['highlights']; ?>
    </div><!-- 2 ends here  -->


	<div class="TabbedPanels1 dealbg_right" id="myaccount_3" style="display:none;">
		<?php echo $today_res['fineprint']; ?>
	</div>
	<!-- 3 ends here  -->


	<div class="TabbedPanels1 dealbg_right" id="myaccount_4" style="display:none;">
		<?php echo $today_res['offer_details_sidebar']; ?>
	</div>
	<!-- 4 ends here  -->

	<div class="TabbedPanels1 dealbg_right" id="myaccount_5" style="display:none;">
		5

	</div>
	<!-- 5 ends here  -->

	<div class="TabbedPanels1 dealbg_right" id="myaccount_6" style="display:none;">
		6
	</div><!-- 6 ends here  -->

	<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="40"/></div>

  </div>

	<!--
		<div class="dealbg_left">

		 <?php echo $today_res['offer_details']; ?>


		<br/><br/>
		</div>
		<div class="dealbg_right">
		<div> -->
		<!--<?php echo $today_res['offer_details_sidebar']; ?>
		<div>If you have any question then please don't hesitate to ask GetDeala now.</div>
		<div style="margin: 10px auto;"><a href="#"><img src="images/askme.gif" alt="" width="173" height="36" border="0" /></a></div>
		-->
	<!--	</div>
		<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="40"/></div>
		</div>

	 -->
</div>
<?php } ?>
</div>


<?php include ('include/sidebar.php'); ?>

<?php include ('include/footer.php'); ?>