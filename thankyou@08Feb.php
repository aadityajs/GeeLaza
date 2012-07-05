<?php
error_reporting(E_ERROR && E_STRICT);
include("include/header.php");
require_once 'CallerService.php';
session_start();
ob_start();

?>
<!-- Payment page Registration code start -->

<?php
	$flag = 0;
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST['Submit'] == "Buy your deal" )
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

			echo $sql_insert = "INSERT INTO ".TABLE_USERS.
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


<!-- Payment page registration code end -->

<?php
if($_POST['payment_system'] == 'cc')
{

/**
 * PayPal Pro web form request Visa, Amex, MasterCard, Discover.
 */
	if (!empty($_POST['paymentType'])) {

		$paymentType =urlencode( $_POST['paymentType']);
		$firstName =urlencode( $_POST['firstName']);
		$lastName =urlencode( $_POST['lastName']);
		$creditCardType =urlencode( $_POST['creditCardType']);
		$creditCardNumber = urlencode($_POST['creditCardNumber']);
		$expDateMonth =urlencode( $_POST['expDateMonth']);

		// Month must be padded with leading zero
		$padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);

		$expDateYear =urlencode( $_POST['expDateYear']);
		$cvv2Number = urlencode($_POST['cvv2Number']);
		$address1 = urlencode($_POST['address1']);
		$address2 = urlencode($_POST['address2']);
		$city = urlencode($_POST['city']);
		$state =urlencode( $_POST['state']);
		$zip = urlencode($_POST['zip']);
		$amount = urlencode($_POST['payment_amount']);
		//$currencyCode=urlencode($_POST['currency']);
		$currencyCode="GBP";
		$paymentType=urlencode($_POST['paymentType']);

		/* Construct the request string that will be sent to PayPal.
		   The variable $nvpstr contains all the variables and is a
		   name value pair string with & as a delimiter */
		$nvpstr="&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=".         $padDateMonth.$expDateYear."&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state".
		"&ZIP=$zip&COUNTRYCODE=US&CURRENCYCODE=$currencyCode";

		/* Make the API call to PayPal, using API signature.
		   The API response is stored in an associative array called $resArray */
		$resArray=hash_call("doDirectPayment",$nvpstr);

		/* Display the API response back to the browser.
		   If the response from PayPal was a success, display the response parameters'
		   If the response was an error, display the errors received using APIError.php.
		   */
		$ack = strtoupper($resArray["ACK"]);

		if($ack!="SUCCESS")  {
			$_SESSION['reshash']=$resArray;
			$location = "APIError.php";
				 header("Location: $location");
		   }


		   if ($ack == "SUCCESS") {

				$user_id = $_SESSION['user_id'];
				$deal_id = $custom_expl[1];
				$trn_date = $resArray['TIMESTAMP'];
				$coupon_code = strtoupper(str_rand($length = 13, $seeds = 'alphanum'));

				$txn_id = $resArray['TRANSACTIONID'];
				$payment_status = 'success';
				$qty = $_POST['item_number'];
				$payment_gross = $resArray['AMT'];
				$withdraw_status = 'received';

				$sql_trnsaction = "INSERT INTO ".TABLE_TRANSACTION." (tran_id,deal_id,transaction_status,amount,qty,transaction_date,user_id,withdraw_status,transaction_id,coupon_code)
										VALUES(null,'$deal_id','$payment_status','$payment_gross','$qty','$trn_date','$user_id','$withdraw_status','$txn_id','$coupon_code')";
				mysql_query($sql_trnsaction);


			}

			/* $giftEmailTemplate = '

			<h2>Hey '.$_SESSION['gift_name'].'</h2>

			<p><img height="100" width="100" alt="" src="'.SITE_URL.'images/Giftbox.png" align="left">You have received a gift</p>
			<p>'.$_SESSION['gift_msg'].'</p>
			<p>Your gift coupon code is - '.$coupon_code.'</p>
			'; */

			//echo $giftEmailTemplate;

			if (isset($giftEmailTemplate) && !empty($_SESSION['gift_mail'])) {
								$sql="SELECT * FROM ".TABLE_USERS." where user_id=$_SESSION[user_id]";
								$user=$db->query_first($sql);

								$email = $_SESSION['gift_mail'];
								$subject = "You have got a Gift from ". $user[first_name]." - GeeLaza.com";

								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers .= "From: GeeLaza.com<admin@geelaza.com>". "\r\n" ;

								@mail($email,$subject,$giftEmailTemplate,$headers);
								echo "<p>Your gift has been sent successfully</p>";
						}

			unset($_SESSION['gift_mail']);
			unset($_SESSION['gift_msg']);
			unset($_SESSION['gift_name']);



	}
}
elseif($_POST['payment_system'] == 'maestro')
{

/**
 * PayPal Pro web form request Maestro.
 */

	if (!empty($_POST['paymentType'])) {

		$paymentType =urlencode( $_POST['paymentType']);
		$firstName =urlencode( $_POST['firstName']);
		$lastName =urlencode( $_POST['lastName']);
		$creditCardType =urlencode( $_POST['creditCardType']);
		$creditCardNumber = urlencode($_POST['creditCardNumber']);
		$expDateMonth =urlencode( $_POST['expDateMonth']);

		// Month must be padded with leading zero
		$padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);


		$expDateYear =urlencode( $_POST['expDateYear']);

		$startDateMonth =urlencode( $_POST['startDateMonth']);
		$padstartDateMonth = str_pad($startDateMonth, 2, '0', STR_PAD_LEFT);
		$startDateYear =urlencode( $_POST['startDateYear']);
		$issueNumber =urlencode( $_POST['issueNumber']);

		$cvv2Number = urlencode($_POST['cvv2Number']);
		$address1 = urlencode($_POST['address1']);
		$address2 = urlencode($_POST['address2']);
		$city = urlencode($_POST['city']);
		$state =urlencode( $_POST['state']);
		$zip = urlencode($_POST['zip']);
		$amount = urlencode($_POST['payment_amount']);
		//$currencyCode=urlencode($_POST['currency']);
		$currencyCode="GBP";
		$paymentType=urlencode($_POST['paymentType']);

		/* Construct the request string that will be sent to PayPal.
		   The variable $nvpstr contains all the variables and is a
		   name value pair string with & as a delimiter */
		$nvpstr="&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=".$padDateMonth.$expDateYear."&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state".
		"&ZIP=$zip&COUNTRYCODE=US&CURRENCYCODE=$currencyCode";

		//.&STARTDATE=".$padstartDateMonth.$startDateYear."&ISSUENUMBER=$issueNumber

		/* Make the API call to PayPal, using API signature.
		   The API response is stored in an associative array called $resArray */
		$resArray=hash_call("doDirectPayment",$nvpstr);

		/* Display the API response back to the browser.
		   If the response from PayPal was a success, display the response parameters'
		   If the response was an error, display the errors received using APIError.php.
		   */
		$ack = strtoupper($resArray["ACK"]);

		if($ack!="SUCCESS")  {
			$_SESSION['reshash']=$resArray;
			$location = "APIError.php";
				 header("Location: $location");
		   }


		   if ($ack == "SUCCESS") {

				$user_id = $_SESSION['user_id'];
				$deal_id = $custom_expl[1];
				$trn_date = $resArray['TIMESTAMP'];
				$coupon_code = strtoupper(str_rand($length = 13, $seeds = 'alphanum'));

				$txn_id = $resArray['TRANSACTIONID'];
				$payment_status = 'success';
				$qty = $_POST['item_number'];
				$payment_gross = $resArray['AMT'];
				$withdraw_status = 'received';

				$sql_trnsaction = "INSERT INTO ".TABLE_TRANSACTION." (tran_id,deal_id,transaction_status,amount,qty,transaction_date,user_id,withdraw_status,transaction_id,coupon_code)
										VALUES(null,'$deal_id','$payment_status','$payment_gross','$qty','$trn_date','$user_id','$withdraw_status','$txn_id','$coupon_code')";
				mysql_query($sql_trnsaction);


			}
	}
	//var_dump($resArray);
}
elseif($_POST['payment_system'] == 'paypal')
{

/**
 * PayPal IPN web form request
 */

	$qty = $_POST['item_number'];
	$amount_ipn = $_POST['amount'];
	$custom_val = $_POST['custom'];
	$item_name = $_POST['item_name'];

	echo $message="<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" name=\"frmIPN\">
	<input type=\"hidden\" name=\"notify_url\" value=\"http://unifiedinfotech.net/getdeals/paypal_ipn.php\">
	<input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
	<input type=\"hidden\" name=\"business\" value=\"santan_1313669535_biz@unifiedwebdevelopment.com\">
	<input type=\"hidden\" name=\"item_name\" value=\"$item_name\">
	<input type=\"hidden\" id=\"frm_paypal_total_qty\" name=\"item_number\" value=\"$qty\">
	<input type=\"hidden\" id=\"frm_paypal_total_price\" name=\"amount\" value=\"$amount_ipn\">
	<input type=\"hidden\" name=\"page_style\" value=\"Primary\">
	<input type=\"hidden\" name=\"no_shipping\" value=\"1\">
	<input type=\"hidden\" name=\"return\" value=\"http://unifiedinfotech.net/getdeals/thankyou.php\">
	<input type=\"hidden\" name=\"cancel_return\" value=\"http://unifiedinfotech.net/getdeals/cancel.php\">
	<input type=\"hidden\" name=\"no_note\" value=\"1\">
	<input type=\"hidden\" name=\"currency_code\" value=\"GBP\">
	<input type=\"hidden\" name=\"custom\" value=\"$custom_val\"> <p>

	<script type=\"text/javascript\">document.frmIPN.submit();</script>

	</form>";

	//<input type=\"submit\" name=\submit\" value=\"Pay\">
	//<input type=\"submit\" name=\submit\" value=\"Buy your ddeal\" class=\"buyu_btn\" style=\"cursor:pointer; font-size:20px;\">



if (!empty($_POST['custom'])) {

		$custom = $_POST['custom'];

		$custom_expl = explode(',', $custom);
		$user_id = $custom_expl[0];
		$deal_id = $custom_expl[1];
		$trn_date = $custom_expl[2];
		$coupon_code = strtoupper(str_rand($length = 13, $seeds = 'alphanum'));

		$txn_id = $_POST['txn_id'];
		//$payment_status = $_POST['payment_status'];
		$payment_status = 'success';
		//$payer_email = $_POST['payer_email'];
		$qty = $_POST['item_number'];
		$payment_gross = $_POST['payment_gross'];
		$withdraw_status = 'received';

		$sql_trnsaction = "INSERT INTO ".TABLE_TRANSACTION." (tran_id,deal_id,transaction_status,amount,qty,transaction_date,user_id,withdraw_status,transaction_id,coupon_code)
								VALUES(null,'$deal_id','$payment_status','$payment_gross','$qty','$trn_date','$user_id','$withdraw_status','$txn_id','$coupon_code')";
		mysql_query($sql_trnsaction);


	}

	$giftEmailTemplate = '

			<h2>Hey '.$_SESSION['gift_name'].'</h2>

			<p><img height="100" width="100" alt="" src="'.SITE_URL.'images/Giftbox.png" align="left">You have received a gift</p>
			<p>'.$_SESSION['gift_msg'].'</p>
			<p>Your gift coupon code is - '.$coupon_code.'</p>
			';

			//echo $giftEmailTemplate;

			if (isset($giftEmailTemplate) && !empty($_SESSION['gift_mail'])) {
								$sql="SELECT * FROM ".TABLE_USERS." where user_id=$_SESSION[user_id]";
								$user=$db->query_first($sql);

								$email = $_SESSION['gift_mail'];
								$subject = "You have got a Gift from ". $user[first_name]." - GeeLaza.com";

								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers .= "From: GeeLaza.com<admin@geelaza.com>". "\r\n" ;

								@mail($email,$subject,$giftEmailTemplate,$headers);
								echo "<p>Your gift has been sent successfully</p>";
						}

			unset($_SESSION['gift_mail']);
			unset($_SESSION['gift_msg']);
			unset($_SESSION['gift_name']);

}


?>

<div class="deal_info">
<div class="top_about">

<p>Thankyou</p>


</div>
<div class="clear"></div>
<div class="midbg">
<div class="today_deal">

<h1>Thank you for buying!</h1>
<!-- 
<script type="text/javascript">
setTimeout(function () {
	   window.location.href= '<?php echo SITE_URL; ?>'; // the redirect goes here

	},30000);

</script>
 -->
<pre>
<?php
//var_dump($_POST);		// PayPal IPN return values

//var_dump($resArray); 	// PayPal Pro return values

?>

</pre>






<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="40" /></div>
<div style="width: 702px; float: none; margin: 0 auto; background:#1f1f1f;"><img src="images/logo_bot.gif" alt="" width="207" height="108" /></div>
</div>
</div>
<div class="bot_about"></div>
</div>


</div>
</div>
</div>
</div>
<?php include ('include/footer.php'); ?>
