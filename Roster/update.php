<?php
include "../connection.php";
$altura = $_POST['pies'] . $_POST['pulgadas'];
echo $altura;
if($_FILES['imagen1']['name'] != ""){
	$img = "";
	$carpetaDestino="foto_jugadores/";
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
	$sql = "UPDATE `jugador` SET `nombre`='$_POST[nombre]',`apellido`='$_POST[apellido]',`altura`='$altura',`peso`='$_POST[peso]',`firma`='$_POST[firma]',`posicion`='$_POST[posicion]',`nivel`='$_POST[nivel]', `estado`='$_POST[estado]',`ERA`='$_POST[ERA]',`IL`='$_POST[IL]',`SO`='$_POST[SO]',`BB`='$_POST[BB]',`AVE`='$_POST[AVE]',`numero`='$_POST[numero]', `id_equipo`='$_POST[id_equipo]', `foto`='$img', `JG`='$_POST[JG]', `JP`='$_POST[JP]', `JS`='$_POST[JS]', `VB`='$_POST[VB]', `C`='$_POST[C]', `CI`='$_POST[CI]', `HR`='$_POST[HR]' WHERE `id`='$_POST[id]'";
}
else{
	$sql = "UPDATE `jugador` SET `nombre`='$_POST[nombre]',`apellido`='$_POST[apellido]',`altura`='$altura',`peso`='$_POST[peso]',`firma`='$_POST[firma]',`posicion`='$_POST[posicion]',`nivel`='$_POST[nivel]', `estado`='$_POST[estado]',`ERA`='$_POST[ERA]',`IL`='$_POST[IL]',`SO`='$_POST[SO]',`BB`='$_POST[BB]',`AVE`='$_POST[AVE]',`numero`='$_POST[numero]', `id_equipo`='$_POST[id_equipo]', `JG`='$_POST[JG]', `JP`='$_POST[JP]', `JS`='$_POST[JS]', `VB`='$_POST[VB]', `C`='$_POST[C]', `CI`='$_POST[CI]', `HR`='$_POST[HR]' WHERE `id`='$_POST[id]'";
}

$result = mysqli_query($conn, $sql);
if ($result) {
	header('Location: ../Roster', true, 303);
	die();
}else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>