<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

if (!isset($_SESSION['IdUsuario'])) {
    header('Location: acceso.php');
    die();
}

include('encabezado.php');
include('barramenu.php');

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir foto</title>
</head>
<body>

<div class="container">

    <form id="formregistro" action="grabarfoto.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="Titulo"><b>Título *</b></label>
            <input type="text" class="form-control" id="Titulo" name="Titulo" required>
        </div>

        <div class="form-group">
            <label for="Fecha"><b>Fecha de la foto *</b></label>
            <input type="date" class="form-control" id="Fecha" name="Fecha" required>
            <div class="invalid-feedback">Fecha debe ser válida</div>
        </div>

        <div class="form-group">
            <label for="Pais"><b>País *</b></label>
            <select class="form-control" id="Pais" name="Pais">
                <?php
                include("conexion.php");

                $query = 'SELECT * FROM Paises';
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=" . $row['IdPais'] . ">" . $row['NomPais'] . "</option>";
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1"><b>Foto</b></label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="Foto" accept="image/*">
        </div>

        <div class="form-group">
            <label for="Album"><b>Álbum *</b></label>
            <select class="form-control" id="Album" name="Album">
                <?php
                include("conexion.php");

                $query = 'SELECT * FROM Albumes WHERE Usuario=' . $_SESSION['IdUsuario'];
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=" . $row['IdAlbum'] . ">" . $row['Titulo'] . "</option>";
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success" name="Enviar">Enviar</button>

    </form>

</div>

</body>
</html>
