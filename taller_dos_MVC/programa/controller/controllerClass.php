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
        $rsp = modelClass::putNewProg($_POST['cod_prog'], $_POST['des_prog'], $_POST['estado']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_prog'])and is_numeric($_GET['cod_prog'])) {
      $certificate = modelClass::certifyProg($_GET['cod_prog']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_prog']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['cod_prog'] = $data[0]['cod_prog'];
              $args['des_prog'] = $data[0]['des_prog'];
              $args['estado'] = $data[0]['estado'];
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
      $args['formAction'] = 'index.php?action=update&amp;cod_prog=' . $_GET['cod_prog'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['cod_prog'] = $_POST['cod_prog'];
      $data['des_prog'] = ($_POST['des_prog'] );
      $data['estado'] = ($_POST['estado'] );
      $rsp = modelClass::updateProg($_GET['cod_prog'], $data);
      if ($rsp === true)  {
        $args['success'] = 'Cambio exitoso ';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_prog=' . $_GET['cod_prog'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  } 
  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_prog=' . $_GET['cod_prog'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_prog']) and is_numeric($_GET['cod_prog'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['cod_prog']) and $_POST['cod_prog'] === 'true') {
      $rsp = modelClass::deleteProg($_GET['cod_prog']);
      if ($rsp === true) {
        $args['success'] = 'Dato ' . $_GET['cod_prog'] . ' Eliminacion exitosa';
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
