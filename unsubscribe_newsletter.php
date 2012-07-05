<?php include("include/header.php");?>
<?php
error_reporting(E_ERROR && E_STRICT);
?>

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

	if (isset($_POST['unsubButton']) && $_POST['unsubButton'] == "Unsubscribe now") {

			$sql_select = "SELECT * FROM ".TABLE_USERS." WHERE email= '$_GET[unsub_email]'";
			$result_select = mysql_fetch_array(mysql_query($sql_select));

			$user_id = $result_select['user_id'];
		$unsub_user_sql = "DELETE FROM ".TABLE_USER_SUBSCRIPTION." WHERE user_id = $user_id";
		//mysql_query($unsub_user_sql);
		header('location: '.SITE_URL.'unsubscribe_newsletter.php?unsub_succ=success');

	}

?>

<style>
	div#fancybox-wrap {
		width: auto !important ;
	}
</style>

<a id="various3" href="#unsub_succ"></a>
<div style="display: none;">
	<div id="unsub_succ" style=" background: white; padding: 30px; ">
		<h3>Unsubscribtion Successfull!</h3>
	</div>
</div>

<div id="container">

<div id="unsubscribe">
<div class="subs_top"></div>
<div class="subs_mid">

<div class="subs_left">
<div><h1>We're Sorry You Want to Leave</h1></div>
<div class="clear"></div>
<div><p>We're sorry that GeeLaza isn't working for you, and that you'd loke to leave. If you have a minute to spare, we can help you to get more of GeeLaza so that you receive the kind of deals suited for you.</p></div>
<div class="clear"></div>
<div style="margin: 0 0 0 90px;"><img src="images/sorry_img.jpg" alt="" width="192" height="213" border="0"/></div>
</div>

<div class="subs_right">
<div><h1>DONT LIKE THE DEALS  RECEIVING FROM US?</h1></div>
<div class="clear"></div>
<div><p>We try to offer a range of deals that we think all our members will enjoy, but if there's a deal you'd love to see in your inbox then emails us and we will try our best to get that deal featured.</p></div>
<div class="clear"></div>
<div style="border-bottom: 1px dashed #000000;"></div>
<div class="clear"></div>
<div><h1>STILL WANT TO UNSUBSCRIBE?</h1></div>
<div class="clear"></div>
<div><p>We're really sorry that you've decided to unsubscribe, and would like to thank you for using GeeLaza.</p></div>
<div class="clear"></div>
<form action="" method="post">
	<div><input type="submit" name="unsubButton" id="button" class="subscribe_btn" value="Unsubscribe now" /></div>
</form>
</div>

</div>
<div class="subs_bot"></div>
</div>
</div>


</div></div>
<div class="clear"><img src="images/spacer.gif" alt="" width="1" height="10" /></div>
<?php include ('include/footer.php'); ?>