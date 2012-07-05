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
		/*
		$url_city = end(explode('/', $_SERVER['REQUEST_URI']));
		$country = 225;
		$city_name_data = mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_CITIES."  WHERE city_name = '$url_city'"));
		$city_name_row = mysql_num_rows(mysql_query("SELECT * FROM ".TABLE_CITIES."  WHERE city_name = '$url_city'"));

		$sql_today1 = "SELECT *, FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_end_time >= '".date("Y-m-d")."' AND city = '$city_name_data[city_name]' LIMIT 0, 1";
		$today_res1 = mysql_fetch_array(mysql_query($sql_today1));
		//$_SESSION['current_deal_id'] = $today_res['deal_id'];

		$city_name_data['city_id'];
		//header('location:'.SITE_URL.'?city='.$city_name_data['city_id']);

		if ($city_name_row > 0) {
			//header('location:index.php?city='.$city_name_data['city_id']);
		}
		*/
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
	width: 700px;
	height: auto;
	margin: 0px;
	background-color: white;
	z-index: 1002;
	overflow: hidden;
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

		var national = document.getElementById('nd').value;

		if (national == 'National deal') {
			alert(national);
			document.getElementById('select_city').action = '<?php echo SITE_URL; ?>national_deals.php?nd=National deals';
			document.getElementById('sublink').setAttribute("href", "<?php echo SITE_URL; ?>national_deals.php?nd=National deals");
			//document.getElementById('sublink').href += '<?php echo SITE_URL; ?>national_deals.php?nd=National deals';
		}

		if (email_val == '')
		{
			document.getElementById('email_check').innerHTML = '<label style="color:red;font-weight:bold; align: left;">Please enter email ID</label>';
			validation = 1;
			return false;
		}
		else if (email_val == 'Enter your email address')
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
function nationalDeal(val) {
	if (val == 'National deal') {
		//setCookie("subscribe",-1,20);
		//window.location =	 '<?php echo SITE_URL; ?>national_deals.php?nd=National deals';
		//window.location = '<?php echo SITE_URL; ?>index.php?acsucc=You have been subscribed successfully';
		document.getElementById('select_city').action = '<?php echo SITE_URL; ?>national_deals.php?nd=National deals';
	}
}


