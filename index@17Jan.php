<?php
include("include/header.php");
error_reporting(E_ERROR && E_STRICT);

?>
<?php 
/*if ($_GET['recommend'] == "import") {
echo '
<script type="text/javascript">
    $(document).ready(function() {
        $("#various1").fancybox({
			\'titlePosition\'		: \'inside\',
			\'transitionIn\'		: \'none\',
			\'transitionOut\'		: \'none\'
		}).trigger(\'click\');
    });
</script>
';
}*/
?>

<?php
	if(!isset($_COOKIE["subscribe"]))
	//header("location:index.php");
	
	{
		$cookie_val = $_COOKIE["subscribe"];
		$arr = explode("|",$cookie_val);
		
		$email = $arr[0];
		$city_id = $arr[1];
	}

?>
<?php 
	if(strtolower($_SERVER['REQUEST_METHOD'])=='post' && $_POST['email_subs_btn'] == "SUBSCRIBE")
{
	$cookie_val = $_COOKIE["subscribe"];
	$arr = explode("|",$cookie_val);
	$email = $arr[0];
	$city_id = $arr[1];
	
	$date = date('Y-m-d');
	$sql_subscription = "INSERT INTO ".TABLE_NEWSLETTERS."(email,city,status) VALUES('".$email."','".$city_id."','1','".$date."')";
	mysql_query($sql_subscription);
	
	header('location:index.php?city='.$city_id);
}

?>

<style>
/*======LightBox CSS=====================*/
.LB-black-overlay { 
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 1780px;
	background-color: black;
	z-index: 1001;
	-moz-opacity: 0.8;
	opacity: .80;
	filter: alpha(opacity = 80);
	overflow: hidden;
}

.LB-white-content { 
	display: none;
	position: absolute;
	top: 10%;
	left: 23%;
	width: 50%;
	height: auto;
	padding: 16px;
	border: 0px solid #fff;
	background-color: white;
	z-index: 1002;
	overflow: auto;
}

a#close {
	height: 30px;
	width: 30px;
	position: absolute;
	top: 3px;
	left: 93.5%;
	background: url(../images/close.png) 0 0;
}

a#close:hover {
	background: url(../images/close.png) 0 -30px;
}

#connectBox h1 {
	float: left;
	width: 302px;
	margin: 0 0 0 0;
}

#connectBox h1 a {
	display: block;
	height: 253px;
	margin: 0;
	text-indent: -2001em;
	z-index: 1001;
	background: url('../images/connect.gif') center center no-repeat;
}

#connectBox h1 a:hover {
	cursor: pointer;
}

a#close {
	height: 30px;
	width: 30px;
	position: absolute;
	top: 3px;
	left: 93.5%;
	background: url(../images/close.png) 0 0;
}

.popup_box {
	width: 90%;
	height: auto;
	padding: 15px 0;
}

.popup_box td {
	font: normal 12px/26px Arial, Helvetica, sans-serif;
	text-align: left;
}

.popup_box input {
	width: 300px;
	height: 24px;
	font: normal 12px/24px Arial, Helvetica, sans-serif;
	color: #333;
	border: #ebebeb;
	padding: 0 0 0 4px;
	margin: 2px 0;
	border: 1px solid #444444;
}
</style>

