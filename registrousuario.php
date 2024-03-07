<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



</head>

<body>
  <?php
  //mantener este encabezado en todas las páginas 
  include('encabezado.php');
  ?>

  <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
  <div class="container">


    <form id="formregistro" action="" method="post" enctype="multipart/form-data">

      <!-- capa NOmbre del usuario -->
      <div class="form-group">
        <label for="nombre"><b>Nombre Usuario *</b></label>
        <input type="text" class="form-control" id="NomUsuario" name="NomUsuario" required>

      </div>
      <!-- capa clave del usuario -->
      <div class="form-group">
        <label for="clave"><b>Clave *</b></label>
        <input type="password" class="form-control" id="Clave" name="Clave" required>
        <div class="invalid-feedback"></div>
      </div>

      <!-- capa repetir clave -->
      <div class="form-group">
        <label for="Reclave"><b>Confirmar Clave *</b></label>
        <input type="password" class="form-control" id="Reclave" name="Reclave" required>
        <div class="invalid-feedback"></div>
      </div>

      <!-- capa email -->
      <div class="form-group">
        <label for="email"><b>Email *</b></label>
        <input type="email" class="form-control" id="Email" placeholder="name@example.com" name="Email" required>
        <div class="invalid-feedback">Email debe ser válido</div>
      </div>


      <!-- capa con Botones de radio para el sexo -->
      <div class="form-check-inline">
        <label for="sexo"><b>Sexo </b> </label>&nbsp; &nbsp; &nbsp; &nbsp;
        <input class="form-check-input" type="radio" name="Sexo" id="Sexo" value="0">
        <label class="form-check-label" for="exampleRadios1"> Hombre </label>
        &nbsp; &nbsp; &nbsp; &nbsp;
        <input class="form-check-input" type="radio" name="Sexo" id="Sexo" value="1" checked>
        <label class="form-check-label" for="exampleRadios2">
          Mujer
        </label>
        <div class="invalid-feedback"></div>
      </div>

      <!-- capa con fecha de nacimiento -->
      <div class="form-group">
        <label for="fechanac"><b>Fecha nacimiento </b></label>
        <input type="date" class="form-control" id="FNacimiento" name="FNacimiento" required>
        <div class="invalid-feedback">Fecha debe ser válida</div>
      </div>

      <!-- capa con Ciudad -->
      <div class="form-group">
        <label for="ciudad"><b>Ciudad </b></label>
        <input type="text" class="form-control" id="Ciudad" name="Ciudad">
        <div class="invalid-feedback">La ciudad debe ser válida</div>
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
      </div>

      <!-- capa para Subir foto .. Lo que se sube al servidor (localhost9 son las imágenes y en la base de datos se indica la ruta donde está la imagen -->
      <div class="form-group">
        <label for="exampleFormControlFile1"><b>Foto</b></label>
        <input type="file" class="form-control-file" id="Foto" name="Foto" />
      </div>

      <!-- Botón para enviar datos -->
      <button type="submit" class="btn btn-success" name="Enviar">Enviar</button>

    </form>

<form action="acceso.php">
    <input type="submit" value="Cancelar" class="btn btn-primary">
   </form>

    <?php
    if (isset($_REQUEST['Enviar'])) {
      // banderas a valor 0 indican errores, a valor 1 indican correcto 
      $usuariovalido = 1; // controlar que el usuario es valido: NomUsuario es único
      $clavevalida = 1; // controlar que la clave es correcta con el validar clave
      $fechanac = 1; // La edad del usuario es mayor de 18
      $errores = array();
      //validación: el nombre de usuario debe ser único. 
      include('conexion.php');
      $query = "select * from Usuarios where NomUsuario='" . $_REQUEST['NomUsuario'] . "'";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        // rellena array de errores 
        array_push($errores, 'Nombre de usuario ya existe');
        $usuariovalido = 0;
      }
      ;
      mysqli_close($conn);
      // Validación: comprueba que la clave y confirmación de clave  coinciden 
      if ($_REQUEST['Clave'] != $_REQUEST['Reclave']) {
        array_push($errores, 'Las claves deben de coincidir');
        $clavevalida = 0;
      }
      ;

      // Validación: el usuario es mayor de 18
    
      $fechanacimiento = new DateTime($_REQUEST['FNacimiento']);
      $hoy = new DateTime();
      $edad = $hoy->diff($fechanacimiento)->y;

      if ($edad < 18) {
        $fechanac = 0; // Indicar que la fecha de nacimiento no es válida
        array_push($errores, 'Debes ser mayor de 18 años para registrarte');
      }

    
      // Si no hay errores, se procede con el registro
      if (empty($errores)) {
        include('grabarusuario.php');
      } else {
        // Si hay errores, mostrarlos
        echo "<ul class='text text-error'>";
        foreach ($errores as $error) {
          echo "<li><p class='form-control' style='color: red;'>$error</p></li>";
        }
        echo "</ul></div>";
      }
      ;
    }
    ; ?>

  </div>

  <!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
    integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
    crossorigin="anonymous"></script>


</body>

</html>
