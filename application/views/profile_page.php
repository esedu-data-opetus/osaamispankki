
<br>
<div class="panel panel-default">
<div class="panel-heading">
<h1>Oma profiili</h1>
<?php foreach($User_Info as $User) : ?>
  <p>Tervetuloa <?php echo $User->F_Name; ?>!</p>
<?php endforeach; ?>
</div>

<div class="panel-body">
<?php foreach($User_Info as $User) : ?>
  <img src="<?php echo base_url()."/images/profiili/"; echo $User->Prof_Pic; ?>" class="img-responsive img-thumbnail" title="<?php echo $User->Prof_Pic; ?>" height="200" width="200">
<?php endforeach; ?>

<!-- <div style="margin-top: 15px;">
<?php
  echo form_open_multipart('Upload_controller/do_upload');
  echo "<input type='file' id='uploadBox' name='userfile' size='20' class=''/>";
  echo '<br>';
  echo "<input type='submit' id='nappi' name='submit' value='Lataa' class='btn btn-success' disabled/> ";
  echo "</form>";
?>
</div> -->
</div>
</div>

<div style="position:relative; margin-left:240px; margin-top:-235px;">
<?php foreach($User_Info as $User) : ?>
  <p>Nimi: <?php echo $User->F_Name." ".$User->L_Name; ?></p>

  <p>Sähköposti: <?php echo $User->Own_Email; ?></p>

  <p>Osoite: <?php echo $User->Osoite; ?></p>

  <p>Postinumero: <?php echo $User->Posti_Num; ?></p>

  <p>Puhelinnumero: <?php echo $User->Puh_Num; ?></p>

  <p>Kuvaus: <?php echo $User->About; ?></p>
<?php endforeach; ?>
<a href="<?php echo base_url(); ?>profile/edit" class="btn btn-primary" style="margin-left: 5px;"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></a><br><br>
</div>
<div style="position:relative; margin-left:20px; margin-top:50px;">

<!-- <div class="panel panel-primary">
  <div class=panel-heading>
    <h3 class=panel-title>Panel title</h3>
  </div>
  <div class=panel-body> Panel content</div>
</div> -->

<div class="row">
<div class="col-md-6 col-xs-8">
<div id="tyohistoria">
<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Harrastukset</p>
<a href="<?php echo base_url() ?>profile/prototype" class="btn btn-success glyphicon glyphicon-plus"></a>
<br>
<br>
<?php if(isset($kokemus)) : ?>
<table class="table" border="1">
<thead>
  <tr>
    <th>Harrastus</th>
    <th>Vapaa sana</th>
    <th>Settings</th>
  </tr>
</thead>
<tbody>
<?php foreach($kokemus as $hobby) : ?>
  <?php if ($hobby->Aihe == 'Harrastus') : ?>
  <tr>
    <td><p><?php echo $hobby->A_sr1; ?></p></td>
    <td><p><?php echo $hobby->Mielipide; ?></p></td>
    <td>
      <a href="<?php echo base_url(); ?>profile/edit_harrastukset/1" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
      <a class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </tr>
<?php endif; ?>
<?php endforeach; ?>
</tbody>
</table>
<?php else : ?>
  <p style='color:red;font-weight:bold;'>Harrastuksia ei ole lisätty</p>
<?php endif; ?>
</div>
</div>
</div>
</br>
<?php
//Tyohistoria
echo '<div class="row">';
echo '<div class="col-md-6 col-xs-8">';
echo '<div id="tyohistoria">';
echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Työhistoria</p><a href="'.base_url().'sivu/tyohistoria_lisaus" class="btn btn-success glyphicon glyphicon-plus" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

$tyohistoria = "";

$tyohistoria .= '<table class="table" border="1">';
$tyohistoria .= '<thead><tr><th>Työpaikka</th><th>Tehtävä</th><th>Alkoi</th><th>Loppui</th><th>Kuvaus</th><th style="width:140px"></th></tr></thead>';


