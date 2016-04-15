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


class UserDataAccess{

	private $conn;

	/**
	 * Constructor
	 *
	 * @param connection $conn 	The link the the database 		
	 */
	function UserDataAccess($conn){
		$this->link = $conn;
	}

	/**
	* Gets all tranactions
	*
	* @return Transaction[] 	Returns an array of transaction rows
	*/
	function get_all_Users(){
		//$qStr = "SELECT id, date, amount, transaction_category_id, notes FROM transactions";
		$qStr = "SELECT user_id, user_email, user_display_name, user_role, user_active FROM users";
		$result = mysqli_query($this->link, $qStr);
		//die(mysqli_error($this->link)); // THIS WILL SAVE YOUR LIFE IN DEBUGGING!!!

		$users = array();
		
		while($row = mysqli_fetch_array($result)){
			
			// scrub the data before adding it to the transaction
			$u = new User();
			$u->user_id = $row['user_id'];
			$u->user_email = $row['user_email'];
			$u->user_display_name = $row['user_display_name'];
			$u->user_role = $row['user_role'];
			$u->user_active = $row['user_active'];

			
			$users[] = $u;
		}
		
		return $users;
		
	}


}