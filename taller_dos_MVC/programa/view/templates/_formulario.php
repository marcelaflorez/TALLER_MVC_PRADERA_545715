<html>
    <body>
    <center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="90">
                    <tr> 
                        <th bgcolor="#FF66FF"> 

                            <input type="text"name="cod_prog"value="<?php echo ((isset($cod_prog)) ? $cod_prog : '') ?>" id="cod_prog" required min="1" max="20"> codigo Programa</input>
                            <input type="text"name="des_prog"value="<?php echo ((isset($des_prog)) ? $des_prog : '') ?>" id="des_prog" required min="1" max="20"> desc Programa</input>
                            <input type="text"name="estado"value="<?php echo ((isset($estado)) ? $estado : '') ?>" id="estado" required min="1" max="20"> estado</input>
                            estado        </select></th>
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