<?php
require('fpdf.php');

class PDF extends FPDF {
function Header() {
    // $this->SetFont('Arial','B',15);
    // $this->Cell(30,10,'Henkilotiedot');
    // $this->Ln();
}

function Footer() {
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
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
    "About"     =>  $Prof->About,
    "Kielitaito"     =>  $Prof->Kielitaito,
  );
}

$pdf = new PDF('P','mm','A4');
$title = $Profile['Name'];
$pdf->SetTitle($title);
$pdf->AliasNbPages();
$pdf->AddPage();
$ht = 8;

$pdf->SetFont('Arial','B',15);
$reportSubtitle = stripslashes("Henkilötiedot");
$reportSubtitle = iconv('UTF-8', 'windows-1252', $reportSubtitle);
$pdf->Write (10, $reportSubtitle);

$pdf->Ln($ht);
$pdf->SetFont('Arial','i',15);
$Name = stripslashes($Profile['Name']);
$Name = iconv('UTF-8', 'windows-1252', $Name);
$pdf->Cell(0,10,'        Nimi:                    '.$Name);

$pdf->Ln($ht);
$Osoite = stripslashes($Profile['Osoite']);
$Osoite = iconv('UTF-8', 'windows-1252', $Osoite);
$pdf->Cell(0,10,'        Osoite:                 '.$Osoite);
$pdf->Ln($ht);
$Kielitaito = stripslashes($Profile['Kielitaito']);
$Kielitaito = iconv('UTF-8', 'windows-1252', $Kielitaito);
$pdf->Cell(0,10,'        Kielitaito:             '.$Kielitaito);

$pdf->Ln($ht);
$pdf->Cell(0,10,'        Postinumero:       '.$Profile['Posti_Num']);

$pdf->Ln($ht);
$pdf->Cell(0,10,'        Puhelin_num:      '.$Profile['Puh_Num']);

$pdf->Ln($ht);
$pdf->Cell(0,10,'        Sahkoposti:         '.$Profile['Sposti']);

$pdf->Ln(10);
$About = stripslashes($Profile['About']);
$About = iconv('UTF-8', 'windows-1252', $About);
$pdf->MultiCell(0,5,'       Tietoa:');
$pdf->Cell(10);
$pdf->MultiCell(0,5,$About);

if($harrastus) {
$pdf->Ln($ht);
$pdf->SetFont('Arial','B',15);
$pdf->MultiCell(0,5,"Harrastukset");

foreach($harrastus as $Hobby) {
  $pdf->SetFont('Arial','i',15);
  $harrastus = stripslashes($Hobby->harrastus);
  $harrastus = iconv('UTF-8', 'windows-1252', $harrastus);
  $pdf->Cell(0,10,'        Harrastus:            '.$harrastus);
  $pdf->Ln($ht);
  $vapaasana = stripslashes($Hobby->vapaasana);
  $vapaasana = iconv('UTF-8', 'windows-1252', $vapaasana);
  $pdf->Cell(0,10,'        Vapaasana:         '.$vapaasana);
  $pdf->Ln(15);
  }
}
if($koulutus) {
$pdf->Ln($ht);
$pdf->SetFont('Arial','B',15);
$pdf->MultiCell(0,5,"Koulutus");

foreach($koulutus as $Koulu) {
  $pdf->SetFont('Arial','i',15);
  $koulutusnimi = stripslashes($Koulu->koulutusnimi);
  $koulutusnimi = iconv('UTF-8', 'windows-1252', $koulutusnimi);
  $pdf->Cell(0,10,'        Koulutus:             '.$koulutusnimi);
  $pdf->Ln($ht);
  $koulutusaste = stripslashes($Koulu->koulutusaste);
  $koulutusaste = iconv('UTF-8', 'windows-1252', $koulutusaste);
  $pdf->Cell(0,10,'        Koulutusaste:      '.$koulutusaste);
  $pdf->Ln($ht);
  $oppilaitos = stripslashes($Koulu->oppilaitos);
  $oppilaitos = iconv('UTF-8', 'windows-1252', $oppilaitos);
  $pdf->Cell(0,10,'        Oppilaitos:          '.$oppilaitos);
  $pdf->Ln($ht);
  $pdf->Cell(0,10,'        Alkoi:                  '.$Koulu->alkoi);
  $pdf->Ln($ht);
  $pdf->Cell(0,10,'        Loppui:               '.$Koulu->loppui);
  $pdf->Ln($ht);
  $vapaasana = stripslashes($Koulu->vapaasana);
  $vapaasana = iconv('UTF-8', 'windows-1252', $vapaasana);
  $pdf->Cell(0,10,'        Vapaasana:       '.$vapaasana);
  $pdf->Ln(15);
  }
}
if($tyohistoria) {
$pdf->Ln($ht);
$pdf->SetFont('Arial','B',15);
$Tyohistoria = stripslashes("Työhistoria");
$Tyohistoria = iconv('UTF-8', 'windows-1252', $Tyohistoria);
$pdf->MultiCell(0,5,$Tyohistoria);

foreach($tyohistoria as $Tyo) {
  $pdf->SetFont('Arial','i',15);
  $tyopaikka = stripslashes($Tyo->tyopaikka);
  $tyopaikka = iconv('UTF-8', 'windows-1252', $tyopaikka);
  $pdf->Cell(0,10,'        Tyopaikka:         '.$tyopaikka);
  $pdf->Ln($ht);
  $tehtava = stripslashes($Tyo->tehtava);
  $tehtava = iconv('UTF-8', 'windows-1252', $tehtava);
  $pdf->Cell(0,10,'        Tehtava:            '.$tehtava);
  $pdf->Ln($ht);
  $pdf->Cell(0,10,'        Alkoi:                 '.$Tyo->alkoi);
  $pdf->Ln($ht);
  $pdf->Cell(0,10,'        Loppui:              '.$Tyo->loppui);
  $pdf->Ln($ht);
  $vapaasana = stripslashes($Tyo->kuvaus);
  $vapaasana = iconv('UTF-8', 'windows-1252', $vapaasana);
  $pdf->Cell(0,10,'        Vapaasana:      '.$vapaasana);
  $pdf->Ln(15);
  }
}
if($kortit) {
$pdf->Ln($ht);
$pdf->SetFont('Arial','B',15);
$pdf->MultiCell(0,5,"Kortit");

foreach($kortit as $KT) {
  $pdf->SetFont('Arial','i',15);
  $kortti = stripslashes($KT->kortti);
  $kortti = iconv('UTF-8', 'windows-1252', $kortti);
  $pdf->Cell(0,10,'        Kortti:                  '.$kortti."                         Voimassaoloaika:".$KT->loppuu);
  $pdf->Ln($ht);
  $vapaasana = stripslashes($KT->vapaasana);
  $vapaasana = iconv('UTF-8', 'windows-1252', $vapaasana);
  $pdf->Cell(0,10,'        Vapaasana:        '.$vapaasana);
  $pdf->Ln(15);
  }
}


$pdf->Output();
?>
