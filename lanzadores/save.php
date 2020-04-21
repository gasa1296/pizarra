<?php
include "../connection.php";


echo $action=$_POST['action'];
echo $inning=$_POST['inning'];
echo $out_noout=$_POST['out_noout'];



$sql = "SELECT * FROM control WHERE id=0";
       $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

echo$equipo=$row['equipo_activo'];




}
}

/*
if($equipo==0)

{
$sql = "SELECT * FROM lineup_v WHERE activo=1";
       $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$player_id=$row['id_jugador'];





if($row['id']==9){
$next_id=1;}
else{$next_id=$row['id']+1;}

	$sql="UPDATE lineup_v SET activo=1 WHERE id=$next_id";

	if (mysqli_multi_query($conn, $sql)) {

		
		
		
	} else {
	    echo "<span style='margin-left:40%'>Error: " . $sql . "<br>" . mysqli_error($conn)."</span>";
	}














$sql="UPDATE lineup_v SET activo=0 WHERE id=$row[id]";

	if (mysqli_multi_query($conn, $sql)) {

		
		
		
	} else {
	    echo "<span style='margin-left:40%'>Error: " . $sql . "<br>" . mysqli_error($conn)."</span>";
	}







}
}
}

else
{



$sql = "SELECT * FROM lineup WHERE activo=1";
       $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$player_id=$row['id_jugador'];



if($row['id']==9){
$next_id=1;}
else{$next_id=$row['id']+1;}

	$sql="UPDATE lineup SET activo=1 WHERE id=$next_id";

	if (mysqli_multi_query($conn, $sql)) {

		
		
		
	} else {
	    echo "<span style='margin-left:40%'>Error: " . $sql . "<br>" . mysqli_error($conn)."</span>";
	}












$sql="UPDATE lineup SET activo=0 WHERE id=$row[id]";

	if (mysqli_multi_query($conn, $sql)) {

		
		
		
	} else {
	    echo "<span style='margin-left:40%'>Error: " . $sql . "<br>" . mysqli_error($conn)."</span>";
	}




}

}
}





*/

if($equipo==0){

$sql = "SELECT * FROM lineup WHERE lineup_posicion='P'";
       $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$player_id=$row['id_jugador'];	
}
}


$sql = "INSERT INTO `pitchers`(`player_id`, `accion`, `inning`, `out_noout` ) VALUES ('$player_id','$action','$inning','$out_noout')";
$result = mysqli_query($conn, $sql);
if ($result) {echo"success";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


}else{

	$sql = "SELECT * FROM lineup_v WHERE lineup_posicion='P'";
       $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$player_id=$row['id_jugador'];	
}
}


$sql = "INSERT INTO `pitchers`(`player_id`, `accion`, `inning`, `out_noout` ) VALUES ('$player_id','$action','$inning','$out_noout')";
$result = mysqli_query($conn, $sql);
if ($result) {echo"success";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>