<?php
include("include/header.php");

/*
 * if(strtolower($_POST["btnRegister"])=='submit')
{
	$dob = $_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"];
	$_POST["dob"] = $dob;
	$_POST["reg_type"] = 'temp_merchant';
	$date = date('Y-m-d');

	$sql_insert_merchant = "INSERT INTO ".TABLE_USERS."(company_name,address1,city,zip,state,email,phone_no,password,dob,reg_type,date_added,website,country,pref_id,status)
							VALUES('".$_POST["company_name"]."','".$_POST["address1"]."','".$_POST["city"]."','".$_POST["zip"]."','".$_POST["county"]."','".$_POST["email"]."','".$_POST["phone_no"]."','".$_POST["password"]."','".$_POST["dob"]."','".$_POST["reg_type"]."','".$date."','".$_POST["website"]."','".$_POST["country"]."','".$_POST["dealcity"]."',1)";
	mysql_query($sql_insert_merchant);
	$GLOBALS["reg_msg"] = 'Merchant registration is successfull';
	//header('location:'.SITE_URL.'merchant_thanku.php');
}
 *
 */

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
<h6 style="margin:-15px 0; background:#fff; padding:0px 0 20px 0; color: #404040; font: bold 30px/35px Arial, Helvetica, sans-serif;" >Get Your Business Featured</h6>
<div class="txt1"><strong>All the require fields are represented by(<span style="color:#000 !important;">*</span>)</strong></div>
<div class="txt1" style="padding-bottom: 10px;">Fill out the following form and we'll contact you shortly.</div>
<form name="mer_register" action="<?php echo SITE_URL; ?>merchant_thanku.php" method="post" onsubmit="javascript: return ValidateMerRegisterForm();" style="background:#fff; margin:0px; padding:0px; border:1px solid #fff;">
<div style="border:1px #CCCCCC solid; background:#fff; float:left; width: 650px; margin: 0 auto;">

       <table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg04">
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Business Name <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td>Trading name<span style="text-transform: none; color:#3A3B3D; font-weight: normal;">  <span class="tet04">(if different)</span></span></td>
                  </tr>
                  <tr>
                    <td>
                        <input type="text" name="company_name" id="company_name" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["company_name"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                        <div id='mer_register_company_name_errorloc' class="error_orange"></div>                    </td>
                    <td>&nbsp;</td>
                     <td>
		              <input type="text" name="company_trading_name" id="company_trading_name" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["company_trading_name"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
		              <div id='mer_register_company_trading_name_errorloc' class="error_orange"></div>		              </td>
                  </tr>

                   <tr>
                    <td width="306">Company Type <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td>Company Registration number <span class="red">*</span><span style="text-transform: none; color:#3A3B3D; font-weight: normal;"> <span class="tet04">(N/A - if not registered)</span></span></td>
                  </tr>
                  <tr>
                    <td>
                    	<div class="styled_select" style="width:300px;">
                        <select name="company_type" id="company_type" class="selectbg" style="width:320px;">
                        <option value=''> --None-- </option>
                        <option value="Limited">Limited</option>
                        <option value="Public limited company">Public limited company</option>
                        <option value="Limited liability partnership">Limited liability partnership</option>
                        <option value="Charity">Charity</option>
                        <option value="Sole Trader">Sole Trader</option>
                        <option value="Non-Ltd Partnership">Non-Ltd Partnership</option>
                        </select>
                        </div>
                        <div id='mer_register_company_type_errorloc' class="error_orange"></div>                    </td>
                    <td>&nbsp;</td>
                     <td>
		              <input type="text" name="company_reg_no" id="company_reg_no" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["company_reg_no"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
		              <div id='mer_register_company_reg_no_errorloc' class="error_orange"></div>		              </td>
                  </tr>

                  <tr>
                    <td width="306" style="padding:3px 0;">Managing Director: First name/ Last name <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td style="padding:3px 0;">Your name<span style="text-transform: none; color:#3A3B3D; font-weight: normal;">(if different)</span>: First name/Last name<span class="red"></span></td>
                  </tr>
				<tr>
                    <td>
                        <input type="text" name="company_md_fname" id="company_md_fname" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["md_fname"];} ?>" class="text_box1204" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                        <input type="text" name="company_md_lname" id="company_md_lname" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["md_lname"];} ?>" class="text_box1204" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                        <div id='mer_register_company_md_name_errorloc' class="error_orange"></div>
                    </td>
                    <td>&nbsp;</td>
                     <td>
                     <input type="text" name="fname" id="fname" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["fname"];} ?>" class="text_box1204" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>

		             <input type="text" name="lname" id="lname" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["lname"];} ?>" class="text_box1204" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
		             <img src="images/spacer.gif" alt="" width="1" height="1"/>
		             <div id='mer_register_fname_errorloc' class="error_orange"></div> 		              </td>
                  </tr>
                </table>            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>

           <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Website<span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td>Email Address <span class="red">*</span></td>
                  </tr>
                  <tr>
                    <td>
                    	<input type="text" name="website" id="website" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["website"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                    	<div id='mer_register_website_errorloc' class="error_orange"></div>                    	</td>
                    <td>&nbsp;</td>
                    <td>
		              <input type="text" name="email" id="email" onkeyup="javascript: return validateEmail(this.value);" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["email"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
		              <div id='mer_register_email_errorloc' class="error_orange"></div>		              </td>
                  </tr>
                </table>            </td>
            </tr>


           <!--  <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">First Name <span class="red">*</span></td>
                    <td width="15"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td>Last Name <span class="red">*</span></td>
                  </tr>
                  <tr>
                    <td>
                        <input type="text" name="fname" id="fname" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["fname"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                        <div id='mer_register_fname_errorloc' class="error_orange"></div>                    </td>
                    <td>&nbsp;</td>
                    <td>
                	<input type="text" name="lname" id="lname" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["lname"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                	<div id='mer_register_lname_errorloc' class="error_orange"></div>                	</td>
                  </tr>
                </table>            </td>
            </tr> -->


            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Business Address 1<span class="red">*</span></td>
                    <td width="10"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td>Business Address 2</td>
                  </tr>
                  <tr>
                    <td>
		                <input type="text" name="address1" id="address1" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["address1"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
		                <div id='mer_register_address1_errorloc' class="error_orange"></div>		                </td>

                    <td>&nbsp;</td>
                    <td>
                 <div id='mer_register_address2_errorloc' class="error_orange"></div>
                <input type="text" name="address2" id="address2" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["address2"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/></td>
                  </tr>
                </table>            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Business City <span class="red">*</span></td>
                    <td width="10"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td style="text-align:left;">Business Country</td>
                  </tr>
                  <tr>
                    <td>
                    <input type="text" name="city" id="city" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["city"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>

                        <!-- <div class="styled_select" style="width:300px;">
                        <select name="city" id="city" class="selectbg" style="width:320px;">
                        <option value=''> Select City </option>
                        <?php
                            $sql_city = "SELECT * FROM ".TABLE_CITIES." GROUP BY city_name";
                            $result_city = mysql_query($sql_city);
                            while($row_city = mysql_fetch_array($result_city))
                            {
                        ?>
                            <option value='<?php echo $row_city["city_id"] ?>'><?php echo $row_city["city_name"]; ?></option>
                        <?php
                            }
                        ?>
                        </select>
                        </div> -->
                        <div id='mer_register_city_errorloc' class="error_orange"></div>                    </td>
                    <td>&nbsp;</td>
                    <td>
                          <div class="styled_select" style="width:300px;">
                        <select name="country" id="country" class="selectbg" style="width:320px;">
                        <option value=''> Select Country </option>
                        <option value='United Kingdom'>United Kingdom</option>
                        <option value='Ireland'>Ireland</option>
                        <option value='Other'>Other</option>
                        <!-- <?php
                            $sql_country = "SELECT * FROM ".TABLE_COUNTRIES." GROUP BY country_name";
                            $result_country = mysql_query($sql_country);
                            while($row_country = mysql_fetch_array($result_country))
                            {
                        ?>
                            <option value='<?php echo $row_country["country_id"] ?>'><?php echo $row_country["country_name"]; ?></option>
                        <?php
                            }
                        ?> -->
                        </select>
                        </div>
                        <div id='mer_register_country_errorloc' class="error_orange"></div>                    </td>

                    <!-- <td>
 						<input type="text" name="county" id="county" value="<?php if(isset($_POST) && $flag ==1){ echo $_POST["county"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                    	<div id='mer_register_county_errorloc' class="error_orange"></div>                    </td> -->
                  </tr>
                </table>            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Postcode <span class="red">*</span></td>
                    <td width="10"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td>Business Type <span class="red">*</span></td>
                  </tr>
                  <tr>
                   <td><div id='mer_register_zip_errorloc' class="error_orange"></div>
					<input type="text" name="zip" id="zip" style="<?php if ($flag ==1) {echo 'border:1px solid red;';} ?>" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["zip"];} ?>" class="text_box12 width300"/></td>
                  <td width="10"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td>
                          <div class="styled_select" style="width:300px;">
                        <select name="business_type" id="business_type" class="selectbg" style="width:320px;">
                        <option value=''> Select Business Type </option>
                        <option value='Commercial'> Commercial </option>
                        <option value='Mobile'> Mobile </option>
                        <option value='Home'> Home </option>
                        </select>
                        </div>
                        <div id='mer_register_business_type_errorloc' class="error_orange"></div>                    </td>


                  </tr>
                </table>            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="306">Phone Number <span class="red">*</span></td>
                    <td width="10"><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                    <td>Business Start Date <span style="text-transform: none; color:#3A3B3D; font-weight: normal;"> <span class="tet04">(dd/mm/yyyy)</span></span> <span class="red">*</span></td>
                  </tr>
                  <tr>
                    <td>
                    	<input type="text" name="phone_no" id="phone_no" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["phone_no"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                    	<div id='mer_register_phone_no_errorloc' class="error_orange"></div>                    </td>
                    <td>&nbsp;</td>
                    <td>
                    	<input type="text" name="business_start_date" id="business_start_date" value="<?php if(isset($_POST) && $flag==1){ echo $_POST["business_start_date"];} ?>" class="text_box12 width300" <?php if ($flag ==1) {echo 'style="border:1px solid red;"';} ?>/>
                    	<div id='mer_register_business_start_date_errorloc' class="error_orange"></div>                    	</td>
                  </tr>
                </table>            </td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>TRADING ADDRESS <span style="text-transform: none; color:#3A3B3D; font-weight: normal;"> <span class="tet04">(if different)</span></span></td>
                  <td><img src="images/spacer.gif" alt="" width="10" height="1"/></td>
                  <td>BUSINESS REVIEW LINK<span style="text-transform: none; color:#3A3B3D; font-weight: normal;"> <span class="tet04">(s) e.g. Trip Advisor, Yelp, Qype etc.</span></span></td>
                </tr>
                <tr>
                  <td><textarea name="trading_address" id="trading_address" class="text_box12 width300" style="height:100px; background: #f5f6f9;	border: 1px solid #e0e0e3;"></textarea></td>
                  <td>&nbsp;</td>
                  <td align="left" valign="top"><textarea name="review" id="review" class="text_box12 width300" style="height:100px; background: #f5f6f9;	border: 1px solid #e0e0e3;"></textarea></td>
                </tr>
                <tr>
                  <td  style="padding-top:6px;">Pick a Catagory <span class="red">*</span></td>
                  <td>&nbsp;</td>
                  <td  style="padding-top:6px;">Where do you want your deal to run? <span class="red">*</span></td>
                </tr>
                <tr>
                  <td>	<div class="styled_select" style="width:300px;">
                        <select name="category" id="category" class="selectbg" style="width:320px;">
                        <option value=''> Select Category </option>

                        <option value="Ecommerce">Ecommerce</option>
                        <option value="Food & Beverage">Food & Beverage</option>
                        <option value="Goods & Services">Goods & Services</option>
                        <option value="Hotel & Travel">Hotel & Travel</option>
                        <option value="Leisure">Leisure</option>
                        <option value="Wellness">Wellness</option>
                        <option value="Other ">Other </option>

                        </select>
                        </div>
                        <div id='mer_register_category_errorloc' class="error_orange"></div></td>
                  <td>&nbsp;</td>
                  <td>
                  		<div class="styled_select" style="width:300px;">
                        <select name="dealcity" id="dealcity" class="selectbg" style="width:320px;">
                        <option value=''> Select deal City </option>
                        <option value='National Deal'>National Deal</option>
                        <?php
                            $sql_city = "SELECT * FROM ".TABLE_CITIES." GROUP BY city_name";
                            $result_city = mysql_query($sql_city);
                            while($row_city = mysql_fetch_array($result_city))
                            {
                        ?>
                            <option value='<?php echo $row_city["city_name"] ?>'><?php echo $row_city["city_name"]; ?></option>
                        <?php
                            }
                        ?>
                        </select>
                        </div>
                        <div id='mer_register_dealcity_errorloc' class="error_orange"></div></td>
                </tr>
              </table>			</td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr><td  style="padding-top:6px;">Tell Us a little bit about your business.</td></tr>
            <tr><td><textarea name="about" id="about" class="text_box12" style="height:100px; width:620px; background: #f5f6f9;	border: 1px solid #e0e0e3;"></textarea></td></tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="6"/></td></tr>
            <tr>
              <th>By submitting this information you declare that the information is true, accurate and up to date. You also understand that upon submission, GeeLaza will begin the process of verifying this information, which may included, but is not limited to, perform credits, reference checks and consumer credit checks.</th>
            </tr>
            <!--<tr>
              <td class="privacy_policy">By registering you agree to the  <a href="#" style="color:#3d35ac;">Terms and Conditions</a></span> and  <a href="#" style="color:#3d35ac;">Privacy Policy</a></td>
            </tr>-->
            <tr>
           	<td> <input type="submit" style="cursor:pointer;" class="blue_btng" value="Submit" name="btnRegister"></td>
            </tr>
            <tr><td><img src="images/spacer.gif" alt="" width="1" height="15"/></td></tr>
          </table>

 <div class="clear"></div>
</div>
</form>

<!-- Merchant Registration form validator starts -->

<script type="text/javascript">

function validateEmail(email) {

    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(email)) {
    document.getElementById('mer_register_email_errorloc').innerHTML = 'Invalid email address';
    //document.getElementById('cust_login_lpassword_errorloc').innerHTML = '&nbsp;';
    //document.getElementById('lemail').style.border = "1px solid red";
	//document.getElementById('lpassword').style.border = "1px solid red";
    return false;
    } else {
    	document.getElementById('mer_register_email_errorloc').innerHTML = '';
        }
}

function ValidateMerRegisterForm() {
//alert('hi'); return false;
	var company_name = document.getElementById('company_name').value;
	//var company_trading_name = document.getElementById('company_trading_name').value;
	var company_type = document.getElementById('company_type').value;
	var company_reg_no = document.getElementById('company_reg_no').value;
	var company_md_fname = document.getElementById('company_md_fname').value;
	var company_md_lname = document.getElementById('company_md_lname').value;

	var website = document.getElementById('website').value;
	var email = document.getElementById('email').value;
	//var fname = document.getElementById('fname').value;
	//var lname = document.getElementById('lname').value;

	var address1 = document.getElementById('address1').value;
	var city = document.getElementById('city').value;
	//var county = document.getElementById('county').value;
	var country = document.getElementById('country').value;
	var zip = document.getElementById('zip').value;
	var business_type = document.getElementById('business_type').value;

	var phone_no = document.getElementById('phone_no').value;
	var business_start_date = document.getElementById('business_start_date').value;

	var category = document.getElementById('category').value;
	var dealcity = document.getElementById('dealcity').value;



	if ( company_name == "" || company_type == "" || company_reg_no == "" || company_md_fname == "" || company_md_lname == "" || email == "" || address1 == "" || city == "000" || country == "000" || zip == "" || business_type == "" || phone_no == "" || business_start_date == "" || website == "" || category == "" || dealcity == "000") {
		//alert ("asdasda");
		document.getElementById('mer_register_company_name_errorloc').innerHTML = "Please enter business name";

		document.getElementById('mer_register_email_errorloc').innerHTML = "Please enter a valid email address";

		//document.getElementById('mer_register_fname_errorloc').innerHTML = "Please enter a valid first name & last name";

		//document.getElementById('mer_register_lname_errorloc').innerHTML = "Please enter a valid last name";

		document.getElementById('mer_register_address1_errorloc').innerHTML = "Please enter your full business address";

		document.getElementById('mer_register_city_errorloc').innerHTML = "Please enter your city";

		//document.getElementById('mer_register_county_errorloc').innerHTML = "Please enter your county";

		document.getElementById('mer_register_country_errorloc').innerHTML = "Please select a country";

		document.getElementById('mer_register_phone_no_errorloc').innerHTML = "Please enter a valid phone number minimum of 8 numbers.";

		document.getElementById('mer_register_website_errorloc').innerHTML = "Please enter a valid website";

		document.getElementById('mer_register_category_errorloc').innerHTML = "Please select a category";

		document.getElementById('mer_register_dealcity_errorloc').innerHTML = "Please select deal city";

		document.getElementById('mer_register_company_type_errorloc').innerHTML = "Please select company type";

		document.getElementById('mer_register_company_reg_no_errorloc').innerHTML = "Please enter company registration number";

		document.getElementById('mer_register_company_md_name_errorloc').innerHTML = "Please enter managing director full name";

		document.getElementById('mer_register_business_type_errorloc').innerHTML = "Please select business type";

		document.getElementById('mer_register_business_start_date_errorloc').innerHTML = "Please enter business start date";
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
<!-- Merchant Registration form validator ends -->

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
