<?php
include("conexion.php");
include("Productos_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT pro.id_producto,pro.Nombre,pro.Stock,cat.Nombre As categoria FROM producto pro, categoria_productos cat WHERE pro.Categoria=cat.id_cat AND pro.id_producto = '$id'");

if (!$querybuscar) {
    die("Error en la consulta SQL: " . mysqli_error($conn)); 
}
while($mostrar = mysqli_fetch_array($querybuscar)){
    $proid = $mostrar['id_producto'];
    $pronom = $mostrar['Nombre'];
    $prostock = $mostrar['Stock'];
    $procat = $mostrar['categoria'];
}
?>

<html lang=en>
<body>
    <div class="caja_popup2">
        <form class="contenedor_poup" method="POST">
            <table>
                <tr><th colspan="2">Ver Productos</th></tr>
                <tr>
                <td><b>Id: </b></td>
                <td><?php echo $proid; ?></td>
            </tr>
            <tr>
                <td><b>Nombre: </b></td>
                <td><?php echo $pronom; ?></td>
            </tr>
            <tr>
                <td><b>Stock: </b></td>
                <td><?php echo $prostock; ?></td>
            </tr>
            <tr>
                <td><b>Categoría</b></td>
                <td><?php echo $procat; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                <?php echo "<a class='BotonesTeam' href=\"Productos_tabla.php?pag=$pagina\">Regresar</a>";?>
                </td>
            </tr>
            </table>
        </form>
    </div>
</body>
</html>
