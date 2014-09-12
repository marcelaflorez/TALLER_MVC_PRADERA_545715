<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getRow($num_doc) {
    try {
      $sql = "SELECT desercion.num_doc,fecha,aprendiz.id_apre,num_ficha,causa_desercion.cod_causa,fecha_desercion,fase_desercion " 
       . " FROM desercion,aprendiz,causa_desercion  " 
       . " WHERE desercion.id_apre=aprendiz.id_apre "
       . " and desercion.cod_causa=causa_desercion.cod_causa"
       . " and desercion.num_doc= $num_doc";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  static public function certifyDesercion($num_doc) {
    try {
     $sql = "SELECT desercion.num_doc FROM desercion WHERE desercion.num_doc = '$num_doc'";
    
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información de la consulta
   * @param integer $num_doc Variables contenedora de la tabla Desercion
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateDesercion($num_doc, $data) {
    try {

      $sql = 'UPDATE desercion SET ';

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE num_doc = " . $num_doc;
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
  
  static public function deleteDesercion($num_doc) {
    try {

    $sql = "delete from desercion where num_doc='$num_doc'";
    
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
      $sql = "SELECT num_doc,fecha,id_apre,num_ficha,cod_causa,fecha_desercion,fase_desercion FROM desercion";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $num_doc
   * @param type $fecha
   * @param type $id_apre
   * @param type $num_ficha
   * @param type $cod_causa
   * @param type $fecha_desercion
   * @param type $fase_desercion
   * @return \PDOException
   */
  static public function putNewDesercion($num_doc,$fecha,$id_apre,$num_ficha,$cod_causa,$fecha_desercion,$fase_desercion) {
    try {
    $sql ="INSERT INTO desercion(num_doc,fecha,id_apre,num_ficha,cod_causa,fecha_desercion,fase_desercion) VALUES ('$num_doc','$fecha','$id_apre','$num_ficha','$cod_causa','$fecha_desercion','$fase_desercion')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El registro $num_doc está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }
}