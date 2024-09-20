<?php
include("conexion.php");
require '../vendor/autoload.php'; 

$id = isset($_GET['id_factura']) ? $_GET['id_factura'] : '';

$querybuscar = mysqli_prepare($conn, "SELECT id_factura, Nombre, Celular, Correo, Descripcion, Cantidad, Valor FROM factura_venta WHERE id_factura = ?");
mysqli_stmt_bind_param($querybuscar, "i", $id);
mysqli_stmt_execute($querybuscar);
$resultado = mysqli_stmt_get_result($querybuscar);

if ($mostrar = mysqli_fetch_assoc($resultado)) {
    $proid = htmlspecialchars($mostrar['id_factura']);
    $pronom = htmlspecialchars($mostrar['Nombre']);
    $procel = htmlspecialchars($mostrar['Celular']);
    $procorr = htmlspecialchars($mostrar['Correo']);
    $prodes = htmlspecialchars($mostrar['Descripcion']);
    $procant = htmlspecialchars($mostrar['Cantidad']);
    $proval = htmlspecialchars($mostrar['Valor']);
} else {
    die("Factura no encontrada");
}

mysqli_close($conn);

$pdf = new TCPDF('P', 'mm', 'A6', true, 'UTF-8', false);
$pdf->SetMargins(10, 10, 10);  
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 10);  

$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Triü', 0, 1, 'C');

$pdf->Ln(5);

$pdf->SetFont('helvetica', '', 10);


$pdf->MultiCell(0, 8, 'Factura N°: ' . $proid, 0, 'L', false, 1);
$pdf->MultiCell(0, 8, 'Nombre: ' . $pronom, 0, 'L', false, 1);
$pdf->MultiCell(0, 8, 'Celular: ' . $procel, 0, 'L', false, 1);
$pdf->MultiCell(0, 8, 'Correo: ' . $procorr, 0, 'L', false, 1);
$pdf->MultiCell(0, 8, 'Descripción: ' . $prodes, 0, 'L', false, 1);
$pdf->MultiCell(0, 8, 'Cantidad: ' . $procant, 0, 'L', false, 1);
$pdf->MultiCell(0, 8, 'Valor: $' . number_format($proval, 2, ',', '.'), 0, 'L', false, 1);

$pdf->Ln(5);

$pdf->Output('factura_'.$proid.'.pdf', 'D');
?>
