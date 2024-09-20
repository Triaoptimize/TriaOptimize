<?php
include("conexion.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM platillos WHERE id_plat = '$id'");

header("Location:gestion_platillo.php?pag=$pagina");

?>
