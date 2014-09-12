<?php

/**
 * Description of modelClass
 *
 * @author Marcelaflorez
 */
class modelClass {

    static public function getRow($cod_centro) {
        try {
            $sql = 'SELECT centro.cod_centro,centro.desc_centro,centro.tel,centro.dir,ciudad.cod_ciudad FROM centro,ciudad WHERE centro.cod_ciudad=ciudad.cod_ciudad and centro.cod_centro = ' . $cod_centro;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function certifyCentro($cod_centro) {
        try {
            $sql = 'SELECT centro.cod_centro FROM centro WHERE centro.cod_centro = ' . $cod_centro;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    /**
     * Método para actualizar la información de la consulta
     * @param integer $cod_centro Variables contenedora de la consulta 
     * @param array $data Array asociativo, cada posición es el nombre de las columnas en base de datos
     * @return \PDOException
     * @throws PDOException
     */
    static public function updateCentro($cod_centro, $data) {
        try {

            $sql = "UPDATE centro SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_centro = " . $cod_centro;

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

    static public function deleteCentro($cod_centro) {
        try {

            $sql = "delete from centro where cod_centro='$cod_centro'";

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
            return $e;
        }
    }

    /**
     * 
     * @return \PDOException
     */
    static public function getAll() {
        try {
            $sql = "select cod_centro,desc_centro,tel,dir,ciudad.cod_ciudad from centro,ciudad " . 
            "where centro.cod_ciudad=ciudad.cod_ciudad";
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
     * @param type $cod_centro
     * @param type $desc_centro
     * * @param type $tel
     * * @param type $dir
     * * @param type $cod_ciudad
     */
    static public function putNewCentro($cod_centro, $desc_centro, $tel, $dir, $cod_ciudad) {
        try {
            $sql = "INSERT INTO centro(cod_centro,desc_centro,tel,dir,cod_ciudad) VALUES ('$cod_centro','$desc_centro','$tel','$dir','$cod_ciudad')";
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El codigo centro $cod_centro está siendo usado", 2745); 
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

}
