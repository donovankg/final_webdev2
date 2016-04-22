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

	$recipe_id =htmlentities($_REQUEST['recipe_id']);
	$recipe_name=htmlentities($_REQUEST['recipe_name']);
	$steps=htmlentities($_POST['steps']);
	$ingredients=htmlentities($_POST['ingredients']); 	
	$recipe_active =htmlentities(['recipe_active']);






	//used to prevent sql injection
	$id = mysqli_real_escape_string($conn, $recipe_id);
			//FROM transactions WHERE id = " . mysqli_real_escape_string($this->link, $id);
	$query="DELETE FROM recipes WHERE `recipe_id` = '$id'";
		echo($query);
		mysqli_query($conn, $query);

    header('Location: user.php');

?>





<form method="POST">

    Are you sure you wish to delete this recipe?<br>
    <input type="submit" name ="btnSubmit"value="Yes, Delete"><br>
    <a href="javascript:history.back()">click back to cancel.</a>

</form>
