<?php

include "../connection.php";

$jugadores_sust = array();
$tabla = "";

if ($_REQUEST['tp'] == "home") {
	$tabla = "lineup";
} else {
	$tabla = "lineup_v";
}

$sql = "SELECT * FROM $tabla WHERE `lineup_posicion`='$_REQUEST[pos]' AND `id_jugador`!=$_REQUEST[ij]";
$result = mysqli_query($conn, $sql);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$jugadores_sust[] = $row;
	}
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

for ($i = 0; $i < count($jugadores_sust); $i++) {
	$id = $jugadores_sust[$i]['id_jugador'];
	if ($_REQUEST['pos'] == 'P') {
		$sql = "UPDATE $tabla SET `id_jugador`=$_REQUEST[ij], `pitcher_activo`=1, `id_equipo_casa`=$_REQUEST[e1], `id_equipo_visita`=$_REQUEST[e2] WHERE `id_jugador`=$id";
	} else {
		$sql = "UPDATE $tabla SET `id_jugador`=$_REQUEST[ij], `pitcher_activo`=0, `id_equipo_casa`=$_REQUEST[e1], `id_equipo_visita`=$_REQUEST[e2] WHERE `id_jugador`=$id";
	}
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "exito";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}