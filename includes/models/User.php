<?php
/**
* Model class for transactions in the checkbook
* 
* Note that when the user enters a date, it must be in mm/dd/yyyy format.
* But MySql requires it to be yyyy-mm-dd format
* 
* @author Niall Kader
*/

class User {

	/**
    * @var int 		$id         The id of the tranaction in the DB
   	* @var string 	$date 		The date of the transaction
   	* @var number 	$amount 	The amount of the transaction
   	* @var int 		$transaction_category_id 	The id of the trans category
   	* @var string 	$notes 		Any notes that might descript the transaction
    */

	public $user_id = 0;
	public $user_display_name = "";
	public $user_email = "";
	public $user_role = "";
	public $user_active = "";
	

	/**
	* Validates the data set on 'this' instance of a Transaction
	*
	* @return array|true  	Returns an array that includes validation messages
	*						for each property that is not valid. Returns true if
	*						if the Transaction is valid
	*/
	function is_valid(){
		
		// Populate this array with error messages, if there are any
		$errs = array();

		// validate id - NOTE THAT 0 is a valid id, allows for inserts
		if(is_numeric($this->user_id) !== true || $this->user_id < 0){
			$errs['user_id'] = "ID is not valid";
		}

		
		if(empty($errs)){
			return true;
			console.log('no errors in user.php');
		}else{
			return $errs;
			console.log('error in user.php');
		}
	}
}
