<?php include("include/header.php");?>


<?php
error_reporting(E_ERROR && E_STRICT);
?>

<script src="js/countdown.js" type="text/javascript" charset="utf-8"></script>


<?php

 //echo $_COOKIE['subscribe'];

?>
	
<div class="topbg">
<ul>
<li><p><strong>DEAL INFORMATION</strong></p></li>
<li><img src="images/spacer.gif" alt="" width="160" height="1" /></li>
<li>Recommend This Deal By:</li>
<li><img src="images/email.png" alt="" width="19" height="18" /></li>
<li><a href="#">Email</a></li>
<li><img src="images/facebook.png" alt="" width="19" height="18" /></li>
<li><a href="#">Facebook</a></li>
<li><img src="images/twitter.png" alt="" width="19" height="18" /></li>
<li><a href="#">Twitter</a></li>
</ul>
</div>

<div class="clear"></div>

<div class="midbg">

<?php 
// best_deal treated as National Deal here.
//if ($_GET['nd'] != "") {
	$deal_id = $_GET['nd'];
	
	$sql_today = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND best_deal = 'y' LIMIT 0, 1";
	$today_res = mysql_fetch_array(mysql_query($sql_today));
	
	$sql_todays_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$today_res['deal_id'];
	$total_buy = mysql_fetch_array(mysql_query($sql_todays_buy));
	
	$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
	$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));
	
//}

?>

<div class="today_deal">

	  <div style="height: auto;"><?php if ($_GET['action'] != "sold") { ?><a href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>"><?php } ?><h1><?php echo strip_tags($today_res['title']); ?></h1><?php if ($_GET['action'] != "sold") { ?></a><?php } ?></div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="1" /></div>
	  <div class="<?php if ($_GET['action'] == "sold") { echo "tab_button1"; } else {echo "tab_button"; } ?>"><span>&pound;<?php echo strip_tags($today_res['discounted_price']); ?></span><a href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>"><?php if ($_GET['action'] != "sold") { ?><span class="tab_buy">&nbsp;&nbsp;&nbsp;</span><?php } ?></a></div>
	  <div class="deal_left">
	  <div class="blue_box">
	  <div class="timer_box2">
	  <ul>
	  <li><p>Value<br/><span>&pound;<?php echo strip_tags($today_res['full_price']); ?></span></p></li>
	  <li><p>Discount <br/><span><?php echo intval($today_res['discounted_price']*100/$today_res['full_price']); ?>%</span></p></li>
	  <li style="border-right: 0;"><p>Saving<br/><span>&pound;<?php echo strip_tags($today_res['full_price'] - $today_res['discounted_price']); ?></span></p></li>
	  </ul>
	  </div>
	  </div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	<?php if ($_GET['action'] == "view") { ?>
	  <div class="blue_box">
	  <div class="timer_box1">	  
	  <ul>	  
	  <li><img src="images/gift.gif" alt="" width="42" height="35" /></li>		  
	  <li><p>Buy it for a friend!</p></li>
	  </ul>	
	  </div> 
	  </div>
	<?php } ?>
	  
<?php if ($_GET['action'] != "sold") { ?>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	  <div class="blue_box">
	  <div><h3>Time left to buy this deal:</h3></div>
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
		  <li class="hours"><p style="padding:5px 0 0 0px;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>c"></span><br/><span>Min.</span></p></li>
		  <li class="hours"><p style="padding:5px 0 0 0px;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>d"></span><br/><span>Sec.</span></p></li>
	  </ul>
		


 <script language="javascript">
				cd<?php echo $today_res['deal_id'];?>b.Setup();
				cd<?php echo $today_res['deal_id'];?>c.Setup();
				cd<?php echo $today_res['deal_id'];?>d.Setup();
			</script>	

	  </div> 

	  </div>
	  <?php } 	// action == view end?>

	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	  
	  <div class="blue_box">	
	<div class="brought" style="border-bottom:0px;">
   <div class="font24px" >
   	<?php if ($total_buy[0] >= $today_res['min_coupons']) {
   		
   		if ($_GET['action'] != "sold") { 
   			if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";}
   		 	} 
   		if ($_GET['action'] == "sold") { echo "Deal Completed!";}
   	} else {
   		if ($_GET['action'] != "sold") { 
   		if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";}
   		 	}
   		//if ($_GET['action'] == "sold") { echo "Deal Completed!";}
   	}
   	?>
	  <?php /*if ($_GET['action'] != "sold") { 
   			if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";}
   		 	} 
   		if ($_GET['action'] == "sold") { echo "Deal Completed!";}*/
 
   		?>
   		
   </div>
	<div>
	<ul>
	<li><?php if (!($total_buy[0] < $today_res['min_coupons']) && $_GET['action'] != "sold") { ?><img src="images/icon_tick.png" alt="" width="30" height="28" style="margin: 0px -15px 0 15px; float:left;"/><?php } ?></li>
	<li style="padding: 10px 0 0 4px;">
		<?php if ($total_buy[0] < $today_res['min_coupons']) { 
			if ($_GET['action'] != "sold") { echo abs($total_buy[0] - $today_res['min_coupons'])." more needed for the deal to be activated";}
			//if ($_GET['action'] == "sold") { 
		 	//if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";} 
			//}
		} else {
			if ($_GET['action'] != "sold") { echo "Deal is on!";}
			if ($_GET['action'] == "sold") { 
		 	//if($total_buy[0] != 0) {echo $total_buy[0].' Bought!';} else {echo "Not Yet Bought!";} 
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
	<li><a href="#">Email</a></li>
	<li><img src="images/facebook.png" alt="" width="18" height="18" /></li>
	<li><a href="#">Facebook</a></li>
	<li><img src="images/twitter.png" alt="" width="18" height="18" /></li>
	<li><a href="#">Twitter</a></li>
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
  	
    <div style="width:200px; float: left; margin: 0 auto;">
     <?php echo $today_res['highlights']; ?>
     
    </div>
    <div style="width:196px; float: right; margin: 0 auto;">
    
     <?php echo $today_res['fineprint']; ?>
     
    </div>
  </div>
</div>
</div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
</div>

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
<div id="dealbg_bot">
<div class="dealbg_left">

 <?php echo $today_res['offer_details']; ?>


<br/><br/>
</div>
<div class="dealbg_right">
<div>
<?php echo $today_res['offer_details_sidebar']; ?>
<!--<div>If you have any question then please don't hesitate to ask GetDeala now.</div>
<div style="margin: 10px auto;"><a href="#"><img src="images/askme.gif" alt="" width="173" height="36" border="0" /></a></div>
-->
</div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="40"/></div>
</div>
</div>
</div>


<?php include ('include/sidebar.php'); ?>

<?php include ('include/footer.php'); ?>