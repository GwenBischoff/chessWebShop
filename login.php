<?php
 	$page_id = 8;
 	//Settings
 	require_once 'inc/configure.php.inc';
 	//Insert header
 	require_once 'inc/header.php.inc';
 	//Create Menu
 	require_once 'inc/menu.php.inc';
?>

<div class = "wrapper">
	<section>
		</br>
		<form id="login_form" name="data_checkout_form" method="POST" action=""></form>
		<input form="login_form" class="login" type="text" name="email_login" placeholder="Email" required></br>
		</br>
		<input form="login_form" class="login" id="submit" type="submit" value="Einloggen"><br>
		<?php
			// Login noch im Aufbau
			require_once 'inc/get_data.php.inc';
			login();
		?>
<?php
	//Insert Footer
	require_once 'inc/footer.php.inc';
?>