<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <form action="<?php echo $formAction ?>" method="post">
      <input type="hidden" id="cod_prog" name="cod_prog" value="true">
      ¿Realmente desea borrar el registro <?php echo $_GET['cod_prog'] ?>?
      <input type="submit" value="aceptar"> <a href="index.php">cancelar</a>
    </form>
  </body>
</html>
