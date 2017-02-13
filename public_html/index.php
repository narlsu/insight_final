<?php

  date_default_timezone_set("Pacific/Auckland");

  error_reporting(E_ALL);
  require '../insight-config.inc.php';
require "vendor/autoload.php";

  session_start();

  

  require "routes.php";
  