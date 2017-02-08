<style>
#both {
	width: 200px;
	margin: 15px;
}
#kuvaus {
 resize: none;
}
</style>
<div class="panel panel-default">
<div class="panel-heading">
<h1>Lisää Harrastus</h1>
</div>
<div class="panel-body>">
	<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<div id="both">
<?php echo form_open('profile/harrastus'); ?>
<p>
<?php echo form_label('Harrastus:'); ?>
<?php
	$data = array('name'		 		=> 'harrastus',
								'value'       => set_value('harrastus'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Vapaasana:'); ?>
<?php
    $data = array('name' 		    => 'vapaasana',
                  'value'       => set_value('vapaasana'));
?>
<?php echo form_textarea($data); ?>
  </p>
	<p>
	<?php echo form_label('Lisää useampi:'); ?>
	<?php
		if ($this->session->userdata('check')) {
			$check = "checked";
		} else {
			$check = "";
		}

	    $data = array(
				'name'		=>  'Uusi',
				'checked' => 	$check,
				'class'		=>  'checkbox-inline',
	      'value'		=> 	set_value('Uusi')
			);
	?>
	<?php echo form_checkbox($data); ?>
	</p>
	<p>
<?php
	$data = array('name' 		=> 		'submit',
								'class' 	=> 		'btn btn-success btn-lg',
								'value' 	=> 		'Lisää Harrastus');
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
