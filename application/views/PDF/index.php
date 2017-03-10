<?php
foreach($Prof_Info as $Prof) {
  $Profile = array(
    "Name"    =>  $Prof->F_Name." ".$Prof->L_Name,
    "Sposti"  =>  $Prof->Sposti,
    "Osoite"  =>  $Prof->Osoite,
  );
}
require('fpdf.php');

class PDF extends FPDF {
// Page header
function Header() {
    // Logo
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Title
    $this->Cell(30,10,'Henkilotiedot');
    // Line break
    $this->Ln();
}

// Page footer
function Footer() {
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$title = $Profile['Name'];
$pdf->SetTitle($title);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','i',15);
$pdf->Cell(0,10,'        Nimi:                    '.$Profile['Name']);
$pdf->Ln(6);
$pdf->Cell(0,10,'        Osoite:                 '.$Profile['Osoite']);
$pdf->Ln(6);
$pdf->Cell(0,10,'        Sahkoposti:         '.$Profile['Sposti']);
$pdf->Output();
?>
