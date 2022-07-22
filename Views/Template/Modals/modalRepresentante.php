<div class="modal fade modalRepresentante" id="modalRepresentante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Niño</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRepresentado" name="formRepresentado" class="form-horizontal formRepresentado">
                    <input type="hidden" id="idnin" name="idnin" value="">
                    <p class="text-primary">Todos los campos son obligatorios.</p>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtCedula">Cedula</label>
                            <input type="text" class="form-control" id="txtCedula" name="txtCedula" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNombre">Nombres</label>
                            <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtApellido">Apellidos</label>
                            <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtFechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control valid validText" id="txtFechaNacimiento" name="txtFechaNacimiento" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtDireccion">Direccion</label>
                            <input type="text" class="form-control valid validNumber" id="txtDireccion" name="txtDireccion" required="" onkeypress="return controlTag(event);">
                        </div>
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="txtEmail">Email</label>
                            <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtInsEdu">Institucion Educativa</label>
                            <input type="text" class="form-control valid validNumber" id="txtInsEdu" name="txtInsEdu" required="" onkeypress="return controlTag(event);">
                        </div>
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="txtJornada">Jornada</label>
                            <!--<input type="text" class="form-control valid validEmail" id="txtJornada" name="txtJornada" required="">-->
                            <select class="form-control" id="txtJornada" name="txtJornada" require="">
                                    <option value="Matutina">Matutina</option>
                                    <option value="Vespertino">Vespertino</option>
                                    <option value="Nocturno">Nocturno</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtCurso">Curso</label>
                            <!--<input type="text" class="form-control valid validNumber" id="txtCurso" name="txtCurso" required="" onkeypress="return controlTag(event);">-->
                            <select class="form-control" id="txtCurso" name="txtCurso" require="">
                                    <option value="Primero">Primero</option>
                                    <option value="Segundo">Segundo</option>
                                    <option value="Tercero">Tercero</option>
                                    <option value="Cuarto">Cuarto</option>
                                    <option value="Quinto">Quinto</option>
                                    <option value="Sexto">Sexto</option>
                                    <option value="Septimo">Septimo</option>
                                    <option value="Octavo">Octavo</option>
                                    <option value="Noveno">Noveno</option>
                                    <option value="Decimo">Decimo</option>
                                    <option value="Primero Bachillerato">Primero Bachillerato</option>
                                    <option value="Segundo Bachillerato">Segundo Bachillerato</option>
                                    <option value="Tercero Bachillerato">Tercero Bachillerato</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="txtong">ONG</label>
                            <input type="text" class="form-control valid validEmail" id="txtong" name="txtong" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtalergias">Alergias</label>
                            <input type="text" class="form-control valid validNumber" id="txtalergias" name="txtalergias" required="" onkeypress="return controlTag(event);">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtenfermedad">Enfermedad</label>
                            <input type="text" class="form-control valid validNumber" id="txtenfermedad" name="txtenfermedad" required="" onkeypress="return controlTag(event);">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="txtidpersona">Representante</label> <br> <br>
                            <label for="txtidpersona"><?= $_SESSION['userData']['nombres']?> <?= $_SESSION['userData']['apellidos']?></label>
                            <input type="hidden" class="form-control valid validNumber" value="<?= $_SESSION['userData']['idpersona']?>" id="txtidpersona" name="txtidpersona" required="" readonly="readonly" onkeypress="return controlTag(event);">
                        </div>
                       

                    </div>
                    <div class="form-group col-md-6">
                            <label for="txtPseudonimo">Pseudonimo</label>
                            <input type="text" class="form-control valid validNumber" id="txtPseudonimo" name="txtPseudonimo" required="" onkeypress="return controlTag(event);">
                        </div>
                   
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>