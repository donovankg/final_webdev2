<?php
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
  error_reporting(E_ALL);  // turn on all error reporting
            $mysqlhost='localhost';
            $mysqlusername='root';
            $mysqlpassword=''; 
            $mysqldb='final_db';
            $root_dir = "/final/";
            ini_set('display_errors', 1);
      error_reporting(E_ALL);
$conn=mysqli_connect($mysqlhost,$mysqlusername,$mysqlpassword,$mysqldb);

}else{
  // PRODUCTION SETTINGS
  $mysqlhost = "198.71.225.58:3306";
  $mysqldb= "final_db";
  $mysqlusername = "usernew_this";
  $mysqlpassword= "@I18nk7o";
  $root_dir = "/final/";
  $debug_mode = false;
}

//require_once("custom_error_handler.inc.php");




?>


