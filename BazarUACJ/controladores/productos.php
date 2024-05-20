<?php
// Realiza la consulta para obtener los productos con información del usuario
$query = "SELECT p.cNombreProducto, p.cPrecio, p.cDescripcion, p.cFoto, 
                 SUBSTRING_INDEX(u.cNombres, ' ', 1) AS primer_nombre,
                 p.cFechaPublicacion 
          FROM tbl_productos p 
          INNER JOIN tbl_usuarios u ON p.cIdUsuario = u.cIdUsuario
          ORDER BY p.cFechaPublicacion DESC";

// Ejecuta la consulta
$resultado = mysqli_query($conexion, $query);

// Verifica si se obtuvieron resultados
$productos = [];
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Itera sobre los resultados y los agrega al array de productos
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $productos[] = $fila;
    }
}

// Retorna el array de productos
return $productos;
?>
