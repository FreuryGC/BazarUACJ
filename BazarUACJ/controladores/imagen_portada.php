<?php
include("../conexion.php");
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['coverPhoto'])) {
    $target_dir = "../uploads/";
    
    // Crear el directorio si no existe
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["coverPhoto"]["name"]);
    if (move_uploaded_file($_FILES["coverPhoto"]["tmp_name"], $target_file)) {
        $file_path = "uploads/" . basename($_FILES["coverPhoto"]["name"]);
        
        $sql = "UPDATE tbl_usuarios SET cFotoPortada='$file_path' WHERE cIdUsuario=$user_id";
        
        if (mysqli_query($conexion, $sql)) {
            header("Location: ../perfil.php");
            exit();
        } else {
            echo "Error al guardar la ruta en la base de datos: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al subir la foto de portada.";
    }
} else {
    echo "No se recibió ninguna imagen.";
}
?>