function getSubscribeValues(id)
{
		var city_id;
		var email;
		var cookieValue;

		var getSelectedIndex = document.select_city.city.selectedIndex;
		var city_val = document.select_city.city[getSelectedIndex].value;
		var email_val =document.getElementById("email_subscript").value;

		var national = document.getElementById('nd').value;

		/*if (national == 'National deal') {
			alert(national);
			document.getElementById('select_city').action = '<?php echo SITE_URL; ?>national_deals.php?nd=National deals';
			document.getElementById('sublink').setAttribute("href", "<?php echo SITE_URL; ?>national_deals.php?nd=National deals");
			//document.getElementById('sublink').href += '<?php echo SITE_URL; ?>national_deals.php?nd=National deals';
		}*/
		if (email_val == '')
		{
			document.getElementById('email_check').innerHTML = '<label style="color:red;font-weight:bold; align: left;">Please enter email ID</label>';
			validation = 1;
			return false;
		}
		else if (email_val == 'Enter your email address')
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

		if(id=='city_submit')
		{
			var getSelectedIndex = document.select_city.city.selectedIndex;
			city_id = document.select_city.city[getSelectedIndex].value;
			setCookie("subscribe",city_id,20);
			if(city_id == 'National deal')
			{
				window.location = '<?php echo SITE_URL; ?>national_deals.php?nd=National deals';
			}
			else
			{
				window.location = '<?php echo SITE_URL; ?>index.php?acsucc=You have been subscribed successfully';
			}

		}

		if(id=='subscribe_email')
		{
			email = document.getElementById("email").value;
			var value = getCookie("subscribe");
			cookieValue = email+'|'+value;
			setCookie("subscribe",cookieValue,20);
			city_id = document.select_city.city[getSelectedIndex].value;
			if(city_id == 'National deal')
				window.location = '<?php echo SITE_URL; ?>national_deals.php?nd=National deals';
			else
				window.location = '<?php echo SITE_URL; ?>index.php?acsucc=You have been subscribed successfully';
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

<!--
if need  to enable the hide overlay on clicking, add the below code ---

onclick="if (!is_modal) HideLightBox(); return false;"
 -->
<div id="fade" class="LB-black-overlay"></div>


<script src="js/countdown.js" type="text/javascript" charset="utf-8"></script>


<?php

 //echo $_COOKIE['subscribe'];

?>


<div class="topbg">
<ul>
<li><p><strong><a id="various3" href="#inline2">DEAL INFORMATION</a></strong></p></li>
<li><img src="images/spacer.gif" alt="" width="160" height="1" /></li>
<li>Recommend This Deal By:</li>
<li><img src="images/email.png" alt="" width="19" height="18" /></li>
<li><a <?php if (isset($_SESSION['user_id'])) { ?>href="#inline1" id="various1" <?php } else { ?>href="<?php echo SITE_URL; ?>recomendation.php"<?php } ?>>Email</a></li>
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

<!-- Recom -->

<div style="display: none;">
		<div id="inline2" style="width:701px;height:px;overflow:auto; background-color: transparent;">
			<?php //if (isset($_SESSION['user_id'])) { ?>


				<div class="deal_recomm_ani">
  <div class="top_recomm_ani">
    <p style="text-align:center;">Get Your GeeLaza Starter Credits Today</p>
  </div>
  <div class="clear"></div>
  <div style="border-bottom: 3px solid #7fd7fb;"></div>
  <div class="clear"></div>
  <div class="recomm_mid_ani">
    <div class="invita_deal_ani" style="background: url(images/gold_bg.jpg) left top no-repeat; height:157px;">
      <div style="width: 430px; height:auto; margin-top: 25px; margin-left: 70px; float:left;">
	  <h2 style="padding:0 0 15px 0; margin:0; font: normal 30px/26px Georgia, 'Times New Roman', Times, serif;">Get yourself a starter credits</h2>
	  <p style="padding:0; margin:0; font: normal 12px/18px Arial, Helvetica, sans-serif; color:#000000;">If you have subscribed to our newsletter then you haven't register yet. To get full access to GeeLaza now and start earning 5 credits.</p>
	  </div>
	  <div style="width: 180px; margin:112px 20px 0 0; float:right;"><div>
<ul>
<li style="float:left; width: 16px; margin: 0 auto;"><img src="images/question1.gif" alt="" width="14" height="13"/></li>
<li style="float: right; width: 162px; margin: 0 auto; font: normal 12px/14px Arial, Helvetica, sans-serif; color:#999999;">You'll be credited 5 on every successfull recommendation</li>
</ul>
</div></div>
    </div>
    <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
    <div style="border-bottom: 3px solid #7fd7fb;"></div>
    <div class="clear"></div>
    <div class="invita_deal_ani">
      <div>
<!-- REGISTERATION FORM ND CODE START-->

  <?php
	$flag = 0;
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST['btnRegister'] == "Get My GeeLaza Starter Credit Now" )
	{
		//$title = $_POST["title"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$email = $_POST["email"];
		$cemail = $_POST["confemail"];
		$phno = $_POST["phno"];
		$password = $_POST["password"];
		$cpassword = $_POST["cpassword"];

		$add1 = $_POST["add1"];
		$add2 = $_POST["add2"];
		//$country = $_POST["country"];
		$city = $_POST["city"];
		$postcode = $_POST["postcode"];

		$dobday = $_POST["day"];
		$dobmonth = $_POST["month"];
		$dobyear = $_POST["year"];

		$dob = $dobyear."-".$dobmonth."-".$dobday;

		$terms = $_POST['terms'];

		if($fname == '')
		{
			$msg = 'Please enter first name';
			$flag = 1;
		}

		if($flag == 0)
		{
			if($lname == '')
			{
				$msg = 'Please enter last name';
				$flag = 1;
			}
		}

		if($flag == 0)
		{
			if($email == '')
			{
				$msg = 'Please enter email';
				$flag = 1;
			}
		}

		/*if($flag == 0)
		{
			if($cemail == '' || $cemail != $email)
			{
				$msg = 'Email id does not match';
				$flag = 1;
			}
		}

		if($flag == 0)
		{
			if($phno == '')
			{
				$msg = 'Please enter Phone no.';
				$flag = 1;
			}
		}*/

		if($flag == 0)
		{
			if($password == '')
			{
				$msg = 'Please enter password';
				$flag = 1;
			}
		}
		if($flag == 0)
		{
			if($cpassword == '' || $cpassword != $password)
			{
				$msg = 'Password and confirm password does not match';
				$flag = 1;
			}
		}

		/*if($flag == 0)
		{
			if($add1 == '')
			{
				$msg = 'Please enter Address';
				$flag = 1;
			}
		}

		if($flag == 0)
		{
			if($postcode  == '')
			{
				$msg = 'Please enter your postcode';
				$flag = 1;
			}
		}

		if($flag == 0)
		{
			if($city == '')
			{
				$msg = 'Please enter your city';
				$flag = 1;
			}
		}

		if($flag == 0)
		{
			if($terms !== 'terms')
			{
				$msg = 'Please agree with our Terms to use our service.';
				$flag = 1;
			}
		}

		if($flag == 0)
		{
			if($dobday == '')
			{
				$msg = 'Please Enter your Date of Birth';
				$flag = 1;
			}
		}

		if($flag == 0)
		{
			if($dobmonth == '')
			{
				$msg = 'Please Enter your Month of Birth';

				$flag = 1;
			}
		}

		if($flag == 0)
		{
			if($dobyear == '')
			{
				$msg = 'Please Enter your Year of Birth';
				$flag = 1;
			}
		}*/


		if($flag == 0)
		{
			$sql_select = "SELECT * FROM ".TABLE_USERS." WHERE email="."'".$email."'";
			$result_select = mysql_query($sql_select);
			$count_select = mysql_num_rows($result_select);
			if($count_select >0)
			{
				$msg = 'Email address already exists';
				$flag = 5;
			}
		}
		//first_name,last_name,email,phone_no,password,company_name,website,address1,address2,country,city,zip,business_cat,deal_city,details,date_added
		if($flag == 0)
		{
			$password = base64_encode($password);
			$date = date('Y-m-d');

			/*$sql_insert = "INSERT INTO ".TABLE_USERS.
						  "(first_name,last_name,email,phone_no,password,company_name,website,address1,address2,country,city,zip,business_cat,deal_city,details,date_added)
						  VALUES('".$fname."','".$lname."','".$email."','".$phno."','".$password."','".$bname."','".$bsite."','".$add1."','".$add2."','".$country."','".$city."','".$postcode."','".$bcat."','".$dealcity."','".$about."','".$date."')";
			*/

			$sql_insert = "INSERT INTO ".TABLE_USERS.
						  "(first_name,last_name,email,phone_no,password,dob,address1,address2,zip,city,date_added)
						  VALUES('".$fname."','".$lname."','".$email."','".$phno."','".$password."','".$dob."','".$add1."','".$add2."','".$postcode."','".$city."','".$date."')";

			mysql_query($sql_insert);


			$msg = 'Your account has been successfully created!';
			$flag = 2;

			// send wellcome email
			//RegistrationEmail($email);


				$sql_email1 = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 LIMIT 0, 1"; //AND deal_end_time LIKE '".date("Y-m-d")."%' LIMIT 0, 4";
				$email_res1 = mysql_fetch_array(mysql_query($sql_email1));
				$sql_email_image1 = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$email_res1['deal_id'];
				$email_image_1 = mysql_fetch_array(mysql_query($sql_email_image1));

				$sql_email2 = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 LIMIT 1, 1"; //AND deal_end_time LIKE '".date("Y-m-d")."%' LIMIT 0, 4";
				$email_res2 = mysql_fetch_array(mysql_query($sql_email2));
				$sql_email_image2 = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$email_res2['deal_id'];
				$email_image_2 = mysql_fetch_array(mysql_query($sql_email_image2));

				$sql_email3 = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 LIMIT 2, 1"; //AND deal_end_time LIKE '".date("Y-m-d")."%' LIMIT 0, 4";
				$email_res3 = mysql_fetch_array(mysql_query($sql_email3));
				$sql_email_image3 = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$email_res3['deal_id'];
				$email_image_3 = mysql_fetch_array(mysql_query($sql_email_image3));

				$sql_email4 = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 LIMIT 3, 1"; //AND deal_end_time LIKE '".date("Y-m-d")."%' LIMIT 0, 4";
				$email_res4 = mysql_fetch_array(mysql_query($sql_email4));
				$sql_email_image4 = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$email_res4['deal_id'];
				$email_image_4 = mysql_fetch_array(mysql_query($sql_email_image4));


					//$email_deal_details_1 = get_deal_details($deal_id);


				/* $Template =

				<table width="704" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				  <tr>
				    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
				        <td><img src="'.SITE_URL.'images/spacer.gif" alt="" width="1" height="8" /></td>
				      </tr>
				      <tr>
				        <td><table width="630" border="0" align="center" cellpadding="0" cellspacing="0">
				          <tr>
				            <td width="422" bgcolor="#ffffff"><img src="'.SITE_URL.'images/logo.png" alt="" width="143" height="59" /></td>
				            <td width="178" align="left" valign="top" bgcolor="#FFFFFF" style="font-family: Arial, Helvetica, sans-serif; padding-top: 7px; font-size: 13px; line-height: 20px; color: #5c5c5c; font-weight: normal;">Newsletter date:: '.date("d/m/Y").'</td>
				          </tr>
				        </table></td>
				      </tr>
				    </table></td>
				  </tr>
				  <tr>
				    <td><table width="650" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
				      <tr>
				        <td style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; font-size: 16px; line-height: 20px; color: #73c3e4; font-weight: bold;">Welcome to GeeLaza!</td>
				      </tr>
				      <tr>
				    <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #feffe9; border: 3px solid #7ad5fc;">
				        <tr>
				          <td style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; font-size: 13px; line-height: 20px; color: #b3cf5b; font-weight: bold;">
				          	Hey '.ucfirst($fname).'!
				          </td>
				        </tr>
				        <tr>
				          <td style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; font-size: 13px; line-height: 17px; color: #000; font-weight: bold;">Thank you for becoming a GeeLaza member! Each day. We will send you amazing deals to your email address
				('.$email.') From today onwards you won,t miss any daily deals. We hope you have a great experience
				with GeeLaza. </td>
				        </tr>
				        <tr>
				          <td>&nbsp;</td>
				        </tr>
				      </table></td>
				      </tr>
				      <tr>
				      <td style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; padding-top: 10px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">How does it works?<br />

				1) Buy a deal - Buy one of our amazing deals by clicking on "BUY THIS DEAL" button and you
				will receive a email with instructions on how to redeem your voucher.<br /><br />

				2) Share it - Spread the word when you buy something so others can save as well. Don\'t forget to recomment the deal and get some cash.<br /><br />

				3) Redeem it - You will get your voucher within 48 hours after the deal rens out. You can redeem it online or print it.<br /><br />

				4) Enjoy your deal - it is time to see the better and new side of your city and live your life like its
				meant to  be.<br /><br />

				enjoy,<br /><br />


				If you need help or have any questions, contact us. we want to thank you once for registering with us and enjoy your life with Geelaza!</td>
				      </tr>


				      <tr>
				        <td style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #000; font-weight: bold;">The GeeLaza Team</td>
				      </tr>
				      <tr>
				        <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;"><table width="600" border="0" cellspacing="0" cellpadding="0">
				          <tr>
				            <td><table width="650" border="0" align="left" cellpadding="0" cellspacing="0">
				              <tr>
				                <td width="340" align="left" valign="top">
				                 <table width="310" border="0" align="left" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; border: 4px solid #70d3fc;">
				                  <tr>
				                    <td><table width="254" border="0" align="center" cellpadding="0" cellspacing="0">
				                      <tr>
				                        <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding-left: 5px; padding-bottom: 10px; padding-top: 10px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">
				                        	'.$email_res1['title'].'
				                        </td>
				                      </tr>
				                      <tr>
				                        <td colspan="2"><img src="'.UPLOAD_PATH.$email_image_1['file'].'" alt="" width="252" height="172" /></td>
				                      </tr>
				                      <tr>
				                        <td width="126" bgcolor="#cccccc" style="border-right: 2px solid #bfbfbf; font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: center; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">Price:<br />
				                            <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;">&pound;'.$email_res1['discounted_price'].'</span></td>
				                        <td width="126" bgcolor="#cccccc" style="border-right: 2px solid #bfbfbf; font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: center; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">Discount:<br />
				                            <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;">'.intval($email_res1['discounted_price']*100/$email_res1['full_price']).'%</span></td>
				                      </tr>
				                      <tr>
				                        <td colspan="2" width="230" style="font-family: Arial, Helvetica, sans-serif; padding-left: 0px; text-align: left; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: normal;">
				                        	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie,   lacus ac vulputate pharetra, elit lorem porttitor tortor, ut porttitor   tortor urna et turpis.
				                        	...<a href="'.SITE_URL.'index.php?action=view&id='.$email_res1['deal_id'].'" style="color:#6abce0; text-decoration:none;">Read more</a>
				                        </td>
				                      </tr>
				                      <tr>
				         <td colspan="2" style="border-bottom: 3px solid #77d4fc;"><img src="'.SITE_URL.'images/spacer.gif" alt="" width="1" height="8" /></td>
				                      </tr>
				                        <tr>
				                        <td width="126" style="font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: left; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #8c8c8c; font-weight: bold;">Deal Ends:<br />
				                            <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #8c8c8c; font-weight: bold;">14:23 PM</span></td>
				                   <td width="126" align="center"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res1['deal_id'].'"><img src="'.SITE_URL.'images/check_btn.gif" alt="" width="91" height="30" border="0" /></a></td>
				                      </tr>
				                    </table></td>
				                  </tr>
				                </table></td>
				                <td width="310" align="left" valign="top"><table width="310" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f4f4; border: 4px solid #70d3fc;">
				                  <tr>
				                    <td><table width="254" border="0" align="center" cellpadding="0" cellspacing="0">
				                        <tr>
				                          <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding-left: 5px; padding-bottom: 10px; padding-top: 10px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">
				                          '.$email_res2['title'].'</td>
				                        </tr>
				                        <tr>
				                          <td colspan="2"><img src="'.UPLOAD_PATH.$email_image_2['file'].'" alt="" width="252" height="172" /></td>
				                        </tr>
				                        <tr>
				                          <td width="126" bgcolor="#cccccc" style="border-right: 2px solid #bfbfbf; font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: center; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">Price:<br />
				                              <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;">&pound;'.$email_res2['discounted_price'].'</span></td>
				                          <td width="126" bgcolor="#cccccc" style="border-right: 2px solid #bfbfbf; font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: center; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">Discount:<br />
				                              <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;">'.intval($email_res2['discounted_price']*100/$email_res2['full_price']).'%</span></td>
				                        </tr>
				                        <tr>
				                          <td colspan="2" width="230" style="font-family: Arial, Helvetica, sans-serif; padding-left: 0px; text-align: left; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: normal;">
				                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie,   lacus ac vulputate pharetra, elit lorem porttitor tortor, ut porttitor   tortor urna et turpis.
				                          ...<a href="'.SITE_URL.'index.php?action=view&id='.$email_res2['deal_id'].'" style="color:#6abce0; text-decoration:none;">Read more</a></td>
				                        </tr>
				                        <tr>
				         <td colspan="2" style="border-bottom: 3px solid #77d4fc;"><img src="'.SITE_URL.'images/spacer.gif" alt="" width="1" height="8" /></td>
				                        </tr>
				                        <tr>
				                          <td width="126" style="font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: left; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #8c8c8c; font-weight: bold;">Deal Ends:<br />
				                              <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #8c8c8c; font-weight: bold;">14:23 PM</span></td>
				                          <td width="126" align="center"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res2['deal_id'].'"><img src="'.SITE_URL.'images/check_btn.gif" alt="" width="91" height="30" border="0" /></a></td>
				                        </tr>
				                    </table></td>
				                  </tr>
				                </table></td>
				              </tr>
				            </table></td>
				          </tr>
				        </table></td>
				      </tr>



				      <tr>
				        <td>
						<table width="650" border="0" align="center" cellpadding="0" cellspacing="0"  style="background-color: #f4f4f4; border: 4px solid #70d3fc;">
				          <tr>
				            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
				              <tr>
				                <td width="36%"><table width="234" border="0" align="left" cellpadding="0" cellspacing="0" style="padding-left: 8px; padding-bottom: 10px; padding-top: 10px;">
				                  <tr>
				                    <td colspan="2"><img src="'.UPLOAD_PATH.$email_image_3['file'].'" alt="" width="234" height="158" /></td>
				                  </tr>
				                  <tr>
				                    <td width="126" bgcolor="#cccccc" style="border-right: 2px solid #bfbfbf; font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: center; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">Price:<br />
				                        <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;">&pound;'.$email_res3['discounted_price'].'</span></td>
				                    <td width="126" bgcolor="#cccccc" style="border-right: 2px solid #bfbfbf; font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: center; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">Discount:<br />
				                        <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;">'.intval($email_res3['discounted_price']*100/$email_res3['full_price']).'%</span></td>
				                  </tr>
				                </table></td>
				                <td width="64%" align="left" valign="top">
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 7px; padding-left: 6px; padding-right: 6px;">

								<tr>
								<td colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 5px; padding-top: 3px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res3['deal_id'].'" style="color: #333333; text-decoration:none;">'.$email_res3['title'].'</a></td>
								</tr>
				                  <tr>
				                    <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding-left: 0px; text-align: left; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: normal;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie,   lacus ac vulputate pharetra, elit lorem porttitor tortor, ut porttitor   tortor urna et turpis. ...<a href="#" style="color:#6abce0; text-decoration:none;">Read more</a></td>
				                  </tr>
				                  <tr>
				                    <td colspan="2">&nbsp;</td>
				                  </tr>
				                  <tr>
				                    <td width="297"  style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 18px; line-height: 20px; color: #8c8c8c; font-weight: bold;">Deal ends : 16:23 PM </td>
				                    <td width="111"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res3['deal_id'].'"><img src="'.SITE_URL.'images/check_btn.gif" alt="" width="91" height="30" border="0" /></a></td>
				                  </tr>
				                </table></td>
				              </tr>
				            </table></td>
				          </tr>
				        </table></td>
				      </tr>
				      <tr>
				        <td><img src="'.SITE_URL.'images/spacer.gif" alt="" width="1" height="2" /></td>
				      </tr>
				      <tr>
				        <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0"  style="background-color: #f4f4f4; border: 4px solid #70d3fc;">
				          <tr>
				            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">				                <tr>
				                  <td width="36%"><table width="234" border="0" align="left" cellpadding="0" cellspacing="0" style="padding-left: 8px; padding-bottom: 10px; padding-top: 10px;">
				                      <tr>
				                        <td colspan="2"><img src="'.UPLOAD_PATH.$email_image_4['file'].'" alt="" width="234" height="158" /></td>
				                      </tr>
				                      <tr>
				                        <td width="126" bgcolor="#cccccc" style="border-right: 2px solid #bfbfbf; font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: center; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">Price:<br />
				                            <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;">&pound;'.$email_res4['discounted_price'].'</span></td>
				                        <td width="126" bgcolor="#cccccc" style="border-right: 2px solid #bfbfbf; font-family: Arial, Helvetica, sans-serif; padding-left: 5px; text-align: center; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 20px; color: #3c3c3c; font-weight: bold;">Discount:<br />
				                            <span style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;">'.intval($email_res4['discounted_price']*100/$email_res4['full_price']).'%</span></td>
				                      </tr>
				                  </table></td>
				                  <td width="64%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 7px; padding-left: 6px; padding-right: 6px;">
				                      <tr>
				                        <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 5px; padding-top: 3px; font-size: 16px; line-height: 20px; color: #3c3c3c; font-weight: bold;"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res4['deal_id'].'" style="color: #333333; text-decoration:none;">'.$email_res4['title'].'</a></td>
				                      </tr>
				                      <tr>
				                        <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; padding-left: 0px; text-align: left; vertical-align: middle; padding-bottom: 4px; padding-top: 4px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: normal;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie,   lacus ac vulputate pharetra, elit lorem porttitor tortor, ut porttitor   tortor urna et turpis. ...<a href="#" style="color:#6abce0; text-decoration:none;">Read more</a></td>
				                      </tr>
				                      <tr>
				                        <td colspan="2">&nbsp;</td>
				                      </tr>
				                      <tr>
				                        <td width="297"  style="font-family: Arial, Helvetica, sans-serif; padding-left: 0; padding-bottom: 10px; padding-top: 10px; font-size: 18px; line-height: 20px; color: #8c8c8c; font-weight: bold;">Deal ends : 16:23 PM </td>
				                        <td width="111"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res4['deal_id'].'"><img src="'.SITE_URL.'images/check_btn.gif" alt="" width="91" height="30" border="0" /></a></td>
				                      </tr>
				                  </table></td>
				                </tr>
				            </table></td>
				          </tr>
				        </table></td>
				      </tr>
				      <tr>
				       <td style="border-bottom: 3px solid #77d4fc;"><img src="'.SITE_URL.'images/spacer.gif" alt="" width="1" height="8" /></td>
				      </tr>
				      <tr>
				        <td style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; padding-bottom: 10px; padding-top: 10px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: bold;">please add deals &copy; geelaza.com to your address book or sender list so our emails get to your inbox.</td>
				      </tr>
				    </table></td>
				  </tr>
				  <tr>
				    <td><table width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="padding: 8px 0 0 0;">
				      <tr>
				        <td width="516" bgcolor="#ddedcc" style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; padding-bottom: 10px; padding-top: 10px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: normal;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <a href="#" style="color:#FF0000; text-decoration:none;">more read</a></td>
				        <td width="115" align="left" valign="top" bgcolor="#ddedcc" style="padding-top: 10px;"><table width="130" border="0" cellspacing="0" cellpadding="0">
				          <tr>
				            <td width="69" style="font-family: Arial, Helvetica, sans-serif; padding-left: 10px; padding-bottom: 10px; padding-top: 10px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: bold;">Follow us:</td>
				            <td width="22"><img src="'.SITE_URL.'images/facebook.png" alt="" width="17" height="18" /></td>
				            <td width="24"><img src="'.SITE_URL.'images/twitter.png" alt="" width="17" height="18" /></td>
				          </tr>
				        </table></td>
				      </tr>
				      <tr>
				        <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; text-align: center; padding-left: 10px; padding-bottom: 10px; padding-top: 10px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: bold;">You have received this email because you have subscribed to GeeLaza deal newsletter. You can unsubscribe
				by clicking <a href="#" style="color:#FF0000;">here</a>.</td>
				      </tr>
				      <tr>
				        <td colspan="2" bgcolor="#FFFFFF" style="font-family: Arial, Helvetica, sans-serif; text-align: center; padding-left: 10px; padding-bottom: 10px; padding-top: 10px; font-size: 12px; line-height: 16px; color: #3c3c3c; font-weight: bold;"><a href="#" style="color: #333333; text-decoration: none;">&copy; GeeLaza.com</a> | <a href="#" style="color: #333333; text-decoration: none;">Terms & Conditions</a> | <a href="#" style="color: #333333; text-decoration: none;">About GeeLaza</a></td>
				      </tr>
				    </table></td>
				  </tr>
				</table>

		';*/

	//	echo $Template;

			if (isset($Template)) {
					//$to  = $to;



					$subject = "Welcome to GeeLaza.com ";

					$sql="SELECT * FROM ".TABLE_ADMIN." where admin_name='admin'";
					$admin=$db->query_first($sql);

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= "From: GeeLaza.com<admin@geelaza.com>". "\r\n" ;

					@mail($email,$subject,$Template,$headers);
			}

		}

	}

?>



<?php

if($flag !=0)
{
	if($flag == 1)
	{
		?>
		<div style="width:100%; height:45px; background-color:#fff; padding-top:4px; padding-left:30px;">
		<label style="color:red;"><?php //echo "* ".$msg; ?> Please enter your details into the highlited boxes and you must agree with our Terms &amp; Conditions.</label>

		</div>
		<?php
	}
	if($flag == 2)
	{
		header('location:'.SITE_URL.'national_deals.php?acsucc=You\'ve successfully created your account. Welcome to GeeLaza!');
		?>
		<div style="width:100%; height:45px; background-color:#fff;padding-top:4px; padding-left:30px;  text-align: center;">
		<label style="color:#006600;"><?php echo $msg; ?></label>
		</div>
		<?php
	}
}
?>

  <form name="cust_register" id="cust_register" onkeyup="javascript: return hasValue();" onsubmit="javascript:return ValidateRegisterForm();" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  style="background:#fff; margin:0px; padding:0px; border:1px solid #fff;">
  <div style="background:#fff;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg2">
       <tr>
         <td>
        <table style="padding-left: 20px;" width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg">
        <tr>
        <td><img src="images/spacer.gif" alt="" width="1" height="6"/></td>
        </tr>
        <tr>
        <td class="text_black"> <span><img src="images/spacer.gif" alt="" width="210" height="1" /></span><!-- <span>Required field <span class="red">(*)</span></span> --></td>
        </tr>
       <!-- <tr>
          <td>Title <span class="red">*</span></td>
        </tr>
        <tr>
      <td><select name="title" class="selectbg">
                      <option value="">Please choose</option>
                      <option value="Mr.">Mr.</option>
                      <option value="Mrs.">Mrs.</option>
                      <option value="Ms.">Ms.</option>
                      <option value="Miss">Miss</option>


                      </select></td>
        </tr>-->
        <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

         <tr>
          <td>EMAIL ADDRESS</td>
        </tr>
        <tr>
          <td>
          <div class="error_orange"><?php if ($flag == 5) { echo 'Email address already exists'; }?></div>
          <input type="text" name="email" id="email" onblur="return ajaxReq(this.value); " value="<?php if(isset($_POST)){ echo $_POST["email"];} ?><?php if ($userInfo) {echo $userInfo['email'];} ?>" class="text_box12 width600" <?php if ($flag ==1 || $flag ==5) {echo 'style="border:1px solid red;"';} ?>/>      </td>
        </tr>
         <tr>
          <td><span style="color: #c3c3c3; font-size: 11px; font-weight: normal; text-transform:none;">Don't worry. Your email address is safe with us!</span><div id='cust_register_email_errorloc' class="error_orange"></div></td>
        </tr>
       <!-- <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
        <tr>
          <td>Confirm Email Address <span class="red">*</span></td>
        </tr>
        <tr>
          <td>
          <div id='cust_register_confemail_errorloc' class="error_orange"></div>
          <input type="text" name="confemail" id="confemail" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["confemail"];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>      </td>
        </tr> -->
       <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>

        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="45%">PASSWORD</td>
            </tr>
            <tr>
              <td>
              <input type="password" name="password" id="password" class="text_box12 width600" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>          </td>
            </tr>
            <tr>
	          <td><div id='cust_register_password_errorloc' class="error_orange"></div></td>
	        </tr>
             <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
            <tr>
              <td width="55%">CONFIRM PASSWORD</td>
            </tr>
            <tr>
              <td>
              <input type="password" name="cpassword" id="cpassword" class="text_box12 width600" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>          </td>
            </tr>
            <tr>
	          <td><div id='cust_register_cpassword_errorloc' class="error_orange"></div></td>
	        </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
            <tr>
            	<td>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="47%">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>FIRST NAME</td>
                          </tr>
                          <tr>
                            <td>
                            <input type="text" name="fname" id="fname" value="<?php if(isset($_POST)){ echo $_POST["fname"];} ?><?php if ($userInfo) {echo $userInfo['first_name'];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>        </td>
                          </tr>
                          <tr>
				          	<td><div id='cust_register_fname_errorloc' class="error_orange"></div></td>
				          </tr>
                          <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
                         <tr>
                          <td>PHONE NUMBER <span class="red"></span>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="text" name="phno" id="phno" value="<?php if(isset($_POST)){ echo $_POST["phno"];} ?>" class="text_box12" /></td>
                        </tr>
                        <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
                        </table>
                        </td>
                        <td width="3%">&nbsp;</td>
                        <td width="47%">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>LAST NAME</td>
                          </tr>
                          <tr>
                            <td width="55%">
                            <input type="text" name="lname" id="lname" value="<?php if(isset($_POST)){ echo $_POST["lname"];} ?><?php if ($userInfo) {echo $userInfo['last_name'];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>        </td>
                          </tr>
                          <tr>
				          	<td><div id='cust_register_lname_errorloc' class="error_orange"></div></td>
				          </tr>
                           <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
                          <tr>
                          <td>DEAL CITY <span class="red"></span>
                          </td>
                        </tr>
                        <tr>
                          <td>

                              <div class="styled_select left" style="width:290px;">
                                <?php

									$country = 225;

									$sql_city = "SELECT * FROM ".TABLE_CITIES."  WHERE country_id = $country GROUP BY city_name ASC";
									$result_city = mysql_query($sql_city);
								?>
                                <select style="width:312px;  color: #666666;" id="city" name="city">
                                    <option value="000">Select your deal city</option>

                                    <?php
										while($row_city = mysql_fetch_array($result_city)) {
											$c++;
									?>
									<option value="<?php echo $row_city["city_name"]; ?>" id="city"><?php echo $row_city["city_name"]; ?> </option>
									<?php } ?>
                                </select>
                             </div>
                          </td>
                        </tr>
                        <tr>
				          	<td><div id='cust_register_city_errorloc' class="error_orange"></div></td>
				          </tr>
                        </table>
                        </td>
                      </tr>
                    </table>

                </td>
            </tr>
            <!--<tr><td>&nbsp;</td></tr>-->

          </table></td>
        </tr>

          <!--
          <tr>
            <td colspan="2">Address Line 1<span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="2">
            <div id='cust_register_add1_errorloc' class="error_orange"></div>
            <input type="text" name="add1" id="add1" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["add1"];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
            </td>
          </tr>
           <tr><td>&nbsp;</td></tr>
        -->

        </table></td>
        </tr>

        <!--<tr>
        <td>Address Line 2 <span class="red"></span> </td>
        </tr>
        <tr>
          <td><input type="text" name="add2" id="add2" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["add2"];} ?>" class="text_box12"/></td>
        </tr>
         <tr><td>&nbsp;</td></tr>
        -->

        <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <!--<tr>
            <td width="45%">Town/City <span class="red">*</span></td>
            <td width="55%">Postcode <span class="red">*</span></td>
          </tr>
          <tr>
            <td>
            <div id='cust_register_city_errorloc' class="error_orange"></div>
            <input type="text" name="city" id="city" style="width: 200px; margin-right: 10px; <?php if ($flag ==1) {echo 'border:1px solid red;';} ?>" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["city"];} ?>" class="text_box11" />
            </td>

            <td>
            <div id='cust_register_postcode_errorloc' class="error_orange"></div>
            <input type="text" name="postcode" id="postcode" style="width: 100px; <?php if ($flag ==1) {echo 'border:1px solid red;';} ?>" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["postcode"];} ?>" class="text_box11"/>
            </td>
          </tr>
          <tr><td>&nbsp;</td></tr>
        -->

        </table></td>
        </tr>
        <tr>
          <td>

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                  <tr>
                    <td>DATE OF BIRTH</td>
                    <td style="padding-left:5px;"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top></div><div class=clear></div><div class=tip_mid><h2>Why should I provide my date of birth?</h2><ul><li>You must provide your real date of birth to certify that you are at least 18 years old.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/question.png" width="12" height="12" vspace="4" align="default" ></a></td>
                    <td style="padding-left:246px;">GENDER</td>
                </tr>
                </table>
                			</td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>

              <tr>
            	<td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                      <tr>
                  <td style="padding-right:10px;">
                    <div class="styled_select left" style="width:75px;">
                        <select name="day" id="day" class="selectbg" title="" style="width:92px; color: #666666;">
                            <option value="000">Date</option>
                            <?php
                           for($d=1; $d <= 31; $d++)
                           {
                            $selected = ($date[2] == $d)? "selected" : "";
                            echo '<option value="'.$d.'" '.$selected.'>'.$d.'</option>';
                           }
                            ?>
                        </select>
                        </div>
                        </td>
                  <td style="padding-right:10px;">
                  <div class="styled_select left" style="width:125px;">
                  <select name="month" id="month" class="selectbg" style="width:144px; color: #666666;">
                            <option value="000" selected="selected">Month</option>
                            <?php for($m=1;$m<=12;$m++){
                            $xx='2001-'.$m.'-01';
                            $selected = ($date[1] == $m)? "selected" : "";
                             ?>
                            <option value="<?php echo'0'.$m?>" <?php echo $selected?>><?php echo date('F',strtotime($xx))?></option>
                            <?php } ?>
                          </select>
                          </div>
                          </td>
                  <td style="padding-right:50px;">
                      <div class="styled_select left" style="width:75px;">
                            <select name="year" id="year" class="selectbg" style="width:95px; color: #666666;">
                               <option value="000">Year</option>
                                 <?php
                                for($y = date("Y")-100; $y <= date("Y"); $y++)
                                {
                                 $selected = ($date[0] == $y)? "selected" : "";
                                 echo '<option value="'.$y.'" '.$selected.'>'.$y.'</option>';
                                }
                                 ?>
                            </select>
                            </div>
                            </td>
                       <td style="padding-right:5px;">
                        <div class="styled_select left" style="width:170px;">
                            <select style="width:190px; color: #666666;" id="gender">
                                <option>Select your gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                         </div>
                         <div id='cust_register_gender_errorloc' class="error_orange"></div>
                         </td>
                       </tr>
                       <tr>
			          	<td colspan="3">
				          	<div id='cust_register_day_errorloc' class="error_orange"></div>
			                <div id='cust_register_month_errorloc' class="error_orange"></div>
			                <div id='cust_register_year_errorloc' class="error_orange"></div>
		                </td>
			          </tr>
                </table>
            	</td>
            </tr>



          </table>

          </td>
        </tr>

        <tr>
        	<td>
            	<!--<table width="100%" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2" style="width:auto;" class="no_capital">

                        <td colspan="4" align="center" valign="middle" style="color:#000; font: bold 14px/18px Calibri, Arial, Helvetica, sans-serif;">&nbsp;</td>

                        </tr>
                          <tr>
                            <td align="left" valign="middle" width="25" style="padding:6px 0 0 0;"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
                            <td align="left" valign="middle" style="color:#798082; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Your Privacy is assured</td>
                            <td align="left" valign="middle" width="25" style="padding:6px 0 0 150px;"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
                            <td align="left" valign="middle" style="color:#798082; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Shop online with confidence</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle"  style="padding:6px 0 0 0;"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
                            <td align="left" valign="middle" style="color:#798082; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Get amazing deals daily</td>
                            <td align="left" valign="middle" style="padding:6px 0 0 150px;"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
                            <td align="left" valign="middle" style="color:#798082; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Explorer the new side of life</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                        </table></td>
                        </tr>

                         <tr>
                  <td style="padding-left: 10px; text-transform: none; color:#666666;" class="privacy_policy1">By registering you agree to the  <a href="#" style="color:#3d35ac; font-size:14px !important;">Terms and Conditions</a></span> and  <a href="#" style="color:#3d35ac; font-size:14px !important;">Privacy Policy</a></td>
                  </tr>

                  <tr>
                  <td style="height:5px"><img src="images/spacer.gif" alt="" width="1" height="5" /></td>
                  </tr>
                 </table>-->
            </td>
        </tr>
