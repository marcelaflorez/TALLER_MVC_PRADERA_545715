<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {

    static public function getRow($cod_ciudad) {
        try {
            $sql = "SELECT cod_ciudad,nom_ciudad,depto.cod_depto,habitantes "
                    . " FROM ciudad,depto  "
                    . " WHERE ciudad.cod_depto = depto.cod_depto "
                    . " and ciudad.cod_ciudad= $cod_ciudad";
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function certifyCiudad($cod_ciudad) {
        try {
            $sql = "SELECT ciudad.cod_ciudad FROM ciudad WHERE ciudad.cod_ciudad = '$cod_ciudad'";

            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    /**
     * Método para actualizar la información de la consulta
     * @param integer $cod_ciudad Variables contenedora de la tabla Ciudad
     * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
     * @return \PDOException
     * @throws PDOException
     */
    static public function updateCiudad($cod_ciudad, $data) {
        try {

            $sql = 'UPDATE ciudad SET ';

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_ciudad = " . $cod_ciudad;
           

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

    static public function deleteCiudad($cod_ciudad) {
        try {

            $sql = "delete from ciudad where cod_ciudad='$cod_ciudad'";

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
            $sql = "SELECT cod_ciudad,nom_ciudad,cod_depto,habitantes from ciudad";
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    /**
     * 
     * @param type $cod_ciudad
     * @param type $nom_ciudad
     * @param type $cod_depto
     * @param type $habitantes
     * @return \PDOException
     */
    static public function putNewCiudad($cod_ciudad, $nom_ciudad, $cod_depto, $habitantes) {
        try {
            $sql = "INSERT INTO ciudad(cod_ciudad,nom_ciudad,cod_depto,habitantes) VALUES ('$cod_ciudad','$nom_ciudad','$cod_depto','$habitantes')";
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();
            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El registro $cod_ciudad está siendo usado", 2745);
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

}
