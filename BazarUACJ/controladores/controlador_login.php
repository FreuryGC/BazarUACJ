<?php
include("conexion.php");
session_start();

if (!empty($_POST["btningresar"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Los campos están vacíos"
            });
        </script>';
    } else {
        $correo = $_POST["email"];
        $clave = md5($_POST["password"]);
        $sql = $conexion->query("SELECT * FROM tbl_usuarios WHERE cCorreo = '$correo' AND cContrasena = '$clave'");
        
        if ($datos = $sql->fetch_object()) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $datos->cIdUsuario; // Guardar el ID del usuario en la sesión
            header("location: inicio.php");
            exit();
        } else {
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Credenciales incorrectas"
                });
            </script>';
        }
    }
}
?>
