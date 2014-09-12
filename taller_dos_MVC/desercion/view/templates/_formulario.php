<html>
    <body><center>
<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
  <div align="center">
    <table border="3" width="90%">
      <tr> 
        <th bgcolor="#FF66FF"> 
          
            <input type="text"name="num_doc" value="<?php echo ((isset($num_doc)) ? $num_doc : '') ?>" id="num_doc" required min="1" max="20"> num_doc</input>
          <input type="text"name="fecha" value="<?php echo ((isset($fecha)) ? $fecha : '') ?>" id="fecha" required min="1" max="20"> fecha</input>
           <input type="text"name="id_apre" value="<?php echo ((isset($id_apre)) ? $id_apre : '') ?>" id="id_apre" required min="1" max="20"> id_apre</input>
          <input type="text"name="num_ficha" value="<?php echo ((isset($num_ficha)) ? $num_ficha : '') ?>" id="num_ficha" required min="1" max="20"> num_ficha</input>
           <input type="text"name="cod_causa" value="<?php echo ((isset($cod_causa)) ? $cod_causa : '') ?>" id="cod_causa" required min="1" max="20"> cod_causa</input>
          <input type="text"name="fecha_desercion" value="<?php echo ((isset($fecha_desercion)) ? $fecha_desercion : '') ?>" id="fecha_desercion" required min="1" max="20"> fecha_desercion</input>
          <input type="text"name="fase_desercion" value="<?php echo ((isset($fase_desercion)) ? $fase_desercion : '') ?>" id="fase_desercion" required min="1" max="20"> fase_desercion</input>
          
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