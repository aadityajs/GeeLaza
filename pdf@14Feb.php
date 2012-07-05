<?php
ob_start();
//	 && $_REQUEST['price'] != ""  && $_REQUEST['valid'] != ""  && $_REQUEST['img'] != "" 

//if ($_REQUEST['deal_title'] != "" && $_REQUEST['c_code'] != ""  && $_REQUEST['price'] != ""  && $_REQUEST['valid'] != ""  && $_REQUEST['img'] != "" ) {
	
	$deal_title = html_entity_decode(htmlentities($_REQUEST['deal_title']));
	$c_code = $_REQUEST['c_code'];
	$price = $_REQUEST['price'];
	$s_valid = $_REQUEST['s_valid'];
	$e_valid = $_REQUEST['e_valid'];
	$img = $_REQUEST['img'];
	
//}

$html = '
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#c0c0c0">
  <tr>
    <td style="padding: 10px 0;"><table width="724" border="0" align="center" cellpadding="0" cellspacing="0" style="padding: 0 10px;">
      <tr>
        <td bgcolor="#151515"><img src="images/pdf_img/logo.gif" alt="" width="724" height="82"/></td>
      </tr>
      <tr>
        <td style="background-color:#FFFFFF; border-top: 5px solid #7fd7fc;"><table width="724" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="font-family: Arial Rounded MT Bold; font-weight: normal; font-size: 30px; color: #333333; line-height: 44px; padding-left: 15px; padding-top: 10px;">Your GeeLaza Voucher</td>
            </tr>
            <tr>
              <td style="border-top: 3px solid #7fd7fc;"><table width="724" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="212"><img src="'.$img.'" alt="" width="212" height="194" /></td>
                    <td width="488" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td style="font-family: Arial Rounded MT Bold; font-weight: bold; font-size: 18px; color: #333333; line-height: 44px; padding-left: 15px; padding-top: 10px;">YOUR DEAL</td>
                        </tr>
                        <tr>
                          <td style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 17px; color: #4e4e4e; line-height: 20px; padding-left: 15px;">
                          '.$deal_title.'
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 24px; color: #3c3c3c; line-height: 20px; padding-left: 15px; padding-top: 20px;">
                          This deal is worth: &pound;'.$price.'</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td style="border-top: 3px solid #7fd7fc;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #ff7a39; line-height: 20px; padding-left: 15px; padding-top: 8px;">Voucher Details:</td>
                  </tr>
                  <tr>
                    <td style="padding-bottom: 10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="36%" style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #000; line-height: 20px; padding-left: 15px; padding-top: 10px;">
                          GeeLaza code: '.$c_code.'</td>
                          <td width="2%">&nbsp;</td>
                          <td width="35%" style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #000; line-height: 20px; padding-left: 15px; padding-top: 10px;">
                          Deal valid from: '.$s_valid.'</td>
                          <td width="1%">&nbsp;</td>
                          <td width="26%" style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #000; line-height: 20px; padding-left: 15px; padding-top: 10px;">
                          Until: '.$e_valid.'</td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td style="border-top: 3px solid #7fd7fc;"><img src="images/pdf_img/spacer.gif" alt="" width="1" height="10"/></td>
            </tr>
            <tr>
              <td style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #ff7a39; line-height: 20px; padding-left: 15px; padding-bottom: 50px;">Merchant Details:</td>
            </tr>
            <tr>
              <td style="border-top: 3px solid #7fd7fc;"><img src="images/pdf_img/spacer.gif" alt="" width="1" height="10"/></td>
            </tr>
            <tr>
              <td style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #ff7a39; line-height: 20px; padding-left: 15px; padding-bottom: 120px;">Fine Print:</td>
            </tr>
            <tr>
              <td style="border-top: 3px solid #7fd7fc;"><img src="images/pdf_img/spacer.gif" alt="" width="1" height="10"/></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #ff7a39; line-height: 20px; padding-left: 15px; padding-bottom: 17px;">How to use your voucher:</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="13%" align="center" valign="top"><img src="images/pdf_img/step1.gif" alt="" width="63" height="69" /></td>
                          <td width="22%" style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; color: #000; line-height: 20px; padding-bottom: 20px;">Copy your voucher code</td>
                          <td width="11%" align="center" valign="top"><img src="images/pdf_img/step2.gif" alt="" width="63" height="69" /></td>
                          <td width="21%" style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; color: #000; line-height: 20px; padding-bottom: 20px;">Enter code into the<br />
                            voucher field on the deal<br />
                            offerer&prime;s website</td>
                          <td width="11%" align="center" valign="top"><img src="images/pdf_img/step3.gif" alt="" width="63" height="69" /></td>
                          <td width="22%" style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; color: #000; line-height: 20px; padding-bottom: 20px;">Redeem your voucher<br />
                            and enjoy your deal</td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td style="border-top: 3px solid #7fd7fc;"><img src="images/pdf_img/spacer.gif" alt="" width="1" height="10"/></td>
            </tr>
            <tr>
              <td style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #ff7a39; line-height: 20px; padding-left: 15px; padding-bottom: 17px;">Got any question? <span style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #000; line-height: 20px; padding-left: 15px; padding-bottom: 17px;">Email us: <a href="#" style="color:#000000; text-decoration: none;">support@geelaza.com.</a></span></td>
            </tr>
            <tr>
              <td style="border-top: 3px solid #7fd7fc;"><img src="images/pdf_img/spacer.gif" alt="" width="1" height="10"/></td>
            </tr>
            <tr>
              <td style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; color: #ff7a39; line-height: 20px; padding-left: 15px; padding-bottom: 6px;">Changed your mind on your purchased deal?</td>
            </tr>
            <tr>
              <td style="font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; color: #7c7c7c; line-height: 17px; padding-left: 15px; padding-bottom: 17px;">Once you have received your voucher, you may cancel the transaction at any time within 5 days from the day your purchased the deal. If you want to cancel than head to our website www.geelaza.com and scroll down until you see the &quot;GeeLaza Promise&quot; box on the right which will allow you to submit a refund request.</td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
