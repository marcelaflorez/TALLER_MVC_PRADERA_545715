<html>
    <body>
    <center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="90">
                    <tr> 
                        <th bgcolor="#FF66FF"> 
                            <input type="text"name="usuario_id" value="<?php echo ((isset($usuario_id)) ? $usuario_id : '') ?>" id="usuario_id" required min="1" max="20">  usuario_id</input>
                            <input type="text"name="nombre" value="<?php echo ((isset($nombre)) ? $nombre : '') ?>" id="nombre" required min="1" max="20"> nombre</input>
                            <input type="text"name="apel" value="<?php echo ((isset($apel)) ? $apel : '') ?>" id="apel" required min="1" max="20"> apel</input>
                            <input type="text"name="direc" value="<?php echo ((isset($direc)) ? $direc : '') ?>" id="direc" required min="1" max="20"> direc</input>
                            <input type="text"name="telefono" value="<?php echo ((isset($telefono)) ? $telefono : '') ?>" id="telefono" required min="1" max="20"> telefono</input>
                            <input type="text"name="localidad_id" value="<?php echo ((isset($localidad_id)) ? $localidad_id : '') ?>" id="localidad_id" required min="1" max="20"> localidad</input>

                            </select></th>
                    </tr>
                    <tr>
                        <th><input type="submit" value="enviar"/></th>
                    </tr>
            </div>
            </div>
            </div>
            <div>
                <a href="index.php">Volver</a>
            </div>
        </form>
    </center>
</body>
</html>