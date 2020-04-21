<?php
include "../connection.php";






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



}
}
}

echo'<table class="table table-sm col-lg-12" id="actuacion">
					<thead class="pizarra-contrario" style="text-align: center;">
						<tr>';




$sql = "SELECT * FROM playbyplay WHERE player_id=$player_id";
       $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

		echo'<th>'.$row['inning'].'</th>';
	}
	echo'</tr>
			</thead>
			<tbody class="pizarra-pitcher" style="text-align: center;">
		<tr>';

}
$result2=mysqli_query($conn,$sql);
if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
		echo'<th>'.$row['accion'].'</th>';
	}
}
echo'</tr>
	</tbody>
</table>';
						
