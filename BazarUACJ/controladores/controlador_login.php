<?php
include("conexion.php");
session_start();

    if(!empty($_POST["btningresar"])){
        if(empty($_POST["email"]) && empty($_POST["password"])){
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Los campos estan vacios"
                });
            </script>';
        }else{
        $correo = $_POST["email"];
        $clave = md5($_POST["password"]);
        $sql = $conexion->query(" select * from tbl_usuarios where cCorreo = '$correo' and cContrasena = '$clave' ");
            if($datos=$sql->fetch_object()){
                $_SESSION['loggedin'] = true;
                header("location: inicio.php");
            }else{
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