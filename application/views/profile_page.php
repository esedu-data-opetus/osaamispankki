
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

<?php
  echo form_open_multipart('Upload_controller/do_upload');
  echo "<input type='file' id='uploadBox' name='userfile' size='20' class=''/>";
  echo '<br>';
  echo "<input type='submit' id='nappi' name='submit' value='Lataa' class='btn btn-success' disabled/> ";
  echo "</form>";
?>
</div>
</div>

<div style="position:relative; margin-left:240px; margin-top:-320px;">
<?php foreach($User_Info as $User) : ?>
  <p>Nimi: <?php echo $User->F_Name." ".$User->L_Name; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Sähköposti: <?php echo $User->Own_Email; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Osoite: <?php echo $User->Osoite; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Postinumero: <?php echo $User->Posti_Num; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Puhelinnumero: <?php echo $User->Puh_Num; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Kuvaus: <?php echo $User->About; ?></p>
<?php endforeach; ?>
</div>

<div style="position:relative; margin-left:340px; margin-top:-190px;">
<?php
//Harrastus
echo '<div class="row">';
echo '<div class="col-md-8 col-xs-8 col-md-offset-4">';
echo '<div class="row">';
echo '<div class="col-md-6 col-xs-8">';
echo '<div id="tyohistoria">';
echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Harrastukset</p></li><br><br>';

$harrastukset = "";

$harrastukset .= '<table class="table" border="1">';
$harrastukset .= '<thead><tr><th>Harrastus</th><th>Vapaa sana</th><th style="width:150px;"></th></tr></thead>';


$query = $this->db->query("SELECT id, harrastus, vapaasana FROM harrastukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

$bFound = false;

foreach ($query->result() as $row)
{
  $id 	   = "$row->id";
  $harrastus = "$row->harrastus";
  $vapaasana   = "$row->vapaasana";


  if($harrastus != NULL)
  {
    $bFound = true;

    $harrastukset .= '<tr>';
    $harrastukset .= '<td>'.$harrastus.'</td>';
    $harrastukset .= '<td style="max-width:500px;word-wrap: break-word;">'.$vapaasana.'</td>';
    $harrastukset .= '</tr>';
  }
}

if($bFound)
  echo $harrastukset;
else
  echo "<p style='color:red;font-weight:bold;'>Harrastuksia ei ole lisätty</p>";

echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</br>';

//Tyohistoria
echo '<div class="row">';
echo '<div class="col-md-6 col-xs-8">';
echo '<div id="tyohistoria">';
echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Työhistoria</p></li><br><br>';

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
echo '</div>';
echo '</div>';
?>
</div>
