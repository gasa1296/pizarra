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









$sql = "INSERT INTO `playbyplay`(`player_id`, `accion`, `inning`, `out_noout` ) VALUES ('$player_id','$action','$inning','$out_noout')";
$result = mysqli_query($conn, $sql);
if ($result) {echo"success";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


if($out_noout=='nada'){
	$sql = "SELECT * FROM `contador` WHERE 1";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)) {
        $Balls=$row['Balls'];
        $Strike=$row['Strikes'];
        $Outs=$row['Outs'];
        $Fouls=$row['Fouls'];
        $V_pichadas=$row['V_pichadas'];
        $Strikes_Counter=$row['Strikes_Counter'];
        $bateador_activo=$row['Strikes_Counter'];
        $picher_activo=$row['Strikes_Counter'];
        $equipo_activo=$row['Homeclub/Visitante'];
    }

    $V_pichadas++;
    /*$Balls++;
    if($Balls>=4){
    	$Balls=0;
    }*/

    $sql = "INSERT INTO `contador`(`Balls`, `Strikes`, `Outs`, `Fouls`, `V_pichadas`, `Strikes_Counter`,`id_Player`, `id_pitcher`, `Homeclub/Visitante`) VALUES ('$Balls','$Strike','$Outs','$Fouls','$V_pichadas','$Strikes_Counter','$bateador_activo','$picher_activo','$equipo_activo')";

	mysqli_query($conn, $sql);







 echo '<script type="text/javascript">
      swal({   title: "Jugador guardado con exito",   text: "Sera redireccionado automaticamente en 2s.", type: "success",   timer: 2000,   showConfirmButton: false });
      </script>';
      echo '<meta http-equiv="Refresh" content="2;URL=index.php">';


}else{
	$sql = "SELECT * FROM `contador` WHERE 1";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)) {
        $Balls=$row['Balls'];
        $Strike=$row['Strikes'];
        $Outs=$row['Outs'];
        $Fouls=$row['Fouls'];
        $V_pichadas=$row['V_pichadas'];
        $Strikes_Counter=$row['Strikes_Counter'];
        $bateador_activo=$row['Strikes_Counter'];
        $picher_activo=$row['Strikes_Counter'];
        $equipo_activo=$row['Homeclub/Visitante'];
    }

    $V_pichadas++;
    $Strikes_Counter++;

    $sql = "INSERT INTO `contador`(`Balls`, `Strikes`, `Outs`, `Fouls`, `V_pichadas`, `Strikes_Counter`,`id_Player`, `id_pitcher`, `Homeclub/Visitante`) VALUES ('$Balls','$Strike','$Outs','$Fouls','$V_pichadas','$Strikes_Counter','$bateador_activo','$picher_activo','$equipo_activo')";

	mysqli_query($conn, $sql);



	

 echo '<script type="text/javascript">
      swal({   title: "Jugador guardado con exito",   text: "Sera redireccionado automaticamente en 2s.", type: "success",   timer: 2000,   showConfirmButton: false });
      </script>';
      echo '<meta http-equiv="Refresh" content="2;URL=index.php">';


}
?>