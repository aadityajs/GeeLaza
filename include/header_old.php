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
		<link rel="stylesheet" type="text/css" href="css/dd.css" />
		

		<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css"/>
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
<!--start maincontainer-->
<!--start head-->
<div id="maindiv">
<div id="header">
<div class="header_left"><a href="<?= SITE_URL ?>"><img src="images/logo.gif" alt="" width="181" height="107" border="0"/></a></div>

          
				 
				<?php 
					$sql_city = "select * from ".TABLE_CITIES;
					$result_city = mysql_query($sql_city);
					$row_city_1 = mysql_fetch_array($result_city);
				?>
				<div class="city">Select your city:<br/>
				<select name="websites2" id="websites1" style="width:177px;" class="styled" tabindex="1">
				<option name="one" value="msDropDown" selected="selected" class="img_none"> <?php echo strtoupper($row_city_1["city_name"]); ?> </option>
					<?php
						while($row_city = mysql_fetch_array($result_city))
						{
							?>
							<option  name="two" value="PrototypeCombobox"  class="img_none"> <?php echo $row_city["city_name"]; ?> </option>
							<?php
						}
					?>
				</select>
				</div>		
                	
			  <div class="header_right">
			  <div class="registration">
				
				<div class="txt_box">
				<input name="textfield" type="text" class="text_field" id="textfield" value="Get deals by email" onclick="this.value=''" onblur="this.value='Get deals by email'" />
				<input class="submit_btn" type="submit" name="button" id="button" value="SUBSCRIBE" />
				</div>
			
				
				
				
			<?php
			if(!isset($_SESSION["user_id"]))
			{
			?>
				<div><a href="<?= SITE_URL ?>customer-login.php">Login</a>|<a href="<?= SITE_URL ?>customer-register.php">Register</a></div>
			
	
			 <?php
			 }
			 else
			 {
			 ?>
			 	<div><a href="<?= SITE_URL ?>customer-account.php">My Account</a>|<a href="<?= SITE_URL ?>clogout.php">Logout</a></div>
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
            <li class="link" style="width:122px;"><a href="#"><span>How it works</span></a></li>
			<li><img src="images/devider.gif" alt="" width="2" height="28"/></li>
			<li style="padding: 4px 6px;"><img src="images/icon.png" alt="" width="21" height="20"/></li>			    
            <li class="link" style="width:122px;"><a href="#"><span>Invite Friends</span></a></li>            
          </ul>
        </div>    
    </div>
</div>
<div class="clear"></div>

<?php if ($_GET['action'] != "") { ?>
<div class="register_bg">
<ul>
<li><a href="#"><img src="images/late_btn.gif" alt="" width="159" height="39" border="0"/></a></li>
<li>Sign up today for our email deals and you will never miss another deal !</li>
<li><input type="text" name="textfield2" class="white_box" value="Enter your email address"/></li>
<li><input type="submit" name="Submit" class="blue_btn" value="Register"/></li>
</ul>
</div>


<?php }?>

<div id="container">
<div id="leftcol">
<div class="deal_info">
		<!--end head-->