<tr>
                  <td style="padding-top: 15px; font-weight: normal; text-transform: none; color:#666666;" class="privacy_policy1">By registering you agree to our <a href="<?php echo SITE_URL; ?>page.php?page=Privacy Policy" style="color:#000; text-decoration: underline; font-size:14px !important;">Privacy Policy</a></td>
                  </tr>
				  <tr>
                  <td style="padding-top: 15px; text-transform: none; color:#666666; font-weight: normal;" class="privacy_policy1">You can unsubscribe at any time by clicking on the unsubscribe link at the bottom of our newsletters.</td>
                  </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center" style="text-align: left; padding-left: 120px;">
                    <img src="images/spacer.gif" alt="" width="1" height="13"/><br>
                    <input type="submit" name="btnRegister" value="Get My GeeLaza Starter Credit Now" class="log_in_ani27"  style="cursor:pointer;"/>        	</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><img src="images/spacer.gif" alt="" width="1" height="13"/></td>
        </tr>
      </table>
  </td>
       </tr>
     </table>

  </td>

      </tr>
   <tr>
     <td colspan="2">

    </td>
     </tr>
    </table>
  </div>
  </form>
<!-- Registration form validator starts -->

<script type="text/javascript">

function validateEmail(email) {

    var re = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    if (!re.test(email)) {
    document.getElementById('cust_login_lemail_errorloc').innerHTML = 'Invalid email address';
    document.getElementById('cust_login_lpassword_errorloc').innerHTML = '&nbsp;';
    document.getElementById('lemail').style.border = "1px solid red";
	document.getElementById('lpassword').style.border = "1px solid red";
    return false;
    }
}

