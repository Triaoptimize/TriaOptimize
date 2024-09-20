<?php
include("conexion.php");
include("Productos_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM producto WHERE id_producto = '$id'");

while($mostrar = mysqli_fetch_array($querybuscar)){
    $proid = $mostrar['id_producto'];
    $pronom = $mostrar['Nombre'];
    $prostock = $mostrar['Stock'];
    $procat = $mostrar['Categoria'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos_Modif</title>
</head>
<body>
    <div class="caja_popup2">
        <form class="contenedor_poup" method="POST">
            <table>
                <tr><th colspan="2">Modificar Productos</th></tr>
                <tr>
                    <td><b>Id: </b></td>
                    <td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $proid;?>" readonly></td>
                </tr>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $pronom;?>" required></td>
                </tr>
                <tr>
                    <td><b>Stock: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtstock" value="<?php echo $prostock;?>" required></td>
                </tr>
                <tr>
                    <td><b>Categoría: </b></td>
                    <td>
                        <select name="txtcat" class="CajaTexto">
                            <?php
                            $qrproductos = mysqli_query($conn, "SELECT * FROM categoria_productos ");
                            while($mostrarcat = mysqli_fetch_array($qrproductos)){
                                if($mostrarcat['id']==$procat){
                                    echo '<option selected="selected" value="'.$mostrarcat['id_cat'].'">' .$mostrarcat['Nombre']. '</option>';
                                }else{
                                    echo '<option value="'.$mostrarcat['id_cat'].'">' .$mostrarcat['Nombre']. '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php echo "<a class='BotonesTeam' href=\"Productos_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
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
    $proid1 = $_POST['txtid'];
    $pronom1 = $_POST['txtnom'];
    $prostock1 = $_POST['txtstock'];
    $procat1 = $_POST['txtcat'];

    $querymodificar = mysqli_query($conn, "UPDATE producto SET Nombre='$pronom1',Stock='$prostock1',Categoria='$procat1' WHERE id_producto = '$proid1'");
    echo "<script>window.location= 'Productos_tabla.php?pag=$pagina'</script>";
}
?>
