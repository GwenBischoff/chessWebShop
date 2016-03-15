<?php
 	$page_id = 10;
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
			require_once 'inc/save_data.php.inc';
			person_data_to_db();
			zip_to_db();
		?>

<?php
	//Insert Footer
	require_once 'inc/footer.php.inc';
?>
	