function ValidateRegisterForm () {

	var fname = document.getElementById('fname').value;
	var lname = document.getElementById('lname').value;
	var email = document.getElementById('email').value;
	//var confemail = document.getElementById('confemail').value;
	var password = document.getElementById('password').value;
	var cpassword = document.getElementById('cpassword').value;
	var city = document.getElementById('city').value;
	var gender = document.getElementById('gender').value;

	var day = document.getElementById('day').value;
	var month = document.getElementById('month').value;
	var year = document.getElementById('year').value;



	if ( fname == "" || lname == "" || email == "" || password == "" || cpassword == "" || city == "000" || gender == "" || day == "000" || month == "000" || year == "000") {
		//alert ("asdasda");
		document.getElementById('cust_register_fname_errorloc').innerHTML = "Please enter a valid First Name";
		//document.getElementById('fname').style.border = "1px solid red";

		document.getElementById('cust_register_lname_errorloc').innerHTML = "Please enter a valid Last Name";
		//document.getElementById('lname').style.border = "1px solid red";

		document.getElementById('cust_register_email_errorloc').innerHTML = "Please enter an valid email address";
		//document.getElementById('email').style.border = "1px solid red";

		//document.getElementById('cust_register_confemail_errorloc').innerHTML = "Please confirm your email address";
		//document.getElementById('confemail').style.border = "1px solid red";

		document.getElementById('cust_register_password_errorloc').innerHTML = "Please enter a password";
		//document.getElementById('password').style.border = "1px solid red";

		document.getElementById('cust_register_cpassword_errorloc').innerHTML = "Please enter the same password again";
		//document.getElementById('cpassword').style.border = "1px solid red";

		document.getElementById('cust_register_city_errorloc').innerHTML = "Please select a Deal City";
		//document.getElementById('city').style.border = "1px solid red";

		document.getElementById('cust_register_gender_errorloc').innerHTML = "Select your gender";

		document.getElementById('cust_register_day_errorloc').innerHTML = "Please enter a valid Birthday";
		//document.getElementById('day').style.border = "1px solid red";
		//document.getElementById('month').style.border = "1px solid red";
		//document.getElementById('year').style.border = "1px solid red";
		return false;
	}
	if ( password !== cpassword) {
		//alert ("asdasda");
		document.getElementById('cust_register_cpassword_errorloc').innerHTML = "Password must be confirmed";
		document.getElementById('cpassword').style.border = "1px solid red";
		return false;
	}

}

