<div class="row">
<div class="col-md-6 col-md-offset-5">
<style>
#nappi {
  font-family: Roboto, sans-serif;
  outline: 0;
  background: #31c398;
  width: 150px;
  height:50px;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 15px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

.error {
	color: #ff0000;
	border: 1px solid #ff0000;
	margin: 0;
	padding: 5px;
	border-radius: 10px;
}

.styling {
	max-width: 200px;
}
</style>
<h1>Päivitä perustietoja tai jatka profiilisivulle</h1>

<div class="styling">
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open('profile/set_profile'); ?>
<p>
  <?php echo form_label('Henkilökohtainen sähköposti:'); ?>
  <?php
  $data = array(
    'name' => 'own_email',
    'value'=> set_value('own_email')
  );
  ?>
  <?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Etunimi:'); ?>
	<?php
	$data = array(
		'name' => 'f_name',
		'value'=> set_value('f_name')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Sukunimi:'); ?>
	<?php
	$data = array(
		'name' => 'l_name',
		'value'=> set_value('l_name')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Osoite:'); ?>
	<?php
	$data = array(
		'name' => 'osoite',
		'value'=> set_value('osoite')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Postinumero:'); ?>
	<?php
	$data = array(
		'name' => 'posti_num',
		'value'=> set_value('posti_num')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
  <?php echo form_label('Puhelinnumero:'); ?>
  <?php
  $data = array(
    'name'    =>  'puh_num',
    'value'   =>  set_value('puh_num')
  );
  ?>
  <?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'submit',
		'id'	 => 'nappi',
		'value'=> 'Rekisteröidy'
	);
	?>
	<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
