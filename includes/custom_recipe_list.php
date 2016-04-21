

<table border="1">
	<thead>
		<th>recipe name</th>
		<th>steps</th>
		<th>ingredients</th>
		<th>active?</th>
		<th>edit</th>
		<th>delete</th>
	</thead>
	<tbody> 

<?php

require_once("includes/models/recipe.php"); 
require_once('includes/dataaccess/RecipeDataAccess.php');
$da = new RecipeDataAccess($conn);
$recipes = $da->get_all_Recipes();



	if(!empty($recipes)){
		foreach ($recipes as $r) {
			echo("<tr>");
			echo("<td>" . $r->recipe_name . "</td>");
			echo("<td>" . $r->steps . "</td>");
			echo("<td>" . $r->ingredients . "</td>");
			echo("<td>" . $r->recipe_active . "</td>");
			echo("<td><a href='edit_recipe.php?recipe_id=" .$r->recipe_id ."'>edit </a></td>");
			echo("<td><a href='delete_recipe.php?recipe_id=" .$r->recipe_id ."'>delete </a></td>");
			
			echo("</tr>");
		}
	}else{
		echo("<tr><td colspan='4' align='center'>no recipes for this user</td></tr>");
	}

	?>
</table>