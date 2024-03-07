<?php 
session_start(); 
?>
<html> 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
 <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>     
  </head>
<body> 

<?php
          //mantener este encabezado y menu en todas las páginas 
          include ('encabezado.php');
          //Barra de navegación para mostrar información sobre : nombre de usuario registrado, fecha y hora de conexión, ip 
          include ('barramenuadmin.php');
?>

<div class="container">
    <h2>Tabla de países</h2>
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th>ID país</th>
          <th>Nombre del país</th>
        </tr>
      </thead>
      <tbody>
        <!-- Aquí se insertarán las filas con los datos de la tabla "Paises" -->
        <?php
        // Conexión a la base de datos
        include ('conexion.php');
        // Verificar la conexión
        if (mysqli_connect_errno()) {
          echo "Error al conectar con la base de datos: " . mysqli_connect_error();
          exit();
        }
        // Consulta SQL para seleccionar todos los registros de la tabla "Paises"
        $consulta = "SELECT IdPais, NomPais FROM Paises";
        // Ejecutar la consulta
        $resultado = mysqli_query($conn, $consulta);
        // Iterar sobre los resultados y mostrar cada fila como una fila de la tabla
        while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<td>" . $fila['IdPais'] . "</td>";
          echo "<td>" . $fila['NomPais'] . "</td>";
          echo "</tr>";
        }
        // Liberar el resultado y cerrar la conexión
        mysqli_free_result($resultado);
        mysqli_close($conexion);
        ?>
      </tbody>
    </table>
  </div>

<!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</hmtl>
