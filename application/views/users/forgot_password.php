<div class="panel panel-default">
<div class="panel-heading">
<h1>Salasanan palautus</h1><br>
</div>
<div class="panel-body">
<p>Kirjoita kenttään <b>@esedulainen.fi</b> sähköpostitunnuksesi niin lähetämme sähköpostiisi salasanan palautuslinkin.</p>
<?php echo form_open('users/forgot_password'); ?>
<p>
<?php
	$data = array(
		'name'        => 'email',
		'placeholder' => '@esedulainen.fi',
		'class' 			=> 'form-control',
		'value'       => set_value('email')
	);
	?>
<?php echo form_input($data); ?>
</p>
	<p>
<?php
	$data = array(
		'name'  => 'login_submit',
		'class' => 'btn btn-success btn-lg',
		'value' => "Lähetä"
							);
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
