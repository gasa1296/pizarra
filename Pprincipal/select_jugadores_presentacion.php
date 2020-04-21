<?php
include "../connection.php";

$id_jugador = 0;
$sql = "SELECT * FROM `control` WHERE 1";
$result = mysqli_query($conn, $sql);
if($result){
	$row = mysqli_fetch_assoc($result);
	$id_jugador = $row['id_jugador'];
}
$sql = "SELECT * FROM `jugador` INNER JOIN lineup ON jugador.id=lineup.id_jugador WHERE jugador.estado=1";
$result = mysqli_query($conn, $sql);
if($result){
	echo '<option value=""></option>';
	while($row = mysqli_fetch_assoc($result)){
		if($row['id'] == $id_jugador){
			echo '<option value="' . $row["id"] . '" selected>' . $row["nombre"] . ' ' . $row["apellido"] . '</option>';
		}
		else{
			echo '<option value="' . $row["id"] . '">' . $row["nombre"] . ' ' . $row["apellido"] . '</option>';
		}
	}
}
$sql = "SELECT * FROM `jugador` INNER JOIN lineup_v ON jugador.id=lineup_v.id_jugador WHERE jugador.estado=1";
$result = mysqli_query($conn, $sql);
if($result){
	while($row = mysqli_fetch_assoc($result)){
		if($row['id'] == $id_jugador){
			echo '<option value="' . $row["id"] . '" selected>' . $row["nombre"] . ' ' . $row["apellido"] . '</option>';
		}
		else{
			echo '<option value="' . $row["id"] . '">' . $row["nombre"] . ' ' . $row["apellido"] . '</option>';
		}
	}
}
?>