<?php
//users insert into recipes table for their own user ID

require_once('config.php');
/**
* This page will display all transactions in the checkbook
* test
* Details about this page can go here...
*
* @author Donovan Goldston
*/
session_start();

if(!$_SESSION['user_role'] == 'user')
{
    header('location:login.php');
}
$page_title = "Add Recipe";

require_once("includes/header.inc.php");



if($_POST)
{
   
   
    $username=$_POST['username'];
    
    if(strpos($username, '@') ==false){
        echo ('this is not a valid email, "@" ia missing <br>');

    }  if
        (strpos($username, '.') ==false){
        echo ('this is not a valid email, "." is missing <br>');
    }


	//$recipe_id=  
	$recipe_name=$_POST['recipe_name'];
	$user_id=$_SESSION["user_id"];
	$steps=$_POST['steps'];
	$ingredients=$_POST['ingredients']; 	
	$recipe_active ='yes';


	$query="INSERT INTO `recipes`(recipe_name, steps, user_id, ingredients, recipe_active)
	values('".$recipe_name."', '".$steps."', '".$user_id."', '".$ingredients."', '".$recipe_active."')";

	//echo($query);
	mysqli_query($conn, $query);
	echo($conn . '<br>');
	echo ($query);

	header('location:user.php');
}
?>

<!--
items needed to be posted
recipe_id = $_SESSION["user_id"] = htmlentities($row['user_id']); //this is from login.php
 	recipe_name 	user_id 	steps 	ingredients 	
 	recipe_active == 'yes'

 -->
<form method="POST" id ="contactus">
 
    Eamil Address:<br>
    <input type="recipe_name" name="recipe_name"><br>
    Enter the Steps:<br>
    <textarea row ="20" cols ="50" id = "txtarea_comments" name="steps"></textarea><br>
    Enter the ingrentients list:<br>
    <textarea row ="20" cols ="50" id = "txtarea_comments"name="ingredients"></textarea><br>
    <input type="submit" name ="submitted">


</form>

</div>
<a href="javascript:history.back()">return to previous page</a>
<?php
require_once("includes/footer.inc.php");


?>