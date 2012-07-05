<?php
include("include/header.php");
include_once "fbmain.php";
?>
<!--<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>-->
<?php 
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

?>

<?php //RegistrationEmail("unified.aditya@gmail.com"); ?>

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
	  if (!empty($userInfo)) {
      		
	 		//$userInfo['name'];
      		$userInfo['first_name'];
      		$userInfo['last_name'];
      		$userInfo['email'];
      		//echo $userInfo['birthday'];
	  
				
				$sql_chk_fb_user = "SELECT * FROM ".TABLE_USERS." WHERE email = '".$userInfo['email']."'";
				$chk_fb_user_res = mysql_fetch_array(mysql_query($sql_chk_fb_user));
				$count_fb_user = mysql_num_rows(mysql_query($sql_chk_fb_user));
	
				if($count_fb_user > 0)		//  Register & login via fb
				{
					$_SESSION["user_id"] = $chk_fb_user_res['email'];
					header('location: '.SITE_URL.'customer-account.php');
					//echo "fine";
				}
			}
	  
	  
	 /*  	$cookie = get_facebook_cookie('192309027517422', '7f1eb32e301277d025d35b77b06dd863');
	   	if ($cookie) {
		$user = json_decode(file_get_contents('https://graph.facebook.com/me?access_token=' .$cookie['access_token']));
	   //var_dump($user);
	   //echo '<pre>'.print_r($user,true).'</pre>';
	   
	 				echo $user->name;
      				echo $user->first_name;
      				echo $user->last_name;
      				echo $user->gender;
      				echo $user->timezone;
      				echo $user->location->name;	
	  				echo $user->email;
	  				echo $user->hometown->name;
	   
	   			$city = reset(explode(",", $user->location->name));
	   			$country = end(explode(",", $user->location->name));
	   			$add1 = reset(explode(",", $user->hometown->name));
				$date = date('Y-m-d');*/
				
	  	 	
			/*$sql_chk_fb_user = "SELECT * FROM ".TABLE_USERS." WHERE email = '".$user->email."'";
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
	   		
		
			
	   			
		
	   	}*/		
?>
<div id="container">
<div id="leftcol">
<div class="deal_info">
<div class="green_curv10"></div>
<div class="clear"></div>
<div class="green_curv30">
<div class="today_deal">
<div class="register_box1">
<!-- 
<div class="blue_text">New User</div>
<div class="clear"></div>
<div class="black_text">Geelaza allows your business whether its a small, medium or big business to reach new customers and take your business to the next level. we have a great relation with our handpicked merchants and customers as we are doing something that keeps everyone happy. It's that simple.</div>
<div class="clear"></div>
<div class="customer_box">
<div class="customer_left">
<img src="images/1pic.gif" alt="" width="77" class="wrap" height="84"/><p>Growing your business now</p></div>
<div class="customer_left">
<img src="images/2pix.gif" alt="" width="85" class="wrap" height="84"/>
<p>Getting more customers</p></div>
<div class="customer_right">
<img src="images/3pic.gif" alt="" width="120" class="wrap" height="89"/>
<p>Getting more revenues</p></div>
</div>

 -->

<div class="clear"></div>
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
			
				
				/*$Template = '
					
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
  <h6 style="margin: -22px 0 6px 0; background:none; z-index: 1000;" >Register Now</h6>
  <div style="border:1px #CCCCCC solid; background:#fff;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg2">
       <tr>
         <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg">
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
          <td><span style="color: #c3c3c3; font-size: 11px; font-weight: normal; text-transform:none;">Don't worry. Your email address is safe with us!</span><div id='cust_register_email_errorloc' class="error_orange"></td>
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
                                <select style="width:312px;  color: #666666;" id="city">
                                    <option>Select your deal city</option>
                                    
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
                    <td style="padding-left:5px;"><a href="javascript: showDetails(10)" onclick="return overlib('&lt;font class=bodytext&gt;<div class=tiptool><div class=tip_top><p>Why should I provide my date of birth?</p></div><div class=clear></div><div class=tip_mid><ul><li>You must provide your real date of birth to certfy that you are at least 18 years old.</li></ul></div><div class=tip_bot></div></div>&lt;/font&gt;',BORDER,'1');" onMouseOut="nd();"><img src="images/question.png" width="12" height="12" vspace="4" align="default" ></a></td>
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
                        <select name="day" id="Date" class="selectbg" title="" style="width:92px; color: #666666;">
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
            	<table width="100%" border="0" cellpadding="0" cellspacing="0"> 
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
                 </table>
            </td>
        </tr>
        
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">           
            <tr>
                <td align="center" style="text-align: left; padding-right: 62px;">
                    <img src="images/spacer.gif" alt="" width="1" height="13"/><br>
                    <input type="submit" name="btnRegister" value="Sign up" class="log_in"  style="cursor:pointer;"/>        	</td>
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
	
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
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


   

    
<!-- Login form validator starts --> 



  <!-- Login form validator ends --> 


<div style="background:#fff;">
<!--<span class="black_text" style="color:#3A3B3D;">Do you have an account on Facebook? Use it to sign into GeeLaza</span>
<?php if ($cookie) { ?>
<fb:login-button perms="email" autologoutlink="true" onlogin="window.location.reload()"></fb:login-button>
<?php unset($_SESSION['fbuser']); ?> 
<?php } else { ?>
<fb:login-button perms="email" autologoutlink="true">Connect</fb:login-button> 
<?php } ?>
--></div>


</div>
</div>
</div>
<div class="green_curv20"></div>
</div>
</div>

<?php include ('include/sidebar-login.php'); ?>
</div>

<?php include("include/footer.php");?>