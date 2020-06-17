
<div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-hidden="true">
  <form action="?m=menu&a=Guardar" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title">Actualizar Menú</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <input type="hidden" name="accion" value="0" />
            <input type="hidden" name="id" value="<?php echo $menuActualizar->id; ?>" />
            <div class="col-md-12 mb-3">
              <label for="descripcion">Menú padre</label>
              <select class="form-control" id="menu_padre" name="menu_padre">
                <option value="" selected disabled>Selecciona una opción</option>
                <?php foreach($this->model->obtrnerPadre() as $padre): ?>
                  <option value="<?php echo $padre->id;?>" <?php if($menuActualizar->menu_padre == $padre->id) echo "selected" ?>> <?php echo $padre->nombre; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-12 mb-3">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $menuActualizar->nombre; ?>" required>
              <div class="invalid-feedback">
                Por favor ingrese el nombre del menú.
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="2" required><?php echo $menuActualizar->descripcion; ?></textarea>
              <div class="invalid-feedback">
                Por favor ingrese la descripción del menú.
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="d-flex bd-highlight">
            <div class="mr-auto bd-highlight">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            </div>
            <div class="bd-highlight pr-2">
              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">

$(function() {
  $("#modalActualizar").modal('show');
});
</script>
