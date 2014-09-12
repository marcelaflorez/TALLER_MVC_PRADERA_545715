<html>
    <body>
    <center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="90%">
                    <tr> 
                        <th bgcolor="#FF66FF"> 

                            <input type="text"name="cod_tipo_id" value="<?php echo ((isset($cod_tipo_id)) ? $cod_tipo_id : '') ?>" id="cod_tipo_id" required min="1" max="20"> cod_tipo_id</input>
                            <input type="text"name="des_tipo_id" value="<?php echo ((isset($des_tipo_id)) ? $des_tipo_id : '') ?>" id="des_tipo_id" required min="1" max="20"> des_tipo_id</input>

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