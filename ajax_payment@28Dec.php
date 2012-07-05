<?php
session_start();
ob_start();
require("config.inc.php");
require("class/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);			
$db->connect();


if ($_GET['id'] != "" && $_GET['qty'] != "")  {
	$prod_id = $_GET['id'];
	$prod_qty = $_GET['qty'];
	
	$sql_prod = "SELECT * FROM ".TABLE_DEALS." WHERE status >= 1 AND deal_id = '".$prod_id."' LIMIT 0, 1";
	$prod_res = mysql_fetch_array(mysql_query($sql_prod));
	
	$total_price = $prod_qty * $prod_res['discounted_price'];
	echo $total_price;
	$_SESSION['total_price'] = $total_price;
	
	
}

?>