<script>
function validate()
{
	
	
		var getSelectedIndex = document.select_city.city.selectedIndex;	
		var city_val = document.select_city.city[getSelectedIndex].value;
		var email_val =document.getElementById("email").value;

		
		if (email_val == '')
		{
			
			document.getElementById('email_check').innerHTML = '<label style="color:red;font-weight:bold; align: left;">Please enter email ID</label>';
			validation = 1;
			return false;
		}
		else if (city_val == '') {
			document.getElementById('city_check').innerHTML = '<label style="color:red;font-weight:bold;">Please select a city</label>';
			validation = 1;
			return false;
		}
		
	
	
}
function getSubscribeValues(id)
{
	var city_id;
	var email;
	var cookieValue;
	if(id=='city_submit')
	{
		var getSelectedIndex = document.select_city.city.selectedIndex;	
		city_id = document.select_city.city[getSelectedIndex].value;
		setCookie("subscribe",city_id,20);
	}
	
	if(id=='subscribe_email')
	{
		email = document.getElementById("email").value;
		var value = getCookie("subscribe");
		cookieValue = email+'|'+value;
		setCookie("subscribe",cookieValue,20);
	}
	
	
}
/* ---------------- Create cookie and set cookie ---------------------------- */
function setCookie(cookieName,cookieValue,nDays) 
{
	var today = new Date();
	var expire = new Date();
	if (nDays==null || nDays==0) nDays=1;
	expire.setTime(today.getTime() + 3600000*24*nDays);
	document.cookie = cookieName+"="+escape(cookieValue) + ";expires="+expire.toGMTString();
}
function getCookie (name) 
{
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	while (i < clen) 
	{
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg) 
		{
			return getCookieVal (j);
		}
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0) break; 
	}
	return null;
}
function getCookieVal (offset) 
{
  var endstr = document.cookie.indexOf (";", offset);
  if (endstr == -1) { endstr = document.cookie.length; }
  return unescape(document.cookie.substring(offset, endstr));
}
/* --------------------------------------------------- */

</script>
<script>
var validation =0;
$(document).ready(function() {

	$('a.panel').click(function () {

		$('a.panel').removeClass('selected');
		$(this).addClass('selected');
		
		current = $(this);

		if(validation==0)
		{
			$('#subcribewrapper').scrollTo($(this).attr('href'), 1000);		
		}
		
		return false;
	});

	$(window).resize(function () {
		resizePanel();
	});
	
});

function resizePanel() {

	width = $(window).width();
	height = $(window).height();

	mask_width = width * $('.item').length;
		
	$('#debug').html(width  + ' ' + height + ' ' + mask_width);
		
	$('#subcribewrapper, .item').css({width: width, height: height});
	$('#mask').css({width: mask_width, height: height});
	$('#wrapper').scrollTo($('a.selected').attr('href'), 0);
		
}

</script>
<div id="fade" class="LB-black-overlay" onclick="if (!is_modal) HideLightBox(); return false;"></div>


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
<li><a id="various1" href="#inline1">Email</a></li>
<li><img src="images/facebook.png" alt="" width="19" height="18" /></li>
<li><a href="#">Facebook</a></li>
<li><img src="images/twitter.png" alt="" width="19" height="18" /></li>
<li><a href="#">Twitter</a></li>
</ul>
</div>

