<?php

include "../connection.php";
$arreglo = array();
$arreglo['lineup_h'] = "";
$arreglo['lineup_v'] = "";

$sql = "SELECT * FROM `lineup` INNER JOIN `jugador` ON lineup.id_jugador = jugador.id WHERE lineup.id_equipo_casa='$_REQUEST[e1]' AND lineup.id_equipo_visita='$_REQUEST[e2]'";

$result = mysqli_query($conn, $sql);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$arreglo['lineup_h'] = $arreglo['lineup_h'] . "<tr><td>" . $row['nombre'] . " " . $row['apellido'] . "</td><td><div class='row'><div class='col-sm-6'><select name='" . $row['id'] . "' id='" . $row['id'] ."' class='home'  onchange='cambio_posicion(this)'>" . posicion($row) . "</select></div><div class='col-sm-6'>" . activo($row, 'lineup') . "</div></div></td></tr>";
	}
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "SELECT * FROM `lineup_v` INNER JOIN `jugador` ON lineup_v.id_jugador = jugador.id WHERE lineup_v.id_equipo_casa='$_REQUEST[e1]' AND lineup_v.id_equipo_visita='$_REQUEST[e2]'";

$result = mysqli_query($conn, $sql);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$arreglo['lineup_v'] = $arreglo['lineup_v'] . "<tr><td>" . $row['nombre'] . " " . $row['apellido'] . "</td><td><div class='row'><div class='col-sm-6'><select name='" . $row['id'] . "' id='" . $row['id'] ."' class='visitante'  onchange='cambio_posicion(this)'>" . posicion($row) . "</select></div><div class='col-sm-6'>" . activo($row, 'lineup_v') . "</div></div></td></tr>";
	}
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

function posicion($row){
	$retorno = "";
	$cf = "<option value='CF'>CF</option>";
	$b2 = "<option value='2B'>2B</option>";
	$lf = "<option value='LF'>LF</option>";
	$bd = "<option value='BD'>BD</option>";
	$b1 = "<option value='1B'>1B</option>";
	$rf = "<option value='RF'>RF</option>";
	$c = "<option value='C'>C</option>";
	$ss = "<option value='SS'>SS</option>";
	$b3 = "<option value='3B'>3B</option>";
	$p = "<option value='P'>P</option>";
	switch ($row['lineup_posicion']) {
		case 'CF':
			$cf = "<option value='CF' selected>CF</option>";
			break;
		case '2B':
			$b2 = "<option value='2B' selected>2B</option>";
			break;
		case 'LF':
			$lf = "<option value='LF' selected>LF</option>";
			break;
		case 'BD':
			$bd = "<option value='BD' selected>BD</option>";
			break;
		case '1B':
			$b1 = "<option value='1B' selected>1B</option>";
			break;
		case 'RF':
			$rf = "<option value='RF' selected>RF</option>";
			break;
		case 'C':
			$c = "<option value='C' selected>C</option>";
			break;
		case 'SS':
			$ss = "<option value='SS' selected>SS</option>";
			break;
		case '3B':
			$b3 = "<option value='3B' selected>3B</option>";
			break;
		case 'P':
			$p = "<option value='P' selected>P</option>";
			break;
	}
	return $cf.$b2.$lf.$bd.$b1.$rf.$c.$ss.$b3.$p;
}

function activo($row, $casa_visitante){
	$boton="<button id='".$casa_visitante."-".$row['id_jugador']."-".$row['activo']."' class='btn";
	if ($row['activo'] == 1) {
		$boton = $boton." btn-danger' onclick='activo_inactivo(this)'>Activo</button>";
	} else {
		$boton = $boton." btn-secondary' onclick='activo_inactivo(this)'>Inactivo</button>";
	}
	return $boton;
}

echo json_encode($arreglo);
 