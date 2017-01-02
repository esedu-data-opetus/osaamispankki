<style>
#both {
	width: 200px;
	margin: 15px;
}
#kuvaus {
 resize: none;
}
</style>
<div style="margin: 20px 0 0 0;"></div>
<div class="panel panel-default">
<div class="panel-heading">
<h1>Lisää Harrastus</h1>
</div>
<div class="panel-body>">
	<?php echo validation_errors('<b style="color:red;">','</b><br>'); ?>
<div id="both">
<?php echo form_open('profile/Harrastus'); ?>
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
									'id'					=> 'kuvaus',
                  'value'       => set_value('vapaasana'));
?>
<?php echo form_textarea($data); ?>
  </p>
	<p>
<?php
	$data = array('name' 		=> 		'submit',
								'class' 	=> 		'btn btn-success',
								'value' 	=> 		'Lisää Harrastus');
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
