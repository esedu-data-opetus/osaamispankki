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
<div class="panel panel-default">
<div class="panel-heading">
<h1>Lisää Koulutus</h1>
</div>
<div class="panel-body>">
	<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<div id="both">
<?php echo form_open('profile/koulutus'); ?>
<p>
<?php echo form_label('Koulutus:'); ?>
<?php
	$data = array('name'		 		=> 'koulutusnimi',
								'value'       => set_value('koulutusnimi'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Koulutusaste:'); ?>
<?php
	$data = array('name'		 		=> 'koulutusaste',
								'value'       => set_value('koulutusaste'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Oppilaitos:'); ?>
<?php
	$data = array('name'		 		=> 'oppilaitos',
								'value'       => set_value('oppilaitos'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Alkoi:'); ?>
<?php
	$data = array('name'		 		=> 'Aloitit',
								'id'					=> 'alkoi',
								'readonly'		=> 'readonly',
								'value'       => set_value('Aloitit'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Loppui:'); ?>
<?php
	$data = array('name'		 		=> 'Lopetit',
								'id'					=> 'loppui',
								'readonly'		=> 'readonly',
								'value'       => set_value('Lopetit'));
	?>
<?php echo form_input($data); ?>
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
	$data = array('name' 	=> 'submit',
								'class' 		=> 'btn btn-success btn-lg',
								'value' => "Lisää koulutus");
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
