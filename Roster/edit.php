<?php
include "../header.php";
$sql = "SELECT * FROM `jugador` WHERE `id` = '$_GET[id]'";
$result = mysqli_query($conn, $sql);
if ($result) {
	$row = mysqli_fetch_assoc($result);
}
$altura = explode("'", $row['altura']);
?>
<!-- plugins -->
<link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css" />

<!-- start: Content -->
<div id="content">
	<div class="panel box-shadow-none content-header">
		<div class="panel-body">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Editar Jugador</h3>
				<p class="animated fadeInDown">Principal<span class="fa-angle-right fa"></span>Jugadores<span class="fa-angle-right fa"></span>Editar</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 top-20 padding-0">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<div class="row">
						<div class="col">
							<h3>Editar Jugador</h3>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<form method="POST" action="update.php" class="form" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $row['id']; ?>" />
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="nombre">Nombre:</label>
									<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="apellido">Apellido:</label>
									<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" value="<?php echo $row['apellido']; ?>" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="numero">Numero:</label>
									<input type="number" name="numero" id="numero" class="form-control" placeholder="Numero" value="<?php echo $row['numero']; ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="nombre">Altura:</label>
									<select class="form-control" name="pies" id="pies">
										<option value="<?php echo $altura[0] . "'"; ?>"></option>
										<option value="5\'">5'</option>
										<option value="6\'">6'</option>
										<option value="7\'">7'</option>
									</select>
									<select class="form-control" name="pulgadas" id="pulgadas">
										<option value="<?php echo $altura[1]; ?>''"></option>
										<option value="1\'\'">1''</option>
										<option value="2\'\'">2''</option>
										<option value="3\'\'">3''</option>
										<option value="4\'\'">4''</option>
										<option value="5\'\'">5''</option>
										<option value="6\'\'">6''</option>
										<option value="7\'\'">7''</option>
										<option value="8\'\'">8''</option>
										<option value="9\'\'">9''</option>
										<option value="10\'\'">10''</option>
										<option value="11\'\'">11''</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="apellido">Peso(lbs):</label>
									<input type="number" name="peso" id="peso" class="form-control" placeholder="Peso" value="<?php echo $row['peso']; ?>" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="numero">Año de Firma:</label>
									<input type="number" name="firma" id="firma" class="form-control" placeholder="Año de Firma" value="<?php echo $row['firma']; ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="Posicion">Posicion</label>
									<select name="posicion" id="posicion" class="form-control">
										<option value="<?php echo $row['posicion']; ?>"></option>
										<option value="PT">Pitcher</option>
										<option value="IF">Infielder</option>
										<option value="OF">Outfielder</option>
										<option value="CT">Catcher</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="Posicion">Nivel</label>
									<select name="nivel" id="nivel" class="form-control">
										<option value="<?php echo $row['nivel']; ?>"></option>
										<option value="1">Grande</option>
										<option value="2">Paralela</option>
										<option value="3">Menores</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<label for="equipos">Equipos:</label>
								<select name="id_equipo" id="id_equipo">
									<?php
									$sql = "SELECT * FROM equipo";
									$result = mysqli_query($conn, $sql);
									if ($result) {
										while ($row1 = mysqli_fetch_assoc($result)) {
											echo '<option value="' . $row1['id'] . '">' . $row1['nombre'] . '</option>';
										}
									}
									?>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label for="VB">VB:</label>
									<input type="number" name="VB" id="VB" class="form-control" value="<?php echo $row['VB']; ?>" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label for="C">C:</label>
									<input type="number" name="C" id="C" class="form-control" value="<?php echo $row['C']; ?>" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label for="AVE">AVE:</label>
									<input type="number" name="AVE" id="AVE" class="form-control" value="<?php echo $row['AVE']; ?>" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label for="CI">CI:</label>
									<input type="number" name="CI" id="CI" class="form-control" value="<?php echo $row['CI']; ?>" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label for="HR">HR:</label>
									<input type="number" name="HR" id="HR" class="form-control" value="<?php echo $row['HR']; ?>" />
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="JG">JG:</label>
									<input type="number" name="JG" id="JG" class="form-control" value="<?php echo $row['JG']; ?>" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="JP">JP:</label>
									<input type="number" name="JP" id="JP" class="form-control" value="<?php echo $row['JP']; ?>" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="JS">JS:</label>
									<input type="number" name="JS" id="JS" class="form-control" value="<?php echo $row['JS']; ?>" />
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="ERA">ERA:</label>
									<input type="number" name="ERA" id="ERA" class="form-control" value="<?php echo $row['ERA']; ?>" />
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="IL">IL:</label>
									<input type="number" name="IL" id="IL" class="form-control" value="<?php echo $row['IL']; ?>" />
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="SO">SO:</label>
									<input type="number" name="SO" id="SO" class="form-control" value="<?php echo $row['SO']; ?>" />
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="BB">BB:</label>
									<input type="number" name="BB" id="BB" class="form-control" value="<?php echo $row['BB']; ?>" />
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="estado">Estado:</label>
									<select name="estado" id="estado" class="form-control">
										<option value="<?php echo $row['estado']; ?>"></option>
										<option value="1">Activo</option>
										<option value="0">Inactivo</option>
									</select>
								</div>
							</div>
							<div class="col-sm-9">
								<div class="form-group">
									<label for="foto">Foto</label>
									<input type="file" class="form-control" id="imagen1" name="imagen1"/>
								</div>
							</div>
						</div>

						<button name="submit" type="submit" class="btn btn-success" aria-hidden="true"><span class="glyphicon glyphicon-ok"></span>Editar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: Content -->
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatables-example').DataTable();
	});
</script>
<?php
include "../footer.php";

function colorBoton($R32)
{
	if ($R32 == 1) {
		$color = 'btn-success';
	} else {
		$color = 'btn-light';
	}
	return $color;
}
?> 