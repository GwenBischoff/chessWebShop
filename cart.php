<?php
	$page_id = 5;
 	//Settings
 	require_once 'inc/configure.php.inc';
 	//Insert header
 	require_once 'inc/header.php.inc';
 	//Create Menu
 	require_once 'inc/menu.php.inc';
?>

<div class = "wrapper">
	<section>
	<h2>Ihr Warenkorb</h2>
	<table class = 'cart'>
		<thead>
			<tr>
				<th>Artikel</th>
				<th>Anzahl</th>
				<th>Gesamtpreis</th>
			</tr>
		</thead>
		<tbody>
<?php	// Check if cart exists
	if (isset($_SESSION['cart'])) { 
	foreach ($_SESSION['cart'] as $article): 
		//Item_id ist auch übergeben, wird dem Nutzer aber nicht angezeigt
		?>
		<tr>
			<th>
				<img class = "cart_img" src= <?= $article['img'];?>>
				<div>
					<p><?= $article['name'] ?></p>
					<p> Artikelnummer: <?= $article['item_id'] ?></p>
				</div>
			 </th> 
			<th><?php $quantity = 1?>
				<form class="cart_quantity_form" action="" method="POST">
				<input type="text" name="quantity" placeholder="<?= $quantity ?>" maxlength="4">
				<input type="submit" value="Ok"/><br></form></th>
			<th><?= $article['price'] ?> &euro;</th>
		</tr>
	<?php endforeach; 
	}?>	
	</tbody>	
</table>
<?php
	//Insert Footer
	require_once 'inc/footer.html.inc';
?>