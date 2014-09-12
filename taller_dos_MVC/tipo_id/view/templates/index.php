<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CONSULTA TABLA tipo_id</title>
        <link rel="stylesheet" media="screen" href="css/main.css">
    </head>
    <body><center>
        <h1>CONSULTA</h1>
        <div id="lnkNuevo">
            <a href="index.php?action=create">Nuevo</a>
        </div>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error ?></div>
        <?php endif ?>

        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success ?></div>
        <?php endif ?>
        <table id="tblContenido">
            <thead>
                <tr>
                    <th>Codigo Tipo_Id</th>
                    <th>Descripcion Tipo_Id</th>
                    <th>Opciones</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['cod_tipo_id'] ?></td>
                        <td><?php echo $row['des_tipo_id'] ?></td>
                        <td><a href="index.php?action=update&amp;cod_tipo_id=<?php echo $row['cod_tipo_id'] ?>">Modificar</a></td>
                        <td><a href="index.php?action=delete&amp;cod_tipo_id=<?php echo $row['cod_tipo_id'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
</body>
</html>