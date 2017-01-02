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
<h1>Lisää Koulutus</h1>
</div>
<div class="panel-body>">
	<?php echo validation_errors('<b style="color:red;">','</b><br>'); ?>
<div id="both">
<?php echo form_open('profile/koulutus'); ?>
<p>
<?php echo form_label('Koulutus:'); ?>
<?php
	$data = array('name'		 		=> 'Loota_1',
								'value'       => set_value('Loota_1'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Koulutusaste:'); ?>
<?php
	$data = array('name'		 		=> 'Loota_2',
								'value'       => set_value('Loota_2'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Oppilaitos:'); ?>
<?php
	$data = array('name'		 		=> 'Loota_3',
								'value'       => set_value('Loota_3'));
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
<?php
    $data = array('name' 		    => 'vapaasana',
									'style'				=> 'display: none;',
                  'value'       => set_value('vapaasana'));
?>
<?php echo form_textarea($data); ?>
  </p>
	<p>
<?php
	$data = array('name' => 'submit',
								'id' => 'nappi',
								'value' => "Lisää koulutus");
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
