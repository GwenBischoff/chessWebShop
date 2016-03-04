<?php
	//Show all errors
	error_reporting(E_ALL);
	
	//Username & Passwort angeben
	$username = 'abr865';
	$password = 'Kiwitorte'; // für MAMP: root
	$db = 'abr865_shop';
	/*$host = 'localhost';
	$port = 3306;*/


try {
   $sql = new PDO("mysql:host=localhost;dbname=$db", $username, $password);
   $sql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
   print "Database Error: ".$e->getMessage();
}
//Conntect to database with MAMP
/*$sql = mysqli_init();
$success = mysqli_real_connect(
   $sql, 
   $host, 
   $username, 
   $password, 
   $db,
   $port
);*/
?>