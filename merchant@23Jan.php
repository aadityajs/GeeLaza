<?php
include("include/header.php");

if(strtolower($_POST["btnRegister"])=='sign_up')
{
	$dob = $_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"];
	$_POST["dob"] = $dob;
	$_POST["reg_type"] = 'merchant';
	$date = date('Y-m-d');
	
	$sql_insert_merchant = "INSERT INTO ".TABLE_USERS."(company_name,ccaddress1,cccity,cczip,ccstate,email,phone_no,password,dob,reg_type,date_added,website) VALUES('".$_POST["company_name"]."','".$_POST["ccaddress1"]."','".$_POST["cccity"]."','".$_POST["cczip"]."','".$_POST["ccstate"]."','".$_POST["email"]."','".$_POST["phone_no"]."','".$_POST["password"]."','".$_POST["dob"]."','".$_POST["reg_type"]."','".$date."','".$_POST["website"]."')";
	mysql_query($sql_insert_merchant);
	$GLOBALS["reg_msg"] = 'The merchant registration is successfull';
}

if(strtolower($_POST["btnLogin"])=='login')
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$sql_merchant = "SELECT * FROM ".TABLE_USERS." WHERE email='".$email."' and password='".$password."' and reg_type='merchant'";
	$result_merchant = mysql_query($sql_merchant);
	$count_merchant = mysql_num_rows($result_merchant);
	if($count_merchant>0)
	{
		$row_merchant = mysql_fetch_array($result_merchant);
		$user_id = $row_merchant["user_id"];
		$_SESSION["muser_id"] = $user_id;
		header('location:merchant_home.php');
		exit;
	}
}

?>
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>


