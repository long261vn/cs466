<?php 
	$dbhost  = 'localhost';	// database host
	$dbname  = 'cs466';		// database name
	$dbuser  = 'root';		// database user
	$dbpass  = 'root';		// database password
	//global $db;
	// Check connection
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
    try { 
	$db = new PDO("mysql:host={$dbhost};dbname={$dbname};charset=utf8", $dbuser, $dbpass, $options); 
	} 
    catch(PDOException $ex){ 
	die("Failed to connect to the database: " . $ex->getMessage());
	} 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
	
   function sanitizeString($var)
  {
    global $db;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $db->real_escape_string($var);
  } 
  
	session_start(); 
 ?>