<?php
include "../connection.php";
$altura = $_POST['pies'] . $_POST['pulgadas'];
/*Recibiendo la Imagen1 */
$_FILES['imagen1']['name']; //este es el nombre del archivo que acabas de subir
$_FILES['imagen1']['type']; //este es el tipo de archivo que acabas de subir
$_FILES['imagen1']['tmp_name']; //este es donde esta almacenado el archivo que acabas de subir.
$_FILES['imagen1']['size']; //este es el tamaño en bytes que tiene el archivo que acabas de subir.
$_FILES['imagen1']['error']; //este almacena el codigo de error que resultaría en la subida.

//$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
$img = "";
$carpetaDestino = "foto_jugadores/";
# si es un formato de imagen1
if ($_FILES["imagen1"]["type"] == "image/jpeg" || $_FILES["imagen1"]["type"] == "image/jpg" || $_FILES["imagen1"]["type"] == "image/pjpeg" || $_FILES["imagen1"]["type"] == "image/gif" || $_FILES["imagen1"]["type"] == "image/png") {
	if (file_exists($carpetaDestino) || @mkdir($carpetaDestino)) {
		$origen1 = $_FILES["imagen1"]["tmp_name"];
		$destino1 = $carpetaDestino . $_FILES["imagen1"]["name"];
		if (@move_uploaded_file($origen1, $destino1)) {
			$img = $_FILES['imagen1']['name'];
		} else {
			echo "No se ha podido mover el archivo: " . $_FILES["imagen1"]["name"];
		}
	} else {
		echo "no existe el directorio";
	}
} else {
  echo "Tipo de archivo no soportado";
}


$sql = "INSERT INTO `jugador`(`nombre`, `apellido`, `altura`, `peso`, `firma`, `posicion`, `nivel`, `estado`, `ERA`, `IL`, `SO`, `BB`, `AVE`, `numero`, `id_equipo`, `foto`, `JG`, `JP`, `JS`, `VB`, `C`, `CI`, `HR`) VALUES ('$_POST[nombre]','$_POST[apellido]', '$altura', '$_POST[peso]', '$_POST[firma]','$_POST[posicion]','$_POST[nivel]','$_POST[estado]','$_POST[ERA]','$_POST[IL]','$_POST[SO]','$_POST[BB]','$_POST[AVE]','$_POST[numero]', '$_POST[id_equipo]', '$img', '$_POST[JG]', '$_POST[JP]', '$_POST[JS]', '$_POST[VB]', '$_POST[C]', '$_POST[CI]', '$_POST[HR]')";
$result = mysqli_query($conn, $sql);
if ($result) {
	header('Location: ../Roster', true, 303);
	die();
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?> 