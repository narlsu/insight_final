<?php

namespace App\Controllers;
  // 
  // if "page" exists in the address bar then $page= that page, otherwise $page = home"
  $page = ! isset($_GET['page']) ? "home" : $_GET['page'];

  switch ($page) {
    
    case 'home':

      $controller = new HomeController();
      $controller->show();
      break;
    
    case 'about':
      
      $controller = new AboutController();
      $controller->show();
      break;

    case 'login':
      
      $controller = new AccountController;
      $controller->showLoginForm();
      break;

    case 'login.try':
      $controller = new AccountController;
      $controller->processLoginForm();
      break;

    case 'register';
      $controller = new RegisterController();
      $controller->show();
      break;

    case 'register.store':
      $controller = new RegisterController();
      $controller->store();
      break;

    case 'account';
      if ( isset($_SESSION['user_id'])) {

      $controller = new AccountController();
      $controller->show();
        
      } else {
        header('Location: index.php?page=login');
      }
      break;
    case 'travel.edit':
      $controller = new TravelsController();
      $controller ->travelEdit();
      break;
    
    case 'travelhighlight':

      $controller = new TravelsController();
      $controller->showTravelHighlight();
      break;

    break;

    case 'travels.newPost':
      $controller = new TravelsController();
      $controller->newPost();
    break;

    case 'travel.update':
    $controller = new TravelsController;
    $controller->update();
    break;

    case 'logout';
      unset($_SESSION['user_id']);
      unset($_SESSION['privilege']);
       unset($_SESSION['user_email']);
      header('Location: index.php');
      break;



    default:
      echo "Error 404 ! Page not found !";
      break;
  }











