<?php

include"../connection.php";

$id=$_GET['id'];


$sql = "UPDATE `publicidad` SET `activo`='1' WHERE  id='$id'";

if (mysqli_query($conn, $sql)) {
			echo '<meta http-equiv="Refresh" content="1;URL=index.php">';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>

