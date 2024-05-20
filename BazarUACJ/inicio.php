<?php
include("conexion.php");
include("controladores/controlador_sesion_activa.php");
$productos = include("controladores/productos.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bazar UACJ</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/styleInicio.css">
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
            <a class="nav-link active" aria-current="page" href="perfil.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Subir producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="controlador_cerrar_sesion.php" name="cerrar">Cerrar sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="container botones-container">
  <button class="btn-comida">Comida</button>
  <button class="btn-electronicos">Electronicos</button>
  <button class="btn-vehiculos">Vehiculos</button>
  <button class="btn-joyeria">Joyeria</button>
</div>

<div class="container productos-container">
  <div class="row">
    <?php if (!empty($productos)): ?>
      <?php foreach($productos as $producto): ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm" style="width: 18rem;">
          <img src="imagenes/<?php echo $producto['cFoto']; ?>" class="card-img-top" alt="Imagen del producto" width="100px" height="200px">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($producto['cNombreProducto']); ?></h5>
              <p class="card-text">Precio: $<?php echo htmlspecialchars($producto['cPrecio']); ?></p>
              <p class="card-text">Usuario: <?php echo htmlspecialchars($producto['primer_nombre']); ?></p>
              <p class="card-text">Descripcion: <br><?php echo htmlspecialchars($producto['cDescripcion']); ?></p>
              <p class="card-text">Fecha de publicación: <?php echo htmlspecialchars($producto['cFechaPublicacion']); ?></p>
              <a href="#" class="btn btn-primary">Ver detalles</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No hay productos disponibles.</p>
    <?php endif; ?>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>