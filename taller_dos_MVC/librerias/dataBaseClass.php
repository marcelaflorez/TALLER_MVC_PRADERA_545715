<?php

/**
 * Clase con la cual se maneja la conexión a la base de datos
 *
 * @author Marcela Florez <alexaflorez88@hotmail.com>
 */
class dataBaseClass {

  /**
   * Variable para indicar la dirección del
   * servidor de Base de Datos
   * @var string 
   */
  static private $host = 'localhost';

  /**
   * Variable para indicar el puerto del
   * servidor de Base de Datos
   * @var integer
   */
  static private $port = 3306,
          $dbname = 'bddesercion',
          $user = 'root',
          $password = 'Sena2014',
          $driver = 'mysql', // pgsql
          $instance = NULL;

  static public function getInstance() {
    if (!self::$instance) {
      self::connect();
    }
    return self::$instance;
  }

  static private function connect() {
    try {
      $dsn = self::$driver
              . ':host='. self::$host
              . ';port=' . self::$port
              . ';dbname=' . self::$dbname;
      self::$instance = new PDO($dsn, self::$user, self::$password);
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

}
