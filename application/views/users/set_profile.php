<div class="panel panel-default">
<div class="panel-heading">
  <h4>Täytä perustiedot ja jatka profiilisivulle!</h4>
</div>
<div class="panel-body">
<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<?php echo form_open('profile/set_profile'); ?>
<p>
  <?php
  $data = array(
    'name'  => 'own_email',
    'class' => 'form-control',
    'placeholder' => 'Henkilökohtainen sähköposti',
    'value' => set_value('own_email')
  );
  ?>
  <?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'f_name',
    'class' => 'form-control',
    'placeholder' => 'Etunimi',
		'value'=> set_value('f_name')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'l_name',
    'class' => 'form-control',
    'placeholder' => 'Sukunimi',
		'value'=> set_value('l_name')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'osoite',
    'class' => 'form-control',
    'placeholder' => 'Osoite',
		'value'=> set_value('osoite')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'posti_num',
    'class' => 'form-control',
    'placeholder' => 'Postinumero',
		'value'=> set_value('posti_num')
	);
	?>
	<?php echo form_input($data); ?>
</p>
<p>
  <?php
  $data = array(
    'name'    =>  'puh_num',
    'class' => 'form-control',
    'placeholder' => 'Puhelinnumero',
    'value'   =>  set_value('puh_num')
  );
  ?>
  <?php echo form_input($data); ?>
</p>
<p>
	<?php
	$data = array(
		'name' => 'submit',
		'class'	 => 'btn btn-success btn-lg',
		'value'=> 'Rekisteröidy'
	);
	?>
	<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
