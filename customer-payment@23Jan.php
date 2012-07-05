<?php 
error_reporting(E_ERROR && E_STRICT);
include("include/header.php");
session_start();
ob_start();
?>

<?php 
/** Function to validate email with PHP 
 * @author Aditya Jyoti Saha
 * 
 * */
function ValidateEmail($email) {
	//$email = "someone@example.com"; 
	
	if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) { 
	  //echo "Valid email address.";
	  return TRUE; 
	}
	else { 
	  //echo "Invalid email address.";
	  return FALSE; 
	}
}
?>
<?php 
if ($_GET['item'] != "")  {
	$prod_id = $_GET['item'];
	
	$_SESSION['prod_id'] = $_GET['item'];
	
	$sql_prod = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_id = '".$prod_id."' LIMIT 0, 1";
	$prod_res = mysql_fetch_array(mysql_query($sql_prod));
	
	
	/*$sql_todays_buy = "SELECT SUM(qty) FROM ".TABLE_TRANSACTION." WHERE deal_id = ".$today_res['deal_id'];
	$total_buy = mysql_fetch_array(mysql_query($sql_todays_buy));
	
	$sql_todays_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$today_res['deal_id'];
	$todays_image = mysql_fetch_array(mysql_query($sql_todays_image));*/
}

if (isset($_POST['Submit']) && $_POST['Submit'] == 'Send as Gift') {
	$_SESSION['gift_mail'] = $_POST['frndemail'];
	$_SESSION['gift_name'] = $_POST['frndname'];
	$_SESSION['gift_msg'] = $_POST['frndmsg'];
}

/*if ($_GET['gift'] == 'gifting') {
		$_SESSION['gift'] = 'gifting'; 
}
if ($_SESSION['gift'] == 'gifting') {
		$_SESSION['header_location'] = SITE_URL.'customer-payment.php?item='.$_SESSION['prod_id'].'&gift='.$_SESSION['gift'];
	} else {
		$_SESSION['header_location'] = SITE_URL.'customer-payment.php?item='.$_SESSION['prod_id'];
}*/

?>

<!-- Login code starts -->
<?php
	$flag = 0;
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST['btnLogin'] == "Log In")
	{
		
		
		$lemail = $_POST["lemail"];
		$lpassword = $_POST["lpassword"];
				
		if($flag == 0)
		{
			if($lemail == '')
			{
				$msg = 'Please enter email';
				$flag = 1;
			}
		}
		
		if($flag == 0)
		{
			if($lpassword == '')
			{
				$msg = 'Please enter password';
				$flag = 1;
			}
		}
		
		if($flag == 0)
		{
			$lpassword = base64_encode($lpassword);
			$sql_select = "SELECT * FROM ".TABLE_USERS." WHERE email="."'".$lemail."' and password="."'".$lpassword."'";
			$result_select = mysql_query($sql_select);
			$count_select = mysql_num_rows($result_select);
			if($count_select >0)
			{
				$row_select = mysql_fetch_array($result_select);
				$user_id = $row_select["user_id"];
				$_SESSION["user_id"] = $user_id;
				header('location:'.SITE_URL.'customer-payment.php?item='.$_SESSION['prod_id']);
				
			}
			else
			{
				$msg = 'Invalid login';
				$flag = 1;
			}
		}
		
	}


?>
<!-- Login code ends -->
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>



