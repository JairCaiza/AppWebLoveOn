<?php headerAdmin($data);
//getModal('modalPerfil',$data);
?>

<main class="app-content">
	<div class="row user">
		<div class="col-md-3">
			<div class="tile p-0">
				<ul class="nav flex-column nav-tabs user-tabs">
					<li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab"> Listado de Estudiantes </a></li>
					<li class="nav-item"><a class="nav-link" href="#subirnotas" data-toggle="tab">Reporte de Notas</a></li>
					<li class="nav-item"><a class="nav-link" href="#subirasistencias" data-toggle="tab">Reporte de Asistencias</a></li>
				</ul>
			</div>
		</div>

		<div class="col-md-9">
			<div class="tab-content">

				<div class="tab-pane active" id="user-timeline">
					<div class="timeline-post">
						<div class="post-media">
							<div class="content">
								<h5><button class="btn btn-primary" type="button" onclick="openModalPerfil();"> <i class="fas fa-pencil-alt"></i>Matricular</button> </h5>
							</div>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td style="with:150px;">Identificacion:</td>
										<td><?= $_SESSION['userData']['cedula']; ?></td>
									</tr>
									<tr>
										<td>Nombre:</td>
										<td><?= $_SESSION['userData']['nombres']; ?></td>
									</tr>
									<tr>
										<td>Apellido:</td>
										<td><?= $_SESSION['userData']['apellidos']; ?></td>
									</tr>
									<tr>
										<td>Telefono:</td>
										<td><?= $_SESSION['userData']['telefono']; ?></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><?= $_SESSION['userData']['email']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>
				<div class="tab-pane fade" id="subirnotas">
					<div class="tile user-settings">
						<h4 class="line-head">Reporte Notas</h4>
						<form action="" class="formSubirNotas" id="formSubirNotas" name="formSubirNotas">
							<div class="row mb-4">
								<div class="col-md-6">
									<label>Parcial</label>
									<input class="form-control" type="text" id="txParcial" name="txParcial" >
								</div>
								<div class="col-md-6">
									<label>Nombre del Archivo</label>
									<input class="form-control" type="text" id="txtNombreArchivo" name="txtNombreArchivo" >
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-6">
									<label>Archivo</label>
									<input class="form-control" type="file" id="txtArchivo" name="txtArchivo" >
								</div>
								<div class="col-md-6 mb-6">
									<label>Docente</label> <br>
									<label><?= $_SESSION['userData']['nombres']?> <?= $_SESSION['userData']['apellidos']?></label>
									<input class="form-control" type="hidden" id="txtIdDocente" name="txtIdDocente" value="<?= $_SESSION['userData']['idpersona']?>" readonly="readonly" >
								</div>
							</div>
							
							<div class="row mb-10">
								<div class="col-md-12">
									<br>
									<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
									<button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i> Limpiar</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="tab-pane fade" id="subirasistencias">
					<div class="tile user-settings">
						<h4 class="line-head">Reporte Asistencias</h4>
						<form action="" class="formSubirNotas" id="formSubirNotas" name="formSubirNotas">
							<div class="row mb-4">
								<div class="col-md-6">
									<label>Parcial</label>
									<input class="form-control" type="text" id="txParcial" name="txParcial" >
								</div>
								<div class="col-md-6">
									<label>Nombre del Archivo</label>
									<input class="form-control" type="text" id="txtNombreArchivo" name="txtNombreArchivo" >
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-6">
									<label>Archivo</label>
									<input class="form-control" type="file" id="txtArchivo" name="txtArchivo" >
								</div>
								<div class="col-md-6 mb-6">
									<label>Docente</label> <br>
									<label><?= $_SESSION['userData']['nombres']?> <?= $_SESSION['userData']['apellidos']?></label>
									<input class="form-control" type="hidden" id="txtIdDocente" name="txtIdDocente" value="<?= $_SESSION['userData']['idpersona']?>" readonly="readonly" >
								</div>
							</div>
							
							<div class="row mb-10">
								<div class="col-md-12">
									<br>
									<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
									<button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i> Limpiar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</main>
<?php footerAdmin($data); ?>