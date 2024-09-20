<?php
include("conexion.php");

$pagina = isset($_GET['pag']) ? $_GET['pag'] : '';
$id = isset($_GET['id_factura']) ? $_GET['id_factura'] : '';

$querybuscar = mysqli_prepare($conn, "SELECT id_factura, Nombre, Celular, Correo, Descripcion, Cantidad, Valor FROM factura_venta WHERE id_factura = ?");
mysqli_stmt_bind_param($querybuscar, "i", $id);
mysqli_stmt_execute($querybuscar);
$resultado = mysqli_stmt_get_result($querybuscar);

if ($mostrar = mysqli_fetch_assoc($resultado)) {
    $proid = htmlspecialchars($mostrar['id_factura']);
    $pronom = htmlspecialchars($mostrar['Nombre']);
    $procel = htmlspecialchars($mostrar['Celular']);
    $procorr = htmlspecialchars($mostrar['Correo']);
    $prodes = htmlspecialchars($mostrar['Descripcion']);
    $procant = htmlspecialchars($mostrar['Cantidad']);
    $proval = htmlspecialchars($mostrar['Valor']);
} else {
    die("Factura no encontrada");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="../css/ver-factura.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <script>
        function descargar() {
            window.location.href = "descargar-factura.php?id_factura=<?php echo $proid; ?>";
        }

        function volver() {
            window.location.href = "factura.php?pag=<?php echo $pagina; ?>";
        }
    </script>
</head>
<body>
    <div class="invoice-container">
        <h2>Triü</h2>
        <table>
            <tr>
                <td><b>NO Factura</b></td>
                <td><?php echo $proid; ?></td>
            </tr>
            <tr>
                <td><b>Nombre</b></td>
                <td><?php echo $pronom; ?></td>
            </tr>
            <tr>
                <td><b>Celular</b></td>
                <td><?php echo $procel; ?></td>
            </tr>
            <tr>
                <td><b>Correo</b></td>
                <td><?php echo $procorr; ?></td>
            </tr>
            <tr>
                <td><b>Descripción</b></td>
                <td><?php echo $prodes; ?></td>
            </tr>
            <tr>
                <td><b>Cantidad</b></td>
                <td><?php echo $procant; ?></td>
            </tr>
            <tr>
                <td><b>Valor</b></td>
                <td><?php echo number_format($proval, 2, ',', '.'); ?></td>
            </tr>
        </table>

        <div class="finalize">
            <button onclick="volver()">Volver a la lista de facturas</button>
            <button onclick="descargar()">Descargar factura</button>
        </div>
    </div>
</body>
</html>