function hasValue() {
	var fname = document.getElementById('fname').value;
	var lname = document.getElementById('lname').value;
	var email = document.getElementById('email').value;
	//var confemail = document.getElementById('confemail').value;
	var password = document.getElementById('password').value;
	var cpassword = document.getElementById('cpassword').value;

	var day = document.getElementById('day').value;
	var month = document.getElementById('month').value;
	var year = document.getElementById('year').value;

	if ( fname != "") {
		document.getElementById('cust_register_fname_errorloc').innerHTML = "";
		document.getElementById('fname').style.border = "1px solid #C8C8C8";
		}
	if ( lname != "") {
		document.getElementById('cust_register_lname_errorloc').innerHTML = "";
		document.getElementById('lname').style.border = "1px solid #C8C8C8";
		}
	if ( email != "" ) {
		document.getElementById('cust_register_email_errorloc').innerHTML != "";
		document.getElementById('email').style.border = "1px solid #C8C8C8";
		}
	/*if ( day != "000" || month != "000" || year != "000" ) {
		document.getElementById('cust_register_day_errorloc').innerHTML = "";
		document.getElementById('day').style.border = "1px solid #C8C8C8";
		document.getElementById('month').style.border = "1px solid #C8C8C8";
		document.getElementById('year').style.border = "1px solid #C8C8C8";
		}*/
	if ( password != "" ) {
		document.getElementById('cust_register_password_errorloc').innerHTML = "";
		document.getElementById('password').style.border = "1px solid #C8C8C8";
		}
	if ( password == cpassword) {
		document.getElementById('cust_register_cpassword_errorloc').innerHTML = "";
		document.getElementById('cpassword').style.border = "1px solid #C8C8C8";
	}
	return true;
}

</script>

<script type="text/javascript">
function ajaxReq(str)
{
var xmlhttp;
//alert(str); die();
if (str.length==0)
  {
  document.getElementById("cust_register_email_errorloc").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("cust_register_email_errorloc").innerHTML=xmlhttp.responseText;
    //document.getElementById('email').style.border = "1px solid red";
    }
  	else {
	  document.getElementById('email').style.border = "1px solid #C8C8C8";
  	}
  }
xmlhttp.open("GET","ajax_registration.php?email="+str,true);
xmlhttp.send();
}

</script>
  <!-- Registration form validator ends -->





<!-- REGISTRATION FORM & CODE END -->
	</div>

    </div>
	<div class="clear"></div>
    <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
        <div style="border-bottom: 3px solid #7fd7fb;"></div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="recomm_bot_ani"></div>
</div>



			<?php //} else { ?>

			<!-- <div class="top_recomm">
			<p>Please login to recommend deals to friends.</p>
			</div>
			<div class="clear"></div>
				<div style="border-bottom: 3px solid #7fd7fb;"></div>
				<div class="recomm_bot"></div> -->
			<?php //} ?>
		</div>
	</div>
<!-- Recom End -->

<?php include 'recommendation_popup.php';?>

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

	$sql_today = "SELECT *,DATEDIFF(`deal_end_time`,`deal_start_time`) as date_diff FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_id = '".$deal_id."' AND deal_start_time <= '".date("Y-m-d G:i:s")."' AND deal_end_time >= '".date("Y-m-d G:i:s")."'  LIMIT 0, 1";
	$today_res = mysql_fetch_array(mysql_query($sql_today));

	$sql_todays_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$today_res['deal_id'];
	$total_buy = mysql_fetch_array(mysql_query($sql_todays_buy));

	$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
	$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));

}
elseif(($_GET['id'] != ''))
{
	$deal_id = $_GET['id'];
	$sql_today = "SELECT *,DATEDIFF(`deal_end_time`,`deal_start_time`) as date_diff FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_id = '".$deal_id."' AND deal_start_time <= '".date("Y-m-d G:i:s")."' AND deal_end_time >= '".date("Y-m-d G:i:s")."'  LIMIT 0, 1";
	$today_res = mysql_fetch_array(mysql_query($sql_today));

	$sql_todays_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$today_res['deal_id'];
	$total_buy = mysql_fetch_array(mysql_query($sql_todays_buy));

	$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
	$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));
}
else {
$city = end(explode("|",$_COOKIE['subscribe']));
	$sql_today = "SELECT *, DATEDIFF(`deal_end_time`,`deal_start_time`) as date_diff FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_start_time <= '".date("Y-m-d G:i:s")."' AND deal_end_time >= '".date("Y-m-d G:i:s")."' AND city = $city LIMIT 0, 1";
	//$sql_today = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_end_time LIKE '".date("Y-m-d")."%' LIMIT 0, 1";
	$today_res = mysql_fetch_array(mysql_query($sql_today));

	$num_rows = mysql_num_rows(mysql_query($sql_today)) ;

		if ($num_rows > 0) {

			$sql_todays_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$today_res['deal_id'];
			$total_buy = mysql_fetch_array(mysql_query($sql_todays_buy));

			$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
			$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));

		}
}	// end else
$_SESSION['current_deal_id'] = $today_res['deal_id'];
?>

