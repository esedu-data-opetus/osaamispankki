<?php
require('fpdf.php');

class PDF extends FPDF {
// Page header
function Header() {
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

foreach($Prof_Info as $Prof) {
  $Profile = array(
    "Name"      =>  $Prof->F_Name." ".$Prof->L_Name,
    "Sposti"    =>  $Prof->Sposti,
    "Osoite"    =>  $Prof->Osoite,
    "Posti_Num" =>  $Prof->Posti_Num,
    "Puh_Num"   =>  $Prof->Puh_Num,
  );
}
// Instanciation of inherited class
$pdf = new PDF();
$title = $Profile['Name'];
$pdf->SetTitle($title);
$pdf->AliasNbPages();
$pdf->AddPage();
$ht = 10;
$pdf->SetFont('Arial','i',15);
$pdf->Cell(0,10,'        Nimi:                    '.$Profile['Name']);
$pdf->Ln($ht);
$pdf->Cell(0,10,'        Osoite:                 '.$Profile['Osoite']);
$pdf->Ln($ht);
$pdf->Cell(0,10,'        Postinumero:       '.$Profile['Posti_Num']);
$pdf->Ln($ht);
$pdf->Cell(0,10,'        Puhelin_num:      '.$Profile['Puh_Num']);
$pdf->Ln($ht);
$pdf->Cell(0,10,'        Sahkoposti:         '.$Profile['Sposti']);
$pdf->Output();
?>
