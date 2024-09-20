<?php
include('conexion.php');

$id = $_POST["txtid1"];
$nombre = $_POST["txtnombre1"];
$apellidos = $_POST["txtapellidos1"];
$correo = $_POST["txtcorreo1"];
$pass = $_POST["txtpassword1"];
$rol = $_POST["txtrol1"];

$pass_fuerte = password_hash($pass, PASSWORD_DEFAULT);
$insertarusu = mysqli_query($conn, "INSERT INTO usuarios(id_usu,nombres,apellidos,correo,pass,rol) VALUES('$id', '$nombre', '$apellidos', '$correo', '$pass_fuerte', '$rol')");
    if(!$insertarusu){
        echo "<script> alert('Correo duplicado, intenta con otro');window.location ='registrarse.php'</script>";
    }else{
        echo "<script> alert('Usuario registrado con exito: $nombre');window.location ='registrado.php'</script>";
    }
?>
