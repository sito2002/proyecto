<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto IAW - Alfonso</title>
    <!-- Enlaces a los archivos CSS de Bootstrap y estilos personalizados -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
        /* Estilos adicionales si los necesitas */
        .imagen-usuario {
            width: 100%;
            height: auto;
            object-fit: cover; /* La imagen se ajustará al tamaño del contenedor */
        }
        .row.row-cols-1.row-cols-sm-2.row-cols-md-3.g-3 {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
        }
        .col {
            flex: 0 0 auto;
            width: 33.333333%;
        }

	.card img {
          width: 100%;
          height: 15vw;
          object-fit: cover;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Proyecto de IAW</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

		<div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Menú
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    <a class="dropdown-item" href="acceso.php">Inicio de Sesión</a>
            <a class="dropdown-item" href="contacto.php">Contacto</a>
        </div>
    </div>
		

    </nav>

    <header class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">Bienvenido a Mi Proyecto de IAW</h1>
            <p class="lead">Se trata de un servicio web donde tenemos registrados a nuestros usuarios almacenados tras un pequeño formulario</p>
        </div>
    </header>
	
	<div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <!-- Botón Primario -->
      </div>
    </div>
  </div>
    <div class="container">



<main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">EL MUNDO EN FOTOGRAFIAS</h1>
                    <p class="lead text-muted">Fotografias de ciudades de todo el mundo compartidas por nuestros usuarios colaboradores</p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    // Create the card structure using appropriate HTML elements
                    include('conexion.php');

                    // Fetch photos from the database
                    $sql = "SELECT fichero FROM Fotos ORDER BY Fecha DESC LIMIT 5";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<div class='col'>";
                            echo "<div class='card shadow-sm m-0'>"; // Agregado m-0 aquí

                            $rutaImagen = substr("'" . $row['fichero'] . "'", 21);
                            echo "<td><img src='." . $rutaImagen . "' alt='Foto' class='imagen-usuario' /></td>";

                            // Close the card structure
                            echo "</div>";
                            echo "</div>";
                        }
                    }

                    mysqli_close($conn);
                    ?>

                </div>
            </div>
        </div>

    </main>

        <section>
            <h2>Acerca de Mi</h2>
            <p>Nombre: Alfonso Colomino Navarro Trabajo: Proyecto de IAW</p>
        </section>

        <section>
            <h2>Nuestros Servicios</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Registramos Usuarios</h5>
                            <p class="card-text">Creamos un registro de usuarios mediante un formulario y se guardan en nuestra base de datos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Registramos Países</h5>
                            <p class="card-text">Creamos un registro de países para que después al registrar los usuarios podamos selecionarlos</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2>Herramientas utilizadas</h2>
            <p>Estas son algunas de las herramientas con las que hemos trabajado:</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">PHP</h5>
                            <p class="card-text">PHP es un lenguaje de programación destinado a desarrollar aplicaciones para la web y crear páginas web, favoreciendo la conexión entre los servidores y la interfaz de usuario. Entre los factores que hicieron que PHP se volviera tan popular, se destaca el hecho de que es de código abierto</p>
                        </div>
                    </div>
                </div>
                
		 <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Boostrap</h5>
                            <p class="card-text">Bootstrap es una biblioteca de herramientas de código abierto optimizadas para el diseño de sitios y aplicaciones web. Esta plataforma se basa en lenguaje HTML y CSS, e incluye una amplia gama de elementos de diseño, como formularios, botones y menús que se adaptan a diferentes formatos de navegación</p>
                        </div>
                    </div>
                </div>


		<div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">MySQL</h5>
                            <p class="card-text">MySQL es un sistema de bases de datos de Oracle que se utiliza en todo el mundo para gestionar bases de datos. Se basa en el álgebra relacional y se utiliza principalmente para el almacenamiento de datos de diversos servicios web. Los CMS más conocidos que utilizan MySQL son, por ejemplo, WordPress y TYPO3>
                        </div>
                    </div>
                </div>

		
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
