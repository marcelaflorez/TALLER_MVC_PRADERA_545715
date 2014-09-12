<html>
    <body>
    <center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="90">
                    <tr> 
                        <th bgcolor="#FF66FF"> 

                            <input type="text"name="cod_causa" value="<?php echo ((isset($cod_causa)) ? $cod_causa : '') ?>" id="cod_causa" required min="1" max="20"> cod_causa</input>
                            <input type="text"name="des_causa" value="<?php echo ((isset($des_causa)) ? $des_causa : '') ?>" id="des_causa" required min="1" max="20"> des_causa</input>
                            <input type="text"name="estado_causa" value="<?php echo ((isset($estado_causa)) ? $estado_causa : '') ?>" id="estado_causa" required min="1" max="20"> estado</input>

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