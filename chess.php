<?php
	$page_id = 1;
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
			//Methode index() aufrufen
			require_once 'inc/get_data.php.inc';
			//Übergabewert stimmt noch nicht
			chess();
			sessionfct();
		?>
<?php
	//Insert Footer
	require_once 'inc/footer.html.inc';
?>