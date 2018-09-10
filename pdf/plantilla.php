<?php
date_default_timezone_set('America/Mexico_City');
require'fpdf/fpdf.php';

/**
 * 
 */
class PDF extends FPDF
{
	
	function Header()
	{
		$fecha = date("d/m/y");
		$this->Image('images/zonasport.jpg', 20, 12.5, 30);
		$this->SetFont('Arial', 'B', 15);
		$this->Cell(30);
		$this->Cell(120, 30, 'Reporte de usuarios del '.$fecha, 0, 0, 'C');
		$this->Ln(20);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial', 'I', 8);
		$this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0,0,'C');
	}
}
?>