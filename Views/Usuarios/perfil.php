<?php  headerAdmin($data);
getModal('modalPerfil',$data);
?>

<main class="app-content">
      <div class="row user">
        <div class="col-md-12">
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos Personales</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Datos fiscales</a></li>
            </ul>
          </div>
        </div> 
        <div class="col-md-9">
          <div class="tab-content">

            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media">
                  <div class="content">
                    <h5>Datos Personales <button class="btn btn-primary" type="button" onclick="openModalPerfil();"> <i class="fas fa-pencil-alt"></i></button> </h5>
                  </div>
                  <table class="table table-bordered">
                      <tbody>
                        <tr>
                            <td style="with:150px;">Identificacion:</td>
                            <td ><?=$_SESSION['userData']['cedula'];?></td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td ><?=$_SESSION['userData']['nombres'];?></td>
                        </tr>
                        <tr>
                            <td >Apellido:</td>
                            <td ><?=$_SESSION['userData']['apellidos'];?></td>
                        </tr>
                        <tr>
                            <td>Telefono:</td>
                            <td ><?=$_SESSION['userData']['telefono'];?></td>
                        </tr>
                        <tr>
                            <td >Email:</td>
                            <td><?=$_SESSION['userData']['email'];?></td>
                        </tr>

                      </tbody>
                    </table>
                </div>
            </div>
            
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Datos Fiscales</h4>
                <form id="formDataAdicional" name="formDataAdicional">
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <label>Lugar de Trabajo</label>
                      <input class="form-control" type="text" id="txtLugarTrabajo" name="txtLugarTrabajo" value="<?=$_SESSION['userData']['lugartrabajo'];?>">
                    </div>
                    <div class="col-md-6">
                      <label>Telefono de Trabajo</label>
                      <input class="form-control" type="text" id="txtTelefonoTrabajo" name="txtTelefonoTrabajo" value="<?=$_SESSION['userData']['telefonotrabajo'];?>">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <label>Direccion</label>
                      <input class="form-control" type="text" id="txtDireccion" name="txtDireccion" value="<?=$_SESSION['userData']['direccion'];?>">
                    </div>
                    <div class="col-md-6">
                      <label>Estado Civil</label>
                      <input class="form-control" type="text" id="txtEstadoCivil" name="txtEstadoCivil" value="<?=$_SESSION['userData']['estadocivil'];?>">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <label>Profesion</label>
                      <input class="form-control" type="text" id="txtProfesion" name="txtProfesion" value="<?=$_SESSION['userData']['profesion'];?>">
                    </div>
                   
                  </div>
                  
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php footerAdmin($data); ?>