<?php
include("include/header.php");


$txt = '
						<table border="0" cellspacing="0" cellpadding="0" width="620" style="vertical-align:top; width:620px; margin:0 auto;">
						  <tr>
						    <td height="10" valign="bottom" style="height:10px; line-height:0px;"><img src="'.SITE_URL.'images/daily_email_images/box1_top.png" width="620" height="10" alt="" /></td>
						  </tr>
						   <tr>
						    <td valign="top" align="left" background="'.SITE_URL.'images/daily_email_images/bg_p.gif">
						     <table width="100%" border="0" cellspacing="0" cellpadding="0">
						      <tr>
						        <td valign="top" align="left">
						        	<table border="0" cellspacing="0" cellpadding="0" width="620" style="vertical-align:top; width:620px;">
						          <tr>
						            <td width="10" valign="top" style="vertical-align:top; width:10px;"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" width="10" height="1" alt="" /></td>
						            <td width="171" height="76" align="left" valign="top" style="vertical-align:top; text-align:left; width:171px; height:76px; line-height:0px;">
						            	<img src="'.SITE_URL.'images/daily_email_images/logo.png" width="164" height="72" alt="" />
						            </td>
									<td width="350" valign="top" style="vertical-align:top; width:350px;"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" width="350" height="1" alt="" /></td>
						          </tr>
						      </table>
						        </td>
						      </tr>
						      <tr>
						         <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" width="1" height="15" alt="" /></td>
						     </tr>
						      <tr>
						         <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/daily_email_images/box2_top.png" width="620" height="15" alt="" /></td>
						     </tr>
						      <tr>
						        <td valign="top" background="'.SITE_URL.'images/daily_email_images/box2_middle.png" style="padding:0 25px;">
						        	<table width="570" border="0" cellspacing="0" cellpadding="0" style="width:570px; margin: 0 auto;">
						              <tr>
						                <td valign="top">
						                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ebecec;">
						                  <tr>
						                    <td valign="top" bgcolor="#ddedcc" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-size:15px; font-weight:bold; padding:0 0 0 6px;">Your Daily Deal</td>
						                  </tr>
						                  <tr>
						                    <td valign="top" style="padding:6px 0 10px 0; color:#009ce8; font-family:Arial, Helvetica, sans-serif; line-height:20px; font-size:18px; font-weight:bold;">
						                     '.$data['title'].'
						                    </td>
						                  </tr>
						                  <tr>
						                    <td>
						                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                      <tr>
						                        <td width="10" valign="top"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                        <td width="230" valign="top">
						                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                          <tr>
						                            <td><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="12" /></td>
						                          </tr>
						                          <tr>
						                            <td height="90" valign="top" background="'.SITE_URL.'images/daily_email_images/price_bg.png">
						                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:8px 0 10px 15px; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:24px; font-weight:bold; text-align:center;">
						                                    	&pound;'.$data['discounted_price'].'
						                                    </td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:8px 0 10px 15px; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:24px; font-weight:bold; text-align:center;">
						                                    ';

															if($_REQUEST['mode']=="edit")
																{
						                                    		$txt.= '<a href="'.SITE_URL.'index.php?action=view&id='.intval($_REQUEST['id']).'" style="color:#fff;">View Now !</a>';
																} else {
																	$txt.= '<a href="'.SITE_URL.'index.php?action=view&id='.$primary_id.'" style="color:#fff;">View Now !</a>';
																}
																//$mdata['deal_id']=$primary_id;

						                                    $txt.= '
						                                    </td>
						                                  </tr>
						                                </table>                                </td>
						                              </tr>
						                              <tr>
						                                <td height="12"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="12" /></td>
						                              </tr>
						                              <tr>
						                                <td valign="top" height="67" background="'.SITE_URL.'images/daily_email_images/timer_bg.png">
						                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
						                                    <td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
						                                    <td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$data['full_price'].'</td>
						                                    <td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.$data['discount'].'</td>
						                                    <td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$data['savings'].'</td>
						                              </tr>
						                            </table>                            </td>
						                          </tr>
						                         </table>                        </td>
						                        <td width="30" valign="top"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="30" height="1" /></td>
						                        <td width="290" valign="top"><img src="'.UPLOAD_PATH.$img[file].'" alt="" width="288" height="189" /></td>
						                        <td width="10" valign="top"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                      </tr>
						                    </table>                    </td>
						                  </tr>
						                  <tr>
						                    <td height="16"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="16" /></td>
						                  </tr>
						                 </table>              </td>
						              </tr>
						              <tr>
						                <td height="16"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="16" /></td>
						              </tr>
						               <tr>
						                    <td valign="top" bgcolor="#ddedcc" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-size:15px; font-weight:bold; padding:0 0 0 6px;">More Deals</td>
						                  </tr>
						                   <tr>
						                     <td>
						                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ebecec;">
						                      <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                       <tr>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                         <td valign="top" width="190"><img src="'.UPLOAD_PATH.$email_image_2['file'].'" width="192" height="126" alt="" /></td>
						                         <td valign="top" width="10"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                         <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                           <tr>
						                             <td valign="top" style="padding:0 0 5px 0; color:#009ce8; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:15px; font-weight:bold;">
						                             '.$email_res2['title'].'</td>
						                           </tr>
						                           <tr>
						                             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                               <tr>
						                                 <td width="230" valign="top">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td height="20"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="20" /></td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" height="67" background="'.SITE_URL.'images/daily_email_images/timer_bg.png">
						                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
						                                    <td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
						                                    <td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$email_res2['full_price'].'</td>
						                                    <td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.intval($email_res2['discounted_price']*100/$email_res2['full_price']).'%</td>
						                                    <td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.intval($email_res2['full_price']-$email_res2['discounted_price']).'</td>
						                              </tr>
						                            </table>                                        </td>
						                                      </tr>
						                                    </table>                                   </td>
						                                  <td valign="top" width="8"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="8" height="1" /></td>
						                                  <td width="120" height="90" valign="top" background="'.SITE_URL.'images/daily_email_images/price_bg2.png">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;">&pound;'.$email_res2['discounted_price'].'</td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res2['deal_id'].'" style="color:#fff; text-decoration:none;">View Now !</a></td>
						                                      </tr>
						                                    </table>                                  </td>
						                               </tr>
						                             </table></td>
						                           </tr>
						                         </table></td>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                       </tr>
						                        <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                     </table></td>
						                   </tr>
						                   <tr>
						                     <td>
						                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ebecec;">
						                      <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                       <tr>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                         <td valign="top" width="190"><img src="'.UPLOAD_PATH.$email_image_3['file'].'" width="192" height="126" alt="" /></td>
						                         <td valign="top" width="10"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                         <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                           <tr>
						                             <td valign="top" style="padding:0 0 5px 0; color:#009ce8; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:15px; font-weight:bold;">
						                             '.$email_res3['title'].' </td>
						                           </tr>
						                           <tr>
						                             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                               <tr>
						                                 <td width="230" valign="top">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td height="20"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="20" /></td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" height="67" background="'.SITE_URL.'images/daily_email_images/timer_bg.png">
						                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
						                                    <td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
						                                    <td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$email_res3['full_price'].'</td>
						                                    <td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.intval($email_res3['discounted_price']*100/$email_res3['full_price']).'%</td>
						                                    <td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.intval($email_res3['full_price']-$email_res3['discounted_price']).'</td>
						                              </tr>
						                            </table>                                        </td>
						                                      </tr>
						                                    </table>                                   </td>
						                                  <td valign="top" width="8"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="8" height="1" /></td>
						                                  <td width="120" height="90" valign="top" background="'.SITE_URL.'images/daily_email_images/price_bg2.png">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;">&pound;'.$email_res3['discounted_price'].'</td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res3['deal_id'].'" style="color:#fff; text-decoration:none;">View Now !</a></td>
						                                      </tr>
						                                    </table>                                  </td>
						                               </tr>
						                             </table></td>
						                           </tr>
						                         </table></td>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                       </tr>
						                        <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                     </table></td>
						                   </tr>
						                   <tr>
						                     <td>
						                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ebecec;">
						                      <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                       <tr>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                         <td valign="top" width="190"><img src="'.UPLOAD_PATH.$email_image_4['file'].'" width="192" height="126" alt="" /></td>
						                         <td valign="top" width="10"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                         <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                           <tr>
						                             <td valign="top" style="padding:0 0 5px 0; color:#009ce8; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:15px; font-weight:bold;">
						                             '.$email_res4['title'].'</td>
						                           </tr>
						                           <tr>
						                             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                               <tr>
						                                 <td width="230" valign="top">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td height="20"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="20" /></td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" height="67" background="'.SITE_URL.'images/daily_email_images/timer_bg.png">
						                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
						                                    <td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
						                                    <td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$email_res4['full_price'].'</td>
						                                    <td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.intval($email_res4['discounted_price']*100/$email_res4['full_price']).'%</td>
						                                    <td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.intval($email_res4['full_price']-$email_res4['discounted_price']).'</td>
						                              </tr>
						                            </table>                                        </td>
						                                      </tr>
						                                    </table>                                   </td>
						                                  <td valign="top" width="8"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="8" height="1" /></td>
						                                  <td width="120" height="90" valign="top" background="'.SITE_URL.'images/daily_email_images/price_bg2.png">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;">&pound;'.$email_res4['discounted_price'].'</td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res4['deal_id'].'" style="color:#fff; text-decoration:none;">View Now !</a></td>
						                                      </tr>
						                                    </table>                                  </td>
						                               </tr>
						                             </table></td>
						                           </tr>
						                         </table></td>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                       </tr>
						                        <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                     </table>
						                    </td>
						                   </tr>
						                    <tr>
						                     <td valign="top" height="12"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                   </tr>
						                  <tr>
						                 <td>
						                 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
						                      <tr>
						                        <td valign="top" width="410"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="410" height="1" /></td>
						                        <td>Follow Us on:</td>
						                        <td valign="top" width="6"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="6" height="1" /></td>
						                        <td valign="top"><img src="'.SITE_URL.'images/daily_email_images/icon_01.png" alt="" /></td>
						                        <td valign="top" width="6"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="6" height="1" /></td>
						                        <td valign="top"><img src="'.SITE_URL.'images/daily_email_images/icon_02.png" alt="" /></td>
						                      </tr>
						                    </table>
						                </td>
						                </tr>
						                 <tr>
						                     <td valign="top" height="6"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="6" /></td>
						                </tr>
						                <tr>
