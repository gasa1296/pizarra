<?php
include "../connection.php";

$sql = "SELECT * from jugador WHERE id_equipo = $_GET[ie]";
$result = mysqli_query($conn, $sql);
if($result){
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nombre'] . "</td><td>" . $row['apellido'] . "</td><td>" . $row['altura'] . "</td><td>" . $row['peso'] . "</td><td>" . $row['firma'] . "</td><td>" . $row['numero'] . "</td><td>" . $row['id_equipo'] . "</td><td>" . $row['posicion'] . "</td><td>" . $row['estado'] . "</td><td>" . $row['nivel'] . "</td><td><a href='edit.php?id=" . $row['id'] . "'><button class='btn btn-light'>editar</button></a></td></tr>";
	}
}
?>