<div class="accounts">
<div class="accounts_top"></div>
<div class="accounts_mid">
		<!--<p style="padding:0; margin: 7px  0 0 10px; font-family: Arial Rounded MT Bold; color: #ff7f22; font-size:30px;">Your Order </p>-->
        <div class="white-container1" style="width:97%; margin: 10px auto 0 auto; background:#fff;">	
			<div>
              <!-- <div class="start_savings"></div>-->
            	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="cart_box2">
                  <tr>
                    <td colspan="4" style="font: bold 15px/26px Arial, Helvetica, sans-serif; color:#000"><strong></strong></td>                   
                  </tr>
                  <tr>
                    <th width="395"><strong>Your Deal</strong></th>
                    <th width="95" style="border-right:0px;"><strong>Quantity</strong></th>
                    <th width="41" style="border-left:0px;"><strong></strong></th>
                    <th width="97" style="border-right:0px;"><strong>Price</strong></th>
                    <th width="11" style="border-left:0px;"><strong></strong></th>
                    <th width="371" align="left"><strong>Total</strong></th>
                  </tr>
                  <tr class="gray_01">
                    <td>
                    	<?php
                    		if ($_SESSION['gift_mail'] != NULL) {
                    			echo '<img height="50" width="55" alt="" src="images/Giftbox.png" align="left">';
                    		}
                    		echo strip_tags($prod_res['title']); 
                    	?>
                    	
                    </td>
                    <td>
                    	<select name="amount" id="" onchange="ajaxReq(this.value);">
						<?php for ($i = 1; $i <= 30; $i++) { ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
						</select>
                    </td>
                     <td>x</td>
                    <td>&pound;<?php echo strip_tags($prod_res['discounted_price']); ?></td>
                    <td>=</td>
                    <td><div id="total_price">&pound;<?php echo strip_tags($prod_res['discounted_price']); ?></div></td>
                  </tr>
                 
                  <!--<tr>
                    <td colspan="3" style="font: bold 15px/26px Arial, Helvetica, sans-serif; text-align:right;">Total Cost = </td>
                    <td style="font: bold 15px/26px Arial, Helvetica, sans-serif; text-align:right; text-align:left; padding-left:10px;">
                    	<div id="big_total_price">&pound;<?php echo strip_tags($prod_res['discounted_price']); ?></div> 
                    	<?php //echo $_SESSION['total_price']; ?>
                    </td>
                  </tr>-->
                </table>
				<div style="width: 100%; height: auto; margin:0;">
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
					 <td style="color:#7fd7fc; font: normal 12px/18px Arial, Helvetica, sans-serif;" width="59%">
					 <div id="redeem" style="width: 59%;">
					 	<p style="color:#3bb8ff; font: normal 12px/18px Arial, Helvetica, sans-serif; text-decoration: none; padding-left:5px; cursor: pointer;">Do you want to use your credit?</p>
					 </div>
					 <div class="clear"></div>
					 <div id="redeem_div" style="width:59%; padding-top: 1px;  display: none;">
					 <div style="width:155px; float: left; margin: 5px 0 0 5px;"><input style="width:160px;" type="text" name="lemail" value="cxzczc"class="text_box1" /></div>
					 <div style="float: right; text-align:right; width: 141px; margin-top: 3px;"><input type="submit" class="log_in_redeem" name="submit" value="Redeem code"/></div>
					 </div>
					 </td>
                      <td style="font-family:Arial Rounded MT Bold; font-size: 20px; color: #000; text-align:right; background:#99d9ea; text-align:left; padding-left:10px;" width="30%">Total: &pound;</td>
                      <td style="font-family:Arial Rounded MT Bold; font-size: 20px; color: #000; text-align:left; padding-left:15px; background:#99d9ea;" width="26%;">
                      	<div id="big_total_price"><?php echo strip_tags($prod_res['discounted_price']); ?><span></span>
                      	</div> 
                    	<?php //echo $_SESSION['total_price']; ?></td>
                    </tr>
                  </table>
				</div>
            </div>
			
    </div>
  </div>
		<div class="accounts_bot"><img src="images/spacer.gif" alt="" width="1" height="9"/></div>
</div>
<script>
$("div#redeem").click(function () {
	$("div#redeem_div").slideToggle(500);
});

/*$("p#close").click(function() {
	$("div#redeem_div").slideUp(300);
	
}); */

$("div#redeem_div").ready(function() {
	$("div#redeem_div").hide(0);
});
</script>
<div class="clear"></div>
<div class="accounts">
<div class="accounts_top"></div>
<div class="accounts_mid">

<?php if (!isset($_SESSION['user_id'])) { ?>

 <div class="white-container_ani" style="width:100%; margin: 0px auto 0 auto; background:#fff;">	
 
		<div style="width:920px;">
        
        <!-- Login form starts --> 
            <form name="cust_login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  onsubmit="javascript: return ValidateLoginForm();" style="margin:0px; padding:0px;">
            <!--<h6 style="margin: -22px 0 6px 0; background:none; z-index: 1000;">Already have an Account?</h6>-->
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="loginBoxnew2">
              <tr>
                <td class="lb_top2">&nbsp;</td>
              </tr>
              <tr>
                <td class="lb_mid2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="blue_box" style="width:100%; background: none; border: none;">
                   <tr>
                     <td>                    
                     <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" style="width:98%; margin:0 auto;">
                         <tr>
                          <td colspan="3"><p style="line-height: 25px; font-size: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #363636; margin-bottom:15px; margin-top: -10px;">Already have an Account?</p>
                           
                            <?php
            
                            if($flag == 1)
                            {
                                ?>
                                <div style="width:100%; height:auto; background-color:transparent;padding-top:4px; padding-left:0px;">
                                <label style="color:red;"><?php //echo "* ".$msg; ?>(-) Email address or password  is incorrect!</label>
                                </div>
                                <?php
                            }
                            ?>
                         </td>
                       </tr>
                       <tr>
                         <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td>Email Address</td>
                             <td>Password</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                           </tr>
                           <tr>
                             <td>
                             <div id='cust_login_lemail_errorloc' class="error"></div>
                             <input type="text" name="lemail" id="lemail" onblur="javascript: return validateEmail(this.value);"  value="<?php //if(isset($_POST) && $flag==1){ echo $_POST["lemail"];} ?>"class="text_box1" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                             <td>
                             <div id='cust_login_lpassword_errorloc' class="error"></div>
                             <input type="password" name="lpassword" id="lpassword" class="text_box1" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                             <td><input type="submit" name="btnLogin" value="Log In" class="log_in" style="cursor:pointer; font-size:20px;" /></td>
                             <td>
                             	<a href="<?php echo SITE_URL; ?>forgetpassword.php" style="color: blue; font-size:12px; line-height: 14px; font-family:Arial, Helvetica, sans-serif; font-weight: bold; ">Forgot your password?</a>
                             </td>
                           </tr>
                         </table></td>
                       </tr>                    
                     </table>                
                     </td>
                   </tr>
                   <tr>
                   <td style="padding: 0 0 0 0px; line-height: 20px; margin: -15px 0 0 0;"><span><?php if ($cookie) { ?>
                    <fb:login-button scope="email" autologoutlink="true" onlogin="window.location.reload()"></fb:login-button>
                    <?php unset($_SESSION['fbuser']); ?> 
                    <?php } else { ?><br />
                    <span style="padding-left: 18px;"><fb:login-button scope="email" autologoutlink="true">Connect</fb:login-button></span>
                    <?php } ?></span><span class="black_text1" style="color:#3A3B3D; margin-left: -15px;"><img src="images/spacer.gif" alt="" width="8" height="1"/>If you have an account on Facebook you can use it to log in.</span>
                    </td>
                   </tr>
                 </table></td>
              </tr>
              <tr>
                <td class="lb_bottom2">&nbsp;</td>
              </tr>
            </table>
              
            </form>
            <!-- Login form ends -->
            
            <!-- Login form validator starts --> 
<script type="text/javascript">

function validateEmail(email) {
	
   // var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(email)) {
    document.getElementById('cust_login_lemail_errorloc').innerHTML = 'Invalid email address';
    document.getElementById('cust_login_lpassword_errorloc').innerHTML = '&nbsp;';
    document.getElementById('lemail').style.border = "1px solid red";
	document.getElementById('lpassword').style.border = "1px solid red";
    return false;
    }
}

function ValidateLoginForm () {
	var email = document.getElementById('lemail').value;
	var pass = document.getElementById('lpassword').value;
	if ( email == "") {
		//alert ("asdasda");
		document.getElementById('cust_login_lemail_errorloc').innerHTML = "Enter your email address";
		document.getElementById('cust_login_lpassword_errorloc').innerHTML = "Enter your password";
		document.getElementById('lemail').style.border = "1px solid red";
		document.getElementById('lpassword').style.border = "1px solid red";
		return false;
	}
	else if ( pass == "") {
		
		document.getElementById('cust_login_lemail_errorloc').innerHTML = "Enter your email address";
		document.getElementById('cust_login_lpassword_errorloc').innerHTML = "Enter your password";
		document.getElementById('lemail').style.border = "1px solid red";
		document.getElementById('lpassword').style.border = "1px solid red";
		return false;
	}
	
}
</script>

<!-- Login form validator ends --> 
               
        <div class="clear"></div>
        </div>
           
    </div>
<?php } 	// End user login condition ?>

                <div class="clear"></div>
                <?php if (!isset($_SESSION['user_id'])) { ?> 
                <h6 style="margin: 15px 0 15px 15px; background:none; font-size:24px; text-align:left;" >Register Now</h6>
                <?php } ?>
                <div class="register_box2">
                
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="vertical-align:top; padding:0px;">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>
<?php if (!isset($_SESSION['user_id'])) { ?>                          
    
     <!-- Registration from start -->                        
<?php
	$flag = 0;
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST['btnRegister'] == "Sign up" )
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
			
				
				$Template = '
					
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
				            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
				                <tr>
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
		
		';
	
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
 
    <div style="border:1px #CCCCCC solid; background:#fff;">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="660" align="left" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg2">
       <tr>
         <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg">
	<tr>
    <td><img src="images/spacer.gif" alt="" width="1" height="12"/></td>
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
    <td><table style="padding-left: 7px;" width="100%" border="0" cellspacing="0" cellpadding="0">
    
     <tr>
      <td>Email Address <span class="red">*</span></td>
    </tr>
    <tr>
      <td>
      <div class="error_orange"><?php if ($flag == 5) { echo 'Email address already exists'; }?></div>
      <input type="text" name="email" id="email" onblur="return Email_ajaxReq(this.value); " value="<?php if(isset($_POST)){ echo $_POST["email"];} ?><?php if ($cookie) {echo $user->email;} ?>" class="text_box12 width600" <?php if ($flag ==1 || $flag ==5) {echo 'style="border:1px solid red;"';} ?>/>      </td>
    </tr>
    <tr>
       <td><span style="color: #c3c3c3; text-transform: none; font-size: 11px; font-weight: normal;">Don't worry. Your email address is safe with us!</span><div id='cust_register_email_errorloc' class="error_orange"></div></td>
    </tr>
   <!-- <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
    <tr>
      <td>Confirm Email Address <span class="red">*</span></td>
    </tr>
    <tr>
      <td>
      <div id='cust_register_confemail_errorloc' class="error"></div>
      <input type="text" name="confemail" id="confemail" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["confemail"];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>      </td>
    </tr> -->
   <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
    <tr>
          <td width="45%">Password <span class="red">*</span></td>
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
          <td width="55%">Confirm password <span class="red">*</span></td>
        </tr>
        <tr>
          <td>
          <input type="password" name="cpassword" id="cpassword" class="text_box12 width600" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>          </td>
        </tr>
        <tr>
	      <td><div id='cust_register_cpassword_errorloc' class="error_orange"></div></td>
	    </tr>
         <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
         
          <tr><td>          
          	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                         <td>First Name <span class="red">*</span></td>
                          </tr>
                          <tr>
                            <td width="45%">
                            <input type="text" name="fname" id="fname" value="<?php if(isset($_POST)){ echo $_POST["fname"];} ?><?php if ($cookie) {echo $user->first_name;} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>        </td>
                          </tr>
                          <tr>
				          	<td><div id='cust_register_fname_errorloc' class="error_orange"></div></td>
				          </tr>
                          <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>                           
                           <tr>
                          <td>Phone Number <span class="red"></span></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="phno" id="phno" value="<?php if(isset($_POST)){ echo $_POST["phno"];} ?>" class="text_box12" /></td>
                        </tr>
                        <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
                    </table>
                
                </td>
                <td width="50%" style="padding-left:10px;">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                            <td>Last Name <span class="red">*</span></td>
                          </tr>
                          <tr>
                            <td width="55%">
                            <input type="text" name="lname" id="lname" value="<?php if(isset($_POST)){ echo $_POST["lname"];} ?><?php if ($cookie) {echo $user->last_name;} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>        </td>
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
                                <select style="width:312px;" id="city">
                                    <option>Select your deal City</option>
                                    
                                    <?php
										while($row_city = mysql_fetch_array($result_city)) {
											$c++;
									?>
									<option value="<?php echo $row_city["city_name"]; ?>"><?php echo $row_city["city_name"]; ?> </option>
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
          </td></tr>
         
    
       <!--
       
      <tr>
        <td colspan="2">Address Line 1<span class="red">*</span></td>
      </tr>
      <tr>
        <td colspan="2">
        <div id='cust_register_add1_errorloc' class="error"></div>
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
      	<div id='cust_register_city_errorloc' class="error"></div>
      	<input type="text" name="city" id="city" style="width: 200px; margin-right: 10px; <?php if ($flag ==1) {echo 'border:1px solid red;';} ?>" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["city"];} ?>" class="text_box11" />
      	</td>
        
        <td>
        <div id='cust_register_postcode_errorloc' class="error"></div>
        <input type="text" name="postcode" id="postcode" style="width: 100px; <?php if ($flag ==1) {echo 'border:1px solid red;';} ?>" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["postcode"];} ?>" class="text_box11"/>
        </td>
      </tr>
      <tr><td>&nbsp;</td></tr>
    -->
    
    </table></td>
    </tr>      
    <tr>
      <td>      
      <table style="padding-left: 7px;" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                  <tr>
                    <td>DATE OF BIRTH</td>
                    <td><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Why should I provide my date of birth?</p></div><div class=clear></div><div class=tip_mid><ul><li>You must provide your real date of birth to certfy that you are at least 18 years old.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/question.png" width="12" height="12" vspace="4" align="default" ></a></td>
                    <td style="padding-left:250px;">GENDER</td>
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
                        <select name="day" id="day" class="selectbg" title="" style="width:92px;">
                            <option value="000">Day</option>
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
                  <select name="month" id="month" class="selectbg" style="width:144px;">
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
                            <select name="year" id="year" class="selectbg" style="width:95px;">
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
                            <select style="width:190px;" id="gender">
                                <option>Select your Gender</option>
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
      <td><img src="images/spacer.gif" alt="" width="1" height="23"/></td>
    </tr>
	<tr>
		<td><table>      
      <tr>
        <td colspan="2" align="center" style="text-align: left; padding-left: 4px;">
            <img src="images/spacer.gif" alt="" width="1" height="13"/><br>
            <input type="submit" name="btnRegister" value="Sign up" class="log_in"  style="cursor:pointer;"/>
        </td>
        </tr>
      
      <tr>
      <td style="padding-left: 10px; font-size:10px;" class="privacy_policy1"><span style="text-transform: none;">By registering you agree to the <a href="#" style="color:#3d35ac; text-transform: none;">Terms and Conditions</a> and  <a href="#" style="color:#3d35ac; text-transform: none;">Privacy Policy</a></span></td>
      </tr>
      <tr>
      <td style="height:5px"><img src="images/spacer.gif" alt="" width="1" height="5" /></td>
      </tr>
     </table></td>
	</tr>
  </table>
  </td>
       </tr>
     </table>
 
  </td>
        <td width="37%" align="left" valign="top" style="padding:0 20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
            	<div class="how_right_ani2">
		   <div style="font: normal 18px/25px Arial, Helvetica, sans-serif; color:#4d4550; padding-left:30px;">Got questions?</div>
			
			 <div id="gotqq1"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: void(0);">What happens after I buy the deal?</a></div>
			 <div id="gotqa1"><span style="font: normal 12px/17px Arial, Helvetica, sans-serif;">You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</span></div>
			<div style="border-bottom: 1px solid #ccc;"></div>
			 <div id="gotqq2"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: void(0);">When can I use my deal?</a></div>
			 <div id="gotqa2"><span style="font: normal 12px/17px Arial, Helvetica, sans-serif;">Be patient. We will email you when your deal is ready to use.</span></div>
			<div style="border-bottom: 1px solid #ccc;"></div>
			 <div id="gotqq3"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: void(0);">When will my voucher expire?</a></div>
			 <div id="gotqa3"><span style="font: normal 12px/17px Arial, Helvetica, sans-serif;">The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</span></div>
			<div style="border-bottom: 1px solid #ccc;"></div> 
			 <div id="gotqq4"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: void(0);">Can I buy a deal as gift?</a></div>
			 <div id="gotqa4"><span style="font: normal 12px/17px Arial, Helvetica, sans-serif;">Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</span></div>
			<div style="border-bottom: 1px solid #ccc;"></div>
			 <div id="gotqq5"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: void(0);">Can I get refund for my order?</a></div>
			 <div id="gotqa5"><span style="font: normal 12px/17px Arial, Helvetica, sans-serif;">Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</span></div>
			
			        
           <script type="text/javascript">
	           $("div#gotqq1").click(function () {
	        	   $("div#gotqa1").slideToggle(300);
	        	   });
	
	        	   $(document).ready(function(){
	        	   $("div#gotqa1").ready(function() {
	        	   	$("div#gotqa1").hide(0);
	        	   });
	        	   });

	           $("div#gotqq2").click(function () {
	        	   $("div#gotqa2").slideToggle(300);
	        	   });
	
	        	   $(document).ready(function(){
	        	   $("div#gotqa2").ready(function() {
	        	   	$("div#gotqa2").hide(0);
	        	   });
	        	   });

	           $("div#gotqq3").click(function () {
	        	   $("div#gotqa3").slideToggle(300);
	        	   });
	
	        	   $(document).ready(function(){
	        	   $("div#gotqa3").ready(function() {
	        	   	$("div#gotqa3").hide(0);
	        	   });
	        	   });


        	   $("div#gotqq4").click(function () {
	        	   $("div#gotqa4").slideToggle(300);
	        	   });
	
	        	   $(document).ready(function(){
	        	   $("div#gotqa4").ready(function() {
	        	   	$("div#gotqa4").hide(0);
	        	   });
	        	   });

        	   $("div#gotqq5").click(function () {
	        	   $("div#gotqa5").slideToggle(300);
	        	   });
	
	        	   $(document).ready(function(){
	        	   $("div#gotqa5").ready(function() {
	        	   	$("div#gotqa5").hide(0);
	        	   });
	        	   });
           
           </script>
			 
			 <!-- 
			 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>What happens after I buy the deal?</p></div><div class=clear></div><div class=tip_mid><ul><li>You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/1.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>What happens after I buy the deal?</p></div><div class=clear></div><div class=tip_mid><ul><li>You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">What happens after I buy the deal?</a></td>
                  </tr>
                  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>When can I use my deal?</p></div><div class=clear></div><div class=tip_mid><ul><li>Be patient. We will email you when your deal is ready to use.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/2.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>When can I use my deal?</p></div><div class=clear></div><div class=tip_mid><ul><li>Be patient. We will email you when your deal is ready to use.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">When can I use my deal?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>When will my voucher expire?</p></div><div class=clear></div><div class=tip_mid><ul><li>The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/3.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>When will my voucher expire?</p></div><div class=clear></div><div class=tip_mid><ul><li>The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">When will my voucher expire?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Can I buy a deal as gift?</p></div><div class=clear></div><div class=tip_mid><ul><li>Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/4.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Can I buy a deal as gift?</p></div><div class=clear></div><div class=tip_mid><ul><li>Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">Can I buy a deal as gift?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Can I get refund for my order?</p></div><div class=clear></div><div class=tip_mid><ul><li>Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/5.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onClick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Can I get refund for my order?</p></div><div class=clear></div><div class=tip_mid><ul><li>Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">Can I get refund for my order?</a></td>
                  </tr>
                </table>
			 
			  -->
                
        
                
                <!-- 
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>What happens after I buy the deal?</strong> <br /> <br />You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/1.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>What happens after I buy the deal?</strong> <br /> <br />You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">What happens after I buy the deal?</a></td>
                  </tr>
                  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>When can I use my deal?</strong> <br /> <br />Be patient. We will email you when your deal is ready to use.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/2.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>When can I use my deal?</strong> <br /> <br />Be patient. We will email you when your deal is ready to use.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">When can I use my deal?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>When will my voucher expire?</strong> <br /> <br />The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/3.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>When will my voucher expire?</strong> <br /> <br />The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">When will my voucher expire?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>Can I buy a deal as gift?</strong> <br /> <br />Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/4.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>Can I buy a deal as gift?</strong> <br /> <br />Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">Can I buy a deal as gift?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>Can I get refund for my order?</strong> <br /> <br />Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/5.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>Can I get refund for my order?</strong> <br /> <br />Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">Can I get refund for my order?</a></td>
                  </tr>
                </table>
                 -->
                
             </div>
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
    <div>
      
   </div>
  </div>
 </form>
