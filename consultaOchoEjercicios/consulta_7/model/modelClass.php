<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {

    static public function getAll() {
        try {
            $sql = "select ficha.num_ficha,count(cod_causa),des_causa,centro.desc_centro 
                    from causa_desercion natural join desercion natural join ficha natural join centro
                    where centro.cod_centro=1 
                    group by desercion.cod_causa";
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

}
