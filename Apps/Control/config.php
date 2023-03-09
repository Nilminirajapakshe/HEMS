<?php

//Returns the current session status
session_start();	

/**  DATABASE CONFIGURATION * */
define('DB_HOST', 'localhost');
define('DB_PORT', '3305');
define('DB_NAME', 'db_hems');
define('DB_USER', 'root');
define('DB_PASS', '');

/**  DATABASE CONNECTION-STRING 
 * 		 * Creates a PDO instance representing a connection to a database
		 * <p>Creates a PDO instance to represent a connection to the requested database.</p>* */
    $conn = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	  //to display error messge
		
/** SITE CONFIGURATION  * */
define('BASE_URL', 'http://localhost/HEMS/');
define('LOCAL_PATH', 'C:/\xampp/\htdocs/\HEMS/\/');
define('SITE_TITLE', 'Hospital Equipment Managment System');

// define design header footer body
require_once 'template.php';


?>