<td valign="top" height="1" style="height:1px; line-height:0; border-top: solid 1px #7ed7fc"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="1" /></td>						               </tr>
						                <tr>
						                     <td valign="top" height="6"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="6" /></td>
						                   </tr>
						                <tr>
						                    <td valign="top" align="center">
						                    <a href="'.SITE_URL.'" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">&copy;GeeLaza.com</a>
						                    <a href="'.SITE_URL.'page.php?page=Terms and Conditions" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Terms & Conditions</a>
						                    <a href="'.SITE_URL.'customer-register.php" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Join Us</a>
						                    <a href="'.SITE_URL.'page.php?page=About GeeLaza UK" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">About GeeLaza</a>
						                    <a href="'.SITE_URL.'merchant_login" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Real Deal with us</a>                   </td>
						                 </tr>
						             </table>
						          </td>
						          </tr>
						         <tr>
						         <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/daily_email_images/box2_bottom.png" width="620" height="15" alt="" /></td>
						     </tr>
						    </table>
						    </td>
						   </tr>
						   <tr>
						     <td valign="top" height="6" background="'.SITE_URL.'images/daily_email_images/bg_p.gif"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="6" /></td>
						  </tr>
						   <tr>
						    <td valign="top" align="center" background="'.SITE_URL.'images/daily_email_images/bg_p.gif">
						       <table width="600" bgcolor="#d1d1d1" border="0" cellspacing="0" cellpadding="0" style="width:600px; margin:0 auto;">
						          <tr>
						            <td style="padding:8px 4px; color:#5b5960; font-family:Arial, Helvetica, sans-serif; line-height:14px; font-size:11px; text-decoration:none;">except to obtain some advantage from it? But who has any right <a href="'.SITE_URL.'" style="color:#5eb1de;">GeeLaza</a> find fault with a man who chooses to enjoy a pleasure that has no annoyingfn consequences,          </td>
						         </tr>
						        </table>
						  </tr>
						   <tr>
						    <td height="10" style="height:10px; background-repeat: no-repeat;" background="'.SITE_URL.'images/daily_email_images/box1_bottom.png"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" width="620" height="10" alt="" /></td>
						  </tr>
						</table>


				';
				//echo $txt;



$admin_id=intval($_SESSION['admin_id']);
$sql = "SELECT admin_name FROM `".TABLE_ADMIN."` WHERE admin_id='$admin_id'";
$record = $db->query_first($sql);



if($_REQUEST[mode]=="edit")
{
	$deal_id=intval($_REQUEST['id']);
	$row_deals=mysql_fetch_array(mysql_query("select * from ".TABLE_DEALS." where deal_id='$deal_id'"));

	$row_img=mysql_query("select * from ".TABLE_DEAL_IMAGES." where deal_id='$deal_id'");

}

