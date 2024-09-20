<?php
    include('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="../img/logo.png" alt="" width="100px">
            <nav>
                <a href="#">Inventario</a>
                <a href="#">Tabla Gestion</a>
            </nav>
        </div>
        <div class="ContenedorPrincipal">
    <?php
    $filasmax = 7;
    if(isset($_GET['pag'])){
        $pagina = $_GET['pag'];
    }else{
        $pagina = 1;
    }
    if(isset($_POST['btnbuscar'])){
        $buscar = $_POST['txtbuscar'];

        $sqlped = mysqli_query($conn, "SELECT id_pedido, fecha, total FROM pedido WHERE id_pedido = '".$buscar."'");
    }else{
        $sqlped = mysqli_query($conn, "SELECT id_pedido, fecha, total FROM pedido ORDER BY id_pedido ASC LIMIT " . (($pagina - 1) * $filasmax) . "," . $filasmax);
    }
    
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_pedido FROM pedido");

    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_pedido'];

    ?>
        <div class="ContenedorTabla">
            <form method="POST">
                <h1>Lista de Pedidos</h1>
                <div class="ContBuscar">
                    <div style="float: left">
                        <a class="BotonesTeam" href="Pedidos.php">Inicio</a>
                        <input class="BotonesTeam" type="submit" value="Buscar" name="btnbuscar">
                        <input class="CajaTextoBuscar" type="text" name="txtbuscar" placeholder="Buscar pedido" autocomplete="off">
                    </div>
                    <div style="float: right;">
                        <?php echo "<a class='BotonesTeam5' href=\"Agregar_pedido.php?pag=$pagina\">Agregar pedido<a>";?>
                    </div>
                </div>
            </form>
            <table>
                <tr>
                    <td># Pedido</td>
                    <td>Fecha</td>
                    <td>Total</td>
                </tr>

                <?php
                    while ($mostrar = mysqli_fetch_assoc($sqlped)){
                        echo "<tr>";
                        echo "<td>" .$mostrar['id_pedido']."</td>";
                        echo "<td>" .$mostrar['fecha']."</td>";
                        echo "<td>" .$mostrar['total']."</td>";
                        echo "<td style='width:24%'><a class='BotonesTeam1' href=\"Pedidos_ver.php?id_pedido=$mostrar[id_pedido]&pag=$pagina\">&#x1F50D;</a>
                        <a class='BotonesTeam2' href=\"Pedidos_modificar.php?id_pedido=$mostrar[id_pedido]&pag=$pagina\">&#128397;</a>
                        <a class='BotonesTeam3' href=\"Pedidos_eliminar.php?id_pedido=$mostrar[id_pedido]&pag=$pagina\"onClick=\"return confirm('¿Estás seguro de eliminar el pedido $mostrar[id_pedido]?')\">&#10006;</a>
                        </td>";
                    }
                ?>
            </table>
            <div style='text-align: right;'>
                <br>
                <?php
                    echo"Total de pedidos: ".$maxusutabla;
                ?>
            </div>
            <div style='text-align: right;'>
                <br>
            </div>
            <div style='text-align: right;'>
            <?php
                if(isset($_GET['pag'])){
                    if($_GET['pag'] > 1){
            ?>
            <a class="BotonesTeam4" href="Pedidos.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
                        <a class="BotonesTeam4" href="Pedidos.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
                        <?php
                    }else{ ?>
                    <a class="BotonesTeam4" href="#" style="pointer-events: none">Siguiente</a>
                    <?php } ?>
                    <?php
                }else{ ?>
                <a class="BotonesTeam4" href="Pedidos.php?pag=2">Siguiente</a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