<!-- Registration form validator starts --> 

<script type="text/javascript">

function validateEmail(email) { 
	
   // var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
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

	
	
	if ( fname == "" || lname == "" || email == "" || password == "" || cpassword == "" || city == "" || gender == "" || day == "000" || month == "000" || year == "000") {
		//alert ("asdasda");
		document.getElementById('cust_register_fname_errorloc').innerHTML = "Enter your first name";
		//document.getElementById('fname').style.border = "1px solid red";

		document.getElementById('cust_register_lname_errorloc').innerHTML = "Enter your last name";
		//document.getElementById('lname').style.border = "1px solid red";

		document.getElementById('cust_register_email_errorloc').innerHTML = "Enter your email address";
		//document.getElementById('email').style.border = "1px solid red";

		//document.getElementById('cust_register_confemail_errorloc').innerHTML = "Please confirm your email address";
		//document.getElementById('confemail').style.border = "1px solid red";

		document.getElementById('cust_register_password_errorloc').innerHTML = "Enter your password (minimum 6 charecters)";
		//document.getElementById('password').style.border = "1px solid red";

		document.getElementById('cust_register_cpassword_errorloc').innerHTML = "Password must be confirmed";
		//document.getElementById('cpassword').style.border = "1px solid red";

		document.getElementById('cust_register_city_errorloc').innerHTML = "Enter your deal city";
		//document.getElementById('city').style.border = "1px solid red";
		
		document.getElementById('cust_register_gender_errorloc').innerHTML = "Select your gender";

		document.getElementById('cust_register_day_errorloc').innerHTML = "You must confirm your age";
		//document.getElementById('day').style.border = "1px solid red";
		//document.getElementById('month').style.border = "1px solid red";
		//document.getElementById('year').style.border = "1px solid red";
		return false;
	}
	/*if ( fname == "") {
		//alert ("asdasda");
		document.getElementById('cust_register_fname_errorloc').innerHTML = "Enter your first name";
		document.getElementById('fname').style.border = "1px solid red";
		return false;
	}else {
		document.getElementById('cust_register_fname_errorloc').innerHTML = "";
		document.getElementById('fname').style.border = "1px solid #C8C8C8"; 
		}
	if ( lname == "") {
		//alert ("asdasda");
		document.getElementById('cust_register_lname_errorloc').innerHTML = "Enter your last name";
		document.getElementById('lname').style.border = "1px solid red";
		return false;
	}else {
		document.getElementById('cust_register_lname_errorloc').innerHTML = "";
		document.getElementById('lname').style.border = "1px solid #C8C8C8"; 
		}
	if ( email == "" ) {
		//alert (document.getElementById('cust_register_email_errorloc').value);
		document.getElementById('cust_register_email_errorloc').innerHTML = "Enter your email address";
		document.getElementById('email').style.border = "1px solid red";
		return false; */
	/*}else if (document.getElementById('cust_register_email_errorloc').value != ""){
		document.getElementById('cust_register_email_errorloc').innerHTML = "Enter your email address";
		document.getElementById('email').style.border = "1px solid red";
		return false;
		} else {
		document.getElementById('cust_register_email_errorloc').innerHTML != "";
		document.getElementById('email').style.border = "1px solid #C8C8C8"; 
		}*/
	/*if ( confemail == "") {
		//alert ("asdasda");
		document.getElementById('cust_register_confemail_errorloc').innerHTML = "Please confirm your email address";
		document.getElementById('confemail').style.border = "1px solid red";
		return false;
	}
	if ( email !== confemail) {
		//alert ("asdasda");
		document.getElementById('cust_register_confemail_errorloc').innerHTML = "Please confirm your email address";
		document.getElementById('confemail').style.border = "1px solid red";
		return false;
	}*/
	/*if ( day == "000" || month == "000" || year == "000" ) {
		
		document.getElementById('cust_register_day_errorloc').innerHTML = "Enter your password (minimum 6 charecters)";
		document.getElementById('day').style.border = "1px solid red";
		document.getElementById('month').style.border = "1px solid red";
		document.getElementById('year').style.border = "1px solid red";
		return false;
	}else {
		document.getElementById('cust_register_day_errorloc').innerHTML = "";
		document.getElementById('day').style.border = "1px solid #C8C8C8"; 
		document.getElementById('month').style.border = "1px solid #C8C8C8"; 
		document.getElementById('year').style.border = "1px solid #C8C8C8"; 
		}
	if ( password == "" || password.length <=5) {
		
		document.getElementById('cust_register_password_errorloc').innerHTML = "Enter your password (minimum 6 charecters)";
		document.getElementById('password').style.border = "1px solid red";
		return false;
	}else {
		document.getElementById('cust_register_password_errorloc').innerHTML = "";
		document.getElementById('password').style.border = "1px solid #C8C8C8"; 
		}
	if ( cpassword == "") {
		
		document.getElementById('cust_register_cpassword_errorloc').innerHTML = "Password must be confirmed";
		document.getElementById('cpassword').style.border = "1px solid red";
		return false;
	} else {
		document.getElementById('cust_register_cpassword_errorloc').innerHTML = "";
		document.getElementById('cpassword').style.border = "1px solid #C8C8C8"; 
		}*/
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
function Email_ajaxReq(str)
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
    document.getElementById('email').style.border = "1px solid red";
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
              
   <!-- Registration from ends -->   
 

<div><h6 style="margin: 15px 0 15px 15px; background:none; font-size:24px; text-align:left;" >Choose Payment Method To Pay For Your GeeLaza Voucher</h6></div>
  
    <div style="border:1px solid #CCCCCC; margin:15px 0;">
	
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	  	<td><table  style="padding-top:15px;" width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td width="6%" align="left" valign="top" style="padding-left:12px;"><input id="ccrad" name="payment_system" type="radio" value="cc" checked="checked"/></td>
					    <td width="18%" align="left" valign="top" style="font: bold 13px/20px Arial, Helvetica, sans-serif;
	color: #3a3b3d;"><span style="text-transform: uppercase; font-size:12px;">Credit/Debit Card</span></td>
					    <td width="30%" align="left" valign="top"><img src="images/c_cards.png" alt="" width="112" height="19"/></td>
						<td style="padding-left: 15px; font: bold 13px/20px Arial, Helvetica, sans-serif;
	color: #3a3b3d;" valign="top"><input type="radio" name="payment_system" id="maestro" value="maestro" />
                          <span style="text-transform: uppercase; font-size:12px;">Maestro</span> <img src="images/payment_icon01.png" alt="" width="22" height="14" /></td>
						<td style="padding-left: 15px; font: bold 13px/20px Arial, Helvetica, sans-serif;
	color: #3a3b3d;" valign="top"><input type="radio" name="payment_system" id="paypal" value="paypal" />
                        <span style="text-transform: uppercase; font-size:12px;">Paypal</span> <img src="images/paypal.png" alt="" width="43" height="15" /><br />
                        </td>
					  </tr>
					</table></td>
	  </tr>
      <tr>
        <td width="660">
        
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="leftfrom" style="width:100%; <?php if (isset($_SESSION['user_id'])) { echo 'border: none;'; }?> ">
                    <tr>
                    <td style="vertical-align:top;  padding:0px;">    
<?php if (!isset($_SESSION['user_id'])) { ?>                    
                
   <!-- Not Login Payment table starts -->   

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
					   <tr>
                        <td colspan="2" style="padding-left:0px;">                       
                        <!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td width="6%" align="left" valign="top" style="padding-left:12px;"><input id="ccrad" name="payment_system" type="radio" value="cc" checked="checked"/></td>
					    <td width="26%" align="left" valign="top">Credit/Debit Card</td>
					    <td width="68%" align="left" valign="top"><img src="images/c_cards.png" alt="" width="112" height="19"/></td>
					  </tr>
					</table>--></td>
                     </tr>
					 <tr>
                    
   	<!-- cc form -->	
                    
                        <td colspan="2">
                        <form action="" name="frmccnotloginpayment" method="post">
                        <table class="login_bg"  id="cc" style="margin: 0 0 0 20px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tr>
                            <td colspan="2">CARDHOLDERS NAME</td>
                          </tr>
						  
                          <tr>
                            <td colspan="2"><input type="text" name="textfield4" class="text_box123 width600" /></td>
                          </tr>
                          <tr>
						  	<td><span style="color: #c3c3c3; text-transform: none; font-size: 11px; font-weight: normal;">Please enter your name exactly as it appears on your credit/debit card.</span></td>
						  </tr>
                          <tr>
                              <td colspan="2">
                              	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                                  <tr>
                                    <td>CARD NUMBER</td>
                                    <td>
                            	SECURITY CODE <a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Where can I find my card security code?</p></div><div class=clear></div><div class=tip_mid><ul><li>They are last 3 digits on the back of your card.<br /> <br /><img src=images/card.gif /></li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/question.png" alt="" width="12" height="12" /></a>
                            </td>
                                  </tr>
                                  <tr>
                                    <td  style="padding-right:10px;"><input type="text" name="textfield4" class="text_box12" style="width:435px;"/></td>
                                    <td><input type="text" name="textfield4" class="text_box12" style="width:150px;"/></td>
                                  </tr>
                                </table>
                              </td>                               
                              </tr> 
                              
                         <tr>
                        <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                          <tr>
                            <td>YOUR CARD EXPIARY DATE</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>                          
                          <td style="padding-right:10px;">
                          <div class="styled_select left" style="width:125px;">
                          
                            <select name="expDateMonth"  style="width:144px;">
                            			<option value="0">Month</option>
                              		<?php for ($m = 1; $m <= 12; $m++) { ?>
                              			<option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                              		<?php } ?>
                                </select>
                            
                            
                                  </div>
                                  </td>
                          <td style="padding-right:50px;">
                              <div class="styled_select left" style="width:75px;">
                                    <select name="expDateYear" style="width:95px;">
	                                	<option value="0">Year</option>
                              		<?php for ($y = date("Y"); $y <= date("Y")+10; $y++) { ?>
                              			<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                              		<?php } ?>
	                            </select>
                                    </div>
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
                                                                   
                          <tr>
                            <td colspan="2">ADDRESS LINE 1</td>
                          </tr>
                          <tr>
                            <td colspan="2">
                             <input type="text" name="textfield4" class="text_box12 width600"/>
                            </td>
                          </tr>
                           <tr>
                            <td colspan="2">ADDRESS LINE 2</td>
                          </tr>
                          <tr>
                            <td colspan="2">
                             <input type="text" name="textfield4" class="text_box12 width600" />
                            </td>
                          </tr>
                             <tr>
                              <td colspan="2">
                              	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                                  <tr>
                                    <td>CITY</td>
                                    <td>POSTCODE</td>
                                  </tr>
                                  <tr>
                                    <td style="padding-right:10px;"><input type="text" name="textfield22" class="text_box123" style="width:293px;"/></td>
                                    <td><input type="text" name="textfield22" class="text_box123" style="width:290px;"/></td>
                                  </tr>
                                </table>
                              </td>                               
                              </tr>  
                           </table></td>
                          </tr>
                        </table>
                        </form>
                        </td>
                      </tr>
					  
	<!-- maestro form -->				  
					  <!--<tr>
                        <td style="padding-left: 15px;"><input type="radio" name="payment_system" id="maestro" value="maestro" />
                          Maestro <img src="images/payment_icon01.png" alt="" width="22" height="14" /></td>
                      </tr>--> 
                      <tr>
                      
                      	<td colspan="2">
                        <table id="maestro" style="margin: 0 0 0 10px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><table class="login_bg" width="100%" border="0" cellspacing="0" cellpadding="0">
                             <tr>
		                        <td>CARDHOLDERS FIRST NAME</td>
		                        <td>CARDHOLDERS LAST NAME</td>
		                      </tr>
		                      <tr>
		                        <td><input type="text" name="textfield4" class="text_box123 size_140" style="width:293px;" /></td>
		                        <td><input type="text" name="textfield4" class="text_box123 size_140" style="width:293px;" /></td>
		                      </tr>
		                      <tr>
		                        <td width="100%" colspan="2">ADDRESS LINE 1</td>
		                      </tr>
		                      <tr>
		                        <td colspan="2">
		                         <input type="text" name="textfield4" class="text_box12" style="width:390px"/>
								</td>
		                      </tr>
							   <tr>
		                        <td width="100%" colspan="2">ADDRESS LINE 2</td>
		                      </tr>
		                      <tr>
		                        <td colspan="2">
		                         <input type="text" name="textfield4" class="text_box12" style="width:390px"/>
								</td>
		                      </tr>
							     <tr>
		                            <td width="40%">TOWN / CITY</td>
		                            <td width="50%">POSTCODE</td>
		                      </tr>
		                          <tr>
		                            <td><input type="text" name="textfield22" class="text_box123 size_140" /></td>
		                            <td><input type="text" name="textfield22" class="text_box123" style="width: 120px;" /></td>
		                          </tr>
								   <tr>
		                        <td width="100%" colspan="2">CARD NUMBER</td>
		                      </tr>
		                      <tr>
		                        <td colspan="2">
		                         <input type="text" name="textfield4" class="text_box12" style="width:200px"/>
								</td>
		                      </tr>  
		                       <tr>
		                            <td width="40%">SECURITY CODE &nbsp;<a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:276px; text-align:left; margin:80px auto 0 -150px;><ul><li><strong>Where can I find my card security code?</strong> <br /> <br />They are last 3 digits on the back of your card.<br /> <br /><img src=images/card.gif /></li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/question.png" alt="" width="12" height="12" /></a></td>
		                            <td width="50%">ISSUE NUMBER</td>
		                      </tr>
		                          <tr>
		                            <td><input type="text" name="textfield22" class="text_box123 size_140" /></td>
		                            <td><input type="text" name="textfield22" class="text_box123" style="width: 120px;" /></td>
		                          </tr>  
		                          
		                       <tr>
		                            <td width="40%">START DATE</td>
		                            <td width="50%">END DATE</td>
		                      	</tr>
		                          <tr>
		                            <td>
		                            	<select name="select2" id="select2">
		                              		<option>01</option>
		                                 </select>
		                              	<select name="select2" id="select2">
		                                	<option>2011</option>
		                              	</select>
		                            </td>
		                            <td>
		                            	<select name="select2" id="select2">
		                              		<option>01</option>
		                                 </select>
		                              	<select name="select2" id="select2">
		                                	<option>2011</option>
		                              	</select>
		                             </td>
		                          </tr>   
		                      
		                            </table></td>
		                          </tr>
		                        </table></td>
                      
                      </tr>   
 	<!-- paypal  -->	                     
                      <!--<tr>
                        <td colspan="2" style="padding-left: 15px;"><input type="radio" name="payment_system" id="paypal" value="paypal" />
                        Paypal <img src="images/paypal.png" alt="" width="43" height="15" /><br />
                        </td>
                      </tr>-->
                      <!-- <tr id="paypal">
                      	<td style="font-size:11px;">paypal</td>
                      </tr> -->
<script type="text/javascript">

/*$("input[name='payment_system']:checked").change(function () {
	$("tr#cc").slideDown(500);
});
*/


$('table#cc').show();
$('table#maestro').hide(0);
$('tr#paypal').hide(0);

$('input[name="payment_system"]').change(function() {
                var selected_type = $(this).val();
                switch(selected_type) {
                        case "cc":
                                $('table#cc').slideDown(500);
                                //if others are visible just slideup
                                $('table#maestro').slideUp(500); 
                                $('tr#paypal').slideUp(500);
                        break;

                        case "maestro": 
                                $('table#maestro').slideDown(500);
                                //if others are visible just slideup
                                $('table#cc').slideUp(500); 
                                $('tr#paypal').slideUp(500);
                        break;

                        case "paypal": 
                                $('tr#paypal').slideDown(500);
                                //if others are visible just slideup
                                $('table#cc').slideUp(500); 
                                $('table#maestro').slideUp(500);
                        break;
                }
        }
);
</script>                      
                      <tr>
                        <td colspan="2" style="font-size:11px; padding-left:20px;">By purchasing, you agree to the deal <a href="#">Fine Print </a>and the GeeLaza <a href="#">Terms &amp; Conditions.</a></td>
                      </tr>
                       <tr>
                        <td colspan="2">
                        
                        <div id="gateway_error_msg" class="error"></div>
            				<?php
		                    //$amount = $_SESSION['total_price'];
		                    $user_id = $_SESSION["user_id"];
		                    
		                    $deal_id = $prod_res['deal_id'];
		                    //$qty = $_SESSION['qty'];
		                    $trn_date = date("Y-m-d H:i:s");
		                   
		                    
		                    echo $message="<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" >
		                    <input type=\"hidden\" name=\"notify_url\" value=\"http://unifiedinfotech.net/getdeals/paypal_ipn.php\">
		                    <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
		                    <input type=\"hidden\" name=\"business\" value=\"santan_1313669535_biz@unifiedwebdevelopment.com\">
		                    <input type=\"hidden\" name=\"item_name\" value=\"Paypal test service\">
		                    <input type=\"hidden\" id=\"frm_paypal_total_qty\" name=\"item_number\" value=\"\">
		                    <input type=\"hidden\" id=\"frm_paypal_total_price\" name=\"amount\" value=\"$prod_res[discounted_price]\">
		                    <input type=\"hidden\" name=\"page_style\" value=\"Primary\">
		                    <input type=\"hidden\" name=\"no_shipping\" value=\"1\">
		                    <input type=\"hidden\" name=\"return\" value=\"http://unifiedinfotech.net/getdeals/thankyou.php\">
		                    <input type=\"hidden\" name=\"cancel_return\" value=\"http://unifiedinfotech.net/getdeals/cancel.php\">
		                    <input type=\"hidden\" name=\"no_note\" value=\"1\">
		                    <input type=\"hidden\" name=\"currency_code\" value=\"USD\">
		                    <input type=\"hidden\" name=\"custom\" value=\"".$user_id.",".$deal_id.",".$trn_date."\"> <p>            
		                    
		                    <input type=\"submit\" name=\submit\" value=\"Buy your deal\" class=\"buyu_btn\" style=\"cursor:pointer; font-size:20px;\">
		                    
		                    </form>";
		                    //<input type=\"submit\" name=\submit\" value=\"Pay\">
		                   
		                    
		                    ?>
                        
                        <!--<input type="submit" name="Submit" value="Buy your deal" class="buyu_btn" />--></td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                    </table>    
                    
 <!-- Not login Payment table ends -->
<?php } else { ?>

		<div class="how_right_ani2" style="margin-top: 80px;">
		   <div style="font: normal 18px/25px Arial, Helvetica, sans-serif; color:#4d4550; text-align:center;">Got questions?</div>
			 
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>What happens after I buy the deal?</p></div><div class=clear></div><div class=tip_mid><ul><li>You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/1.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>What happens after I buy the deal?</p></div><div class=clear></div><div class=tip_mid><ul><li>You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">What happens after I buy the deal?</a></td>
                  </tr>
                  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>When can I use my deal?</p></div><div class=clear></div><div class=tip_mid><ul><li>Be patient. We will email you when your deal is ready to use.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/2.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>When can I use my deal?</p></div><div class=clear></div><div class=tip_mid><ul><li>Be patient. We will email you when your deal is ready to use.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">When can I use my deal?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>When will my voucher expire?</p></div><div class=clear></div><div class=tip_mid><ul><li>The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/3.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>When will my voucher expire?</p></div><div class=clear></div><div class=tip_mid><ul><li>The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">When will my voucher expire?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Can I buy a deal as gift?</p></div><div class=clear></div><div class=tip_mid><ul><li>Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/4.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Can I buy a deal as gift?</p></div><div class=clear></div><div class=tip_mid><ul><li>Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">Can I buy a deal as gift?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Can I get refund for my order?</p></div><div class=clear></div><div class=tip_mid><ul><li>Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/5.png" alt="" width="24" height="25"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Can I get refund for my order?</p></div><div class=clear></div><div class=tip_mid><ul><li>Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">Can I get refund for my order?</a></td>
                  </tr>
                </table>
			 
			 <!-- 
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px;"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>What happens after I buy the deal?</strong> <br /> <br />You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/1.png" alt="" width="24" height="25" style=" padding-top: 7px;"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>What happens after I buy the deal?</strong> <br /> <br />You can find the link to your voucher in your GeeLaza account and also in your personal email. Most of our voucher can be redeemed online but if your voucher cannot be redeemed online then print your voucher and present it to the merchant.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">What happens after I buy the deal?</a></td>
                  </tr>
                  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>When can I use my deal?</strong> <br /> <br />Be patient. We will email you when your deal is ready to use.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/2.png" alt="" width="24" height="25" style=" padding-top: 7px;"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>When can I use my deal?</strong> <br /> <br />Be patient. We will email you when your deal is ready to use.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">When can I use my deal?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>When will my voucher expire?</strong> <br /> <br />The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/3.png" alt="" width="24" height="25" style=" padding-top: 7px;"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>When will my voucher expire?</strong> <br /> <br />The voucher expires on the date printed on the voucher. Your voucher has everything that you would need to redeem it.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">When will my voucher expire?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>Can I buy a deal as gift?</strong> <br /> <br />Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/4.png" alt="" width="24" height="25" style=" padding-top: 7px;"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>Can I buy a deal as gift?</strong> <br /> <br />Off course! You can give our vouchers as a gift. Our vouchers are completely transferrable and don&prime;t worry about the name of the buyer on it.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">Can I buy a deal as gift?</a></td>
                  </tr>
				  <tr>
                    <td style="width: 24px; height:25px; padding-right: 10px"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>Can I get refund for my order?</strong> <br /> <br />Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/5.png" alt="" width="24" height="25" style=" padding-top: 7px;"/></a></td>
                    <td style="font: normal 12px/40px Arial, Helvetica, sans-serif; text-align:left; color: #777777; border-bottom: solid 1px #cccccc;"><a style="color:#3bb8ff; font: normal 12px/40px Arial, Helvetica, sans-serif; text-decoration: none;" href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container2 style=width:220px; text-align:left; margin:80px auto;><ul><li><strong>Can I get refund for my order?</strong> <br /> <br />Yes! GeeLaza will provide a refund if you change your mind within five days after you&prime;ve purchased your voucher and want to &ldquo;return&rdquo; the unused voucher.</li></ul><div class=white-tl2></div><div class=white-bl2></div><div class=white-tr2></div><div class=white-br2></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();">Can I get refund for my order?</a></td>
                  </tr>
                </table>
			 
			  -->
                
                
                
                		<table style="padding-top: 40px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr height="40px">
                              <td style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;"><img src="images/green_thick.gif" alt="" width="20" height="17" style="padding-top: 5px;" />Shop with confidence online</td>
                            </tr>
                             <tr height="40px">
                              <td style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;"><img src="images/green_thick.gif" alt="" width="20" height="17" style="padding-top: 5px;"/>Your Privacy is assured</td>
                            </tr>
                            <tr height="40px">
                              <td style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;"><img src="images/green_thick.gif" alt="" width="20" height="17" style="padding-top: 5px;"/>Get amazing deals today</td>
                             </tr>
                             <tr height="40px"> 
                              <td style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;"><img src="images/green_thick.gif" alt="" width="20" height="17" style="padding-top: 5px;"/>Explorer the new side of life</td>
                            </tr>
                        </table>
            </div>

<?php } ?>                    
                    </td>
                    </tr> 
                  </table>
                  
        </td>
        <td width="260" style="vertical-align:top;">
        	<table style="padding-top: 15px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="20" style="width:17px;"><img src="images/green_thick.gif" alt="" width="20" height="17" /></td>
                  <td width="175" style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;">Shop with confidence online</td>                  
                </tr>  
                <tr>                
                  <td width="50" style="width:17px;"><img src="images/green_thick.gif" alt="" width="20" height="17" /></td>
                  <td width="196" style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;">Your Privacy is assured</td>
                </tr>              
                <tr>
                  <td width="20" style="width:17px;"><img src="images/green_thick.gif" alt="" width="20" height="17" /></td>
                  <td width="175" style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;">Get amazing deals today</td>                 
                </tr>
                <tr>                 
                  <td width="50" style="width:17px;"><img src="images/green_thick.gif" alt="" width="20" height="17" /></td>
                  <td width="196" style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;">Explorer the new side of life</td>
                </tr>
              </table>
        </td>
      </tr>
    </table>
  </div>
  
 
               
                     </td>
                        </tr>
                        <tr>
                          <td>
                          
                         <!-- <table style="padding-top: 15px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="20" style="width:17px;"><img src="images/green_thick.gif" alt="" width="20" height="17" /></td>
                              <td width="175" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Shop with confidence online</td>
                              <td width="20">&nbsp;</td>
                              <td width="50" style="width:17px;"><img src="images/green_thick.gif" alt="" width="20" height="17" /></td>
                              <td width="196" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Your Privacy is assured</td>
                            </tr>
                            <tr>
                              <td colspan="5" style="width:17px;">&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="20" style="width:17px;"><img src="images/green_thick.gif" alt="" width="20" height="17" /></td>
                              <td width="175" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Get amazing deals today</td>
                              <td width="20">&nbsp;</td>
                              <td width="50" style="width:17px;"><img src="images/green_thick.gif" alt="" width="20" height="17" /></td>
                              <td width="196" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Explorer the new side of life</td>
                            </tr>
							
                          </table>-->
                          
                          </td>
<?php } else { ?>


<form action="thankyou.php" name="frmccloginpayment" method="post">
	<input type="hidden" maxlength="7" name="payment_amount" id="payment_amount" value="<?php echo $prod_res[discounted_price]; ?>">
	<input type="hidden" name="paymentType" value="Sale" />

         <table width="100%" border="0" cellspacing="0" cellpadding="0" class="leftfrom" style="width:100%;">
		 <tr>
	  	<td><table  style="padding-top:15px;" width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td width="6%" align="left" valign="top" style="padding-left:12px;"><input id="ccrad" name="payment_system" type="radio" value="cc" checked="checked"/></td>
					    <td width="18%" align="left" valign="top" style="font: bold 13px/20px Arial, Helvetica, sans-serif;
	color: #3a3b3d;"><span style="text-transform: uppercase; font-size:12px;">Credit/Debit Card</span></td>
					    <td width="30%" align="left" valign="top"><img src="images/c_cards.png" alt="" width="112" height="19"/></td>
						<td style="padding-left: 15px; font: bold 13px/20px Arial, Helvetica, sans-serif;
	color: #3a3b3d;" valign="top"><input type="radio" name="payment_system" id="maestro" value="maestro" />
                          <span style="text-transform: uppercase; font-size:12px;">Maestro</span> <img src="images/payment_icon01.png" alt="" width="22" height="14" /></td>
						<td style="padding-left: 15px; font: bold 13px/20px Arial, Helvetica, sans-serif;
	color: #3a3b3d;" valign="top"><input type="radio" name="payment_system" id="paypal" value="paypal" />
                        <span style="text-transform: uppercase; font-size:12px;">Paypal</span> <img src="images/paypal.png" alt="" width="43" height="15" /><br />
                        </td>
					  </tr>
					</table></td>
	  </tr>
                <tr>
                  <td width="660"> 
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
                     <!--<tr>
                        <td colspan="2" style="padding-left:14px;"><img src="images/payment_details.png" alt="" width="164" height="21"/></td>
                     </tr>
                      <tr>
                        <td style="font: normal 11px/14px Arial, Helvetica, sans-serif; color:#666666; padding-left:14px;" width="100%" colspan="2">Please provide your credit card information below</td>
                      </tr>-->
					   <!--<tr>
                        <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td width="6%" align="left" valign="top" style="padding-left:14px;"><input id="ccrad" name="payment_system" type="radio" value="cc" checked="checked"/></td>
					    <td width="26%" align="left" valign="top">Credit/Debit Card</td>
					    <td width="68%" align="left" valign="top"><img src="images/c_cards.png" alt="" width="112" height="19"/></td>
					  </tr>
					</table></td>
                    </tr>-->
				 <tr>                    
            	<!-- cc form -->	
                    
                        <td colspan="2"><table  id="cc" style="margin: 0 0 0 20px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>                    
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">                            
                           <tr>
                            <td width="100%" colspan="2">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                                  <tr>
                                    <td width="315">CARDHOLDERS FIRST NAME</td>
                                    <td>CARDHOLDERS LAST NAME</td>
                                  </tr>
                                  <tr>
                                    <td><input type="text" size=30 maxlength=32 name=firstName class="text_box123" style="width:285px;"/></td>
                                    <td><input type="text" size=30 maxlength=32 name=lastName class="text_box123" style="width:285px;"/></td>
                                  </tr>
                                </table>
                            </td>
                          </tr>
                          <tr>
                            <td width="100%" colspan="2">ADDRESS LINE 1</td>
                          </tr>
                      <tr>
                        <td colspan="2">
                         <input type="text" maxlength=100 name=address1 class="text_box12 width600"/>
						</td>
                      </tr>
					   <tr>
                        <td width="100%" colspan="2">ADDRESS LINE 2</td>
                      </tr>
                      <tr>
                        <td colspan="2">
                         <input type="text" maxlength=100 name=address2 class="text_box12 width600"/>
						</td>
                        
                        <tr>
                            <td width="100%" colspan="2">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                                  <tr>
                                    <td width="315">TOWN / CITY</td>
                                    <td>POSTCODE</td>
                                  </tr>
                                  <tr>
                                    <td><input type="text" maxlength=40 name=city class="text_box123" style="width: 285px;"/></td>
                                    <td><input type="text" maxlength=10 name=zip class="text_box123" style="width: 285px;" /></td>
                                  </tr>
                                </table>
                            </td>
                          </tr>
                          <tr>
                            <td width="100%" colspan="2">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                                  <tr>
                                    <td width="315">CARD NUMBER</td>
                                    <td>CARD TYPE</td>
                                  </tr>
                                  <tr>
                                    <td><input type="text" maxlength="19" name="creditCardNumber" class="text_box12" style="width:285px" value="4379828854845152"/></td>
                                    <td>
                                    <div class="styled_select" style="width:135px;">
                                    <select name="creditCardType" onChange="javascript:generateCC(); return false;" style="width:150px;">
                                        <option value="Visa" selected>Visa</option>
                                        <option value="MasterCard">MasterCard</option>
                                        <option value="Discover">Discover</option>
                                        <option value="Amex">American Express</option>
                                   </select>
                                   </div>
                                  </td>
                                  </tr>
                                </table>
                            </td>
                          </tr>
                        <tr>
                            <td width="100%" colspan="2">
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:auto;">
                                  <tr>
                                    <td width="315">SECURITY CODE <a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Where can I find my card security code?</p></div><div class=clear></div><div class=tip_mid><ul><li>They are last 3 digits on the back of your card.<br /> <br /><img src=images/card.gif /></li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/question.png" alt="" width="12" height="12" /></a></td>
                                    <td>EXPIRY DATE</td>
                                  </tr>
                                  <tr>
                                    <td><input type="text" maxlength="4" name="cvv2Number" class="text_box123" value="962" style="width:285px;"/></td>
                                    <td>
                                    <div class="styled_select" style="width:80px; float:left; margin-right:10px;">
                                    	<select name="expDateMonth" style="width:105px;">
                            			<option value="0">Month</option>
                              		<?php for ($m = 1; $m <= 12; $m++) { ?>
                              			<option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                              		<?php } ?>
                                </select>
                                </div>
                                <div class="styled_select" style="width:70px; float:left;">
	                            <select name="expDateYear" style="width:88px;">
	                                	<option value="0">Year</option>
                              		<?php for ($y = date("Y"); $y <= date("Y")+10; $y++) { ?>
                              			<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                              		<?php } ?>
	                            </select>
                                </div>
                                  </td>
                                  </tr>
                                </table>
                            </td>
                          </tr>
                          
                      
                            </table>
                       
                            </td>
                          </tr>
                        </table></td>
                      </tr>
					  
	<!-- maestro form -->				  
					  <!--<tr>
                        <td style="padding-left:15px;"><input type="radio" name="payment_system" id="maestro" value="maestro" />
                          Maestro <img src="images/payment_icon01.png" alt="" width="22" height="14" /></td>
                      </tr>--> 
                      <tr>
                      
                      	<td colspan="2"><table id="maestro" style="margin: 0 0 0 20px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                             <tr>
		                        <td>CARDHOLDERS FIRST NAME</td>
		                        <td>CARDHOLDERS LAST NAME</td>
		                      </tr>
		                      <tr>
		                        <td><input type="text" name="textfield4" class="text_box123 size_140" /></td>
		                        <td><input type="text" name="textfield4" class="text_box123 size_140"/></td>
		                      </tr>
		                      <tr>
		                        <td width="100%" colspan="2">ADDRESS LINE 1</td>
		                      </tr>
		                      <tr>
		                        <td colspan="2">
		                         <input type="text" name="textfield4" class="text_box12" style="width:390px"/>
								</td>
		                      </tr>
							   <tr>
		                        <td width="100%" colspan="2">ADDRESS LINE 2</td>
		                      </tr>
		                      <tr>
		                        <td colspan="2">
		                         <input type="text" name="textfield4" class="text_box12" style="width:390px"/>
								</td>
		                      </tr>
							     <tr>
		                            <td width="40%">TOWN / CITY</td>
		                            <td width="50%">POSTCODE</td>
		                      </tr>
		                          <tr>
		                            <td><input type="text" name="textfield22" class="text_box123 size_140" /></td>
		                            <td><input type="text" name="textfield22" class="text_box123" style="width: 120px;" /></td>
		                          </tr>
								   <tr>
		                        <td width="100%" colspan="2">CARD NUMBER</td>
		                      </tr>
		                      <tr>
		                        <td colspan="2">
		                         <input type="text" name="textfield4" class="text_box12" style="width:200px"/>
								</td>
		                      </tr>  
		                       <tr>
		                            <td width="40%">SECURITY CODE <a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=white-container style=width:276px; text-align:left; margin:80px auto 0 -150px;><ul><li><strong>Where can I find my card security code?</strong> <br /> <br />They are last 3 digits on the back of your card.<br /> <br /><img src=images/card.gif /></li></ul><div class=white-tl></div><div class=white-bl></div><div class=white-tr></div><div class=white-br></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/question.png" alt="" width="12" height="12" /></a></td>
		                            <td width="50%">ISSUE NUMBER</td>
		                      </tr>
		                          <tr>
		                            <td><input type="text" name="textfield22" class="text_box123 size_140" /></td>
		                            <td><input type="text" name="textfield22" class="text_box123" style="width: 120px;" /></td>
		                          </tr>  
		                          
		                       <tr>
		                            <td width="40%">START DATE</td>
		                            <td width="50%">END DATE</td>
		                      	</tr>
		                          <tr>
		                            <td>
		                            	<select name="select2" id="select2">
		                              		<option>01</option>
		                                 </select>
		                              	<select name="select2" id="select2">
		                                	<option>2011</option>
		                              	</select>
		                            </td>
		                            <td>
		                            	<select name="select2" id="select2">
		                              		<option>01</option>
		                                 </select>
		                              	<select name="select2" id="select2">
		                                	<option>2011</option>
		                              	</select>
		                             </td>
		                          </tr>   
		                      
		                            </table></td>
		                          </tr>
		                        </table></td>
                      
                      </tr>   
 	<!-- paypal  -->	                     
                      <!--<tr>
                        <td colspan="2" style="padding-left:15px;"><input type="radio" name="payment_system" id="paypal" value="paypal" />
                        Paypal <img src="images/paypal.png" alt="" width="43" height="15" /><br />
                        </td>
                      </tr>-->
                      <!-- <tr id="paypal">
                      	<td style="font-size:11px;">paypal</td>
                      </tr> -->
                     
                      <tr>
                        <td colspan="2" style="font-size:11px; padding-left:16px;">By purchasing, you agree to the deal <a href="#">Fine Print </a>and the GeeLaza <a href="#">Terms &amp; Conditions.</a></td>
                      </tr>
                       <tr>
                        <td colspan="2">
                        
                        <div id="gateway_error_msg" class="error"></div>
            				
            				<!-- paypal IPN values  -->
            				
            				 <?php 
	            		 		//$amount = $_SESSION['total_price'];
								$user_id = $_SESSION["user_id"];
								$deal_id = $prod_res['deal_id'];
								//$qty = $_SESSION['qty'];
								$trn_date = date("Y-m-d H:i:s");
            				 ?>

            				<input type="hidden" id="frm_paypal_total_qty" name="item_number" value="1">
							<input type="hidden" id="frm_paypal_total_price" name="amount" value="<?php echo $prod_res['discounted_price']; ?>">
							<input type="hidden" name="custom" value="<?php echo $user_id.",".$deal_id.",".$trn_date; ?>">
							<input type="hidden" name="item_name" value="<?php echo $prod_res['title']; ?>">
                        
                        <input type="submit" name="Submit" value="Buy your deal" class="buyu_btn" style="margin-left:16px;"/>   </td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                    </table>
                    
 					</td>                    
                    <td width="260"><table style="padding-top: 40px;" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr height="40px">
                              <td style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;"><img src="images/green_thick.gif" alt="" width="20" height="17" style="padding-top: 5px;" />Shop with confidence online</td>
                            </tr>
                             <tr height="40px">
                              <td style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;"><img src="images/green_thick.gif" alt="" width="20" height="17" style="padding-top: 5px;"/>Your Privacy is assured</td>
                            </tr>
                            <tr height="40px">
                              <td style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;"><img src="images/green_thick.gif" alt="" width="20" height="17" style="padding-top: 5px;"/>Get amazing deals today</td>
                             </tr>
                             <tr height="40px"> 
                              <td style="color:#696969; font: normal 14px/28px Calibri, Arial, Helvetica, sans-serif;"><img src="images/green_thick.gif" alt="" width="20" height="17" style="padding-top: 5px;"/>Explorer the new side of life</td>
                            </tr>
                        </table></td>    
                    </tr> 
                  </table>
</form>



<script type="text/javascript">

/*$("input[name='payment_system']:checked").change(function () {
	$("tr#cc").slideDown(500);
});
*/


$('table#cc').show();
$('table#maestro').hide(0);
$('tr#paypal').hide(0);

$('input[name="payment_system"]').change(function() {
                var selected_type = $(this).val();
                switch(selected_type) {
                        case "cc":
                                $('table#cc').slideDown(500);
                                //if others are visible just slideup
                                $('table#maestro').slideUp(500); 
                                $('tr#paypal').slideUp(500);
                        break;

                        case "maestro": 
                                $('table#maestro').slideDown(500);
                                //if others are visible just slideup
                                $('table#cc').slideUp(500); 
                                $('tr#paypal').slideUp(500);
                        break;

                        case "paypal": 
                                $('tr#paypal').slideDown(500);
                                //if others are visible just slideup
                                $('table#cc').slideUp(500); 
                                $('table#maestro').slideUp(500);
                        break;
                }
        }
);
</script> 
<?php }	// End Registration form condition ?>

 
                        </tr>
                      </table>                    </td>                    
                  </tr>
                </table>
                  
                  <div>&nbsp;</div>
                </div>

    </div>
