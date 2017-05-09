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
<?php
if (count($haku_tulokset) === 0) {
 echo '<h3>Ei tuloksia haulla '.filter_var($this->input->post("haku"), FILTER_SANITIZE_STRING).'.</h3>';
} else {
	echo '<h3>Tulokset haulla '.filter_var($this->input->post("haku"), FILTER_SANITIZE_STRING).'.</h3>';
}
?>
<?php
foreach($haku_tulokset as $haut) {
	if($haut->Näytä_Profiili == 'Kylla'){
		echo '<a style="text-decoration: none;" class="u_prof" href="'.base_url().'Haku/User/'.$haut->User_id.'/'.md5($haut->Sposti).'"><div class="panel panel-default u_prof">
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
	}
}
?>
<?php else : ?>
<?php
	foreach($all_users as $user) {
		if($user->Näytä_Profiili == 'Kylla'){
			echo '<a style="text-decoration: none;" class="u_prof" href="'.base_url().'Haku/User/'.$user->User_id.'/'.md5($user->Sposti).'"><div class="panel panel-default u_prof">
				<div class="panel-heading">
				<h4>'.$user->L_Name.' '. $user->F_Name.'</h4>
				</div>
					<div class="prof">
						<div class="prof-info panel-body">
						<img class="img-rounded prof-img img-thumbnail" src="'.base_url().'images/profiili/'.$user->Prof_Pic.'" />
							<p>'.$user->Sposti.'</p>
						</div>
				</div>
			</div></a>';
		}
	}
?>
<?php endif ; ?>
