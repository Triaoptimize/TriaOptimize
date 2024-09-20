<?php
include('conexion.php');

$correo = $_POST["txtcorreo"];
$pass = $_POST["txtpassword"];

$buscandousu = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '".$correo."'");
$nr = mysqli_num_rows($buscandousu);
$mostrar = mysqli_fetch_array($buscandousu);

if(($nr == 1) && (password_verify($pass,$mostrar['pass']))){
    session_start();
    $_SESSION['usuarioingresando']=$correo;
    header("Location: inicio_jefe.php");
}
else if($nr == 0){
    echo "<script> alert('Usuario no existe');window.location ='inicio_sesion.php'</script>";
}

?>
