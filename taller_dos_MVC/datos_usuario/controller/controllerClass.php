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
        $rsp = modelClass::putNewDatos($_POST['usuario_id'], $_POST['nombre'], $_POST['apel'], $_POST['direc'], $_POST['telefono'], $_POST['localidad_id']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['usuario_id']) and is_numeric($_GET['usuario_id'])) {
      $certificate = modelClass::certifyDatos($_GET['usuario_id']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['usuario_id']);
          if (is_array($data)) {
            if (count($data) > 0) {
              
              $args['usuario_id'] = $data[0]['usuario_id'];
              $args['nombre'] = $data[0]['nombre'];
              $args['apel'] = $data[0]['apel'];
              $args['direc'] = $data[0]['direc'];
              $args['telefono'] = $data[0]['telefono'];
              $args['localidad'] = $data[0]['localidad_id'];   
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
      $args['formAction'] = 'index.php?action=update&amp;usuario_id=' . $_GET['usuario_id'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $data['usuario_id'] = ($_POST['usuario_id'] );
      $data['nombre'] = ($_POST['nombre'] );
      $data['apel'] = ($_POST['apel'] );
      $data['direc'] = ($_POST['direc'] );
      $data['telefono'] = ($_POST['telefono'] );
      $data['localidad_id'] = ($_POST['localidad_id'] );
      $rsp = modelClass::updateDatos($_GET['usuario_id'], $data);
      if ($rsp === true)  {
        $args['success'] = 'Cambio exitoso ';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;usuario_id=' . $_GET['usuario_id'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  } 
  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;usuario_id=' . $_GET['usuario_id'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['usuario_id']) and is_numeric($_GET['usuario_id'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['usuario_id']) and $_POST['usuario_id'] === 'true') {
      $rsp = modelClass::deleteDatos($_GET['usuario_id']);
      if ($rsp === true) {
        $args['success'] = 'Dato ' . $_GET['usuario_id'] . ' Eliminacion exitosa';
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
