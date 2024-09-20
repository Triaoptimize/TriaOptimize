<?php
include("conexion.php");
include("Pedidos.php");

$pagina = $_GET['pag'];

if (isset($_POST['btnregistrar'])) {
    $pedfec = $_POST['txtfec'];
    $total = $_POST['txttotal'];

    mysqli_query($conn, "INSERT INTO pedido(fecha, total) VALUES ('$pedfec', '$total')");
    $pedido_id = mysqli_insert_id($conn);

    $id_plat = $_POST['id_plat'];
    $cantidad = $_POST['cantidad'];

    for ($i = 0; $i < count($id_plat); $i++) {
        $platillo_id = $id_plat[$i];
        $cant = $cantidad[$i];

        mysqli_query($conn, "INSERT INTO pedido_has_platillo (id_pedido, id_plat, cantidad) VALUES ('$pedido_id', '$platillo_id', '$cant')");
    }

    echo "<script> alert('Pedido registrado con éxito'); window.Location='Pedidos.php' </script>";
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'get_precio') {
    $id_plat = $_GET['id_plat'];
    $query = mysqli_query($conn, "SELECT precio FROM platillos WHERE id_plat = '$id_plat'");
    $precio = mysqli_fetch_assoc($query);
    echo json_encode($precio);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de pedidos</title>
    <script>
        function actualizarTotal() {
            let total = 0;
            const precios = document.querySelectorAll('.precioPlatillo');
            const cantidades = document.querySelectorAll('.cantidadPlatillo');

            precios.forEach((precio, index) => {
                const cantidad = cantidades[index].value;
                total += precio.value * cantidad;
            });

            document.getElementById('txttotal').value = total;
        }

        function agregarPlatillo() {
            const contenedor = document.getElementById('platillosContainer');
            const nuevoPlatillo = `
                <tr>
                    <td><b>Id platillo: </b></td>
                    <td><input class="CajaTexto" type="number" name="id_plat[]" required oninput="obtenerPrecios()"></td>
                </tr>
                <tr>
                    <td><b>Cantidad: </b></td>
                    <td><input class="CajaTexto cantidadPlatillo" type="number" name="cantidad[]" value="1" oninput="actualizarTotal()" required></td>
                </tr>
                <tr>
                    <td><b>Precio: </b></td>
                    <td><input class="CajaTexto precioPlatillo" type="number" name="precio[]" value="0" readonly></td>
                </tr>
            `;
            contenedor.insertAdjacentHTML('beforeend', nuevoPlatillo);
        }

        function obtenerPrecios() {
            const platillos = document.querySelectorAll('input[name="id_plat[]"]');
            const preciosInputs = document.querySelectorAll('.precioPlatillo');

            platillos.forEach((input, index) => {
                const platilloId = input.value;
                fetch(`?action=get_precio&id_plat=${platilloId}`)
                    .then(response => response.json())
                    .then(data => {
                        preciosInputs[index].value = data.precio;
                        actualizarTotal();
                    });
            });
        }

        window.onload = function() {
            actualizarTotal();
        }
    </script>
</head>
<body>
    <div class="caja_popu2">
        <form class="contenedor_popup" method="POST">
            <table>
                <tr>
                    <th colspan="2">Agregar Pedidos</th>
                </tr>
                <tr>
                    <td><b>Fecha: </b></td>
                    <td><input type="date" name="txtfec" autocomplete="off" class="CajaTexto" required></td>
                </tr>

                <tr><th colspan="2">Platillos</th></tr>
                <tbody id="platillosContainer">
                    <tr>
                        <td><b>Id platillo: </b></td>
                        <td><input class="CajaTexto" type="number" name="id_plat[]" required oninput="obtenerPrecios()"></td>
                    </tr>
                    <tr>
                        <td><b>Cantidad: </b></td>
                        <td><input class="CajaTexto cantidadPlatillo" type="number" name="cantidad[]" value="1" oninput="actualizarTotal()" required></td>
                    </tr>
                    <tr>
                        <td><b>Precio: </b></td>
                        <td><input class="CajaTexto precioPlatillo" type="number" name="precio[]" value="0" readonly></td>
                    </tr>
                </tbody>

                <tr>
                    <td colspan="2">
                        <button type="button" onClick="agregarPlatillo()">Agregar platillo</button>
                    </td>
                </tr>

                <tr>
                    <td><b>Total: </b></td>
                    <td><input class="CajaTexto" type="number" id="txttotal" name="txttotal" value="0" readonly></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <?php echo "<a class='BotonesTeam' href=\"Pedidos.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
                        <input class="BotonesTeam" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('Deseas registrar este pedido');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