if($_REQUEST[mode]=="delete")
{
	$deal_id=intval($_REQUEST['id']);
	mysql_query("delete from ".TABLE_DEALS." where deal_id='$deal_id'");

	$fileq=mysql_query("SELECT * FROM ".TABLE_DEAL_IMAGES." where deal_id='".$deal_id."'");
		while($frow=mysql_fetch_array($fileq)){
		@unlink("files/".$frow['file']);
		@unlink("thumbnails/".$frow['file']);
		}
		mysql_query("delete from ".TABLE_DEAL_IMAGES." where deal_id='$deal_id'");
	$_SESSION['msg']="Deal is deleted successfully.";
		header("location:show_deals.php");
		exit;
}




if(isset($_REQUEST['submit']))
{


	//$data['deal_cat']=$_POST['deal_cat'];
	$data['store_id']=$_POST['store_id'];
	$data['location_id']=$_POST['deal_city'];
	$data['city']=$_POST['city'];
	$data['title']=$_POST['title'];
	$data['description']=$_POST['description'];

	$data['offer_details']=$_POST['offer_details'];
	$data['offer_details_sidebar']=$_POST['offer_details_sidebar'];
	$data['highlights']=$_POST['highlights'];
	$data['fineprint']=$_POST['fineprint'];
	$data['postage']=$_POST['postage'];

	$data['full_price']=$_POST['full_price'];
	$data['discounted_price']= $_POST['discounted_price'];
	$data['discount']=$_POST['discount'];
	$data['savings']=$_POST['savings'];


	//$data['deal_start_time']=$_POST['deal_start_time'];
	//$data['deal_end_time']=$_POST['deal_end_time'];

	//2012-02-01 12:59
	$data['deal_start_time']=date("Y-m-d g:i", strtotime($_POST['deal_start_time']));
	$data['deal_end_time']=date("Y-m-d g:i", strtotime($_POST['deal_end_time']));

	$data['status']=$_POST['status'];
	$data['mid']=$_POST['mid'];
	$data['admin_id']=intval($_SESSION['admin_id']);
	$data['coupon_expiry']=$_POST['coupon_expiry'];
	$data['min_coupons']=$_POST['min_coupons'];
	$data['max_coupons']=$_POST['max_coupons'];

	$data['max_buy']=$_POST['max_buy'];


	$data['date_added']=date("Y-m-d");


	$data['website']=$_POST['website'];


	$data['item_type']=$_POST['item_type'];
	$data['in_sidebar']=$_POST['deal_type'];

	if ($data['city'] == -1 ) {
		$data['best_deal']='y';
	}else{
		$data['best_deal']='n';
	}

	//$data['best_deal']=$_POST['best_deal'];
	$data['deal_type']='dailydeal';
	$data['item_control_type']=$_POST['item_control_type'];
	$data['referral_no']=$_POST['referral_no'];
	$data['referral_value']=$_POST['referral_value'];

	/********************** Code for Getting Latitude and Longitude Starts *********************/

	$address1=str_replace(" ","+",$_POST['address1']);
	$address2=str_replace(" ","+",$_POST['address2']);
	$city=str_replace(" ","+",$_POST['city']);
	$state=str_replace(" ","+",$_POST['state']);

	$concat_address=$address1."+".$address2."+".$city;

	$xml = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$concat_address."&sensor=false";

	// create a new object
	$parser = new SimpleLargeXMLParser();
	// load the XML
	$parser->loadXML($xml);
	$pr= $parser->parseXML("//result/geometry/location");
	//print_r($pr);
	$location = $pr[0];
	//print_r($location);
	$loc = $location[lat][0];
	$lng = $location[lng][0];

	$data['place_lat']=$loc;
	$data['place_lng']=$lng;



/********************** Code for Getting Latitude and Longitude Ends *********************/


		/* --------------------mail to similar users -----------------*/
		$usersql=mysql_query("SELECT * FROM ".TABLE_USERS." where password<>''");

		while($userrow=mysql_fetch_array($usersql)){
			$city=$db->fetch_all_array("SELECT city_name as city FROM ".TABLE_CITIES." JOIN ".TABLE_USER_SUBSCRIPTION." on(".TABLE_CITIES.".city_id=".TABLE_USER_SUBSCRIPTION.".city_id) and ".TABLE_USER_SUBSCRIPTION.".user_id='".$userrow['user_id']."'");
			$category=$db->fetch_all_array("SELECT cat_id as category FROM ".TABLE_CATEGORIES." JOIN ".TABLE_USER_PREFERENCE." on(".TABLE_CATEGORIES.".cat_id=".TABLE_USER_PREFERENCE.".category_id) and ".TABLE_USER_PREFERENCE.".user_id='".$userrow['user_id']."'");


				foreach($city as $usercity){
					if($usercity['city_name']==$_POST['city']){
					$usermail[]=$userrow['email'];
					}
				}

				/*foreach($category as $usercat){
					if($usercat['category']==$_POST['deal_cat']){
					$usermail[]=$userrow['email'];
					}
				}*/

			}
			$deal_id = $_REQUEST['id'];
			$img = mysql_fetch_array(mysql_query("select * from ".TABLE_DEAL_IMAGES." where deal_id='$deal_id'"));
				$to  = implode(",",array_unique($usermail));


				$subject = $_POST['brand']."GeeLaza.com ";
				//$txt = "New offer is created in your city ".$_POST['city']."<br />";
				//$txt .= " Offer :<b>".$_POST['title']."</b><br/>";


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


				$txt = '
						<table border="0" cellspacing="0" cellpadding="0" width="620" style="vertical-align:top; width:620px; margin:0 auto;">
						  <tr>
						    <td height="10" valign="bottom" style="height:10px; line-height:0px;"><img src="'.SITE_URL.'images/daily_email_images/box1_top.png" width="620" height="10" alt="" /></td>
						  </tr>
						   <tr>
						    <td valign="top" align="left" background="'.SITE_URL.'images/daily_email_images/bg_p.gif">
						     <table width="100%" border="0" cellspacing="0" cellpadding="0">
						      <tr>
						        <td valign="top" align="left">
						        	<table border="0" cellspacing="0" cellpadding="0" width="620" style="vertical-align:top; width:620px;">
						          <tr>
						            <td width="10" valign="top" style="vertical-align:top; width:10px;"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" width="10" height="1" alt="" /></td>
						            <td width="171" height="76" align="left" valign="top" style="vertical-align:top; text-align:left; width:171px; height:76px; line-height:0px;">
						            	<img src="'.SITE_URL.'images/daily_email_images/logo.png" width="164" height="72" alt="" />
						            </td>
									<td width="350" valign="top" style="vertical-align:top; width:350px;"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" width="350" height="1" alt="" /></td>
						          </tr>
						      </table>
						        </td>
						      </tr>
						      <tr>
						         <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" width="1" height="15" alt="" /></td>
						     </tr>
						      <tr>
						         <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/daily_email_images/box2_top.png" width="620" height="15" alt="" /></td>
						     </tr>
						      <tr>
						        <td valign="top" background="'.SITE_URL.'images/daily_email_images/box2_middle.png" style="padding:0 25px;">
						        	<table width="570" border="0" cellspacing="0" cellpadding="0" style="width:570px; margin: 0 auto;">
						              <tr>
						                <td valign="top">
						                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ebecec;">
						                  <tr>
						                    <td valign="top" bgcolor="#ddedcc" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-size:15px; font-weight:bold; padding:0 0 0 6px;">Your Daily Deal</td>
						                  </tr>
						                  <tr>
						                    <td valign="top" style="padding:6px 0 10px 0; color:#009ce8; font-family:Arial, Helvetica, sans-serif; line-height:20px; font-size:18px; font-weight:bold;">
						                     '.$data['title'].'
						                    </td>
						                  </tr>
						                  <tr>
						                    <td>
						                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                      <tr>
						                        <td width="10" valign="top"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                        <td width="230" valign="top">
						                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                          <tr>
						                            <td><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="12" /></td>
						                          </tr>
						                          <tr>
						                            <td height="90" valign="top" background="'.SITE_URL.'images/daily_email_images/price_bg.png">
						                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:8px 0 10px 15px; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:24px; font-weight:bold; text-align:center;">
						                                    	&pound;'.$data['discounted_price'].'
						                                    </td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:8px 0 10px 15px; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:24px; font-weight:bold; text-align:center;">
						                                    ';

															if($_REQUEST['mode']=="edit")
																{
						                                    		$txt.= '<a href="'.SITE_URL.'index.php?action=view&id='.intval($_REQUEST['id']).'" style="color:#fff;">View Now !</a>';
																} else {
																	$txt.= '<a href="'.SITE_URL.'index.php?action=view&id='.$primary_id.'" style="color:#fff;">View Now !</a>';
																}
																//$mdata['deal_id']=$primary_id;

						                                    $txt.= '
						                                    </td>
						                                  </tr>
						                                </table>                                </td>
						                              </tr>
						                              <tr>
						                                <td height="12"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="12" /></td>
						                              </tr>
						                              <tr>
						                                <td valign="top" height="67" background="'.SITE_URL.'images/daily_email_images/timer_bg.png">
						                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
						                                    <td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
						                                    <td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$data['full_price'].'</td>
						                                    <td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.intval($data['discounted_price']*100/$data['full_price']).'%</td>
						                                    <td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.strip_tags($data['full_price'] - $data['discounted_price']).'</td>
						                              </tr>
						                            </table>                            </td>
						                          </tr>
						                         </table>                        </td>
						                        <td width="30" valign="top"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="30" height="1" /></td>
						                        <td width="290" valign="top"><img src="'.UPLOAD_PATH.$img[file].'" alt="" width="288" height="189" /></td>
						                        <td width="10" valign="top"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                      </tr>
						                    </table>                    </td>
						                  </tr>
						                  <tr>
						                    <td height="16"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="16" /></td>
						                  </tr>
						                 </table>              </td>
						              </tr>
						              <tr>
						                <td height="16"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="16" /></td>
						              </tr>
						               <tr>
						                    <td valign="top" bgcolor="#ddedcc" style="color:#14131b; font-family:Arial, Helvetica, sans-serif; line-height:26px; font-size:15px; font-weight:bold; padding:0 0 0 6px;">More Deals</td>
						                  </tr>
						                   <tr>
						                     <td>
						                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ebecec;">
						                      <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                       <tr>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                         <td valign="top" width="190"><img src="'.UPLOAD_PATH.$email_image_2['file'].'" width="192" height="126" alt="" /></td>
						                         <td valign="top" width="10"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                         <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                           <tr>
						                             <td valign="top" style="padding:0 0 5px 0; color:#009ce8; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:15px; font-weight:bold;">
						                             '.$email_res2['title'].'</td>
						                           </tr>
						                           <tr>
						                             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                               <tr>
						                                 <td width="230" valign="top">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td height="20"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="20" /></td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" height="67" background="'.SITE_URL.'images/daily_email_images/timer_bg.png">
						                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
						                                    <td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
						                                    <td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$email_res2['full_price'].'</td>
						                                    <td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.intval($email_res2['discounted_price']*100/$email_res2['full_price']).'%</td>
						                                    <td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.intval($email_res2['full_price']-$email_res2['discounted_price']).'</td>
						                              </tr>
						                            </table>                                        </td>
						                                      </tr>
						                                    </table>                                   </td>
						                                  <td valign="top" width="8"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="8" height="1" /></td>
						                                  <td width="120" height="90" valign="top" background="'.SITE_URL.'images/daily_email_images/price_bg2.png">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;">&pound;'.$email_res2['discounted_price'].'</td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res2['deal_id'].'" style="color:#fff; text-decoration:none;">View Now !</a></td>
						                                      </tr>
						                                    </table>                                  </td>
						                               </tr>
						                             </table></td>
						                           </tr>
						                         </table></td>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                       </tr>
						                        <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                     </table></td>
						                   </tr>
						                   <tr>
						                     <td>
						                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ebecec;">
						                      <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                       <tr>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                         <td valign="top" width="190"><img src="'.UPLOAD_PATH.$email_image_3['file'].'" width="192" height="126" alt="" /></td>
						                         <td valign="top" width="10"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                         <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                           <tr>
						                             <td valign="top" style="padding:0 0 5px 0; color:#009ce8; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:15px; font-weight:bold;">
						                             '.$email_res3['title'].' </td>
						                           </tr>
						                           <tr>
						                             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                               <tr>
						                                 <td width="230" valign="top">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td height="20"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="20" /></td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" height="67" background="'.SITE_URL.'images/daily_email_images/timer_bg.png">
						                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
						                                    <td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
						                                    <td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$email_res3['full_price'].'</td>
						                                    <td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.intval($email_res3['discounted_price']*100/$email_res3['full_price']).'%</td>
						                                    <td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.intval($email_res3['full_price']-$email_res3['discounted_price']).'</td>
						                              </tr>
						                            </table>                                        </td>
						                                      </tr>
						                                    </table>                                   </td>
						                                  <td valign="top" width="8"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="8" height="1" /></td>
						                                  <td width="120" height="90" valign="top" background="'.SITE_URL.'images/daily_email_images/price_bg2.png">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;">&pound;'.$email_res3['discounted_price'].'</td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res3['deal_id'].'" style="color:#fff; text-decoration:none;">View Now !</a></td>
						                                      </tr>
						                                    </table>                                  </td>
						                               </tr>
						                             </table></td>
						                           </tr>
						                         </table></td>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                       </tr>
						                        <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                     </table></td>
						                   </tr>
						                   <tr>
						                     <td>
						                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ebecec;">
						                      <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                       <tr>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                         <td valign="top" width="190"><img src="'.UPLOAD_PATH.$email_image_4['file'].'" width="192" height="126" alt="" /></td>
						                         <td valign="top" width="10"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="10" height="1" /></td>
						                         <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                           <tr>
						                             <td valign="top" style="padding:0 0 5px 0; color:#009ce8; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:15px; font-weight:bold;">
						                             '.$email_res4['title'].'</td>
						                           </tr>
						                           <tr>
						                             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						                               <tr>
						                                 <td width="230" valign="top">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td height="20"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="20" /></td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" height="67" background="'.SITE_URL.'images/daily_email_images/timer_bg.png">
						                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                  <tr>
						                                    <td valign="top" align="center" width="76" style="padding:8px 0 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Value</td>
						                                    <td valign="top" align="center" width="75" style="padding:8px 0 5px 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Discount</td>
						                                    <td valign="top" align="center" width="78" style="padding:8px 4px 5px 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:12px; font-weight:bold; text-align:center;">Your Save</td>
						                                  </tr>
						                                  <tr>
						                                    <td valign="top" align="center" style="padding:0 0 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.$email_res4['full_price'].'</td>
						                                    <td valign="top" align="center" style="padding:0 0 0 2px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">'.intval($email_res4['discounted_price']*100/$email_res4['full_price']).'%</td>
						                                    <td valign="top" align="center" style="padding:0 4px 0 0; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:16px; font-size:16px; font-weight:bold; text-align:center;">&pound;'.intval($email_res4['full_price']-$email_res4['discounted_price']).'</td>
						                              </tr>
						                            </table>                                        </td>
						                                      </tr>
						                                    </table>                                   </td>
						                                  <td valign="top" width="8"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="8" height="1" /></td>
						                                  <td width="120" height="90" valign="top" background="'.SITE_URL.'images/daily_email_images/price_bg2.png">
						                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#00cb46; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;">&pound;'.$email_res4['discounted_price'].'</td>
						                                      </tr>
						                                      <tr>
						                                        <td valign="top" align="center" style="padding:8px 0 10px 0; color:#fff; font-family:Arial, Helvetica, sans-serif; line-height:24px; font-size:18px; font-weight:bold; text-align:center;"><a href="'.SITE_URL.'index.php?action=view&id='.$email_res4['deal_id'].'" style="color:#fff; text-decoration:none;">View Now !</a></td>
						                                      </tr>
						                                    </table>                                  </td>
						                               </tr>
						                             </table></td>
						                           </tr>
						                         </table></td>
						                         <td valign="top" width="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="1" /></td>
						                       </tr>
						                        <tr>
						                         <td valign="top" height="12" colspan="5"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                       </tr>
						                     </table>
						                    </td>
						                   </tr>
						                    <tr>
						                     <td valign="top" height="12"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="5" height="12" /></td>
						                   </tr>
						                  <tr>
						                 <td>
						                 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
						                      <tr>
						                        <td valign="top" width="410"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="410" height="1" /></td>
						                        <td>Follow Us on:</td>
						                        <td valign="top" width="6"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="6" height="1" /></td>
						                        <td valign="top"><img src="'.SITE_URL.'images/daily_email_images/icon_01.png" alt="" /></td>
						                        <td valign="top" width="6"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="6" height="1" /></td>
						                        <td valign="top"><img src="'.SITE_URL.'images/daily_email_images/icon_02.png" alt="" /></td>
						                      </tr>
						                    </table>
						                </td>
						                </tr>
						                 <tr>
						                     <td valign="top" height="6"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="6" /></td>
						                </tr>
						                <tr>
<td valign="top" height="1" style="height:1px; line-height:0; border-top: solid 1px #7ed7fc"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="1" /></td>						               </tr>
						                <tr>
						                     <td valign="top" height="6"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="6" /></td>
						                   </tr>
						                <tr>
						                    <td valign="top" align="center">
						                    <a href="'.SITE_URL.'" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">&copy;GeeLaza.com</a>
						                    <a href="'.SITE_URL.'page.php?page=Terms and Conditions" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Terms & Conditions</a>
						                    <a href="'.SITE_URL.'customer-register.php" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Join Us</a>
						                    <a href="'.SITE_URL.'page.php?page=About GeeLaza UK" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">About GeeLaza</a>
						                    <a href="'.SITE_URL.'merchant_login" style="padding:0 4px; color:#5b6cd9; font-family:Arial, Helvetica, sans-serif; line-height:18px; font-size:14px;text-align:center; text-decoration:none;">Real Deal with us</a>                   </td>
						                 </tr>
						             </table>
						          </td>
						          </tr>
						         <tr>
						         <td height="15" valign="top" style="vertical-align:top; height:15px; line-height:0px;"><img src="'.SITE_URL.'images/daily_email_images/box2_bottom.png" width="620" height="15" alt="" /></td>
						     </tr>
						    </table>
						    </td>
						   </tr>
						   <tr>
						     <td valign="top" height="6" background="'.SITE_URL.'images/daily_email_images/bg_p.gif"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" alt="" width="1" height="6" /></td>
						  </tr>
						   <tr>
						    <td valign="top" align="center" background="'.SITE_URL.'images/daily_email_images/bg_p.gif">
						       <table width="600" bgcolor="#d1d1d1" border="0" cellspacing="0" cellpadding="0" style="width:600px; margin:0 auto;">
						          <tr>
						            <td style="padding:8px 4px; color:#5b5960; font-family:Arial, Helvetica, sans-serif; line-height:14px; font-size:11px; text-decoration:none;">except to obtain some advantage from it? But who has any right <a href="'.SITE_URL.'" style="color:#5eb1de;">GeeLaza</a> find fault with a man who chooses to enjoy a pleasure that has no annoyingfn consequences,          </td>
						         </tr>
						        </table>
						  </tr>
						   <tr>
						    <td height="10" style="height:10px; background-repeat: no-repeat;" background="'.SITE_URL.'images/daily_email_images/box1_bottom.png"><img src="'.SITE_URL.'images/daily_email_images/spacer.gif" width="620" height="10" alt="" /></td>
						  </tr>
						</table>


				';


				$sql="SELECT * FROM ".TABLE_ADMIN." where admin_name='admin'";
				$admin=$db->query_first($sql);

				//$txt .= " Please visit the link :".SITE_URL."city".str_replace(" ","-",trim(strtolower($_POST['city'])))."/offer/".str_replace(" ","-",trim(strtolower($_POST['brand'])))."<br/>";
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: GeeLaza.com<".$admin['email'].">". "\r\n" ;

				$status=@mail($to,$subject,$txt,$headers);

	if($_REQUEST['mode']=="edit")
	{
		$deal_id=intval($_REQUEST['id']);



		$db->query_update(TABLE_DEALS, $data, "deal_id='$deal_id'");

		$dataimg['deal_id']=$deal_id;

		$db->query_update(TABLE_DEAL_IMAGES, $dataimg, "deal_id='".$_SESSION["session_temp"]."'");

		$mdata['user_id']=$_POST['mid'];
		$mdata['deal_id']=$deal_id;
		$db->query_update(TABLE_DEALS_MERCHANT, $mdata, "deal_id='$deal_id'");



		$_SESSION['msg']="Deal is added successfully.";
		header("location:show_deals.php");
		exit;

	}
	else
	{

	if(date('Y-m-d H:i',strtotime($data['deal_start_time']))>date('Y-m-d H:i')){
		$data['status']=2;
		}



		$primary_id=$db->query_insert(TABLE_DEALS, $data);

		$mdata['user_id']=$_POST['mid'];
		$mdata['deal_id']=$primary_id;
		$db->query_insert(TABLE_DEALS_MERCHANT, $mdata);

		$dataimg['deal_id']=$primary_id;

		$db->query_update(TABLE_DEAL_IMAGES, $dataimg, "deal_id='".$_SESSION["session_temp"]."'");

		$_SESSION['msg']="Deal is updated successfully.";
		header("location:show_deals.php");
		exit;
	}


}
if($_REQUEST['mode']=='edit' || $_REQUEST['mode']=='delete'){
$_SESSION["session_temp"] =$deal_id;
}else{
$_SESSION["session_temp"] =uniqid();
}
?>





    <div class="main_content">

      <?php include("include/top_menu.inc.php");?>

    <div class="center_content">

   		<?php require("include/left_menu.php"); ?>

    <div class="right_content">


		 <div class="form">


		 <?php
				if($_REQUEST['mode']=="edit")
				{
		?>
					<h1>Edit Daily Deal</span></h1>
					<form method="post" action="?id=<?php echo $deal_id;?>&mode=edit" enctype="multipart/form-data" class="niceform2">

		<?php
				}
				else
				{
		?>
					<h1>Add Daily Deal</span></h1>
					<form method="post" action="" enctype="multipart/form-data" class="niceform2">


		<?php
				}

		?>

                <fieldset>

				<script>
				function getStore(mid){

				var urlsend="ajax_storelocation.php?";
				urlsend=urlsend+"merchant_id="+mid;
				urlsend=urlsend+"&sid="+Math.random();


				req=new XMLHttpRequest();
					req.open('GET',urlsend,false);
					req.send(null);

							if(req.readyState==4){

								document.getElementById("location_id").innerHTML=req.responseText;

						}


				}

				</script>

				<!--  <dl>
                        <dt><label for="gender">Merchant Name:</label></dt>
                        <dd>
                            <select name="mid" class="dropdown" id="merchant_name" onChange="getStore(this.value)">
													<option value="">-- Select --</option>

													<?php

														$sql_owners=mysql_query("select company_name,first_name,last_name,user_id from " .TABLE_USERS." where status=1 and reg_type='merchant' order by company_name asc");
														while($row_owners=mysql_fetch_array($sql_owners))
														{

														$sql="SELECT * FROM ".TABLE_DEALS_MERCHANT." JOIN ".TABLE_DEALS." on(".TABLE_DEALS_MERCHANT.".deal_id=".TABLE_DEALS.".deal_id) where 1=1 and ".TABLE_DEALS_MERCHANT.".user_id='".$row_owners[user_id]."' and  ".TABLE_DEALS_MERCHANT.".deal_id='".$row_deals[deal_id]."'";

														$m_deal=mysql_fetch_object(mysql_query($sql));
													?>

															<option value="<?php echo $row_owners[user_id];?>" <?php if($row_owners[user_id]==$m_deal->user_id) { echo "selected"; }?>><?php echo $row_owners[company_name]."(".$row_owners[first_name]." ".$row_owners[last_name].")";?></option>
													<?php
														}
													?>

												</select>
                        </dd>
                    </dl>

					<dl>
                        <dt><label for="gender">Store Location:</label></dt>
                        <dd><?php
						 $sql="SELECT * FROM ".TABLE_DEALS_MERCHANT." JOIN ".TABLE_DEALS." on(".TABLE_DEALS_MERCHANT.".deal_id=".TABLE_DEALS.".deal_id) where 1=1 and  ".TABLE_DEALS_MERCHANT.".deal_id='".$row_deals[deal_id]."'";

						$m_deal=mysql_fetch_object(mysql_query($sql));

						$sql="SELECT * FROM ".TABLE_STORES." where 1=1 and  ".TABLE_STORES.".merchant_id='".$m_deal->user_id."'";

						$m_store=mysql_fetch_object(mysql_query($sql));



						?>
                            <input type="hidden" name="store_id" value="<?php echo $m_store->store_id?>">
						    <select name="location_id" class="dropdown" id="location_id"  size="1">
								<option value="">-- Select --</option>
                                <?php

									$sql_stores=mysql_query("select location_id,location_name from " .TABLE_STORES_LOCATION." where 1=1 and store_id='".$m_store->store_id."' order by location_name asc");
									while($row_stores=mysql_fetch_array($sql_stores))
									{



								?>

										<option value="<?php echo $row_stores[location_id];?>" <?php if($row_stores[location_id]==$row_deals[location_id]) { echo "selected"; }?>><?php echo $row_stores[location_name];?></option>
								<?php
									}
								?>
                            </select>
                        </dd>
                    </dl>-->


					<!--<dl>
                        <dt><label for="gender">Deal Category:</label></dt>
                        <dd>
                            <select name="deal_cat" class="dropdown" id="deal_cat" onChange="getCity('findsubcat.php?cat_id='+this.value)" size="1">
								<option value="">-- Select --</option>
                                <?php

									$sql_categories=mysql_query("select cat_name,cat_id from " .TABLE_CATEGORIES." where parent_id=0 order by cat_name asc");
									while($row_categories=mysql_fetch_array($sql_categories))
									{
								?>

										<option value="<?php echo $row_categories[cat_id];?>" <?php if($row_categories[cat_id]==$row_deals[deal_cat]) { echo "selected"; }?>><?php echo $row_categories[cat_name];?></option>
								<?php
									}
								?>
                            </select>
                        </dd>
                    </dl> -->

	<div id="step1" style="border: 0px solid #4CC7ED; display: block;">
					<dl>
                        <dt><label for="gender">Deal City:</label></dt>
                        <dd>
                            <select name="city" class="dropdown" id="city" size="1">
								<option value="">-- Select --</option>
								<option value="-1" <?php if($row_deals[best_deal]=='y') { echo "selected"; }?>>National Deal</option>
                                <?php

									echo $sql_city = mysql_query("select * FROM " .TABLE_CITIES." where status = 1 order by city_name asc");
									while($row_city = mysql_fetch_array($sql_city))
									{
								?>

										<option value="<?php echo $row_city[city_id];?>" <?php if($row_city[city_id]==$row_deals[city]) { echo "selected"; }?>><?php echo $row_city[city_name];?></option>
								<?php
									}
								?>

                            </select>
                        </dd>
                    </dl>
	<div style="clear: both;"></div>
	</div>
	<br>
	<center><input type="button" id="step1next" value="Next  >>"></center>

	<div id="step2" style="border: 0px solid #4CC7ED; display: none;">

                   <dl>
                        <dt><label for="deal_type">Deal Type:</label></dt>
                        <dd><select name="deal_type" id="deal_type">
						<option value="">Main Deal</option>
						<option value="y" <?php if($row_deals['in_sidebar']=='y'){echo "Selected";}?>>Side Deal</option>
						</select>
						</dd>
                    </dl>

                   <dl>
                        <dt><label for="email">Deal Name:</label></dt>
                        <dd><input type="text" name="title" id="title" size="54" value="<?php echo stripslashes($row_deals[title]);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>


					<dl>
                        <dt><label for="email">Website:</label></dt>
                        <dd><input type="text" name="website" id="website" size="54" value="<?php echo stripslashes($row_deals[website]);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>

					<dl>
                        <dt><label for="email">Deal Start Time:</label></dt>
                        <dd><input type="text" name="deal_start_time" id="my_date_field" size="54" value="<?php if(!empty($row_deals[deal_start_time])){echo date("m/d/Y H:i",strtotime($row_deals[deal_start_time]));}?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /><span id="cal1"><!-- <img src="zpcal/themes/icons/calendar1.gif" width="27" height="21" style="cursor:pointer"/> --></span>
								 	<script type="text/javascript">
								 		var j = jQuery.noConflict();
								 		jQuery('#my_date_field').datetimepicker();
									</script>

								  </span>
                    </dl>
                    <dl>
                        <dt><label for="password">Deal End Time:</label></dt>
                        <dd><input type="text" name="deal_end_time" id="my_date_field2" size="54" value="<?php  if(!empty($row_deals[deal_end_time])){echo date("m/d/Y H:i",strtotime($row_deals[deal_end_time]));}?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /><span id="cal2"><!-- <img src="zpcal/themes/icons/calendar1.gif" width="27" height="21" style="cursor:pointer"/> --></span>
								<script type="text/javascript">
								var w = jQuery.noConflict();
									w("#my_date_field2").click(function(){
										w("#my_date_field2").datetimepicker();
										//alert('Hi');
									});
								</script>

								 <!-- <script type="text/javascript">
								  var cal = new Zapatec.Calendar.setup({

								  inputField:"my_date_field2",
								  ifFormat:"%Y-%m-%d %H:%M",
								  button:"cal2",
								  showsTime:false

								  });

								 </script> --> </span></dd>

                    </dl>

                    <!--
                    <dl>
                        <dt><label for="email">Minimum Coupons:</label></dt>
                        <dd><input type="text" name="min_coupons" id="min_coupons" size="54" value="<?php echo stripslashes($row_deals['min_coupons']);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>
                     -->

					<dl>
                        <dt><label for="email">Max Coupons:</label></dt>
                        <dd><input type="text" name="max_coupons" id="max_coupons" size="54" value="<?php echo stripslashes($row_deals['max_coupons']);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>

					<dl>
                        <dt><label for="email">Price:</label></dt>
                        <dd><input type="text" name="discounted_price" id="discounted_price" size="54"  value="<?php echo stripslashes($row_deals['discounted_price']);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>

                    <dl>
                        <dt><label for="password">Worth:</label></dt>
                        <dd><input type="text" name="full_price" id="full_price" size="54" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" value="<?php echo $row_deals['full_price']?>" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="email">Discount (%):</label></dt>
                        <dd><input type="text" name="discount" id="discount" size="54" value="<?php echo stripslashes($row_deals['discount']);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>

                    <dl>
                        <dt><label for="email">Savings:</label></dt>
                        <dd><input type="text" name="savings" id="savings" size="54"  value="<?php echo stripslashes($row_deals['savings']);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>

					<!--
					<dl>
                        <dt><label for="referral_no">Referral Number:</label></dt>
                        <dd><input type="text" name="referral_no" id="referral_no" size="54" value="<?php echo stripslashes($row_deals['referral_no']);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>


					<dl>
                        <dt><label for="referral_value">Offer Refferal Value:</label></dt>
                        <dd><input type="text" name="referral_value" id="referral_value" size="54" value="<?php echo stripslashes($row_deals['referral_value']);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" /></dd>
                    </dl>
					 -->



					<dl>
                        <dt><label for="referral_value">Deal Status:</label></dt>
                        <dd><select name="status" id="status">
						<option value="1" <?php if($row_deals['status']=='1'){echo "Selected";}?>>Active</option>
						<option value="0" <?php if($row_deals['status']=='0'){echo "Selected";}?>>Inactive</option>
						<option value="2" <?php if($row_deals['status']=='2'){echo "Selected";}?>>Upcoming</option>
						<option value="3" <?php if($row_deals['status']=='3'){echo "Selected";}?>>End</option>
						</select>
						</dd>
                    </dl>
                   <!--  <dl>
                        <dt><label for="description">Description:</label></dt>
                        <dd><input type="text" name="description" id="description" size="54" value="<?php echo stripslashes($row_deals['description']);?>" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;" />

						</dd>
                    </dl> -->



					 <dl>
                        <dt><label for="password">Deal Details:</label></dt>
                        <dd>
							<?php
								$oFCKeditor = new FCKeditor('offer_details');
								$oFCKeditor->BasePath = '../fckeditor/';
								$oFCKeditor->Value = stripslashes($row_deals['offer_details']) ;
								$oFCKeditor->Width = '100%' ;
								$oFCKeditor->Height = '500' ;
								$oFCKeditor->ToolbarSet = 'Default';
								$oFCKeditor->Create();
							?>
						</dd>
                    </dl>

                    <dl>
                        <dt><label for="password">Company:</label></dt>
                        <dd>
							<?php
								$dsFCKeditor = new FCKeditor('offer_details_sidebar');
								$dsFCKeditor->BasePath = '../fckeditor/';
								$dsFCKeditor->Value = stripslashes($row_deals['offer_details_sidebar']) ;
								$dsFCKeditor->Width = '100%' ;
								$dsFCKeditor->Height = '200' ;
								$dsFCKeditor->ToolbarSet = 'Default';
								$dsFCKeditor->Create();
							?>
						</dd>
                    </dl>

					<dl>
                        <dt><label for="highlight">Highlights:</label></dt>
                        <dd>
							<?php
								$hFCKeditor = new FCKeditor('highlights');
								$hFCKeditor->BasePath = '../fckeditor/';
								$hFCKeditor->Value = stripslashes($row_deals['highlights']) ;
								$hFCKeditor->Width = '100%' ;
								$hFCKeditor->Height = '200' ;
								$hFCKeditor->ToolbarSet = 'Default';
								$hFCKeditor->Create();
							?>
						</dd>
                    </dl>

                    <dl>
                        <dt><label for="fineprint">The Fine Print:</label></dt>
                        <dd>
							<?php
								$fpFCKeditor = new FCKeditor('fineprint');
								$fpFCKeditor->BasePath = '../fckeditor/';
								$fpFCKeditor->Value = stripslashes($row_deals['fineprint']) ;
								$fpFCKeditor->Width = '100%' ;
								$fpFCKeditor->Height = '200' ;
								$fpFCKeditor->ToolbarSet = 'Default';
								$fpFCKeditor->Create();
							?>
						</dd>
                    </dl>

                    <dl>
                        <dt><label for="fineprint">Postage:</label></dt>
                        <dd>
							<?php
								$pFCKeditor = new FCKeditor('postage');
								$pFCKeditor->BasePath = '../fckeditor/';
								$pFCKeditor->Value = stripslashes($row_deals['postage']) ;
								$pFCKeditor->Width = '100%' ;
								$pFCKeditor->Height = '200' ;
								$pFCKeditor->ToolbarSet = 'Default';
								$pFCKeditor->Create();
							?>
						</dd>
                    </dl>


					<!--<dl>
                        <dt><label for="bestdeal">Is it best deal?</label></dt>
                        <dd>No:
						<?php
							if($row_deals[best_deal]=="n")
							{
						?>
								<input type="radio" value="n" name="best_deal" id="best_deal" checked="checked" >
						<?php
							}else{
							?>
							<input type="radio" value="n" name="best_deal" id="best_deal" checked="checked" >
							<?php }?>

							Yes:
						<?php	if($row_deals[best_deal]=="y")
							{
						?>
								<input type="radio" value="y" name="best_deal" id="best_deal" checked="checked">

								<?php }else{?>
								<input type="radio" value="y" name="best_deal" id="best_deal">
								<?php }?>

						</dd>
                    </dl>-->

                     <dl class="submit">
                    	<input type="button" id="step1back" value="<<  Previous">
                    	<input type="submit" name="submit" id="submit" value="Submit" />
                     </dl>
