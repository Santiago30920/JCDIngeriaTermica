<?php
    require '../fpdf/fpdf.php';

    class Reporte extends FPDF{

        function Header(){
            $this->Image('../style/log/logo1.png', 5, 5, 30);
            $this->SetFont('Arial','B',16);
            $this->Cell(30);
            $this->Cell(120,40, 'Reporte de servicios', 0, 0, 'C');
            $this->Ln(30);
        }
        
        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');
        }
        
    }

?>