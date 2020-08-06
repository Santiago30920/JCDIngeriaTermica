<?php
    include 'plantilla.php';
    require '../Conexion/bd.php';
    require '../Conexion/Conexion.php';

    $id = $_GET['id'];
    $id2 = $_GET['id2'];
    $id3 = $_GET['id3'];

    $consulta = "SELECT * FROM equipos, sucursal, empleados WHERE idEquipos = '$id' AND idSucursal = '$id2' AND Cedula = '$id3'";
    $resultado = $mysqli->query($consulta);
    if($resultado === TRUE){
        print_r('Paso consulta');
    }

    $pdf = new Reporte();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(70, 6, 'Equipos ',1,0,'C',1);
    $pdf->Cell(20, 6, 'ID',1,0,'C',1);
    $pdf->Cell(70, 6, 'Empleados',1,1,'C',1);

    $pdf->SetFont('Arial','',10);
    
    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(70,6,$row['idEquipos'],1,0,'C');
		$pdf->Cell(20,6,$row['idSucursal'],1,0,'C');
		$pdf->Cell(70,6,$row['Cedula'],1,1,'C');
	}
	$pdf->Output();
?>