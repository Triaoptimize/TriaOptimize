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
                    <td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $catid;?>" readonly></td>
                </tr>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $catnom;?>" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php echo "<a class='BotonesTeam' href=\"CategoriaP_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
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
    $catid1 = $_POST['txtid'];
    $catnom1 = $_POST['txtnom'];


    $querymodificar = mysqli_query($conn, "UPDATE categoria_productos SET Nombre='$catnom1' WHERE id_cat = '$catid1'");
    echo "<script>window.location= 'CategoriaP_tabla.php?pag=$pagina'</script>";
}
?>
