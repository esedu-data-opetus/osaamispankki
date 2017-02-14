<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Lisää kortti</h1>
	</div>
<div class="panel-body>" style="padding: 20px 10px 0 10px;">
<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
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
<?php
	$data = array(
		'name'		 			=> 	'Lopetit',
		'placeholder'		=>  'Voimassaoloaika',
		'id'						=>	'loppui',
		'class'					=>	'form-control',
		'readonly'			=> 	'readonly',
		'value'       	=> 	set_value('Lopetit')
	);
	?>
<?php echo form_input($data); ?>
</p>
<p>
<?php
    $data = array(
			'name' 		    	=> 	'vapaasana',
			'placeholder'		=>  'Vapaasana',
			'class'					=>	'form-control',
      'value'       	=> 	set_value('vapaasana')
		);
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
	$data = array(
		'name' => 'submit',
		'class' => 'btn btn-success btn-lg',
		'value' => "Lisää Kortti"
	);
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>
	</div>
</div>
