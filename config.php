<?php
$debug_mode;
	// Here change variables with your own settings
	/*
	$mysqlhost='localhost';
	$mysqlusername='root';
	$mysqlpassword=''; 
	$mysqldb='final_db';
	$root_dir = "/final/";
	ini_set('display_errors', 1);
	*/


if($_SERVER['SERVER_NAME'] == "localhost"){
	// DEV ENVIRONMENT SETTINGS
		$mysqlhost='localhost';
		$mysqlusername='root';
		$mysqlpassword=''; 
		$mysqldb='final_db';
		$root_dir = "/final/";
		error_reporting(E_ALL);
		ini_set('display_errors', 1);




		

}else{
	// PRODUCTION SETTINGS
		$mysqlhost = "198.71.225.58:3306";
		$mysqldb = "final_db";
		$mysqlusername = "usernew_this";
		$mysqlpassword = "@I18nk7o";
		$root_dir = "/final/";
		$debug_mode = false;
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		

}

require_once("includes/custom_error_handler.inc.php");

set_error_handler ("myErrorHandler");
// set up a connection to the db
$conn=mysqli_connect($mysqlhost,$mysqlusername,$mysqlpassword,$mysqldb);
?>


