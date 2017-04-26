<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Lisää Työhistoria</h1>
	</div>
<div class="panel-body>" style="padding: 20px 10px 0 10px;">
<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<?php echo form_open('profile/Tyohistoria'); ?>
<p>
<?php
	$data = array(
		'name'		 		=> 	'tyopaikka',
		'placeholder'	=>	'Työpaikka',
		'class'				=>	'form-control',
		'value'       => 	set_value('tyopaikka')
	);
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
	$data = array(
		'name'		 		=> 	'tehtava',
		'placeholder'	=>	'Tehtävä',
		'class'				=>	'form-control',
		'value'       => 	set_value('tehtava')
	);
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
	$data = array(
		'name'		 		=> 	'Aloitit',
		'id'					=> 	'alkoi',
		'placeholder'	=>	'Alkoi',
		'class'				=>	'form-control',
		'value'       => 	set_value('Aloitit')
	);
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
	$data = array(
		'name'		 		=> 	'Lopetit',
		'id'					=> 	'loppui',
		'placeholder'	=>	'Loppui',
		'class'				=>	'form-control',
		'value'       => 	set_value('Lopetit')
	);
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
    $data = array(
			'name' 		    => 'vapaasana',
			'id'   		    => 'kuvaus',
			'placeholder'	=>	'Vapaasana',
			'class'				=>	'form-control',
			'value'       => set_value('vapaasana')
		);
?>
<?php echo form_textarea($data); ?>
  </p>
	<p style="display: inline;">
		<?php
		$data = array(
			'name'		=>  'Uusi',
			'class'		=>	'btn btn-primary btn-lg',
			'value'		=> 	'Lisää useampi työhistoria'
		);
		?>
		<?php echo form_submit($data); ?>
		</p>
	<p style="display: inline;"><?php
	$data = array(
		'name' 			=> 	'submit',
		'class' 		=> 	'btn btn-success btn-lg',
		'value' 		=> 	'Lisää Työhistoria'
	);
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
