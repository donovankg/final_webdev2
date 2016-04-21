<?php
/**
* Handles all database queries for the app/site
* 
* Details about this class go here...
* Note that we are not importing the Transaction class. I guess
* it's assumed that the web page will do the import, maybe we need
* to look into 'autoloading'
* 
* @author Donovan Goldston
*/


class RecipeDataAccess{

	private $conn;

	/**
	 * Constructor
	 *
	 * @param connection $conn 	The link the the database 		
	 */
	function RecipeDataAccess($conn){
		$this->link = $conn;
	}

	/**
	* Gets all tranactions
	*
	* @return Transaction[] 	Returns an array of transaction rows
	*/
	
	function get_all_Recipes(){
		//$qStr = "SELECT id, date, amount, transaction_category_id, notes FROM transactions";

		$qStr = "SELECT recipe_id, recipe_name, user_id, steps, ingredients, recipe_active FROM recipes where user_id ="  . $_SESSION['user_id'];

		
		//where user_id = ID of user logged in
		$result = mysqli_query($this->link, $qStr);
		
		//die(mysqli_error($this->link)); // THIS WILL SAVE YOUR LIFE IN DEBUGGING!!!
		//echo($qStr);
		//die();
		$recipes = array();
		
		while($row = mysqli_fetch_array($result)){
			
			// scrub the data before adding it to the transaction
			$r = new Recipe();
			$r->recipe_id = $row['recipe_id'];
			$r->recipe_name = $row['recipe_name'];
			$r->user_id = $row['user_id'];
			$r->steps = $row['steps'];
			$r->ingredients = $row['ingredients'];
			$r->recipe_active = $row['recipe_active'];

			
			$recipes[] = $r;

		}
		
		return $recipes;
		
	}
	function get_recipe_by_id($recipe_id){
		//$qStr = "SELECT id, DATE_FORMAT(date, '%m/%d/%Y') as date, amount, transaction_category_id, notes FROM transactions WHERE id = " . mysqli_real_escape_string($this->link, $id);
		$qStr = "SELECT * FROM recipes Where recipe_id = " . mysqli_real_escape_string($this->link, $recipe_id);
		//die($qStr);
		
		$result = mysqli_query($this->link, $qStr);
		//die(mysqli_error($this->link)); // THIS WILL SAVE YOUR LIFE IN DEBUGGING!!!

		if(mysqli_num_rows($result) !== 1){
			// we have a problem
			// report error
			return null;
		}

		$row = mysqli_fetch_assoc($result);

		// scrub the data
		$r = new Recipe();
		$r->recipe_id = $row['recipe_id'];
		$r->recipe_name = $row['recipe_name'];
		$r->steps = $row['steps'];
		$r->ingredients = $row['ingredients']; 	
		$r->recipe_active = $row['yes'];



		return $r;




}

}