<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getAll() {
    try {
      $sql = "SELECT nom_apre,des_tipo_id,ficha.num_ficha,nom_ciudad,nom_depto,centro.cod_centro,cod_causa FROM tipo_id,aprendiz,desercion,ficha,centro,ciudad,depto where desercion.cod_causa=desercion.cod_causa and desercion.id_apre=aprendiz.id_apre and aprendiz.cod_tipo_id=tipo_id.cod_tipo_id and ficha.cod_centro=centro.cod_centro and ciudad.cod_depto=depto.cod_depto and aprendiz.cod_ciudad=ciudad.cod_ciudad and desercion.num_ficha=ficha.num_ficha";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
}