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
				echo "<li><a href='chess.php' class='selected'>Chess</a></li>";
			} else {
				echo "<li><a href='chess.php'>Chess</a></li>";
			}
			
			//Other page_id = 2
			if ($page_id == 2) {
				echo "<li><a href='other.php' class='selected'>Other</a></li>";
			} else {
				echo "<li><a href='other.php'>Other</a></li>";
			}
			
			//Search page_id = 3
			if ($page_id == 3) {
				echo "<li><a href='search.php' class='selected'>Search</a></li>";
			} else {
				echo "<li><a href='search.php'>Search</a></li>";
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
			//Cart page_id = 5
			if ($page_id == 5) {
				echo "<li><a href='cart.php' class='selected'>Cart</a></li>";
			} else {
				echo "<li><a href='cart.php'>Cart</a></li>";
			}
			
			if ($page_id == 6) {
				
			} else {
				
			}
			
		?>
	</div>
</ul>
</nav>
</header>