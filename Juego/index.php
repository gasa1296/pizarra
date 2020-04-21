<?php
include "../header.php";

$equipo1;
$equipo2;

$sql = "SELECT * FROM `lineup`";
$result = mysqli_query($conn, $sql);
if ($result) {
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$equipo1 = $row['id_equipo_casa'];
			$equipo2 = $row['id_equipo_visita'];
		}
	} else {
		$sql1 = "SELECT * FROM `lineup_v`";
		$result1 = mysqli_query($conn, $sql1);
		if ($result1) {
			if (mysqli_num_rows($result1) > 0) {
				while ($row = mysqli_fetch_assoc($result1)) {
					$equipo1 = $row['id_equipo_casa'];
					$equipo2 = $row['id_equipo_visita'];
				}
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
<div id="content">
	<div class="panel box-shadow-none content-header">
		<div class="panel-body">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Juego - Selecciona aquí los equipos y el lineup</h3>
				<p class="animated fadeInDown">Principal<span class="fa-angle-right fa"></span>Juego</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 top-20 padding-0">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h3>Equipos</h3>
						</div>
						<div class="col-sm-4">
							<label for="visitante">Equipo visitante</label>
							<select name="equipo_visitante" id="equipo_visitante" onchange="select_jugadores(this)">
								<?php
								$sql = "SELECT * FROM equipo";
								$result = mysqli_query($conn, $sql);
								if ($result) {
									while ($row = mysqli_fetch_assoc($result)) {
										if (isset($equipo2) && $row['id'] == $equipo2) {
											echo '<option value="' . $row["id"] . '" selected>' . $row["nombre"] . '</option>';
										} else {
											echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
										}
									}
								} else {
									echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								}
								?>
							</select>
						</div>
						<div class="col-sm-4">
							<label for="home">Equipo de casa</label>
							<select name="equipo_home" id="equipo_home" onchange="select_jugadores(this)">
								<?php
								$sql = "SELECT * FROM equipo";
								$result = mysqli_query($conn, $sql);
								if ($result) {
									while ($row = mysqli_fetch_assoc($result)) {
										if (isset($equipo1) && $row['id'] == $equipo1) {
											echo '<option value="' . $row["id"] . '" selected>' . $row["nombre"] . '</option>';
										} else {
											echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
										}
									}
								} else {
									echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h5>Visitor</h5>
							<div class="row">
								<div class="col-sm-4">
									<select name="jugadores_visitante" id="jugadores_visitante" class="form-control">
									</select>
								</div>
								<div class="col-sm-4">
									<select name="posicion_visitante" id="posicion_visitante">
										<option value="CF">CF</option>
										<option value="2B">2B</option>
										<option value="LF">LF</option>
										<option value="BD">BD</option>
										<option value="1B">1B</option>
										<option value="RF">RF</option>
										<option value="C">C</option>
										<option value="SS">SS</option>
										<option value="3B">3B</option>
										<option value="P">P</option>
									</select>
								</div>
								<div class="col-sm-4">
									<button class="btn btn-primary" id="visitante" onclick="insercion(this)">Agregar</button>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h5>Homeclub</h5>
							<div class="row">
								<div class="col-sm-4">
									<select name="jugadores_home" id="jugadores_home" class="form-control">
									</select>
								</div>
								<div class="col-sm-4">
									<select name="posicion_home" id="posicion_home">
										<option value="CF">CF</option>
										<option value="2B">2B</option>
										<option value="LF">LF</option>
										<option value="BD">BD</option>
										<option value="1B">1B</option>
										<option value="RF">RF</option>
										<option value="C">C</option>
										<option value="SS">SS</option>
										<option value="3B">3B</option>
										<option value="P">P</option>
									</select>
								</div>
								<div class="col-sm-4">
									<button class="btn btn-primary" id="home" onclick="insercion(this)">Agregar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="responsive-table">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Jugador</th>
											<th>Posicion</th>
										</tr>
									</thead>
									<tbody id="tabla_visitante"></tbody>
								</table>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="responsive-table">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Jugador</th>
											<th>Posicion</th>
										</tr>
									</thead>
									<tbody id="tabla_home"></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="#ventana0" data-toggle="modal"><button class="btn btn-danger">Finalizar Juego</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ventana0">
	<div class="modal-dialog">
		<div class="modal-content">
			<!--Header del Modal-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Finalizar Juego</h4>
			</div>
			<div class="modal-body">
				<h3 class="text-center">¿Estas Seguro de Finalizar el Juego?</h3>
			</div>
			<div class="modal-footer">
				<a href="truncate.php"><button class="btn btn-danger">Finalizar</button></a>
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<script type=" text/javascript" src="main.js"></script>
<?php
include "../footer.php";
?>