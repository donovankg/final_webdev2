<?php
class LoginDataAccess {

	private $conn;

	/**
	 * Constructor
	 *
	 * @param connection $conn 	The link the the database 		
	 */
	function LoginDataAccess($conn){
		$this->link = $conn;


	}
		
	function login($email, $password){
		$email = mysqli_real_escape_string($this->link, $email);
		$password = mysqli_real_escape_string($this->link, $password);
		$qStr = "SELECT user_display_name, user_id FROM users WHERE user_email = '$email' AND user_password = '$password' AND user_active = 'yes'";

	}


	}
?>