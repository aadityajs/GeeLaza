<?php
include("include/header.php");
include("plugin/mpdf/mpdf.php");
session_start();
$mpdf=new mPDF();
$user_id = $_SESSION["user_id"];
?>

<?php if($_GET['usucc'] != "") {  ?>
<div class="register_Main">
<div style="float:left; width:9px; height:49px; margin:0 0 0 0px;"><img src="images/g_left.png" alt="" width="9" height="49" border="0"/></div>
<div class="register_bg">
<h6 style="font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; padding: 10px; color: #333333; font-size: 14px;">
<span  id="close"><img src="images/closed.gif" width="15" height="13" align="right" style=" margin:0 -10px 0 0;" border="0"/></span>
<?php echo $_GET['usucc']; ?>
</h6>
</div>
<div style="float:left; width:9px; height:49px; margin:0 0 0 0;"><img src="images/g_right.png" alt="" width="9" height="49" border="0"/></div>
</div>
<?php } ?>
<script>
$("span#close").click(function() {
	$("div.register_Main").slideUp(300);

});
</script>


<div id="container">
<div id="leftcol">
<div class="deal_info">
<div class="top_about">
<p style="font-family: Candara; font-size: 28px; font-weight: bold; color: #333333;">My Account</p>
</div>
<div class="clear"></div>
<div class="midbg">
<div class="today_deal">

<div class="clear"></div>
<?php

	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnProfile"]=='Submit')
	{

		$user_id = $_SESSION["user_id"];
		$location_id = $_POST["location"];
		$cat_id = $_POST["category"];

		if($location_id == '' and $cat_id == '')
		{
			$msg = 'No field selected. Please select a field';
			$flag=1;
		}

		if($flag != 1)
		{
			if($location_id != '')
			{
				$sql_profile_select_city = "SELECT * FROM ".TABLE_USER_SUBSCRIPTION." WHERE user_id=".$user_id." and city_id=".$location_id;
				$result_profile_select_city = mysql_query($sql_profile_select_city);
				$count_profile_select_city = mysql_num_rows($result_profile_select_city);

				if($count_profile_select_city > 0)
				{
					$msg = 'Selected city already exists';
					$flag=1;
				}
			}

			if($flag != 1)
			{
				if($cat_id != '')
				{
					$sql_profile_select_cat = "SELECT * FROM ".TABLE_USER_PREFERENCE." WHERE user_id=".$user_id." and category_id=".$cat_id;
					$result_profile_select_cat = mysql_query($sql_profile_select_cat);
					$count_profile_select_cat = mysql_num_rows($result_profile_select_cat);

					if($count_profile_select_cat > 0)
					{
						$msg = 'Selected category already exists';
						$flag=1;
					}
				}

			}
		}

		if($flag != 1)
		{
			if($location_id != '')
			{
				$sql_profile_insert_city = "INSERT INTO ".TABLE_USER_SUBSCRIPTION."(user_id,city_id) VALUES("."'".$user_id."',"."'".$location_id."'".")";
				mysql_query($sql_profile_insert_city);
			}

			if($cat_id != '')
			{
				$sql_profile_insert_cat = "INSERT INTO ".TABLE_USER_PREFERENCE."(user_id,category_id) VALUES("."'".$user_id."',"."'".$cat_id."'".")";
				mysql_query($sql_profile_insert_cat);
			}


			$msg= 'Profile successfully updated';
			$flag=2;
		}


	}



?>
<style type="text/css" >

/*
Old Left tab My account design's .here class
.here{
	font: bold 12px/29px Arial, Helvetica, sans-serif;
	color: #fff;
	float: left;
	text-align: center;
	margin: 4px 0px 4px 0;
	border: 1px solid #d6d6d6;
	background: url(../images/tab_hover.gif) left top repeat-x;
	outline: none;
	width: 100px;
	padding: 0 20px;
	height: 29px;
}*/

</style>
	<script type="text/javascript" language="javascript">
	<!--
		function show_tab(ID)
		{
			for(i=1; i<=6; i++)
			{
				document.getElementById("myaccount_"+i).style.display = "none";
				/*document.getElementById("tab_"+i).style.backgroundPosition = "";
				document.getElementById("stab_"+i).style.backgroundPosition = "";
				document.getElementById("stab_"+i).style.color = "";
				document.getElementById("tab_"+i).style.color = "";*/
				$('#tab_'+i).removeClass('here');
				/*if (i == 2) {
					document.getElementById("myaccount_"+i+"_b").style.display = "none";
					}*/

			}
			document.getElementById("myaccount_"+ID).style.display = "block";
			/*document.getElementById("tab_"+ID).style.backgroundPosition = "0% -29px";
			document.getElementById("stab_"+ID).style.backgroundPosition = "100% -29px";
			document.getElementById("tab_"+ID).style.color = "#000";
			document.getElementById("stab_"+ID).style.color = "#000";*/

			$('#tab_'+ID).addClass('here');

			/*if (ID == 2) {
				document.getElementById("myaccount_"+ID+"_b").style.display = "block";
				}*/

		}

		//-->
	</script>

<script type="text/javascript">

	function editFields(linkElem){
		var parent=$(linkElem).parents('table');
		var parentId=parent.attr('id');
		parent.hide();
		$('#'+parentId+'Form').show();
		}


	function cancelFields(linkElem){var parent=$(linkElem).parents('form');var parentId=parent.attr('id');var tableTextId=parentId.substring(0,parentId.length-4);parent.hide();$('#'+tableTextId).show();var textFields=parent.find('input[type="text"]');textFields.each(function(i){var span=$('span[id="'+$(this).attr('name')+'"]');if(span.size()==1){var value=span.text();$(this).val(value);}});if($('#editGenderField').size()==1){var name=$('#editGenderField').attr('name');$('#editGenderField').val($('span[id="'+name+'"]').attr('class'));}
	if($('#jRegisterBirthdayDay').size()==1){var spanBirth=$('#birthday');$('select[name="birthDay"]').val(spanBirth.text().substring(0,2));$('select[name="birthMonth"]').val(spanBirth.attr('class'));$('select[name="birthYear"]').val(spanBirth.text().substring(6));}
	clearPwdFields(parent);clearErrors(true);}

</script>


