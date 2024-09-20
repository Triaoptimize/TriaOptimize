<?php
include("conexion.php");
include("Barra_central.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/estiles.css?v=?">
</head>
<body>
    <div class="ContenedorPrincipal">
        <?php
        $filasmax = 7;
        if (isset($_GET['pag'])){
            $pagina = $_GET['pag'];
        }else{
            $pagina = 1;
        }
        if(isset($_POST['btnbuscar'])){
            $buscar = $_POST['txtbuscar'];

            $sqlcat = mysqli_query($conn, "SELECT pro.id_producto,pro.Nombre,pro.Stock,cat.Nombre As categoria FROM producto pro, categoria_productos cat WHERE pro.Categoria=cat.id_cat AND pro.Nombre LIKE '%".$buscar."%'");
        }else{
            $sqlcat = mysqli_query($conn, "SELECT pro.id_producto,pro.Nombre,pro.Stock,cat.Nombre As categoria FROM producto pro, categoria_productos cat WHERE pro.Categoria=cat.id_cat ORDER BY pro.id_producto ASC LIMIT " . (($pagina - 1) * $filasmax) . "," . $filasmax);

        }

        $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_producto FROM producto");

        $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_producto'];
        ?>
        <div class="ContenedorTabla">
            <form method="POST">
                <h1 class="titulo">Productos</h1>
                <div class="ConBuscar">
                    <div style="float: left;">
                    <a href="Productos_tabla.php" class="BotonesTeam">inicio</a>
                    <input type="submit" class="BotonesTeam" value="Buscar" name="btnbuscar">
                    <input type="text" class="CajaTextoBuscar" value="Buscar" name="txtbuscar" placeholder="Ingresar descripción del producto" autocomplete="off">
                    </div>
                    <div style="float:right;">
                    <?php echo "<a  class='BotonesTeam5' href=\"Productos_registrar.php?pag=$pagina\">Agregar Producto</a>";
                    ?>
                   </div>
                </div>
            </form>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>opciones</th>
                </tr>
                <?php
                 while ($mostrar = mysqli_fetch_assoc($sqlcat)){
                    echo "<tr>";
                        echo "<td>" .$mostrar['id_producto']."</td>";
                        echo "<td>" .$mostrar['Nombre']."</td>";
                        echo "<td>" .$mostrar['Stock']."</td>";
                        echo "<td>" .$mostrar['categoria']."</td>";
                        echo "<td style='width:24%;'> 
                          <a class='BotonesTeam1' href=\"Productos_ver.php?id=$mostrar[id_producto]&pag=$pagina\"><svg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 795 614'><path fill='#000000' d='M397.25 278c38 0 69 31 69 69s-31 68-69 68s-68-30-68-68s30-69 68-69m0-170c226 0 389 212 389 212c11 14 11 39 0 53c0 0-163 212-389 212s-389-212-389-212c-11-14-11-39 0-53c0 0 163-212 389-212m0 410c94 0 171-77 171-171s-77-171-171-171s-171 77-171 171s77 171 171 171'/></svg></a>
                          <a class='BotonesTeam2' href=\"Productos_modificar.php?id=$mostrar[id_producto]&pag=$pagina\"><svg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 24 24'><path fill='#ffff' d='M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h6.525q.5 0 .75.313t.25.687t-.262.688T11.5 5H5v14h14v-6.525q0-.5.313-.75t.687-.25t.688.25t.312.75V19q0 .825-.587 1.413T19 21zm4-7v-2.425q0-.4.15-.763t.425-.637l8.6-8.6q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4t-.137.738t-.438.662l-8.6 8.6q-.275.275-.637.438t-.763.162H10q-.425 0-.712-.288T9 14m12.025-9.6l-1.4-1.4zM11 13h1.4l5.8-5.8l-.7-.7l-.725-.7L11 11.575zm6.5-6.5l-.725-.7zl.7.7z'/></svg></a>
                          <a class='BotonesTeam3' href=\"Productos_eliminar.php?id=$mostrar[id_producto]&pag=$pagina
                          \"onClick=\"return confirm('¿Estás seguro de eliminar el id=$mostrar[Nombre]?')\"><svg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 24 24'><path fill='#000000' d='M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z'/></svg></a>
                        </td>";
                }
                ?>
            </table>
            <div style='text-align:right;'>
                      <br>
                      <?php
                      echo"Total de productos: ".$maxusutabla;
                      ?>
            </div>
            <div style='text-align:right;'>
                      <br>
            </div>
            <div style='text-align:right;'>
            <?php
                if(isset($_GET['pag'])){
                    if($_GET['pag'] > 1){
            ?>
            <a class="BotonesTeam4" href="Productos_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
            <?php
                    }else{
                        ?>
                    <a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
                    <?php
                    } ?>
                    <?php
                }else{
                    ?>
                <a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
                <?php }
                if(isset($_GET['pag'])){
                    if((($pagina) * $filasmax) < $maxusutabla){
                        ?>
                        <a class="BotonesTeam4" href="Productos_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
                        <?php
                    }else{ ?>
                    <a class="BotonesTeam4" href="#" style="pointer-events: none">Siguiente</a>
                    <?php } ?>
                    <?php
                }else{ ?>
                <a class="BotonesTeam4" href="Productos_tabla.php?pag=2">Siguiente</a>
                <?php } ?>
            </div>
        </div>
    </div>

</body>
</html>
