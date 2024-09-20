<?php
include("conexion.php");
include("Productos_tabla.php");

$pagina = $_GET['pag']

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estiles.css?v=?">
    <title>Categoria_Reg</title>
</head>
<body>
    <div class="caja_popup2">
        <form class="contenedor_poup" method="POST">
        <table>
                <tr>
                    <th colspan="2">Agregar Productos</th>
                </tr>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
                </tr>
                <tr>
                    <td><b>Stock: </b></td>
                    <td><input type="number" name="txtstock" autocomplete="off" class="CajaTexto" step="any"></td>
                </tr>
                <tr>
                    <td><b>Categoría: </b></td>
                    <td>
                        <select name="txtcat" class="CajaTexto">
                            <?php
                            $qrcategoria = mysqli_query($conn, "SELECT * FROM categoria_productos ");
                            while($mostrarcat = mysqli_fetch_array($qrcategoria)){
                                echo '<option value="'.$mostrarcat['id_cat'].'">' .$mostrarcat['Nombre']. '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php echo "<a class='BotonesTeam' href=\"Productos_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
                        <input class="BotonesTeam" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('Deseas registrar este producto');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['btnregistrar'])){
    $pronom = $_POST['txtnom'];
    $propre = $_POST['txtstock'];
    $procat = $_POST['txtcat'];

    mysqli_query($conn, "INSERT INTO producto (Nombre,Stock,Categoria) VALUES ('$pronom','$propre','$procat')");

    echo "<script> alert('Producto registrado con exito: $pronom'); window.Location='Productos_tabla.php' </script>";
}
?>
