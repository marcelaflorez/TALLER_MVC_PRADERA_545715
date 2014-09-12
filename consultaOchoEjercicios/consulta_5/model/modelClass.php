<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {
  
  static public function getAll() {
    try {
      $sql = "SELECT  ficha.num_ficha,nom_apre,des_rh,genero,nom_ciudad,des_causa,des_prog FROM causa_desercion natural join desercion natural join ficha natural join programa, rh natural join aprendiz natural join ciudad where genero='M' and desercion.cod_causa=3 group by desercion.cod_causa";
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
}