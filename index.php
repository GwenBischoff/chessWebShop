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
			//Methode index() & session fct aufrufen
			require_once 'inc/get_data.php.inc';
			index();
			sessionfct();
		?>
<?php
	//Insert Footer
	require_once 'inc/footer.php.inc';
?>