<?php
/**
* Handles all database queries for the app/site
* 
* Details about this class go here...
* Note that we are not importing the Transaction class. I guess
* it's assumed that the web page will do the import, maybe we need
* to look into 'autoloading'
* 
* @author Niall Kader
*/


class RecipeDataAccess{

	private $link;

	/**
	 * Constructor
	 *
	 * @param connection $link 	The link the the database 		
	 */
	function RecipeDataAccess($link){
		$this->link = $link;
	}

	/**
	* Gets all tranactions
	*
	* @return Transaction[] 	Returns an array of transaction rows
	*/
	function get_all_Recipes(){
		//$qStr = "SELECT id, date, amount, transaction_category_id, notes FROM transactions";
		$qStr = "SELECT recipe_id, recipe_name, user_id, steps, ingredients, recipe_active FROM Recipes";
		//where user_id = ID of user logged in
		$result = mysqli_query($this->link, $qStr);
		//die(mysqli_error($this->link)); // THIS WILL SAVE YOUR LIFE IN DEBUGGING!!!

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

	/**
	 * Retreives a transaction given it's id
	 *
	 * @param int|string $id 	The id of the transaction to fetch
	 *
	 * @return array|null 		An assoc array with the data for a transaction
	 */
	function get_recipes_by_id($user_id){
		$qStr = "SELECT er_role FROM users WHERE user_id = " . mysqli_real_escape_string($this->link, $user_id);

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
		$t = new Transaction();
		$t->id = $row['id'];
		$t->date = $row['date'];
		$t->amount = $row['amount'];
		$t->transaction_category_id = $row['transaction_category_id'];
		$t->notes = htmlentities($row['notes']);

		return $t;
	
	}
}