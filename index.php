<?php
 	$page_id = 0;
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
			require_once 'inc/get_data.php.inc';
		//Begin of Session
			if(isset($_POST['add'])) {
				$add_id = $_POST['add'];

				$session_query = 'SELECT name, price FROM items WHERE item_id = "' . $add_id . '"';
				$session = $sql->query($session_query);
				
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
		?>
<?php
	//Insert Footer
	require_once 'inc/footer.html.inc';
?>