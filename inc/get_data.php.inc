<?php
	function getdata_query($query){
		//Query to database
		require 'configure.php.inc';
		$result = $sql->query($query);
		//returns results
		return $result;
	}

	function show_data($result){
		//shows results on website
		foreach ($result as $row): ?>
				<?php $id = $row['item_id']; ?>
				<li class='item_pages'>
					<div class= 'item_container'>
						<?php $image =  $row['img']; ?>
						<img class= 'item_image' src= <?= "'" . $image . "'" ?>>
						<div class= 'item_description_container'>
						<!-- echo <a href="">; Einzelne Seite Link in DB -->
							<h3> <?= $row['name'] ?> </h3>
							<p>Material: <?= $row['material'] ?> </p>
							<p>Preis: <?= $row['price'] . " € " ?> </p>
							<p> <?= $row['description'] ?> <br/></p>
						</div>
					</div>
					<?php	
						session($row);
		  			?>
				</li>
			<?php endforeach; 
	}

	function index(){
		//Index page shows all data from database
		$query = "SELECT * FROM `items";
		$result = getdata_query($query);
		show_data($result);
	}


	function chess(){
		//Chess page shows all chess items from database
		$query = "SELECT * FROM `items` WHERE `itemtyp` LIKE 'chess'"; 
		$result = getdata_query($query);
		show_data($result);
	}


	function other(){
		//Other page shows all non chess items from database
		$query = "SELECT * FROM `items` WHERE `itemtyp`  NOT LIKE 'chess'"; 
		$result = getdata_query($query);
		show_data($result);
	}


	function search($search){
		//Search page shows all searched items from database
		$query = "SELECT * FROM `items` WHERE `description` LIKE '%$search%'"; 
		$result = getdata_query($query);

		if(!empty ($search)){
			show_data($result);
		}
	}

	function session($row){
		//Session saves all selected items to cart here "add/remove" buttons are created
		if(!isset($_SESSION['cart'][$row['item_id']])) {
			// Form & button "Add to cart"
			$cart = '<form class="cart_form" action="" method="POST">'.
  				'<input type="hidden" name="add" value="'.$row['item_id'].'" />' .
 				 '<input type="submit" class="submit" value="Zum Warenkorb hinzufügen"/><br></form>';
		}
		else {
			 // Form & button "Take out of cart"
			$cart = '<form class="cart_form" action="" method="POST">'.
				'<input type="hidden" name="del" value="' . $row['item_id'] . '" />' .
				'<input type="submit" class="submit" value="Aus Warenkorb entfernen"/><br></form>';
		}
		echo $cart;
	}

	function sessionfct(){
		//Session saves all selected items to cart
		//Add session element
		if(isset($_POST['add'])) {
			$add_id = $_POST['add'];

			$session_query = "SELECT `item_id`, `name`, `price`, `img` FROM `items` WHERE `item_id` = $add_id";
			$session = getdata_query($session_query);
			var_dump(($session-> rowCount()));
			if(($session-> rowCount()) > 0) {
				$data = $session->fetch(PDO::FETCH_LAZY);
				$item_id = $data['item_id'];
				$article = $data['name'];
				$price = $data['price'];
				$img = $data['img'];
				$quantity = 1;
				$new = array ('name' => $article, 'price' => $price, 'img' => $img, 'item_id' => $item_id, 'quantity' => $quantity);
				//Save article with data
				$_SESSION['cart'][$add_id] = $new;

			}
		}
		//Remove session element
		if(isset($_POST['del'])) {
  			$del_id = $_POST['del'];
  
  			unset($_SESSION['cart'][$del_id]);
		}
	}
?>

	
