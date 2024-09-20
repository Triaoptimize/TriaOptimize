<?php
    session_start();
    include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <title>Barra Lateral</title>
<link rel="stylesheet" href="../css/Stilo_barr.css">
</head>
<body>
    <nav class="BarraLateral">
        <img src="../img/logo.png" alt="">
        <ul>
            <li><a href="Productos_tabla.php">Productos</a></li>
            <li><a href="CategoriaP_tabla.php">Categoría</a></li>
            <li><a href="Proveedor_tabla.php">Poveedores</a></li>
            <li><a href="inicio_jefe.php">Volver</a></li>
        </ul>
    
    </nav>
</body>
</html>