$query = $this->db->query("SELECT id, tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

$bFound = false;

foreach ($query->result() as $row)
{
  $id 	   = "$row->id";
  $tyopaikka = "$row->tyopaikka";
  $tehtava   = "$row->tehtava";
  $alkoi     = "$row->alkoi";
  $loppui    = "$row->loppui";
  $kuvaus    = "$row->kuvaus";

  if($tyopaikka != NULL)
  {
    $bFound = true;

    $tyohistoria .= '<tr>';
    $tyohistoria .= '<td>'.$tyopaikka.'</td>';
    $tyohistoria .= '<td>'.$tehtava.'</td>';
    $tyohistoria .= '<td>'.$alkoi.'</td>';
    $tyohistoria .= '<td>'.$loppui.'</td>';
    $tyohistoria .= '<td style="max-width:500px;word-wrap: break-word;">'.$kuvaus.'</td>';
    $tyohistoria .= '<td><a href="'.base_url().'sivu/edit_tyohistoria/'.$id.'" class="btn btn-primary"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></a>';//Muokkaus nappi
    $tyohistoria .= '<button type="button" style="margin-left:5px;" class="btn btn-danger" data-toggle="modal" data-target="#myModalTyohistoria"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
    $tyohistoria .= '</tr>';
    $tyohistoria .= '</tr>';
  }
}

if($bFound)
  echo $tyohistoria;
else
  echo "<p style='color:red;font-weight:bold;'>Tyohistoriaa ei ole lisätty</p>";


echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';

//Koulutus
echo '<div class="row">';
echo '<div class="col-md-6 col-xs-8">';
echo '<div id="koulutukset">';
echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Koulutukset</p><a href="'.base_url().'sivu/koulutukset_lisaus" class="btn btn-success glyphicon glyphicon-plus" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

$koulutukset = "";

$koulutukset .= '<table class="table" border="1">';
$koulutukset .= '<thead><tr><th>Koulutusnimi</th><th>Koulutusaste</th><th>Oppilaitos</th><th>Alkoi</th><th>Loppui</th><th style="width:140px"></th></tr></thead>';

$query = $this->db->query("SELECT id, koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui, sposti FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

$bFound = false;

foreach ($query->result() as $row)
{
  $id 		  = "$row->id";
  $koulutusnimi = "$row->koulutusnimi";
  $koulutusaste = "$row->koulutusaste";
  $oppilaitos   = "$row->oppilaitos";
  $alkoi2 	  = "$row->alkoi";
  $loppui2 	  = "$row->loppui";
  $sposti 	  = "$row->sposti";

  if($koulutusnimi != NULL)
  {
    $bFound = true;

    $koulutukset .= '<tr>';
    $koulutukset .= '<td>'.$koulutusnimi.'</td>';
    $koulutukset .= '<td>'.$koulutusaste.'</td>';
    $koulutukset .= '<td>'.$oppilaitos.'</td>';
    $koulutukset .= '<td>'.$alkoi2.'</td>';
    $koulutukset .= '<td>'.$loppui2.'</td>';
    $koulutukset .= '<td><a href="'.base_url().'sivu/edit_koulutukset/'.$id.'" class="btn btn-primary"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></a>';//Muokkaus nappi
    $koulutukset .= '<button type="button" style="margin-left:5px;" class="btn btn-danger" data-toggle="modal" data-target="#myModalKoulutukset"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
    $koulutukset .= '</tr>';
  }
}

$koulutukset .= '</table>';

if($bFound)
  echo $koulutukset;
else
  echo "<p style='color:red;font-weight:bold;'>Koulutuksia ei ole lisätty</p>";

echo '</div>';
echo '</div>';
echo '</div>';


//Kortit
echo '<div class="row">';
echo '<div class="col-md-6 col-xs-8">';
echo '<div id="kortit">';
echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Kortit</p><a href="'.base_url().'sivu/kortit_lisaus" class="btn btn-success glyphicon glyphicon-plus" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

$kortit = "";

$kortit .= '<table class="table" border="1">';
$kortit .= '<thead><tr><th>Kortti</th><th>Vanhenemispäivä</th><th>Kommentti</th><th style="width:30px"></th></tr></thead>';

$query = $this->db->query("SELECT id, knimi, sposti, kommentti, voimassa FROM opiskelijakortit WHERE sposti ='".$this->session->userdata('sposti'). "'");

$bFound = false;

foreach ($query->result() as $row)
{
  $id 	= "$row->id";
  $knimi 	 = "$row->knimi";
  $voimassa = "$row->voimassa";
  $kommentti = "$row->kommentti";

  if($kortit != NULL)
  {
    $bFound = true;

    $kortit .= '<tr>';
    $kortit .= '<td>'.$knimi.'</td>';
    $kortit .= '<td>'.$voimassa.'</td>';
    $kortit .= '<td>'.$kommentti.'</td>';
    $kortit .= '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalKortit"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
    $kortit .= '</tr>';
  }
}

$kortit .= '</table>';

if($bFound)
  echo $kortit;
else
  echo "<p style='color:red;font-weight:bold;'>Kortteja ei ole lisätty</p>";

echo '<br><br><br><br></div>';
//echo '</div>';
//echo '</div>';
//echo '</div>';
//echo '</div>';
//echo '</div>';
//echo '</div>';
//echo '</div>';
//echo '</div>';
//echo '</div>';
?>
</div>
