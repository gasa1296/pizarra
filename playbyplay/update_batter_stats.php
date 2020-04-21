<?php include "../connection.php";



$sql = "SELECT * FROM jugador ";
       $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

$id=$row[id];




		$sql100 = "SELECT COUNT(out_noout) AS count_ab FROM playbyplay WHERE out_noout!='nada' and player_id='$id'";
		       $result100 = mysqli_query($conn, $sql100);
		if (mysqli_num_rows($result100) > 0) {
		    // output data of each row
		    while($row100 = mysqli_fetch_assoc($result100)) {

                            
//echo$row100[count_ab];













							
		$sql99 = "SELECT COUNT(out_noout) AS count_hits FROM playbyplay WHERE out_noout='noout' and player_id='$id' ";
		       $result99 = mysqli_query($conn, $sql99);
		if (mysqli_num_rows($result99) > 0) {
		    // output data of each row
		    while($row99 = mysqli_fetch_assoc($result99)) {



		    	  //echo$row99[count_hits];





 $avg=($row99[count_hits]*1000)/$row100[count_ab]; 
echo"<br>";


		    }


		}














							
		$sql98 = "SELECT COUNT(accion) AS count_bb FROM playbyplay WHERE accion='BB' AND player_id='$id' ";
		       $result98 = mysqli_query($conn, $sql98);
		if (mysqli_num_rows($result98) > 0) {
		    // output data of each row
		    while($row98 = mysqli_fetch_assoc($result98)) {


echo"bb".$bb=$row98[count_bb];
echo"<br>";



}

}






     
							
		$sql97 = "SELECT COUNT(accion) AS count_hr FROM playbyplay WHERE accion='HR' AND player_id='$id' ";
		       $result97 = mysqli_query($conn, $sql97);
		if (mysqli_num_rows($result97) > 0) {
		    // output data of each row
		    while($row97 = mysqli_fetch_assoc($result97)) {


echo"nombre de jugador".$row97[count_hr];
echo"<br>";













 echo$sql95 = "UPDATE jugador SET AVE='$avg', BB='$bb', VB='$row100[count_ab]', HR='$row97[count_hr]' WHERE id='$id'";

if (mysqli_query($conn, $sql95)) {
   


 echo '<script type="text/javascript">
      swal({   title: "Jugador guardado con exito",   text: "Sera redireccionado automaticamente en 2s.", type: "success",   timer: 2000,   showConfirmButton: false });
      </script>';
      echo '<meta http-equiv="Refresh" content="2;URL=index.php">';







   } else {
    echo "Error updating record: " . mysqli_error($conn);
}








}

}













		    }
		}



         









    }


 }


?>