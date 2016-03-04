<?php
 	//Settings
 	require_once 'inc/configure.php.inc';
 	//Insert header
 	require_once 'inc/header.php.inc';
 	//Create Menu
 	require_once 'inc/menu.php.inc';
?>

<div class = "wrapper">
	<section>

		<form id="data_checkout_form" name="data_checkout_form" method="POST" action="order_exit.php"></form>
		</br>
		<span>Anschrift</span></br>
		<input form="data_checkout_form" class="checkout" type="text" name="prename" maxlength="64" placeholder="Vorname" required>
		<input form="data_checkout_form" class="checkout" type="text" name="name" maxlength="64" placeholder="Nachname" required></br>
		<input form="data_checkout_form" class="checkout" type="text" name="street" maxlength="64" placeholder="Straße" required>
		<input form="data_checkout_form" class="checkout" type="text" name="streetnumber" maxlength="64" placeholder="Hausnr." required></br>
		<input form="data_checkout_form" class="checkout" type="number" name="zip" placeholder="PLZ" required>
		<input form="data_checkout_form" class="checkout" type="text" name="city" placeholder="Stadt" required></br>
		</br>
		<span>Bezahlung</span></br>
		<select form="data_checkout_form" class="checkout" name="payment" required>
			<option value="Überweisung">Überweisung</option>
			<option value="Vorauskasse">Vorauskasse</option>
		</select></br>
		
		<input form="data_checkout_form" class="checkout" id="submit" type="submit" value="Bestellung absenden"><br>
<?php
	//Insert Footer
	require_once 'inc/footer.php.inc';
?>