<div style="width:685px; float: left; margin: 0  0 0 8px;">

   	<div class="tabs">
		<a href="javascript: show_tab(1);" id="tab_1">My Vouchers</a>
		<a href="javascript: show_tab(6);" id="tab_6">Purchase History</a>
		<a href="javascript: show_tab(2);" id="tab_2">Credits</a>
		<a href="javascript: show_tab(4);" id="tab_4">Royal Points</a>
		<a href="javascript: show_tab(5);" id="tab_5">Subscriptions</a>
		<a href="javascript: show_tab(3);" id="tab_3">Account</a>
    </div>

    <!--<div class="TabbedPanels">
      <ul>
        <li><a href="javascript: show_tab(1);" id="tab_1">My Order</a></li>
        <li><a href="javascript: show_tab(2);" id="tab_2">My Credit</a></li>
        <li><a href="javascript: show_tab(3);" id="tab_3">General</a></li>
        <li><a href="javascript: show_tab(4);" id="tab_4">Security</a></li>
        <li><a href="javascript: show_tab(5);" id="tab_5">Subscriptions</a></li>
       </ul>
	 </div>-->

    <div class="TabbedPanels1" id="myaccount_1">
		<div class="title">My Vouchers</div>
	<?php
		$sql_orders = "SELECT * FROM ".TABLE_TRANSACTION." WHERE user_id = $_SESSION[user_id]";
		$orders_res = mysql_query($sql_orders);
		$orders_num = mysql_num_rows($orders_res);

		if ($orders_num <= 0) {
	?>
		<p style="font-family: Candara; font-size: 16px;">You haven&rsquo;t bought a deal yet.</p>
		<p style="font-family: Candara; font-size: 12px;">You haven&rsquo;t made any purchases yet or all of your deals have  been used, redeemed, or given as gifts. To see a full record of all the  vouchers you've used or gifted in the past, visit your&nbsp;<a href="<?php echo SITE_URL; ?>customer-account.php?tab=purchase">Purchase History</a>.</p>
	<?php
		}
		else {

		//var_dump($_SESSION);
		$count = 0;

		while ($orders_row = mysql_fetch_array($orders_res)) {
			$deal_details = get_deal_details($orders_row['deal_id']);
			$pur_date = $orders_row["transaction_date"];
			$pur_date_formated = strftime("%d %B %Y", strtotime($pur_date));

			$start_date = reset(explode(" ",$deal_details["deal_start_time"]));
			$end_date = reset(explode(" ",$deal_details["deal_end_time"]));
			//$end_date_formated = strftime("%d %B %Y", strtotime($end_date));

			$start_date_formated = strftime("%d/%m/%Y",strtotime($start_date));
			$end_date_formated = strftime("%d/%m/%Y",strtotime($end_date));

			$sql_deal_image = "SELECT * FROM ".TABLE_DEAL_IMAGES." WHERE deal_id = ".$orders_row['deal_id'];
			$deal_image = mysql_fetch_array(mysql_query($sql_deal_image));


			$count++;

	?>
	<!-- loop start -->
		<div class="product_main">
         <table width="100%" border="0" cellspacing="0" cellpadding="0" class="transactions_box3">
          <tr>
            <th style="width:150px;">Deal Number</th>
            <th style="width:100px;">Geelaza Code</th>
            <th style="width:280px;">How to get your deal</th>
            <th style="width:150px;">Deal Status</th>
          </tr>
           <tr>
            <td style="width:150px;"><?php echo $count; ?></td>
            <td style="width:100px;"><?php echo $orders_row['coupon_code']; ?></td>
            <td style="width:280px; line-height:15px;">Click on the link to open your vouchar<br /><img src="images/pdf_icon.gif" alt="" />
			<a href="<?php echo SITE_URL; ?>pdf.php?deal_title=<?php echo $deal_details['title']; ?>&c_code=<?php echo $orders_row['coupon_code']; ?>&price=<?php echo $orders_row['amount']; ?>&e_valid=<?php echo $end_date_formated; ?>&s_valid=<?php echo $start_date_formated; ?>&img=<?php echo UPLOAD_PATH.$deal_image['file']; ?>" target="_new" onclick="">
			Your Geelaza deal
			</a></td>
            <td style="width:150px;"><?php echo ucfirst($orders_row['transaction_status']); ?></td>
          </tr>
          </table>

          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="product_box">
              <tr>
                <td width="180"><img src="<?php echo UPLOAD_PATH.$deal_image['file']; ?>" alt="" class="product_img"/></td>
                <td width="220">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="product_box2">
                      <tr>
                        <td colspan="2" class="font12"><strong>Date of Purchase: <?php echo $pur_date_formated; ?></strong></td>
                        </tr>
                      <tr>
                        <td><strong>Price:</strong></td>
                        <td>&pound;<?php echo $orders_row['amount']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Quantiry:</strong></td>
                        <td><?php echo $orders_row['qty']; ?> x</td>
                      </tr>
                      <tr>
                        <td><strong>Value:</strong></td>
                        <td>&pound;<?php echo $deal_details['full_price']; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Discount:</strong></td>
                        <td><?php echo intval($deal_details['discounted_price']*100/$deal_details['full_price']); ?>%</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                </td>
                <td>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="product_box3">
                      <tr>
                        <td  class="font12"><strong>Valid From: <?php echo $start_date_formated; ?></strong></td>
                        <td  class="font12"><strong>Valid until: <?php echo $end_date_formated; ?></strong></td>
                      </tr>
                      <tr>
                        <td colspan="2" style="padding: 8px 0 0 0;"><strong><a href="<?php echo SITE_URL; ?>index.php?action=view&id=<?php echo $orders_row['deal_id']; ?>"><?php echo $deal_details['title']; ?></a></strong></td>
                      </tr>
                      <tr class="savings">
                        <td><strong>Total Savings:</strong></td>
                       <td><strong>&pound;<?php echo floatval($deal_details['full_price'] - $deal_details['discounted_price']); ?></strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                </td>
              </tr>
            </table>
       </div>
	   <!-- loop ends -->
<?php
		} // End while
		}	// End else
?>

    </div>	<!-- 1 ends here  -->

	<div class="TabbedPanels1" id="myaccount_2" style="display:none;">
	   <div style="width:99%;" class="title07">
		 <span>Credit</span>
		 <span class="float_right" style="font: normal 12px/19px Arial, Helvetica, sans-serif; margin: 10px 0 0px 0;">You have no credit on your account</span>
		<div class="clear"></div>
	  </div>
     <!-- <div style="float:right; height:29px; margin:-26px 0 0 0; padding:0px; width:150px; text-align:center; font: bold 12px/29px Candara, Arial, Helvetica, sans-serif;  background: url(images/tab_bg1.gif) left top repeat-x;">
		  Credits: &pound;10
		</div>-->
		<!--<p><b>You have no credit on your account</b></p>-->

		<div class="today_deal" style="width:660px; margin: 0 auto; padding:0px;">

<h6 style="margin:0; background:#fbfbfb; padding:0 0 6px 0; line-height:46px; font-size:25px; height:auto; white-space:normal;">Recommend us and we will top up your credit</h6>
 <div class="content_box3">
    Why not surprise your friends with unbeatable deals in your city while earning easy cash at the same time?
    We love our customers so therefore we will reward you 5 worth of credit for every new customer you bring our way (see details below)
</div>

<div class="heading_txt2">This is how it works:</div>
<p class="center_align">
	<img src="images/recomand.jpg" alt=""/>
</p>

<div class="content_box2" style="width:660px; border:1px solid #edeced; margin:0px; background:none; padding-top:10px;">
	<h1 style="width:100%; text-align:center;">Get going and invite your friends</h1>
	<ul style="width: 180px; float: none; margin: 0 auto;">
    	<li>
        	<a href="<?php echo SITE_URL; ?>customer-register.php"><img src="images/recomandedus07.png" alt=""/></a>
        </li>
        <!--<li>
        	<b style="font-size:12px;">Log in and receive your recommendation link.</b> <br />You dont have an account yet? <a href="#" style="text-decoration:underline;">Sign up here</a></li>-->
    </ul>
    <ul style="width:48%; float:right;">
       <!-- <li style="padding:15px 0;">
        	<a href="<?php echo SITE_URL; ?>customer-login.php"><img src="images/btn_02.gif" alt=""/></a>
        </li>-->
    	<!--<li>
        	<b style="font-size:12px;">Pass on your personal link </b> <br /> You can pass on the link via e-mail or on your Website, Facebook or by any other means necessary.
        </li>-->
    </ul>
  <div class="clear"></div>
 </div>

