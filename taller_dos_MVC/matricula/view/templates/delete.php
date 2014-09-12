<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php echo $formAction ?>" method="post">
            <input type="hidden" id="num_ficha" name="num_ficha" value="true">
            ¿Realmente desea borrar el registro <?php echo $_GET['num_ficha'] ?>?
            <input type="submit" value="aceptar"> <a href="index.php">cancelar</a>
        </form>
    </body>
</html>
