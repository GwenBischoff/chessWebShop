<?php
	function getdata_query($query){
		require_once 'configure.php.inc';
		$result = $sql->query($query);
		return $result;
	}
	function index(){
	//Question to database
		$query = "SELECT * FROM items";
		$result = getdata_query($query);
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
						session($row);
		  			?>
				</li>
			<?php endforeach; ?>	
		</table> 
	<?php
	}
	function chess(){

	}
	function search($search){
		$query = "SELECT * FROM `items` WHERE `description` LIKE '%$search%'"; //hier variable einfügen
		$result = getdata_query($query);

		echo "<table>"; // start a table tag in the HTML
		if(!empty ($search)){
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
						session($row);
		  			?>
				</li>
			<?php endforeach; ?>	
		</table> 
		<?php
		}
	}
	function session($row){
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
			//Session Element hinzufügen
			if(isset($_POST['add'])) {
				$add_id = $_POST['add'];

				$session_query = 'SELECT name, price FROM items WHERE item_id = "' . $add_id . '"';
				$session = getdata_query($session_query);

				if((mysqli_num_rows($session)) > 0) {
					$data = mysqli_fetch_array($session);
					$article = $data['name'];
					$price = $data['price'];

					$new = array ('name' => $article, 'price' => $price);
					//Save article with data
					$_SESSION['cart'][$add_id] = $new;
				}
				else {
					echo 'No such ID';
				}
			}
			//Session Element entfernen
			if(isset($_POST['del'])) {
      			$del_id = $_POST['del'];
      
      			unset($_SESSION['cart'][$del_id]);
  			}
	}
?>

	
