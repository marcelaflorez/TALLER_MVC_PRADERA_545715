<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getRow($cod_tipo_id) {
    try {
      $sql = 'SELECT tipo_id.cod_tipo_id, tipo_id.des_tipo_id FROM tipo_id WHERE tipo_id.cod_tipo_id = ' . $cod_tipo_id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyTipo($cod_tipo_id) {
    try {
      $sql = 'SELECT tipo_id.cod_tipo_id FROM tipo_id WHERE tipo_id.cod_tipo_id = ' . $cod_tipo_id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información de la consulta
   * @param integer $cod_tipo_id Variables contenedora de la consulta 
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateTipo($cod_tipo_id, $data) {
    try {

      $sql = 'UPDATE tipo_id SET ';

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE cod_tipo_id = " . $cod_tipo_id;
    
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
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  static public function deleteTipo($cod_tipo_id) {
    try {

      $sql = "delete from tipo_id where cod_tipo_id='$cod_tipo_id'"; 

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
      $sql = "select cod_tipo_id,des_tipo_id from  tipo_id";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $cod_tipo_id
   * @param type $des_tipo_id
   */
  static public function putNewTipo($cod_tipo_id, $des_tipo_id) {
    try {
      $sql ="INSERT INTO tipo_id(cod_tipo_id,des_tipo_id) VALUES ('$cod_tipo_id','$des_tipo_id')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El codigo tipo_id $cod_tipo_id está siendo usado", 2745);//2745 codigo del erro
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}