<?php
include("conexion.php");
session_start();

    if(!empty($_POST["btnregistrarse"])){
        if(empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) || empty($_POST["password"])){
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Los campos estan vacios"
                });
            </script>';
        }else{
            $nombre=$_POST["nombre"];
            $apellidos=$_POST["apellido"];
            $email=$_POST["email"];
            $password=md5($_POST["password"]);
            $institucion=$_POST["instituciones"];
            $sql=$conexion->query("insert into tbl_usuarios(cNombres,cApellidos,cCorreo,cContrasena,cInstitucion) values('$nombre','$apellidos','$email','$password','$institucion')");
                if($sql){

                    $_SESSION['loggedin'] = true;
                    header("location:inicio.php");
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