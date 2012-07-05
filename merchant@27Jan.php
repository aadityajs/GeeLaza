<?php
include("include/header.php");

if(strtolower($_POST["btnRegister"])=='sign_up')
{
	$dob = $_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"];
	$_POST["dob"] = $dob;
	$_POST["reg_type"] = 'temp_merchant';
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
	}
}

?>


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
<h6 style="margin:0; background:#fff; padding:0px;" >Get Your Business Featured</h6>
<div class="txt1">All the require fields are represented by(*)</div>
<div class="txt1">Fill out the following form and we'll contact you shortly.</div>
<form name="mer_register" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  style="background:#fff; margin:0px; padding:0px; border:1px solid #fff;">
<div style="border:1px #CCCCCC solid; background:#fff;">

       <table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg">
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Business Name <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="15" height="1"/></td>
                    <td>Email Address <span class="red">*</span></td>
                  </tr>
                  <tr>
                    <td>
                    	<div id='mer_register_fname_errorloc' class="error"></div>
                        <input type="text" name="company_name" id="company_name" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["company_name"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                    </td>
                    <td>&nbsp;</td>
                     <td>
              <div id='mer_register_email_errorloc' class="error"></div>
              <input type="text" name="email" id="email" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["email"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                  </tr>
                </table>
            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">First Name <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="15" height="1"/></td>
                    <td>Last Name <span class="red">*</span></td>
                  </tr>
                  <tr>
                    <td>
                    	<div id='mer_register_fname_errorloc' class="error"></div>
                        <input type="text" name="company_name" id="company_name" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["company_name"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                    </td>
                    <td>&nbsp;</td>
                    <td><div id='mer_register_fname_errorloc' class="error"></div>
                <input type="text" name="company_name" id="company_name" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["company_name"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                  </tr>
                </table>
            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Address Line 1 <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="15" height="1"/></td>
                    <td>Address Line 2 </td>
                  </tr>
                  <tr>
                    <td>
                 <div id='mer_register_lname_errorloc' class="error"></div>
                <input type="text" name="ccaddress1" id="ccaddress1" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["ccaddress1"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                    <td>&nbsp;</td>
                    <td>
                 <div id='mer_register_lname_errorloc' class="error"></div>
                <input type="text" name="ccaddress1" id="ccaddress1" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["ccaddress1"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                  </tr>
                </table>
            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">City <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="15" height="1"/></td>
                    <td style="text-align:left;">Country</td>
                  </tr>
                  <tr>
                    <td>
                    	<div id='mer_register_fname_errorloc' class="error"></div>
                        <input type="text" name="company_name" id="company_name" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["company_name"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                    </td>
                    <td>&nbsp;</td>
                    <td>
                    	<div id='mer_register_add1_errorloc' class="error"></div>
                        <div class="styled_select" style="width:300px;">
                        <select name="cccity" id="cccity" class="selectbg" style="width:320px;">
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
                        </div>
                    </td>
                  </tr>
                </table>
            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Country <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="15" height="1"/></td>
                    <td>Postcode <span class="red">*</span></td>
                  </tr>
                  <tr>
                    <td>
                    	<div id='mer_register_add1_errorloc' class="error"></div>
                          <div class="styled_select" style="width:300px;">
                        <select name="cccity" id="cccity" class="selectbg" style="width:320px;">
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
                        </div>
                    </td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="15" height="1"/></td>
                    <td><div id='mer_register_postcode_errorloc' class="error"></div>
					<input type="text" name="cczip" id="cczip" style="<?php if ($flag ==1) {echo 'border:1px solid red;';} ?>" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["cczip"];} ?>" class="text_box12 width300"/></td>
                  </tr>
                </table>
            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Phone No <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="15" height="1"/></td>
                    <td>Website <span class="red">*</span></td>
                  </tr>
                  <tr>
                    <td>
                    	<input type="text" name="phone_no" id="phone_no" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["phone_no"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                    </td>
                    <td>&nbsp;</td>
                    <td><input type="text" name="website" id="website" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["website"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                  </tr>
                </table>
            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Pick a Catagory <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="15" height="1"/></td>
                    <td>Any review Link <span style="text-transform: none; color:#3A3B3D;">(s) Yelp, Qype, etc</span>  <span class="red">*</span></td>
                  </tr>
                  <tr>
                    <td>
                    	<div id='mer_register_fname_errorloc' class="error"></div>
                        <input type="text" name="company_name" id="company_name" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["company_name"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>                    </td>
                    <td>&nbsp;</td>
                    <td rowspan="3"><textarea name="textfield" id="textfield" class="text_box12 width300" style="height:100px; background: #f5f6f9;	border: 1px solid #e0e0e3;"></textarea></td>
                  </tr>
                  <tr>
                    <td style="padding-top:6px;">Where do you want your deal to turn? <span class="red">*</span></td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td><input type="text" name="company_name2" id="company_name2" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["company_name"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                    <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr><td>Tell Us about your business and why Geelaza should partner with you</td></tr>
            <tr><td><textarea name="textfield" id="textfield" class="text_box12" style="height:100px; width:620px; background: #f5f6f9;	border: 1px solid #e0e0e3;"></textarea></td></tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="15"/></td></tr>
            <!--<tr>
              <td class="privacy_policy">By registering you agree to the  <a href="#" style="color:#3d35ac;">Terms and Conditions</a></span> and  <a href="#" style="color:#3d35ac;">Privacy Policy</a></td>
            </tr>-->
            <tr>
           	<td> <input type="submit" style="cursor:pointer;" class="log_in" value="Submit" name="btnRegister"></td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="15"/></td></tr>
          </table>

 <div class="clear"></div>
</div>
</form>
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

<br/><br/>
</div>
</div>
<div class="green_curv20"></div>
</div>
</div>
<?php include ('include/sidebar-login.php'); ?>
</div>
<?php include("include/footer.php");?>
