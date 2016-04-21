<?php
 include 'config.php';
$page_title = "Contact Us";
require_once('includes/dataaccess/loginDataAccess.php');
require_once("includes/header.inc.php");


?>
<!-- form for collecting data from the user-->
<form method="POST" id ="contactus">
    Name:<br>
    <input type="text" name="name"><br>
    Eamil Address:<br>
    <input type="text" name="email"><br>
    Send us a message or comment:<br>
    <textarea row ="20" cols ="50" id = "txtarea_comments"name="txtarea_comments"></textarea><br>
    <input type="submit" name ="submitted">


</form>


<?php

$errors ='';
$contactEmail ='donovankg@yahoo.com';


//checks to see if there are any blanks in the posted txtboxes
if(empty($_POST[htmlentities('name')])           ||
   empty($_POST[htmlentities('email')])          ||
   empty($_POST[htmlentities('txtarea_comments')]))
{
	$errors .="\n Error: all feilds are required";
}
//if the form is submitted it will collect the information and send it into an email, then redirect to login.php
If(isset($_POST['submitted'])){
	if($errors !=''){
		echo('please fill out all the required fields');
	}else{
		$name = $_POST[htmlentities('name')];
		$email = $_POST[htmlentities('email')];
		$txtarea_comments = $_POST[htmlentities('txtarea_comments')];

		$to ='donovankg@yahoo.com';
		$subject='contacted by: ' . $name .' via: donovangoldston.com/final/';
		$message =($subject . ' <br> '.$txtarea_comments);
		$header='from: ' . $email;
    
    	mail($to, $subject, $message);


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
<!-- a back link so they can back out of the page if they don't wish to enter anything -->
<br>
<a href="javascript:history.back()">return to previous page</a>