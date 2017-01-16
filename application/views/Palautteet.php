<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="panel panel-default">
  <div class="panel-heading">
    <a class="btn btn-success btn-lg" style="float: right; margin: 0;" href="<?php echo base_url(); ?>users/palaute"><span class="glyphicon glyphicon-plus"></span></a>
    <h1 style="margin: 0; padding: 0;">Palautteet</h1>
  </div>
  <div class="panel-boody">
  <?php foreach($Palautteet as $Palaute) : ?>
    <?php
    if ($Palaute) {
      $Palaute_E = TRUE;
    }
    ?>
<?php endforeach; ?>
<?php if(!isset($Palaute_E)) : ?>
<h1 style='margin:10px;padding:0;color:red;font-weight:bold;font-size:25px;'>Palautteita ei ole lisätty!</h1>
<?php else : ?>
<table class="table">
  <thead>
  <tr>
    <th>Sähköposti</th>
    <th>Aihe</th>
    <th>Palaute</th>
    <th>Options</th>
  </tr>
</thead>
<tbody>
<?php foreach($Palautteet as $Palaute) : ?>
<?php
if ($Palaute->Tila == 1) {
  $Tila = "warning";
} else if ($Palaute->Tila == 2) {
  $Tila = "success";
} else {
  $Tila = "";
}
?>
  <tr class="<?php echo $Tila; ?>">
    <td><p><?php echo $Palaute->Sposti; ?></p></td>
    <td><p><?php echo $Palaute->Aihe; ?></p></td>
    <td><p><?php echo $Palaute->Palaute; ?></p></td>
    <td>
      <a class="btn btn-warning" title="Luettu!" href="<?php echo base_url(); ?>profile/palaute_tila/1/<?php echo $Palaute->id; ?>"><span class="glyphicon glyphicon-pushpin"></span></a>
      <a class="btn btn-success" title="Korjattu!" href="<?php echo base_url(); ?>profile/palaute_tila/2/<?php echo $Palaute->id; ?>"><span class="glyphicon glyphicon-ok"></span></a>
      <a onclick="return confirm('Halutako Poistaa Palautteen?');" href="<?php echo base_url(); ?>profile/palaute_delete/<?php echo $Palaute->id; ?>" class="btn btn-danger" title="Hylätty!"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</div>
</div>
