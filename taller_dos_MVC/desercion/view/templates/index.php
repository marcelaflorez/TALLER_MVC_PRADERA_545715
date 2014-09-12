<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CONSULTA TABLA DESERCION</title>
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
                    <th>Numero Documento</th>
                    <th>fecha</th>
                    <th>Id_Aprendiz</th>
                    <th>Numero Ficha</th>
                    <th>Codigo Causa</th>
                    <th>Fecha Desercion</th>
                    <th>Fase Desercion</th>
                    <th>Opciones</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['num_doc'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['id_apre'] ?></td>
                        <td><?php echo $row['num_ficha'] ?></td>
                        <td><?php echo $row['cod_causa'] ?></td>
                        <td><?php echo $row['fecha_desercion'] ?></td>
                        <td><?php echo $row['fase_desercion'] ?></td>
                        <td><a href="index.php?action=update&amp;num_doc=<?php echo $row['num_doc'] ?>">Modificar</a></td>
                        <td><a href="index.php?action=delete&amp;num_doc=<?php echo $row['num_doc'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
    </body>
</html>