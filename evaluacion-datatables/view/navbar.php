<link href="assets/css/navbar.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<nav class="navbar navbar-expand-md navbar-dark bg-primary flex-column flex-md-row bd-navbar">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarContent">
      <a class="navbar-brand" href="index.php">Evaluación</a>
      <ul class="navbar-nav mr-auto">

        <?php foreach($this->model->obtrnerMenuOption() as $menuOption): ?>
          <?php if($menuOption->hijos > 0) { ?>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown<?php echo $menuOption->id ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $menuOption->nombre ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo $menuOption->id ?>">
                <?php foreach($this->model->obtrnerMenuHijos($menuOption->id) as $menuOptionHijo): ?>
                <a class="dropdown-item" href="?m=menu&a=MenuOption&id=<?php echo $menuOptionHijo->id ?>"><?php echo $menuOptionHijo->nombre ?></a>
                <?php endforeach; ?>
              </div>
            </li>
          <?php } ?>

        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
