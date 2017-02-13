<?php

namespace App\Views;

Class TravelsView extends View 
{
	public function render(){
		$page="travels.newPost";
		$title = " new post";
		include "templates/master.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/account.inc.php";
	}
}
