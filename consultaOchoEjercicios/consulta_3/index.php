<?php

include_once '../librerias/dataBaseClass.php';
include_once 'controller/controllerClass.php';
include_once 'model/modelClass.php';
include_once 'view/viewClass.php';

// inicializamos el controlador
$controller = new controllerClass();//$objcontrollerclass = new controllerclas

// verifico que exista $_GET['action']
if (isset($_GET['action'])) {//isset vuelve verdadero la variable if (isset($_GET['action'])=== true)
  switch ($_GET['action']) {//evaluar variable
  }
      $controller->index();
  
  }
 else {
  $controller->index();//$objController->index();
}