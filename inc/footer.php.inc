		<!-- Footer-Menue created -->
				<div class = "footer">
					</br>
					<ul>
						<?php if ($page_id == 6) {
							echo "<li><a href='contact.php'class='selected'>Kontakt</a></li>";
						} else {
							echo "<li><a href='contact.php'>Kontakt</a></li>";
						}
						if ($page_id == 7) {
							echo "<li><a href='impressum.php'class='selected'>Impressum</a></li>";
						} else {
							echo "<li><a href='impressum.php'>Impressum</a></li>";
						}	?>		
					</ul>
					<ul class = "copy">
						<li>&copy; 2016 Gwendolyn Bischoff</li>
					</ul>
				</div>
			</section> <!--- Wrapper geschlossen--->
		</div>
	</body>
</html>