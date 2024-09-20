<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@ a tu sesión</title>
    <link rel="stylesheet" href="../css/inicio_jefe.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    
    <header class="Arriba">
        <img src="../img/Logo.png" alt="">
        <h1>BIENVENID@</h1>
        <a href="perfil_jefe.php"><img  class="icon" src="../img/descarga.png" alt=""></a>  
    </header>
    <div class="seleccion">
        <div  class="cuadro">
            <img src="../img/platillo.png" alt="" width="250px" height="230px">
            <a href="gestion_platillo.php"><button >Gestionar Platillos</button></a>
        </div>
        <div class="cuadro">
            <img  src="../img/pedido.png" alt="" width="240px" height="220px">
           <a href="Pedidos.php"><button>Historial de pedidos</button></a> 
        </div>
        <div class="cuadro">
            <img src="../img/factura.png" alt=""width="250px" height="230px">
         <a href="factura.php"><button>Gestionar factura</button></a>
        </div>
        <div class="cuadro">
            <img src="../img/gestionarp.png" alt=""width="250px" height="230px">
         <a href="perfil_jefe.php"><button>Gestionar perfil</button></a>
        </div> 
        <div class="cuadro">
            <img src="../img/menu.png" alt=""width="250px" height="230px">
         <a href="Vista_menu.php"><button>Gestionar menú</button></a>
        </div>
        <div class="cuadro">
            <img src="../img/historial.png" alt=""width="230px" height="230px">
         <a href="../Php/Productos_tabla.php"><button> Gestionar Inventario</button></a>
        </div>
    </div>
    <button class="cerrar"><a href="index.php">Cerar sesion</a></button>
</body>
</html>
