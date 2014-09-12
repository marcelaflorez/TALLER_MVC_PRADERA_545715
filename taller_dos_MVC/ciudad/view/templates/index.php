<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Consulta Ciudad</title>
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
          <th>Codigo Ciudad</th>
          <th>Nombre Ciudad</th>
          <th>Codigo Departamento</th>
          <th>Habitantes</th>
          <th>modificar</th>
          <th>eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>
            <td><?php echo $row['cod_ciudad'] ?></td>
            <td><?php echo $row['nom_ciudad'] ?></td>
            <td><?php echo $row['cod_depto'] ?></td>
            <td><?php echo $row['habitantes'] ?></td>
            <td><a href="index.php?action=update&amp;cod_ciudad=<?php echo $row['cod_ciudad'] ?>">Modificar</a></td> 
            <td><a href="index.php?action=delete&amp;cod_ciudad=<?php echo $row['cod_ciudad'] ?>">Eliminar</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </body></center>
</html>