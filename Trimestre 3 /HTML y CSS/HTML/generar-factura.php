<?php
include("conexion.php");
include("factura.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="../css/generar-factura.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
<div class="caja_popup2">
    <form method="post">
    <div class="invoice-container">
        <div class="header">
            <div class="title">
                <h2>TRIÜ RACLETTE</h2>
            </div>
            <div class="contact-info">
                <label for="telefono">Teléfono:</label>
                <label for="telefono">3003003030</label>

                <label for="correo">Correo:</label>
                <label for="correo">Triu@gmail.com</label>

                <label for="direccion">Dirección:</label>
                <label for="direccion">Calle 82 # 66 C-15</label>
            </div>
        </div>

        <div class="client-info">
            <p><strong>Datos cliente:</strong></p>
            <label for="nombre-cliente">Nombre:</label>
            <input type="text" id="nombre-cliente" placeholder="Ingrese nombre" name="Nombre" required>

            <label for="telefono-cliente">Celular:</label>
            <input type="text" id="telefono-cliente" placeholder="Ingrese teléfono" name="Celular" required>

            <label for="correo-cliente">Correo:</label>
            <input type="email" id="correo-cliente" placeholder="Ingrese correo" name="Correo" required>
        </div>

        <div class="items">
            <div class="item">
                <label for="descripcion1">Descripción:</label>
                <input type="text" id="descripcion1" placeholder="Descripción del producto" name="Descripcion" required>
                <label for="cantidad1">Cantidad:</label>
                <input type="number" id="cantidad1" placeholder="Cantidad" name="Cantidad" required>
                <label for="precio1">Precio:</label>
                <input type="number" id="precio1" placeholder="Precio" name="Valor" required>
            </div>
        <div class="total">
            <label for="total">Total:</label>
            <input type="number" id="total" placeholder="Total">
        </div>

        <div class="finalize">
            <input type="button" class="btn btn-cancelar" value="Cancelar" onClick="window.location.href='factura.php';">
            <input type="submit" class="btn btn-registrar" name="btnregistrar" value="Registrar" onClick="return confirm('¿Deseas registrar este producto?');">
        </div>
    </div>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST['btnregistrar'])){
    $pronom = $_POST['Nombre'];
    $procel = $_POST['Celular'];
    $procorr = $_POST['Correo'];
    $prodes = $_POST['Descripcion'];
    $procant = $_POST['Cantidad'];
    $proval = $_POST['Valor'];

    mysqli_query($conn, "INSERT INTO factura_venta(Nombre, Celular, Correo, Descripcion, Cantidad, Valor) VALUES ('$pronom','$procel','$procorr','$prodes','$procant','$proval')");

    echo "<script> alert('Producto registrado con éxito: $pronom'); window.location='factura.php' </script>";
}
?>
