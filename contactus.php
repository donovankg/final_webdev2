<?php
//contact us.
//input boxes for name, email, and comment / question
 include 'config.php';
$page_title = "Login Page";
//require_once('includes/Utils.php');
require_once('includes/dataaccess/loginDataAccess.php');
require_once("includes/header.inc.php");


?>
<form method="POST" id ="contactus">
    Email Adress:<br>
    <input type="text" name="name"><br>
    Password:<br>
    <input type="text" name="email"><br>
    <textarea row ="20" cols ="50" id = "txtarea_comments"name="txtarea_comments"></textarea><br>
    <input type="submit" name ="submitted">


</form>
<a href="javascript:history.back()">return to previous page</a>

<?php

$errors ='';
$contactEmail ='donovankg@yahoo.com';
/*
if(empty($_POST['name'])           ||
   empty($_POST['email'])          ||
   empty($_POST['txtarea_comments']))
{
	$errors .="\n Error: all feilds are required";
}*/
If(isset($_REQUEST['submitted'])){
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$txtarea_comments = $_REQUEST['txtarea_comments'];

$to ='xpyrox@yahoo.com';
$subject='contacted by:' . $name .' donovangoldston.com/final/';
$message =($txtarea_comments);
$header='from: ' . $email;
    
    mail($to, $subject, $message, $header);


echo'<style type="text/css">
	#contactus{   
		visibility: hidden;
	}
	</style>';

if(@mail($to, $subject, $message, $header)){
	echo('mail sent');
}else{
	echo('mail not sent');
}

   echo ", redirecting you in 4 seconds....";
   header("refresh:3; url=login.php");
}



/*
$str($name . '<br> ' . $email . '<br> ' . $txtarea_comments);


if($debug_mode){
    //mail($to, $subject, $message, $header);
echo($name . '<br> ' . $email . '<br> ' . $txtarea_comments);

  }else{
    
    $to ='donovankg@yahoo.com';
    $subject='via contact page: donovangoldston.com/final/';
    $message =$str;
    $header='from: ' . $email;
    
     mail($to, $subject, $message, $header);
	}
*/

?>