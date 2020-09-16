<?php
    include 'plantilla.php';
    require '../Conexion/bd.php';
    require '../Conexion/Conexion.php';

    $id = $_GET['id'];
    $id2 = $_GET['id2'];
    $id3 = $_GET['id3'];
    $dia = $_GET['dia'];

    if ($dia === 'Preventivo') {
        $consulta = "SELECT * FROM equipos, sucursal, empleados, preventivo, factura WHERE idEquipos = '$id' AND idSucursal = '$id2' AND Cedula = '$id3'AND idEquipo = '$id' AND id_equipos_f = '$id'";
        $resultado = $mysqli->query($consulta);
    }else if($dia === 'Correctivo'){
        $consulta = "SELECT * FROM equipos, sucursal, empleados, correctivo, factura WHERE idEquipos = '$id' AND idSucursal = '$id2' AND Cedula = '$id3' AND id_equipos = '$id' AND id_equipos_f = '$id'";
        $resultado = $mysqli->query($consulta);
    }
    if($resultado === TRUE){
        print_r('Paso consulta');
    }

    $pdf = new Reporte();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,232);

    $pdf->SetFont('Arial','',10);
    
    while($row = $resultado->fetch_assoc()){
        $pdf->Cell(80,6,'CLIENTE: '.$row['NombreSucursal'],1,0,'C');
		$pdf->Cell(30,6,'PDV: ',1,0,'C');
        $pdf->Cell(80,6,'ORDEN DE SERVICIO No: '.$row['idEquipos'],1,1,'C');
        $pdf->Cell(95,6,'DIRECCION: '.$row['Direccion'],1,0,'C'); 
        $pdf->Cell(95,6,'FECHA: '.$row['FechaIngreso'],1,1,'C');
        $pdf->Cell(90,6,'TELEFONO: '.$row['Telefono'],1,0,'C');
        $pdf->Cell(50,6,'VOLTAJE: '.$row['Voltaje'],1,0,'C');
        $pdf->Cell(50,6,'TIPO DE GAS: '.$row['TipoGas'],1,1,'C');

        $pdf->Ln();

        $pdf->Cell(70,6,'MARCA: '.$row['Marca'],1,0,'C'); 
        $pdf->Cell(50,6,'EQUIPO: '.$row['NombreEquipos'],1,0,'C'); 
        $pdf->Cell(70,6,'MODELO: '.$row['Modelo'],1,1,'C');

        $pdf->Cell(105,6,'SERIE: '.$row['NumeroSerie'],1,0,'C'); 
        $pdf->Cell(85,6,'DIAGNOSTICO: '.$row['Diagnostico'],1,1,'C');

        $pdf->Ln();
        $pdf->Cell(190,70,'DESCRIPCION: '.$row['Descripcion'],1,1,'l');
        $pdf->Ln(5);
        $pdf->Cell(190,40,'OBSERVACIONES: '.$row['Observaciones'],1,1,'L');
        
        // $pdf->Ln(2);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetTextColor(255,0,0);
        $pdf->Cell(190,20, 'MATERIALES Y REPUESTOS', 0, 1, 'C');
        $pdf->SetTextColor(0,0,0);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(190,30, '', 1,1,'C');
        $pdf->Cell(95,6,'COSTOS DE REPUESTOS: '.$row['repuestos'],1,0,'C'); 
        $pdf->Cell(95,6,'COSTOS DE MANO DE OBRA: '.$row['mano_obra'],1,1,'C');
        $pdf->Ln(4);
        $pdf->MultiCell(60,6,'HORA DEL SERVICIO'.chr(10).'HORA DE ENTRADA:'.$row['FechaIngreso'].chr(10).'HORA DE SALIDA: '.$row['FechaSalida'],1,'C',0);
        $pdf->SetY(257);
        $pdf->Setx(70);
        $pdf->MultiCell(65,9,'___________________________'.chr(10).'NOMBRE DE CLIENTE Y C.C.',1,'C',0);
        $pdf->SetY(257);
        $pdf->Setx(135);
        $pdf->MultiCell(65,9,'____________________'.chr(10).'NOMBRE TECNICO',1,'C');
    }


	$pdf->Output();
?>