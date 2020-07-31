<?php
    include 'plantilla.php';
    require '../Conexion/bd.php';
  
    $consulta = "SELECT idEquipos, idSurcursal, Cedula FROM equipos, sucursal, empleados";
    $resultado = $mysqli->query($consulta);

    $pdf = new Reporte();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(70, 6, 'Equipos ',1,0,'C',1);
    $pdf->Cell(70, 6, 'Surcursal',1,0,'C',1);
    $pdf->Cell(70, 6, 'Empleados',1,0,'C',1);

    $pdf->SetFont('Arial','',10);
    
    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(70,6,$row['idEquipos'],1,0,'C');
		$pdf->Cell(20,6,$row['idSurcursal'],1,0,'C');
		$pdf->Cell(70,6,$row['Cedula'],1,1,'C');
	}
	$pdf->Output();
?>