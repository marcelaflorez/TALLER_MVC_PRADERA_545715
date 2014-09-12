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
        $rsp = modelClass::putNewCausa($_POST['cod_causa'], $_POST['des_causa'], $_POST['estado_causa']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_causa'])) {
      $certificate = modelClass::certifyCausa($_GET['cod_causa']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_causa']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['cod_causa'] = $data[0]['cod_causa'];
              $args['des_causa'] = $data[0]['des_causa'];
              $args['estado_causa'] = $data[0]['estado_causa'];
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
      $args['formAction'] = 'index.php?action=update&amp;cod_causa=' . $_GET['cod_causa'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['cod_causa'] = $_POST['cod_causa'];
      $data['des_causa'] = ($_POST['des_causa'] );
      $data['estado_causa'] = ($_POST['estado_causa'] );
      $rsp = modelClass::updateCausa($_GET['cod_causa'], $data);
      if ($rsp === true)  {
        $args['success'] = 'Cambio exitoso ';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_causa=' . $_GET['cod_causa'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  } 
  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_causa=' . $_GET['cod_causa'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_causa']) and is_numeric($_GET['cod_causa'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['cod_causa']) and $_POST['cod_causa'] === 'true') {
      $rsp = modelClass::deleteCausa($_GET['cod_causa']);
      if ($rsp === true) {
        $args['success'] = 'Dato ' . $_GET['cod_causa'] . ' Eliminacion exitosa';
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
