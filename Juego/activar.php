<?php
include "../connection.php";

$arreglo= explode("-", $_GET['tbidac']);

$activo = 0;
if($arreglo[2] == 0){
	$activo = 1;
}
$sql = "SELECT * FROM $arreglo[0] WHERE `activo`=1";
$result = mysqli_query($conn, $sql);
if($result){
	while($row = mysqli_fetch_assoc($result)){
		$sql1 = "UPDATE $arreglo[0] SET `activo`=0 WHERE `id_jugador`=$row[id_jugador]";
		$result1 = mysqli_query($conn, $sql1);
		if(!$result){
			echo "Error: " . $sql1 . " " . mysqli_error($conn);
		}
	}
}
else {
	echo "Error: " . $sql . " " . mysqli_error($conn);
}

$sql = "UPDATE $arreglo[0] SET `activo`=$activo WHERE `id_jugador`=$arreglo[1]";
$result = mysqli_query($conn, $sql);
if($result){
	echo $sql;
}
else {
	echo "Error: " . $sql . " " . mysqli_error($conn);
}
?>