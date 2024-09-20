<?php
include("conexion.php");
include("Proveedor_tabla.php");

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
                    <td><b>Correo: </b></td>
                    <td><input type="Gmail" name="txtcor" autocomplete="off" class="CajaTexto" step="any"></td>
                </tr>
                <tr>
                <td><b>Celular: </b></td>
                    <td><input type="number" name="txtcel" autocomplete="off" class="CajaTexto" step="any"></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php echo "<a class='BotonesTeam' href=\"Proveedor_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
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
    $povnom = $_POST['txtnom'];
    $povcor = $_POST['txtcor'];
    $povcel = $_POST['txtcel'];
    

    mysqli_query($conn, "INSERT INTO proveedor (Nombre,Correo,Celular,productos) VALUES ('$povnom','$povcor','$povcel','$povpro')");

    echo "<script> alert('Producto registrado con exito: $povnom'); window.Location='Proveedor_tabla.php' </script>";
}
?>
