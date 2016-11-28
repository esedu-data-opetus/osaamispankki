
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
</div>
