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
                    <th>cantidad</th>
                    <th>Fase Desercion</th>
                     </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['count(cod_causa)'] ?></td>
                        <td><?php echo $row['des_causa'] ?></td>
                       
                    </tr>
                <?php endforeach ?>
                    <a href="http://localhost/consultaOchoEjercicios/">Pagina Principal</a></tr></th><br>
            </tbody>
        </table>
    </center>
</body>
</html>