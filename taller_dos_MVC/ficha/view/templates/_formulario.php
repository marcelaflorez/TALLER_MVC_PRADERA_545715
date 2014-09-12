<html>
    <body><center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="90%">
                    <tr> 
                        <th bgcolor="#FF66FF"> 

                            <input type="text"name="num_ficha" value="<?php echo ((isset($num_ficha)) ? $num_ficha : '') ?>" id="num_ficha" required min="1" max="20"> num_ficha</input>
                            <input type="text"name="cod_prog" value="<?php echo ((isset($cod_prog)) ? $cod_prog : '') ?>" id="cod_prog" required min="1" max="20"> cod_prog</input>
                            <input type="text"name="fecha_ini" value="<?php echo ((isset($fecha_ini)) ? $fecha_ini : '') ?>" id="fecha_ini" required min="1" max="20"> fecha_ini</input>
                            <input type="text"name="fecha_fin" value="<?php echo ((isset($fecha_fin)) ? $fecha_fin : '') ?>" id="fecha_fin" required min="1" max="20"> fecha_fin</input>
                            <input type="text"name="cod_centro" value="<?php echo ((isset($cod_centro)) ? $cod_centro : '') ?>" id="cod_centro" required min="1" max="20"> cod_centro</input>

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