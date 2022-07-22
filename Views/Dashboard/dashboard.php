<?php
headerAdmin($data);
getModal('modalDashboard',$data);
?>
<main class="app-content">
  <div class="app-title">
    <div>
			<h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
      <?php if ($_SESSION['userData']['idrol'] == 1) { ?>
				<button class="btn btn-outline-primary" type="button" onclick="openModalNoticias();"> <i class="fas fa-plus"></i> Agregar Noticias a la Pagina de Incio</button>
        <?php }?>
			</h1>
		</div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">PANEL DE CONTROL</div>
        
        <?php// dep($_SESSION['userData']); ?>
        <?php if ($_SESSION['userData']['idrol'] == 1) { ?>
          <div class="row">
          <div class="col-md-6 col-lg-3">
            
        </div>
          <div class="col-md-12">

            <div class="tile">
              <div class="tile-body">

                <div class="bs-component">
                  <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Mensajes">Mensajes Solicitados</a></li>
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#ListadoNinos">Listado de Niños</a></li>
                    

                  </ul>
                  <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade active show" id="Mensajes">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tablaMensajes">
                          <thead>
                            <tr>
                              <th>Nombres y Apellidos</th>
                              <th>Email</th>
                              <th>Telefono</th>
                              <th>Mensajes</th>
                              <th>Fecha</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="tab-pane fade active show" id="ListadoNinos">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tablaNinos">
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
                    

                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</main>

<?php
footerAdmin($data);
?>