</div> <!-- step 2 end -->
                </fieldset>

         </form>
         </div>



		 <div id="step3" style="display: none;">
		 <div class="clear"></div>
			<span style="font-weight:bold">Upload Files:</span>


					<!-- <iframe src="uploader/example/uploader.php" width="600" frameborder="0" scrolling="no"></iframe>-->
					<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css" id="theme">
					<link rel="stylesheet" href="js/uploader/jquery.fileupload-ui.css">

					<div id="fileupload">
						<form action="upload.php" method="POST" enctype="multipart/form-data">
							<div class="fileupload-buttonbar">
								<label class="fileinput-button">
									<span>Add files...</span>
									<input type="file" name="files[]" multiple>
								</label>
								<button type="submit" class="start">Start upload</button>
								<button type="reset" class="cancel">Cancel upload</button>
								<button type="button" class="delete">Delete files</button>
							</div>
						</form>
						<div class="fileupload-content">
							<table class="files"></table>
							<div class="fileupload-progressbar"></div>
						</div>
					</div>
					<script id="template-upload" type="text/x-jquery-tmpl">
						<tr class="template-upload{{if error}} ui-state-error{{/if}}">
							<td class="preview"></td>
							<td class="name">${name}</td>
							<td class="size">${sizef}</td>
							{{if error}}
								<td class="error" colspan="2">Error:
									{{if error === 'maxFileSize'}}File is too big
									{{else error === 'minFileSize'}}File is too small
									{{else error === 'acceptFileTypes'}}Filetype not allowed
									{{else error === 'maxNumberOfFiles'}}Max number of files exceeded
									{{else}}${error}
									{{/if}}
								</td>
							{{else}}
								<td class="progress"><div></div></td>
								<td class="start"><button>Start</button></td>
							{{/if}}
							<td class="cancel"><button>Cancel</button></td>
						</tr>
					</script>
					<script id="template-download" type="text/x-jquery-tmpl">
						<tr class="template-download{{if error}} ui-state-error{{/if}}">
							{{if error}}
								<td></td>
								<td class="name">${name}</td>
								<td class="size">${sizef}</td>
								<td class="error" colspan="2">Error:
									{{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
									{{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
									{{else error === 3}}File was only partially uploaded
									{{else error === 4}}No File was uploaded
									{{else error === 5}}Missing a temporary folder
									{{else error === 6}}Failed to write file to disk
									{{else error === 7}}File upload stopped by extension
									{{else error === 'maxFileSize'}}File is too big
									{{else error === 'minFileSize'}}File is too small
									{{else error === 'acceptFileTypes'}}Filetype not allowed
									{{else error === 'maxNumberOfFiles'}}Max number of files exceeded
									{{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
									{{else error === 'emptyResult'}}Empty file upload result
									{{else}}${error}
									{{/if}}
								</td>
							{{else}}
								<td class="preview">
									{{if thumbnail_url}}
										<a href="${url}" target="_blank"><img src="${thumbnail_url}"></a>
									{{/if}}
								</td>
								<td class="name">
									<a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
								</td>
								<td class="size">${sizef}</td>
								<td colspan="2"></td>
							{{/if}}
							<td class="delete">
								<button data-type="${delete_type}" data-url="${delete_url}">Delete</button>
							</td>
						</tr>
					</script>
					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
					<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
					<script src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
					<script src="js/uploader/jquery.iframe-transport.js"></script>
					<script src="js/uploader/jquery.fileupload.js"></script>
					<script src="js/uploader/jquery.fileupload-ui.js"></script>
					<script src="js/uploader/application.js"></script>



					</div>
     </div><!-- end of right content-->


  </div>   <!--end of center content -->

    <div class="clear"></div>
    </div> <!--end of main content-->
<script type="text/javascript">
$("input#step1next").click(function () {

	$("div#step1").slideUp(1000);
	$("div#step2").fadeIn(1000);
	$("div#step3").show();			// slideToggle() / toggle()
	$("input#step1next").hide();
});

$("input#step1back").click(function () {
	$("div#step1").slideDown(1000);
	$("div#step2").slideUp(800);
	$("div#step3").hide();
	$("input#step1next").show();
});

$("div#step2").ready(function() {
	$("div#step2").hide();
	$("div#step3").hide();
});


function chkDiscount() {

	var disc = document.getElementById('discount').value;

	if (disc > 100) {
		document.getElementById('discount').value = 100;
		alert ('Discount can not be more than 100%');
	}

}

</script>
    	<?php require("include/footer.inc.php"); ?>

