<style>
#both {
	margin: 15px;
}
#kuvaus {
 resize: none;
}
</style>
<script type="text/javascript">

	 $(function() {
	    $("#alkoi").datepicker();
	    $("#loppui").datepicker();
	   });

</script>
<div class="panel panel-default">
<div class="panel-heading">
<h1>Lisää Työhistoria</h1>
</div>
<div class="panel-body>">
	<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
	<div id="both">
<?php echo form_open('profile/Tyohistoria'); ?>
<p>
<?php echo form_label('Työpaikka:'); ?><br>
<?php
	$data = array('name'		 		=> 'tyopaikka',
								'value'       => set_value('tyopaikka'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Tehtävä:'); ?><br>
<?php
	$data = array('name'		 		=> 'tehtava',
								'value'       => set_value('tehtava'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Alkoi:'); ?><br>
<?php
	$data = array('name'		 		=> 'Aloitit',
								'id'					=> 'alkoi',
								'readonly'		=> 'readonly',
								'value'       => set_value('Aloitit'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Loppui:'); ?><br>
<?php
	$data = array('name'		 		=> 'Lopetit',
								'id'					=> 'loppui',
								'readonly'		=> 'readonly',
								'value'       => set_value('Lopetit'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Vapaasana:'); ?><br>
<?php
    $data = array('name' 		    => 'vapaasana',
							    'id'   		    => 'kuvaus',
                  'value'       => set_value('vapaasana'));
?>
<?php echo form_textarea($data); ?>
  </p>
	<p>
<?php
	$data = array('name' 			=> 	'submit',
								'class' 		=> 	'btn btn-success btn-lg',
								'value' 		=> 	'Lisää Työhistoria');
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
