<?php
// Supongamos que $user_id está definido y es seguro
$sql = "SELECT cNombres, cApellidos FROM tbl_usuarios WHERE cIdUsuario=$user_id";
$result = mysqli_query($conexion, $sql);

if (!$result) {
    echo "Error al obtener el nombre del usuario: " . mysqli_error($conexion);
} else {
    $row = mysqli_fetch_assoc($result);
    
    // Obtener el primer nombre y el primer apellido
    $primerNombre = explode(' ', trim($row['cNombres']))[0];
    $primerApellido = explode(' ', trim($row['cApellidos']))[0];

    echo '<h2 style="position: absolute; bottom: 1%; left: 4%; font-family: Arial, sans-serif; color: black;">' . $primerNombre . ' ' . $primerApellido . '</h2>';
}
?>