<h1 style="width:100%; padding:15px 0; text-align:left; font-family: Candara, Arial, Helvetica, sans-serif; font-size: 21px; color:#444540;">OK, but how does GeeLaza credits work?</h1>

 <div class="content_box2" style="margin:0px; width:660px; background:none; padding:10px 0;">
        	<b style="text-align:left; font-family: Candara, Arial, Helvetica, sans-serif; font-size: 14px; color:#444540;"> Why recommend deals?</b><br /> Recommending deals has many benefits but most importantly, we will credited you with 5.00 which means you can get your next deal at even greater discounted price. The main reason we like our users to recommend deals is because we feel god to know that all people who are interested in buying our deals are aware of the deal. Help your friends, families etc. to save money on great deals too!
</div>

 <div class="content_box2" style="margin:0px; width:660px; background:none; padding:10px 0;">
        	<b style="text-align:left; font-family: Candara, Arial, Helvetica, sans-serif; font-size: 14px; color:#444540;"> How can I recommend GeeLaza to my friends who havent heard of GeeLaza?</b><br /> We provide our users with easy recommendation facilities to allow them to tell friends without doing much. Every deal that we feature on GeeLaza are assigned with a special link which you can send to your friends using Facebook, Twitter or Email.<br /><br /> Whoever you recommend us to, have 48 hours to create an account and but any deal above 15 for the first time. If 48 hours runs out and they havent created an account then we cannot give you the credit.
</div>
<div class="content_box2" style="margin:0px; width:660px;  background:none; padding:10px 0;">
<b style="font-size:13px; text-align:left; font-family: Candara, Arial, Helvetica, sans-serif; font-size: 14px; color:#444540;">How long is my account credit valid until?</b><br /> You have 3 months to use your credit. After the 3 months your unused credit will be no longer be valid to use.
</div>

<div class="content_box2" style="margin:0px; width:660px;  background:none; padding:10px 0;">
<b style="font-size:13px; text-align:left; font-family: Candara, Arial, Helvetica, sans-serif; font-size: 14px; color:#444540;">How can I spend my credits?</b><br /> You can use your credit on any deal you want. You will have to redeem your credit on the payment page otherwise the credit will not be rewarded towards your deal price. If you have recommended us to many people then there may be situation where your account credit is more than the deal price so in this case, whatever is left over can be used on your deal unless it has expired.
</div>

</div>

    </div><!-- 2 ends here  -->


	<div class="TabbedPanels1" id="myaccount_3" style="display:none;">
		 <div class="title">Account


				<?php //if($succ_msg != "") {

				?>

				<!-- <label style="color: #191919; font: bold 18px/22px Arial, Helvetica, sans-serif; margin-left: 50px;">
				<img src="images/tick_mark.gif" align="top" style=" float:left; margin:0 5px 0 0;"><?php echo $succ_msg?>
				</label> -->
				<?php //}	?>
		</div>

		<?php
