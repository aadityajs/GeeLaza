<?php 
error_reporting(E_ERROR && E_STRICT);
include("include/header.php");
require_once 'CallerService.php';
session_start();
ob_start();

?>
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
			
			$giftEmailTemplate = '
			
			<h2>Hey '.$_SESSION['gift_name'].'</h2>
			
			<p><img height="100" width="100" alt="" src="'.SITE_URL.'images/Giftbox.png" align="left">You have received a gift</p>
			<p>'.$_SESSION['gift_msg'].'</p>
			<p>Your gift coupon code is - '.$coupon_code.'</p>
			';
			
			echo $giftEmailTemplate;
			
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
				
				echo $sql_trnsaction = "INSERT INTO ".TABLE_TRANSACTION." (tran_id,deal_id,transaction_status,amount,qty,transaction_date,user_id,withdraw_status,transaction_id,coupon_code) 
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
