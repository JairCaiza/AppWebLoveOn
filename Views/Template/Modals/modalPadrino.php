
<?php
getModal('modalApadrinar', $data);
?>
<div class="modal fade modalformPadrino" id="modalformPadrino" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4">Ninos Listos Para Apadrinarse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="tablaApadrinarse">
                <thead>
                  <tr>
                  <th>ID</th>
                    <th>Pseudonimo</th>
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