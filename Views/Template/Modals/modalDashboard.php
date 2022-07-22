<div class="modal fade modalFormNoticias" id="modalFormNoticias" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Nueva Fotografia o Noticia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" class="formSubirNoticias" id="formSubirNoticias" name="formSubirNoticias">
					<div class="row mb-4">
					<input  type="hidden" id="Idnoticia" name="Idnoticia" value="">
						<div class="col-md-6">
							<label>Nombre de Noticia</label>
							<input class="form-control" type="text" id="txNombreN" name="txNombreN">
						</div>
					</div>
					<div class="photo">
						<label for="foto">Foto (570x380)</label>
						<div class="prevPhoto">
							<span class="delPhoto notBlock">X</span>
							<label for="foto"></label>
							<div>
								<img id="img" src="<?= media(); ?>/images/portada_categoria.png">
							</div>
						</div>
						<div class="upimg">
							<input type="file" name="foto" id="foto">
						</div>
						<div id="form_alert"></div>
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