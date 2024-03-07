<?php
//fichero con los parametros de la conexion
include ('conexion.php');

/* subir archivo a la ruta preparada en el servidor local para ello */
$dir_subida = '/var/www/html/viajes/fotoalbum/';

$fichero_subido = $dir_subida .basename($_FILES['Foto']['name']);
move_uploaded_file($_FILES['Foto']['tmp_name'], $fichero_subido);
$query="insert into Fotos values (null,'".$_REQUEST['Titulo']."','".$_REQUEST['Fecha']."','".$_REQUEST['Pais']."','".$_REQUEST['Album']."','".$fichero_subido."',null)";
//echo $query;

// lanzamos la instrucción SQL para insertar .. Si generase un error se mostraría el mensaje ERROR. 
$result= mysqli_query($conn,$query);
if ($result) {
//    echo "New record created successfully";
//      header("refresh:1;url=./acceso.php");
      echo"<script language='javascript'>window.location='menu.php'</script>;";
      exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close ($conn);

?>
