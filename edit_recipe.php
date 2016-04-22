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

    Recipe Name:<br>
    <input type="text" name="recipe_name" value="<?php echo($recipe->recipe_name)?>"/><br>
    Enter the Steps:<br>
    <textarea row ="20" cols ="50" id = "txtarea_comments" name="steps"><?php echo($recipe->steps)?></textarea><br>
    Enter the ingrentients list:<br>
    <textarea row ="20" cols ="50" id = "txtarea_comments "name="ingredients"><?php echo($recipe->ingredients)?></textarea><br>
  
  	Is this Recipe active?:<br>
    <input type="text" name="recipe_active" value="<?php echo($recipe->recipe_active)?>"/><br>
  

    <input type="submit" name ="btnSubmit"value="submit">

</form>


<?php

//checks to see if the button is pressed then runs an update statement
If(isset($_POST['btnSubmit'])){
	$recipe_id =$_REQUEST['recipe_id'];
	$recipe_name=$_REQUEST['recipe_name'];
	$steps=$_REQUEST['steps'];
	$ingredients=$_REQUEST['ingredients']; 	
	$recipe_active =$_REQUEST['recipe_active'];


	$query="UPDATE recipes SET  `recipe_name` = '$recipe_name', 
		`steps`='$steps', 
		`ingredients` = '$ingredients' , 
		`recipe_active` = '$recipe_active' 
		WHERE `recipe_id` =  '$recipe_id'" ;
		echo($query);
		mysqli_query($conn, $query);

    header('Location: user.php');

}



?>