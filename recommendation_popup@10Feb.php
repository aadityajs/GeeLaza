<div style="display: none;">
		<div id="inline1" style="width:701px;height:px;overflow:auto; background-color: transparent;">
			<?php //if (isset($_SESSION['user_id'])) { ?>
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

				$recom_deal_id = $_POST['recomdealid'];

				$sql_email_recom = "SELECT * FROM ".TABLE_DEALS." WHERE deal_id = ".$recom_deal_id." LIMIT 0, 1"; //AND deal_end_time LIKE '".date("Y-m-d")."%' LIMIT 0, 4";
				$email_res_recom = mysql_fetch_array(mysql_query($sql_email_recom));
				$sql_email_image_recom = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$email_res_recom['deal_id'];
				//'.UPLOAD_PATH.$email_image_1['file'].'

				//echo '<img src="UPLOAD_PATH.$email_image_1[file]">';

					$user_id = $_SESSION['user_id'];
					$sql_select = "SELECT * FROM ".TABLE_USERS." WHERE user_id= $user_id";
					$result_select = mysql_fetch_array(mysql_query($sql_select));
					$user_name = $result_select['first_name'].' '.$result_select['last_name'];
					$recom_email_save = $email_res_recom[full_price] - $email_res_recom[discounted_price];
					$recom_email_disc = intval($email_res_recom[discounted_price]*100/$email_res_recom[full_price]);

					$template_recom = '
						<table border="0" cellspacing="0" cellpadding="0" width="620" style="vertical-align:top; width:620px; margin:0 auto;">
						  <tr>
							<td height="10" style="height:10px; line-height:0px;"><img src="'.SITE_URL.'images/reg_newsletter/box1_top.png" width="620" height="10" alt="" /></td>
						  </tr>
						   <tr>
							<td valign="top" align="left" background="'.SITE_URL.'images/reg_newsletter/bg_p.gif">
							 <table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td valign="top" align="left">
									<table border="0" cellspacing="0" cellpadding="0" width="620" style="vertical-align:top; width:620px;">
								  <tr>
									<td width="10" valign="top" style="vertical-align:top; width:10px;"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" width="10" height="1" alt="" /></td>
									<td width="171" height="76" align="left" valign="top" style="vertical-align:top; text-align:left; width:171px; height:76px; line-height:0px;">
										<img src="'.SITE_URL.'images/reg_newsletter/logo.png" width="164" height="72" alt="" />
									</td>
									<td width="350" valign="top" style="vertical-align:top; width:350px; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-size:25px; font-weight:bold; padding:12px 10px 0 6px;">'.$user_name.' has invited you to join GeeLaza</td>
								  </tr>
							  </table>
								</td>
							  </tr>
							  <tr>
								 <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" width="1" height="15" alt="" /></td>
							 </tr>
							  <tr>
								 <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/reg_newsletter/box2_top.png" width="620" height="15" alt="" /></td>
							 </tr>
							  <tr>
								<td valign="top" background="'.SITE_URL.'images/reg_newsletter/box2_middle.png" style="padding:0 25px;">
									<table width="570" border="0" cellspacing="0" cellpadding="0" style="width:570px; margin: 0 auto;">
									  <tr>
										<td valign="top">
										 <table width="100%" border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td valign="top" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-size:15px; font-weight:normal; padding:0 0 0 6px;">'. $_POST['fmsg'] .'</td>
										  </tr>
										  <tr>
											<td valign="top" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-size:15px; font-weight:normal; padding:0 0 0 6px;"> You can learn more about GeeLaza in the <a href="'. SITE_URL .'faq.php" style="color:#009CE8;">FAQ section.</a></td>
										  </tr>
										  <tr>
											  <td height="8"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="1" height="8" /></td>
										  </tr>
										  <tr>
											<td background="'.SITE_URL.'images/reg_newsletter/box_bg.gif" height="198" valign="top">
											 <table width="100%" border="0" cellspacing="0" cellpadding="0">
											 <tr>
												<td colspan="5" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:17px; font-size:24px; font-weight:bold; padding:10px 0 20px 0; text-align:center;">What can GeeLaza do for you?</td>
											 </tr>
											  <tr>
												<td width="10" valign="top"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="10" height="1" /></td>
												<td width="265" valign="top">
												 <table width="100%" border="0" cellspacing="0" cellpadding="0">
												  <tr>
													<td valign="top" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:17px; font-size:14px; font-weight:normal; padding:10px 0 10px 0;"> <b style="font-size:18px;">Its great value </b> you can save up to 90%</td>
												  </tr>
												   <tr>
													<td valign="top" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:17px; font-size:14px; font-weight:normal; padding:10px 0 10px 0;"> <b style="font-size:18px;">Its up-to-date </b> theres new deal everyday</td>
												  </tr>
												 </table>
												 </td>
												<td width="20" valign="top"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="30" height="1" /></td>
												<td width="265" valign="top">
												 <table width="100%" border="0" cellspacing="0" cellpadding="0">
												  <tr>
													<td valign="top" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:17px; font-size:14px; font-weight:normal; padding:10px 0 10px 0;"> <b style="font-size:18px;">Its fun </b> invite friends to the deal and earn cash in return</td>
												  </tr>
												   <tr>
													<td valign="top" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:17px; font-size:14px; font-weight:normal; padding:10px 0 10px 0;"> <b style="font-size:18px;">Its nationwide </b> we operate in most cities of the UK and we are growing fast</td>
												  </tr>
												 </table>
												</td>
												<td width="10" valign="top"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="10" height="1" /></td>
											  </tr>
											</table>                    </td>
										  </tr>
										  <tr>
											<td valign="top" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-size:25px; font-weight:bold; padding:10px 0 10px 6px;"><span style="color:#5b8f32;">Todays deal :</span> '. $email_res_recom[title] .'</td>
										  </tr>
										  <tr>
											<td>
											 <table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td width="10" valign="top"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="10" height="1" /></td>
												<td width="230" valign="top">
												 <table width="100%" border="0" cellspacing="0" cellpadding="0">
												  <tr>
													<td><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="1" height="12" /></td>
												  </tr>
												  <tr>
													<td height="90" valign="top" background="'.SITE_URL.'images/reg_newsletter/price_bg.png">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
														  <tr>
															<td valign="top" align="center" style="padding:8px 0 10px 15px; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:24px; font-weight:bold; text-align:center;">&pound;'. $email_res_recom[discounted_price] .'</td>
														  </tr>
														  <tr>
															<td valign="top" align="center" style="padding:8px 0 10px 15px; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:24px; font-weight:bold; text-align:center;"><a href="'.SITE_URL.'?action=view&id='.$email_res_recom[deal_id].'" style="color:#fff;">View Now !</a></td>
														  </tr>
														</table>                                </td>
													  </tr>
													  <tr>
														<td height="5"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="1" height="5" /></td>
													  </tr>
													  <tr>
														<td valign="top" height="67" background="'.SITE_URL.'images/reg_newsletter/timer_bg.png">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
														  <tr>
															<td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
															<td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
															<td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
														  </tr>
														  <tr>
															<td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$email_res_recom[full_price].'</td>
															<td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.$recom_email_disc.'%</td>
															<td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$recom_email_save.'</td>
													  </tr>
													</table>
												   </td>
												  </tr>
												  <tr>
													  <td height="5"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="1" height="5" /></td>
												  </tr>
												  <tr>
													  <td bgcolor="#fff8d9" style="border:1px solid #d8d7d3; padding:8px 4px 8px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:13px; font-weight:bold; text-align:center;">This deal is available until <br />'.$email_res_recom[deal_end_time].'</td>
												  </tr>
												 </table>
												 </td>
												<td width="30" valign="top"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="30" height="1" /></td>
												<td width="290" valign="top"><img src="'.UPLOAD_PATH.$sql_email_image_recom[file].'" alt="" width="288" height="224" /></td>
												<td width="10" valign="top"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="10" height="1" /></td>
											  </tr>
											</table>                    </td>
										  </tr>
										 </table>
										</td>
									  </tr>
										<tr>
										 <td valign="top" height="12"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="5" height="12" /></td>
									   </tr>
									  <tr>
										 <td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td valign="top" width="410"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="410" height="1" /></td>
												<td>Follow Us on:</td>
												<td valign="top" width="6"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="6" height="1" /></td>
												<td valign="top"><img src="'.SITE_URL.'images/reg_newsletter/icon_01.png" alt="" /></td>
												<td valign="top" width="6"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="6" height="1" /></td>
												<td valign="top"><img src="'.SITE_URL.'images/reg_newsletter/icon_02.png" alt="" /></td>
											  </tr>
											</table>
										</td>
										</tr>
										 <tr>
											 <td valign="top" height="6"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="1" height="6" /></td>
										</tr>
										<tr>
										 <td valign="top" height="1" style="height:1px; line-height:0px; border-top:1px solid #7ed7fc;"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="1" height="1" /></td>
									   </tr>
										<tr>
											 <td valign="top" height="6" style="height:6px; line-height:0px;"><img src="'.SITE_URL.'images/reg_newsletter/spacer.gif" alt="" width="1" height="6" /></td>
										   </tr>
										<tr>
											<td valign="top" align="center">
											<a href="'.SITE_URL.'" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">&copy; GeeLaza.com</a>
											<a href="'.SITE_URL.'page.php?page=Terms and Conditions" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Terms & Conditions</a>
											<a href="'.SITE_URL.'customer-register.php" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Join Us</a>
											<a href="'.SITE_URL.'page.php?page=About GeeLaza UK" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">About GeeLaza</a>
											<a href="'.SITE_URL.'merchant_business.php" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Run Deal With Us</a>                   </td>
										 </tr>
									 </table>
								  </td>
								  </tr>
								 <tr>
								 <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/reg_newsletter/box2_bottom.png" width="620" height="15" alt="" /></td>
							 </tr>
							</table>
							</td>
						   </tr>
						   <tr>
							<td height="10" style="height:10px; line-height:0px;"><img src="'.SITE_URL.'images/reg_newsletter/box1_bottom.png"" width="620" height="10" alt="" /></td>
						  </tr>
						</table>


					';


					//$fmsg = $_POST['fmsg'];
					//$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= "From: GeeLaza Referral<info@geelaza.com>";
					$femail = $_POST['femail'];
					$sub = ucwords($user_name)." has invited you to join GeeLaza";


					@mail($femail, $sub, $template_recom, $headers);
					header('location: recom_thanks.php');
				}

			?>

		<form action="" name="" method="post" onsubmit="return validateRecom();">
		<input type="hidden" name="recomdealid" id="recomdealid" value="<?php echo $_SESSION['current_deal_id']; ?>">
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
				<li style="float: right; width: 162px; margin: 0 auto;">You'll be credited 5 on every successfull recommendation</li>
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

			<script type="text/javascript">
				function validateRecom() {
					//alert ('Hi');
					var msg = document.getElementById('fmsg').value;
					var email = document.getElementById('femail').value;
					if (msg == '') {
						document.getElementById('msgErr').innerHTML = "Enter message";
						return false;
					}
					if (email == '') {
						document.getElementById('emailErr').innerHTML = "Enter email address";
						return false;
					}

				}

			</script>