<?php if ($num_rows > 0 || $_GET['action'] == "sold" || $_GET['action'] == "view") { ?>

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

	  <div class="deal_left">

       <div class="pric"><span>&pound;<?php echo ($today_res['discounted_price']); ?></span></div>

	  <div class="blue_box" style="margin-top:55px;">
	  <div class="timer_box2">
	  <ul>
	  <li><p>Value<br/><span>&pound;<?php echo $today_res['full_price']; ?></span></p></li>
	  <li><p>Discount <br/><span><?php echo $today_res['discount']; ?></span></p></li>
	  <li style="border-right: 0;"><p>Saving<br/><span>&pound;<?php echo $today_res['savings']; ?></span></p></li>
	  </ul>
	  </div>
	  </div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	<?php //if ($_GET['action'] == "view") { ?>
	  <div class="blue_box">
	  <div class="timer_box1">
	  <ul>
	  <li><img src="images/gift.gif" alt="" width="42" height="35" /></li>
	  <li><p><a href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>&gift=gifting">Buy it for a friend!</a></p></li>
	  <!-- id="gift" href="#giftdiv" -->
	  </ul>
	  </div>
	  </div>

	<?php //} ?>

<div style="display: none;">
		<div id="giftdiv" style="width:701px;height:px;overflow:auto; background-color: transparent;">
	<?php //if (isset($_SESSION['user_id'])) {?>

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
		<?php //} else { ?>
		<!--
		<div class="top_recomm">
			<p>Please login to Gift deals to friends.</p>
		</div>
		<div class="clear"></div>
		<div style="border-bottom: 3px solid #7fd7fb;"></div>
		<div class="recomm_bot"></div>
		 -->
		<?php //} ?>
		</div>
</div>



<?php if ($_GET['action'] != "sold") { ?>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	  <div class="blue_box">
	  <div><h3>Time left to buy this deal:</h3></div>

	<?php
	  //if($today_res['date_diff'] != 0)
	  //{
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
	  //if($today_res['date_diff'] != 0)
	  //{
	  ?>
	var cd<?php echo $today_res['deal_id'];?>a   = new countdown('cd<?php echo $today_res['deal_id'];?>a');
	cd<?php echo $today_res['deal_id'];?>a.Div   = "clock<?php echo $today_res['deal_id'];?>a";
	cd<?php echo $today_res['deal_id'];?>a.TargetDate = "<?php echo $last_deal_time;?>";
	cd<?php echo $today_res['deal_id'];?>a.CurDate  = "<?php echo $time_now;?>";
	cd<?php echo $today_res['deal_id'];?>a.DisplayFormat = "<span  style='margin: 0 0 0 5px;'>%%D%%</span>";
	<?php
	//}
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
	  //if($today_res['date_diff'] != 0)
	 // {
	  ?>
		  <li class="hours"><p style="padding:5px 0 0 0;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>a"></span><br/><span>Days</span></p></li>
		<?php
		//}
		?>
		  <li class="hours"><p style="padding:5px 0 0 0;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>b"></span><br/><span>Hrs.</span></p></li>
		  <li class="hours"><p style="padding:5px 0 0 0px;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>c"></span><br/><span>Min.</span></p></li>
		  <li class="hours"><p style="padding:5px 0 0 0px;"><span class="txt2" id="clock<?php echo $today_res['deal_id'];?>d"></span><br/><span>Sec.</span></p></li>
	  </ul>



 <script language="javascript">
 <?php
	 // if($today_res['date_diff'] != 0)
	  //{
	  ?>
 				cd<?php echo $today_res['deal_id'];?>a.Setup();
				<?php
				//}
				?>
				cd<?php echo $today_res['deal_id'];?>b.Setup();
				cd<?php echo $today_res['deal_id'];?>c.Setup();
				cd<?php echo $today_res['deal_id'];?>d.Setup();
			</script>

	  </div>
	<?php //} //else { ?>
<!--
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
 -->
	<?php //} ?>
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
	<li><a <?php if (isset($_SESSION['user_id'])) { ?>href="#inline1" id="various2" <?php } else { ?>href="<?php echo SITE_URL; ?>recomendation.php"<?php } ?>>Email</a></li>
	<!-- <li><img src="images/facebook.png" alt="" width="19" height="18" /></li> -->
	<li><a name="fb_share" type="icon_link" share_url="<?php echo SITE_URL; ?>index.php?action=view&id=<?php echo $today_res['deal_id']; ?>">Facebook</a>
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
	  <?php
	  if($todays_image['file'] == '')
	  {
	  ?>
	  	<div>
	  		<?php if ($_GET['action'] == "sold") { ?>
	  		<div style="position:absolute; width: 113; height: 116px; margin-left: 326px;"><img src="images/youmissed.png" alt="" width="113" height="116" border="0" /></div>
	  		<?php } ?>
	  		<img src="images/no_img2.jpg" alt="" width="439" height="293" />
	  	</div>
	  <?php
	  }
	  else
	  {
	  ?>
  		<div>
			<?php if ($_GET['action'] == "sold") { ?>
	  		<div style="position:absolute; width: 113; height: 116px; margin: 0 0 0 326px;"><img src="images/youmissed.png" alt="" width="113" height="116" border="0" /></div>
	  		<?php } ?>
			<img src="<?php echo UPLOAD_PATH.$todays_image['file']; ?>" alt="" width="439" height="293" />
		</div>
  	  <?php
	  }
	  ?>
  <div class="highlights">
		<?php if ($_GET['action'] != "sold") { ?><a href="<?php echo SITE_URL; ?>customer-payment.php?item=<?php echo $today_res['deal_id']; ?>"><?php } ?><h1 style="padding: 0;"><span style="color:#5b8f32; text-transform:uppercase;">Todays deal : </span><?php echo strip_tags($today_res['title']); ?></h1><?php if ($_GET['action'] != "sold") { ?></a><?php } ?>

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
  	 <ul style="float:left; width:49%; padding-bottom: 15px;">
     	<li style="padding:0px 0 0 10px; list-style-image:url(images/bullet_new.gif); list-style-position: inside; font: bold 11px/13px Arial, Helvetica, sans-serif; color: #000;">Get amazing deals everyday</li>
        <li style="padding:17px 0 0 10px; list-style-image:url(images/bullet_new.gif); list-style-position: inside; font: bold 11px/13px Arial, Helvetica, sans-serif; color: #000;">Shop online the smarter way</li>
     </ul>
      <ul style="float:right; width:49%; padding-bottom: 15px;">
     	<li style="padding:0px 0 0 10px; list-style-image:url(images/bullet_new.gif); list-style-position: inside; font: bold 11px/13px Arial, Helvetica, sans-serif; color: #000;">We have deals near you</li>
        <li style="padding:17px 0 0 10px; list-style-image:url(images/bullet_new.gif); list-style-position: inside; font: bold 11px/13px Arial, Helvetica, sans-serif; color: #000;">Enjoy life like never before</li>
     </ul>
  </div>

</div>
</div>
<?php } else { //header('location:'.SITE_URL.'nodeal.php?id='.$city); ?>
<!-- <h3><br>There is no deal at this city right now! <br><br>Please visit later. Thanks<br></h3> -->

<!-- ################################################################# -->





<div class="midbg">
<div class="today_deal">



<a id="nodeal_info" href="#more_info_div">

<div class="tab_button_more_info" style="margin-top: 125px;">
<ul>
<li></li>
<li><img src="images/spacer.gif" alt="" width="32" height="1" /></li>
<li style="margin: 7px 0;"> <!-- <img src="images/more_info.png" alt="" width="279" height="51" border="0" /> --> </li>
</ul>
</div>
</a>
						<?php
							$sql_nodeal_city = "SELECT * FROM ".TABLE_CITIES." WHERE city_id = $city";
							$result_nodeal_city = mysql_query($sql_nodeal_city);
							$row_nodeal_city = mysql_fetch_array($result_nodeal_city);
						?>
	  <div style="font: bold 28px/30px Arial, Helvetica, sans-serif; color: #000000; padding: 4px 10px;">COMING SOON: THE BEST DEALS THAT <?php echo strtoupper($row_nodeal_city[city_name]); ?> HAS TO OFFER</div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="1" /></div>
	  <div class="pric"><span>&pound;10</span></div>
	  <div class="deal_left">
	   <div class="blue_box" style="margin-top: 50px;">
	  <div class="timer_box2">
	  <ul>
	  <li style="width: 50%"><h3>Discount<br/><span>90%</span></h3></li>
	  <li style="border-right: 0;"><h3>Savings<br/><span>&pound;90</span></h3></li>
	  </ul>
	  </div>
	  </div>
	<!--  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	  <div class="blue_box">
	  <div class="timer_box1">
	  <ul>
	  <li><img src="images/gift.gif" alt="" width="42" height="35" /></li>
	  <li><p>Buy it for a friend!</p></li>
	  </ul>
	  </div>
	  </div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	  <div class="blue_box">
	  <div><h3>Time left to buy this deal:</h3></div>
	  <div class="timer_box">
	  <ul>
	  <li><p>05<br/><span>Hrs.</span></p></li>
	  <li><p>05<br/><span>Min.</span></p></li>
	  <li><p>05<br/><span>Sec.</span></p></li>
	  </ul>
	  </div>
	  </div>
	  <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	  <div class="blue_box">
	<div class="brought" style="border-bottom:0px;">
   <div class="font24px" >191 Bought!</div>
	<div>
	<ul>
	<li><img src="images/icon_tick.png" alt="" width="30" height="28" style="margin: 0px -15px 0 15px; float:left;"/></li>
	<li style="padding: 10px 0 0 4px;">Deal is on!</li>
	</ul>
	</div>
     </div>
	  </div>-->
	   <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
	   <div style="width: 208px; float: none; margin: 50px auto;">
	   <div style="margin: 10px auto;"><img src="images/f1.gif" alt="" width="208" height="25" /></div>
	   <div style="margin: 10px auto;"><img src="images/f2.gif" alt="" width="221" height="25" /></div>
	   <div style="margin: 10px auto;"><img src="images/f3.gif" alt="" width="221" height="25" /></div>
	   <div style="margin: 10px auto;"><img src="images/f4.gif" alt="" width="221" height="25" /></div>
	   <div style="margin: 10px auto;"><img src="images/f5.gif" alt="" width="221" height="25" /></div>
	   <div style="margin: 10px auto;"><img src="images/f6.gif" alt="" width="221" height="25" /></div>
	   </div>
	   </div>
	  <div class="box683_right">
  <div><img src="images/coming_soon.jpg" alt="" width="401" height="342" style="margin-top: -60px;"/></div>
  <div class="highlights">
    <ul style="width:200px; float: left; margin: 0 auto;">
      <li style="width:200px; list-style-type: none; margin: 0;">
        <h2>Highlights</h2>
      </li>
      <li style="width:200px;">The best deals in your city searched out by our expert team</li>
      <li style="width:200px;">A wide range of fun things to do, places to go, restaurants to visit, beauty treatments to enjoy...and much more</li>
    </ul>
    <ul style="width:196px; float: right; margin: 0 8px;">
      <li style="width:196px; list-style-type: none; margin: 0;">
        <h2>The Fine Print</h2>
      </li>
      <li style="width:196px;">Simply register and receive an email the morning our amazing offers go live</li>
	  <li style="width:196px;">Remember,they are only available to buy for 24hrs. so snap them up quick!</li>
    </ul>
  </div>
</div>
</div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
</div>


<div style="display: none;">
	<div id="more_info_div" >


		<div style="border: 0px solid red;">
		<div class="moreinfo_top"></div>
		<div class="moreinfo_mid">
		<div class="info_midbg">
		<div><h1>Never miss a deal again</h1></div>
		<div class="clear"></div>
		<div style="float: left; width: 216px; margin: 0 auto;"><img src="images/coming_small.gif" alt="" width="216" height="167"/></div>
		<div style="float: right; width: 530px; margin: 30px auto;">
		<div class="soon">COMING SOON</div>
		<div><p>Discover your city for up to 90% off. See your city in a brand new light with GeeLaza. We will provide with deals that are simply too good to be missed. We have revolutionised the way people buy deals online. GeeLaza brings exciting deals up to 90% off every single day. All deals on GeeLaza are the best of their kind. Subscribe today to never miss a deal again and be the first to hear about our new deals.</p></div>
		</div>
		<div class="clear"></div>
		<div class="subs_box">
		<div class="top_cur"></div>
		<div class="mid_cur">
		<div>
		<p>Subscribe to GeeLaza newsletters and find out when this or similar deal is
		available again. Subscribing is not registering so to get full access and take advantage of the GeeLaza user account, register by clicking <a href="<?php echo SITE_URL.'customer-register.php'; ?>">here</a>.</p>
		</div>
		<div>

		<?php
			if ($_POST['email_subs_btn2'] && $_POST['email_subs_btn2'] == "Submit") {
						$subs_email = $_POST['email_subs2'];
						$date = date("Y-m-d");

						if (!empty($_GET['nd'])) {
							$buttonlink = SITE_URL.'national_deals.php?nd=National%20deals';
						}
						else {
							$buttonlink = SITE_URL.'index.php?city='.$city;
						}

					$chkNewsletterSql = mysql_query("SELECT email FROM ".TABLE_NEWSLETTER." WHERE email = '".$subs_email."' AND city = ".$city);
					//mysql_num_rows(mysql_query($chkNewsletterSql));
					if (mysql_num_rows($chkNewsletterSql) <= 0) {

						$subscribe_sql = "INSERT INTO ".TABLE_NEWSLETTER." (ns_id, email, city, status, date_added) VALUES (NULL, '$subs_email', '$city', 1, '$date')";
						mysql_query($subscribe_sql);
						header('location:'.SITE_URL.'?newssucc=You have successfully subscribed to GeeLaza UK newsltter for '.$row_nodeal_city[city_name].' with the following email address: '.$subs_email);
					} else {
						header('location:'.SITE_URL.'?errnewssucc=The email address '.$subs_email.' is already subscribed to GeeLaza UK newsletter for '.$row_nodeal_city[city_name].'.');
					}

			}

		?>


		<form name="frm_email_subs2" method="post" onsubmit="javascript: return chk_email_subs2();">
		  <table width="100%" align="center" border="0" cellspacing="3" cellpadding="3" class="submit_box">
		    <tr>
		      <td width="31%">Your email address</td>
		      <td width="69%"><strong>The GeeLaza Promise</strong></td>
		    </tr>
		    <tr>
		      <td><input type="text" class="fieldbg_30" name="email_subs2" id="email_subs2" value="Enter your email address" onclick="this.value=''"/><div id="email_subs_error_loc2" class="error_orange"></div></td>
		      <td>If you have any issue with using GeeLaza, please contact us and we promise we will make it right</td>
		    </tr>
		    <tr>
		      <td><input type="submit" class="log_in" name="email_subs_btn2" id="email_subs_btn2" value="Submit"/></td>
		      <td>&nbsp;</td>
		    </tr>
		  </table>
		  </form>

				<script type="text/javascript">
					function chk_email_subs2() {
						var email = document.getElementById('email_subs2').value;
						//alert(email);
						if (email == "" || email == "Enter your email address") {
							document.getElementById('email_subs_error_loc2').innerHTML = "Enter your email address";
							return false;
						}
					}
				</script>

		</div>
		</div>
		<div class="bot_cur"></div>
		</div>
		</div>
		</div>
		<div class="moreinfo_bot"></div>
		</div>


	</div>
</div>



<!-- ###################################################################### -->

<?php } ?>




<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="4" /></div>
</div>


<div class="botbg">

<div style="width: 200px;  height: auto; margin: 5px 0 0 15px ; z-index: 1000; float: right;">

<div style="float: right; width: 80px; display:inline-block; margin-right: 10px;">
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
	<a href="https://twitter.com/share" class="twitter-share-button" data-via="unifiedinfotech" data-lang="en" data-related="santanu_patra"	data-hashtags="santanu_patra">Tweet</a>
</div>

<div  id='fb-root' style="float:right; margin-right: 0; width: 80px; height: 20px;">
<b:if cond='data:blog.pageType == "item"'>
<script>
window.fbAsyncInit = function(){
FB.init({appId: '197123393709565', status: true, cookie: true,
xfbml: true});
};
(function(){
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol+
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
<div style="background: #FFFFFF; margin: 10px auto;float: left; border: 0; width: 704px; height: auto; overflow: hidden;display:none">
<?php
$city = end(explode("|",$_REQUEST['subscribe']));
$sqldeallist = "select * from ".TABLE_DEALS." where city = '".$city."' and deal_id != '".$today_res['deal_id']."' and in_sidebar != 'y' order by deal_id";
$resdeallist = mysql_query($sqldeallist);
 $numdeallist = mysql_num_rows($resdeallist);
if($numdeallist == 1){
	while($rowdeallist = mysql_fetch_array($resdeallist)){
		$sqldealimagelist = mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$rowdeallist['deal_id'].""));
?>
<div class="images_box" style="text-align:center;">
<a href="index.php?id=<?php echo $rowdeallist['deal_id']; ?>"><img src="<?php echo UPLOAD_PATH.$sqldealimagelist['file']; ?>" alt="" width="192" height="223" hspace="4" vspace="4"/></a><br/><span><a href="index.php?id=<?php echo $rowdeallist['deal_id']; ?>"><?php echo substr(stripslashes($rowdeallist['title']),0,50); ?></a></span>
</div>
<div class="images_box">
<img src="images/no_img.jpg" alt="" width="192" height="223" hspace="4" vspace="4"/><br/><span>No Deal......................
....................</span>
</div>
<div class="images_box">
<img src="images/no_img.jpg" alt="" width="192" height="223" hspace="4" vspace="4"/><br/><span>No Deal......................
....................</span>
</div>
<?php}}
elseif($numdeallist == 2){
	while($rowdeallist = mysql_fetch_array($resdeallist)){
		$sqldealimagelist = mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$rowdeallist['deal_id'].""));
?>
<div class="images_box" style="text-align:center;">
<a href="index.php?id=<?php echo $rowdeallist['deal_id']; ?>"><img src="<?php echo UPLOAD_PATH.$sqldealimagelist['file']; ?>" alt="" width="192" height="223" hspace="4" vspace="4"/></a><br/><span><a href="index.php?id=<?php echo $rowdeallist['deal_id']; ?>"><?php echo substr(stripslashes($rowdeallist['title']),0,50); ?></a></span>
</div>
<div class="images_box">
<img src="images/no_img.jpg" alt="" width="192" height="223" hspace="4" vspace="4"/><br/><span>No Deal......................
....................</span>
</div>
<?php}}
elseif($numdeallist == 3){
	while($rowdeallist = mysql_fetch_array($resdeallist)){
		$sqldealimagelist = mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$rowdeallist['deal_id'].""));
