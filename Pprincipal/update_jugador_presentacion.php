<?php
include "../connection.php";
$sql ="UPDATE `control` SET `id_jugador`='$_GET[ij]' WHERE 1";
$result = mysqli_query($conn, $sql);
if($result){
	echo "exito";
}
else{
	echo "Error: " . $sql . " " . mysqli_error($conn);
}
?>