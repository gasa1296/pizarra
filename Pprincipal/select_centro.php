<?php
include("../connection.php");

$arreglo = array();

$sql = "SELECT * FROM `control` WHERE 1";
$result = mysqli_query($conn, $sql);
if($result){
	$row = mysqli_fetch_assoc($result);
	if($row['presentar_jugador'] == 1){
		$arreglo['estilo'] = '<style>#presentacion{height:100vh;display: block;}#juego{display: none;}</style>';
	}
	else{
		$arreglo['estilo'] = '<style>#presentacion{display: none;}#juego{display: block;}</style>';
	}

	if($row['equipo_activo']==1){
		$sql = "SELECT * FROM lineup INNER JOIN jugador ON lineup.id_jugador=jugador.id WHERE lineup.activo=1";
	}else{
		$sql = "SELECT * FROM lineup_v INNER JOIN jugador ON lineup_v.id_jugador=jugador.id WHERE lineup_v.activo=1";
	}
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$row = mysqli_fetch_assoc($result);
		$row['nombre'] = iniciales($row["nombre"]);
		if($row['foto'] == ""){
			$row['foto'] = "ejemplos/FONDOVACIO.jpg";
		}
		else{
			$row['foto'] = "../Roster/foto_jugadores/".$row["foto"];
		}
		$arreglo['centro'] = $row;
	}else{
		$array['mensaje_centro'] = "Error: " . $sql . " " . mysqli_error($conn);
	}
}
else{
	$arreglo['mensaje_control'] = "Error: " . $sql . " " . mysqli_error($conn);
}

$sql = "SELECT * FROM `contador` WHERE 1";
$result = mysqli_query($conn, $sql);
if($result){
	while($row = mysqli_fetch_assoc($result)) {
		$arreglo['contador'] = $row;
	}
}
else{
	$arreglo['mensaje_contador'] = "Error: " . $sql . " " . mysqli_error($conn);
}

$sql = "SELECT * FROM equipo INNER JOIN lineup_v ON equipo.id=lineup_v.id_equipo_casa";
$result = mysqli_query($conn, $sql);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$arreglo['img_casa'] = "../Equipos/logo_equipos/".$row['logo'];
	}
} else {
	$arreglo['mensaje_imagen_casa'] = 'Error: ' . $sql . ' ' . mysqli_error($conn);
}

$sql = "SELECT * FROM equipo INNER JOIN lineup_v ON equipo.id=lineup_v.id_equipo_visita";
$result = mysqli_query($conn, $sql);
if($result){
	while ($row = mysqli_fetch_assoc($result)) {
		$arreglo['img_visita'] = "../Equipos/logo_equipos/".$row['logo'];
	}
}
else{
	$arreglo['mensaje_imagen_visita'] = 'Error: ' . $sql . ' ' . mysqli_error($conn);
}

echo json_encode($arreglo);

function iniciales($nombre){
	$array = str_split($nombre);
	return($array[0] . ".");
}
?>
