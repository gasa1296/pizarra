<?php
include "../connection.php";
$sql = "TRUNCATE `playbyplay`";
$result = mysqli_query($conn, $sql);
if($result){
	header('Location: ../Juego', true, 303);
	die();
} else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>