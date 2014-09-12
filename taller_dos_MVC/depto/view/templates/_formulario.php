<html>
    <body>
    <center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="90%">
                    <tr> 
                        <th bgcolor="#FF66FF"> 

                            <input type="text"name="cod_depto" value="<?php echo ((isset($cod_depto)) ? $cod_depto : '') ?>" id="cod_depto" required min="1" max="20"> cod_depto</input>
                            <input type="text"name="nom_depto"value="<?php echo ((isset($nom_depto)) ? $nom_depto : '') ?>" id="nom_depto" required min="1" max="20"> nom_depto</input>

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