<div class="accounts_bot"><img src="images/spacer.gif" alt="" width="1" height="9"/></div>
</div>
</div>










<script type="text/javascript">

function total_price(qty) {
	var single_price = <?php echo strip_tags($prod_res['discounted_price']); ?>;
	//alert (single_price);
	var total_price = single_price*qty;
	
	document.getElementById('total_price').innerHTML = '&pound;'+total_price;
}


function ajaxReq(str)
{
var xmlhttp;
//alert(str); die();
if (str.length==0)
  { 
  document.getElementById("total_price").innerHTML="";
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
	  //alert(xmlhttp.responseText);
	  	document.getElementById("payment_amount").value = xmlhttp.responseText;
	    document.getElementById("total_price").innerHTML='&pound;'+xmlhttp.responseText;
	    document.getElementById("big_total_price").innerHTML = xmlhttp.responseText;
	    document.getElementById("frm_paypal_total_price").value=xmlhttp.responseText;
	    document.getElementById("frm_paypal_total_qty").value=str;
	    
    }
  }
xmlhttp.open("GET","ajax_payment.php?qty="+str+"&id="+<?php echo $prod_id; ?>,true);
xmlhttp.send();
}

</script>



</div>
</div>
</div>
</div>
<?php include ('include/footer.php'); ?>