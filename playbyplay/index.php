<?php
include "../header.php";
$fecha = date("Y/m/d");
$sql = "SELECT * FROM `lineup` WHERE `fecha`='$fecha'";
$equipo1;
$equipo2;
$result = mysqli_query($conn, $sql);
if($result){
	while($row = mysqli_fetch_assoc($result)){
		$equipo1 = $row ['id_equipo_casa'];
		$equipo2 = $row	['id_equipo_visita'];
	}
}
?>
<div id="content">
	<div class="panel box-shadow-none content-header">
		<div class="panel-body">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Play by Play</h3>
				<p class="animated fadeInDown">Principal<span class="fa-angle-right fa"></span>Play by Play</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 top-20 padding-0">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					

					<form  method="POST" action="save.php">
						<div class="row">
							<div class="col-lg-4">
                  <div class="form-group">
							 <label>Actuacion</label>
                    <input class="form-control" name="action" placeholder="Insertar Nombre" required>
                </div>
                 <div class="form-group">
							 <label>Inning</label>
                    <input class="form-control" name="inning" placeholder="Insertar Nombre" required>
                </div>

   <div class="form-group">
										<select name="out_noout" id="posicion_home">
											<option value="out">Out</option>
											<option value="noout">No Out</option>
											<option value="nada">Nada</option>
											
										</select>
									</div>
								


            </div>
                  </div>
						</div>
						 <button type="submit" class="btn btn-success">Guardar</button> 
					</form>
				</div>
				<div class="panel-body">
					<div class="row">
					
					</div>								
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="main.js"></script>
<?php
include "../footer.php";
?>