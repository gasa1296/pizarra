<?php
	include"../connection.php";

	$buscar = $_POST["q"];
	$param = $_POST["y"];
						
	$sql="SELECT * FROM `publicidad` WHERE `activo` = '0' AND $param LIKE '%".$buscar."%'";	

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){ 

    	$modificar='<a href="edit.php?id=' . $row['id'] . '"><input type="button" class="btn btn-round btn-warning" value="editar"/></a>';
    	$eliminar='<a href="delete.php?id=' . $row['id'] . '"><input type="button" class="btn btn-round btn-danger" value="eliminar"/></a>';

  		$nombre=$row['ruta'];

	   echo"   <tr>
	              <td class='col-xs-2' id='acc'>".$row[nombre]."</td>
	              <td class='col-xs-2' id='acc'>".$row[inning]."</td>
	              <td class='col-xs-2' id='acc'>".$row[pantalla]."</td>
	              <td class='col-xs-1' id='acc'><img class='zoom' src='img/$nombre' width='90' height='60'></td>
	              <td class='col-xs-2' id='acc'>".$modificar."".$eliminar."</td> 
	              
	            </tr>";
	}
					          	 
?>
		
		