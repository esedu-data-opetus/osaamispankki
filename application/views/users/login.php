<div class="panel panel-default">
<div class="panel-heading">
<h1>Kirjautuminen</h1><br>
</div>
<div class="panel-body">
<?php echo form_open('users/login'); ?>
<div class="input-text">Sähköposti <span class="glyphicon glyphicon-question-sign info"></span><span class="info-text">Kirjaudu sisään <b>@esedulainen.fi</b> tai <b>@esedu.fi</b> sähköpostitunnuksellasi.</span></div>
<p>
<?php
	$data = array(
		'name'        => 'email',
		'style'				=>	'email',
		'class' 			=> 'form-control',
		'placeholder' => '@esedulainen.fi tai @esedu.fi',
		'value'       => set_value('email')
	);
	?>
<?php echo form_input($data); ?>
</p>
<p>Salasana</p>
<p>
<?php
    $data = array(
			'name'        => 'password',
			'class' 			=> 'form-control',
			'value'       => set_value('password')
		);
?>
<?php echo form_password($data); ?>
  </p>
	<p>
<?php
	$data = array(
		'name'  => 'login_submit',
		'class' => 'btn btn-success btn-lg',
		'value' => "Kirjaudu sisään"
							);
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
<a href="<?php echo base_url(); ?>Users/forgot_password">Unohditko salasanasi?</a>
</div>
</div>
