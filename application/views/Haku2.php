<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('Haku'); ?>
<p style="display: inline">
<?php
	$data = array('name'        => 'haku',
								'class'				=> 'form-control',
								'style' 			=> 'width: 300px; display: inline;',
								'value'       => set_value('email'),
                'placeholder' => 'Kirjoita haku tähän',
								'autofocus'		=> 'autofocus'
							);
	?>
<?php echo form_input($data); ?>
</p>
<!-- <p>
	<?php echo form_label('Suodatin:'); ?>
	<select name="suodatin" onchange="validateDropdown();" class="form-control col-md-4 col-md-push-0">
		<option name="suodatinn" value="Harrastukset">Harrastukset</option>
		<option name="suodatinn" value="Työhistoria">Työhistoria</option>
		<option name="suodatinn" value="Koulutus">Koulutus</option>
		<option name="suodatinn" value="Kortit">Kortit</option>
	</select>
</p>
<p>
<?php echo form_label('Harrastus:'); ?>
<?php
	if ($this->session->userdata('harrastus')) {
		$check = "checked";
	} else {
		$check = "";
	}

		$data = array(
			'name'		=>  'Harrastukset',
			'checked' => 	$check,
			'class'		=>  'checkbox-inline',
		);
?>
<?php echo form_checkbox($data); ?>
</p> -->
<p style="display: inline">
<?php
	$data = array('name'    =>    'submit',
								'class'   =>    'btn btn-success',
								'value'   =>    'Hae');
?>
<?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>

<?php if(!empty($this->input->post('haku'))) : ?>
<h3>Tulokset haulla "<?php echo filter_var($this->input->post('haku'), FILTER_SANITIZE_STRING); ?>"</h3>
<?php
foreach($haku_tulokset as $haut) {
	if($haut->Näytä_Profiili == 'Kylla'){
		echo '<a style="text-decoration: none;" href="'.base_url().'Haku/User/'.$haut->User_id.'"><div class="panel panel-default">
			<div class="panel-heading">
			<h4>'.$haut->L_Name.' '. $haut->F_Name.'</h4>
			</div>
				<div class="prof">
					<div class="prof-info panel-body">
					<img class="img-rounded prof-img img-thumbnail" src="'.base_url().'images/profiili/'.$haut->Prof_Pic.'" />
						<p>'.$haut->Sposti.'</p>
					</div>
			</div>
		</div></a>';
	} else {
		echo '';
	}
}
?>
<?php endif ; ?>
