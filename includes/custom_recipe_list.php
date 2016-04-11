

<table border="1">
	<thead>
		<th>recipe name</th>
		<th>steps</th>
		<th>ingredients</th>
		<th>active?</th>
	</thead>
	<tbody> 

<?php
include('includes/dataaccess/RecipeDataAccess.php');
require_once("includes/models/recipe.php"); 
$da = new RecipeDataAccess($link);
$recipes = $da->get_all_Recipes();


	if(!empty($recipes)){
		foreach ($recipes as $r) {
			echo("<tr>");
			echo("<td>" . $r->recipe_name . "</td>");
			echo("<td>" . $r->steps . "</td>");
			echo("<td>" . $r->ingredients . "</td>");
			echo("<td>" . $r->recipe_active . "</td>");
			
			echo("</tr>");
		}
	}else{
		echo("<tr><td colspan='4' align='center'>no recipes for this user</td></tr>");
	}

	?>
</table>