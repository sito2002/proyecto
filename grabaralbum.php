<?php 
session_start();


include ("conexion.php");

// preparamos la variable $query con la instrucción Sql  para insertar los datos recogidos del formulario de registro de usuarios , en la tabl
$query="insert into Albumes (IdAlbum, Titulo, Descripcion, Fecha, Pais, Usuario) values (null,'".$_REQUEST['Titulo']."','".$_REQUEST['Descripcion']."','".$_REQUEST['Fecha']."','".$_REQUEST['Pais']."','".$_SESSION['IdUsuario']."');";
// lanzamos la instrucción SQL para insertar .. Si generase un error se mostraría el mensaje ERROR. 
//$result=mysqli_query($conn,$query);

if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
        echo "<script language='javascript'>window.location='menu.php'</script>;";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close ($conn);

?>
