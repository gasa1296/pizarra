<?php

include"../connection.php";

$nombre_publicidad=$_POST['nombre_publicidad'];
$Inning=$_POST['Inning'];
$Pantalla=$_POST['Pantalla'];

/*                      Recibiendo la Primera Imagen */

$_FILES['imagen1']['name']; //este es el nombre del archivo que acabas de subir
$_FILES['imagen1']['type']; //este es el tipo de archivo que acabas de subir
$_FILES['imagen1']['tmp_name'];//este es donde esta almacenado el archivo que acabas de subir.
$_FILES['imagen1']['size']; //este es el tamaño en bytes que tiene el archivo que acabas de subir.
$_FILES['imagen1']['error']; //este almacena el codigo de error que resultaría en la subida.

//$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");

$carpetaDestino="img/";
# si es un formato de imagen
if($_FILES["imagen1"]["type"]=="image/jpeg" || $_FILES["imagen1"]["type"]=="image/jpg" || $_FILES["imagen1"]["type"]=="image/pjpeg" || $_FILES["imagen1"]["type"]=="image/gif" || $_FILES["imagen1"]["type"]=="image/png"){
  	if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)){
    	$origen1=$_FILES["imagen1"]["tmp_name"];
    	$destino1=$carpetaDestino.$_FILES["imagen1"]["name"];
   
      	# movemos el archivo
      	if(@move_uploaded_file($origen1, $destino1)){
        	$nombre = $_FILES['imagen1']['name'];
      	}else{
        	echo "No se ha podido mover el archivo: ".$_FILES["imagen1"]["name"];
      	}
  	}else{
    	echo "no existe el directorio";
  	}
}else{
	echo "Tipo de archivo no soportado";
} 

 //$ruta1 = "imagen/" . $_FILES['imagen1']['name'];
 //$resultado1 = move_uploaded_file($_FILES["imagen1"]["tmp_name"], $ruta1);
 
 //$destino2="imagen/". $_FILES['imagen1']['name'];
 //copy($ruta,$destino2);


$sql = "INSERT INTO `publicidad`(`nombre`, `inning`, `pantalla`, `ruta`) VALUES ('$nombre_publicidad','$Inning','$Pantalla','$nombre')";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">
			swal({   title: "Jugador guardado con exito",   text: "Sera redireccionado automaticamente en 3s.", type: "success",   timer: 10000,   showConfirmButton: false });
			</script>';
			echo '<meta http-equiv="Refresh" content="10;URL=index.php">';
}
 else {
    echo "<span style='margin-left:45%'>Error: " . $sql . "</span><br>" . mysqli_error($conn);
}
?>