<?php
include("conexion.php");
include("gestion_platillo.php");

$pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Agregar_platillos.css"> 
    <title>Agregar platillo</title>
</head>
<body>
    <div class="caja_popup2">
        <form class="contenedor_poup" method="POST">
        <table>
                <tr>
                    <th colspan="2">Agregar Platillo</th>
                </tr>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
                </tr>
                <tr>
                    <td><b>Precio: </b></td>
                    <td><input type="number" name="txtstock" autocomplete="off" class="CajaTexto" step="any"></td>
                </tr>
                <tr>
                    <td><b>Descripción: </b></td>
                    <td><input type="text" name="txtdes" autocomplete="off" class="CajaTexto" step="any"></td>
                </tr>
                <tr>
                    <td><b>Categoría: </b></td>
                    <td>
                        <select name="txtcat" class="CajaTexto">
                            <?php
                            $qrcategoria = mysqli_query($conn, "SELECT * FROM categoria_platillos ");
                            while($mostrarcat = mysqli_fetch_array($qrcategoria)){
                                echo '<option value="'.$mostrarcat['id_cat'].'">' .$mostrarcat['Nombre']. '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php echo "<a class='BotonesTeam' href=\"gestion_platillo.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
                        <input class="BotonesTeam" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('Deseas registrar este platillo?');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['btnregistrar'])){
    $platnom = $_POST['txtnom'];
    $platpre = $_POST['txtpre'];
    $platdes = $_POST['txtdes'];
    $platcat = $_POST['txtcat'];

    mysqli_query($conn, "INSERT INTO platillos (nombre,precio,descripcion,id_categoria) VALUES ('$platnom','$platpre','$platdes','$platcat')");

    echo "<script> alert('Producto registrado con exito: $platnom'); window.location='gestion_platillo.php' </script>";
}
?>
