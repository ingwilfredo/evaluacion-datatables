<?php
require_once 'model/menu.php';

class menuController{

  private $model;

  public function __CONSTRUCT(){
    $this->model = new menu();
  }

  public function Index(){
    require_once 'view/menu.php';
  }

  public function Actualizar(){
    $menuActualizar = new menu();

    if(isset($_REQUEST['id'])){
      $menuActualizar = $this->model->obtenerMenu($_REQUEST['id']);
    }

    require_once 'view/menu.php';
    require_once 'view/modal-editar.php';

  }

  public function MenuOption(){
    require_once 'view/menu-descripcion.php';
  }

  public function Guardar(){
    $menu = new menu();

    $menu->id = $_REQUEST['id'];
    if ($_REQUEST['menu_padre']) {
      $menu->menu_padre = $_REQUEST['menu_padre'];
    }
    else {
      $menu->menu_padre = null;
    }
    $menu->nombre = $_REQUEST['nombre'];
    $menu->descripcion = $_REQUEST['descripcion'];

    $menu->accion = $_REQUEST['accion'];


    $menu->accion > 0
    ? $this->model->Registrar($menu)
    : $this->model->Actualizar($menu);

    $menu->accion > 0
    ? header('Location: index.php?message=1')
    :
    header('Location: index.php?message=2');


  }

  public function Eliminar(){
    $this->model->Eliminar($_REQUEST['id']);
    header('Location: index.php?message=3');
  }
}
