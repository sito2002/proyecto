  <?php 
session_start();
echo $_SESSION['IdUsuario'];
?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- Bootstrap Validator -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    </link>
    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
    </link>
</head>
<body>
	    <?php
  //mantener este encabezado en todas las páginas 
  include('encabezado.php');
  include('barramenu.php');
  ?>
        <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
        <div class="container">
            <form id="formregistro" action="" method="post" enctype="multipart/form-data">
                <!-- capa Titulo del album -->
                <div class="form-group">
                    <label for="titulo"><b>Nombre album *</b></label>
                    <input type="text" class="form-control" id="Titulo" name="Titulo" required>
                </div>
                <!-- capa descripcion del album -->
                <div class="form-group">
                    <label for="descripcion"><b>Descripcion album *</b></label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                </div>
                <!-- capa con fecha del album -->
                <div class="form-group">
                    <label for="fechaalbum"><b>Fecha de creacion</b></label>
                    <input type="date" class="form-control" id="Fecha" name="Fecha" required>
                    <div class="invalid-feedback">Fecha debe ser válida</div>
                </div>
                <!--capa para Mostrar los Paises almacenados en la tabla Paises de la base de datos PIBd-->
                <div class="form-group">
                    <label for="pais"><b>Pais </b></label>
                    <select class="form-control" id="Pais" name="Pais">
          <?php
          /* conecta con la base de datos PIBD de Mysql */
          include("conexion.php");
          /* construir la consulta que me devuelve los paises-- pero no lanzo la 
             petición a MYSQL  */
          $query = 'select * from Paises';
          /* Lanzo la consulta a MYSQL y los resultados de la consulta los almacena en 
              $result. $result es una zona de memoria virtual donde se almacenan las filas que ha devuelto la consulta definida en $query */
          $result = mysqli_query($conn, $query);
          /* entra en un bucle y en cada iteración del bucle recupera una fila de $result 
          En $row tengo un array asociativo donde cada campo es una columna de la consulta*/
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value=" . $row['IdPais'] . ">" . $row['NomPais'] . "</option>";
          }
          //cierra conexión 
          mysqli_close($conn);
          ?>
        </select>
                    <div class="invalid-feedback"></div>
        <br>
                <!-- Botón para enviar datos -->
                <button type="submit" class="btn btn-success" name="Enviar">Enviar</button>
                <!-- Botón para cancelar -->
                <a href="acceso.php" class="btn btn-success">Cancelar</a>
            </form>
            <?php
        if (isset($_REQUEST['Enviar'])) {
                include('grabaralbum.php');
        };
        ?>
        </div>
        <!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<form action="menu.php">
    <button type="submit">Ir al menú</button>
</form>

</body>
</html>