';

//echo $html;

/*$html = '

<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%" bgcolor="#000000"><img src="images/logo.gif" width="171" height="107" /></td>
    <td width="82%" bgcolor="#0E0E0E">&nbsp;</td>
  </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="26%" align="center" valign="middle"  style="border-bottom:1px solid black;"><h3><span style="font-family: Verdana, Arial, Helvetica, sans-serif"><span style="font-family: Arial, Helvetica, sans-serif"><span style="font-size: medium"></span></span></span></h3></td>
    <td width="35%" align="center" valign="middle" style="border-bottom:1px solid black;"><h3 style="font-family: Arial, Helvetica, sans-serif;font-size: medium;font-weight: bold;">Deal Information </h3></td>
    <td width="21%" align="center" valign="middle" style="border-bottom:1px solid black;"><h3 style="font-family: Arial, Helvetica, sans-serif;font-size: medium;font-weight: bold;">Coupon Code </h3></td>
    <td width="18%" align="center" valign="middle" style="border-bottom:1px solid black;"><h3 style="font-family: Arial, Helvetica, sans-serif;font-size: medium;font-weight: bold;">Price</h3></td>
  </tr>
  <tr>
    <td style="border-right: none;">&nbsp;</td>
    <td valign="top"  style="border-right:0;">&nbsp;</td>
    <td valign="top"  style="border-right:0;">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right: none;"><div align="center" style="font-family: Arial, Helvetica, sans-serif; font-size: small;"><img src="'.$img.'" width="182" height="108" /></div></td>
    <td valign="top"  style="border-right:0;">
		
		<a href="http://aditya/getdeals/index.php?action=view&amp;id=60" style="font-family: Arial, Helvetica, sans-serif; font-size: small;"> <strong>'.$deal_title.'</strong></a>	</td>
    <td valign="top"  style="border-right:0;"><div align="center"><span style="font-family: Arial, Helvetica, sans-serif; font-size: small;">'.$c_code.'</span></div></td>
    <td valign="top"><div align="center"><span style="font-family: Arial, Helvetica, sans-serif; font-size: small;">Price of Deal: &pound; '.$price.' </span></div></td>
  </tr>
  <tr>
    <td style="border-bottom:1px solid black;">&nbsp;</td>
    <td valign="top" style="border-bottom:1px solid black;">&nbsp;</td>
    <td colspan="2" valign="top" style="font: 11px/20px Tahoma, Arial, Helvetica, sans-serif; color: red; border-bottom:1px solid black;">Valid untill '.$valid.'</td>
  </tr>
</table>
<br />
<br />
<br />
<p>On '.date("F j, Y, g:i a").'</p>

';*/


//==============================================================
//==============================================================
//==============================================================


include("plugin/mpdf/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>