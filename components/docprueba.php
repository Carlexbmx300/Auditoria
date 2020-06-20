<?php
require('../pdf/fdpf/fpdf.php');

class PDF extends FPDF
{
}

$pdf = new PDF();
// First page
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Write(5,"To find out what's new in this tutorial, click ");

$link = $pdf->AddLink();
$pdf->Write(5,$link,$link);

// Second page
$pdf->AddPage();
$link2=$pdf->SetLink($link);
$pdf->write(5,$link2);
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);

$pdf->Output();
?>