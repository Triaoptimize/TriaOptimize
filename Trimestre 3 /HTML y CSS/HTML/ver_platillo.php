<?php
include("conexion.php");
include("gestion_platillo.php");

$pagina = isset($_GET['pag']) ? $_GET['pag'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';  

$querybuscar = mysqli_prepare($conn, "SELECT id_plat , nombre, precio, descripcion, id_categoria  FROM platillos WHERE id_plat = ?");
mysqli_stmt_bind_param($querybuscar, "i", $id);
mysqli_stmt_execute($querybuscar);
$resultado = mysqli_stmt_get_result($querybuscar);

if ($mostrar = mysqli_fetch_assoc($resultado)) {
    $platid = htmlspecialchars($mostrar['id_plat']);
    $platnom = htmlspecialchars($mostrar['nombre']);
    $platpre = htmlspecialchars($mostrar['precio']);
    $platdes = htmlspecialchars($mostrar['descripcion']);
    $platcat = htmlspecialchars($mostrar['id_categoria']);
} else {
    die("Platillo no encontrado");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platillos</title>
    <link rel="stylesheet" href="../css/ver_platillo.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    <div class="caja_popup2">
    <div class="invoice-container">
        <h2>Triü</h2>
        <table>
            <tr>
                <td><b>Id platillo</b></td>
                <td><?php echo $platid; ?></td>
            </tr>
            <tr>
                <td><b>Nombre</b></td>
                <td><?php echo $platnom; ?></td>
            </tr>
            <tr>
                <td><b>Precio</b></td>
                <td><?php echo $platpre; ?></td> 
            </tr>
            <tr>
                <td><b>Descripcion</b></td>
                <td><?php echo $platdes; ?></td>
            </tr>
            <tr>
                <td><b>Categoria</b></td>
                <td><?php echo $platcat; ?></td>
            </tr>
        </table>

        <div class="finalize">
        <input type="button" class="btn btn-cancelar" value="Cancelar" onClick="window.location.href='gestion_platillo.php';">
        </div>
    </div>
    </div>
</body>
</html>
