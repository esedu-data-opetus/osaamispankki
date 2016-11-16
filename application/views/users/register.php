<div class="row">
<div class="col-md-6 col-md-offset-5">
	<h1>Rekisteröityminen</h1><br>
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

.styling {
	max-width: 200px;
}
</style>

<div class="styling">
<?php echo validation_errors('<p class="alert alert-dismissable alert-dager">'); ?>
<?php echo form_open('users/register'); ?>
<p>
	<?php echo form_label('Etunimi:'); ?>
	<?php
	$data = array(
		'name' => 'etunimi',
		'id'	 => 'etunimi',
		'value'=> set_value('etunimi')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('sähköposti:'); ?>
	<?php
	$data = array(
		'name' => 'sposti',
		'id' => 'sposti',
		'value'=> set_value('sposti')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Salasana:'); ?>
	<?php
	$data = array(
		'name' => 'salasana',
		'id'	 => 'salasana',
		'value'=> set_value('salasana')
	);
	?>
	<?php echo form_password($data); ?>
</p>
<p>
	<?php echo form_label('Salasana uudestaan:'); ?>
	<?php
	$data = array(
		'name' => 'salasanaconfirm',
		'id'	 => 'salasanaconfirm',
		'value'=> set_value('salasanaconfirm')
	);
	?>
	<?php echo form_password($data); ?>
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
