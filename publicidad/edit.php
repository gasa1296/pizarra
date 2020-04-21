  <?php
include"../header.php";

$id=$_GET['id'];

$sql = "SELECT * FROM `publicidad` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {                       // output data of each row
      while($row = mysqli_fetch_assoc($result)) {                         
        $id=$row['id'];
        $nombre=$row['nombre'];
        $inning=$row['inning'];
        $pantalla=$row['pantalla'];
        $ruta=$row['ruta'];
      }
    }
else{echo"fuck";}

 ?>
<style>
.zoom {
    transition: transform .2s; /* Animation */
    width: 300px;
    height: 200px;
}

.zoom:hover {
    transform: scale(2.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

<!-- start: Content -->
<div id="content">
  <div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-12">
        <h3 class="animated fadeInLeft">Publicidad</h3>
        <p class="animated fadeInDown">
          Publicidad <span class="fa-angle-right fa"></span> Editar Publicidad
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="col-md-12 panel">
      <div class="col-md-12 panel-heading">
        <h4>Editar datos de la Publicidad</h4>
        <div class="col-md-10">
        </div>
        <a href="index.php"><input type="button" class="btn btn-primary" value="Inicio" ></a>
        <a href="new.php"><input type="button" class="btn btn-primary" value="Nuevo" ></a>
      </div>
      <div class="col-md-12 panel-body" style="padding-bottom:30px;">
        <div class="col-md-12">
          <form class="cmxform" id="signupForm" method="post" enctype="multipart/form-data" action="update.php">
            <input type="hidden" class="form-text" id="id" name="id" value="<?php echo $id ?>" required>
            <div class="col-md-12">
              <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <input type="text" class="form-text" id="nombre_publicidad" name="nombre_publicidad" value="<?php echo $nombre ?>" required>
                <span class="bar"></span>
                <label>Nombre de la Publicidad</label>
              </div>
              <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <input type="text" class="form-text" id="inning" name="inning" value="<?php echo $inning ?>" required>
                <label>Inning</label>
              </div>
              <div class="form-group " style="margin-top:40px !important;">
                <h4>Pantalla</h4>
                <select class="form-control" id="pantalla" name="pantalla" required>
                  <option value="">Seleccion</option>
                  <?php
                    switch ($pantalla) {
                      case 'Principal':
                        echo"
                        <option value='Principal' selected>Principal</option>
                        <option value='LineScore'>LineScore</option>
                        <option value='Secundaria'>Secundaria</option> ";
                      break;

                      case 'LineScore':
                        echo"
                        <option value='Principal' >Principal</option>
                        <option value='LineScore' selected>LineScore</option>
                        <option value='Secundaria'>Secundaria</option> ";
                      break;

                      case 'Secundaria':
                        echo"
                        <option value='Principal' >Principal</option>
                        <option value='LineScore'>LineScore</option>
                        <option value='Secundaria'selected>Secundaria</option> ";
                      break;
                      
                      default:
                        echo"
                        <option value='Principal' >Principal</option>
                        <option value='LineScore'>LineScore</option>
                        <option value='Secundaria'>Secundaria</option> ";
                        break;
                    }
                  ?>
                            
                </select>               
              </div>

              <div class="col-md-4">
              </div>
              <img class='zoom' src='img/<?php echo $ruta ?>' width='300' height='200'>

              <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <h4>Imagen</h4>
                <input type="file" name="imagen1"  id="file">
              </div>                 
            <div class="col-md-12">
              <input class="submit btn btn-success" type="submit" value="Guardar" fromaction="update.php">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include"../footer.php";
?>
