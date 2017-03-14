<div class="panel panel-default">
	<div class="panel-heading">
	<?php if ($this->session->flashdata('Email')) : ?>
		<p class="unsuccess"><?php echo $this->session->flashdata('Email'); ?>
	<?php endif; ?>
	<h1>Rekisteröinti</h1>
</div>
<div class="panel-body">
<?php echo validation_errors('<p style="font-weight: bold;" class="text-danger bg-danger">','</p><br>'); ?>
<?php if ($this->uri->segment(2) == 'test') : ?>
	<?php echo form_open('Users/test'); ?>
<?php else : ?>
	<?php echo form_open('Users/register'); ?>
<?php endif; ?>
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
		'placeholder' => '@esedulainen.fi tai @esedu.fi',
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
