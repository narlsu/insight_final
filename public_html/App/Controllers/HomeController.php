<?php

namespace App\Controllers;

use App\Views\HomeView;
use App\Models\TravelsModel;

Class HomeController
{
	public function show(){

	  $moviesuggest = $this->getMovieSuggestFormData();

	  $movies = new TravelsModel();
	$travelContents = $movies->showAll();
	
      $view = new HomeView(compact('travelContents'));
      $view->render();
	}

	public function getMovieSuggestFormData(){

		if(isset($_SESSION['moviesuggest'])){
        	$moviesuggest = $_SESSION['moviesuggest'];
     	}else {
	        $moviesuggest= [
	                'title' => "",
	                'email' => "",
	                'checkbox' => "",
	                'errors' =>[
	                    'title' => "",
	                    'email' => "",
	                    'checkbox' => ""
	                  ]
	          ];
      } 
       return $moviesuggest;   
	}
}