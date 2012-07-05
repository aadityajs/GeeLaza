<?php
ob_start();
//	 && $_REQUEST['price'] != ""  && $_REQUEST['valid'] != ""  && $_REQUEST['img'] != ""

//if ($_REQUEST['deal_title'] != "" && $_REQUEST['c_code'] != ""  && $_REQUEST['price'] != ""  && $_REQUEST['valid'] != ""  && $_REQUEST['img'] != "" ) {

	$deal_title = strip_tags(htmlentities($_REQUEST['deal_title']));
	$c_code = $_REQUEST['c_code'];
	$price = $_REQUEST['price'];
	$s_valid = $_REQUEST['s_valid'];
	$e_valid = $_REQUEST['e_valid'];
	$img = $_REQUEST['img'];

//}

$html = '

<table width="760" border="0" align="center" cellpadding="0" cellspacing="0" >
   <tr>
    <td align="center" valign="top"><img src="images/pdf_img/headerbg1.jpg" alt="" width="760" height="100" /></td>
  </tr>
  <tr>
 <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:2px solid #000000; border-left:2px solid #000000; border-right:2px solid #000000;">
      <tr>
        <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:30px;">
          <tr>
            <td align="left" valign="top" style="font-family:Courier New, Courier, monospace; text-align:left; line-height:19px; color:#000; font-size:20px; font-weight: normal; font-smooth: always; padding-bottom:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="74%" height="180" align="left" valign="top"  style="font-family: Arial, Helvetica, sans-serif;"><p><strong>This GeeLaza Deal Entiies The Bearer To:</strong></p><br /> <p style="font-size:17px; color:#626262;">'.$deal_title.' (Worth &pound;'.$price.') </p><br />
                    <p style="font-size:20px; color:#626262;">GeeLaza value: &pound;39.98</p></td>
                  <td width="26%" align="center" valign="middle"><img src="'.$img.'" width="233" height="178" /></td>
                </tr>
            </table></td>
          </tr>          
          <tr>
       <td align="left" valign="top"  style="font-family: Arial, Helvetica, sans-serif; text-align:left; line-height:28px; color:#000; font-size:24px; font-weight: normal; font-smooth: always; text-align:center; vertical-align:middle; border-bottom:1px dashed #7f7f7f; border-top:1px dashed #7f7f7f; padding:10px 0;"><center>
<p>YOUR GEELAZA CODE: <span style="font-size:18px; color:#626262;">'.$c_code.'</span><br /><span style="font-size:18px;">Valid from: '.$s_valid.' to '.$e_valid.'</span></p>
</center></td>
          </tr>
          <tr>
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">                
                <tr>
                  <td   style="font-family: Arial, Helvetica, sans-serif; text-align:left; line-height:18px; color:#626262; font-size:15px; font-weight: normal; font-smooth:always; padding:15px 0;">
                  	<b>How To Redeem:</b><br /><br />
                    To Redeem, simply go to http://www.freedomcigarettes.com/geelaza-superdeal  and enter your full GeeLaza redemption code.
                   </td>
                </tr>
                <tr>
                	<td>
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%; margin:0 auto;">
                          <tr>
                            <td><img src="images/pdf_img/1.jpg" alt=""  /></td>
                            <td style="color:#00b0f0; font-size:12px; white-space:nowrap;">Copy voucher code</td>
                            <td><img src="images/pdf_img/2.jpg" alt="" /></td>
                            <td style="color:#00b0f0; font-size:12px; white-space:nowrap;">Enter code into the voucher field <br />  on the deal offerers website</td>                            
                            <td><img src="images/pdf_img/3.jpg" alt=""  /></td>
                            <td style="color:#00b0f0; font-size:12px;">Redeem and enjoy</td>
                          </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                  <td   style="font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:18px; color:#626262; font-size:15px; font-weight: normal; font-smooth:always; padding:15px 0;">
                    <b>Important Information:</b><br />
                    One per person.<br />
                    May buy multiples as gifts.<br />
                    Voucher valid for 2 months.<br />
                    Postage costs an additional &pound;3.99.<br />
                    Please allow 28 days for delivery after  redeeming your deal.</td>
                </tr>
            </table></td>
          </tr>         
          <tr>
            <td height="40" align="left" valign="middle" style="font-family: Arial, Helvetica, sans-serif; text-align:left; line-height:18px; color:#000; font-size:12px; font-weight: normal; font-smooth: always; border-bottom:1px dashed #7f7f7f; border-top:1px dashed #7f7f7f; padding:10px 0"><span style="color:#666666">Your GeeLaza deal is unique for you, it has a unique GeeLaza code. It is very important that you keep it safe. Your GeeLaza deal can be used once, so ensure that it is you who uses it. Treat your GeeLaza deals like you would treat your credit card, do NOT let anybody copy it.</span></td>
          </tr>          
          <tr>
            <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; text-align:left; line-height:18px; color:#000; font-size:13px; font-weight: normal; font-smooth: always;">&nbsp;</td>
          </tr>
            <tr>
            <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; text-align:left; line-height:18px; color:#000;  font-size:12px; font-weight: normal; font-smooth: always;"><p style="color:#666666"><b>Got any questions?</b><br />
             <span style="color:#666666">Email us: support@geelaza.com</span><br /><br />
               <span style="color:#666666;  font-size:10px;">Right to cancel</span><br />
              <span style="color:#666666;  font-size:9px;">Once you have received your voucher, you  may cancel the transaction at any time within 5 days from the day you purchased  the deal. If you want to cancel your voucher then go to our website www.geelaza.com  and scroll down until you see &ldquo;The GeeLaza Promise&rdquo; box on the right side of  your screen. Click on &ldquo;Claim refund&rdquo; and then submit your details to request a  refund.</span></p></td>
          </tr>
            <tr>
              <td align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; text-align:left; line-height:18px; color:#000; font-size:13px; font-weight: normal; font-smooth: always;">&nbsp;</td>
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