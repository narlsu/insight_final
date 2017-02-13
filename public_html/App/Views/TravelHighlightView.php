<?php
namespace App\Views;

Class TravelHighlightView extends View 
{
	public function render(){
		$page="travelhighlight";
		$title = " Travel Highlight";
		include "templates/master.inc.php";
	}

	public function content(){
		extract($this->data);
		include "templates/travelhighlight.inc.php";
	}
}