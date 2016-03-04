<?php
 	//Settings
 	require_once 'inc/configure.php.inc';
 	//Insert header
 	require_once 'inc/header.php.inc';
 	//Create Menu
 	require_once 'inc/menu.php.inc';
?>

<div class = "wrapper">
	<section>
		<?php 
		person_data_to_db();
		zip_to_db();

		function into_db($query){
			require 'inc/configure.php.inc';
			$sql->query($query);
			$result = $sql->lastInsertId();
			//gibt die letze eingefügte ID zurück
			return $result;
		}

		function person_data_to_db(){
			$prename = $_POST['prename'];
			$name = $_POST['name'];
			$street = $_POST['street'];
			$streetnumber = $_POST['streetnumber'];
			$zip = $_POST['zip'];
			$person_id = into_db("INSERT INTO `person` (`prename`, `name`, `street`, `streetnumber`, `zip`) VALUES ('$prename', '$name', '$street', '$streetnumber', $zip)"); 
			order_to_db($person_id);
		}
		function order_to_db($person_id){
			$payment = $_POST['payment'];
			foreach ($_SESSION['cart'] as $article){
				$totalprice += ($article['price'] * $article['quantity']);
			}
			$order_nr = into_db("INSERT INTO `order`(`person_id`, `total_price`, `payment`) VALUES ('$person_id', $totalprice, '$payment')"); 
			order_nr_to_db($order_nr);
		}
		function order_nr_to_db($order_nr){
			foreach ($_SESSION['cart'] as $article){
				$price = $article['price'] * $article['quantity'];
				$name = $article['name'];
				$quantity = $article['quantity'];
				$order_id = into_db("INSERT INTO `order_nr`(`order_nr`, `article`, `quantity`, `total_price_article`) VALUES ($order_nr, '$name', $quantity, $price)"); 
			}	
		}
		function zip_to_db(){
			$zip = $_POST['zip'];
			$city = $_POST['city'];
			into_db("INSERT INTO `zip` (`zip`, `city) VALUES ($zip, '$city')"); 
			
		}
		/*Vielen Dank & Bestellnummer & PersonenID ausgeben 
		Bestellung noch mal anzeigen
		Datenbank füllen
		Emailadresse hinzufügen
		Drop Session
		*/
		?>
		<p>Vielen Dank für Ihre Bestellung!</p>
<?php
	//Insert Footer
	require_once 'inc/footer.php.inc';
?>
	