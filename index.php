<?php

    include_once 'config.php';
    include_once 'connect_db.php';
    include_once 'helpers.php';

    $queryResult = $pdo->query("SELECT * from distribuciones");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DistroAda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/app.css">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">DistroAda</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Inicio</a></li>
            <li><a href="add.php">Añadir Distro</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

    	<table class="table table-striped">
    		<thead>
            <tr>
                <th>Nombre</th>
                <th>Basado</th>
                <th>Version</th>
                <th>Web</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            </thead>
      		<tbody>
            <?php while( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ): ?>
                <tr>
                    <td><a href="PaginaInformativa.php?id=<?=$row['id']?>"><?=$row['Nombre']?></a></td>
                    <td><?=$row['Basado']?></td>
                    <td><?=$row['Version']?></td>
                    <td><?=$row['Web']?></td>
                    <td><a href="update.php?id=<?=$row['id']?>" class="glyphicon glyphicon-pencil editar"></a></td>
                    <td><a href="delete.php?id=<?=$row['id']?>" class="glyphicon glyphicon-trash borrar"></a></td>
                </tr>
            <?php endwhile; ?>
    		</tbody>
    	</table>
    </div>
  </body>
</html>
