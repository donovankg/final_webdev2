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
	$recipe_name=$_POST['recipe_name'];
	$user_id=$_SESSION["user_id"];
	$steps=$_POST['steps'];
	$ingredients=$_POST['ingredients']; 	
	$recipe_active ='yes';
*/
$recipe = new Recipe();
if(isset($_GET['recipe_id'])){
	$da = new RecipeDataAccess($conn);
	$recipe = $da->get_recipe_by_id($_GET['recipe_id']);

}






?>





<form method="POST">

    Recipe Name:<br>
    <input type="recipe_name" name="recipe_name" value="<?php echo($recipe->recipe_name)?>"/><br>
    Enter the Steps:<br>
    <textarea row ="20" cols ="50" id = "txtarea_comments" name="steps"><?php echo($recipe->steps)?></textarea><br>
    Enter the ingrentients list:<br>
    <textarea row ="20" cols ="50" id = "txtarea_comments "name="ingredients"> <?php echo($recipe->ingredients)?></textarea><br>
    
    <input type="submit" name ="btnSubmit"value="submit">

</form>


<?php
//echo('add a hide div here for the user page');

If(isset($_POST['btnSubmit'])){


    header('Location: user.php');

}



?>