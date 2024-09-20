<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../css/pedidos_c.css">
    <link rel="shortcut icon" href="/img/logo.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/img/logo.png" alt="" width="100px" height="100px">
            <nav>
                <a href="incio_cocinero.php">Volver</a>
            </nav>
        </div>
        <div class="content">
            <h1>Pedidos</h1>
            <input type="text" class="search" placeholder="Buscar...">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>#Pedido solicitante</th>
                        <th>Confirmar pedido</th>
                        <th>Numero</th>
                        <th>Detalles del pedido</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#________</td>
                        <td><img src="/img/verificado.png"></td>
                        <td><input type="text" placeholder=""></td>
                        <td><button id="openModal" class="ola"><a>Detalles...</a></button></td>
                    </tr>
                    <tr>
                        <td>#________</td>
                        <td><img src="/img/verificado.png"></td>
                        <td><input type="text" placeholder=""></td>
                        <td><button id="openModal1" class="ola"><a>Detalles...</a></button></td>
                    </tr>
                    <tr>
                        <td>#________</td>
                        <td><img src="/img/verificado.png"></td>
                        <td><input type="text" placeholder=""></td>
                        <td><button id="openModal2" class="ola"><a>Detalles...</a></button></td>
                    </tr>
                    <tr>
                        <td>#________</td>
                        <td><img src="/img/verificado.png"></td>
                        <td><input type="text" placeholder=""></td>
                        <td><button id="openModal3" class="ola"><a>Detalles...</a></button></td>
                    </tr>
                    <tr>
                        <td>#________</td>
                        <td><img src="/img/verificado.png"></td>
                        <td><input type="text" placeholder=""></td>
                        <td><button id="openModal4" class="ola"><a>Detalles...</a></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div id="overlay" class="overlay"></div>
    <div id="modal" class="modal">
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
            <p id="modalContent"></p>
        <button id="closeModal" class="no"><a>Cerrar</a></button>

        <script src="../java/pedidos_c.js"></script>
    </div>
</html>
