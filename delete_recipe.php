<?php 
include 'config.php';
require_once('includes/models/Recipe.php');
require_once('includes/dataaccess/RecipeDataAccess.php');
session_start();

if(!$_SESSION['user_role'] == 'user')
{
    header('location:login.php');
}

$da = new RecipeDataAccess($conn);
//echo($_GET['recipe_id'] . '<br>');
/*
	
*/
$recipe = new Recipe();
if(isset($_GET['recipe_id'])){
	$da = new RecipeDataAccess($conn);
	$recipe = $da->get_recipe_by_id($_GET['recipe_id']);

}





?>





<form method="POST">

    Are you sure you wish to delete this recipe?<br>
    <input type="submit" name ="btnSubmit"value="Yes, Delete"><br>
    <a href="javascript:history.back()">click back to cancel.</a>

</form>


<?php

//checks to see if the button is pressed to delete from the users table based on the recipe Id
If(isset($_POST['btnSubmit'])){
	$recipe_id =$_REQUEST['recipe_id'];
	$recipe_name=$_REQUEST['recipe_name'];
	$steps=$_POST['steps'];
	$ingredients=$_POST['ingredients']; 	
	$recipe_active =['recipe_active'];


	$query="DELETE FROM recipes WHERE `recipe_id` =  '$recipe_id'" ;
		echo($query);
		mysqli_query($conn, $query);

    header('Location: user.php');

}



?>