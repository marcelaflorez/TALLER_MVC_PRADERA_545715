<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CONSULTA</title>
        <link rel="stylesheet" media="screen" href="css/miestilo.css">
    </head>
    <body><center>
        <h1>CONSULTA</h1>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error ?></div>
        <?php endif ?>

        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success ?></div>
        <?php endif ?>
        <table border="3">
            <thead>
                <tr>
                    <th>Ficha</th>
                    <th>Nombre</th>
                     <th>Descripcion Tipo Id</th>
                    <th>Genero</th>
                     <th>Descripcion Centro</th>
                    <th>Descripcion Causa</th>
                     </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['num_ficha'] ?></td>
                        <td><?php echo $row['nom_apre'] ?></td>
                        <td><?php echo $row['des_tipo_id'] ?></td>
                        <td><?php echo $row['genero'] ?></td>
                        <td><?php echo $row['desc_centro'] ?></td>
                        <td><?php echo $row['des_causa'] ?></td>
                   </tr>
                <?php endforeach ?>
                    <a href="http://localhost/consultaOchoEjercicios/">Pagina Principal</a></tr></th><br>
            </tbody>
        </table>
    </center>
</body>
</html>