<?php

//include"../connection.php";
include"../header.php";

$name=$_POST['name'];
$alias=$_POST['alias'];

/*Recibiendo la Imagen */

$_FILES['imagen1']['name']; //este es el nombre del archivo que acabas de subir
$_FILES['imagen1']['type']; //este es el tipo de archivo que acabas de subir
$_FILES['imagen1']['tmp_name'];//este es donde esta almacenado el archivo que acabas de subir.
$_FILES['imagen1']['size']; //este es el tamaño en bytes que tiene el archivo que acabas de subir.
$_FILES['imagen1']['error']; //este almacena el codigo de error que resultaría en la subida.

//$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");

$carpetaDestino="logo_equipos/";
# si es un formato de imagen
if($_FILES["imagen1"]["type"]=="image/jpeg" || $_FILES["imagen1"]["type"]=="image/jpg" || $_FILES["imagen1"]["type"]=="image/pjpeg" || $_FILES["imagen1"]["type"]=="image/gif" || $_FILES["imagen1"]["type"]=="image/png"){
	if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)){
		$origen1=$_FILES["imagen1"]["tmp_name"];
		$destino1=$carpetaDestino.$_FILES["imagen1"]["name"];
		if(@move_uploaded_file($origen1, $destino1)){
			$img = $_FILES['imagen1']['name'];
		}else{
			echo "No se ha podido mover el archivo: ".$_FILES["imagen1"]["name"];
		}
	}else{
		echo"no existe el directorio";
	}
}else{
	echo "Tipo de archivo no soportado";
} 

$sql = "INSERT INTO equipo (nombre, alias, logo, estado) VALUES ('$_POST[name]', '$_POST[alias]', '$img', '$_POST[estado]')";
$result = mysqli_query($conn, $sql);
if ($result) {
	header('Location: ../Equipos', true, 303);
	die();
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>