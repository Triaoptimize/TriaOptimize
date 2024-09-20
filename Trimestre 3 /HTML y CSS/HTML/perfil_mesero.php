<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIenvenido a tu perfil</title>
    <link rel="stylesheet" href="../css/perfil_mesero.css">
    <link rel="shortcut icon" href="/img/logo.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="profile-pic">
            <img src="https://via.placeholder.com/100" alt="Foto de perfil">
        </div>
        <div class="info">
            <h2>Mesero</h2>
            <p><strong>Nombre:</strong> Julián Jaldo Rivas</p>
            <p><strong>Contraseña:</strong> 3135168%</p>
            <p><strong>Teléfono:</strong> 31549865</p>
            <p><strong>Correo:</strong> JulianRivas@gmail.com</p>
        </div>
        <div class="buttons">
            <button onclick="mostrarAdvertencia()">Mostrar Advertencia</button>
            <button onclick="mostrarAdvertencia()">Mostrar Advertencia</button>

    <div id="mensajeAdvertencia" class="alert warning" style="display: none;">
        <strong>Advertencia!</strong> Este es un mensaje de advertencia.
    </div>
        </div>
    </div>
    <script src="../java/advertencia.js"></script>
</body>

</html>
