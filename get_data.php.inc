<?php
	//Question to database
	$query = "SELECT * FROM items";
	$result = $sql->query($query);
?>
<table> 
	<?php foreach ($result as $row): ?>
		<?php $id = $row['item_id']; ?>
		<li class='item_pages'>
			<!-- echo <a href="">; Einzelne Seite Link in DB -->
			<h3> <?= $row['name'] ?> </h3>
			<p>Material: <?= $row['material'] ?> </p>
			<p>Preis: <?= $row['price'] . " € " ?> </p>
			<p> <?= $row['description'] ?> <br/></p>
			<?php $image =  $row['picture']; ?>
			<img src= <?= "'" . $image . "'" ?>>
			<?php	
				if(!isset($_SESSION['cart'][$row['item_id']])) {
					// "Add to cart"
					$cart = '<form class="cart_form" action="" method="POST">'.
          				'<input type="hidden" name="add" value="'.$row['item_id'].'" />' .
         				 '<input type="submit" value="Zum Warenkorb hinzufügen"/><br></form>';
  				}
  				else {
     				 // "Take out of cart"
      				$cart = '<form class="cart_form" action="" method="post">'.
          				'<input type="hidden" name="del" value="' . $row['item_id'] . '" />' .
          				'<input type="submit" value="Aus Warenkorb entfernen"/><br></form>';
    			}
    			echo $cart;
  			?>
		</li>
	<?php endforeach; ?>	
</table> 

