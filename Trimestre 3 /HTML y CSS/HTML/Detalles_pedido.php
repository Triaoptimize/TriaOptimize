<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="../css/Detalles_pedido.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    <img src="../img/logo.png" alt="">
    <div class="container">
        <div class="pedido">
            <h1>#________</h1>
            <div class="contenido">
                <div class="descripcion">
                    <p>Descripción</p>
                    <p>#_________________</p>
                    <p>#_________________</p>
                    <p>#_________________</p>
                    <p>#_________________</p>
                </div>
                <div class="precio">
                    <p>Precio</p>
                </div>
            </div>
            <div class="footer">
                <span>Total</span>
                <span class="precio total">$</span>
            </div>
            <button class="boton_crear"><a href="Agregar_pedido.php">Agregar producto</a></button>
            <button id="openModal" class="boton_crear"><a>Dar de baja</a></button>
            <button class="boton_crear"><a>Facturar</a></button>
            <button class="boton_crear"><a href="Pedidos.php">Regresar</a></button>
        </div>

        <div id="overlay" class="overlay"></div>
    <div id="modal" class="modal">
            <div class="pedido">
                <h1>Advertencia</h1>
                <div class="contenido">
                    <div class="descripcion">
                        <p>¿Está seguro de dar de baja este pedido?</p>
                    </div>
            <p id="modalContent"></p>
        <button id="closeModal" class="no"><a>No</a></button>
        <button><a href="Pedidos.php">Si</a></button>

        <script src="../java/pedidos.js"></script>
    </div>
</body>
</html>
