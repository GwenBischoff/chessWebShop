<?php
	$page_id = 3;
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
	$search = null;
	if(!empty ($_GET["search"])){
		$search = $_GET["search"];
	}
?>
	<form id="form-search" name="search-item" method="GET" target="_self" action="">
		<input type="text" name="search" maxlength="32" placeholder="" required><br>
		<br>
		<input type="submit" value="Search now!"><br>
	</form>
<?php
	require_once 'inc/get_data.php.inc';
	search($search);

?>
<?php
	//Insert Footer
	require_once 'inc/footer.html.inc';
?>