//
			$sql_user = "SELECT * FROM ".TABLE_USERS." WHERE user_id=".$user_id;
			$result_user = mysql_query($sql_user);
			$row_user = mysql_fetch_array($result_user);

			//var_dump($row_user);

			$title = trim($row_user["title"]);
			$fname = trim($row_user["first_name"]);
			$lname = trim($row_user["last_name"]);

			$add1 = $row_user["address1"];
			$add2 = $row_user["address2"];
			$city = $row_user["city"];
			$postcode = $row_user["zip"];
			$phno = $row_user["phone_no"];
			$dob = $row_user["dob"];

			$dob_formated = strftime("%d %B %Y", strtotime($dob));


			$email = $row_user["email"];

			$current_password = $row_user["password"];

			//$image = $row_user["user_img"];

		?>

		<table class="account_table" id="name">
			<tr>
			<td width="160"><strong>Name</strong></td>
			<td width="160"> <?php echo $title.' '.$fname.' '.$lname; ?></td>
			<td class="right_align"><a onclick="editFields(this); return false;" href=""><!--Edit--></a></td>
			</tr>
		</table>
		<?php

			//$flag = 0;
			//$msg ='';
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnNameUpdate"]=='Save')
	{
		//$image = $_FILES["image"]["name"];

		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$email = $_POST["email"];
		$npassword = $_POST["password"];

		if($fname == '')
		{
			$err_msg = 'Please enter first name';
			$flag = 1;
		}
		if($lname == '')
		{
			$err_msg = 'Please enter last name';
			$flag = 1;
		}
		if($npassword == '')
		{
			$err_msg = 'Please enter password';
			$flag = 1;
		}


		/*if($flag == 0)
		{
			if($fname == '')
			{
				$msg = 'Please enter first name';
				$flag=1;
			}
		}

		if($flag == 0)
		{
			if($lname == '')
			{
				$msg = 'Please enter last name';
				$flag=1;
			}
		}

		if($flag == 0)
		{
			if($npassword == '')
			{
				$msg = 'Please enter password';
				$flag=1;
			}
		}*/

		//if($flag != 1 && $current_password == base64_encode($npassword)) {
				$sql_name_update = "UPDATE ".TABLE_USERS." SET first_name='".$fname."', last_name='".$lname."' WHERE user_id=".$user_id;
				mysql_query($sql_name_update);
				$succ_msg = 'Customer updated successfully';

				//$flag =2;
		//}


	}

		?>
		<form name="frmname" id="nameForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" style="display:none;">
			<input type="hidden" name="tab_no" value="3">

			<table width="450" border="0" cellspacing="0" cellpadding="0" class="white_box">
    <tr>
      <td>

   <!-- <?php
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnNameUpdate"]=='Save' && $flag!=0) {
		?>
			<div style="height: 25px; width: auto; margin: 10px; padding: 5px; border: 1px dashed <?php if ($flag == 1) {echo "red";} else {echo "green"; } ?>;">
				<?php if($msg != "") { ?>
				<label style="color: #CC0000; font-weight: bold;"><?=$msg?></label>
				<?php } ?>
				<?php if($succ_msg != "") { ?>
				<label style="color: #006600; font-weight: bold;"><?=$succ_msg?></label>
				<?php }	?>
			</div>
		<?php }	?> -->

     <table width="450" border="0" align="left" cellpadding="3" cellspacing="3" class="form_box">
          <!--<tr>
            <td width="450"><p>Note: Name can only be change every 6 months!</p></td>
          </tr>-->
          <tr>
            <td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>Current Full Name </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="text" name="cfname" id="cfname" value="<?php echo $title.' '.$fname.' '.$lname; ?>" class="text_box12"/><span><br />Notice:</span> <span style="font-family: Arial; font-weight: lighter; font-size: 12px; color: #000;">Name can only be changed every six months.</span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="40%">First name</td>
                    <td width="60%">Last name</td>
                  </tr>
                </table></td>
                </tr>
				<tr>
                <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="40%"><input type="text" name="fname" id="fname" value="<?php if(isset($_POST["btnNameUpdate"])) { echo $_POST["fname"];}else{ echo $fname;} ?>" class="text_box11"/></td>
                    <td width="60%"><input type="text" name="lname" id="lname" value="<?php if(isset($_POST["btnNameUpdate"])) { echo $_POST["lname"];}else{ echo $lname;} ?>" class="text_box11"/></td>
                  </tr>
                </table></td>
                </tr>

              <!--<tr>
                <td>Last name </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="text" name="lname" id="lname" value="<?php if(isset($_POST["btnNameUpdate"])) { echo $_POST["lname"];}else{ echo $lname;} ?>" class="text_box12"/></td>
                <td>&nbsp;</td>
              </tr>-->
            </table>

			</td>
          </tr>

          <tr>
            <td><!-- To save these new settings, please enter your GeeLaza password --></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>Password</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="password" name="password" class="text_box11"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="btnNameUpdate" class="save_btn_small" value="Save"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="cancel" class="cancel_btn" value="Cancel" onclick="cancelFields(this); return false;"/></td>
                <td></td></tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <!--<tr>
            <td><table width="300" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td><input type="submit" name="btnNameUpdate" class="save_btn_small" value="Save"/></td>
                <td><input type="button" name="cancel" class="cancel_btn" value="Cancel" onclick="cancelFields(this); return false;"/></td>
              </tr>
            </table></td>
          </tr>-->
      </table></td>
    </tr>
  </table>
		</form>


		<table class="account_table" id="dob">
			<tr>
			<td width="160"><strong>Date of Birth</strong></td>
			<td width="160"> <?php echo $dob_formated; ?></td>
			<td class="right_align">&nbsp;</td>
			</tr>
		</table>



	<!-- <table class="myaccount" id="address">
			<tr>
				<td style="float:left; width: 100px; margin: 0 auto;"><p style="font-family: Helvetica; font-size: 9px; font-weight: bold; color: #000;">Address</p></td>
				<td style="float:left; width: 170px; margin: 0 auto;"><p style="font-family: Helvetica; font-size: 9px; color: #000;"><?php echo $add1.', '.$add2; ?>, <strong><?php echo $city; ?>, <?php echo $postcode; ?></strong></p></td>
				<td style="float:right; width: 30px; margin: 0 30px;"><p><a onclick="editFields(this); return false;" href="">Edit</a></p></td>
			</tr>
		</table>  -->

		<?php


	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnAddressUpdate"]=='Save')
	{
		$flag = 0;
		$msg ='';

		//$image = $_FILES["image"]["name"];

		$add1 = $_POST["add1"];
		$add2 = $_POST["add2"];
		$city = $_POST["city"];
		$postcode = $_POST["postcode"];
		//$phno = $_POST["phno"];

		$apassword = $_POST["password"];

		//$rpassword = $_POST["rpassword"];

			if($add1 == '')
			{
				$err_msg = 'Please enter street address';
				$flag=1;
			}
			if($add2 == '')
			{
				$err_msg = 'Please enter street address 2';
				$flag=1;
			}
			if($city == '')
			{
				$err_msg = 'Please enter city';
				$flag=1;
			}
			if($postcode == '')
			{
				$err_msg = 'Please enter postcode';
				$flag=1;
			}
			/*if($phno == '')
			{
				$err_msg = 'Please enter phone number';
				$flag=1;
			}
			elseif ( !is_numeric($phno)) {
				$err_msg = 'Please enter numeric digit in phone number';
				$flag=1;
			}*/


			if($apassword == '')
			{
				$err_msg = 'Please enter password';
				$flag=1;
			}




		if($flag != 1 && $current_password == base64_encode($apassword)) {


				$sql_address_update = "UPDATE ".TABLE_USERS." SET address1='".$add1."', address2='".$add2."', city='".$city."', zip='".$postcode."' WHERE user_id=".$user_id;
				mysql_query($sql_address_update);
				$succ_msg = 'Address successfully updated';
				//$flag =2;

		}


	}

		?>

		<form name="frmaddress" id="addressForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" style="display:none;">

	<table width="450" border="0" cellspacing="0" cellpadding="0" class="white_box form_box">
   	 <tr>
      <td>

    <!--  <?php
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnAddressUpdate"]=='Save') {
		?>
			<div style="height: 25px; width: auto; margin: 10px; padding: 5px; border: 1px dashed <?php if ($flag == 1) {echo "red";} else {echo "green"; } ?>;">
				<?php if($flag==1) { ?>
				<label style="color: #CC0000; font-weight: bold;"><?=$msg?></label>
				<?php } ?>
				<?php if($flag==2) { ?>
				<label style="color: #006600; font-weight: bold;"><?=$msg?></label>
				<?php }	?>
			</div>
		<?php }	?>    -->

  <table width="450" border="0" align="left" cellpadding="3" cellspacing="3">

          <tr>
            <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="200">Address Line 1</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="text" name="add1" id="add1" value="<?php if(isset($_POST["btnAddressUpdate"])) { echo $_POST["add1"];}else{ echo $add1;} ?>" class="text_box12"/></td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td>Address Line 2</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="text" name="add2" id="add2" value="<?php if(isset($_POST["btnAddressUpdate"])) { echo $_POST["add2"];}else{ echo $add2;} ?>" class="text_box12"/></td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="40%">City:</td>
                    <td width="60%">Postcode:</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="city" id="city" value="<?php if(isset($_POST["btnAddressUpdate"])) { echo $_POST["city"];}else{ echo $city;} ?>" class="text_box11"/></td>
                    <td><input type="text" name="postcode" id="postcode" value="<?php if(isset($_POST["btnAddressUpdate"])) { echo $_POST["postcode"];}else{ echo $postcode;} ?>" class="text_box11"/></td>
                  </tr>
                </table></td>
              </tr>

           <!--     <tr>
                <td width="51%">Postcode</td>
                <td width="49%">&nbsp;</td>
              </tr>
              <tr>
                <td><input type="text" name="postcode" id="postcode" value="<?php if(isset($_POST["btnAddressUpdate"])) { echo $_POST["postcode"];}else{ echo $postcode;} ?>" class="text_box11"/></td>
                <td>&nbsp;</td>
              </tr>

             <tr>
                <td width="51%">Phone No.:</td>
                <td width="49%">&nbsp;</td>
              </tr>
              <tr>
                <td><input type="text" name="phno" id="phno" value="<?php if(isset($_POST["btnAddressUpdate"])) { echo $_POST["phno"];}else{ echo $phno;} ?>" class="text_box12"/></td>
                <td>&nbsp;</td>
              </tr> -->
            </table>
            </td>
          </tr>

          <tr>
            <td><!-- To save these new settings, please enter your GeeLaza password --></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>Password</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="password" name="password" class="text_box11"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="submit" name="btnAddressUpdate" class="save_btn_small" value="Save"/>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="cancel" class="cancel_btn" value="Cancel" onclick="cancelFields(this); return false;"/></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="300" border="0" align="left" cellpadding="0" cellspacing="0">
             <!-- <tr>
                <td><input type="submit" name="btnAddressUpdate" class="save_btn_small" value="Save"/></td>
                <td><input type="button" name="cancel" class="cancel_btn" value="Cancel" onclick="cancelFields(this); return false;"/></td>
              </tr> -->
           </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
		</form>


		<table class="account_table" id="email">
			<tr>
				<td width="160"><strong>Email</strong></td>
				<td width="160"> <?php echo $email; ?></td>
				<td class="right_align"><a onclick="editFields(this); return false;" href="">Edit</a></td>
			</tr>
		</table>
				<?php


	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnEmailUpdate"]=='Save')
	{
		$flag = 0;
		$err_msg ='';

		//$image = $_FILES["image"]["name"];

		$email = $_POST["nemail"];

		$epassword = $_POST["password"];

		//$rpassword = $_POST["rpassword"];

			if($email == '')
			{
				$err_msg = 'Please enter email address';
				$flag=1;
			}
			/*if($epassword == '')
			{
				$err_msg = 'Please enter password';
				$flag=1;
			}*/



		if($flag != 1) {	// && $current_password == base64_encode($epassword)


				$sql_email_update = "UPDATE ".TABLE_USERS." SET email='".$email."' WHERE user_id=".$user_id;
				mysql_query($sql_email_update);
				$succ_msg = 'Email address changes has been saved.';
				//$flag =2;

		}


	}

		?>

		<form name="frmemail" id="emailForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" style="display:none;">
			<input type="hidden" name="tab_no" value="3">
     	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit_table">
   	 <tr>
      <td>

      <!-- <?php
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnEmailUpdate"]=='Save') {
		?>
			<div style="height: 25px; width: auto; margin: 10px; padding: 5px; border: 1px dashed <?php if ($flag == 1) {echo "red";} else {echo "green"; } ?>;">
				<?php if($flag==1) { ?>
				<label style="color: #CC0000; font-weight: bold;"><?=$msg?></label>
				<?php } ?>
				<?php if($flag==2) { ?>
				<label style="color: #006600; font-weight: bold;"><?=$msg?></label>
				<?php }	?>
			</div>
		<?php }	?> -->

     <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">

          <tr>
            <td>
            <div class="error"><?php if ($flag == 1) echo $err_msg; ?></div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="51%">Current Email </td>
              </tr>
              <tr>
                <td><input type="text" name="email" id="email" disabled="disabled" readonly="readonly" value="<?php if(isset($_POST["btnEmailUpdate"])) { echo $_POST["email"];}else{ echo $email;} ?>" class="edit_txtbox edit_360px"/></td>
              </tr>
              <tr>
                <td width="49%">New Email</td>
              </tr>
              <tr>
                <td><input type="text" name="nemail" id="nemail" value="<?php if(isset($_POST["btnEmailUpdate"])) { echo $_POST["nemail"];}else{ echo $nemail;} ?>" class="edit_txtbox edit_360px"/></td>
              </tr>
            </table>
            </td>
          </tr>


          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <!--<tr>
                <td>Password</td>
                <td>&nbsp;</td>
              </tr>-->
              <tr>
               <td> <!-- <input type="password" name="password" class="text_box11"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                  <input type="submit" name="btnEmailUpdate" class="save_btn_small" value="Save"/>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="cancel" class="cancel_btn" value="Cancel" onclick="cancelFields(this); return false;"/></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="300" border="0" align="left" cellpadding="0" cellspacing="0">
           <!--   <tr>
                <td><input type="submit" name="btnEmailUpdate" class="save_btn_small" value="Save"/></td>
                <td><input type="button" name="cancel" class="cancel_btn" value="Cancel" onclick="cancelFields(this); return false;"/></td>
              </tr> -->
           </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
		</form>


		<table class="account_table" id="phno">
			<tr>
				<td width="160"><strong>Phone</strong></td>
				<td width="160"> <?php echo $phno; ?></td>
				<td class="right_align"><a onclick="editFields(this); return false;" href="">Edit</a></td>
			</tr>
		</table>

		<?php


	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnPhnoUpdate"]=='Save')
	{
		$flag = 0;
		$err_msg ='';

		//$image = $_FILES["image"]["name"];

		$phno = $_POST["phno"];
		$nphno = $_POST["nphno"];

		$phpassword = $_POST["password"];

		//$rpassword = $_POST["rpassword"];

			if($nphno == '')
			{
				$err_msg = 'Please enter phone number';
				$flag=1;
			}
			elseif ( !is_numeric($nphno)) {
				$err_msg = 'Please enter numeric digit in phone number';
				$flag=1;
			}
			/*if($phpassword == '')
			{
				$err_msg = 'Please enter password';
				$flag=1;
			}*/



		if($flag != 1) {		// && $current_password == base64_encode($phpassword)


				$sql_email_update = "UPDATE ".TABLE_USERS." SET phone_no='".$nphno."' WHERE user_id=".$user_id;
				mysql_query($sql_email_update);
				$succ_msg = 'Phone number changes has been saved.';
				//$flag =2;

		}


	}

		?>

		<form name="frmphno" id="phnoForm" method="post" action="<?php echo SITE_URL; ?>customer-account.php?tab=account" enctype="multipart/form-data" style="display:none;">
			<input type="hidden" name="tab_no" value="3">

	<table width="1005" border="0" cellspacing="0" cellpadding="0" class="edit_table">
   	 <tr>
      <td>

      <!--<?php
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnPhnoUpdate"]=='Save') {
		?>
			<div style="height: 25px; width: auto; margin: 10px; padding: 5px; border: 1px dashed <?php if ($flag == 1) {echo "red";} else {echo "green"; } ?>;">
				<?php if($flag==1) { ?>
				<label style="color: #CC0000; font-weight: bold;"><?=$msg?></label>
				<?php } ?>
				<?php if($flag==2) { ?>
				<label style="color: #006600; font-weight: bold;"><?=$msg?></label>
				<?php }	?>
			</div>
		<?php }	?> -->

     <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">

          <tr>
            <td>
            <div class="error"><?php if ($flag == 1) echo $err_msg; ?></div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="51%">Current phone number</td>
                <td width="49%">&nbsp;</td>
              </tr>
              <tr>
                <td><input type="text" name="phno" id="phno" readonly="readonly" disabled="disabled" value="<?php if(isset($_POST["btnPhnoUpdate"])) { echo $_POST["phno"];}else{ echo $phno;} ?>" class="edit_txtbox edit_360px"/></td>
                <td>&nbsp;</td>
              </tr>
               <tr>
                <td width="51%">New phone number</td>
                <td width="49%">&nbsp;</td>
              </tr>
              <tr>
                <td><input type="text" name="nphno" id="nphno" value="<?php if(isset($_POST["btnPhnoUpdate"])) { echo $_POST["nphno"];}else{ echo $nphno;} ?>" class="edit_txtbox edit_360px"/></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>

          <tr>
            <td><!-- To save these new settings, please enter your GeeLaza password --></td>
          </tr>
         <!--  <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
                <td width="51%">Password</td>
                <td width="49%">&nbsp;</td>
              </tr>
              <tr>
                <td><input type="password" name="password" class="text_box12"/></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>-->
          <tr>
            <td><table width="300" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td><input type="submit" name="btnPhnoUpdate" class="save_btn_small" value="Save"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="cancel" class="cancel_btn" value="Cancel" onclick="cancelFields(this); return false;"/></td>
                <td></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
		</form>



		<table class="account_table" id="pass">
			<tr>
				<td width="160"><strong>Password</strong></td>
				<td width="160"> ***************</td>
				<td class="right_align"><a onclick="editFields(this); return false;" href="">Edit</a></td>
			</tr>
      	</table>

  <?php


	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnPassUpdate"]=='Save')
	{
		$flag = 0;
		$err_msg ='';

		//$image = $_FILES["image"]["name"];

		$new_password = $_POST["password"];
		$rpassword = $_POST["rpassword"];

		$ppassword = $_POST["ppassword"];
			if($new_password == '')
			{
				$err_msg = 'Please enter new password';
				$flag=1;
			}
			if($rpassword == '')
			{
				$err_msg = 'Please retype new password';
				$flag=1;
			}
			if($ppassword == '')
			{
				$err_msg = 'Please enter password';
				$flag=1;
			}
			if ($current_password != base64_encode($ppassword)) {
				$err_msg_red = 'Your password is not correct!';
				//$flag=1;
				$err_flag=1;
			}



		if($flag != 1 && $err_flag != 1) {	// && $current_password == base64_encode($ppassword)


				$sql_pass_update = "UPDATE ".TABLE_USERS." SET password='".base64_encode($new_password)."' WHERE user_id=".$user_id;
				mysql_query($sql_pass_update);
				$succ_msg = 'Password changes has been saved.';
				//$flag =2;

		}


	}

		?>

      <form name="frmpass" id="passForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" style="display:none;">
		<input type="hidden" name="tab_no" value="3">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit_table" >
   	 <tr>
      <td>

		<!--<?php
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_POST["btnPassUpdate"]=='Save') {
		?>
			<div style="height: 25px; width: auto; margin: 10px; padding: 5px; border: 1px dashed <?php if ($flag == 1) {echo "red";} else {echo "green"; } ?>;">
				<?php if($flag==1) { ?>
				<label style="color: #CC0000; font-weight: bold;"><?=$msg?></label>
				<?php } ?>
				<?php if($flag==2) { ?>
				<label style="color: #006600; font-weight: bold;"><?=$msg?></label>
				<?php }	?>
			</div>
		<?php }	?> -->
      <div id="pass_error_loc" class="error"><?php if ($err_flag == 1) {echo $err_msg_red;} ?></div>
     <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">

          <tr>
            <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
            <td width="51%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="51%">Current password</td>
                <td width="49%">&nbsp;</td>
              </tr>
              <tr>
                <td><input type="password" name="ppassword" class="edit_txtbox edit_360px" <?php if ($err_flag == 1) {echo 'style="border: 1px solid red;"';} ?>/></td>
                <td>&nbsp;</td>
              </tr>
          </table></td>
          </tr>
              <tr>
                <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="50%">New password </td>
                      <td width="50%">Confirm new password </td>
                    </tr>
                    <tr>
                      <td><input type="password" name="password" id="password" class="edit_txtbox"/></td>
                      <td><input type="password" name="rpassword" id="rpassword" class="edit_txtbox" onkeyup="javascript: return passMatch(); "/></td>
                    </tr>
                  </table></td>
              </tr>


            <!--  <tr>
                <td width="51%">Retype Password </td>
                <td width="49%">&nbsp;</td>
              </tr>
              <tr>
                <td><input type="password" name="rpassword" id="rpassword" class="text_box11"/></td>
                <td>&nbsp;</td>
              </tr> -->
            </table>
            </td>
          </tr>

          <tr>
            <td><!-- To save these new settings, please enter your GeeLaza password --></td>
          </tr>

          <tr>
            <td><table width="300" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td><input type="submit" name="btnPassUpdate" class="save_btn_small" value="Save"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="cancel" class="cancel_btn" value="Cancel" onclick="cancelFields(this); return false;"/></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
		</form>
