<?php
include("conexion.php");
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    die("Error: ID de usuario no encontrado en la sesión.");
}

$user_id = $_SESSION['user_id'];

// Obtener fotos de perfil y portada
$sql = "SELECT cFotoPerfil, cFotoPortada FROM tbl_usuarios WHERE cIdUsuario=$user_id";
$result = mysqli_query($conexion, $sql);

if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
}

$row = mysqli_fetch_assoc($result);

$profile_picture = $row['cFotoPerfil'];
$cover_photo = $row['cFotoPortada'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bazar UACJ</title>
    <link rel="stylesheet" href="css/stylePerfil.css">
</head>
<body>
    
<nav class="navbar bg-body-tertiary fixed-top" data-bs-theme="dark" id="navBar">
  <div class="container-fluid">
    <a class="navbar-brand" href="inicio.php">BazarUACJ</a>
    <form class="d-flex" role="search">
        <input class="form-control me-2 bg-light" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
      </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-tertiary" data-bs-theme="dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Bienvenido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body bg-tertiary" data-bs-theme="dark">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Subir producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="controlador_cerrar_sesion.php" name="cerrar">Cerrar sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="container" id="mainContent">
    <div class="cover-photo" style="background-image: url('<?php echo $cover_photo; ?>');">
        <form id="coverPhotoForm" action="controladores/imagen_portada.php" method="post" enctype="multipart/form-data">
            <input type="file" name="coverPhoto" id="coverPhotoInput" style="display:none;" onchange="uploadCoverPhoto()">
            <label for="coverPhotoInput" class="upload-label">Subir Foto de Portada</label>
        </form>
        <div class="profile-picture" style="background-image: url('<?php echo $profile_picture; ?>');">
            <form id="profilePictureForm" action="controladores/imagen_perfil.php" method="post" enctype="multipart/form-data">
                <input type="file" name="profilePicture" id="profilePictureInput" style="display:none;" onchange="uploadProfilePicture()">
                <label for="profilePictureInput" class="upload-label">Subir Foto de Perfil</label>
            </form>
        </div>
        <div class="nombre-usuario">
            <?php
            include("controladores/nombreUsuarioPerfil.php");
            ?>
        </div>
    </div>
    <div class="content">
      <div class="tusProductos">
        <h2>Tus productos</h2>
      </div>
      <div class="agregarProd">
        <h2>boton</h2>
      </div>
        <div class="sidebar">
            <!-- Reseñas de usuarios -->
        </div>
        <div class="products">
          <?php
          include("controladores/prodUsuario.php");
          ?>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="javascript/scripts.js"></script>
</body>
</html>