?>
<div class="images_box" style="text-align:center;">
<a href="index.php?id=<?php echo $rowdeallist['deal_id']; ?>"><img src="<?php echo UPLOAD_PATH.$sqldealimagelist['file']; ?>" alt="" width="192" height="223" hspace="4" vspace="4"/></a><br/><span><a href="index.php?id=<?php echo $rowdeallist['deal_id']; ?>"><?php echo substr(stripslashes($rowdeallist['title']),0,50); ?></a></span>
</div>
<?php}}
elseif($numdeallist == 0){
?>
<div class="images_box">
<img src="images/no_img.jpg" alt="" width="192" height="223" hspace="4" vspace="4"/><br/><span>No Deal</span>
</div>
<div class="images_box">
<img src="images/no_img.jpg" alt="" width="192" height="223" hspace="4" vspace="4"/><br/><span>No Deal</span>
</div>
<div class="images_box">
<img src="images/no_img.jpg" alt="" width="192" height="223" hspace="4" vspace="4"/><br/><span>No Deal</span>
</div>
<?php}
elseif($numdeallist > 3){
?>



<!-- jquery carousel code added here -->


<script type="text/javascript" src="carousel/lib/jquery-1.4.2.min.js"></script>
<!--
  jCarousel library
-->
<script type="text/javascript" src="carousel/lib/jquery.jcarousel.min.js"></script>
<!--
  jCarousel skin stylesheet
-->
<link rel="stylesheet" type="text/css" href="carousel/skins/tango/skin.css" />
<script language="javascript">
$j = jQuery.noConflict();

$j(document).ready(function(){
    $j('#mycarousel').jcarousel();
});


//jQuery(document).ready(function(){
//    jQuery('#mycarousel').jcarousel();
//});



</script>
<!-- Jquery Carousel code end here -->

<style>
.images_box ul li{
	width: 208px;
	height: 275px;
	background: #f5f5f7;
	border: 1px solid #cccccd;
	float: left;
	margin: 14px 12px;
	overflow: hidden;
	text-align: center;
	vertical-align: middle;}
.images_box span ul li{
	margin: 0;
	padding: 0;
	font: bold 12px/18px Tahoma, Arial, Helvetica, sans-serif;
	color: #595959;
	text-align: left;
	padding: 5px 4px;
	vertical-align: middle;}
</style>


<div>


  <ul id="mycarousel" class="jcarousel-skin-tango">
  <?php

  while($rowdeallist = mysql_fetch_array($resdeallist)){
		$sqldealimagelist = mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$rowdeallist['deal_id'].""));
  ?>
    <li class="images_box">


    <a href="index.php?id=<?php echo $rowdeallist['deal_id']; ?>"><img src="<?php echo UPLOAD_PATH.$sqldealimagelist['file']; ?>" alt="" width="185" height="213" hspace="4" vspace="4"/></a><span><a href="index.php?id=<?php echo $rowdeallist['deal_id']; ?>"><?php echo substr(stripslashes($rowdeallist['title']),0,50); ?></a></span></li>
    <?php}
	?>
    <!--<li class="images_box"><img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="192" height="223" alt="" /></li>
    <li class="images_box"><img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="192" height="223" alt="" /></li>
    <li class="images_box"><img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="192" height="223" alt="" /></li>
    <li class="images_box"><img src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg" width="192" height="223" alt="" /></li>
    <li class="images_box"><img src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg" width="192" height="223" alt="" /></li>
    <li class="images_box"><img src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg" width="192" height="223" alt="" /></li>
    <li class="images_box"><img src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg" width="192" height="223" alt="" /></li>
    <li class="images_box"><img src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg" width="192" height="223" alt="" /></li>
    <li class="images_box"><img src="http://static.flickr.com/70/229228324_08223b70fa_s.jpg" width="192" height="223" alt="" /></li>-->
  </ul>

