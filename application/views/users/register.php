<div class="row">
<div class="col-md-6 col-md-offset-5">
	
	<?php if ($this->session->flashdata('Email')) : ?>
	<p class="unsuccess"><?php echo $this->session->flashdata('Email'); ?>
	<?php endif; ?>

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

<div class="styling">
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open('users/register'); ?>
<p>
	<?php echo form_label('Etunimi:'); ?>
	<?php
	$data = array(
		'name' => 'name',
		'id'	 => 'etunimi',
		'value'=> set_value('name')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('sähköposti:'); ?>
	<?php
	$data = array(
		'name' => 'email',
		'value'=> set_value('email')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Salasana:'); ?>
	<?php
	$data = array(
		'name' => 'password',
		'value'=> set_value('password')
	);
	?>
	<?php echo form_password($data); ?>
</p>
<p>
	<?php echo form_label('Salasana uudestaan:'); ?>
	<?php
	$data = array(
		'name' => 'confirmpassword',
		'value'=> set_value('confirmpassword')
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
