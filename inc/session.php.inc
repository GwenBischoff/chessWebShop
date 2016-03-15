<?php
	
	function session($row){
		$added = false;
		if (isset($_SESSION['cart'][$row['item_id']])){
			$added = true;
		}
		if (isset($_POST['add']) && $_POST['add'] == $row['item_id']){
			$added = true;
		}
		if (isset($_POST['del']) && $_POST['del'] == $row['item_id']){
			$added = false;
		}

		//Session saves all selected items to cart here "add/remove" buttons are created
		if(!$added) {
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