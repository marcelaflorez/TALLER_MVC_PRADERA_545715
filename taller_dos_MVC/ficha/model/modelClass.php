<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getRow($num_ficha) {
    try {
      $sql = "SELECT num_ficha,programa.cod_prog,fecha_ini,fecha_fin,centro.cod_centro " 
       . " FROM ficha,programa,centro  " 
       . " WHERE ficha.cod_prog=programa.cod_prog "
       . " and ficha.cod_centro=centro.cod_centro"
       . " and ficha.num_ficha= $num_ficha";
      
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyFicha($num_ficha) {
    try {
      $sql = 'SELECT ficha.num_ficha FROM ficha WHERE ficha.num_ficha = ' . $num_ficha;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información de la consulta
   * @param integer $num_ficha Variables contenedora ficha de la consulta 
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateFicha($num_ficha, $data) {
    try {

      $sql = "UPDATE ficha SET ";

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
  
  static public function deleteFicha($num_ficha) {
    try {

      $sql = "delete from ficha where num_ficha='$num_ficha'"; 

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
      $sql = "select num_ficha,cod_prog,fecha_ini,fecha_fin,cod_centro FROM ficha";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $num_ficha
   * @param type $cod_prog
   * @param type $fecha_ini
   * @param type $fecha_fin
   * @param type $cod_centro
   */
   static public function putNewFicha($num_ficha,$cod_prog,$fecha_ini,$fecha_fin,$cod_ccentro) {
    try {
    echo  $sql ="INSERT INTO ficha(num_ficha,cod_prog,fecha_ini,fecha_fin,cod_centro) VALUES ('$num_ficha','$cod_prog','$fecha_ini','$fecha_fin','$cod_ccentro')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El registro $num_ficha está siendo usado", 2745);//2745 codigo del erro
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}