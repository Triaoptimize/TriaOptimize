<?php
include("conexion.php");
include("Pedidos.php");

$pagina = $_GET['pag'];
$id = $_GET['id_pedido'];

$querybuscar = mysqli_query($conn, "SELECT pe.id_pedido, pe.fecha, pe.total, pa.id_plat, pa.cantidad, pl.precio 
                                    FROM pedido pe 
                                    INNER JOIN pedido_has_platillo pa ON pe.id_pedido = pa.id_pedido 
                                    INNER JOIN platillos pl ON pa.id_plat = pl.id_plat 
                                    WHERE pe.id_pedido = '$id'");

$pedid = '';
$pedfe = '';
$pedto = 0;
$platillos = [];

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $pedid = $mostrar['id_pedido'];
    $pedfe = $mostrar['fecha'];
    $pedto = $mostrar['total'];

    $platillos[] = [
        'id_plat' => $mostrar['id_plat'],
        'cantidad' => $mostrar['cantidad'],
        'precio' => $mostrar['precio']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar pedidos</title>
    <script>
        function actualizarTotal() {
            let total = 0;
            const precios = document.querySelectorAll('.precioPlatillo');
            const cantidades = document.querySelectorAll('.cantidadPlatillo');

            precios.forEach((precio, index) => {
                const cantidad = cantidades[index].value;
                total += precio.value * cantidad;
            });

            document.getElementById('txttot').value = total;
        }

        function agregarPlatillo() {
            const contenedor = document.getElementById('platillosContainer');
            const nuevoPlatillo = `
                <tr>
                    <td><b>Nuevo Id platillo: </b></td>
                    <td><input class="CajaTexto" type="number" name="nuevo_id_plat[]" required></td>
                </tr>
                <tr>
                    <td><b>Cantidad: </b></td>
                    <td><input class="CajaTexto cantidadPlatillo" type="number" name="nuevo_cantidad[]" value="1" oninput="actualizarTotal()" required></td>
                </tr>
            `;
            contenedor.insertAdjacentHTML('beforeend', nuevoPlatillo);
        }

        function eliminarPlatillo(button) {
            const row = button.parentNode.parentNode;
            row.remove();
            actualizarTotal();
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
                <tr><th colspan="2">Modificar Pedidos</th></tr>
                <tr>
                    <td><b>Id pedido: </b></td>
                    <td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $pedid;?>" readonly></td>
                </tr>
                <tr>
                    <td><b>Fecha: </b></td>
                    <td><input class="CajaTexto" type="date" name="txtfec" value="<?php echo $pedfe;?>" required></td>
                </tr>
                <tr>
                    <td><b>Total: </b></td>
                    <td><input class="CajaTexto" type="number" name="txttot" id="txttot" value="<?php echo $pedto;?>" readonly></td>
                </tr>

                <tr><th colspan="2">Platillos</th></tr>
                <?php foreach ($platillos as $platillo): ?>
                <tr>
                    <td><b>Id platillo: </b></td>
                    <td><input class="CajaTexto" type="number" name="txtid_plat[]" value="<?php echo $platillo['id_plat']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><b>Cantidad: </b></td>
                    <td>
                        <input class="CajaTexto cantidadPlatillo" type="number" name="txtcan[]" value="<?php echo $platillo['cantidad']; ?>" oninput="actualizarTotal()">
                        <input type="hidden" class="precioPlatillo" name="precio[]" value="<?php echo $platillo['precio']; ?>">
                        <button type="button" onclick="eliminarPlatillo(this)">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; ?>

                <tbody id="platillosContainer"></tbody>

                <tr>
                    <td colspan="2">
                        <button type="button" onClick="agregarPlatillo()">Agregar platillo</button>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                    <?php echo "<a class='BotonesTeam' href=\"Pedidos.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
                    <input class="BotonesTeam" type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('Deseas modificar este pedido');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['btnregistrar'])) {
    $pedid1 = $_POST['txtid'];
    $pedfec1 = $_POST['txtfec'];
    $pedtot1 = $_POST['txttot'];
    $pedpla1 = $_POST['txtid_plat'];
    $pedcan1 = $_POST['txtcan'];

    $querymodificar = mysqli_query($conn, "UPDATE pedido SET fecha='$pedfec1', total='$pedtot1' WHERE id_pedido = '$pedid1'");

    $queryEliminarPlatillos = mysqli_query($conn, "DELETE FROM pedido_has_platillo WHERE id_pedido = '$pedid1'");

    for ($i = 0; $i < count($pedpla1); $i++) {
        $platillo_id = $pedpla1[$i];
        $cantidad = $pedcan1[$i];
        $querymodificarPlatillo = mysqli_query($conn, "INSERT INTO pedido_has_platillo (id_pedido, id_plat, cantidad) 
                                                      VALUES ('$pedid1', '$platillo_id', '$cantidad')");
    }

    if (isset($_POST['nuevo_id_plat']) && isset($_POST['nuevo_cantidad'])) {
        $nuevos_platillos = $_POST['nuevo_id_plat'];
        $nuevas_cantidades = $_POST['nuevo_cantidad'];

        for ($i = 0; $i < count($nuevos_platillos); $i++) {
            $nuevo_platillo_id = $nuevos_platillos[$i];
            $nueva_cantidad = $nuevas_cantidades[$i];

            $queryInsertarNuevoPlatillo = mysqli_query($conn, "INSERT INTO pedido_has_platillo (id_pedido, id_plat, cantidad) 
                                                               VALUES ('$pedid1', '$nuevo_platillo_id', '$nueva_cantidad')");

            $queryBuscarPrecio = mysqli_query($conn, "SELECT precio FROM platillos WHERE id_plat = '$nuevo_platillo_id'");
            $precioPlatillo = mysqli_fetch_array($queryBuscarPrecio)['precio'];

            $pedtot1 += $precioPlatillo * $nueva_cantidad;
        }

        $querymodificarTotal = mysqli_query($conn, "UPDATE pedido SET total='$pedtot1' WHERE id_pedido = '$pedid1'");
    }

    echo "<script>window.location= 'Pedidos.php?pag=$pagina'</script>";
}
?>
