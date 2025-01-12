<?php 
   if(isset($_GET['btnCagaCompPdf'])){
      $numero_cita = $_GET['txtNumero_Cita'];
      $ID_Paciente=$_GET['txtId_Paciente'];
      $nombres_completos=$_GET['txtNombres_Completo'];
      $fecha_creacion=$_GET['txtFecha_Creacion'];
      $monto_pagado=$_GET['txtMonto_Pagado'];
   require './Reportes/fpdf.php';
  // Crear una instancia de la clase FPDF
$pdf = new FPDF();

// Agregar una página
$pdf->AddPage();

// Establecer fuente
$pdf->SetFont('Arial', 'B', 16);

// Título
$pdf->Cell(0, 10, 'Comprobante de Pago', 0, 1, 'C');
$pdf->Cell(0, 10, 'Datos de la Boleta', 0, 1, 'C');
$pdf->Ln(10);

// Datos del comprobante
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Numero de Cita: ', 0, 0);
$pdf->Cell(0, 10, $numero_cita, 0, 1);
$pdf->Cell(50, 10, 'ID del Paciente: ', 0, 0);
$pdf->Cell(0, 10, $ID_Paciente, 0, 1);
$pdf->Cell(50, 10, 'Nombres Completo: ', 0, 0);
$pdf->Cell(0, 10, $nombres_completos, 0, 1);
$pdf->Cell(50, 10, 'Fecha de Creacion: ', 0, 0);
$pdf->Cell(0, 10, $fecha_creacion, 0, 1);
$pdf->Cell(50, 10, 'Monto Pagado: ', 0, 0);
$pdf->Cell(0, 10, $monto_pagado, 0, 1);
$pdf->Cell(50, 10, 'Metodo de Pago: ', 0, 0);
$pdf->Cell(0, 10, "Tarjeta Credito", 0, 1);

// Salida del PDF
$pdf->Output('D', 'Comprobante_de_Pago.pdf');
   }else{
      header('location ./Error.php');
   }
   ?>