<?php 
include("../connection.php");

$tabla = $_GET['tabla'];
$sql = "SELECT * FROM `control` WHERE 1";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
	$cambio_casa = $row['equipo_activo'];
}
if ($tabla == "lineup_v") {
	if ($cambio_casa == 1) {
		contenido_pitcheando($tabla, $conn);
	} else {
		contenido_bateando($tabla, $conn);
	}
} else {
	if ($cambio_casa != 1) {
		contenido_pitcheando($tabla, $conn);
	} else {
		contenido_bateando($tabla, $conn);
	}
}

function activo($activo){
	if ($activo == 1) {
		$activo = "activo";
	}
	return $activo;
}

function contenido_pitcheando($tabla, $conn){
	$sql = "SELECT * FROM $tabla AS Lup INNER JOIN jugador ON Lup.id_jugador=jugador.id WHERE Lup.pitcher_activo=1";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$row = mysqli_fetch_assoc($result);
	} else {
		echo '<table class="table col-lg-12" ><thead class="pizarra-contrario"><tr><th class="col-lg-12 text-center text-light">Error ' . $sql . " " . mysqli_error($conn) . '</th></tr></thead>
			</table>';
	}
	echo '<table class="table col-lg-12">
			<thead class="pizarra-contrario">
				<tr>
					<th class="col-lg-12 text-center text-light">'. $row["numero"] . ', ' . iniciales($row["nombre"]) . ' ' . $row["apellido"] . '</ th>
				</tr>
			</thead>
		</table>
		<table class="table table-sm col-lg-12">
			<thead class="pizarra-contrario">
				<tr class="text-center text-light">
					<th>BOLAS</th>
					<th>STRIKES</th>
					<th>TOTAL</th>
				</tr>
			</thead>
			<tbody class="pizarra-pitcher">
				<tr class="text-center text-light">
					<td>0</td>
					<td>0</td>
					<td>0</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-sm col-lg-12">
			<thead class="pizarra-contrario">
				<tr class="text-center text-light">
					<th>ERA</th>
					<th>IL</th>
					<th>SO</th>
					<th>BB</th>
				</tr>
			</thead>
			<tbody class="pizarra-pitcher">
				<tr class="text-center text-light">
					<td>0.00</td>
					<td>0.00</td>
					<td>0</td>
					<td>0</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-sm col-lg-12">
			<thead class="pizarra-contrario">
				<tr class="text-center text-light">
					<th>JG</th>
					<th>JP</th>
					<th>JS</th>
				</tr>
			</thead>
			<tbody class="pizarra-pitcher">
				<tr class="text-center text-light">
					<td>0</td>
					<td>0</td>
					<td>0</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-sm col-lg-12">
			<thead class="pizarra-contrario">
				<tr class="text-center text-light">
					<th>PROXIMO INNING</th>
					<th></th>
				</tr>
			</thead>
			<tbody class="pizarra-pitcher">';
	$jugadores = array();
	$index = 0;
	$cont = 0;
	$sql = "SELECT * FROM $tabla AS Lup INNER JOIN jugador ON Lup.id_jugador=jugador.id WHERE Lup.lineup_posicion!='P'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$jugadores[] = $row;
			if ($row['activo'] == 1) {
				$index = $cont;
			}
			$cont++;
		}
	} else {
		echo '<tr><th>0 resultados</th></tr>';
	}
	$cont = 1;
	if ($index == count($jugadores) - 1) {
		$i = 0;
	} else {
		$i = $index + 1;
	}
	while ($i <= count($jugadores) && $cont <= 3) {
		if ($i == count($jugadores)) {
			$i = 0;
		}
		echo '<tr class="text-light"><th class="col-lg-10">' . iniciales($jugadores[$i]["nombre"]) . ' ' . $jugadores[$i]["apellido"] . '</th><th class="col-lg-2">.000</th></tr>';
		$cont++;
		$i++;
	}
	echo'
 		</tbody>
	</table>
	<table class="table table-sm col-lg-12">
		<thead class="pizarra-contrario">
			<tr class="text-center text-light">
				<th>VEL</th>
				<th>HORA</th>
			</tr>
		</thead>
		<tbody class="pizarra-pitcher">
			<tr class="text-center text-light">
				<th>0Mph</th>
				<th>'.date('h:i A').'</th>
			</tr>
		</tbody>
	</table>';
}

function contenido_bateando($tabla, $conn){
	echo '<table class="table">
			<thead>';
	$sql = "SELECT * FROM $tabla AS Lup INNER JOIN jugador ON Lup.id_jugador=jugador.id WHERE Lup.lineup_posicion!='P'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<tr class="jugadores text-light ' . activo($row['activo']) . '"><td class="col-lg-8">' . iniciales($row['nombre']) . ' ' . $row['apellido'] . '</td><td class="col-lg-2">' . $row['lineup_posicion'] . '</td><td class="col-lg-2">.000</td></tr>
						';
		}
	} else {
		echo '<tr class="jugadores text-light"><td>Error ' . $sql . " " . mysqli_error($conn) . '</td></tr>';
	}
	echo '</thead></table>';
}

function iniciales($nombre){
	$array = str_split($nombre);
	return($array[0] . ".");
}