<?php
$user_id = $_SESSION['user_id'];

// Obtener productos del usuario
$sqlProductos = "SELECT cNombreProducto, cDescripcion, cPrecio, cFoto FROM tbl_productos WHERE cIdUsuario=$user_id";
$resultProductos = mysqli_query($conexion, $sqlProductos);

if (!$resultProductos) {
    die("Error al obtener los productos: " . mysqli_error($conexion));
}

// Generar el HTML para los productos
while ($rowProducto = mysqli_fetch_assoc($resultProductos)) {
    echo '<div class="product" style="border-radius: 5px; border: 2px solid #37383a">';
    echo '<img src="imagenes/' . $rowProducto['cFoto'] . '" alt="' . $rowProducto['cNombreProducto'] . '">';
    echo '<div class="product-info">';
    echo '<h3>' . $rowProducto['cNombreProducto'] . '</h3>';
    echo '<p>' . $rowProducto['cDescripcion'] . '</p>';
    echo '<p>Precio: $' . $rowProducto['cPrecio'] . '</p>';
    echo '</div>';
    echo '</div>';
}
?>
