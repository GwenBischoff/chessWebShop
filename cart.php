<?php
	$page_id = 5;
 	//Settings
 	require_once 'inc/configure.php.inc';
 	//Insert header
 	require_once 'inc/header.php.inc';
 	//Create Menu
 	require_once 'inc/menu.php.inc';

//Wenn Anzahl verändert wurde wird dies in quantity geändert
if(isset($_POST['quantity']) && $_POST['item_id']){
	//Wenn Anzahl = 0 aus Session löschen
	if($_POST['quantity'] == 0){
		unset($_SESSION['cart'][$_POST['item_id']]);
	}
	else{
		$_SESSION['cart'][$_POST['item_id']]['quantity'] = $_POST['quantity'];
	}
}
?>
<div class = "wrapper">
	<section>
	<h2>Ihr Warenkorb</h2>
	<table class = 'cart'>
		<thead>
			<tr>
				<th id = "article">Artikel</th>
				<th id = "amount">Anzahl</th>
				<th id = "price">Gesamtpreis</th>
			</tr>
		</thead>
		<tbody>
<?php	// Check if cart exists
	if (!empty($_SESSION['cart'])) { 
		foreach ($_SESSION['cart'] as $article): 
			//Item_id ist auch übergeben, wird dem Nutzer aber nicht angezeigt
			$price = $article['price'] * $article['quantity'];
			?>
			<tr>
				<th>
					<img class = "cart_img" src= <?= $article['img'];?>>
					<div>
						<p><?= $article['name'] ?></p>
						<p> Artikelnummer: <?= $article['item_id'] ?></p>
					</div>
				 </th> 
				<th>
					<form class="cart_quantity_form" action="" method="POST">
					<input type="text" name="quantity" value="<?= $article['quantity'] ?>" maxlength="4">
					<input type="hidden" name="item_id" value="<?= $article['item_id'] ?>">
					<input type="submit" class="submit" value="Ok"/><br></form></th>
				<th><?= $price   ?> &euro;</th>
				<?php $totalprice += $price ?>
			</tr>
		<?php endforeach; ?>	
			<tr class = "cart_item">
				<th></th> 
				<th>Gesamtpreis </th>
				<th><?= $totalprice ?> &euro;</th>
			</tr>
	<?php } 
	else{ ?>
		<tr class = "cart_item">
				<th></th> 
				<th></th>
				<th></th>
			</tr>
	<?php }?>	
			
		</tbody>	
</table>
<form class="cart_to_checkout_form" action="checkout.php" method="POST">
<input type="submit" class="submit" id="checkout_button" value="Weiter"/><br></form></th>
<?php
	//Insert Footer
	require_once 'inc/footer.php.inc';
?>