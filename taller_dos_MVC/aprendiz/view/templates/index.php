<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Consulta Aprendiz</title>
        <link rel="stylesheet" media="screen" href="css/main.css">
    </head>
    <body><center>
        <h1>Consulta</h1>
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
                    <th>Documento Aprendiz</th>
                    <th>Nombre aprendiz</th>
                    <th>Apellido Aprendiz</th>
                    <th>telefono</th>
                    <th>Ciudad</th>
                    <th>Tipo_id</th>
                    <th>Cod_rh</th>
                    <th>genero</th>
                    <th>edad</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['id_apre'] ?></td>
                        <td><?php echo $row['nom_apre'] ?></td>
                        <td><?php echo $row['apel_apre'] ?></td>
                        <td><?php echo $row['tel_apre'] ?></td>
                        <td><?php echo $row['cod_ciudad'] ?></td>
                        <td><?php echo $row['cod_tipo_id'] ?></td>
                        <td><?php echo $row['cod_rh'] ?></td>
                        <td><?php echo $row['genero'] ?></td>
                        <td><?php echo $row['edad'] ?></td>

                        <td><a href="index.php?action=update&amp;id_apre=<?php echo $row['id_apre'] ?>">Modificar</a> </td>
                        <td><a href="index.php?action=delete&amp;id_apre=<?php echo $row['id_apre'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
</body>
</html>