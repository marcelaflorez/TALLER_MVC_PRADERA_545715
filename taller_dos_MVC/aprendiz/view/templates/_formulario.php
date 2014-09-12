<html>
    <body>
    <center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="85%" aling="center">
                    <tr> 
                        <th bgcolor="#FF66FF"> 

                            <input type="text"name="id_apre" value="<?php echo ((isset($id_apre)) ? $id_apre : '') ?>" id="id_apre" required min="1" max="20"> Id_aprendiz</input>
                            <input type="text"name="nom_apre" value="<?php echo ((isset($nom_apre)) ? $nom_apre : '') ?>" id="nom_apre" required min="1" max="20"> nombre</input>
                            <input type="text"name="apel_apre" value="<?php echo ((isset($apel_apre)) ? $apel_apre : '') ?>" id="apel_apre" required min="1" max="20"> apellido</input>
                            <input type="text"name="tel_apre" value="<?php echo ((isset($tel_apre)) ? $tel_apre : '') ?>" id="tel_apre" required min="1" max="20"> telefono</input>
                            <input type="text"name="cod_ciudad" value="<?php echo ((isset($cod_ciudad)) ? $cod_ciudad : '') ?>" id="cod_ciudad" required min="1" max="20"> ciudad</input>
                            <input type="text"name="cod_tipo_id" value="<?php echo ((isset($cod_tipo_id)) ? $cod_tipo_id : '') ?>" id="cod_tipo_id" required min="1" max="20"> tipo_id</input>
                            <input type="text"name="cod_rh" value="<?php echo ((isset($cod_rh)) ? $cod_rh : '') ?>" id="cod_rh" required min="1" max="20"> codigo rh</input>
                            <input type="text"name="genero" value="<?php echo ((isset($genero)) ? $genero : '') ?>" id="genero" required min="1" max="20"> genero</input>
                            <input type="text"name="edad" value="<?php echo ((isset($edad)) ? $edad : '') ?>" id="edad" required min="1" max="20"> edad</input>
                            </select></th>
                    </tr>
                    <tr>
                        <th><input type="submit" value="enviar"/></th>

                        </div>
                        </div>
                        </div>
                    <div>
                        <a href="index.php">Volver</a>
                    </div>
                </table>
        </form>
    </center>
</body>
</html>