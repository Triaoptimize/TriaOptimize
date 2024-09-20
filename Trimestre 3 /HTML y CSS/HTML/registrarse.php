<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de resgistro</title>
    <link rel="stylesheet" href="../css/registrarse.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>

<body>
    <section class="form">
        <form action="usuario_registrar.php" method="POST">
            <img src=" ../img/logo.png" alt="">
            <h1>Registrarse</h1>
          
                <input type="text" name="txtid1" class="botones" placeholder="Ingresar identificación" autocomplete="off" required>
                <input type="text" name="txtnombre1" class="botones" placeholder="Ingresar su nombre" autocomplete="off" required>
                <input type="text" name="txtapellidos1" class="botones" placeholder="Ingresar su apellido" autocomplete="off" required>
                <input type="email" name="txtcorreo1" class="botones" placeholder="Ingresar su correo electronico" autocomplete="off" required>
                <input type="password" name="txtpassword1" class="botones" placeholder="Ingrese su contraseña" autocomplete="off" required>
                <input type="text" name="txtrol1" class="botones" placeholder="Ingrese su rol" autocomplete="off" required>

                <button type="submit"><a href="#">Registrarse</button></a>
            
        </form>
        <p>¿Ya tiene una cuenta? <a  class="abajo" href="inicio_sesion.php">Iniciar Sesión</a> </p>

    </section>
</body>

</html>
