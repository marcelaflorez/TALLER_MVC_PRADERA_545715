<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getRow($usuario_id) {
    try {
      $sql = 'SELECT datos_usuario.usuario_id,nombre,apel,direc,telefono,localidad_id FROM datos_usuario WHERE datos_usuario.usuario_id = ' . $usuario_id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyDatos($usuario_id) {
    try {
      $sql = 'SELECT datos_usuario.usuario_id FROM datos_usuario WHERE datos_usuario.usuario_id = ' . $usuario_id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información de la consulta
   * @param integer $usuario_id Variables contenedora de datos_usuario de la consulta 
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateDatos($usuario_id, $data) {
    try {

      $sql = 'UPDATE datos_usuario SET ';

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE usuario_id = " . $usuario_id;
      
      
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();
      
      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El registro no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function deleteDatos($usuario_id) {
    try {

      $sql = "delete from datos_usuario where usuario_id='$usuario_id'"; 

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El registro no ha podido ser eliminado", 2633);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }

  /**
   * 
   * @return \PDOException
   */
  static public function getAll() {
    try {
      $sql = "select usuario_id,nombre,apel,direc,telefono,localidad_id from datos_usuario";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $usuario_id
   * @param type $nombre
   * @param type $apel
   * @param type $direc
   * @param type $telefono
   * @param type $localidad_id
   */
  static public function putNewDatos($usuario_id, $nombre,$apel,$direc,$telefono,$localidad_id) {
    try {
     $sql ="INSERT INTO datos_usuario(usuario_id,nombre,apel,direc,telefono,localidad_id) VALUES ('$usuario_id','$nombre','$apel','$direc','$telefono','$localidad_id')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El id $usuario_id está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}