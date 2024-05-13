<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bazar UACJ</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style_registro.css">
</head>
<body style="background-image: url('https://i.imgur.com/K9P1RUG.jpg'); background-size: cover; background-repeat: no-repeat;">

<div class="contenedor">
    <div class="login-box">
        <h2>Registrarse</h2>

    <form method="post">
        <?php
        include("conexion.php");
        include("controladores/controlador_registro.php");
        ?>
        <div class="mb-3">
            <label class="form-label">Nombre(s)</label>
            <input name="nombre" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Apellidos</label>
            <input name="apellido" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div style="text-align: center">
        <label>Seleccionar institución</label>
        <br>
        <select name="instituciones">
        <option value="IIT">IIT</option>
        <option value="ICB">ICB</option>
        <option value="ICSA">ICSA</option>
        <option value="CU">CU</option>
        </select>
        <br>
        <br>
        </div>
        <div style="align-items: center">
        <input name="btnregistrarse" class="btn btn-primary" type="submit" value="Registrarse">
        </div>
        </form>
        <br>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>