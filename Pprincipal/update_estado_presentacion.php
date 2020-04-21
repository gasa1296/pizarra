<?php
include "../connection.php";
$sql ="UPDATE `control` SET `presentar_jugador`='$_GET[estado]' WHERE 1";
$result = mysqli_query($conn, $sql);
if($result){
	if($_GET['estado'] == 1){
		echo '<button class="btn btn-danger" id="0" onclick="update_estado(this)">Ocultar</button>';
	}
	else{
		echo '<button class="btn btn-success" id="1" onclick="update_estado(this)">Presentar</button>';
	}
}
?>