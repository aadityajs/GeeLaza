<?php
ob_start();
session_start();
require("config.inc.php");
if(!isset($_REQUEST['msg'])){
$_REQUEST['msg']='';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Merchant Login Panel</title>
<link rel="stylesheet" type="text/css" href="siteadmin/style.css" />
<script type="text/javascript" src="siteadmin/js/jquery6.min.js"></script>
<script type="text/javascript" src="siteadmin/js/ddaccordion.js"></script>


<script type="text/javascript" src="siteadmin/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="siteadmin/js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="siteadmin/js/niceforms-default.css" />

</head>
<body>

<?php	
	if(isset($_POST['submit']))
	{	
		echo '<pre>'.print_r($_POST,true).'</pre>';
		exit;
		require("class/Database.class.php");
		$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);			
		$db->connect();
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$sql = "SELECT * FROM `".TABLE_USERS."` WHERE email='$username' and password='$password' and status=1 and reg_type='merchant'";
		
		$record = $db->query_first($sql);
		if($db->affected_rows > 0)
		{
			$_SESSION['muser_id']=$record['user_id'];
			$_SESSION['msg']="Welcome to merchant center";
			header("Location: ".SITE_URL."merchant_home");
			exit;
		}
		else
		{
		$_SESSION['errmsg']="Invalid login details";
			header("location:".SITE_URL."merchant_login");
			exit;
		}
	
	}
?>
<style>
.msghead{
width:600px; height:75px; margin:0px auto ;
}
</style>
<div id="main_container">

	<div class="header_login">
    <!--<div style="width:595px; margin: 12px auto; float: left; background:#09070D;"><a href="#"><img src="siteadmin/images/logo.png" alt="" title="" border="0" /></a></div>  -->  
    </div>
		<div class="msghead">
		<?php 
				if($_SESSION['errmsg']){
				echo '<div class="error_box" style="font-size:12px;">'.$_SESSION['errmsg'].'</div>' ;
				$_SESSION['errmsg']="";
				}if($_SESSION['msg']){
				echo '<div class="valid_box" style="font-size:12px;">'.$_SESSION['msg'].'</div>' ;
				$_SESSION['msg']="";
				}
				
				?>
		</div>	
         <div class="login_form">
         
         <h3>Merchant Login Panel</h3>
         
         <!--<a href="#" class="forgot_pass">Forgot password</a> -->
         
         <form action="" method="post" class="niceform2">
         
                <fieldset style="background:none;">
				
				<?php				
					if($_REQUEST['msg']=="err")
					{				
				?>		
						<div class="error_box">Invalid Username/Password</div>
						
				<?php
					}
				?>
					
                    <dl>
                        <dt style="text-align: right;"><label for="email">Username:</label></dt>
                        <dd><input type="text" name="username" id="username" size="54" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;"/></dd>
                    </dl>
                    <dl>
                        <dt style="text-align: right;"><label for="password">Password:</label></dt>
                        <dd><input type="password" name="password" id="password" size="54" style="border: 1px solid #CCCCCC; height: 25px; background:#ececec;"/></dd>
                    </dl>
                    
                   <!-- <dl>
                        <dt><label></label></dt>
                        <dd>
                    <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Remember me</label>
                        </dd>
                    </dl>-->
                    
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Log In" class="login_btn" style="padding-bottom: 5px;"/>
                     </dl>
                    
					 <dl>
                        <dt style="text-align: right;"><label for="password"></label></dt>
                        <dd><span style="padding:5px;">New User?    <a href="merchant_signup.php">Register Here</a></span>
						<span style="padding:5px;">Merchant Employee? <a href="merchant_employee_login.php">Login Here</a></span></dd>
                    </dl>
                </fieldset>
                
         </form>
         </div>
    
    <div class="footer_login">
    
    	
    
    </div>

</div>		
</body>
</html>