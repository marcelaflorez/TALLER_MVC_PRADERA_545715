<html>
    <body>
    <center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="90%">
                    <tr> 
                        <th bgcolor="#FF66FF"> 

                            <input type="text"name="cod_rh" value="<?php echo ((isset($cod_rh)) ? $cod_rh : '') ?>" id="cod_rh" required min="1" max="20"> cod_rh</input>
                            <input type="text"name="des_rh" value="<?php echo ((isset($des_rh)) ? $des_rh : '') ?>" id="des_rh" required min="1" max="20"> des_rh</input>

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