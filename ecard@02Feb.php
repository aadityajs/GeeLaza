<?php include("include/header.php");?>

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


<div id="container">
<div id="leftcol">
<div class="refund_box">
<div class="refund_top"></div>
<div class="refund_mid">
<div><p>Can I get a refund for my order?</p></div>
<div class="clear"></div>
<div class="text13">We do provide refund if you change your mind on a purchase within five days after you've purchase your
voucher and want to "return" the unused voucher. After that, we do not provide refunds expect that we
will provide a refund if you are unable to redeem a voucher because the merchant has gone out of business.</div>
<div class="clear"></div>

<?php
$flag = 0;
if (isset($_POST['submit'])) {

	/*$chk_for_email_sql = "SELECT * FROM ".TABLE_TEMP_PASSWORD;
	$chk_for_email_res = mysql_query($chk_for_email_sql);

	while ($chk_for_email_row = mysql_fetch_array($chk_for_email_res)) {

		if ($chk_for_email_row['email'] == $_POST['reset_email']) {
			$msg = 'You already have requested for pasword reset, please follow the required steps in the email sent to you.';
			$flag = 1;
		}
	}*/

	$email = $_POST['email'];
	$geecode = $_POST['geecode'];

	if($flag == 0)
		{
			if($email == '')
			{
				$msg = 'Please enter your email address.';
				$flag = 1;
			}
			else if (ValidateEmail($email) == FALSE)
			{
				$msg = 'Please enter a valid email address.';
				$flag = 1;
			}
		}

		if($flag == 0) {
			$sql_reset_select = "SELECT * FROM ".TABLE_USERS." WHERE email='$email'";
			$result_reset_select = mysql_query($sql_reset_select);
			$count_reset_select = mysql_num_rows($result_reset_select);

			if($count_reset_select >0)
			{
			$refund_req_sql = "INSERT INTO ".TABLE_REFUND_REQUEST." VALUES (null,'$email', '$geecode', 1)";
			mysql_query($refund_req_sql);
			$msg = 'Success';
			}
			else
			{
				$msg = 'Your refund claim was not submitted because: <br/>Email Address not found';
				$flag = 1;
			}
		}
}
?>

<form name="refund_req" id="refund_req" onsubmit="javascript:return ValidateRefund_ReqForm();" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div style="border:1px #CCCCCC solid; width: 676px; margin: 0 auto; float: none;">
  <table width="676" align="center" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg2">
       <tr>
         <td>
         <?php
		if($flag == 1)
		{
			?>
			<div style="width:100%; height:auto; background-color:transparent;padding-top:4px; padding-left:0px;">
			<label class="error"><?php echo $msg; ?></label>
			</div>

		<?php } ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="login_bg">
	<tr>
    <td><img src="images/spacer.gif" alt="" width="1" height="6"/></td>
    </tr>
    <tr>
    <td class="text_black"> <span><img src="images/spacer.gif" alt="" width="210" height="1" /></span><!-- <span>Required field <span class="red">(*)</span></span> --></td>
    </tr>

    <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
        <td>Email Address:</td>
      </tr>
      <tr>
        <td width="45%">
        <div id='email_errorloc' class="error"></div>
        <input type="text" name="email" id="email" value="" class="text_box12" />        </td>
      </tr>
      <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>
      <tr>
        <td>GeeLaza Code:</td>
      </tr>
      <tr>
        <td width="55%">
        <div id='geecode_errorloc' class="error"></div>
        <input type="text" name="geecode" id="geecode" value="" class="text_box12" />        </td>
      </tr>
       <tr><td><img src="images/spacer.gif" alt="" width="1" height="13"/></td></tr>

    </table></td>
    </tr>

    <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

      </table></td>
    </tr>
  </table>
  </td>
       </tr>
     </table>

  </td>
        <td width="39%" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">

   		  <td colspan="2" align="center" valign="middle" style="color:#000; font: bold 14px/18px Calibri, Arial, Helvetica, sans-serif;">&nbsp;</td>

      </tr>
          <tr>
            <td width="16%" align="center" valign="middle"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
            <td width="84%" align="left" valign="middle" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Claim within 5 days</td>
          </tr>
          <tr>
            <td align="center" valign="middle"><img src="images/green_thick.gif" alt="" width="23" height="18" /></td>
            <td align="left" valign="middle" style="color:#000; font: bold 14px/28px Calibri, Arial, Helvetica, sans-serif;">Voucher must be unused</td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="middle" style="padding: 10px 14px;">
            	<input type="submit" name="submit" id="submit" class="claim" value="">
            </td>
            </tr>

        </table></td>
      </tr>
   <tr>
     <td colspan="2">

    </td>
     </tr>
    </table>
  <div></div>
  </div>
  </form>

  <script type="text/javascript">
  function ValidateRefund_ReqForm() {
	var email = document.getElementById('email').value;
	var geecode = document.getElementById('geecode').value;
	if ( email == "" || geecode == "") {
		//alert ("asdasda");
		document.getElementById('email_errorloc').innerHTML = "This field is required";
		document.getElementById('email').style.border = "1px solid red";

		document.getElementById('geecode_errorloc').innerHTML = "This field is required";
		document.getElementById('geecode').style.border = "1px solid red";
	return false;
	}

  }

  </script>

</div>
<div class="refund_bot"></div>
</div>
</div>

<?php include ('include/sidebar-login.php'); ?>
</div>

<?php include("include/footer.php");?>