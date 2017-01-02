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
	margin: 0;
	padding: 5px;
}
.header {
	margin-top: 20px;
}
</style>
<div class="panel panel-default header">
<div class="panel-heading">
<h1>Lisää harrastus</h1><br>
</div>
<div class="panel-body>">
<div id="both">
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open('profile/prototype'); ?>
<p>
<?php echo form_label('Harrastus:'); ?>
<?php
	$data = array('name'		 		=> 'Loota_1',
								'value'       => set_value('Loota_1'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
	$data = array('name'		 		=> 'Loota_2',
								'style' 			=> 'display: none;',
								'value'       => 'Empty');
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
	$data = array('name'		 		=> 'Loota_3',
								'style' 			=> 'display: none;',
								'value'       => 'Empty');
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
	$data = array('name'		 		=> 'Aloitit',
								'style' 			=> 'display: none;',
								'value'       => 'Empty');
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
	$data = array('name'		 		=> 'Lopetit',
								'style' 			=> 'display: none;',
								'value'       => 'Empty');
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Vapaasana:'); ?>
<?php
    $data = array('name' 		    => 'vapaasana',
							    'id'   		    => 'vapaasana',
                  'value'       => set_value('vapaasana'));
?>
<?php echo form_textarea($data); ?>
  </p>
	<p>
<?php
	$data = array('name' 		=> 		'submit',
								'id' 			=> 		'nappi',
								'value' 	=> 		'Lisää harrastus');
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>
