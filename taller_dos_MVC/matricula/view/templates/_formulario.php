<html>
    <body>
    <center>
        <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
            <div align="center">
                <table border="3" width="90%">
                    <tr> 
                        <th bgcolor="#FF66FF"> 

                            <input type="text"name="num_ficha"value="<?php echo ((isset($num_ficha)) ? $num_ficha : '') ?>" id="num_ficha" required min="1" max="20"> num_ficha</input>
                            <input type="text"name="id_apre"value="<?php echo ((isset($id_apre)) ? $id_apre : '') ?>" id="id_apre" required min="1" max="20"> id_apre</input>
                            <input type="text"name="estado"value="<?php echo ((isset($estado)) ? $estado : '') ?>" id="estado" required min="1" max="20"> estado</input>

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