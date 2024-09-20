<?php
include("conexion.php");
include("Pedidos.php");

$pagina = $_GET['pag'];
$id = $_GET['id_pedido'];

$querybuscar = mysqli_query($conn, "SELECT pe.id_pedido, pe.fecha, pe.total, pa.id_plat, pa.cantidad 
    FROM pedido pe 
    JOIN pedido_has_platillo pa ON pe.id_pedido = pa.id_pedido 
    WHERE pe.id_pedido = '$id'");

$pedido = mysqli_fetch_array($querybuscar);
$pedid = $pedido['id_pedido'];
$pedfec = $pedido['fecha'];
$pedtot = $pedido['total'];
?>

<html lang="en">
<body>
    <div>
        <form class="contenedor_popup" method="POST">
            <table>
                <tr><th colspan="2">Ver Pedido</th></tr>
                <tr>
                    <td><b>Id: </b></td>
                    <td><?php echo $pedid; ?></td>
                </tr>
                <tr>
                    <td><b>Fecha: </b></td>
                    <td><?php echo $pedfec; ?></td>
                </tr>
                <tr>
                    <td><b>Total: </b></td>
                    <td><?php echo $pedtot; ?></td>
                </tr>
                <tr>
                    <th>Id del platillo</th>
                    <th>Cantidad del platillo</th>
                </tr>
                <?php
                mysqli_data_seek($querybuscar, 0);
                while ($mostrar = mysqli_fetch_array($querybuscar)) {
                    $pedpla = $mostrar['id_plat'];
                    $pedcan = $mostrar['cantidad'];
                    ?>
                    <tr>
                        <td><?php echo $pedpla; ?></td>
                        <td><?php echo $pedcan; ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="2">
                        <?php echo "<a class='BotonesTeam' href=\"Pedidos.php?pag=$pagina\">Regresar</a>"; ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
