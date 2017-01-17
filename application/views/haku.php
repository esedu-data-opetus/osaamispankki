<?php echo form_open('users/haku'); ?>
<p style="display: inline">
<?php
	$data = array('name'        => 'haku',
								'class'				=> 'form-control',
								'style' 			=> 'width: 300px; display: inline;',
								'value'       => set_value('email'),
                'placeholder' => 'Kirjoita haku tähän');
	?>
<?php echo form_input($data); ?>
</p>
<p style="display: inline">
<?php
	$data = array('name'    =>    'submit',
								'class'   =>    'btn btn-success',
								'value'   =>    'Hae');
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>

<h1>↓H↓A↓K↓U↓T↓U↓L↓O↓K↓S↓E↓T↓</h1>
<?php if(isset($haku)) : ?>
<?php foreach($haku as $prof) : ?>
	<img src="<?php echo base_url(); ?>images/profiili/<?php echo $prof->Prof_Pic ?>" />
	<p><?php echo $prof->F_Name." ".$prof->L_Name ?></p>
	<p><?php echo $prof->Sposti; ?></p>
<?php endforeach; ?>
<?php else : ?>
	<?php echo $haut; ?>
<?php endif; ?>
