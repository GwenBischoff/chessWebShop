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
			//Alle anfragen an die Datenbank werden über diese Funktion ausgeführt
			require 'inc/configure.php.inc';
			$sql->query($query);
			$result = $sql->lastInsertId();
			//gibt die letze eingefügte ID zurück
			return $result;
		}

		function person_data_to_db(){
			// Fügt den Vornamen, Namen, Straße, Hausnr, PLZ zur Tabelle `person` in der DB hinzu
			$prename = $_POST['prename'];
			$name = $_POST['name'];
			$street = $_POST['street'];
			$streetnumber = $_POST['streetnumber'];
			$zip = $_POST['zip'];
			$person_id = into_db("INSERT INTO `person` (`prename`, `name`, `street`, `streetnumber`, `zip`) VALUES ('$prename', '$name', '$street', '$streetnumber', $zip)"); 
			//Die ID des Eintrags wird als Kundennummer weiter gegeben
			order_to_db($person_id);
		}
		function order_to_db($person_id){
			// Fügt die Kundennummer, den Gesamtpreis der Bestellung und die Zahlungsart zur Tabelle `order` in der DB hinzu
			$payment = $_POST['payment'];
			foreach ($_SESSION['cart'] as $article){
				$totalprice += ($article['price'] * $article['quantity']);
			}
			$order_nr = into_db("INSERT INTO `order`(`person_id`, `total_price`, `payment`) VALUES ('$person_id', $totalprice, '$payment')"); 
			//Die ID des Eintrags wird als Bestellnr weiter gegeben sowie die Kundennummer
			order_nr_to_db($person_id, $order_nr);
		}
		function order_nr_to_db($person_id, $order_nr){
			// Fügt die Bestellnr, Artikel, Anzahl der Artikel und Preis der gekauften Artikel für jeden Artikeltyp einzeln zur Tabelle `order_nr` in der DB hinzu
			$payment = $_POST['payment'];
			foreach ($_SESSION['cart'] as $article){
				$price = $article['price'] * $article['quantity'];
				$name = $article['name'];
				$quantity = $article['quantity'];
				$order_id = into_db("INSERT INTO `order_nr`(`order_nr`, `article`, `quantity`, `total_price_article`) VALUES ($order_nr, '$name', $quantity, $price)"); 
			}
			end_session($person_id, $order_nr);	
		}
		function zip_to_db(){
			// Fügt die PLZ zur Tabelle 'zip' in der DB hinzu
			$payment = $_POST['payment'];
			$zip = $_POST['zip'];
			$city = $_POST['city'];
			into_db("INSERT INTO `zip` (`zip`, `city) VALUES ($zip, '$city')"); 
			
		}
		function end_session($person_id, $order_nr){
		?>
			<p>Vielen Dank für Ihre Bestellung!</p>	</br>
			<p>Ihre Bestellnummer lautet: <?=$order_nr?></p>
			<p>Ihre Kundennummer lautet: <?=$person_id?></p>
		<?php
			//leert die Session für den Warenkorb
			session_unset();
		} ?>

<?php
	//Insert Footer
	require_once 'inc/footer.php.inc';
?>
	