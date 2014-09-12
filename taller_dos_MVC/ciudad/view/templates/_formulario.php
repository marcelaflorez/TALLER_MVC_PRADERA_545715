<html>
    <body>
    <center>
<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
        <div align="center">
            <table border="3" width="100%">
                <tr> 
                    <th bgcolor="#FF66FF"> 

                        <input type="text" name="cod_ciudad" value="<?php echo ((isset($cod_ciudad)) ? $cod_ciudad : '') ?>" id="cod_ciudad" required min="1" max="20"> codigo ciudad</input>
                        <input type="text" name="nom_ciudad" value="<?php echo ((isset($nom_ciudad)) ? $nom_ciudad : '') ?>" id="nom_ciudad" required min="1" max="20"> nombre ciudad</input>
                        <input type="text" name="cod_depto" value="<?php echo ((isset($cod_depto)) ? $cod_depto : '') ?>" id="cod_depto" required min="1" max="20"> codigo depto</input>
                        <input type="text" name="habitantes" value="<?php echo ((isset($habitantes)) ? $habitantes : '') ?>" id="habitantes" required min="1" max="20"> Habitantes</input>

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