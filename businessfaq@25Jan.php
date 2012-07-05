<?php
include("include/header2.php");

if(strtolower($_POST["btnRegister"])=='sign_up')
{
	$dob = $_POST["year"].'-'.$_POST["month"].'-'.$_POST["day"];
	$_POST["dob"] = $dob;
	$_POST["reg_type"] = 'temp_merchant';
	$date = date('Y-m-d');
	
	$sql_insert_merchant = "INSERT INTO ".TABLE_USERS."(company_name,ccaddress1,cccity,cczip,ccstate,email,phone_no,password,dob,reg_type,date_added,website) VALUES('".$_POST["company_name"]."','".$_POST["ccaddress1"]."','".$_POST["cccity"]."','".$_POST["cczip"]."','".$_POST["ccstate"]."','".$_POST["email"]."','".$_POST["phone_no"]."','".$_POST["password"]."','".$_POST["dob"]."','".$_POST["reg_type"]."','".$date."','".$_POST["website"]."')";
	mysql_query($sql_insert_merchant);
	$GLOBALS["reg_msg"] = 'The merchant registration is successfull';
}

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
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>


<style type="text/css">		
.warning_box{width:622px;clear:both;background:url(images/warning.png) no-repeat left #fcfae9;
border:1px #e9e6c7 solid;background-position:15px 10px;padding:20px 20px 15px 60px;margin:0 0 10px 0;}

.valid_box{width:622px;clear:both;background:url(images/valid.png) no-repeat left #edfce9;
border:1px #cceac4 solid;background-position:15px 10px;padding:20px 20px 15px 60px;margin:0 0 10px 0;}

.error_box{width:522px;clear:both;background:url(images/error.png) no-repeat left #fce9e9;
border:1px #eac7c7 solid;background-position:15px 10px;padding:20px 20px 15px 60px;margin:0 0 10px 0;}		
</style>



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
<!--<div class="green_curv10"></div>-->
<div class="clear"></div>
<div class="green_curv30">
<div class="today_deal">
<div class="register_box1" style="width:100%;">

<h6 style="margin:0; background:#fff; padding:0 0 6px 15px; line-height:46px; font-size:28px;" >Do You Have Few Questions Before Joining Us?</h6>

<div class="geelaza_box">
    	<ul class="float_left" style="width:70%;">
            <li>* What is GeeLaza?</li>
            <li>* How much does it cost to be featured on GeeLaza?</li>
            <li>* How does GeeLaza make money?</li>
            <li>* How do I get paid?</li>
            <li>* When will I be featured?</li>
            <li>* Who does the deal write-up?</li>
            <li>* Can I get the mailing list from you so I can use  it later?</li>
          </ul>
        <ul class="float_left" style="width:30%;">
        	<li><img src="images/help_icon.png" alt="" /></li>
        </ul>
      <div class="clear"></div>
	</div>

<div class="content_box">
	<b>What is GeeLaza?</b><br />
	GeeLaza offers daily deals on handpicked experiences that can be shared with friends and families. Our company technique is pretty straightforward: we treat all our customers the way we like to be treated. Our fantastic customer service and imagination has made GeeLaza a fast-growing company in the daily deals service category. All deals that are featured on GeeLaza are best of their kind.
</div>

<div class="content_box">
	<b>How much does it cost to be featured on GeeLaza?</b><br />
	The GeeLaza model has been developed to be an alternative to traditional advertising. Whereas most marketing methods (e.g. TV commercial, Print, Email) require upfront payment without providing any guarantee that your campaign will be successful, GeeLaza costs you nothing out-of-pocket.
</div>
<div class="content_box">
	<b>How does GeeLaza make money?</b><br />
	Very simple, we only make money if you do. When you work with GeeLaza, you’re investing only in the customers GeeLaza actually brings in. We keep a portion of the revenue from each GeeLaza sold and send you the rest.
</div>
<div class="content_box">
	<b>How do I get paid?</b><br />
	GeeLaza collects customer payment for you, distributes GeeLaza vouchers to those customers, and sends you a cheque.
</div>
<div class="content_box">
	<b>When will I be featured?</b><br />
	GeeLaza reserves the right to feature anything in our deal-line at anytime, just in case there are time-sensitive deals that come to our attention at the last minute. We use a various tools and techniques to determine the best placement for each feature, in order to make sure that the deal reaches maximum success. To make sure you have time to prepare your business and that all questions have been answered, we always contact you before we feature your business.
</div>
<div class="content_box">
	<b>Who does the deal write-up?</b><br />
	We take care of all the copy, and usually incorporate existing reviews from other blogs, websites, magazines, or newspapers. We do this to ensure that every GeeLaza deal is exciting, unique and unbeatable. This style of ours is very well known by our subscribers. It’s why most of our read our write-ups of the offer. That said, if there is some specific or unusual point you would like to include, you are more than welcome to suggest it to us.
</div>
<div class="content_box">
	<b>Can I get the mailing list from you so I can use it later?</b><br />
	We can’t give you our mailing for several reasons but most importantly our privacy policy restricts us from sharing our email list with third parties.
</div>

 <div class="main_box" style="width:660px; margin:20px auto 0 auto;">
	<span class="float_left" style="font:normal 12px/52px Arial, Helvetica, sans-serif; margin-right:8px; color:#00a2e8;"><b>Back Up</b> <img src="images/arrow_back.png" alt="" /></span>    
    <span class="float_right"><img src="images/apply_now.png" alt="" /></span>
    <span class="float_right" style="font:normal 12px/52px Arial, Helvetica, sans-serif; margin-right:8px;">Take one step beyond traditional marketing!</span>
 <div class="clear"></div>
</div>
<div class="clear"></div>
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

<!--<span class="black_text" style="color:#3A3B3D;">Do you have an account on Facebook? Use it to sign into GeeLaza</span>
<?php if ($cookie) { ?>
<fb:login-button perms="email" autologoutlink="true" onlogin="window.location.reload()"></fb:login-button>
<?php unset($_SESSION['fbuser']); ?> 
<?php } else { ?>
<fb:login-button perms="email" autologoutlink="true">Connect</fb:login-button> 
<?php } ?>
-->
<br/><br/>
</div>
</div>
<!--<div class="green_curv20"></div>-->
</div>
</div>
<?php include ('include/sidebar-login2.php'); ?>
</div>
<?php include("include/footer.php");?>
