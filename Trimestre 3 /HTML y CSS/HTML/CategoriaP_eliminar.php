<?php
include("conexion.php");

$usuarioingresado = $_SESSION['usuarioingresado'];
$pagina = $_GET['pag'];
$id = $_GET['categoria'];

mysqli_query($conn, "DELETE FROM categoria_productos WHERE id_cat='$id'");

header("Location:CategoriaP_tabla.php?pag=$pagina");

?>

