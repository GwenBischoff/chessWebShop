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
			var_dump($result);
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
			$order_id = into_db("INSERT INTO `order`(`person_id`, `total_price`, `payment`) VALUES ('$person_id', $totalprice, '$payment')"); 
			order_nr_to_db($order_id);
		}
		function order_nr_to_db(){
			//hier mit  $order_id weiter arbeiten
		}
		function zip_to_db(){
			$zip = $_POST['zip'];
			$city = $_POST['city'];
			into_db("INSERT INTO `zip` (`zip`, `city) VALUES ($zip, '$city')"); 
			
		}
		
		/*foreach ($_SESSION['cart'] as $article){
		$price = $article['price'] * $article['quantity'];
			$name = $article['name'];
			$quantity = $article['quantity'];
			$order_id = into_db("INSERT INTO `order_nr`(`article`, `quantity`, `total_price_article`) VALUES ('$name', '$quantity', '$price')"); 
			var_dump($result);	
		} 
		
		$query = $sql->prepare("INSERT INTO `person`(`prename`, `name`, `` , `gender`, `height`, `born`) VALUES (:name, :haircolor, :race, :gender, :height, :born)");

		//Fill the data-array for prepared query
		$data = Array(
			':name' => $_POST['name'],
			':haircolor' => $_POST['haircolor'],
			':race' => $_POST['race'],
			':gender' => $_POST['gender'],
			':height' => $_POST['height'],
			':born' => $_POST['born']
		);

		$query = $sql->prepare("INSERT INTO `customer`(`customer_id`, `prename`, `name`, `street` , `street_number`, `zip`)");
		$query = $sql->prepare("INSERT INTO `zip`(`zip`, `city`)"); //doppelte einträge
		*/?>
<?php
	//Insert Footer
	require_once 'inc/footer.php.inc';
?>
	