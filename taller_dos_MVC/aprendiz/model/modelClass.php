<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getRow($id_apre) {
    try {
      $sql = "SELECT aprendiz.id_apre, nom_apre, apel_apre,tel_apre, ciudad.cod_ciudad,tipo_id.cod_tipo_id, rh.cod_rh,genero, edad  " 
       . " FROM aprendiz,ciudad,tipo_id,rh  " 
       . " WHERE aprendiz.id_apre = '$id_apre' "
       . " and aprendiz.cod_ciudad = ciudad.cod_ciudad "
       . " and aprendiz.cod_tipo_id = tipo_id.cod_tipo_id "
       . " and aprendiz.cod_rh = rh.cod_rh ";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  static public function certifyAprendiz($id_apre) {
    try {
      $sql = "SELECT aprendiz.id_apre FROM aprendiz WHERE aprendiz.id_apre = '$id_apre'";
    
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  
  /**
   * Método para actualizar la información de la consulta
   * @param integer $id_apre Variables contenedora del ID_APRE de la tabla
   * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
   * @return \PDOException
   * @throws PDOException
   */
  static public function updateAprendiz($id_apre, $data) {
    try {

      $sql = 'UPDATE aprendiz SET ';

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE id_apre = " . $id_apre;
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
  
  static public function deleteAprendiz($id_apre) {
    try {

    $sql = "delete from aprendiz where id_apre='$id_apre'";
    
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
      $sql = "select id_apre,nom_apre,apel_apre,tel_apre,ciudad.cod_ciudad,tipo_id.cod_tipo_id,rh.cod_rh,genero,edad  " 
              . "from aprendiz ,ciudad,tipo_id,rh  "
       . " where aprendiz.cod_ciudad = ciudad.cod_ciudad "
       . " and aprendiz.cod_tipo_id = tipo_id.cod_tipo_id "
       . " and aprendiz.cod_rh = rh.cod_rh ";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $id_apre
   * @param type $nom_apre
   * @param type $apel_apre
   * @param type $tel_apre
   * @param type $cod_ciudad
   * @param type $cod_tipo_id
   * @param type $cod_rh
   * @param type $genero
   * @param type $edad
   * @return \PDOException
   */
  static public function putNewAprendiz($id_apre,$nom_apre,$apel_apre,$tel_apre,$cod_ciudad,$cod_tipo_id,$cod_rh,$genero,$edad) {
    try {
    echo  $sql ="INSERT INTO aprendiz(id_apre,nom_apre,apel_apre,tel_apre,cod_ciudad,cod_tipo_id,cod_rh,genero,edad) VALUES ('$id_apre','$nom_apre','$apel_apre','$tel_apre','$cod_ciudad','$cod_tipo_id','$cod_rh','$genero','$edad')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El registro $id_apre está siendo usado", 2745);//2745 codigo del erro
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}