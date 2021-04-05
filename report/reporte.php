<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT demandante.dni, demandante.nombre, curriculum.id_cv, curriculum.especialidad, curriculum.universidad, experiencia.puesto, experiencia.nom_empresa FROM demandante INNER JOIN curriculum INNER JOIN experiencia WHERE demandante.dni = experiencia.dni AND demandante.id_cv = curriculum.id_cv";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'DNI',1,0,'C',1);
	$pdf->Cell(25,6,'CV',1,0,'C',1);
	$pdf->Cell(50,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(40,6,'ESPECIALIDAD',1,0,'C',1);
	$pdf->Cell(50,6,'UNIVERSIDAD',1,0,'C',1);
	$pdf->Cell(40,6,'PUESTO',1,0,'C',1);
	$pdf->Cell(45,6,'EMPRESA',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,($row['dni']),1,0,'C');
		$pdf->Cell(25,6,$row['id_cv'],1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['nombre']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['especialidad']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['universidad']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['puesto']),1,0,'C');
		$pdf->Cell(45,6,utf8_decode($row['nom_empresa']),1,1,'C');
	}
	$pdf->Output();
?>