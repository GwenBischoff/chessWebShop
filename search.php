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
<!---angezeigtes hier--->
<?php
	$search = null;
	if(!empty ($_GET["search"])){
		$search = $_GET["search"];
	}
?>
<!---Suchfeld und suchen Button--->
		<form id="form-search" name="search-item" method="GET" target="_self" action="">
			<input type="text" name="search" maxlength="32" placeholder="" required><br>
			<input type="submit" value="Search now!"><br>
		</form>
<?php

	$query = "SELECT * FROM `items` WHERE `description` LIKE '%$search%'"; //hier variable einfügen
	$result = $sql->query($query);

	echo "<table>"; // start a table tag in the HTML
	if(!empty ($search)){
		foreach ($result as $row){			
				$id = $row['item_id'];
				echo "<li class='item_pages'>";
				//echo <a href="">; Einzelne Seite Link in DB
				echo "<h3>" . $row['name'] . "</h3>";
				echo "<p>Material: "  . $row['material'] . "</p>";
				echo "<p>Preis: " . $row['price'] . " € " . "</p>";
				echo "<p>" . $row['description'] . "<br />" . "</p>";
				$image =  $row['picture'];
				echo "<img src='$image'>";
				//echo </a>;
				echo "</li>";
		}
	}
?>
<?php
	//Insert Footer
	require_once 'inc/footer.html.inc';
?>