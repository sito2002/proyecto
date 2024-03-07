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
    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>

    <?php
          //mantener este encabezado y menu en todas las páginas 
          include ('encabezado.php');
          //Barra de navegación para mostrar información sobre : nombre de usuario registrado, fecha y hora de conexión, ip 
          include ('barramenuadmin.php');
?>
        <div class="container">
            <h2>Tabla de Usuarios</h2>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>IdUsuario</th>
                        <th>Nombre del usuario</th>
                        <th>Clave</a>
                            <th>Email</th>
                            <th>Sexo</th>
                            <th>Fecha Nacimiento</th>
                            <th>Ciudad</th>
                            <th>Foto</th>
                            <th>Fecha Registro</th>
                            <th>Pais</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se insertarán las filas con los datos de la tabla "Usuarios" -->
                    <?php
        // Conexión a la base de datos
        include ('conexion.php');
        // Verificar la conexión
        if (mysqli_connect_errno()) {
          echo "Error al conectar con la base de datos: " . mysqli_connect_error();
          exit();
        }
        // Consulta SQL para seleccionar todos los registros de la tabla "Paises"
        $consulta = "SELECT IdUsuario, NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, FRegistro FROM Usuarios";
        // Ejecutar la consulta
        $resultado = mysqli_query($conn, $consulta);
        // Iterar sobre los resultados y mostrar cada fila como una fila de la tabla
        while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<td>" . $fila['IdUsuario'] . "</td>";
          echo "<td>" . $fila['NomUsuario'] . "</td>";
          $clave = str_repeat("*", strlen($fila['Clave']));
          echo "<td>" . $clave . "</td>";
          echo "<td>" . $fila['Email'] . "</td>";
          if ($fila['Sexo']==0) {
              echo "<td>Hombre</td>";}
          else
              {echo "<td>Mujer</td>";};
          echo "<td>" . $fila['FNacimiento'] . "</td>";
          echo "<td>" . $fila['Ciudad'] . "</td>";
          $rutaImagen = substr("'".$fila['Foto']."'", 21);
           echo "<td><img src='." . $rutaImagen . "' alt='Foto' class='imagen-usuario' /></td>";
         
	   echo "<td>" . $fila['FRegistro'] . "</td>";
          $sql1 = "SELECT NomPais from Paises where IdPais=".$fila['Pais'];
          $result1 = mysqli_query($conn, $sql1);
          while($fila = mysqli_fetch_assoc($result1)) {
                echo "<td>".$fila['NomPais']."</td>";
          };
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