<table style="border:none;" class="account_table" id="unsubscribe">
			<tr>
				<td colspan="3"><a onclick="javascript:  UnsubAll();" style="cursor: pointer;"><b>Unsubscribe from all GeeLaza emails</b></a></td>
				<div id="unsubs_msg_loc"></div>
			</tr>
      	</table>

      	<form action="<?php echo SITE_URL.'customer-account.php?usucc=You\'ve unsubscribed from all emails&tab=subscriptions'; ?>" method="post" name="frm_unsub_all">
      		<input type="hidden" name="unsub_all" value="unsub_all" id="unsub_all">
      	</form>

      	<script type="text/javascript">
      		function UnsubAll() {
      			confirm('Are you sure you want to unsubscribe from all emails?');
      			document.frm_unsub_all.submit();
      		}
      	</script>

      	<?php
      		if (isset($_POST['unsub_all']) && $_POST['unsub_all'] == 'unsub_all') {


				$sql_delete = "DELETE FROM ".TABLE_USER_SUBSCRIPTION." WHERE user_id = $user_id";
				$result_delete = mysql_query($sql_delete);

      		}
      	?>
<script type="text/javascript">
function passMatch() {
	var newPass = document.getElementById('password').value;
	var newRPass = document.getElementById('rpassword').value;
	if (newPass != newRPass) {
		document.getElementById('pass_error_loc').innerHTML = "The password does not match!";
		document.getElementById('password').Style.border = "1px solid red";
		document.getElementById('rpassword').Style.border = "1px solid red";
		return false;
	}
	else {
		document.getElementById('pass_error_loc').innerHTML = "";
		document.getElementById('password').Style.border = "none";
		document.getElementById('rpassword').Style.border = "none";
	}
}

