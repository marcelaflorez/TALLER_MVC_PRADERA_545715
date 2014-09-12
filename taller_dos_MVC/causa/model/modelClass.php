<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getRow($cod_causa) {
    try {
      $sql = 'SELECT cod_causa,des_causa,estado_causa FROM causa_desercion WHERE cod_causa = ' . $cod_causa;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyCausa($cod_causa) {
    try {
      $sql = 'SELECT cod_causa,des_causa,estado_causa FROM causa_desercion WHERE cod_causa = ' . $cod_causa;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información de la consulta
   * @param integer $cod_causa Variables contenedora del RH de la consulta 
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateCausa($cod_causa, $data) {
    try {

      $sql = "UPDATE causa_desercion SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE cod_causa = " . $cod_causa;
      
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
  
  static public function deleteCausa($cod_causa) {
    try {

      $sql = "delete from causa_desercion where cod_causa = '$cod_causa'"; 

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
      $sql = "select cod_causa,des_causa,estado_causa from causa_desercion";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
      /*
        if($e->getCode() === 10) {
        echo 'Base de Datos no encotrada';
        }
       */
    }
  }

  /**
   * 
   * @param type $cod_causa
   * @param type $des_causa
   * @param type $estado_causa
   */
  static public function putNewCausa($cod_causa,$des_causa,$estado_causa) {
    try {
      $sql ="INSERT INTO causa_desercion(cod_causa,des_causa,estado_causa) VALUES ('$cod_causa','$des_causa','$estado_causa')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El codigo cod_causa $cod_causa está siendo usado", 2745);
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}