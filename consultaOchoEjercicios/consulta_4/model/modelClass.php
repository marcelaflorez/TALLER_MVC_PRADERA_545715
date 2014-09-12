<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getAll() {
    try {
      $sql = "SELECT count(aprendiz.id_apre),des_causa,desc_centro,ficha.num_ficha FROM causa_desercion natural join desercion natural join ficha natural join centro,aprendiz where desercion.id_apre=aprendiz.id_apre and centro.cod_centro=2 group by desercion.cod_causa";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
}