<div style="display: none;">
		<div id="inline1" style="width:701px;height:px;overflow:auto; background-color: transparent;">
			<?php if (isset($_SESSION['user_id'])) { ?>
				<div class="deal_recomm">
				<div class="top_recomm">
				<p>Recommend now and get credits</p>
				</div>
				<div class="clear"></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="clear"></div>
				<div class="recomm_mid">
		
		<?php 
				if (isset($_POST['RecomendSubmit']) && $_POST['RecomendSubmit'] == "Tell them") {
					$fmsg = $_POST['fmsg'];
					$femail = $_POST['femail'];
					$sub = "GeeLaza Recomendation for you";
					$headers = "From: GeeLaza.com";
					
					@mail($femail, $sub, $fmsg, $headers);
					header('location: recom_thanks.php');
				}
			
			?>
				
		<form action="" name="" method="post" onsubmit="validateRecom();">
				<div class="invita_deal">
				<div><p>Your invitation message:</p><div class="error" id="msgErr"></div></div>
				<div class="clear"></div>
				
				<div class="massage">
				
				<div class="massage_left"><textarea name="fmsg" id="fmsg" class="textarea2"></textarea></div>
				<div class="massage_right">
				<div><img src="images/dollar.jpg" alt="" width="168" height="108" /></div>
				<div>
				<ul>
				<li style="float:left; width: 16px; margin: 0 auto;"><img src="images/question1.gif" alt="" width="14" height="13"/></li>
				<li style="float: right; width: 162px; margin: 0 auto;">You'll be credited £5 on every successfull recommendation</li>
				</ul>
				</div>
				</div>
				</div>
				</div>
				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="clear"></div>
				<div class="invita_deal">
				<div>
				<p class="red">Please type your families, friends email address below<span style="padding: 0 6px; margin:0;"><img src="images/question1.gif" alt="" width="14" height="13"/></span></p>
					<span>(separate email address with comma or semicolon)</span>
					<div class="error" id="emailErr"></div>
				</div>
				<div class="clear"></div>
				<div class="massage">
				<div style="float:left; width: auto; margin: 0 auto;">
					<input type="text" name="femail" id="femail" value="<?php if ($_SESSION['recomEmails']) echo $_SESSION['recomEmails']; unset($_SESSION['recomEmails']); ?>	" class="mailbox"/>
					<input type="submit" name="RecomendSubmit" class="tellbtn" value="Tell them"/>
				</div>
		</form>
				</div>
				</div>
			
			
				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="clear"></div>
	<?php 
	
	include('OpenInviter/openinviter.php');
	$inviter=new OpenInviter();
	$oi_services=$inviter->getPlugins();
	
	if (isset($_POST['provider_box'])) 
	{
		if (isset($oi_services['email'][$_POST['provider_box']])) $plugType='email';
		elseif (isset($oi_services['social'][$_POST['provider_box']])) $plugType='social';
		else $plugType='';
	}
	else $plugType='';
	function ers($ers)
		{
		if (!empty($ers))
			{
			foreach ($ers as $key=>$error)
				$contents="{$error}";
			return $contents;
			}
		}
		
	function oks($oks)
		{
		if (!empty($oks))
			{
			foreach ($oks as $key=>$msg)
				$contents="{$msg}";
			return $contents;
			}
		}
		
		
	if (!empty($_POST['step'])) {$step=$_POST['step']; }
	else {$step='get_contacts';}
	
	
	$ers=array();$oks=array();$import_ok=false;$done=false;
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['step'] == "get_contacts")
		{
		if ($step=='get_contacts')
			{
			if (empty($_POST['email_box']))
				$ers['email']="Email missing !";
			if (empty($_POST['password_box']))
				$ers['password']="Password missing !";
			if (empty($_POST['provider_box']))
				$ers['provider']="Provider missing !";
			if (count($ers)==0)
				{
				$inviter->startPlugin($_POST['provider_box']);
				$internal=$inviter->getInternalError();
				if ($internal)
					$ers['inviter']=$internal;
				elseif (!$inviter->login($_POST['email_box'],$_POST['password_box']))
					{
					$internal=$inviter->getInternalError();
					$ers['login']=($internal?$internal:"Login failed. Please check the email and password you have provided and try again later !");
					}
				elseif (false===$contacts=$inviter->getMyContacts())
					$ers['contacts']="Unable to get contacts !";
				else
					{
					$import_ok=true;
					$step='send_invites';
					$_POST['oi_session_id']=$inviter->plugin->getSessionID();
					$_POST['message_box']='';
					}
				}
			}

		}
	else
		{
		$_POST['email_box']='';
		$_POST['password_box']='';
		$_POST['provider_box']=''; 
		}
	
	
	?>				
			
				
				<div class="invita_deal">
				<div><p class="red">Or spread the word by:<span style="padding: 6px 6px; margin:0;"><img src="images/question1.gif" alt="" width="14" height="13"/></span><span style="color:#000000; font-weight: bold;">Facebook</span><span style="padding: 6px 6px; margin:0;"><img src="images/facebook.png" alt="" width="17" height="18"/></span><span style="color:#000000; font-weight: bold;">Twitter</span><span style="padding: 6px 6px; margin:0;"><img src="images/twitter.png" alt="" width="17" height="18"/></span></p></div>
				<div class="clear"></div>
				</div>
				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="clear"></div>
			
			<form action='<?php echo SITE_URL; ?>?recommend=import' method='POST' name='openinviter'>
			
				<div class="invita_deal">
				<div>
				<p class="red">The fastest way:<span style="padding: 0 6px; margin:0;"><img src="images/question1.gif" alt="" width="14" height="13"/></span></p><span>Enter your email address and select people from your email account to whom you want to recommend this deal to.</span>
				<div class="error"> <br/><?php echo ers($ers).oks($oks); ?> </div>
				
				</div>
				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="14"/></div>
				<div><p><span style="color:#000000; font-weight: bold;">Email address</span><span><img src="images/spacer.gif" alt="" width="100" height="1"/></span><span style="color:#000000; font-weight: bold;">Provider</span><span><img src="images/spacer.gif" alt="" width="110" height="1"/></span><span style="color:#000000; font-weight: bold;">Password</span></p></div>
				<div class="clear"></div>
				<div class="massage">
				<div style="float:left; width: auto; margin: 0 auto;">
					<input type="text" name='email_box' value='<?php echo $_POST['email_box']; ?>' class="mailbox1"/>
					<span style="font: bold 12px/26px Arial, Helvetica, sans-serif; color: #090909; padding:0 6px;"></span>
					<select class="selectbox" name='provider_box'>
						<option value=''></option>
						<?php 
						foreach ($oi_services as $type=>$providers)	
						{
						//echo "<optgroup label='{$inviter->pluginTypes[$type]}'>";
						foreach ($providers as $provider=>$details)
							if ($details['name'] == "Live/Hotmail" || $details['name'] == "GMail" || $details['name'] == "Yahoo!" || $details['name'] == "MSN") {
							echo "<option value='{$provider}'".($_POST['provider_box']==$provider?' selected':'').">{$details['name']}</option>";
							}
							//echo "</optgroup>";
						}
						?>	
					</select>
					<input type='password' name='password_box' value='' class="mailbox1"/>
					<input type="submit" name="import" class="tellbtn" value="Find Contact"/>
					<input type='hidden' name='step' value='get_contacts'>
				</div>
				<div class="clear"></div>
				<div style="float:right; margin:0 auto; width: 150px;"><span>GeeLaza does not save your password!</span></div>
				</div>
				</div>
				
				<?php 
					if ($step=='send_invites')
					{
					if ($inviter->showContacts())
						{
						//$contents.="<table class='thTable' align='center' cellspacing='0' cellpadding='0'><tr class='thTableHeader'><td colspan='".($plugType=='email'? "3":"2")."'>Your contacts</td></tr>";
						if (count($contacts)==0) {
							echo "You do not have any contacts in your address book.";
						}
						else
						{
						foreach ($contacts as $email=>$name)
							{
							//echo $email.',';
							$_SESSION['recomEmails'] .= $email.', ';
							$recomEmail['recomEmails'] .= $email.', ';
							$counter++; 
								}
							}
						}
					}
				
				?>
				
				
			</form>
				
				<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
				</div>
				<div class="clear"></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="recomm_bot"></div>
				</div>

			<!-- opi -->

			
			
			<!-- opi -->
				
			
			<?php } else { ?>
			
			<div class="top_recomm">
			<p>Please login to recommend deals to friends.</p>
			</div>
			<div class="clear"></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="recomm_bot"></div>
			<?php } ?>
		</div>
	</div>

			<script type="text/javascript">
				function validateRecom() {
					//alert ('Hi');
					var msg = document.getElementById(fmsg).value;
					var email = document.getElementById(femail).value;
					if (msg == '') {
						document.getElementById(msgErr).innerHTML = "Enter message";
						return false;
					}
					if (email == '') {
						document.getElementById(emailErr).innerHTML = "Enter email address";
						return false;
					}
					
				}

			</script>
