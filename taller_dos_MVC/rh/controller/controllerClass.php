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
        $rsp = modelClass::putNewRh($_POST['cod_rh'], $_POST['des_rh']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_rh'])) {
      $certificate = modelClass::certifyRh($_GET['cod_rh']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_rh']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['cod_rh'] = $data[0]['cod_rh'];
              $args['des_rh'] = $data[0]['des_rh'];
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
      $args['formAction'] = 'index.php?action=update&amp;cod_rh=' . $_GET['cod_rh'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['cod_rh'] = $_POST['cod_rh'];
      $data['des_rh'] = ($_POST['des_rh'] );
      $rsp = modelClass::updaterh($_GET['cod_rh'], $data);
      if ($rsp === true)  {
        $args['success'] = 'Cambio exitoso ';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_rh=' . $_GET['cod_rh'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  } 
  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_rh=' . $_GET['cod_rh'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_rh']) and is_numeric($_GET['cod_rh'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['cod_rh']) and $_POST['cod_rh'] === 'true') {
      $rsp = modelClass::deleteRh($_GET['cod_rh']);
      if ($rsp === true) {
        $args['success'] = 'Dato ' . $_GET['cod_rh'] . ' Eliminacion exitosa';
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