</script>

	</div>
	<!-- 3 ends here  -->


	<div class="TabbedPanels1" id="myaccount_4" style="display:none;">
		<div class="title"><span class="float_left">Royal Points</span> <span class="float_right" style="font-size:15px;">
			<img alt="" src="images/star.png" height="18" width="17" style="margin: 7px 0 0 0; float:left;">&nbsp;Royal Points: <strong style="color:#217CED;">0</strong></span>
		</div>

		<div>
          <p style="text-align:left; font-weight:bold; font-family: Candara, Arial, Helvetica, sans-serif; font-size: 18px; color:#444540;">What is Royal Points?</p>
         <p style="font-family: Candara, Arial, Helvetica, sans-serif; padding:0 16px; margin:0; font-size: 14px; color:#444540;">
            At GeeLaza we want to give our customers more than  just a great deal. We give our customers royal points and all of our members  are eligible to the royal points reward. It works in a simple yet effective way  to that you don&rsquo;t even notice. Whenever you return to <a href="http://www.geelaza.com">www.geelaza.com</a> and buy a deal then our  system will credited your account with 10 royal points. When your account royal  points reach 100 then you will get 25% discount on any deal so it&rsquo;s like double  discount.</p>
          <p style="font-family: Candara, Arial, Helvetica, sans-serif; line-height: 20px; padding: 10px 16px; font-size: 14px; color:#444540;"><strong>Example:</strong><br />
            <span style="font-family: Candara, Arial, Helvetica, sans-serif; line-height: 20px; padding: 16px 0; font-size: 14px; color:#444540;">You have bought lots of deals and your account royal  points is 100 and you buy a Samsung TV deal which costs &pound;100.00. But since you  have 100 royal points you only have to pay &pound;75.00 instead of &pound;100.00  (&pound;100.00/100*25%). However there is one tiny limitation, your account cannot go  above 100 royal points.</span> </p>

          <p style="font-family: Candara, Arial, Helvetica, sans-serif; text-align:left; font-weight:bold; font-size: 18px; color:#444540;">How long is my royal points valid until?</p>
         <p style="font-family: Candara, Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 0 16px; font-size: 14px; color:#444540;"> Once your account has reached 100 royal points then you have  45 days to use it on any deal. After 45 days is you haven&rsquo;t used your points  then it will automatically go back to &ldquo;0&rdquo; (ZERO) so be sure to use it.</p>


          <p style="text-align:left; font-family: Candara, Arial, Helvetica, sans-serif; font-weight:bold; font-size: 18px; color:#444540;">Can I use my royal points on anything?</p>
          <p style="font-family: Candara, Arial, Helvetica, sans-serif; font-size: 14px; margin: 0; padding: 0 0 0 16px; color:#444540;">Yes! You can use your royal points on any deal featured on GeeLaza.</p>

		<p style="font-family: Candara, Arial, Helvetica, sans-serif; font-size: 14px; color:#444540;"><span style="color:red;">IMPORTANT:</span> We will automatically reduct the 25% of the  original price of the deal if you have 100 royal points.</p>


       </div>


	</div>
	<!-- 4 ends here  -->

	<div class="TabbedPanels1" id="myaccount_5" style="display:none;">
	<div class="title">Subscriptions<span id="subs_msg_loc" style="margin-left: 100px;"></span></div>
	<div style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; color:#666666; margin-left: 10px; ">My daily emails</div>

	<!--<table class="myaccount" id="noti">
			<tr>
				<td style="float:left; width: 160px; margin: 0 auto;"><p>Notifications</p></td>
				<td style="float:left; width: 170px; margin: 0 auto;"><p>Test</p></td>
				<td style="float:right; width: 30px; margin: 0 30px;"><p><a onclick="editFields(this); return false;" href="">Edit</a></p></td>
			</tr>
     </table>-->



     <table class="myaccount" id="noti" style="width:100%;">
			<?php
			//SELECT * FROM ".TABLE_USER_SUBSCRIPTION." WHERE user_id = $user_id
			$country = 225;
			$show_city = mysql_query("
									SELECT *
									FROM getdeals_user_subscriptions
									INNER JOIN getdeals_cities ON getdeals_user_subscriptions.city_id = getdeals_cities.city_id
									WHERE user_id =$user_id
									AND country_id =$country
									GROUP BY city_name ASC
			");
			$show_city_num_row = mysql_num_rows($show_city);

			/*SELECT * FROM getdeals_user_subscriptions INNER JOIN getdeals_cities ON getdeals_user_subscriptions.city_id=getdeals_cities.city_id WHERE user_id = 11 AND country_id= 225 GROUP BY city_name ASC*/

			/* */
			$get_national_deal = mysql_num_rows(mysql_query("SELECT * FROM ".TABLE_USER_SUBSCRIPTION." WHERE user_id = $user_id AND city_id = -1"));

		if ($show_city_num_row <= 0 && $get_national_deal != 1) {

	?>
    	<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color:#666666;">Not yet subscribed.</p>
    <?php } else { ?>
			<tr><p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color:#666666;">I am currently subscribed to</p>
			  <td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td><p>
					<?php
					//$city_id = $_GET['city_id'];
					$get_national_deal = mysql_num_rows(mysql_query("SELECT * FROM ".TABLE_USER_SUBSCRIPTION." WHERE user_id = $user_id AND city_id = -1"));
					if ($get_national_deal >= 1) {
						echo '<div class="list_box">National Deal</div>';
					}
				?>
				<?php while ($show_city_list = mysql_fetch_array($show_city)) {
						//$country = 225;
						//echo $sql_city = "SELECT * FROM ".TABLE_CITIES."  WHERE country_id = $country AND city_id = $show_city_list[city_id] GROUP BY city_name ASC";
						//$result_city = mysql_query($sql_city);
						//$row_city_1 = mysql_fetch_array($result_city);
					?>

					<div class="list_box"><?php echo $show_city_list['city_name']; ?></div>
				<?php } ?>
				</p></td>
				  </tr>
				</table>
				</td>
			</tr>
			<?php } // End else?>

			<tr>
				<td style="float:right; width: 30px; margin: 0 30px;"><p><a onclick="editFields(this); return false;" href="">Edit</a></p></td>
			</tr>

     </table>


	<form name="frmnotification" id="notiForm" method="post" action="<?php echo SITE_URL; ?>customer-account.php?usucc=Your subscription settings has been updated." enctype="multipart/form-data" style="display:none;">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="purchase_history">
      <tr>
        <td>
           <div class="float_left" style="padding-right:84px;"><img src="images/green_thick.gif" alt="" class="float_left"/>Select the cities you want to recieve deal alerts for:</div>
           <div class="skinned-form-controls skinned-form-controls-mac">
	           <?php
					//$city_id = $_GET['city_id'];
					$get_national_deal = mysql_num_rows(mysql_query("SELECT * FROM ".TABLE_USER_SUBSCRIPTION." WHERE user_id = $user_id AND city_id = -1"));
				?>

	           <input type="checkbox"  name="nationaldeal" id="nationaldeal" value="-1" onclick="javascript: return ajaxReq(this.value);" <?php if ($get_national_deal >= 1) echo 'readonly="readonly" checked="checked" ' ?>/>
	           <span <?php if ($get_national_deal >= 1) echo 'readonly="readonly" checked="checked" ' ?>>National Deal</span>
	       </div>
        </td>
      </tr>
      <tr>
      	<td>
		<?php
			$user_id = $_SESSION['user_id'];
			$country = 225;

			$sql_city = "SELECT * FROM ".TABLE_CITIES."  WHERE country_id = $country GROUP BY city_name ASC";
			$result_city = mysql_query($sql_city);
		?>
        	<?php
					while($row_city = mysql_fetch_array($result_city)) {
				?>

				<?php
					//$city_id = $_GET['city_id'];
					$get_city = mysql_num_rows(mysql_query("SELECT * FROM ".TABLE_USER_SUBSCRIPTION." WHERE user_id = $user_id AND city_id = $row_city[city_id]"));
				?>


			<div class="deal_list skinned-form-controls skinned-form-controls-mac">

				<input type="checkbox" name="<?php echo $row_city["city_name"]; ?>" id="<?php echo $row_city["city_name"]; ?>" value="<?php echo $row_city["city_id"]; ?>" onclick="javascript: return ajaxReq(this.value);" <?php if ($get_city >= 1) echo 'readonly="readonly" checked="checked" ' ?>/>

				<span <?php if ($get_city >= 1) echo 'style="color: green"' ?>><?php echo $row_city["city_name"]; ?></span>
			</div>

            <?php } ?>

        </td>
      </tr>
      <tr>
      	<td style="border: none;">
      		<input type="submit" name="cancel" style="font-size: 18px; margin-left: -6px !important;" class="save_btn_small" value="Save" onclick="cancelFields(this); return false;"/>
      	</td>
      </tr>
    </table>

		</form>


	</div>
	<!-- 5 ends here  -->

	<div class="TabbedPanels1" id="myaccount_6" style="display:none;">
		<div class="title">Purchase History</div>
    <?php
		$sql_purchase_history = "SELECT * FROM ".TABLE_TRANSACTION." WHERE user_id = $_SESSION[user_id]";
		$purchase_history_res = mysql_query($sql_purchase_history);
		$purchase_history_num = mysql_num_rows($purchase_history_res);
		$count = 0;

	?>

       <?php
       if ($purchase_history_num <= 0) {
		?>
		<p style="font-family: Helvetica; font-size: 16px;">You haven&rsquo;t made any purchases yet!</p>
		<p style="font-family: Helvetica; font-size: 12px;">As  you purchase GeeLaza deals, this page will contain a history of all purchased  items for your personal reference.</p>
		<?php
		}
		else {
       ?>
       <table width="100%" border="0" cellspacing="0" cellpadding="0" class="transactions_box3">
          <tr>
            <th style="width:114px;">Purchased date</th>
            <th style="width:114px;">Deal Number</th>
            <th style="width:114px;">Quantity</th>
            <th style="width:114px;">GeeLaza Code</th>
            <th style="width:114px;">Savings</th>
            <th style="width:114px;">Price</th>
          </tr>
      </table>
       <table width="100%" border="0" cellspacing="0" cellpadding="0" class="purchase_history">

          <?php
          	while ($purchase_history_row = mysql_fetch_array($purchase_history_res)) {
			$deal_details = get_deal_details($purchase_history_row['deal_id']);
			$pur_date = $purchase_history_row["transaction_date"];
			$pur_date_formated = strftime("%d/%m/%Y", strtotime($pur_date));

			$start_date = reset(explode(" ",$deal_details["deal_start_time"]));
			$end_date = reset(explode(" ",$deal_details["deal_end_time"]));
			//$end_date_formated = strftime("%d %B %Y", strtotime($end_date));

			$start_date_formated = strftime("%d/%m/%Y",strtotime($start_date));
			$end_date_formated = strftime("%d/%m/%Y",strtotime($end_date));


			$count++;
          ?>

          <tr>
            <td style="width:114px;"><?php echo $pur_date_formated; ?></td>
            <td style="width:114px;">Deal Number <?php echo $count; ?></td>
            <td style="width:114px;"><?php echo $purchase_history_row['qty']; ?></td>
            <td style="width:114px;"><?php echo $purchase_history_row['coupon_code']; ?></td>
            <td style="width:114px;">&pound;<?php echo floatval($deal_details['full_price'] - $deal_details['discounted_price']); ?></td>
            <td style="width:114px;">&pound;<?php echo $purchase_history_row['amount']; ?></td>
          </tr>

          <?php } ?>

      </table>
		<?php } //End else ?>
	</div><!-- 6 ends here  -->



  </div>


<script type="text/javascript">

$('#tickallcity').click(function(){
	$("INPUT[type='checkbox']").each(function(){
        	if (this.checked == false) {
			this.checked = true;
		} else {
			this.checked = false;
		}
	});
});

</script>

<script type="text/javascript">
function ajaxReq(str)
{
var xmlhttp;
//alert(str); die();
if (str.length==0)
  {
  document.getElementById("subs_msg_loc").innerHTML="";
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
    document.getElementById("subs_msg_loc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_city_subscription.php?city_id="+str,true);
xmlhttp.send();
}

</script>





<!--
<label><b>Change Profile Picture</b></label> <?php
if($image == '')
{
	?> <img src="images/user_sidebar.png"
	style="height: 60px; width: 60px;" /><br />
<br />
	<?php
}
else
{
	?> <img src="<?php echo PROFILE_IAMGE_PATH.$image;?>"
	style="height: 60px; width: 60px;" /><br />
<br />
	<?php
}
?> <input type="file" name="image" id="image" value=""
	style="width: 220px; height: 25px;" /><br />
<br />
<br />
<br />
 -->
<?php
		if($_REQUEST['tab_no'] != "")
		{
	?>
			<script type="text/javascript" language="javascript">
			for(i=1; i<=5; i++)
			{
				document.getElementById("myaccount_"+i).style.display = "none";

			}
			document.getElementById("myaccount_"+<?=$_REQUEST['tab_no']?>).style.display = "block";

			</script>
	<?php
		}
	?>

<div class="clear"></div>
		<!--<?php
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && ($_POST["btnNameUpdate"]=='Save' || $_POST["btnAddressUpdate"]=='Save' || $_POST["btnPhnoUpdate"]=='Save' || $_POST["btnEmailUpdate"]=='Save' || $_POST["btnPassUpdate"]=='Save')) {
		?>
			<div style="height: 40px; width: auto; margin: 10px; margin-left: 120px; margin-right: 5px; padding: 10px 10px 0 10px; border: 1px solid <?php if ($err_msg != "") {echo "none";} else {echo "none"; } ?>;">
				<?php if($err_msg != "") { ?>
				<label style="color: #191919; font: bold 20px/26px Arial, Helvetica, sans-serif;"><img src="images/cross.gif" align="top" style=" float:left; margin:0 5px 0 0;"><?=$err_msg?></label>
				<?php } ?>
				<?php if($succ_msg != "") { ?>
				<label style="color: #191919; font: bold 20px/26px Arial, Helvetica, sans-serif;"><img src="images/tick_mark.gif" align="top" style=" float:left; margin:0 5px 0 0;"><?=$succ_msg?></label>
				<?php }	?>
			</div>
		<?php } ?>-->


	<?php
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && ($_POST["btnNameUpdate"]=='Save' || $_POST["btnAddressUpdate"]=='Save' || $_POST["btnPhnoUpdate"]=='Save' || $_POST["btnEmailUpdate"]=='Save' || $_POST["btnPassUpdate"]=='Save')) {
			if($succ_msg != "") {
				header('location:'.SITE_URL.'customer-account.php?usucc='.$succ_msg);
				}
		}
	?>



</div>

<div class="clear"></div>

<br/><br/><br/>
</div>
<div class="bot_about"></div>
</div>
</div>
<?php include ('include/sidebar-login.php'); ?>
</div>

<?php include("include/footer.php");

if ($_GET['tab'] == 'subscriptions') {
	echo '<script type="text/javascript">show_tab(5)</script>';
}
else if ($_GET['tab'] == 'account') {
	echo '<script type="text/javascript">show_tab(3)</script>';
}
else if ($_GET['tab'] == 'vouchers') {
	echo '<script type="text/javascript">show_tab(1)</script>';
}
else if ($_GET['tab'] == 'purchase') {
	echo '<script type="text/javascript">show_tab(6)</script>';
}
else if ($_GET['tab'] == 'credit') {
	echo '<script type="text/javascript">show_tab(2)</script>';
}
else if ($_GET['tab'] == 'royal') {
	echo '<script type="text/javascript">show_tab(4)</script>';
}
?>