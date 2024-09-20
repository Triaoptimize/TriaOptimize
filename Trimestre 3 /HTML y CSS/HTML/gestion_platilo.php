<?php
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Platillos</title>
    <link rel="stylesheet" href="../css/gestion_platillo.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="header">
        <button class="top-bar-button" onClick="window.location.href='inicio_jefe.php';">Regresar</button>
        <button class="top-bar-button" onclick="window.location.href='agregar_platillo.php';">Agregar platillo</button>
        <div class="search-bar">
            <input type="text" placeholder="Busca platillo" class="search-input">
            <button class="search-button">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAASNJREFUSEvVldENwjAMRM0mMAkwCTAJMAlsApsAkwAP+VAUEofS9oNIVVQ18TtfHHdiI4/JyPEtAmzNbOHP9TmfzYx530VUCUDQg5lNK4GAbBzYZOUAgp98F4pRywyMbyufWbL8BpIDLh7s6CpLCrFu53bNWimkAG1EMeqiQZZkBCg8kxSA72tXTgbRkJVNMSlA9pA2BxkNzoT1rAtt+hUA/O4KwruUfpSv31QHVmJpVAwvfgrQpqavXsqdDxlfyYI5qg4VQ9P/PAPe04umtkBGDMBqH7w37SkBFEiZlCoJMMF12bgH1bKuVYBawzxpDWp4ulgqCkRULe3TrlM7q5A+AIKqvcjKj0z6ApqQIQA5hH/F+9CHAghyyytqSECxOf4/4AEG20QZB3f8vAAAAABJRU5ErkJggg=="/>
            </button>
        </div>
    </div>

    <div class="table-container">
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Id platillo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Categoria</th>
                    <th>Opciones</th> 
                </tr>
            </thead>
            <tbody>
            <?php

$pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;


$resultado = mysqli_query($conn, "SELECT id_plat , nombre, precio, descripcion, id_categoria  FROM platillos");


if ($resultado) {
    while ($mostrar = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($mostrar['id_plat']) . "</td>";
        echo "<td>" . htmlspecialchars($mostrar['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($mostrar['precio']) . "</td>";
        echo "<td>" . htmlspecialchars($mostrar['descripcion']) . "</td>";
        echo "<td>" . htmlspecialchars($mostrar['id_categoria']) . "</td>";
        echo "<td style='width:10%;'> 
        <div class='BotonesContainer'>
            <a class='BotonesTeam1' href=\"ver_platillo.php?id=$mostrar[id_plat]&pag=$pagina\">
                <svg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 795 614'>
                    <path fill='#000000' d='M397.25 278c38 0 69 31 69 69s-31 68-69 68s-68-30-68-68s30-69 68-69m0-170c226 0 389 212 389 212c11 14 11 39 0 53c0 0-163 212-389 212s-389-212-389-212c-11-14-11-39 0-53c0 0 163-212 389-212m0 410c94 0 171-77 171-171s-77-171-171-171s-171 77-171 171s77 171 171 171'/>
                </svg>
            </a>
            <a class='BotonesTeam2' href=\"editar_platillo.php?id=$mostrar[id_plat]&pag=$pagina\">
                <svg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 24 24'>
                    <path fill='#ffff' d='M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h6.525q.5 0 .75.313t.25.687t-.262.688T11.5 5H5v14h14v-6.525q0-.5.313-.75t.687-.25t.688.25t.312.75V19q0 .825-.587 1.413T19 21zm4-7v-2.425q0-.4.15-.763t.425-.637l8.6-8.6q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4t-.137.738t-.438.662l-8.6 8.6q-.275.275-.637.438t-.763.162H10q-.425 0-.712-.288T9 14m12.025-9.6l-1.4-1.4zM11 13h1.4l5.8-5.8l-.7-.7l-.725-.7L11 11.575zm6.5-6.5l-.725-.7zl.7.7z'/>
                </svg>
            </a>
            <a class='BotonesTeam3' href=\"eliminar_platillo.php?id=$mostrar[id_plat]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar el id=$mostrar[nombre]?')\">
                <svg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 24 24'>
                    <path fill='#ff3333' d='M3 6v16q0 .825.588 1.413T5 24h14q.825 0 1.413-.587T21 22V6H3zm5 3q0 .425.288.713T9 10h6q.425 0 .713-.288T16 9t-.288-.713T15 8H9q-.425 0-.713.288T8 9zM3 4h5l.5-1h7L17 4h5q.425 0 .713.288T23 5t-.288.713T22 6H2q-.425 0-.713-.288T1 5t.288-.713T2 4z'/>
                </svg>
            </a>
        </div>
    </td>";
    
    }
} else {
    echo "<tr><td colspan='6'>No se encontraron platillos</td></tr>";
}

?>
            </tbody>
        </table>
    </div>
</body>
</html>
