<div class="modal fade modalFormApadrinar" id="modalFormApadrinar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Apadrinar un Niño</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php //dep($_SESSION['userData']); ?>
            <form id="formApadrinar" name="formApadrinar" class="form-horizontal">
            
              <p class="text-primary">Todos los campos son obligatorios.</p>

              <div class="form-row">
              
                <div class="form-group col-md-6">
                  <label for="txtPseudonimo">Pseudonimo del Niño</label>
                  <input type="hidden" id="idUsuario" name="idUsuario" value="" >
                  <input type="text" class="form-control" id="txtPseudonimo" name="txtPseudonimo" required="" readonly="readonly">
                  
                </div>
                <div class="form-group col-md-6">
                  <label for="txtidpersona">Padrino</label> <br>
                  <label for="txtidpersona"><?= $_SESSION['userData']['nombres']?> <?= $_SESSION['userData']['apellidos']?></label>
                  <input type="text" class="form-control valid validNumber" value="<?= $_SESSION['userData']['idpersona']?>" id="txtidpersona" name="txtidpersona" required="" readonly="readonly" onkeypress="return controlTag(event);">
                </div>
              </div>
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-outline-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Apadrinar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>