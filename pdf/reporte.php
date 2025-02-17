<?php
include 'plantilla.php';
require '../Conexion/Conexion.php';
require '../phpmailer/PHPMailerAutoload.php';

$id = $_GET['id'];
$id2 = $_GET['id2'];
$id3 = $_GET['id3'];
$dia = $_GET['dia'];

if ($dia === 'Preventivo') {
    $consulta = $bd->prepare("SELECT * FROM equipos, sucursal, empleados, preventivo WHERE idEquipos = ? AND idSucursal = ? AND Cedula = ? AND idEquipo = ? LIMIT 1");
    $servicio = $consulta->execute([$id, $id2, $id3, $id]);
    $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
} else if ($dia === 'Correctivo') {
    $consulta = $bd->prepare("SELECT * FROM equipos, sucursal, empleados, correctivo WHERE idEquipos = ? AND idSucursal = ? AND Cedula = ? AND id_equipos = ? LIMIT 1");
    $servicio = $consulta->execute([$id, $id2, $id3, $id]);
    $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
}


$pdf = new Reporte();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(232, 232, 232);

$pdf->SetFont('Arial', '', 10);

foreach ($resultado as $row) {
    $pdf->Cell(80, 6, 'CLIENTE: ' . $row->NombreSucursal, 1, 0, 'C');
    $pdf->Cell(30, 6, 'PDV: ', 1, 0, 'C');
    $pdf->Cell(80, 6, 'ORDEN DE SERVICIO No: ' . $row->idEquipos, 1, 1, 'C');
    $pdf->Cell(95, 6, 'DIRECCION: ' . $row->Direccion, 1, 0, 'C');
    $pdf->Cell(95, 6, 'FECHA: ' . $row->FechaIngreso, 1, 1, 'C');
    $pdf->Cell(90, 6, 'TELEFONO: ' . $row->Telefono, 1, 0, 'C');
    $pdf->Cell(50, 6, 'VOLTAJE: ' . $row->Voltaje, 1, 0, 'C');
    $pdf->Cell(50, 6, 'TIPO DE GAS: ' . $row->TipoGas, 1, 1, 'C');
    
    $pdf->Ln();

    $pdf->Cell(70, 6, 'MARCA: ' . $row->Marca, 1, 0, 'C');
    $pdf->Cell(50, 6, 'EQUIPO: ' . $row->NombreEquipos, 1, 0, 'C');
    $pdf->Cell(70, 6, 'MODELO: ' . $row->Modelo, 1, 1, 'C');

    $pdf->Cell(105, 6, 'SERIE: ' . $row->NumeroSerie, 1, 0, 'C');
    $pdf->Cell(85, 6, 'DIAGNOSTICO: ' . $row->Diagnostico, 1, 1, 'C');

    $pdf->Ln();
    $pdf->Cell(190, 70, 'DESCRIPCION: ' . $row->Descripcion, 1, 1, 'l');
    $pdf->Ln(5);
    $pdf->Cell(190, 40, 'OBSERVACIONES: ' . $row->Observaciones, 1, 1, 'L');
    
    // $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(190, 20, 'MATERIALES Y REPUESTOS', 0, 1, 'C');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(190, 30, '', 1, 1, 'C');

    $consulta1 = $bd->prepare("SELECT * FROM factura WHERE id_equipos_f = ? LIMIT 1");
    $servicio1 = $consulta1->execute([$id]);
    $factura = $consulta1->fetchAll(PDO::FETCH_OBJ);
    
    if ($factura != null) {
        foreach ($factura as $row1) { 
            $pdf->Cell(95, 6, 'COSTOS DE REPUESTOS: ' . $row1->repuestos, 1, 0, 'C');
            $pdf->Cell(95, 6, 'COSTOS DE MANO DE OBRA: ' . $row1->mano_obra, 1, 1, 'C');
            $pdf->Ln(4);
            $pdf->MultiCell(60, 6, 'HORA DEL SERVICIO' . chr(10) . 'HORA DE ENTRADA:' . $row->FechaIngreso . chr(10) . 'HORA DE SALIDA: ' . $row->FechaSalida, 1, 'C', 0);
            $pdf->SetY(257);
            $pdf->Setx(70);
            $pdf->MultiCell(65, 9, '___________________________' . chr(10) . 'NOMBRE DE CLIENTE Y C.C.', 1, 'C', 0);
            $pdf->SetY(257);
            $pdf->Setx(135);
            $pdf->MultiCell(65, 9, '____________________' . chr(10) . 'NOMBRE TECNICO', 1, 'C');
            //$doc = $pdf->Output('','S');
            $pdf->Output();
        }
    } else {
        $pdf->Ln(10);
        $pdf->MultiCell(60, 6, 'HORA DEL SERVICIO' . chr(10) . 'HORA DE ENTRADA:' . $row->FechaIngreso . chr(10) . 'HORA DE SALIDA: ' . $row->FechaSalida, 1, 'C', 0);
        $pdf->SetY(257);
        $pdf->Setx(70);
        $pdf->MultiCell(65, 9, '___________________________' . chr(10) . 'NOMBRE DE CLIENTE Y C.C.', 1, 'C', 0);
        $pdf->SetY(257);
        $pdf->Setx(135);
        $pdf->MultiCell(65, 9, '____________________' . chr(10) . 'NOMBRE TECNICO', 1, 'C');
        //$doc = $pdf->Output('','S');
        $pdf->Output();
    }
}
?>