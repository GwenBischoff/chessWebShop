<?php 
	$query = $sql->prepare("INSERT INTO `order_id`(`article`, `quantity`, `total_price`)"); 

	$query = $sql->prepare("INSERT INTO `order`(`order_id`, `customer_id`, `` , `gender`, `height`, `born`) VALUES (:name, :haircolor, :race, :gender, :height, :born)");
	$query = $sql->prepare("INSERT INTO `customer`(`customer_id`, `prename`, `name`, `street` , `street_number`, `zip`)");
	$query = $sql->prepare("INSERT INTO `zip`(`zip`, `city`)"); //doppelte einträge
	//Fill the data-array for prepared query
	$data = Array(
		':name' => $_POST['name'],
		':haircolor' => $_POST['haircolor'],
		':race' => $_POST['race'],
		':gender' => $_POST['gender'],
		':height' => $_POST['height'],
		':born' => $_POST['born']
	);
?>