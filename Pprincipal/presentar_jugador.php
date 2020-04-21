<?php
include "../header.php";
?>
<script src="main1.js"></script>
<div id="content">
	<br>
	<div class="row">
		<div class="col-sm-6">
			<select name="jugador" id="select_jugadores" onchange="update_jugador_presentacion(this)">
				
			</select>
		</div>
		<div class="col-sm-6" id="estado">
			
		</div>
	</div>
		
</div>
<?php
include "../footer.php";
?>