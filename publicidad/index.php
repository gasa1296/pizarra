 
<?php

include"../header.php";

?>

<style>
.zoom {
  transition: transform .2s; /* Animation */
  width: 90px;
  height: 60px;
}
.zoom:hover {
    transform: scale(8.0); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

    <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Publicidad</h3>
                        <p class="animated fadeInDown">
                          Inicio
                        </p>
                    </div>
                  </div>
              </div>







 <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading">
                    	<h3>Lista de Publicdad</h3>
                    	<!-- 						buscador											-->
	                    <div class="col-sm-6">
	                        <form method="POST" action="" name="form1" class="form-inline">
	                          <input type="text" class="form-control" id="pc" placeholder="Busqueda" onkeyup="loadB();" name="palabra">
	                          <select name="filtrar" id="sc" style="width: 150px;" class="form-control">
	                            <option value="nombre"><span>nombre</span></option>
	                            <option value="inning"><span>inning</span></option>
	                            <option value="pantalla"><span>pantalla</span></option>
	                          </select> 
	                          <button type="submit" class="btn btn-default" value="Buscar" name="buscar"><span class="glyphicon glyphicon-search"></span></button>
	                        </form>
	                    </div>
	                   	<div class="col-md-3">
	                    </div>
                      	<div class="col-md-3">
                        	<a href="new.php"><input type="button" class="btn btn-primary" value="Nuevo" ></a>
                      	</div>
                      	<br>
                      	<br>
                    </div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Publicdad</th>
                          <th>Inning</th>
                          <th>Pantalla</th>
                          <th>Preview</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody id='prueba3'>
                      
<?php

                  if (isset($_POST['buscar'])) {
                    $buscar = $_POST["palabra"];
                    $param = $_POST["filtrar"];

                    if($param==''){
                      $sql="SELECT * FROM `publicidad` WHERE `activo` = '0'";
                    }else{
                      $sql="SELECT * FROM `publicidad` WHERE `activo` = '0' AND $param LIKE '%".$buscar."%'";
                    }
                  }else{
                    $sql="SELECT * FROM `publicidad` WHERE `activo` = '0'";
                  }

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

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
} else {
    echo "<td>0 results</td>";
}


?>




</tbody>
</table>
</div>
</div>
</div>
</div>
</div>





<?php

include"../footer.php";

?>

<script>

function loadB(){
var str=document.getElementById('pc').value;
var str2=document.getElementById('sc').value;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("prueba3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","tabla.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str+"&y="+str2);
}
</script>