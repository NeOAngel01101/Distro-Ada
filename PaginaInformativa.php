<?php

    include_once 'config.php';
    include_once 'connect_db.php';
    include_once 'helpers.php';
    
    $id = $_REQUEST['id'];
    $queryResult = $pdo->prepare("SELECT * from distribuciones WHERE id = :id LIMIT 1 ");
    
    //El id dado en la parte anterior en el where se le da por el execute.
    $queryResult->execute([
        'id' => $id
    ]);

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

      <table class="table table-bordered">
        <colgroup><col class="col-xs-1"><col class="col-xs-7"></colgroup>
        <?php while( $row = $queryResult->fetch(PDO::FETCH_ASSOC) ): ?>
              <tbody>
                <br>
                <tr>
                    <th> Nombre: </th> <td> <?=$row['Nombre']?> </td>
                </tr>

                <tr>
                    <th> Imagen : </th> <td> <?=$row['Imagen']?> </td>
                </tr>

                <tr>
                    <th> Tipo de Sistema Operativo : </th> <td> <?=$row['TipodeSistemaOperativo']?> </td>
                </tr>

                <tr>
                    <th> Basado en : </th> <td> <?=$row['Basado']?> </td>
                </tr>

                <tr>
                    <th> Origen : </th> <td> <?=$row['Origen']?> </td>
                </tr>

                <tr>
                    <th> Arquitectura : </th> <td> <?=$row['Arquitectura']?> </td>
                </tr>

                <tr>
                    <th> Escritorio : </th> <td> <?=$row['Escritorio']?> </td>
                </tr>

                <tr>
                    <th> Categoria : </th> <td> <?=$row['Categoria']?> </td>
                </tr>

                <tr>
                    <th> Estado : </th> <td> <?=$row['Estado']?> </td>
                </tr>

                <tr>
                    <th> Version : </th> <td> <?=$row['Version']?> </td>
                </tr>
          
                <tr>
                    <th> Web : </th> <td> <?=$row['Web']?> </td>
                </tr>
  
                <tr>
                    <th> Doc : </th> <td> <?=$row['Doc']?> </td>
                </tr>

                <tr>
                    <th> Foro : </th> <td> <?=$row['Foro']?> </td>
                </tr>

                <tr>
                    <th> Trake Error : </th> <td> <?=$row['Trakererror']?> </td>
                </tr>

                <tr>
                    <th> Descripcion : </th> <td> <?=$row['Descripcion']?> </td>
                </tr>
                
        <?php endwhile; ?>   
              </tbody>
      </table>
    </div>




  </body>
</html>