<style type="text/css">		
.warning_box{width:622px;clear:both;background:url(images/warning.png) no-repeat left #fcfae9;
border:1px #e9e6c7 solid;background-position:15px 10px;padding:20px 20px 15px 60px;margin:0 0 10px 0;}

.valid_box{width:622px;clear:both;background:url(images/valid.png) no-repeat left #edfce9;
border:1px #cceac4 solid;background-position:15px 10px;padding:20px 20px 15px 60px;margin:0 0 10px 0;}

.error_box{width:522px;clear:both;background:url(images/error.png) no-repeat left #fce9e9;
border:1px #eac7c7 solid;background-position:15px 10px;padding:20px 20px 15px 60px;margin:0 0 10px 0;}		
</style>



<?php
	if($GLOBALS['reg_errmsg']){
	echo '<div class="error_box" style="font-size:15px;">'.$GLOBALS['reg_errmsg'].'</div>' ;
	$GLOBALS['reg_errmsg']="";
	}
	

	if($GLOBALS['reg_msg']){
	echo '<div class="valid_box" style="font-size:15px;">'.$GLOBALS['reg_msg'].'</div>' ;
	$GLOBALS['reg_msg']="";
	}
?>





<div id="container">
<div id="leftcol">
<div class="deal_info">
<div class="green_curv10"></div>
<div class="clear"></div>
<div class="green_curv30">
<div class="today_deal">
<div class="register_box1">

<div class="clear"></div>
<form name="cust_login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  style="background:#fff; margin:0px; padding:0px; border:1px solid #fff;">

<!-- Login form starts --> 
<h6>Already have a merchant Account?</h6>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="blue_box" style="width:100%;">
       <tr>
         <td>
        
         <table width="600" border="0" align="center" cellpadding="3" cellspacing="3">
             <tr>
             <td colspan="3">
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
                 <td width="51%">Email Address</td>
                 <td width="49%">Password</td>
               </tr>
               <tr>
                 <td>
                 <div id='cust_login_lemail_errorloc' class="error"></div>
                 <input type="text" name="email" id="email" onblur="javascript: return validateEmail(this.value);" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["email"];} ?>"class="text_box1" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                 <td>
                 <div id='cust_login_lpassword_errorloc' class="error"></div>
                 <input type="password" name="password" id="password" class="text_box1" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
               </tr>
             </table></td>
           </tr>
           <tr>
             <td width="127"><input type="submit" name="btnLogin" value="Login" class="reset_btn" style="cursor:pointer;" /></td>
             <td width="22"><!--<input type="checkbox" name="checkbox" value="checkbox"/>--></td>
             <td width="451"><!--Login automatically--></td>
           </tr>
           <tr>
             <td colspan="3" class="forgot_password"><a href="<?php echo SITE_URL; ?>forgetpassword.php" style="color: blue; font-size:9px; font-family:Arial, Helvetica, sans-serif; ">Forgot your password?</a> </td>
           </tr>
         </table>
    
         </td>
       </tr>
     </table>
     <!-- Login form ends -->      
</form>

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("cust_login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("lemail","maxlen=50");
    frmvalidator.addValidation("lemail","req","Enter your email address");
    //frmvalidator.addValidation("lemail","email");

    frmvalidator.addValidation("lpassword","req","Enter your password");
    //frmvalidator.addValidation("lpassword","minlen=6","Password must be at least 6 charecters");

//]]></script>
<script type="text/javascript">

function validateEmail(email) { 
	
    var re = /^(([^<>()[\]\\.,;:\s@\"']+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
    if (!re.test(email)) {
    document.getElementById('cust_login_lemail_errorloc').innerHTML = 'Invalid email address';
    return false;
    }
}

</script>





<!-- Login form validator starts --> 
<h6 style="margin:0; background:#fff; padding:0px;" >New Merchant Registration</h6>

<form name="mer_register" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  style="background:#fff; margin:0px; padding:0px; border:1px solid #fff;">
<div style="border:1px #CCCCCC solid; background:#fff;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="61%">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg2">
       <tr>
         <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg">
            <tr>
            <td><img src="images/spacer.gif" alt="" width="1" height="6"/></td>
            </tr>    
            <tr>
            <td class="text_black"><span><img src="images/spacer.gif" alt="" width="210" height="1" /></span><!-- <span>Required field <span class="red">(*)</span></span> --></td>
            </tr>
         
           <!-- <tr>
              <td>Title <span class="red">*</span></td>
            </tr>
            <tr>
          <td><select name="title" class="selectbg">
                          <option value="">Please choose</option>
                          <option value="Mr.">Mr.</option>
                          <option value="Mrs.">Mrs.</option>
                          <option value="Miss">Miss</option>
                          <option value="Dr.">Dr.</option>
                          
                          </select></td>
            </tr>
            <tr>-->
            
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>Company Name <span class="red">*</span></td>
              </tr>
              <tr>
                <td width="45%">
                <div id='mer_register_fname_errorloc' class="error"></div>
                <input type="text" name="company_name" id="company_name" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["company_name"];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
              </tr>
              <tr><td>&nbsp;</td></tr>
              <tr>
                <td>Company Address1 <span class="red">*</span></td>
              </tr>
              <tr>
                <td width="55%">
                <div id='mer_register_lname_errorloc' class="error"></div>
                <input type="text" name="ccaddress1" id="ccaddress1" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["ccaddress1"];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
              </tr>
               <tr><td>&nbsp;</td></tr>
			   
			   <tr>
			   <td>
			   <table width="100%" border="0" cellspacing="0" cellpadding="0">
			   
			   
              <tr>
                <td width="45%">Company city <span class="red">*</span></td>
				<td width="8%">&nbsp;</td>
				<td width="47%">Zipcode<span class="red">*</span></td>
              </tr>
			  
			  
			  
              <tr style="border:1px solid red;">
                <td width="45%">
					<div id='mer_register_add1_errorloc' class="error"></div>
					<select name="cccity" id="cccity" class="selectbg" style="width:200px;">
					<option value=''> Select City </option>
					<?php
						$sql_city = "SELECT * FROM ".TABLE_CITIES;
						$result_city = mysql_query($sql_city);
						while($row_city = mysql_fetch_array($result_city))
						{
					?>
						<option value='<?php echo $row_city["city_id"] ?>'><?php echo $row_city["city_name"]; ?></option>
					<?php
						}
					?>
					</select>
				</td>
				<td width="8%">&nbsp;</td>
                <td width="47%">
					<div id='mer_register_postcode_errorloc' class="error"></div>
					<input type="text" name="cczip" id="cczip" style="width: 100px; <?php if ($flag ==1) {echo 'border:1px solid red;';} ?>" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["cczip"];} ?>" class="text_box11"/>
				</td>
              </tr>  
			  </table>
			  
			  </td>
			  </tr>
			  
			  			  
		   <tr><td>&nbsp;</td></tr>    
            </table></td>
            </tr>
			
            <tr>
            <td>Compant state <span class="red"></span> </td>
            </tr>
            <tr>
              <td><input type="text" name="ccstate" id="ccstate" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["ccstate"];} ?>" class="text_box12"/></td>
            </tr>
			
			 			
			
            <tr><td>&nbsp;</td></tr>
            <tr>
              <td>Email Address <span class="red">*</span></td>
            </tr>
            <tr>
              <td>
              <div id='mer_register_email_errorloc' class="error"></div>
              <input type="text" name="email" id="email" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["email"];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
            </tr>


            <tr><td>&nbsp;</td></tr>
            <tr>
              <td>Phone Number <span class="red"></span></td>
            </tr>
            <tr>
              <td><input type="text" name="phone_no" id="phone_no" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["phone_no"];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
            </tr>
			
            <tr><td>&nbsp;</td></tr>
            <tr>
              <td>Website <span class="red"></span></td>
            </tr>
            <tr>
              <td><input type="text" name="website" id="website" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["website"];} ?>" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
            </tr>
			
			
            <tr><td>&nbsp;</td></tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="3">Date of Birth <a href="javascript: showDetails(10)" onMouseOver="return overlib('&lt;font class=bodytext&gt;GeeLaza recomends all users to provide their real <br>date of birth to encourage authenticity and enable us <br>to provide you amazing deals everyday.&lt;/font&gt;',VAUTO,CAPTION,'&lt;font class=help&gt;<span align=center>Why should i provide my birthday? </span> &lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/question.png" align="default" vspace="4" ></a>
                  <div id='mer_register_day_errorloc' class="error"></div>
                  <div id='mer_register_month_errorloc' class="error"></div>
                  <div id='mer_register_year_errorloc' class="error"></div>
                   
                  </td>
                	
                </tr>
                <tr>
                  <td width="24%">
                        <select name="day" id="day" class="selectbg">
                            <option value="000">Day</option>
                            <?php
                           for($d=1; $d <= 31; $d++)
                           {
                            $selected = ($date[2] == $d)? "selected" : "";
                            echo '<option value="'.$d.'" '.$selected.'>'.$d.'</option>';
                           }
                            ?>
                        </select></td>
                  <td width="25%"><select name="month" id="month" class="selectbg">
                            <option value="000" selected="selected">Month</option>
                            <? for($m=1;$m<=12;$m++){
                            $xx='2001-'.$m.'-01';
                            $selected = ($date[1] == $m)? "selected" : "";
                             ?>
                            <option value="<?='0'.$m?>" <?=$selected?>><?=date('F',strtotime($xx))?></option>
                            <? } ?>
                          </select></td>
                  <td width="51%">
                            <select name="year" id="year" class="selectbg">
                               <option value="000">Year</option>
                                 <?php
                                for($y = date("Y")-50; $y <= date("Y"); $y++)
                                {
                                 $selected = ($date[0] == $y)? "selected" : "";
                                 echo '<option value="'.$y.'" '.$selected.'>'.$y.'</option>';
                                }
                                 ?>
                            </select></td>
                </tr>
              </table></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="45%">Password <span class="red">*</span></td>
                </tr>
                <tr>
                  <td>
                  <div id='mer_register_password_errorloc' class="error"></div>
                  <input type="password" name="password" id="password" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                  <td width="55%">Confirm password <span class="red">*</span></td>
                </tr>
                <tr>
                  <td>
                  <div id='mer_register_cpassword_errorloc' class="error"></div>
                  <input type="password" name="cpassword" id="cpassword" class="text_box12" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr> 
              <td class="privacy_policy">By registering you agree to the  <a href="#" style="color:#3d35ac;">Terms and Conditions</a></span> and  <a href="#" style="color:#3d35ac;">Privacy Policy</a></td>
            </tr>
          </table>
   </td>
       </tr>
     </table>
  </td>
        <td width="39%" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">         
    
          <tr>
            <!--<td align="center" valign="top" style="color:#50b6d0; font: bold 18px/18px Arial, Helvetica, sans-serif;">*<br/>
              <br/>*<br/><br/>*<br/><br/>*<br/>
                <br/></td>
            <td align="left" valign="top" style="font: 14px/17px Calibri; color: #000;">Your Privacy is assured<br/><br/>
              Shop with confidence using GeeLaza<br/><br/>
              Get amazing deals at discounted price<br/><br/>
              get the most of your life and enojoy</td>-->
			  
		<td colspan="2" align="center" valign="middle" style="color:#000; font: bold 14px/18px Calibri, Arial, Helvetica, sans-serif;">&nbsp;</td>
      </tr>  
          <tr>
            <td width="16%" align="center" valign="middle"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
            <td width="84%" align="left" valign="middle" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Your Privacy is assured</td>
          </tr>
          <tr>
            <td align="center" valign="middle"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
            <td align="left" valign="middle" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Shop with confidence online</td>
          </tr>
          <tr>
            <td align="center" valign="middle"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
            <td align="left" valign="middle" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Get amazing deals today</td>
          </tr>
          <tr>
            <td align="center" valign="middle"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
            <td align="left" valign="middle" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Explorer the new side of life</td>
          </tr>  
           
          <tr>
            <td align="center" valign="top" style="color:#50b6d0;">
             <!-- <input type="checkbox" name="terms" value="terms"/>-->
            </span></td>
            <td align="left" valign="top" style="font: bold 12px/17px Arial, Helvetica, sans-serif; color: #666666;"><!--I confirm that I am atlest the age of 18 years old and I have read and agree to the
                <a href="#">Terms &amp; Conditions.</a></span>--></td>
          </tr>          
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top"><input type="submit" name="btnRegister" id="btnRegister" value="sign_up" class="reset_btn2"  style="cursor:pointer;"/></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
   
    </table>
</div>
</form>
<!-- Registration form validator starts --> 


<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("mer_register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("fname","req","Enter your first name");
    frmvalidator.addValidation("fname","maxlen=20",	"Max length for first name is 20");

    frmvalidator.addValidation("lname","req","Enter your last name");

    frmvalidator.addValidation("add1","req","Enter your address");
    frmvalidator.addValidation("city","req","Enter your city");
    frmvalidator.addValidation("postcode","req","Enter your postcode");

    frmvalidator.addValidation("email","maxlen=50");
    frmvalidator.addValidation("email","req","Enter your email address");
    frmvalidator.addValidation("email","email");

  	//frmvalidator.addValidation("confemail","req","Confirm your email address");
    frmvalidator.addValidation("confemail","eqelmnt=email","Confirm your email address");

    frmvalidator.addValidation("day","dontselect=000","Enter your Day of Birth");
    frmvalidator.addValidation("month","dontselect=000","Enter your Month of Birth");
    frmvalidator.addValidation("year","dontselect=000","Enter your Year of Birth");
    
    frmvalidator.addValidation("password","req","Enter your password");
    frmvalidator.addValidation("password","minlen=6","Password must be at least 6 charecters");

    //frmvalidator.addValidation("cpassword","req");
    frmvalidator.addValidation("cpassword","eqelmnt=password","Password must be confirmed");
       
//]]></script>

  <!-- Registration form validator ends --> 
</div>



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

<span class="black_text" style="color:#3A3B3D;">Do you have an account on Facebook? Use it to sign into GeeLaza</span>
<?php if ($cookie) { ?>
<fb:login-button perms="email" autologoutlink="true" onlogin="window.location.reload()"></fb:login-button>
<?php unset($_SESSION['fbuser']); ?> 
<?php } else { ?>
<fb:login-button perms="email" autologoutlink="true">Connect</fb:login-button> 
<?php } ?>
<br/><br/>
</div>
</div>
<div class="green_curv20"></div>
</div>
</div>
<?php include ('include/sidebar-login.php'); ?>
</div>
<?php include("include/footer.php");?>
