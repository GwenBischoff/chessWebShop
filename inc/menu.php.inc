<ul>
	<div class = "left">
		<?php 
			//Home page_id = 0
			if ($page_id == 0) {
				echo "<li><a href='index.php' class='selected'>Home</a></li>";
			} else {
				echo "<li><a href='index.php'>Home</a></li>";
			}
			
			//Chess page_id = 1
			if ($page_id == 1) {
				echo "<li><a href='chess.php' class='selected'>Schach</a></li>";
			} else {
				echo "<li><a href='chess.php'>Schach</a></li>";
			}
			
			//Other page_id = 2
			if ($page_id == 2) {
				echo "<li><a href='other.php' class='selected'>Andere</a></li>";
			} else {
				echo "<li><a href='other.php'>Andere</a></li>";
			}
			
			//Search page_id = 3
			if ($page_id == 3) {
				echo "<li><a href='search.php' class='selected'>Suche</a></li>";
			} else {
				echo "<li><a href='search.php'>Suche</a></li>";
			}
			
			//About page_id = 4
			if ($page_id == 4) {
				echo "<li><a href='about.php' class='selected'>About</a></li>";
			} else {
				echo "<li><a href='about.php'>About</a></li>";
			}
		?>
	</div>
	<div class = "right">
		<?php
			//Cart page_id = 8
			if ($page_id == 8) {
				echo "<li><a href='login.php' class='selected'>Login</a></li>";
			} else {
				echo "<li><a href='login.php'>Login</a></li>";
			}	

			//Cart page_id = 5
			if ($page_id == 5) {
				echo "<li><a href='cart.php' class='selected'>Warenkorb</a></li>";
			} else {
				echo "<li><a href='cart.php'>Warenkorb</a></li>";
			}			
		?>
	</div>
</ul>
</nav>
</header>