<div class="clear"></div>

<div class="midbg">

<?php 
if ($city_id != "") {
	$deal_city = $city_id;
	$today_city = "SELECT * FROM ".TABLE_CITIES." WHERE city_name = '$deal_city' AND status = 1";
	$today_city_res = mysql_fetch_array(mysql_query($today_city));
	$today_city_res['city_id'];
}


if (($_GET['action'] != "") && ($_GET['id'] != "")) {
	$action = $_GET['action'];
	$deal_id = $_GET['id'];
	
	$sql_today = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_id = '".$deal_id."' LIMIT 0, 1";
	$today_res = mysql_fetch_array(mysql_query($sql_today));
	
	$sql_todays_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$today_res['deal_id'];
	$total_buy = mysql_fetch_array(mysql_query($sql_todays_buy));
	
	$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
	$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));
	
}
else {
	$sql_today = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_end_time LIKE '".date("Y-m-d")."%' LIMIT 0, 1";
	$today_res = mysql_fetch_array(mysql_query($sql_today));
	
	$num_rows = mysql_num_rows(mysql_query($sql_today)) ;
	
		if ($num_rows > 0) {
		
			$sql_todays_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$today_res['deal_id'];
			$total_buy = mysql_fetch_array(mysql_query($sql_todays_buy));
			
			$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
			$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));
			
		}
}	// end else

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
	<li><a id="various2" href="#inline1">Email</a></li>
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


