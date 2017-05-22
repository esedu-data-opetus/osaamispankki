<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Täytä perustiedot ja jatka profiilisivulle!</h4>
  </div>
<div class="panel-body">

<?php
  if(!$Prof_Info) {
     $F_Name = set_value('f_name');
     $L_Name = set_value('l_name');
     $Osoite = set_value('osoite');
     $Puh_Num = set_value('puh_num');
     $Posti_Num = set_value('posti_num');
     $Own_Email = set_value('own_email');
   } else if (!$Prof_Settings) {
     foreach($Prof_Info as $Prof) {
       $F_Name = $Prof->F_Name;
       $L_Name = $Prof->L_Name;
       $Osoite = $Prof->Osoite;
       $Puh_Num = $Prof->Puh_Num;
       $Posti_Num = $Prof->Posti_Num;
       $Own_Email = $Prof->Own_Email;
     }
     if (!isset($F_Name)) {
       $F_Name = set_value('f_name');
       $L_Name = set_value('l_name');
       $Osoite = set_value('osoite');
       $Puh_Num = set_value('puh_num');
       $Posti_Num = set_value('posti_num');
       $Own_Email = set_value('own_email');
     }
   } else {
     $F_Name = "";
     $L_Name = "";
     $Osoite = "";
     $Puh_Num = "";
     $Posti_Num = "";
     $Own_Email = "";
   }
?>

<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<?php if ($Prof_Info) : ?>
  <p>Serverillö oli joku vika ja tarvitsemme vahvistuksesi!</p>
  <p>Paina nappia niin saame korjattua asiat.</p>
  <p>Jos asia ei korjaudu laita laita palautetta omalla @esedulainen.fi sähköpostillasi.</p>
<?php $Update = 'none'; ?>
<?php else : ?>
  <?php $Update = ''; ?>
<?php endif; ?>
<?php if(!$Prof_Info && !$Prof_Settings) : ?>
<?php
  $btn_v = "Luo profiili!";
  echo form_open('profile/set_profile/b');
?>
<?php elseif(!$Prof_Info) : ?>
  <?php
    $btn_v = "Luo profiili!";
    echo form_open('profile/set_profile/p');
  ?>
<?php elseif(!$Prof_Settings) : ?>
<?php
  $btn_v = "Vahvista";
  echo form_open('profile/set_asetukset');
?>
<?php else : ?>
  <?php
  $btn_v = "Virhe!";
  echo form_open('profile/index');
  ?>
<?php endif; ?>

<p>
  <?php
  $data = array(
    'name'        => 'own_email',
    'class'       => 'form-control',
    'placeholder' => 'Henkilökohtainen sähköposti',
    'value'       =>  $Own_Email,
    'style'       =>  'display: '.$Update.';',
  );
  ?>
  <?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name'        =>  'f_name',
    'class'       =>  'form-control',
    'placeholder' =>  'Etunimi',
		'value'       =>  $F_Name,
    'style'       =>  'display: '.$Update.';',
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name'        =>  'l_name',
    'class'       =>  'form-control',
    'placeholder' =>  'Sukunimi',
		'value'       =>  $L_Name,
    'style'       =>  'display: '.$Update.';',
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p style="display: <?php echo $Update; ?>;" class="text-muted">
  Syntymäpäivä:<br>
  <input name="spv" class="form-control" type="number" value="<?php echo set_value('spv'); ?>" placeholder="Päivä" style="display: inline; width: 30%;">
  <input name="skk" class="form-control" type="number" value="<?php echo set_value('skk'); ?>" placeholder="Kuukausi" style="display: inline; width: 30%;">
  <input name="svs" class="form-control" type="number" value="<?php echo set_value('svs'); ?>" placeholder="Vuosi" style="display: inline; width: 30%;">
</p>
<p>
	<?php
	$data = array(
		'name'        => 'osoite',
    'class'       => 'form-control',
    'placeholder' => 'Osoite',
		'value'       => $Osoite,
    'style'       => 'display: '.$Update.';',
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name'        => 'posti_num',
    'class'       => 'form-control',
    'placeholder' => 'Postinumero',
		'value'       => $Posti_Num,
    'style'       =>  'display: '.$Update.';',
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
  <?php
  $data = array(
    'name'        => 'puh_num',
    'class'       => 'form-control',
    'placeholder' => 'Puhelinnumero',
    'value'       =>  $Puh_Num,
    'style'       =>  'display: '.$Update.';',
  );
  ?>
  <?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'submit',
		'class'	 => 'btn btn-success btn-lg',
		'value'=> $btn_v
	);
	?>
	<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
  </div>
</div>
