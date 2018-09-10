<?php

	include 'plantilla.php';
	require 'conexion.php';

	$query = "SELECT * FROM usuarios WHERE asistencia IS NOT NULL";
	$resultado = $mysqli->query($query);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetXY(20,50);
	$pdf->Cell(70,6,'Usuario', 1,0,'C', 1);
	$pdf->Cell(20,6,'Hora', 1,0,'C', 1);
	$pdf->Cell(30,6,utf8_decode('Último pago'), 1,0,'C', 1);
	$pdf->Cell(20,6,'Plan', 1,1,'C', 1);


	$pdf->SetFont('Arial','',10);
	while($row=$resultado->fetch_assoc())
	{
		$pdf->SetX(20);
		$pdf->Cell(70,6,utf8_decode($row['apellido']).' '.utf8_decode($row['nombre']), 1,0,'C');
		$pdf->Cell(20,6,$row['asistencia'], 1,0,'C');
		$pdf->Cell(30,6,$row['ultimoPago'], 1,0,'C');
		$pdf->Cell(20,6,$row['tipoPago'], 1,1,'C');
	}

	//$pdf->Output('F','C:/Users/David Quintero/Desktop/Reportes diarios/Reporte.pdf');
	$pdf->Output();
?>