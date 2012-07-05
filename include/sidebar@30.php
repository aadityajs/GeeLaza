<div id="rightcol">
<div class="rightbox1">
<div class="curtop_bg">
<p>Make somebody happy!</p>
</div>
<div class="clear"></div>
<div class="curmid_bg"><img src="images/gift_box.gif" alt="" width="228" height="96" hspace="2" vspace="2" /></div>
<div class="curbot_bg"></div>
</div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
<div class="rightbox1">
<div class="curtop_bg">
<p>Grow your business</p>
</div>
<div class="clear"></div>
<div class="curmid_bg">
<div style="width: 230px; margin: 5px auto; float: none;">
<div style="width: 80px; margin: 0 auto; float: left;"><img src="images/pic.gif" vspace="2" hspace="2" alt="" width="76" height="90"/></div>
<div style="width: 140px; margin: 0 auto; float: right;"><p class="text11">Learn how GeeLaza can bring hundreds of new customers to your business.</p></div>
</div>
<div style="margin: 0 auto; float:left;"><a href="#">See more information</a></div>
</div>
<div class="curbot_bg"></div>
</div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>

<?php 
$sql_national_deal = "SELECT * FROM ".TABLE_DEALS." WHERE status = 1 AND best_deal = 'y' LIMIT 0, 1";
$national_res = mysql_fetch_array(mysql_query($sql_national_deal));
$qr = mysql_query($sql_national_deal);
$rows = mysql_num_rows($qr);
$sql_national_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$national_res['deal_id'];
$national_image = mysql_fetch_array(mysql_query($sql_national_image));
if ($rows != 0) {
?>
<div class="rightbox">
<div class="headingbg">
<p>National deal</p>
</div>



<div class="clear"></div>
<div style="padding: 10px 10px;"><span><a href="<?php echo SITE_URL."index.php?action=view&id=".$national_res['deal_id'];?>"><?php echo $national_res['title']; ?></a></span></div>
<div class="clear"></div>
<div style="width: 230px; margin: 5px auto; float: none;">
<div class="left_green">
<p>&pound;<?php echo $national_res['discounted_price']; ?></p>
<span style="text-align:center;">instead of<br/>
&pound;<?php echo $national_res['full_price']; ?></span>
</div>
<div style="width: 110px; margin: 0 6px; float: right;"><img src="<?php echo UPLOAD_PATH.$national_image['file']; ?>" alt="" width="106" height="70" class="border"/></div>
</div>
<div class="clear"></div>
<div><a href="<?php echo SITE_URL."index.php?action=view&id=".$national_res['deal_id'];?>"><span><img src="images/view_btn.gif" alt="" border="0" width="82" height="21"/></span></a></div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
</div>
<?php } ?>

<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
<div class="rightbox">
<div class="headingbg">
<p>More amazing deals</p>
</div>
<div class="clear"></div>
<!--
Other deals starts
-->

<?php 

$sql_today = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_end_time LIKE '".date("Y-m-d")."%' OR deal_end_time < '".date("Y-m-d H:i:s")."' ORDER BY deal_id desc LIMIT 0, 6";
//$today_res = mysql_fetch_array(mysql_query($sql_today));
$q=mysql_query($sql_today);
$c = 0;
while ( $today_res = mysql_fetch_array($q)) {
$c++;
//$num_rows = mysql_num_rows(mysql_query($sql_today)) ;

//if ($num_rows > 0) {


$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));
//}
?>

<div class="viewbox">
 <div style="padding: 10px 4px;"><span style="float: left; margin: 0 auto;"><!--<img src="images/star0<?php echo $c; ?>.gif" alt="" width="45" height="44" />--></span>
 	<span style="float: right; margin: 4px auto;"><a href="<?php echo SITE_URL."index.php?action=view&id=".$today_res['deal_id'];?>"><?php echo strip_tags($today_res['title']); ?></a></span>
 </div>
  <div class="clear"></div>
  <div style="width: 230px; margin: 5px auto; float: none;">
    <div class="left_green">
      <p>&pound;<?php echo strip_tags($today_res['discounted_price']); ?></p>
      <span style="text-align:center;">instead of<br/>
        &pound;<?php echo strip_tags($today_res['full_price']); ?></span> </div>
    <div style="width: 110px; margin: 0 6px; float: right;"><img src="<?php echo UPLOAD_PATH.$todays_image['file']; ?>" alt="" width="106" height="70" class="border"/></div>
  </div>
  <div class="clear"></div>
  <div><a href="<?php echo SITE_URL."index.php?action=view&id=".$today_res['deal_id'];?>"><img src="images/view_btn.gif" alt="" border="0" width="82" height="21" /></a></div>
  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
</div>

<?php } ?>



</div>

