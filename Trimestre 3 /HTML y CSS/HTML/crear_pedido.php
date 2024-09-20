<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="../css/crear_pedido.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body> 
    <img src="../img/logo.png" alt="">
    <div class="container">
        <div class="pedido">
            <h1>Pedido</h1>
            <p class="espacio">#__________</p>
            <div class="contenido">
                <div class="descripcion">
                    <p>Descripción</p>
                    <p>#Producto o Nombre del producto</p>
                    <a href="#" class="agregar">Agregar producto</a>
                </div>
                <div class="precio">
                    <p>Precio</p>
                </div>
            </div>
            <div class="footer">
                <span>Total</span>
                <span class="precio total">$</span>
            </div>
            <button class="boton_crear" id="openModal">Crear</button>
        </div>
    </div>

    <div id="overlay" class="overlay"></div>
    <div id="modal" class="modal">
            <div class="pedido">
                <h1>Advertencia</h1>
                <div class="contenido">
                    <div class="descripcion">
                        <p>¿Está seguro de crear este pedido?</p>
                    </div>
            <p id="modalContent"></p>
        <button id="closeModal" class="no"><a>No</a></button>
        <button><a href="Pedidos.php">Si</a></button>

        <script src="../java/pedidos.js"></script>
    </div>
</body>
</html>
