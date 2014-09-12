<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getAll() {
    try {
      $sql = "SELECT ficha.num_ficha,nom_apre,des_tipo_id,genero,desc_centro,des_causa FROM causa_desercion natural join desercion natural join aprendiz natural join tipo_id,ficha,centro where ficha.cod_centro=centro.cod_centro and desercion.num_ficha=ficha.num_ficha and desercion.cod_causa=1 and genero='F'";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
}