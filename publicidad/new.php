  <?php
include"../header.php";

 ?>
  <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Publicdad</h3>
                        <p class="animated fadeInDown">
                          Publicidad <span class="fa-angle-right fa"></span> Crear Publicidad
                        </p>
                    </div>
                  </div>
              </div>


 <div class="col-md-12">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      <h4>Crear nueva Publicidad</h4>
                      <div class="col-md-11">
                      </div>

                      <a href="index.php">  <input type="button" class="btn btn-primary" value="Inicio" ></a>

                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                        <form class="cmxform" id="signupForm" method="post" enctype="multipart/form-data" action="save.php">
                          <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="nombre_publicidad" name="nombre_publicidad" required>
                              <span class="bar"></span>
                              <label>Nombre de la Publicidad</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="Inning" name="Inning" required>
                             <!-- <span class="bar"></span>-->
                              <label>Inning</label>
                            </div>

                            <div class="form-group " style="margin-top:40px !important;">
                              <h4>Pantalla</h4>
                              <select class="form-control" id="Pantalla" name="Pantalla" required>
                                <option value="">Seleccion</option>
                                <option value="Principal">Principal</option>
                                <option value="LineScore">LineScore</option>
                                <option value="Secundaria">Secundaria</option>           
                              </select>               
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <h4>Imagen</h4>
                              <input type="file" name="imagen1"  id="file" required >
                            </div>
                          </div>                  
                          <div class="col-md-12">
                            
                              <input class="submit btn btn-success" type="submit" value="Guardar" fromaction="save.php">
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>

        
          <?php
include"../footer.php";

 ?>
