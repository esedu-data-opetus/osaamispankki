<div class="row">
<div class="col-md-6 col-md-offset-5">
	<h1>Kirjautuminen</h1><br>

	<style>
	#nappi {
		font-family: Roboto, sans-serif;
		outline: 0;
		background: #4CAF50;
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

<?php echo form_open('users/login'); ?>
<p>
<?php echo form_label('Sähköposti:'); ?>
<?php
	$data = array('name'        => 'sposti',
								'id' 					=> 'sposti',
								'class' 			=> 'login-form',
								'value'       => set_value('sposti'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Salasana:'); ?>
<?php
    $data = array('name'        => 'salasana',
									'id' 					=> 'salasana',
									'class' 			=> 'login-form',
                  'value'       => set_value('salasana'));
?>
<?php echo form_password($data); ?>
  </p>
	<p>
<?php
	$data = array('name' => 'login_submit',
								'id' => 'nappi',
								'value' => "Kirjaudu sisään");
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
