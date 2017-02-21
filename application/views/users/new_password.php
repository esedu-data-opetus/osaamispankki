<div class="panel panel-default">
<div class="panel-heading">
<h1>Uusi salasana</h1><br>
</div>
<div class="panel-body">
<?php echo form_open('users/new_password'); ?>
<p>
<?php
	$data = array(
		'name'        => 'password',
		'placeholder' => 'Salasana',
		'class' 			=> 'form-control',
		'value'       => set_value('password')
	);
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
	$data = array(
		'name'        => 'password_c',
		'placeholder' => 'Salasanan vahvistus',
		'class' 			=> 'form-control',
		'value'       => set_value('password_c')
	);
	?>
<?php echo form_input($data); ?>
</p>
	<p>
<?php
	$data = array(
		'name'  => 'login_submit',
		'class' => 'btn btn-success btn-lg',
		'value' => "Vahvista"
							);
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
