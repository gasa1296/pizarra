<?php

include"../header.php";

?>

<div id="content">
	<div class="panel box-shadow-none content-header">
		<div class="panel-body">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Equipos</h3>
				<p class="animated fadeInDown">Principal<span class="fa-angle-right fa"></span> Equipos</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 top-20 padding-0">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-6">
							<h3>Equipos</h3>
						</div>
						<div class="col-sm-6">
							<a href="#ventana0" data-toggle="modal"><button data-toggle="modal" class="btn btn-success">Nuevo</button></a>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="responsive-table">
							<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th id="acc"> Nombre </th>
										<th id="acc"> Logo</th>
										<th id="acc"> Accion</th> 	
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM equipo WHERE estado=1";
									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_assoc($result)) {
											$modificar='<a class="btn btn-warning" href="edit.php?id=' . $row['id'] . '" role="button"><span class="glyphicon glyphicon-pencil"></span></a>';
											echo"<tr><td class='col-xs-2' id='acc'>".$row['nombre']."</td><td class='col-xs-4' id='acc'><img src='logo_equipos/".$row['logo']."' width='100' height='50' margin-left='-5%'></td><td class='col-xs-2' id='acc'>".$modificar."</td></tr>";
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
	</div>
</div>
<div class="modal fade" id="ventana0">
	<div class="modal-dialog">
		<div class="modal-content">
				<!--Header del Modal-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Nuevo Equipo</h4>
			</div>
			<form method="POST" action="insert.php" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label for="Nombre">Nombre</label>
								<input class="form-control" name="name" placeholder="Insertar Nombre" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="Alias">Alias</label>
								<input class="form-control" name="alias" placeholder="Ejemplo: Águilas" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="estado">Estado:</label>
								<select name="estado" id="estado" class="form-control" required>
									<option></option>
									<option value="1">Activo</option>
									<option value="0">Inactivo</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Logo</label>
								<input type="file" class="form-control" name="imagen1" placeholder="Logo" required>
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

include"../footer.php";

?>