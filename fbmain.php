<?php
    require("facebook_sdk/facebook.php");

    //facebook application
    $fbconfig['appid' ]     = "192309027517422";
    $fbconfig['secret']     = "7f1eb32e301277d025d35b77b06dd863";
    $fbconfig['baseurl']    = "http://unifiedinfotech.net/getdeals/customer-register.php";

    
    
    
    //
    if (isset($_GET['request_ids'])){
        //user comes from invitation
        //track them if you need
    }
    
    $user            =   null; //facebook user uid
    try{
        include_once("facebook_sdk/facebook.php");
    }
    catch(Exception $o){
        error_log($o);
    }
    // Create our Application instance.
    $facebook = new Facebook(array(
      'appId'  => $fbconfig['appid'],
      'secret' => $fbconfig['secret'],
      'cookie' => true,
    ));

    //Facebook Authentication part
    $user       = $facebook->getUser();
	
	//echo "==========".$user;
	//echo '<pre>'.print_r($user,true).'</pre>';
	//die;
    // We may or may not have this data based 
    // on whether the user is logged in.
    // If we have a $user id here, it means we know 
    // the user is logged into
    // Facebook, but we don’t know if the access token is valid. An access
    // token is invalid if the user logged out of Facebook.
    
    
    $loginUrl   = $facebook->getLoginUrl(
            array(
                'scope'         => 'email,offline_access,publish_stream,user_birthday,user_location,user_work_history,user_about_me,user_hometown',
                'redirect_uri'  => $fbconfig['baseurl']
            )
    );
    
    $logoutUrl  = $facebook->getLogoutUrl();
	//echo $logoutUrl;
	//die;
   

    if ($user) {
      try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
      } catch (FacebookApiException $e) {
        //you should use error_log($e); instead of printing the info on browser
        d($e);  // d is a debug function defined at the end of this file
        $user = null;
      }
    }
   
   //	echo "===========";
	//echo '<pre>'.print_r($user_profile,true).'</pre>';
	//die;
   
    
    //if user is logged in and session is valid.
    if ($user){
        //get user basic description
        $userInfo           = $facebook->api("/$user");
        
        //Retriving movies those are user like using graph api
        try{
            $movies = $facebook->api("/$user/movies");
        }
        catch(Exception $o){
            d($o);
        }
		
   //	echo "===========";
	//echo '<pre>'.print_r($userInfo,true).'</pre>';
	
        	// $userInfo['name'];
      		 $userInfo['first_name'];
      		 $userInfo['last_name'];
      		 $userInfo['email'];
      		 //$userInfo['birthday'];
      		 
      		/* if (!empty($userInfo)) {
      	header('location:'.SITE_URL.'customer-register.php');
      		 }	*/
    }
?>
