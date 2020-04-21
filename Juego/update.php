<?php

include"../connection.php";
$tabla = "";
echo $_REQUEST['tp'];
if($_REQUEST['tp'] == "home"){
	$tabla = "lineup";
}
else{
	$tabla = "lineup_v";
}

if($_REQUEST['pos'] == "P"){
	$sql=  "UPDATE $tabla SET `lineup_posicion`='$_REQUEST[pos]', `pitcher_activo`=1 WHERE `id_jugador`='$_REQUEST[ij]'";
}
else{
	$sql=  "UPDATE $tabla SET `lineup_posicion`='$_REQUEST[pos]', `pitcher_activo`=0 WHERE `id_jugador`='$_REQUEST[ij]'";
}

if(mysqli_query($conn, $sql)){
	echo "exito";
}else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>