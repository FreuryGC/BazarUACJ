<?php
// Inicia la sesión si aún no se ha iniciado
session_start();

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio de sesión o a cualquier otra página
header("Location: index.php");
exit;
?>
