<?php
include "../connection.php";

if($_FILES['imagen1']['name'] != ""){
	$img = "";
	$carpetaDestino="logo_equipos/";
	# si es un formato de imagen
	if($_FILES["imagen1"]["type"] == "image/jpeg" || $_FILES["imagen1"]["type"] == "image/jpg" || $_FILES["imagen1"]["type"] == "image/pjpeg" || $_FILES["imagen1"]["type"] == "image/gif" || $_FILES["imagen1"]["type"] == "image/png"){
		if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)){
			$origen1=$_FILES["imagen1"]["tmp_name"];
			$destino1=$carpetaDestino.$_FILES["imagen1"]["name"];
			if(@move_uploaded_file($origen1, $destino1)){
				$img = $_FILES['imagen1']['name'];
			}else{
				echo "No se ha podido mover el archivo: ".$_FILES["imagen1"]["name"];
			}
		}else{
			echo "no existe el directorio";
		}
	}else{
		echo "Tipo de archivo no soportado";
	}
	$sql = "UPDATE `equipo` SET `nombre`='$_POST[name]',`alias`='$_POST[alias]',`logo`='$img',`estado`='$_POST[estado]' WHERE `id`='$_POST[id]'";
}else{
	$sql = "UPDATE `equipo` SET `nombre`='$_POST[name]', `alias`='$_POST[alias]', `estado`='$_POST[estado]' WHERE `id`='$_POST[id]'";
}

$result = mysqli_query($conn, $sql);
if ($result) {
	header('Location: ../Equipos', true, 303);
	die();
}else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

