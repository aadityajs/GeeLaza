<?php
require("config.inc.php");
ob_start();
session_start();

session_destroy();
header("location:".SITE_URL."?bye=You've signed out. See you again soon");
?>