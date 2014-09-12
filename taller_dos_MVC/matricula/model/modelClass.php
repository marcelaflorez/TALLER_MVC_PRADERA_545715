<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getRow($num_ficha) {
    try {
      $sql = 'SELECT num_ficha,id_apre,estado FROM matricula WHERE num_ficha = ' . $num_ficha;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyMatri($num_ficha) {
    try {
      $sql = 'SELECT matricula.num_ficha FROM matricula WHERE num_ficha = ' . $num_ficha;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información de la consulta
   * @param integer $num_ficha Variables contenedora de la consulta Matricula
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateMatri($num_ficha, $data) {
    try {

      $sql = "UPDATE matricula SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE num_ficha = " . $num_ficha;
      
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
  
  static public function deleteMatri($num_ficha) {
    try {

      $sql = "delete from matricula where num_ficha='$num_ficha'"; 

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
      $sql = "select num_ficha,id_apre,estado from matricula";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $num_ficha
   * @param type $id_apre
   * @param type $estado
   */
  static public function putNewMatri($num_ficha,$id_apre,$estado) {
    try {
      $sql ="INSERT INTO matricula(num_ficha,id_apre,estado) VALUES ('$num_ficha','$id_apre','$estado')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El codigo num_ficha $num_ficha está siendo usado", 2745);//2745 codigo del erro
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}