<?php
include("conexion.php");

$usuarioingresado = $_SESSION['usuarioingresado'];
$pagina = $_GET['pag'];
$id = $_GET['id_pedido'];

mysqli_query($conn, "DELETE FROM pedido WHERE id_pedido='$id'");

header("Location:Pedidos.php?pag=$pagina");

?>
