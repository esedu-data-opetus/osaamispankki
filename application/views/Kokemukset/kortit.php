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
<h1>Lisää kortti</h1>
</div>
<div class="panel-body>">
<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<div id="both">
<?php echo form_open('profile/Kortit'); ?>
<p>
	<?php echo form_label('Kortti:'); ?>
	<select name="kortti" id="select" onchange="validateDropdown();" class="form-control col-md-4 col-md-push-0">
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
	<?php echo form_label('Voimassaoloaika:'); ?>
<?php
	$data = array('name'		 		=> 'Lopetit',
								'id'					=> 'loppui',
								'readonly'		=> 'readonly',
								'value'       => set_value('Lopetit'));
	?>
<?php echo form_input($data); ?>
</p>
<p>
		<?php echo form_label('Kommentti:'); ?>
<?php
    $data = array('name' 		    => 'vapaasana',
									'id' 					=> 'kuvaus',
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
	$data = array('name' => 'submit',
								'class' => 'btn btn-success btn-lg',
								'value' => "Lisää Kortti");
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