</div>
<?php}
?>

</div>

<div class="clear"></div>

<?php if ($num_rows > 0 || $_GET['action'] == "sold" || $_GET['action'] == "view") { ?>
<div id="dealbg_bot">

		<script type="text/javascript" language="javascript">
	<!--
		function show_tab(ID){
			for(i=1; i<=5; i++){
				document.getElementById("myaccount_"+i).style.display = "none";
				/*document.getElementById("tab_"+i).style.backgroundPosition = "";
				document.getElementById("stab_"+i).style.backgroundPosition = "";
				document.getElementById("stab_"+i).style.color = "";
				document.getElementById("tab_"+i).style.color = "";*/
				$('#tab_'+i).removeClass('here');
				/*if (i == 2){
					document.getElementById("myaccount_"+i+"_b").style.display = "none";
					}*/
}
			document.getElementById("myaccount_"+ID).style.display = "block";
			/*document.getElementById("tab_"+ID).style.backgroundPosition = "0% -29px";
			document.getElementById("stab_"+ID).style.backgroundPosition = "100% -29px";
			document.getElementById("tab_"+ID).style.color = "#000";
			document.getElementById("stab_"+ID).style.color = "#000";*/

			$('#tab_'+ID).addClass('here');

			/*if (ID == 2){
				document.getElementById("myaccount_"+ID+"_b").style.display = "block";
				}*/
}

		//-->
	</script>
<div class="clear"></div>


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
		<?php echo $today_res['postage']; ?>

	</div>
	<!-- 5 ends here  -->

	<div class="TabbedPanels1 dealbg_right" id="myaccount_6" style="display:none;">6
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
<?php } else { ?>


<div style="width: 704px; float: left; margin: 10px auto; background: #FFFFFF;">
<div class="dealbg_left30">
<div>
<p>COMING SOON: THE BEST DEALS THAT THAT  <?php echo strtoupper($row_nodeal_city[city_name]); ?> HAS TO OFFER</p><br/>
<span><strong>Discover your City for up to 90% off!</strong></span><br/><br/>
<span>See your city in a brand new light with GeeLaza. New and disverse deals on
restaurants, leisure, spa, beauty and sport bring GeeLaza customers excitement for up to 90% less, every single day.<br/><br/>

But it's not just about presenting deals. GeeLaza is a city guide with a difference. Let GeeLaza take you on a journey of discovery with unrivalled deals on the best your city has to offer-all for unbeatable prices.</span>.<br/><br/>
<span><strong>Earn extra cash by recommending GeeLaza:</strong>.<br/><br/>
Recommend your favorite offers to friends, relatives and colleagues who haven't heard of GeeLaza. If someone buys a deal which you’ve recommended to them then you receive 5 GeeLaza credit. The best thing is. With friends and family on board. You can experience the best of your city has to offer with those who matter most..<br/><br/>
You can recommend GeeLaza in number of ways :  via <a href="#">Facebook</a>, Or <a href="#">Twitter</a>..<br/>
<br/>
<strong>Gift Giving  with a Difference:</strong>.<br/><br/>
Presents are meant to be special but fining a suitable gift for those pocky loved-ones is not always an easy task. The solutions is simple, with Geelaza’s exciting. Original and diverse range of offers it’s  almost impossible to go wrong.  Shopping with GeeLaza  is  stress free and  uncomplicated, all you have to do is buy, print and give..<br/><br/>
<p>COMING SOON.</p>
The best deals, in your city
</span>
</div>
</div>
<!--<div class="dealbg_right">
<div>
<p>The Stuart Hotel</p>
<span>
119 London Road<br/>
Derby DE1 2QR<br/>
<a href="#">http://www.thestuart.com</a></span></div>
<div class="clear"></div>
<div style="margin: 12px auto;"><img src="images/map.gif" alt="" width="189" height="172" class="border"/></div>
<div class="clear"></div>
<div style="margin: 12px auto;"><p>The Stuart Hotel presented by GeeLaza.co.uk</p></div>
<div>If you have any question then please don't hesitate to ask GetDeala now.</div>
<div style="margin: 10px auto;"><a href="#"><img src="images/askme.gif" alt="" width="173" height="36" border="0" /></a></div>
</div>-->
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="40"/></div>
</div>

<?php } ?>
</div>


<div id="email-form" class="LB-white-content" style="background: url(images/bodybg.jpg) left top repeat; margin:0;">
	<a id="close" href="" onclick="HideLightBox(); return false;"></a>

		<div class="subscribe_box">
		<!--<div id="cross"><a href="#"><img src="images/cross_white.gif" alt="" width="22" height="32" border="0" /></a></div>
		-->
        <div class="title_txt" style="font-size: 27px; font-family:Georgia, 'Times New Roman', Times, serif;">We give you the best daily deals in your city!</div>
        <div class="title_txt2" style="font-family:Georgia, 'Times New Roman', Times, serif;">Save up to 90% in restaurants, spas, cinemas, gyms, event and many more...</div>
		<div class="clear"></div>
		<form name="select_city" id="select_city" action="<?php echo $_SERVER["PHP_SELF"]?>">
		<div id="subscribe">
		<ul>
		<li style="width: 450px; float: left; margin-top: 20px;">
			<div id="email_check" style="float: left;"></div>
			<input type="text" name="email" id="email_subscript" class="white_box2" value="Enter your email address" style="font-family: Georgia, 'Times New Roman', Times, serif; color:#999999; font-size: 18px; font-weight: normal;" onclick="javascript: if (this.value == 'Enter your email address') { this.value = '' };" onblur ="javascript: if (this.value == ''){ this.value = 'Enter your email address' }; "/>
		</li>
		<li style="margin: 8px 0 0 40px;">
			<div id="city_check" style="float: left;"></div>
			<select name="city" id="city" class="text_select">
                        <option value="" style="font-family: Georgia, 'Times New Roman', Times, serif; font-size:18px; font-weight: normal; color:#999999;">Choose your city</option>
                        <option value="National deal" id="nd">National Deal</option>
                        <?php
							$sql_cities = "SELECT * FROM ".TABLE_CITIES." GROUP BY city_name";
							$result_cities = mysql_query($sql_cities);
							while($row_cities = mysql_fetch_array($result_cities)){
								?>
                        <option value="<?php echo $row_cities["city_id"]; ?>"><?php echo $row_cities["city_name"]; ?></option>
                        <?php}
							?>
              </select>
			<input type="button" name="Submit" class="subs_btn" value="Sign up now" id="city_submit" onclick="javascript: return getSubscribeValues(this.id);"/>
		</li>
		<!--<li style="margin: 8px 0 0 90px;">By subscribing I agree the <a href="#">Terms & Conditions</a> and <a href="#">Provacy Policy</a>.</li>-->
		</ul>
		</div>
		</form>

		<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="150" border="0" /></div>
		<!--<div class="skip"><a href="#">Skip>></a></div>
		<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" border="0" /></div>-->

		<!--<div class="fit_box"><img src="images/img4.jpg" alt="" width="150" height="100" />
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
		</div>-->

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="65%">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="share_box1">
                  <tr>
                    <td>
                    	<ul class="tick_list">
                            <li>One email a day with at least 50% off the best brands.</li>
                            <li>No spam ever, unsubscribe with just one click</li>
                        </ul>
                    </td>
                  </tr>
                  <tr>
                  	<td><p style="float:left;"><a href="<?php echo SITE_URL;?>?city=31" style="text-decoration:none;">Already a member?</a></p> <p style="float:right;">
                  	<a href="<?php echo SITE_URL; ?>page.php?page=Privacy%20Policy" style="text-decoration:none;">Our Privacy Policy</a></p></td>
                  </tr>
                </table>
            </td>
            <td width="30%">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="share_box2">
                  <tr>
                    <td><img src="images/no_1.png" alt="" border="0" /></td>
                    <td>Buy</td>
                    <td><img src="images/no_2.png" alt="" border="0" /></td>
                    <td>Share</td>
                    <td><img src="images/no_3.png" alt="" border="0" /></td>
                    <td style="padding-right:10px;">Enjoy</td>
                  </tr>
                </table>

            </td>
          </tr>
        </table>


		</div>
</div>

<?php include ('include/sidebar.php'); ?>

<?php include ('include/footer.php'); ?>