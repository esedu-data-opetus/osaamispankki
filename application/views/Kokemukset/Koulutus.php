<style>
#both {
	width: 200px;
	margin: 15px;
}
#kuvaus {
 resize: none;
}
#nappi {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #4CAF50;
  height:5.5%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 15px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.error {
	color: #ff0000;
	border: 1px solid #ff0000;
	margin: 0;
	padding: 5px;
	border-radius: 10px;
}
.header {
	margin-top: 20px;
}
</style>
<script type="text/javascript">

	 $(function() {
	    $("#alkoi").datepicker();
	    $("#loppui").datepicker();
	   });

</script>
<div class="panel panel-default header">
<div class="panel-heading">
<h1>Lisää koulutus</h1>
<br>
</div>
<div class="panel-body>">
<div id="both">
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open('profile/prototype'); ?>
<p>
<?php
	$data = array('name'		 		=> 'Aihe',
								'style' 			=> 'display: none;',
								'value'       => 'Koulutus');
	?>
<?php echo form_input($data); ?>
</p>
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
