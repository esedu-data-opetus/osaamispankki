<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('Haku'); ?>
<p style="display: inline">
<?php
	$data = array('name'        => 'haku',
								'class'				=> 'form-control',
								'style' 			=> 'width: 300px; display: inline;',
								'value'       => set_value('email'),
                'placeholder' => 'Kirjoita haku tähän');
	?>
<?php echo form_input($data); ?>
</p>
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
// if (isset($haku_tulokset))
// 	print_r($haku_tulokset);
// else {
// 	echo "<p>Et hakenut vielä";
// }

foreach($haku_tulokset as $haut) {
		echo '<div class="panel panel-default">
			<div class="panel-heading">
			<p>'.$haut->F_Name.' '. $haut->L_Name.'</p>
			</div>
				<div class="prof">
					<div class="prof-info panel-body">
					<img class="img-rounded prof-img img-thumbnail" src="'.base_url().'images/profiili/'.$haut->Prof_Pic.'" />
						<p>'.$haut->Sposti.'</p>
						<p>'.$haut->About.'</p>
					</div>
			</div>
		</div>';
}
?>
<?php endif ; ?>