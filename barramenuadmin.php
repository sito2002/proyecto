<?php
session_start();
?>

<div class="navbar navbar-dark bg-dark">
	    <div class="container">
	    	<div class="text-white"><?php echo "Bienvenid@ ".$_SESSION['NomUsuario']." conectad@ ".date('d-m-Y h:i:s A')."  desde la IP"."{$_SERVER['REMOTE_ADDR']}"; ?></div>
   <div style="text-align: right;">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav text-center">
	<a class="nav-item nav-link" href="verusuarios.php">Ver Usuarios</a>
	<a class="nav-item nav-link" href="registropaises.php">Registrar Paises</a>
	<a class="nav-item nav-link" href="verpaises.php">Ver Paises</a>
        <a class="nav-item nav-link" href="cerrar.php">Cerrar sesión</a>
      </div>
    </div>
  </div>
  </nav>
</div>
</div>
</div>
