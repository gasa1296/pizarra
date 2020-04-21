<?php
include "../header.php";
?>
<div id="content">
    <script src="main.js"></script>
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Roster</h3>
                <p class="animated fadeInDown">Principal<span class="fa-angle-right fa"></span>Roster</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Roster</h3>
                        </div>
                        <div class="col-sm-3">
                            <a href="#ventana0" data-toggle="modal"><button data-toggle="modal" class="btn btn-success">Nuevo</button></a>
                        </div>
                        <div class="col-sm-3">
                            <label for="equipos">Equipos</label>
                            <select name="equipo" id="equipo" onchange="select_jugadores()">
                                <option value=""></option>
                                <?php
                                $sql = "SELECT * FROM equipo WHERE estado=1";
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="'.$row["id"].'">'.$row["nombre"].'</option>';
									}
								}
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="container">
                        <div>
                            <table id="datatables-example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Altura</th>
                                        <th>Peso</th>
                                        <th>Año de firma</th>
                                        <th>Numero</th>
                                        <th>Equipo</th>
                                        <th>Posicion</th>
                                        <th>Estado</th>
                                        <th>Nivel</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="jugadores">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ventana0">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Header del Modal-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nuevo Jugador</h4>
            </div>
            <!--Body del Modal con formulario-->
            <form method="POST" action="insert.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="numero">Numero:</label>
                                <input type="number" name="numero" id="numero" class="form-control" placeholder="Numero">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nombre">Altura:</label>
                                <select class="form-control" name="pies" id="pies">
                                    <option value="5\'">5'</option>
                                    <option value="6\'">6'</option>
                                    <option value="7\'">7'</option>
                                </select>
                                <select class="form-control" name="pulgadas" id="pulgadas">
                                    <option value='1"'>1''</option>
                                    <option value="1\'\'">1''</option>
                                    <option value="2\'\'">2''</option>
                                    <option value="3\'\'">3''</option>
                                    <option value="4\'\'">4''</option>
                                    <option value="5\'\'">5''</option>
                                    <option value="6\'\'">6''</option>
                                    <option value="7\'\'">7''</option>
                                    <option value="8\'\'">8''</option>
                                    <option value="9\'\'">9''</option>
                                    <option value="10\'\'">10''</option>
                                    <option value="11\'\'">11''</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="apellido">Peso(lbs):</label>
                                <input type="number" name="peso" id="peso" class="form-control" placeholder="Peso" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="numero">Año de Firma:</label>
                                <input type="number" name="firma" id="firma" class="form-control" placeholder="Año de Firma">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Posicion">Posicion</label>
                                <select name="posicion" id="posicion" class="form-control" required>
                                    <option value="P">Pitcher</option>
                                    <option value="IF">Infielder</option>
                                    <option value="OF">Outfielder</option>
                                    <option value="C">Catcher</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Posicion">Nivel</label>
                                <select name="nivel" id="nivel" class="form-control" required>
                                    <option value="1">Grande</option>
                                    <option value="2">Paralela</option>
                                    <option value="3">Menores</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="equipos">Equipo:</label>
                                <select name="id_equipo" id="id_equipo" required>
                                    <?php
									$sql = "SELECT * FROM equipo";
									$result = mysqli_query($conn, $sql);
									if ($result) {
										while ($row = mysqli_fetch_assoc($result)) {
											echo '<option value="' . $row[id] . '">' . $row[nombre] . '</option>';
										}
									}
									?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="JG">JG:</label>
                                <input type="number" name="JG" id="JG" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="JP">JP:</label>
                                <input type="number" name="JP" id="JP" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="JS">JS:</label>
                                <input type="number" name="JS" id="JS" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="VB">VB:</label>
                                <input type="number" name="VB" id="VB" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="C">C:</label>
                                <input type="number" name="C" id="C" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="AVE">AVE:</label>
                                <input type="number" name="AVE" id="AVE" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="CI">CI:</label>
                                <input type="number" name="CI" id="CI" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="HR">HR:</label>
                                <input type="number" name="HR" id="HR" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="ERA">ERA:</label>
                                <input type="number" name="ERA" id="ERA" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="IL">IL:</label>
                                <input type="number" name="IL" id="IL" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="SO">SO:</label>
                                <input type="number" name="SO" id="SO" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="BB">BB:</label>
                                <input type="number" name="BB" id="BB" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option></option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="imagen1" name="imagen1">
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer del modal-->
                <div class="modal-footer">
                    <button name="submit" type="submit" class="btn btn-success" aria-hidden="true"><span class="glyphicon glyphicon-ok"><span>Agregar</button>
                    <button type="reset" name="reset" data-dismiss="modal" class="btn btn-default" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "../footer.php";

?> 