<?php
/************* Function For Truncating A String Without cutting It In Between A Word Starts *********************/
function truncate_string($details,$max)
{
    if(strlen($details)>$max)
    {
        $details = substr($details,0,$max);
        $i = strrpos($details," ");
        $details = substr($details,0,$i);
        $details = $details."... ";
    }
    return $details;
}
/**************************************** Ends ********************************/

/************************* Code for generating Random AlphaNumeric Text Starts ***************************/

function str_rand($length = 8, $seeds = 'alphanum')
{
	// Possible seeds
	$seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
	$seedings['numeric'] = '0123456789';
	$seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
	$seedings['hexidec'] = '0123456789abcdef';
	
	// Choose seed
	if (isset($seedings[$seeds]))
	{
		$seeds = $seedings[$seeds];
	}
	
	// Seed generator
	list($usec, $sec) = explode(' ', microtime());
	$seed = (float) $sec + ((float) $usec * 100000);
	mt_srand($seed);
	
	// Generate
	$str = '';
	$seeds_count = strlen($seeds);
	
	for ($i = 0; $length > $i; $i++)
	{
		$str .= $seeds{mt_rand(0, $seeds_count - 1)};
	}
	
	return $str;
}

/************************* Code for generating Random AlphaNumeric Text Ends ***************************/

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function get_deal_details($deal_id){
$deal=mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_DEALS." where deal_id='$deal_id'"));
return $deal;
}
function get_merchant_details($deal_id){
$sql="SELECT * FROM ".TABLE_DEALS_MERCHANT." JOIN ".TABLE_DEALS." on(".TABLE_DEALS_MERCHANT.".deal_id=".TABLE_DEALS.".deal_id) where 1=1 and  ".TABLE_DEALS_MERCHANT.".deal_id='".$deal_id."'";
$m_deal=mysql_fetch_array(mysql_query($sql));

$res=mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_USERS." where user_id='".$m_deal['user_id']."'"));
return $res;
}

function get_deal_category($deal_id){
$deal=get_deal_details($deal_id);
$sql="SELECT * FROM ".TABLE_CATEGORIES." where cat_id='".$deal['deal_cat']."' ";
$cat=mysql_fetch_array(mysql_query($sql));
return $cat;

}

function get_store_details($deal_id){
$sql="SELECT * FROM ".TABLE_DEALS_MERCHANT." JOIN ".TABLE_DEALS." on(".TABLE_DEALS_MERCHANT.".deal_id=".TABLE_DEALS.".deal_id) where 1=1 and  ".TABLE_DEALS_MERCHANT.".deal_id='".$deal_id."'";
$m_deal=mysql_fetch_array(mysql_query($sql));
$res=mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_STORES." where merchant_id='".$m_deal['user_id']."'"));
return $res;

}



function getprofile_array(){

$progress_stores=mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_STORES." where merchant_id='".$_SESSION['muser_id']."'"));

$merchant=mysql_fetch_array(mysql_query("SELECT * FROM ".TABLE_USERS." where reg_type='merchant' and user_id='".$_SESSION['muser_id']."'"));



$profile_arr=array('store_name'=>0, 'category_id'=>0, 'primary_location'=>0, 'phone'=>0, 'website'=>0, 'twitterpage'=>0, 
'facebookpage'=>0, 'business_desc'=>0, 'product_recommend'=>0, 'experience'=>0, 'stand_out'=>0, 'why_not_come'=>0, 'chq_address1'=>0, 'chq_address2'=>0, 'chq_city'=>0,
 'chq_state'=>0, 'chq_zip'=>0, 'chq_country'=>0, 'chq_payable'=>0,'location'=>0,'profile_image'=>0,'site_review'=>0);

!empty($progress_stores['store_name'])? $profile_arr['store_name']=1:$profile_arr['store_name']=0;
!empty($progress_stores['category_id'])? $profile_arr['category_id']=1:$profile_arr['category_id']=0;
!empty($progress_stores['category_id'])? $profile_arr['address1']=1:$profile_arr['address1']=0;

!empty($progress_stores['primary_location'])? $profile_arr['primary_location']=1:$profile_arr['primary_location']=0;


!empty($progress_stores['phone'])? $profile_arr['phone']=1:$profile_arr['phone']=0;
!empty($progress_stores['website'])? $profile_arr['website']=1:$profile_arr['website']=0;
!empty($progress_stores['twitterpage'])? $profile_arr['twitterpage']=1:$profile_arr['twitterpage']=0;
!empty($progress_stores['facebookpage'])? $profile_arr['facebookpage']=1:$profile_arr['facebookpage']=0;
!empty($progress_stores['business_desc'])? $profile_arr['business_desc']=1:$profile_arr['business_desc']=0;
!empty($progress_stores['product_recommend'])? $profile_arr['product_recommend']=1:$profile_arr['product_recommend']=0;
!empty($progress_stores['experience'])? $profile_arr['experience']=1:$profile_arr['experience']=0;
!empty($progress_stores['stand_out'])? $profile_arr['stand_out']=1:$profile_arr['stand_out']=0;
!empty($progress_stores['why_not_come'])? $profile_arr['why_not_come']=1:$profile_arr['why_not_come']=0;
!empty($progress_stores['chq_address1'])? $profile_arr['chq_address1']=1:$profile_arr['chq_address1']=0;
!empty($progress_stores['chq_address2'])? $profile_arr['chq_address2']=1:$profile_arr['chq_address2']=0;
!empty($progress_stores['chq_city'])? $profile_arr['chq_city']=1:$profile_arr['chq_city']=0;

!empty($progress_stores['chq_state'])? $profile_arr['chq_state']=1:$profile_arr['chq_state']=0;
!empty($progress_stores['chq_zip'])? $profile_arr['chq_zip']=1:$profile_arr['chq_zip']=0;
!empty($progress_stores['chq_country'])? $profile_arr['chq_country']=1:$profile_arr['chq_country']=0;
!empty($progress_stores['chq_payable'])? $profile_arr['chq_payable']=1:$profile_arr['chq_payable']=0;


$locationnum=mysql_num_rows(mysql_query("SELECT * FROM ".TABLE_STORES_LOCATION." where  store_id='".$progress_stores['store_id']."'"));
$locationnum>0? $profile_arr['location']=1:$profile_arr['location']=0;

$profileimg=mysql_num_rows(mysql_query("SELECT * FROM ".TABLE_STORES_PROFILEIMG." where  store_id='".$progress_stores['store_id']."'"));
$profileimg>=3? $profile_arr['profile_image']=1:$profile_arr['profile_image']=0;


$sitereview=mysql_num_rows(mysql_query("SELECT * FROM ".TABLE_STORES_REVIEW." where  store_id='".$progress_stores['store_id']."'"));
$sitereview>0? $profile_arr['site_review']=1:$profile_arr['site_review']=0;

return $profile_arr;

}


function repeat_days($currentDate,$lastdate,$days){
		$i=1;
		
	
		$resdate=array();
		
		
		while ($currentDate <= $lastdate){
			 
			 $day = substr(strtoupper(date('l',$currentDate)),0,2);
			
				if(in_array($day,$days)){
				
				$resdate[]=date("Y-m-d H:i",$currentDate);
				}
			
			$currentDate= strtotime(date("Y-m-d H:i", $currentDate) . " +1 day");
			$i++;
		
		}
		
		return $resdate;
}

?>