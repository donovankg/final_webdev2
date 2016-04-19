<?php
//contact us.
//input boxes for name, email, and comment / question
 include 'config.php';
$page_title = "Contact Us";
require_once('includes/dataaccess/loginDataAccess.php');
require_once("includes/header.inc.php");


?>
<form method="POST" id ="contactus">
    Name:<br>
    <input type="text" name="name"><br>
    Eamil Address:<br>
    <input type="text" name="email"><br>
    <textarea row ="20" cols ="50" id = "txtarea_comments"name="txtarea_comments"></textarea><br>
    <input type="submit" name ="submitted">


</form>
<a href="javascript:history.back()">return to previous page</a>

<?php

$errors ='';
$contactEmail ='donovankg@yahoo.com';



if(empty($_REQUEST['name'])           ||
   empty($_REQUEST['email'])          ||
   empty($_REQUEST['txtarea_comments']))
{
	$errors .="\n Error: all feilds are required";
}
If(isset($_REQUEST['submitted'])){
	if($errors !=''){
		echo('please fill out all the required fields');
	}else{
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
}

?>