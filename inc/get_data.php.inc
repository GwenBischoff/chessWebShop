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
				<?php $id = $row['item_id']; 
				// Listenelement für jedes Element erstellen
				?>
				<li class='item_pages'>
					<?php // Liste als Container gestalten?>
					<div class= 'item_container'>
						<?php
						// Bild hinzufügen
						$image =  $row['img']; ?>
						<img class= 'item_image' src= <?= "'" . $image . "'" ?>>
						<?php // Container für Beschreibung?>
						<div class= 'item_description_container'>
							<h3> <?= $row['name'] ?> </h3>
							<p>Material: 
								<?php 
									// Holz über wood_id auslesen
									$id = $row['wood'];
									$query = "SELECT * FROM `wood` WHERE `wood_id`= $id";
									$wood = getdata_query($query); 
									foreach ($wood as $wood_row){
										echo $wood_row['name'];
									}
								?></p>
							<p>Preis: <?= $row['price'] . " € " ?> </p>
							<p> <?= $row['description'] ?> <br/></p>
						</div>
					</div>
					<?php
						require_once 'session.php.inc';	
						session($row);
		  			?>
				</li>
			<?php endforeach; 
	}

	function index(){
		//Index page shows all data from database
		$query = "SELECT * FROM `items`";
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

	function login(){
			// Login noch im Aufbau

			$login_email = $_POST['email_login'];
			$query = "SELECT * FROM `person` WHERE `email` LIKE '%$login_email%'"; 
			$result = getdata_query($query);
			foreach ($result as $row): ?>
				<?php $id = $row['person_id']; ?>
							<p>Hallo 
								<?= $row['prename'] ?> 
								<?= $row['name'] ?> 
								!
							</p>
			<?php endforeach; 
	}

?>

	
