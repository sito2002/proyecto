<?php
session_start();
?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imagenes/viajes.jpg">

    <title>Acceso a Viajes por el Mundo</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"></link>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="acceso.php">
      <img class="mb-4" src="imagenes/viajes.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login </h1>
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Nombre de Usuario" required autofocus name="NomUsuario">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="Clave">
      <div class="checkbox mb-3">
        <label>
         <p> Si no tienes cuenta </p> <a href='registrousuario.php'>Registrate </a>
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="Enviar">Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>

        <?php
    if (isset($_REQUEST["Enviar"])) {
    include('conexion.php');
    // construir una consuta que selecciona el nombre de usuario y clave de ese usuario ... pero no se lanza la peticion SQL.
    $query = "Select IdUsuario,NomUsuario,Clave from Usuarios where NomUsuario like '" . $_REQUEST['NomUsuario'] . "' and Clave like '" . $_REQUEST['Clave'] . "'";
    // a traves de este comando si lanzamos la peticion al servidor de BD
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
      // si el usuario no está registrado lo deriva al index (público)
      echo "<p class='form-control'style='color: red;'>.No eres un usuario registrado..</p>";
      header("refresh:4;url=index.php");
    } else {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['IdUsuario'] = $row['IdUsuario'];
      $_SESSION['NomUsuario'] = $row['NomUsuario'];
	if ($_SESSION['NomUsuario']=="admin"){
                                echo "<p class='form-control'style='color: green;'>Conexión exitosa. Redirigiendo...</p>";
                                header("refresh:1;url=menuadmin.php");
                                }else{
                                        echo "<p class='form-control'style='color: green;'>Conexión exitosa. Redirigiendo...</p>";
                                        header("refresh:1;url=menu.php");
                                }

    }
    mysqli_close($conn);
  }
  ;
  ?>
      

    </form>

 
</body>
</html>
