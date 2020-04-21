<?php
include("../connection.php");
$tipo= $_REQUEST['tipo'];
$Balls=$_REQUEST['Balls'];
$Strike=$_REQUEST['Strike'];
$Outs=$_REQUEST['Outs'];
$Fouls=$_REQUEST['Fouls'];
$V_pichadas=$_REQUEST['V_pichadas'];
$Strikes_Counter=$_REQUEST['Strikes_Counter'];



//                                                               switch de boton  de suma o resta
switch ($tipo) {
  case 'bola':
    $Balls++;
    if($Balls >= 4){
      $Balls=0;
      $Strike=0;
      $V_pichadas=0;
      $Strikes_Counter=0;
      $Fouls=0;
    }
    $V_pichadas++;
  break;

  case 'bolam':
    $Balls--;
    if($Balls <= 0){
      $Balls=0;
    }
    $V_pichadas--;
    if($V_pichadas <= 0){
      $V_pichadas=0;
    }
  break;

  case 'strike':
    $Strike++;
    $Strikes_Counter++;
    $V_pichadas++;
    if($Strike >= 3){
    $Outs++;
    $Balls=0;
    $Strike=0;
    $Fouls=0;
    if($Outs >= 3){
      $Outs=0;
      $V_pichadas=0;
      $Strikes_Counter=0;
      $Balls=0;
      $Strike=0;
      $Fouls=0;

      $sql2 = "SELECT * FROM `control`";
      $result2 = mysqli_query($conn, $sql2);
	  while($row2 = mysqli_fetch_assoc($result2)) {
	  	 $equipo_activo=$row2['equipo_activo'];
	  }
	  if($equipo_activo==0){
	  	$equipo_activo=1;
	  }else{
	  	$equipo_activo=0;
	  }

	  $sql="UPDATE `control` SET `equipo_activo`='$equipo_activo' ";
	  mysqli_query($conn, $sql);

    }
  }
  
  break;

  case 'strikem':
    $Strike--;
    if($Strike <= 0){
    $Strike=0;
    }
    $Strikes_Counter--;
    if($Strikes_Counter <= 0){
    $Strikes_Counter=0;
    }
    $V_pichadas--;
    if($V_pichadas <= 0){
      $V_pichadas=0;
    }
  break;

  case 'out':
    $Outs++;
    $Balls=0;
    $Strike=0;
    $Fouls=0;
    if($Outs >= 3){
      $Outs=0;
      $V_pichadas=0;
      $Strikes_Counter=0;
      $V_pichadas=0;
      $Balls=0;

      $sql2 = "SELECT * FROM `control`";
      $result2 = mysqli_query($conn, $sql2);
	  while($row2 = mysqli_fetch_assoc($result2)) {
	  	 $equipo_activo=$row2['equipo_activo'];
	  }
	  if($equipo_activo==0){
	  	$equipo_activo=1;
	  }else{
	  	$equipo_activo=0;
	  }

	  $sql="UPDATE `control` SET `equipo_activo`='$equipo_activo' ";
	  mysqli_query($conn, $sql);
    }
  break;

  case 'outm':
    $Outs--;
    if($Outs <= 0){
    $Outs=0;
    }
  break;

  case 'Foul':
    $Fouls++;
    if($Strike < 2){
      $Strike++;
    }
    $Strikes_Counter++;
    $V_pichadas++;
  break;

  case 'Foulm':
    $Fouls--;
    if($Fouls <= 0){
      $Fouls=0;
    }
    $Strikes_Counter--;
    if($Strikes_Counter <= 0){
      $Strikes_Counter=0;
    }
    $V_pichadas--;
    if($V_pichadas <= 0){
      $V_pichadas=0;
    }
  break;

  case 'reset':
    $Balls=0;
    $Strike=0;
    $Outs=0;
    $Fouls=0;
    $V_pichadas=0;
    $Strikes_Counter=0;
  break;
}

//                                                seleccion de que equipo esta bateando 0 visitante y 1 homeclub

$sql2 = "SELECT * FROM `control`";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_assoc($result2)) {
    $equipo_activo=$row2['equipo_activo'];
}

if($equipo_activo == 0){

	$sql2="SELECT * FROM `lineup_v` WHERE `activo` = 1";
	$result2 = mysqli_query($conn, $sql2);
	while($row2 = mysqli_fetch_assoc($result2)) {
    $bateador_activo=$row2['id_jugador'];
	}

	$sql2="SELECT * FROM `lineup` WHERE `picher_activo` = 1";
	$result2 = mysqli_query($conn, $sql2);
	while($row2 = mysqli_fetch_assoc($result2)) {
    $picher_activo=$row2['id_jugador'];
	}

}else{

	$sql2="SELECT * FROM `lineup` WHERE `activo` = 1";
	$result2 = mysqli_query($conn, $sql2);
	while($row2 = mysqli_fetch_assoc($result2)) {
    $bateador_activo=$row2['id_jugador'];
	}

	$sql2="SELECT * FROM `lineup_v` WHERE `picher_activo` = 1";
	$result2 = mysqli_query($conn, $sql2);
	while($row2 = mysqli_fetch_assoc($result2)) {
    $picher_activo=$row2['id_jugador'];
	}

}



//                                                                  insert a contador
$sql = "INSERT INTO `contador`(`Balls`, `Strikes`, `Outs`, `Fouls`, `V_pichadas`, `Strikes_Counter`,`id_Player`, `id_pitcher`, `Homeclub/Visitante`) VALUES ('$Balls','$Strike','$Outs','$Fouls','$V_pichadas','$Strikes_Counter','$bateador_activo','$picher_activo','$equipo_activo')";
mysqli_query($conn, $sql);


//                                                                  respuesta en el contador
$respuesta=$respuesta.'
              <div class="col-md-3">
                  <div class="form-group " style="margin-top:40px !important;">
                    <h2 class="center-block" style="text-align: center;">Balls</h2>
                    <input type="text" class="form-text center-block" style="text-align: center; font-size: large;" id="Balls" value='.$Balls.' name="Balls" required readonly>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group " style="margin-top:40px !important;">
                    <h2 class="center-block" style="text-align: center;">Strike</h2>
                    <input type="text" class="form-text center-block" style="text-align: center; font-size: large;" id="Strike" value='.$Strike.' name="Strike" required readonly>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group " style="margin-top:40px !important;">
                    <h2 class="center-block" style="text-align: center;">Outs</h2>
                    <input type="text" class="form-text center-block" style="text-align: center; font-size: large;" id="Outs" value='.$Outs.' name="Outs" required readonly>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group " style="margin-top:40px !important;">
                    <h2 class="center-block" style="text-align: center;">Fouls</h2>
                    <input type="text" class="form-text center-block" style="text-align: center; font-size: large;" id="Fouls" value='.$Fouls.' name="Fouls" required readonly>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group " style="margin-top:40px !important;">
                    <input type="hidden" class="form-text center-block" style="text-align: center; font-size: large;" id="V_pichadas" value='.$V_pichadas.' name="V_pichadas" required readonly>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group " style="margin-top:40px !important;">
                    <input type="hidden" class="form-text center-block" style="text-align: center; font-size: large;" id="Strikes_Counter" value='.$Strikes_Counter.' name="Strikes_Counter" required readonly>
                  </div>
              </div>';             


echo $respuesta;


?>

