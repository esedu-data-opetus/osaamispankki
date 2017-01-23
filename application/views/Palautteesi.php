<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="panel panel-default">
  <div class="panel-heading">
    <a class="btn btn-success btn-lg" style="float: right; margin: 0;" href="<?php echo base_url(); ?>Palaute/Palautteesi"><span class="glyphicon glyphicon-plus"></span></a>
    <h1 style="margin: 0; padding: 0;">Palautteet</h1>
  </div>
  <div class="panel-body">
  <?php foreach($Palautteet as $Palaute) : ?>
    <?php
    if ($Palaute->Sposti == $this->session->userdata('sposti')) {
      $Palaute_E = TRUE;
    }
    ?>
<?php endforeach; ?>
<?php if(!isset($Palaute_E)) : ?>
<h1 class="error-message">Palautteita ei ole lisätty!</h1>
<?php else : ?>
  <table style="margin: 0;" class="table">
    <thead>
    <tr>
      <th>SähköPosti</th>
      <th>Aihe</th>
      <th>palaute</th>
      <th>Tila</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($Palautteet as $Palaute) : ?>
    <?php if (md5($Palaute->Sposti) == $this->uri->segment('3')) : ?>
  <?php
  if ($Palaute->Tila == 1) {
    $Tila = "warning";
    $Tilasi = "Luettu!";
  } else if ($Palaute->Tila == 2) {
    $Tila = "success";
    $Tilasi = "Asia hoidettu!";
  } else {
    $Tila = "";
    $Tilasi = "Lähetetty!";
  }
  ?>
    <tr class="<?php echo $Tila; ?>">
      <td><p><?php echo $Palaute->Sposti; ?></p></td>
      <td><p><?php echo $Palaute->Aihe; ?></p></td>
      <td><p><?php echo $Palaute->Palaute; ?></p></td>
      <td><p><?php echo $Tilasi; ?></p></td>
    </tr>
  <?php endif; ?>
  <?php endforeach; ?>
  </tbody>
  </table>
<?php endif; ?>
</div>
</div>