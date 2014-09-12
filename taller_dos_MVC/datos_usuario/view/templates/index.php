<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CONSULTA TABLA Datos</title>
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
                    <th>usuario</th>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>localidad</th>
                    <th>Opciones</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['usuario_id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apel'] ?></td>
                        <td><?php echo $row['direc'] ?></td>
                        <td><?php echo $row['telefono'] ?></td>
                        <td><?php echo $row['localidad_id'] ?></td>
                        <td><a href="index.php?action=update&amp;usuario_id=<?php echo $row['usuario_id'] ?>">Modificar</a></td>
                        <td><a href="index.php?action=delete&amp;usuario_id=<?php echo $row['usuario_id'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
</body>
</html>