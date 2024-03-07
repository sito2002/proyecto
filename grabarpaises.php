<?php
//fichero con los parametros de la conexion
include ('conexion.php');

//preparamos la variable $query con la instrucción Sql  para insertar los datos recogidos del formulario de registro de usuarios , en la tabla Usuarios de la Base de datos PIBD. 
//La función que recoge la marca temporal es current_time
$query="insert into Paises values (null,'".$_REQUEST['nombre']."')";
//echo $query;

// lanzamos la instrucción SQL para insertar .. Si generase un error se mostraría el mensaje ERROR. 
$result= mysqli_query($conn,$query);
if ($result) {
    echo "El País ha sido añadido correctamente";
	echo"<script language='javascript'>window.location='menuadmin.php'</script>;";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close ($conn);


?>
