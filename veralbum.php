<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álbumes</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #4D4343;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4D4343;
            color: white;
        }

        img {
            width: 100px;
            height: 100px;
        }

        </style </head><body><?php include ('encabezado.php');
        include ('barramenu.php');
        include ('conexion.php');
        $query='Select * from Albumes';
        $result=mysqli_query($conn, $query);
        ?><table class="table table-striped"><thead><tr><th>ID de Álbum</th><th>Título</th><th>Descripción</th><th>Fecha de Creación</th><th>Nombre del País</th><th>Nombre de Usuario</th></tr></thead><tbody><?php while($row=mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['IdAlbum']."</td>";
            echo "<td>".$row['Titulo']."</td>";
            echo "<td>".$row['Descripcion']."</td>";
            echo "<td>".$row['Fecha']."</td>";
            $sqlPais = "SELECT NomPais FROM Paises WHERE IdPais=".$row['Pais'];
            $resultPais = mysqli_query($conn, $sqlPais);
            $rowPais = mysqli_fetch_assoc($resultPais);
            echo "<td>".$rowPais['NomPais']."</td>";
	    $sqlUsuario = "SELECT NomUsuario FROM Usuarios WHERE IdUsuario=".$row['Usuario'];
            $resultUsuario = mysqli_query($conn, $sqlUsuario);
            $rowUsuario = mysqli_fetch_assoc($resultUsuario);
            echo "<td>".$rowUsuario['NomUsuario']."</td>";            
	    echo "</tr>";
        }

        ?></tbody></table><?php mysqli_close ($conn);
        ?></body></html>
