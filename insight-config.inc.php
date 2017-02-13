<?php 

if (strstr($_SERVER['HTTP_HOST'], 'yoobee.net.nz')) {
 	// production

	ini_set('display_errors', false);
	ini_set('log_errors', 1);
	ini_set('error_log', getcwd()."/php-error.log");

	define("DB_HOST", 'localhost');
 	define("DB_NAME", 'zakwells_insight');
 	define("DB_USER", 'zakwells_admin');
 	define("DB_PASSWORD", 'sO;KrW?+z%bB');



 } else {
 	// Development

 	ini_set('display_errors', true);
 	ini_set('log_errors', 1);
 	ini_set('error_log', 1);

 	define("DB_HOST", 'localhost');
 	define("DB_NAME", 'insight');
 	define("DB_USER", 'root');
 	define("DB_PASSWORD", '');
 }
