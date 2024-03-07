<?php
include ("conexion.php");

$dir_subida = '/var/www/html/viajes/imagenes/';
$fichero_subido = $dir_subida .basename($_FILES['Foto']['name']);
move_uploaded_file($_FILES['Foto']['tmp_name'], $fichero_subido);

$query="insert into Usuarios (NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais,Foto) values ('".$_REQUEST['NomUsuario']."','".$_REQUEST['Clave']."','".$_REQUEST['Email']."','".$_REQUEST['Sexo']."','".$_REQUEST['FNacimiento']."','".$_REQUEST['Ciudad']."',".$_REQUEST['Pais'].",'".$fichero_subido."')";
//echo $query;

$result = mysqli_query($conn, $query);

if ($result) {
    echo "New record created successfully";
//    header("refresh:1;location=acceso.php");
echo"<script language='javascript'>window.location='acceso.php'</script>;";
exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close ($conn);
?>
