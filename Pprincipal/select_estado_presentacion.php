<?php
include "../connection.php";
$sql ="SELECT * FROM `control` WHERE 1";
$result = mysqli_query($conn, $sql);
if($result){
	$row = mysqli_fetch_assoc($result);
	if($row['presentar_jugador'] == 1){
		echo '<button class="btn btn-danger" id="0" onclick="update_estado(this)">Ocultar</button>';
	}
	else{
		echo '<button class="btn btn-success" id="1" onclick="update_estado(this)">Presentar</button>';
	}
}
?>