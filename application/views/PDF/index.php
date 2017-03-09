<?php
require('fpdf.php');

foreach($Prof_Info as $User) {
    $name = $User->F_Name." ".$User->L_Name;
    $email = "Sahkoposti: ".$User->Sposti;
    $Osoite = "Osoite: ".$User->Osoite;
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$name.$email.$Osoite);
$pdf->Output();
?>
