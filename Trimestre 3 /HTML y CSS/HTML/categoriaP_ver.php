<?php
include("conexion.php");
include("CategoriaP_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['categoria'];

$querybuscar = mysqli_query($conn, "SELECT * FROM categoria_productos WHERE id_cat= '$id'");

while($mostrar = mysqli_fetch_array($querybuscar)){
    $catid = $mostrar['id_cat'];
    $catnom = $mostrar['Nombre'];
    
}
?>

<html>
<body>
    <div class="caja_popup2">
        <form class="contenedor_poup" method="POST">
            <table>
                <tr><th colspan="2">Ver categoria</th></tr>
                <tr>
                <td><b>Id: </b></td>
                <td><?php echo $catid; ?></td>
            </tr>
            <tr>
                <td><b>Nombre: </b></td>
                <td><?php echo $catnom; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                <?php echo "<a class='BotonesTeam' href=\"CategoriaP_tabla.php?pag=$pagina\">Regresar</a>";?>
                </td>
            </tr>
            </table>
        </form>
    </div>
</body>
</html>
