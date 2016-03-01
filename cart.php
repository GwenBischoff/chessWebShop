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
	<h2>Your cart</h2>
	<table id = 'cart'>
<?php	// Check if cart exists
	if (isset($_SESSION['cart'])) { 
	?>
	<thead>
		<tr>
			<th>Name</th>
			<th>Preis</th>
			<th>Anzahl</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($_SESSION['cart'] as $article): 
		//Item_id ist auch übergeben, wird dem Nutzer aber nicht angezeigt
		?>
		<tr>
			<th><?= $article['name'] ?></th> 
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