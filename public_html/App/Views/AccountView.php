<?php

namespace App\Views;

Class AccountView extends View 
{
	public function render(){
		$page="account";
		$title = " Your Account";
		include "templates/master.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/account.inc.php";
	}
}