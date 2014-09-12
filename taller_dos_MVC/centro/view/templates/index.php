<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CONSULTA TABLA CENTRO</title>
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
                    <th>Codigo CENTRO</th>
                    <th>Descripcion Centro</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Codigo Ciudad</th>
                    <th>Opciones</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['cod_centro'] ?></td>
                        <td><?php echo $row['desc_centro'] ?></td>
                        <td><?php echo $row['tel'] ?></td>
                        <td><?php echo $row['dir'] ?></td>
                        <td><?php echo $row['cod_ciudad'] ?></td>
                        <td><a href="index.php?action=update&amp;cod_centro=<?php echo $row['cod_centro'] ?>">Modificar</a></td>
                        <td><a href="index.php?action=delete&amp;cod_centro=<?php echo $row['cod_centro'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
</body>
</html>