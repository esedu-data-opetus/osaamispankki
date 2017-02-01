<div class="panel panel-default">
<div class="panel-heading">
<h1>Kirjautuminen</h1><br>
</div>
<div class="panel-body">
<?php echo form_open('users/login'); ?>
<p>
<?php
	$data = array('name'        => 'email',
								'placeholder' => 'Sähköposti',
								'class' 			=> 'form-control',
								'value'       => set_value('email'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
    $data = array('name'        => 'password',
									'placeholder' => 'Salasana',
									'class' 			=> 'form-control',
                  'value'       => set_value('password'));
?>
<?php echo form_password($data); ?>
  </p>
	<p>
<?php
	$data = array('name'  => 'login_submit',
								'class' => 'btn btn-success btn-lg',
								'value' => "Kirjaudu sisään");
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
