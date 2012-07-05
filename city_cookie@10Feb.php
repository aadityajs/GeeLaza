<?php
require("config.inc.php");
require("class/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);			
$db->connect();

if ($_GET['city'] != "") {
		
		$chnaged_city = $_GET['city'];
		
		$cookie_val = $_COOKIE["subscribe"];
		$arr = explode("|",$cookie_val);
		
		$email = $arr[0];
		$arr[1] = $chnaged_city;
		$city_id = $arr[1];
		$new_cookie_val = implode('|', $arr);
		setcookie('subscribe', $new_cookie_val, time()+3600*24);
		header('location:'.SITE_URL);
		
		echo "hi";
	}

?>