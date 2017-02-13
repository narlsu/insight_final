<?php

namespace App\Models;

use PDO;

Class UsersModel extends DatabaseModel
{
	protected static $tablename = 'Users';
	protected static $columns = [
	'email',
	'password',
	'first_name',
	'last_name',
	'profile_image'
];
	// Return true is E-mail exists.
	// Return false if E-mail not found.
	public function doesThisEmailExist($email){

		$db = $this->getDatabaseConnection();

		$sql = "SELECT email FROM users WHERE email=:email";

		$statement = $db->prepare($sql);

		$statement->bindValue(':email', $email);

		$statement->execute();

		if ($statement->rowCount() ==1) {
			return true;
		} else {
			return false;
		}
		
	}
	public function saveNewUser(){

		// Get database connection
		$db = $this->getDatabaseConnection();

		// Prepare SQL 
		$sql = "INSERT INTO users (email, password)
				VALUES (:email, :password)";

		$statement = $db->prepare($sql);

		// Bind the form data ot the SQL query
		$statement->bindValue(':email', $_POST['email']);
		$statement->bindValue(':password', $_POST['password']);

		// Run the query
		$result = $statement->execute();

		// Confirm that it worked
		if ( $result == true) {
			// Yay!

			$_SESSION['user_id'] = $db->lastInsertId();
			$_SESSION['privilege'] = 'user';
			$_SESSION['user_email'] = $_POST['email'];

			header('Location: index.php?page=account');
		} else {
			// Not good
		}
		// If it did, log the user in and redirect to new account page!

	}

	// Login functionality
	public function attemptLogin() {

		$db = $this->getDatabaseConnection();

		// Find the password of the user with a matching email
		$sql = "SELECT id, password, privilege, email FROM users
				WHERE email = :email ";

		$statement = $db->prepare($sql);

		$statement->bindValue(':email', $_POST['email']);

		$result = $statement->execute();

		$record = $statement->fetch(PDO::FETCH_ASSOC);

		// Did we get an array? (EMAIL FOUND !)
		if ( is_array($record) ) {
			$result = password_verify($_POST['password'] ,$record['password']);

			if ($result == true ) {
				// log user in
				$_SESSION['user_id'] = $record['id'];
				$_SESSION['privilege'] = $record['privilege'];
				$_SESSION['user_email'] = $record['email'];

				header('Location: index.php?page=account');
			} else {
				// Bad password, return false so user sees error message
			}
		} else {
			// Email not found
			// Tell user bad credentials
			return false;
		}


	}

}