<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
<div class="rightbox1">
<div class="greentop_bg">
<p>GeeLaza UK custome services</p>
</div>
<div class="clear"></div>
<div class="greenmid_bg">
<div style="width: 220px; margin: 8px 8px; float: none;">
<span>If you have any issues/queries please get in touch with us and we will respond to you as soon as possible.</span>
</div>
<div style="width: 220px; margin: 0 auto; float: none;"><a href="#"><img alt="" src="images/email.png" align="top">&nbsp;Contact Now</a></div>
</div>
<div class="greenbot_bg"></div>
</div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>

<!-- 


<div class="rightbox1">
<div class="curtop_bg">
<p>Enjoy with friends</p>
</div>
<div class="clear"></div>
<div class="curmid_bg">
<div style="padding: 10px 10px;"><span>If you have any issues/queries please get in touch with us and we will respond to you as soon as possible.</span></div>
<div class="clear"></div>


<?php

	   	$cookie = get_facebook_cookie('192309027517422', '7f1eb32e301277d025d35b77b06dd863');
	   	if ($cookie) {
		$user = json_decode(file_get_contents('https://graph.facebook.com/me?access_token=' .$cookie['access_token']));
	   //var_dump($user);
	   //echo '<pre>'.print_r($user,true).'</pre>';
	   
	 				/*echo $user->name;
      				echo $user->first_name;
      				echo $user->last_name;
      				echo $user->gender;
      				echo $user->timezone;
      				echo $user->location->name;	
	  				echo $user->email;
	  				echo $user->hometown->name;*/
	   
	   			$city = reset(explode(",", $user->location->name));
	   			$country = end(explode(",", $user->location->name));
	   			$add1 = reset(explode(",", $user->hometown->name));
				$date = date('Y-m-d');
				
	  	 	
			$sql_chk_fb_user = "SELECT * FROM ".TABLE_USERS." WHERE email = '".$user->email."'";
			$chk_fb_user_res = mysql_query($sql_chk_fb_user);
			$count_fb_user = mysql_num_rows($chk_fb_user_res);

			if($count_fb_user <= 0)		//  Register & login via fb
			{
				$sql_insert_fb = "INSERT INTO ".TABLE_USERS.
						  "(first_name,last_name,email,address1,country,city,date_added) VALUES('".$user->first_name."','".$user->last_name."','".$user->email."','".$add1."','".$country."','".$city."','".$date."')";
			
				mysql_query($sql_insert_fb);
				
				$sql_select_fb = "SELECT * FROM ".TABLE_USERS." WHERE email = '".$user->email."'";
				$result_select_fb = mysql_query($sql_select_fb);
				$count_select_fb = mysql_num_rows($result_select_fb);
				
				if($count_select_fb >0) {
					$row_select_fb = mysql_fetch_array($result_select_fb);
					$user_id = $result_select_fb["user_id"];
					$_SESSION["user_id"] = $user_id;
					//header('Location: '.SITE_URL.'customer-account.php');
				}
		
			}		//  Register & login via fb End
			else {
				$sql_select_fb = "SELECT * FROM ".TABLE_USERS." WHERE email = '".$user->email."'";
				$result_select_fb = mysql_query($sql_select_fb);
				$count_select_fb = mysql_num_rows($result_select_fb);
				
				if($count_select_fb >0) {
					$row_select_fb = mysql_fetch_array($result_select_fb);
					$user_id = $result_select_fb["user_id"];
					$_SESSION["user_id"] = $user_id;
					$_SESSION['fbuser'] = TRUE;
					//header('Location: '.SITE_URL.'customer-account.php');
				}
				
			}
	   				
		
			
	   			
		
	   	}
?>
<div style="width: 220px; height: 22px; padding-left: 10px;">
<?php if ($cookie) { ?>
<!--<div><a href="#"><img src="images/login.gif" border="0" alt="" width="70" height="21" /></a></div>-->
<fb:login-button perms="email" autologoutlink="true" onlogin="window.location.reload()"></fb:login-button>
<?php unset($_SESSION['fbuser']); ?>
<?php } else { ?>
<fb:login-button perms="email" autologoutlink="true">Login with facebook</fb:login-button> 
<?php //header("location:".SITE_URL."customer-account.php"); ?>
<?php } ?>
</div>
</div>
<div class="curbot_bg"></div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
</div>

 -->

<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
<div class="rightbox1">
<div class="curtop_bg">
<p style="font-size: 15px;">Check GeeLaza with friends</p>
</div>
<div class="clear"></div>
<div class="curmid_bg">
<div style="padding: 10px 10px;">
<img src="images/facebook_box.jpg" alt="" width="202" height="303" />
<span class="black_text" style="color:#3A3B3D;"><img alt="" src="images/twitter.png" align="top">&nbsp;<b>Follow GeeLaza UK on Twitter</b></span>
</div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
</div>
</div>
<div class="curbot_bg"></div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
<div class="rightbox">
<div><!--<img src="images/getlaza.gif" alt="" width="232" height="146" />--></div>
</div>

<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
