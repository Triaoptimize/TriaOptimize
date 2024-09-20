<?php
include("conexion.php");
include("Proveedor_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT pv.id_proveedor,pv.Nombre,pv.Correo,pv.Celular,pro.Nombre As productos FROM proveedor pv, producto pro WHERE pv.id_producto_FK=pro.id_producto AND pv.id_proveedor = '$id'");


while($mostrar = mysqli_fetch_array($querybuscar)){
    $povid = $mostrar['id_proveedor'];
    $povnom = $mostrar['Nombre'];
    $povcor = $mostrar['Correo'];
    $povcel = $mostrar['Celular'];
    $povpro = $mostrar['productos'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estiles.css?v=?">
    <title>Productos_Modif</title>
</head>
<body>
    <div class="caja_popup2">
        <form class="contenedor_poup" method="POST">
            <table>
                <tr><th colspan="2">Modificar Productos</th></tr>
                <tr>
                    <td><b>Id: </b></td>
                    <td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $povid;?>" readonly></td>
                </tr>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $povnom;?>" required></td>
                </tr>
                <tr>
                    <td><b>Correo: </b></td>
                    <td><input class="CajaTexto" type="Gmail" name="txtcor" value="<?php echo $povcor;?>" required></td>
                </tr>
                <tr>
                    <td><b>Celular: </b></td>
                    <td><input class="CajaTexto" type="number" name="txtcel" value="<?php echo $povcel;?>" required></td>
                </tr>
                <tr>
                    <td><b>Producto: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtpro" value="<?php echo $povpro;?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php echo "<a class='BotonesTeam' href=\"Proveedor_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
                    <input class="BotonesTeam" type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('Deseas modificar este producto');">
                    
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['btnregistrar'])){
    $povid = $_POST['txtid'];
    $povnom = $_POST['txtnom'];
    $povcor = $_POST['txtcor'];
    $povcel = $_POST['txtcel'];
    $povpro = $_POST['txtpro'];


    $querymodificar = mysqli_query($conn, "UPDATE proveedor SET Nombre='$povid',Correo='$povcor',Celular='$txtcel', productos='$povpro'  WHERE id_proveedor = '$povid'");
    echo "<script>window.location= 'Proveedor_tabla.php?pag=$pagina'</script>";
}
?>
