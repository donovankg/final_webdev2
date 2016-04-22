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


	//on post the stuff in the text boxes will go into the query and then to the database
	$recipe_name=htmlentities($_POST['recipe_name']);
	$user_id=htmlentities($_SESSION["user_id"]);
	$steps=htmlentities($_POST['steps']);
	$ingredients=htmlentities($_POST['ingredients']); 	
	//$recipe_active = htmlentities($_POST['yes']);


	$query="INSERT INTO `recipes`(recipe_name, steps, user_id, ingredients, recipe_active)
	values('".$recipe_name."', '".$steps."', '".$user_id."', '".$ingredients."', '".$recipe_active."')";

	//echo($query);
	mysqli_query($conn, $query);
//	echo($conn . '<br>');
//	echo ($query);

	header('location:user.php');
}
?>


<form method="POST" id ="contactus">
 
    Recipe Name:<br>
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