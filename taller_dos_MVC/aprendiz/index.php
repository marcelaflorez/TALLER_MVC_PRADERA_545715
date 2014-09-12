<?php

include_once '../librerias/dataBaseClass.php';
include_once 'controller/controllerClass.php';
include_once 'view/viewClass.php';
include_once 'model/modelClass.php';

// inicializamos el controlador
$controller = new controllerClass();//$objcontrollerclass = new controllerclas

// verifico que exista $_GET['action']
if (isset($_GET['action'])) {//isset vuelve verdadero la variable if (isset($_GET['action'])=== true)
  switch ($_GET['action']) {//evaluar variable
    case 'create':
      $controller->create();
      break;
    case 'update':
      $controller->update();
      break;
    case 'delete':
      $controller->delete();
      break;
    case 'read':
      $controller->index();
      break;
    default :
      $controller->notFound();
  }
} else {
  $controller->index();//$objController->index();
}