<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CONSULTA TABLA FICHA</title>
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
                    <th>Nuemro Ficha</th>
                    <th>Codigo Programa</th>
                    <th>fecha inicio</th>
                    <th>fecha fin</th>
                    <th>Codigo Centro</th>
                    <th>Opciones</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['num_ficha'] ?></td>
                        <td><?php echo $row['cod_prog'] ?></td>
                        <td><?php echo $row['fecha_ini'] ?></td>
                        <td><?php echo $row['fecha_fin'] ?></td>
                        <td><?php echo $row['cod_centro'] ?></td>
                        <td><a href="index.php?action=update&amp;num_ficha=<?php echo $row['num_ficha'] ?>">Modificar</a></td>
                        <td><a href="index.php?action=delete&amp;num_ficha=<?php echo $row['num_ficha'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
</body>
</html>