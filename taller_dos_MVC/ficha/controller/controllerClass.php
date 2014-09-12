<?php

/**
 * Description of controllerClass
 *
 * @author Marcelaflorez
 */
class controllerClass {

  public function index($args = NULL) {
    $args['datos'] = modelClass::getAll();

    if (is_array($args['datos'])) {//opcional if (is_array($args['datos'])=== true)
      viewClass::renderHTML('index.php', $args);//si se cambia el nombre al index del template  a read se cambia aqui tambien
    } else {
      viewClass::renderHTML('error.php', $args);//$args['error']=$data->getMessage();
    }
  }

 public function create() {
        $template = 'create.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rsp = modelClass::putNewFicha($_POST['num_ficha'], $_POST['cod_prog'], $_POST['fecha_ini'], $_POST['fecha_fin'], $_POST['cod_centro']);

            if ($rsp === true) {
                $args['success'] = 'El registro fue realizado exitosamente';
                $this->index($args);
           } else {
          $args['error'] = $rsp->getMessage();
          $args['formAction'] = 'index.php?action=create';
          $args = array_merge($args, $_POST);
          viewClass::renderHTML($template, $args);
        }
    } else {
      $args['formAction'] = 'index.php?action=create';
      viewClass::renderHTML($template, $args);
    }
  }

  public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['num_ficha']) and is_numeric($_GET['num_ficha'])) {
      $certificate = modelClass::certifyFicha($_GET['num_ficha']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['num_ficha']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['num_ficha'] = $data[0]['num_ficha'];
              $args['cod_prog'] = $data[0]['cod_prog'];
              $args['fecha_ini'] = $data[0]['fecha_ini'];
              $args['fecha_fin'] = $data[0]['fecha_fin'];
              $args['cod_centro'] = $data[0]['cod_centro'];  
           }
          } else {
            $args['error'] = $data;
            viewClass::renderHTML('error.php', $args);
          }
        }
      } else {
        $args['error'] = $certificate;
        viewClass::renderHTML('error.php', $args);
      }
      $args['formAction'] = 'index.php?action=update&amp;num_ficha=' . $_GET['num_ficha'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['num_ficha'] = $_POST['num_ficha'];
      $data['cod_prog'] = ($_POST['cod_prog'] );
      $data['fecha_ini'] = ($_POST['fecha_ini'] );
      $data['fecha_fin'] = ($_POST['fecha_fin'] );
      $data['cod_centro'] = ($_POST['cod_centro'] );
      $rsp = modelClass::updateFicha($_GET['num_ficha'], $data);
      if ($rsp === true)  {
        $args['success'] = 'Cambio exitoso ';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;num_ficha=' . $_GET['num_ficha'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  } 
  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;num_ficha=' . $_GET['num_ficha'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['num_ficha']) and is_numeric($_GET['num_ficha'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['num_ficha']) and $_POST['num_ficha'] === 'true') {
      $rsp = modelClass::deleteFicha($_GET['num_ficha']);
      if ($rsp === true) {
        $args['success'] = 'Dato ' . $_GET['num_ficha'] . ' Eliminacion exitosa';
      } else {
        $args['error'] = $rsp;
        viewClass::renderHTML('error.php', $args);
      }
      $this->index($args);
    }
  }

  public function notFound() {
    
  }

}
