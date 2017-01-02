<style>
#both {
	width: 200px;
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
<div style="margin: 20px 0 0 0;"></div>
<div class="panel panel-default">
<div class="panel-heading">
<h1>Lisää Työhistoria</h1>
</div>
<div class="panel-body>">
<?php echo validation_errors('<b style="color:red;">','</b><br>'); ?>
<div id="both">
<?php echo form_open('profile/Tyohistoria'); ?>
<p>
<?php echo form_label('Työpaikka:'); ?>
<?php
	$data = array('name'		 		=> 'tyopaikka',
								'value'       => set_value('tyopaikka'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Tehtävä:'); ?>
<?php
	$data = array('name'		 		=> 'tehtava',
								'value'       => set_value('tehtava'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Alkoi:'); ?>
<?php
	$data = array('name'		 		=> 'Aloitit',
								'id'					=> 'alkoi',
								'value'       => set_value('Aloitit'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Loppui:'); ?>
<?php
	$data = array('name'		 		=> 'Lopetit',
								'id'					=> 'loppui',
								'value'       => set_value('Lopetit'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Vapaasana:'); ?>
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
								'class' 		=> 	'btn btn-success',
								'value' 		=> 	"Lisää Työhistoria");
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
