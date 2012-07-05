<?php
ob_start();
session_start();

require("config.inc.php");
require("class/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);			
$db->connect();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="imagestoolbar" content="no" />
	<title>Welcome to our site</title>
	<link href="css/getdeals_style.css" rel="stylesheet" type="text/css" />
	
		
	<!--<link href="css/base.css" rel="stylesheet" type="text/css" />-->
	
	<link href="css/nav.css" rel="stylesheet" type="text/css" />
     <script type="text/javascript" src="js/city.js"></script>
	 
	 

	 
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.dd.js"></script>
		<script type="text/javascript" src="js/jquery.bxSlider.js"></script>
		 <script src="js/overlib.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/dd.css" />
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

		--><!--<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css"/>-->
	<script type="text/javascript">

/*	$(function(){
	  $('#mainDealBox').bxSlider({
		mode: 'fade',
		captions: true,
		auto: true,
		controls: false
	  });
	}); */
	  
	</script>

	 
</head>

<body>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<div id="fb-root"></div>
<script type="text/javascript">
		FB.init
		(
			{
				appId: '192309027517422', 
				status: true,
				cookie: true, xfbml: true
			}
		);
		
		FB.Event.subscribe('auth.login', function(response) 
		{
			window.location.reload();
		});
</script>
<?php 
			function get_facebook_cookie($app_id, $app_secret) 
			{
			$args = array();
			parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
			ksort($args);
			$payload = '';
			foreach ($args as $key => $value) 
			{
				if ($key != 'sig') 
				{
					$payload .= $key . '=' . $value;
				}
			}
			
			if (md5($payload . $app_secret) != $args['sig']) 
			{
				return null;
			}
			
			return $args;
			}

?>

<!--start maincontainer-->
<!--start head-->
<?php 

	$city = end(explode('|', $_COOKIE['subscribe']));
	$sql_show_city = "SELECT * FROM ".TABLE_CITIES." WHERE city_id = $city";
	$show_city = mysql_fetch_array(mysql_query($sql_show_city));
	
	if ($_GET['city'] != "") {
		header('location:'.SITE_URL.'city_cookie.php?city='.$_GET['city'] );
		
	}
?>

<?php 

	$country = 225;
	
	$sql_city = "SELECT * FROM ".TABLE_CITIES."  WHERE country_id = $country GROUP BY city_name ASC";
	$result_city = mysql_query($sql_city);
	$row_city_1 = mysql_fetch_array($result_city);
?>
<div id="locations" class="locations">
 	<div id="citySelectBox" style=" ">
 	

 		<ul style="margin: 0 0 0 0px;" id="jCitiesSelectBox">
	            
				<?php
					$c = 0; 
					while($row_city = mysql_fetch_array($result_city)) {
						$c++;
				?>
					<li <?php //if ($c == 5) { echo 'style="border-right: none;"'; } ?>>
						<span>
							<a href="<?php echo SITE_URL."?city=".$row_city["city_id"]; ?>"> <?php echo $row_city["city_name"]; ?> </a>
						</span>
					</li>
				<?php } ?>
				
	    </ul>    
	   
	  <!-- 		<li><span>Aberdeen</span></li>
	            <li><span>Bath</span></li>
	            <li><span>Belfast</span></li>
	            <li><span>Birmingham</span></li>
	            <li><span>Blackpool</span></li>
				<li style="border-right: none;"><span>Aberdeen</span></li>
				
				<li><span>Aberdeen</span></li>
	            <li><span>Bath</span></li>
	            <li><span>Belfast</span></li>
	            <li><span>Birmingham</span></li>
	            <li><span>Blackpool</span></li>
				<li style="border-right: none;"><span>Aberdeen</span></li>
				
				<li><span>Aberdeen</span></li>
	            <li><span>Bath</span></li>
	            <li><span>Belfast</span></li>
	            <li><span>Birmingham</span></li>
	            <li><span>Blackpool</span></li>
				<li style="border-right: none;"><span>Aberdeen</span></li>
				
				<li><span>Aberdeen</span></li>
	            <li><span>Bath</span></li>
	            <li><span>Belfast</span></li>
	            <li><span>Birmingham</span></li>
	            <li><span>Blackpool</span></li>
				<li style="border-right: none;"><span>Aberdeen</span></li> -->
	          
	   
  </div>
	  <div class="clear"></div>
	  <div class="natioanl_D"><a href="#">National deals</a></div>
</div>
<div id="maindiv">
<div class="header_main">
<div id="header">

	<div class="header_left"><a href="<?= SITE_URL ?>"><img src="images/logo.gif" alt="" width="171" height="107" border="0"/></a></div>
				
				<div class="city">Select your city:<br/>
				<!--<select name="websites2" id="websites1" style="width:177px;" class="styled" tabindex="1">
				<option name="one" value="msDropDown1" selected="selected" class="img_none"> <?php echo strtoupper($row_city_1["city_name"]); ?> </option>
				<?php
					/*while($row_city = mysql_fetch_array($result_city))
					{*/
						?>
						<option  name="two" value="PrototypeCombobox1"  class="img_none"> <?php echo $show_city['city_name']; ?> </option>
						<?php
					/*}*/
				?>
				</select>
				-->
				<div class="select" id="click"><?php echo strtoupper($show_city["city_name"]); ?><div style="float: right; margin:0 0 0 20px; width:39px; height:38px;"><img src="images/drop_r.png" alt="" width="39" height="38" border="0"/></div></div>
				</div>		
				
				<div class="header_right">
				<div class="registration">
				
				<div class="txt_box">
				<input name="textfield" type="text" class="text_field" id="textfield" value="Get deals by email" onclick="this.value=''" onblur="this.value='Get deals by email'" />
				<input class="submit_btn" type="submit" name="button" id="button" value="SUBSCRIBE" />
				</div>
				
				<script type="text/javascript">
				$(document).ready(function() {
				var toggle = function(direction, display) {
				 return function() {
				   var self = this;
				   var ul = $("ul", this);
				   if( ul.css("display") == display && !self["block" + direction] ) {
					 self["block" + direction] = true;
					 ul["slide" + direction]("slow", function() {
					   self["block" + direction] = false;
					 });
				   }
				 };
				}
				$("li.menu").hover(toggle("Down", "none"), toggle("Up", "block"));
				$("li.menu ul").hide();
				});
				
				</script>
				
				
				<?php
				if ($cookie || $_SESSION['fbuser'] == TRUE) {
				?>
				<div><a href="<?= SITE_URL ?>customer-account.php">My Account</a> | 
				
					<!--<?php if ($cookie) { ?>
					<fb:login-button perms="email" autologoutlink="true" onlogin="window.location.reload()"></fb:login-button>
					<?php unset($_SESSION['fbuser']); ?>
					<?php } else { ?>
					<fb:login-button perms="email" autologoutlink="true">Login with facebook</fb:login-button> 
					<?php //header("location:".SITE_URL."customer-account.php"); ?>
					<?php } ?>-->
				
				</div>
				
				<?php 
				}
				elseif(!isset($_SESSION["user_id"]))
				{
				?>
				<div><a href="<?= SITE_URL ?>customer-login.php">Login</a>|<a href="<?= SITE_URL ?>customer-register.php">Register</a></div>
				
				
				<?php
				}
				
				else
				{
				?>
				<div><a href="<?php echo SITE_URL ?>customer-account.php"><span id="myacc">My Account</span></a> | 
				
				<a href="<?php echo SITE_URL ?>clogout.php">Logout</a>
				
				
				</div>
				
				<!--<div id="menu">		
				<div class="menubox">
				<div><img src="images/drop_top.png" alt="" width="141" height="16" border="0"/></div>
				<div class="drop_menu">
				<ul>
				<li><a href="#">My Order</a></li>
				<li><a href="#">My Credit</a></li>
				<li><a href="#">General</a></li>
				<li><a href="#">Security</a></li>
				</ul>
				</div>
				</div>
				</div>-->
				<?php
				}
			
			?> 
			  	</div>		
			  	
			  		
			 <div class="clear"><img src="images/spacer.gif" alt="" width="1" height="1"/></div>
          <div id="navigation">
           <ul>
            <li class="selected" style="width:117px;"><a href="<?php echo SITE_URL; ?>"><span>Today's Deals</span></a></li>
			<li><img src="images/devider.gif" alt="" width="2" height="28"/></li>			     
            <li class="link" style="width:118px;"><a href="<?php echo SITE_URL; ?>previous_deals.php"><span>Previous Deals</span></a></li> 
			<li><img src="images/devider.gif" alt="" width="2" height="28"/></li>	         
            <li class="link" style="width:122px;"><a href="<?php echo SITE_URL; ?>howitworks.php"><span>How it works</span></a></li>
			<li><img src="images/devider.gif" alt="" width="2" height="28"/></li>
			<li style="padding: 4px 6px;"><img src="images/icon.png" alt="" width="21" height="20"/></li>			    
            <li class="link" style="width:122px;"><a href="#"><span>Invite Friends</span></a></li>            
          </ul>
        </div>    
    </div>
	
	
	
	
	
</div>
</div>
<div class="clear"></div>

<?php if ($_GET['action'] != "") { ?>
<div class="register_Main">
<div class="register_bg">
<ul>
<li><a href="#"><img src="images/late_btn.png" alt="" width="159" height="39" border="0"/></a></li>
<li>Sign up today for our email deals and you will never miss another deal!</li>
<li><input type="text" name="textfield2" class="white_box_ani" value="Enter your email address"/></li>
<li><input type="submit" name="Submit" class="Sign_up" value="Sign up"/></li>
</ul>
</div>
</div>
<?php } ?>
<?php if ($_GET['bye'] != "") { ?>
<div class="register_bg">
<h6 style="font-family: Arial; font-weight: bold; padding-left: 20px; color: #333333; font-size: 24px;">
<?php echo $_GET['bye']; ?>
</h6>
</div>
<?php } ?>

<div id="container">

<?php 
	$base = basename($_SERVER['REQUEST_URI']);
	$page = explode("?", $base);
	$page = $page[0];
	
	
if ($page == "index.php") { ?>
<div id="subscribe" class="register_bg" style="height:14px; width: 680px; padding: 10px; font-family: Helvetica; font-size: 10.5px; color: gray;" >

You have been subscribed to receive daily deals alert.
<span id="subscribe_close" style="float: right; margin-right: 10px; height:auto; width: 30px; cursor: pointer">Close</span>

</div>
<?php } ?>
<script>
$("div#click").click(function () {
$("div#locations").slideToggle(300);
});

$("div#locations").ready(function() {
	$("div#locations").hide();
});
</script>

<script>
$("span#subscribe_close").click(function() {
	$("div#subscribe").slideUp(300);
	
});
</script>

<script type="text/javascript" >
/* $(document).ready(function(){
  setTimeout(function(){
  $("div#subscribe").fadeOut("slow", function () {
  $("div#subscribe").remove();
      }); }, 5000);
 }); */
</script>

<script type="text/javascript">
 
$("span#myacc").mouseenter(function () {
	$("div#menu").slideDown("slow");			// slideToggle() / toggle()
}).mouseleave(function () {
	$("div#menu").slideUp("slow");			// slideToggle() / toggle()
});

$("div#menu").ready(function() {
	$("div#menu").hide();
});
</script>
<div id="leftcol">
<div class="deal_info">
		<!--end head-->
