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
<h1>Lisää kortti</h1>
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
								'value'       => 'Kortit');
	?>
<?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Kortti:'); ?>
	<select name="Loota_1" id="select" onchange="validateDropdown();" class="form-control col-md-4 col-md-push-0">
					 <?php
					 $query = $this->db->query('SELECT id, knimi FROM kortit');
					 echo '<option disabled selected value="0">Valitse kortti</option>';
					 foreach($query->result() as $row) {
						 $id = '$row->id';
						 $knimi = '$row->knimi';
						 echo '<option name="knimi" value="'.$row->knimi.'">'.$row->knimi.'</option>';
					 }
					 ?>
	</select>
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
	<?php echo form_label('Voimassaoloaika:'); ?>
<?php
	$data = array('name'		 		=> 'Lopetit',
								'id'					=> 'loppui',
								'value'       => set_value('Lopetit'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
		<?php echo form_label('Kommentti:'); ?>
<?php
    $data = array('name' 		    => 'vapaasana',
                  'value'       => set_value('vapaasana'));
?>
<?php echo form_textarea($data); ?>
  </p>
	<p>
<?php
	$data = array('name' => 'submit',
								'id' => 'nappi',
								'value' => "Lisää kortti");
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
</div>
</div>
</div>

<script type="text/javascript">

	 $(function() {
	    $("#alkoi").datepicker();
	    $("#loppui").datepicker();
	   });

	 function validateDropdown()
		{
			var e = document.getElementById("select");
			var strUser = e.options[e.selectedIndex].value;

			console.log(strUser);

				if(strUser == '0')
			{
				document.getElementById('nappi').disabled = true;
			} else {
				document.getElementById('nappi').disabled = false;
			}
		}

</script>
