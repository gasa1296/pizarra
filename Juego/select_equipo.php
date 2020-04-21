<?php
include "../connection.php";

$jugadores = array();

$sql = "SELECT * FROM jugador WHERE id NOT IN(SELECT id_jugador FROM lineup) AND id_equipo='$_REQUEST[ie]' AND id NOT IN (SELECT id_jugador FROM lineup_v)";
$result = mysqli_query($conn, $sql);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$jugadores[] = $row;
	}
	echo json_encode($jugadores);
}
else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>