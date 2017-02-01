<div class="panel panel-default">
	<div class="panel-heading">
	<?php if ($this->session->flashdata('Email')) : ?>
		<p class="unsuccess"><?php echo $this->session->flashdata('Email'); ?>
	<?php endif; ?>
	<h1>Rekisteröityminen</h1>
</div>
<div class="panel-body">
<?php echo validation_errors('<p style="font-weight: bold;" class="text-danger bg-danger">','</p><br>'); ?>
<?php echo form_open('users/register'); ?>
<p>
	<?php
	$data = array(
		'name' => 'name',
		'class'	 => 'form-control',
		'placeholder' => 'Etunimi',
		'value'=> set_value('name')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'email',
		'class'	 => 'form-control',
		'placeholder' => 'sähköposti',
		'value'=> set_value('email')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'password',
		'class'	 => 'form-control',
		'placeholder' => 'Salasana',
		'value'=> set_value('password')
	);
	?>
	<?php echo form_password($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'confirmpassword',
		'class'	 => 'form-control',
		'placeholder' => 'Salasana uudestaan',
		'value'=> set_value('confirmpassword')
	);
	?>
	<?php echo form_password($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name'  => 'submit',
		'class'	=> 'btn btn-success btn-lg',
		'value' => 'Rekisteröidy'
	);
	?>
	<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
