<?php
include("conexion.php");
include("gestion_platillo.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM platillos WHERE id_plat = '$id'");

while($mostrar = mysqli_fetch_array($querybuscar)){
    $platid = $mostrar['id_plat'];
    $platnom = $mostrar['nombre'];
    $platpre = $mostrar['precio'];
    $platdes = $mostrar['descripcion'];
    $platcat = $mostrar['id_categoria'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar_platillo.css">
    <title>Modificar Platillos</title>
</head>
<body>
    <div class="caja_popup2">
        <form class="contenedor_poup" method="POST">
            <table>
                <tr><th colspan="2">Modificar Platillos</th></tr>
                <tr>
                    <td><b>Id: </b></td>
                    <td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $platid;?>" readonly></td>
                </tr>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $platnom;?>" required></td>
                </tr>
                <tr>
                    <td><b>Precio: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtpre" value="<?php echo $platpre;?>" required></td>
                </tr>
                <tr>
                    <td><b>Descripcion: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtdes" value="<?php echo $platdes;?>" required></td>
                </tr>
                <tr>
                    <td><b>Categoría: </b></td>
                    <td>
                        <select name="txtcat" class="CajaTexto">
                            <?php
                            $qrproductos = mysqli_query($conn, "SELECT * FROM categoria_platillos ");
                            while($mostrarcat = mysqli_fetch_array($qrproductos)){
                                if($mostrarcat['id']==$platcat){
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
                    <?php echo "<a class='BotonesTeam' href=\"gestion_platillo.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
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
    $platid1 = $_POST['txtid'];
    $platnom1 = $_POST['txtnom'];
    $platpre1 = $_POST['txtpre'];
    $platdes1 = $_POST['txtdes'];
    $platcat1 = $_POST['txtcat'];

    $querymodificar = mysqli_query($conn, "UPDATE platillos SET nombre='$platnom1',precio='$platpre1',descripcion='$platdes1',id_categoria='$platcat1' WHERE id_plat = '$platid1'");
    echo "<script>window.location= 'gestion_platillo.php?pag=$pagina'</script>";
}
?>
