<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  </head>
  <body>
        <?php
          //mantener este encabezado en todas las páginas 
          include ('encabezado.php');
	  include('barramenuadmin.php');
     ?>

   <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
   <div class="container">
  

    <form id="formregistro" action="grabarpaises.php" method="post" 
    enctype="multipart/form-data"  >
 
  <!-- capa Nombre del pais -->   
  <div class="form-group">
    <label for="nombre"><b>Nombre del País *</b></label>
    <input type="text" class="form-control" id="nombre" name="nombre" required >
  </div>
   

  

        <?php
          //Conexion con la base de datos MySQL
          include ('conexion.php');
     ?>


    <button type="submit" class="btn btn-success" name="Enviar">Enviar</button>
   </form>
 
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

<form action="menuadmin.php">
    <button type="submit">Ir al menú</button>
</form>
 
  </body>
</html>
