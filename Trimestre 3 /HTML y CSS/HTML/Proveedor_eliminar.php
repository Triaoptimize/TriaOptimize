<?php
include("conexion.php");
include("Barra_central.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM proveedor WHERE id_proveedor = '$id'");

header("Location:Proveedor_ver.php?pag=$pagina");

?>
