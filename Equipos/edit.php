<?php
include"../header.php";
$sql = "SELECT * FROM equipo WHERE id='$_GET[id]'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
}
?>
<div id="content">
	<div class="panel box-shadow-none content-header">
		<div class="panel-body">
			<div class="col-md-12">
				<h3 class="animated fadeInLeft">Editar Equipos</h3>
				<p class="animated fadeInDown">Principal<span class="fa-angle-right fa"></span> Equipos<span class="fa-angle-right fa"></span> Editar</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 top-20 padding-0">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<div class="row">
						<a type="button" href="index.php" class="btn btn-info">
							<span class= ""></span> Inicio
						</a>
					</div>
				</div>
				<div class="panel-body">
					<form method="POST" action="update.php" class="form" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $row['id']; ?>">
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<label for="Nombre">Nombre</label>
									<input class="form-control" name="name" placeholder="Insertar Nombre" value="<?php echo $row['nombre'] ?>">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="Alias">Alias</label>
									<input class="form-control" name="alias" placeholder="Ejemplo: Águilas" value="<?php echo $row['alias'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="estado">Estado:</label>
									<select name="estado" id="estado" class="form-control">
										<option value="<?php echo $row['estado']; ?>"></option>
										<option value="1">Activo</option>
										<option value="0">Inactivo</option>
									</select>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<label for="Logo">Logo:</label>
									<input type="file" class="form-control" id="imagen1" name="imagen1">
								</div>
							</div>
						</div>
						<button name="submit" type="submit" class="btn btn-success" aria-hidden="true"><span class="glyphicon glyphicon-ok"></span>Editar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

include"../footer.php";

?>