<?php

include"../connection.php";

$id=$_POST['id'];
$nombre_publicidad=$_POST['nombre_publicidad'];
$inning=$_POST['inning'];
$pantalla=$_POST['pantalla'];

if ($_FILES['imagen1']['name']!='') {
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
}

if ($_FILES['imagen1']['name']!='') {
  $sql = "UPDATE `publicidad` SET `nombre`='$nombre_publicidad',`inning`='$inning',pantalla= '$pantalla',ruta='$nombre' WHERE id='$id'";
}else{
  $sql = "UPDATE `publicidad` SET `nombre`='$nombre_publicidad',pantalla= '$pantalla',`inning`='$inning' WHERE id='$id'";
}

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">
			swal({   title: "empresa editada con exito",   text: "Sera redireccionado automaticamente en 3s.", type: "success",   timer: 3000,   showConfirmButton: false });
			</script>';
			echo '<meta http-equiv="Refresh" content="2;URL=index.php">';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>

