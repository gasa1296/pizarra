<?php
include "../connection.php";
$sql = "SELECT * FROM `control` WHERE 1";
$result = mysqli_query($conn,$sql);
if($result){
	$row = mysqli_fetch_assoc($result);
	$sql= "SELECT * FROM `jugador` WHERE `id`='$row[id_jugador]'";
	$result = mysqli_query($conn, $sql);
	if($result){
		$row = mysqli_fetch_assoc($result);
		if($row['foto'] == ""){
			$row['foto'] = "ejemplos/FONDOVACIO.jpg";
		}
		else{
			$row['foto'] = "../Roster/foto_jugadores/".$row["foto"];
		}
		echo json_encode($row);
	}
}
?>