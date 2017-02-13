<?php
namespace App\Controllers;

use App\Views\RegisterView;
use App\models\UsersModel;

Class RegisterController
{
	public function show(){
		$view = new RegisterView();
     	$view->render();

	}
	public function store(){
		// prepare container to hold all error messages
		$errors = [];
		// Validate the form
		// Each field has been filled out
		$emailPattern = '/^[a-zA-Z0-9_\-.]{1,100}@[a-zA-Z0-9_\-.]{1,100}\.[a-zA-Z0-9.]{1,100}$/';

		if ( preg_match($emailPattern, $_POST['email'])) {
			// generate error message
			// die('email good, check database');
			// Look for email in database
			$user = new UsersModel;
			$result = $user->doesThisEmailExist($_POST['email']);

			// If the result is true
			if( $result == true ){
				// Oops email is in use
				$errors['email'] = 'Email in use';
			}
			


		} else {
			// check database

			$errors['email'] = 'Please enter a valid E-mail address.';
		}

		
		// Passwords match and are atleast 8 characters long
		if ( strlen($_POST['password']) == 0) {
			$errors['password'] = 'Required.';
		} elseif (strlen($_POST['password']) < 8) {
			$errors['password'] = 'Must be at least 8 characters long';
		} elseif ($_POST['password'] != $_POST['password2']) {
			$errors['password'] = 'passwords do not match';
		}

		// if validation failed
		if ( count($errors) > 0 ){
			$view = new RegisterView($errors);
     		$view->render();
     		return;
			// Oh dear, errors.
		}

		// If everything is good to go:
		// echo '<pre>';
		// print_r($_POST);
		// Hash the password (don't save in plain text)
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
		// Insert user into database
		$newUser = new UsersModel();
		$newUser->saveNewUser();
		// Log them in automatically (because we're nice)

		// Redirect to account page

	}
}














