<?php
include('conexion.php');
include('Barra_central.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas Realizadas</title>
    <link rel="stylesheet" href="../css/factura.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    <div class="facturas-container">
        <h2>Facturas Realizadas</h2>
        <div class="tabla-facturas">
            <table>
                <thead>
                    <tr>
                        <th>Factura</th>
                        <th>Cliente</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Valor</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
                    

                    $resultado = mysqli_query($conn, "SELECT id_factura, Nombre, Celular, Correo, Descripcion, Cantidad, Valor FROM factura_venta");


                    if ($resultado) {
                        while ($mostrar = mysqli_fetch_assoc($resultado)){
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($mostrar['id_factura']) . "</td>";
                            echo "<td>" . htmlspecialchars($mostrar['Nombre']) . "</td>";
                            echo "<td>" . htmlspecialchars($mostrar['Celular']) . "</td>";
                            echo "<td>" . htmlspecialchars($mostrar['Correo']) . "</td>";
                            echo "<td>" . htmlspecialchars($mostrar['Descripcion']) . "</td>";
                            echo "<td>" . htmlspecialchars($mostrar['Cantidad']) . "</td>";
                            echo "<td>" . htmlspecialchars($mostrar['Valor']) . "</td>";
                            echo "<td style='width:10%'><a href=\"ver-factura.php?id_factura=" . urlencode($mostrar['id_factura']) . "&pag=" . urlencode($pagina) . "\"><box-icon name='low-vision'></box-icon></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron facturas</td></tr>";
                    }

                ?>
                </tbody>
            </table>
        </div>
        <button class="generar-factura" id="generar-factura-btn" onclick="window.location.href='generar-factura.php';">Generar Factura</button>
    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
