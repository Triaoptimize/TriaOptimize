<?php
include("conexion.php");
include("Proveedor_tabla.php");


$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT pv.id_proveedor,pv.Nombre,pv.Correo,pv.Celular,pro.Nombre As productos FROM proveedor pv, producto pro WHERE pv.id_producto_FK=pro.id_producto AND pv.id_proveedor = '$id'");

if (!$querybuscar) {
    die("Error en la consulta SQL: " . mysqli_error($conn)); 
}
while($mostrar = mysqli_fetch_array($querybuscar)){
    $proid = $mostrar['id_proveedor'];
    $pronom = $mostrar['Nombre'];
    $procorreo = $mostrar['Correo'];
    $procel = $mostrar['Celular'];
    $propro = $mostrar['productos'];
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
                <td><b>Correo: </b></td>
                <td><?php echo $procorreo; ?></td>
            </tr>
            <tr>
                <td><b>Celular</b></td>
                <td><?php echo $procel; ?></td>
            </tr>
            <tr>
                <td><b>Producto</b></td>
                <td><?php echo $propro; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                <?php echo "<a class='BotonesTeam' href=\"Proveedor_tabla.php?pag=$pagina\">Regresar</a>";?>
                </td>
            </tr>
            </table>
        </form>
    </div>
</body>
</html>
