<?php
headerAdmin($data);
getModal('modalRepresentante', $data);
?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
				<button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Registrar Hijo</button>
			</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="<?= base_url(); ?>/representante"><?= $data['page_title'] ?></a></li>
		</ul>
	</div>
	<div class="row">


		<div class="col-md-12">
			
			<div class="tile">
				<div class="tile-body">
				
					<div class="bs-component">
						<ul class="nav nav-tabs">
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#ListadoHijos">Listado de Hijos Registrados</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Ver reporte</a></li>

						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade active show" id="ListadoHijos">
								
								<div class="table-responsive">
									<table class="table table-hover table-bordered" id="tablaRepresentado">
										<thead>
											<tr>
												<th>ID</th>
												<th>Cedula</th>
												<th>Nombres</th>
												<th>Apellidos</th>
												<th>Email</th>
												<th>Direccion</th>
												<th>Institucion Educativa</th>
												<th>Jornada</th>
												<th>Curso</th>
												<th>Ong</th>
												<th>Alergias</th>
												<th>Enfermedad</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="profile">
								<div class="col-md-6">
									<div class="tile">
										<div class="tile-title-w-btn">
											<h3 class="title">Dropzone</h3>
											<p><a class="btn btn-primary icon-btn" href="https://gitlab.com/meno/dropzone" target="_blank"><i class="fa fa-file"></i>Docs</a></p>
										</div>
										<div class="tile-body">
											<p>This plugin can be used to let the user Drag and Drop files for upload in a easy way.</p>
											<h4>Demo</h4>
											
											<form class="text-center dropzone dz-clickable" method="POST" enctype="multipart/form-data" action="/file-upload">
												<div class="dz-message">Drop files here or click to upload<br><small class="text-info">(This is just a dropzone demo. Selected files are not actually uploaded.)</small></div>

											</form>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php footerAdmin($data); ?>