<div id="email-form" class="LB-white-content" style="background: url(images/bodybg.jpg) left top repeat; margin:0;">
	<a id="close" href="" onclick="HideLightBox(); return false;"></a>
	
		<div class="subscribe_box">
		<!--<div id="cross"><a href="#"><img src="images/cross_white.gif" alt="" width="22" height="32" border="0" /></a></div>
		--><div><p>Save 50% to 90% in your city at the best restaurants, spas, cinemas, gyms, events and many more!</p></div>
		<div class="clear"></div>
		<form name="select_city">
		<div id="subscribe">
		<ul>
		<li style="width: 450px; float: left;">
			<div id="email_check" style="float: left;"></div>
			<input type="text" name="email" id="email" class="white_box2" onclick="javascript: if (this.value == 'Enter your email address here') { this.value = '' };" onblur ="javascript: if (this.value == ''){ this.value = 'Enter your email address here' }; "/>
		</li>
		<li style="margin: 8px 0 0 90px;">
			<div id="city_check" style="float: left;"></div>
			<select name="city" id="city" class="text_select">
                        <option value="">Select city</option>
                        <?php
							$sql_cities = "SELECT * FROM ".TABLE_CITIES." GROUP BY city_name"; 
							$result_cities = mysql_query($sql_cities);
							while($row_cities = mysql_fetch_array($result_cities))
							{
								?>
                        <option value="<?php echo $row_cities["city_id"]; ?>"><?php echo $row_cities["city_name"]; ?></option>
                        <?php
							}
							?>
              </select>
			<a href="javascript: void(0);" onclick="return validate();"><input type="submit" name="Submit" class="subs_btn" value="" id="city_submit" onclick="getSubscribeValues(this.id);"/></a>
		</li>
		<li style="margin: 8px 0 0 90px;">By subscribing I agree the <a href="#">Terms & Conditions</a> and <a href="#">Provacy Policy</a>.</li>
		</ul>
		</div>
		</form>
		
		<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="150" border="0" /></div>
		<div class="skip"><a href="#">Skip>></a></div>
		<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" border="0" /></div>
		<div class="fit_box"><img src="images/img4.jpg" alt="" width="150" height="100" />
		<div class="fit_bg"><p>Restaurents</p></div>
		</div>
		<div class="fit_box"><img src="images/img6.jpg" alt="" width="150" height="100" />
		<div class="fit_bg"><p>Fitness</p></div>
		</div>
		<div class="fit_box"><img src="images/img3.jpg" alt="" width="150" height="100" />
		<div class="fit_bg"><p>SPA</p></div>
		</div>
		<div class="fit_box"><img src="images/img5.jpg" alt="" width="150" height="100" />
		<div class="fit_bg"><p>Events</p></div>
		</div>
		</div>
	
</div>
<?php include ('include/sidebar.php'); ?>

<?php include ('include/footer.php'); ?>