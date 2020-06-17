<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema para gestionar menu's">
  <link rel="shortcut icon" href="img/menu.ico">
  <title>Menu</title>

  <link href="assets/dist/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/responsive.bootstrap4.min.css">

</head>
<body>
  <?php include 'navbar.php';?>

  <main class="py-4" role="main">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="d-flex bd-highlight">
                <div class="mr-auto bd-highlight">Menú</div>
                <div class="bd-highlight pr-2">
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCrear"><i class="fa fa-plus"></i> Nuevo</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Lista de menús</h5>
              <table id="menu-table" class="table table-hover table-bordered table-condensed nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Menú padre</th>
                    <th scope="col">Descripción</th>
                    <th width="160px" class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($this->model->obtrnerMenu() as $menu): ?>
                    <tr>
                      <td><?php echo $menu->id; ?></td>
                      <td><?php echo $menu->nombre; ?></td>
                      <td><?php echo $menu->menu_padre; ?></td>
                      <td><?php echo $menu->descripcion; ?></td>
                      <td class="text-center">
                        <a  class="btn btn-primary btn-sm mr-2" href="?m=menu&a=Actualizar&id=<?php echo $menu->id; ?>">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar('<?php echo $menu->id; ?>', '<?php echo $menu->nombre; ?>');">Eliminar</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="?m=menu&a=Guardar" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title">Crear Menú</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <input type="hidden" name="accion" value="1" />
              <div class="col-md-12 mb-3">
                <label for="descripcion">Menú padre</label>
                <select class="form-control" id="menu_padre" name="menu_padre">
                  <option value="" selected disabled>Selecciona una opción</option>
                  <?php foreach($this->model->obtrnerPadre() as $padre): ?>
                    <option value="<?php echo $padre->id; ?>"> <?php echo $padre->nombre; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-12 mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <div class="invalid-feedback">
                  Por favor ingrese el nombre del menú.
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="2" required></textarea>
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

  <!-- Modal eliminar -->
  <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title">Eliminar Menú</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Seguro de eliminar el menu <span id="lb-menu"></span> y sus dependencias?</p>
        </div>
        <div class="modal-footer">
          <div class="d-flex bd-highlight">
            <div class="mr-auto bd-highlight">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            </div>
            <div class="bd-highlight pr-2">
              <button type="button" class="btn btn-primary" onclick="confirmaEliminar()"><i class="fa fa-check"></i> Aceptar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="assets/dist/js/bootstrap.bundle.js"></script>
  <script src="assets/js/validar.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/js/dataTables.responsive.min.js"></script>
  <script src="assets/js/responsive.bootstrap4.min.js"></script>
  <script src="assets/js/eliminar.js"></script>
  <?php
  if( !empty( $_REQUEST['message'] ) )
  {
    ?>
    <script type="text/javascript">
    var msg_notification = "<?php echo $_REQUEST['message'] ?>";
    </script>
    <?php
    include 'notificacion.php';
  }
  ?>

  <script>
$(function() {
  $('body').tooltip({selector: '[data-toggle="tooltip"]'});
  $('#menu-table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    columnDefs: [
      { orderable: false, targets: [4] }
    ]
  });
});
</script>
</body>

</html>
