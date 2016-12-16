<div style="margin: 20px;">
<?php echo form_open('profile/haku'); ?>
<p style="display: inline">
<?php
	$data = array('name'        => 'haku',
								'id' 			    => 'haku',
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
</div>
