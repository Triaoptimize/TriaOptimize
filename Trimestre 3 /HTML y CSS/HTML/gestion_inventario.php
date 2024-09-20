<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="../css/gestion_inventario.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    <div class="header">
        <button class="top-bar-button">Regresar</button>
        <button class="top-bar-button" onclick="window.location.href='Agregar_platillo.php';">Agregar platillo</button>
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
                    <th>Nombre</th>
                    <th>Valor</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Foto</th>
                    <th>Editar</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ensalada Mediterránea</td>
                    <td>$35,000COP</td>
                    <td>Entrada</td>
                    <td>Hola</td>
                    <td><img src="../img/1.jpg" alt="Ensalada Mediterránea"></td>
                    <td>
                        <button class="edit-button"  onclick="window.location.href='editar_platillo.php';">
                            <img src="imagenes/editar.jpg" alt="Editar">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Pollo a la Parrilla con Salsa de Mango</td>
                    <td>$59,000COP</td>
                    <td>Plato Principal</td>
                    <td>Hola</td>
                    <td><img src="../img/2.jpg" alt="Pollo a la Parrilla"></td>
                    <td>
                        <button class="edit-button" onclick="window.location.href='editar_platillo.php';">
                            <img src="imagenes/editar.jpg" alt="Editar">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Tacos de Pescado</td>
                    <td>$49,000COP</td>
                    <td>Plato Principal</td>
                    <td>Hola</td>
                    <td><img src="../img/3.jpg" alt="Tacos de Pescado"></td>
                    <td>
                        <button class="edit-button" onclick="window.location.href='editar_platillo.php';">
                            <img src="imagenes/editar.jpg" alt="Editar">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Pastel de Chocolate Sin Harina</td>
                    <td>$26,000COP</td>
                    <td>Postre</td>
                    <td>Hola</td>
                    <td><img src="../img/4.jpg" alt="Pastel de Chocolate"></td>
                    <td>
                        <button class="edit-button" onclick="window.location.href='editar_platillo.php';">
                            <img src="imagenes/editar.jpg" alt="Editar">
                        </button>
                    </td>                       
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
