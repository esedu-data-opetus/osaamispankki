<style>
#both {
	width: 200px;
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
</style>
<h1 style="font-weight:bold;">Harrastus</h1><br>
<script type="text/javascript">

	 $(function() {
	    $("#alkoi").datepicker();
	    $("#loppui").datepicker();
	   });

</script>
<div id="both">
<?php echo form_open('profile/prototype'); ?>
<p>
<?php
	$data = array('name'		 		=> 'Aihe',
								'style' 			=> 'display: none;',
								'value'       => 'Harrastus');
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php echo form_label('Harrastus:'); ?>
<?php
	$data = array('name'		 		=> 'harrastus',
								'class' 			=> 'login-form',
								'value'       => set_value('harrastus'));
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
	$data = array('name' => 'submit',
								'id' => 'nappi',
								'value' => "Lisää harrastus");
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
