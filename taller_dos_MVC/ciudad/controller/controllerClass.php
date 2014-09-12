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
        $rsp = modelClass::putNewCiudad($_POST['cod_ciudad'], $_POST['nom_ciudad'], $_POST['cod_depto'], $_POST['habitantes']);
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_ciudad'])and is_numeric($_GET['cod_ciudad'])) {
      $certificate = modelClass::certifyCiudad($_GET['cod_ciudad']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['cod_ciudad']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['cod_ciudad'] = $data[0]['cod_ciudad'];
              $args['nom_ciudad'] = $data[0]['nom_ciudad'];
              $args['cod_depto'] = $data[0]['cod_depto'];
              $args['habitantes'] = $data[0]['habitantes'];
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
      $args['formAction'] = 'index.php?action=update&amp;cod_ciudad=' . $_GET['cod_ciudad'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $data['cod_ciudad'] = $_POST['cod_ciudad'];
      $data['nom_ciudad'] = ($_POST['nom_ciudad'] );
      $data['cod_depto'] = ($_POST['cod_depto'] );
      $data['habitantes'] = ($_POST['habitantes'] );
      $rsp = modelClass::updateCiudad($_GET['cod_ciudad'], $data);
      if ($rsp === true)  {
        $args['success'] = 'Cambio exitoso ';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;cod_ciudad=' . $_GET['cod_ciudad'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  } 
  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;cod_ciudad=' . $_GET['cod_ciudad'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_ciudad']) and is_numeric($_GET['cod_ciudad'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['cod_ciudad']) and $_POST['cod_ciudad'] === 'true') {
      $rsp = modelClass::deleteCiudad($_GET['cod_ciudad']);
      if ($rsp === true) {
        $args['success'] = 'Dato ' . $_GET['cod_ciudad'] . ' Eliminacion exitosa';
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
