<?php
include("conexion.php");
include("Barra_central.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM producto WHERE id_producto= '$id'");

header("Location:Productos_tabla.php?pag=$pagina");

?>
