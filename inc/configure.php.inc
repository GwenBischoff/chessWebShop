<?php
	//Show all errors
	error_reporting(E_ALL);
	
	//Username & Passwort angeben
	$username = 'root';
	$password = 'root'; // für MAMP: root
	
	//Conntect to database with XAMPP
	/*try {
	   $sql = new PDO('mysql:host=localhost;dbname=chess_shop', $username, $password);
	   $sql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
	   print "Database Error: ".$e->getMessage();
	}*/
	
	//Conntect to database with MAMP

$db = 'chess_shop';
$host = 'localhost';
$port = 3306;

$sql = mysqli_init();
$success = mysqli_real_connect(
   $sql, 
   $host, 
   $username, 
   $password, 
   $db,
   $port
);
?>