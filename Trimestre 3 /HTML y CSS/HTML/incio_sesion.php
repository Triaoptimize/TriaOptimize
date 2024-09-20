<?php
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión aquí</title>
    <link rel="stylesheet" href="../css/inicio_sesion.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>

<body>
    <section class="form">
        <form action="usuario_login.php" method="POST">
            <img src=" ../img/logo.png" alt="">
            <h1>Inicio de sesión</h1>
            
                <input type="email" name="txtcorreo" class="botones" autocomplete="off" required placeholder="Ingrese su correo electronico">

        
                <input type="password" name="txtpassword" class="botones" autocomplete="off" required placeholder="Ingrese su contraseña">

                <div>
                <button type="submit">Ingresar</button>
                <p><a href="recuperar_contraseña.php">Recuperar contraseña</a> </p>
            <p>¿No estás registrado? <a href="registrarse.php">Registrarme</a> </p>
        </form>
        <a id="pag" href="index.php">Volver a la pagina de inicio</a>
    </section>
</body>

</html>
