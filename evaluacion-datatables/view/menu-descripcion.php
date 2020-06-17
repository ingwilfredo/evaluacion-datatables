<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema para gestionar menu's">
  <link rel="shortcut icon" href="img/menu.ico">
  <title>Descripcion de menus</title>

  <link href="assets/dist/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php';?>

  <main class="py-4" role="main">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 pt-4">
          <div class="card">
            <div class="card-body">
              <?php if( !empty( $_REQUEST['id'] ) )
              {
                $menuDescripcion = $this->model->obtenerMenu($_REQUEST['id']);
                echo $menuDescripcion->descripcion;
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="assets/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
