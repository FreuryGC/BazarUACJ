<?php
include("conexion.php");
session_start();

if (!empty($_POST["btnregistrarse"])) {
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Los campos están vacíos"
            });
        </script>';
    } else {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellido"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $institucion = $_POST["instituciones"];
        
        $sql = $conexion->query("INSERT INTO tbl_usuarios (cNombres, cApellidos, cCorreo, cContrasena, cInstitucion) VALUES ('$nombre', '$apellidos', '$email', '$password', '$institucion')");
        
        if ($sql) {
            // Obtener el ID del usuario recién creado
            $user_id = mysqli_insert_id($conexion);
            
            // Iniciar sesión y guardar el ID del usuario
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user_id;
            
            header("Location: inicio.php");
        } else {
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Error al registrar el usuario"
            });
            </script>';
        }
    }
}
?>
