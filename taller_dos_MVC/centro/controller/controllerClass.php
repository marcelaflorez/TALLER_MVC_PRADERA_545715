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
        $rsp = modelClass::putNewCentro($_POST['cod_centro'], $_POST['desc_centro'], $_POST ['tel'], $_POST ['dir'], $_POST ['cod_ciudad']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_centro'])) {
      $certificate = modelClass::certifyCentro($_GET['cod_centro']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_centro']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['cod_centro'] = $data[0]['cod_centro'];
              $args['desc_centro'] = $data[0]['desc_centro'];
              $args['tel'] = $data[0]['tel'];
              $args['dir'] = $data[0]['dir'];
              $args['cod_ciudad'] = $data[0]['cod_ciudad'];
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
      $args['formAction'] = 'index.php?action=update&amp;cod_centro=' . $_GET['cod_centro'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['cod_centro'] = $_POST['cod_centro'];
      $data['desc_centro'] = ($_POST['desc_centro'] );
      $data['tel'] = ($_POST['tel'] );
      $data['dir'] = ($_POST['dir'] );
      $data['cod_ciudad'] = ($_POST['cod_ciudad'] );
      $rsp = modelClass::updateCentro($_GET['cod_centro'], $data);
      if ($rsp === true)  {
        $args['success'] = 'Cambio exitoso ';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_centro=' . $_GET['cod_centro'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  } 
  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_centro=' . $_GET['cod_centro'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_centro']) and is_numeric($_GET['cod_centro'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['cod_centro']) and $_POST['cod_centro'] === 'true') {
      $rsp = modelClass::deleteCentro($_GET['cod_centro']);
      if ($rsp === true) {
        $args['success'] = 'Dato ' . $_GET['cod_centro'] . ' Eliminacion exitosa';
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
