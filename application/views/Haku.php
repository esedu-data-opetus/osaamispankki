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

<h3>Tulokset haulla <?php echo filter_var($this->input->post('haku'), FILTER_SANITIZE_STRING); ?></h3>



<?php if($Profile) : ?>
<?php	foreach($Profile as $Prof) : ?>
	<?php if(empty($this->input->post('haku'))) : ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="prof">
			<img class="img-rounded prof-img" src="<?php echo base_url(); ?>images/profiili/<?php echo $Prof->Prof_Pic ?>" />
			<div class="prof-info">
				<p><?php echo $Prof->F_Name." ".$Prof->L_Name ?></p>
				<p><?php echo $Prof->Puh_Num; ?></p>
				<p><?php echo $Prof->Sposti; ?></p>
				<p><?php echo $Prof->About; ?></p>
			</div>
		</div>
	</div>
<!-- <div class="panel-body">

</div> -->
</div>
<?php else : ?>
	<?php
	$Haettu = filter_var($this->input->post('haku'), FILTER_SANITIZE_STRING);
	$Hakusana = trim($Haettu);

if (!isset($Harrastus)) {
	$Harrastus = "";
}

foreach($Harrastukset as $Hobby) {
	if ($Prof->User_id == $Hobby->User_id) {
		$Harrastus = "Harrastus";
	} else {
		$Harrastus = "";
	}
}

	$Display = array(
		$Prof->F_Name.' '.$Prof->L_Name,
	  $Prof->Sposti,
		$Prof->Puh_Num,
		$Prof->About,
		$Harrastus,
	);

	foreach($Display as $Dis) {
		$pos = strpos(' '.$Dis, $Hakusana);
	if ($pos == True) {
		$r_pos = $pos - 1;
		$col = "color: red; font-weight: bold;";
		$Left = '<b>"'.$Hakusana.'" Löyti Täältä<span class="glyphicon glyphicon-chevron-right"></span>|</b><span style="'.$col.'">';
		$Right = "</span><b>|<span class='glyphicon glyphicon-chevron-left'></span>".$r_pos." kirjaimen jälkeen!</b><br>";
	} else {
		$col = "";
		$Left = "";
		$Right = "<br>";
	}
	echo $Left.trim($Dis).$Right;
}

	$Hakutulokset = array(
		$Prof->F_Name.
		$Prof->L_Name.
	  $Prof->Sposti.
		$Prof->Puh_Num.
		$Prof->About.
		$Harrastus,
	);
	foreach($Hakutulokset as $Haut) {
		$pos = strpos(' '.$Haut, $Hakusana);
		if ($pos == true) {
			echo '<div class="panel panel-default">
				<div class="panel-heading">
					<div class="prof">
						<img class="img-rounded prof-img" src="'.base_url().'images/profiili/'.$Prof->Prof_Pic.'" />
						<div class="prof-info">
							<p>'.$Prof->F_Name.' '.$Prof->L_Name.'</p>
							<p>'.$Prof->Puh_Num.'</p>
							<p>'.$Prof->Sposti.'</p>
							<p>'.$Prof->About.'</p>
						</div>
					</div>
				</div>
			</div>';
		}
	}
?>
<?php endif;?>
<?php endforeach; ?>
<?php endif;?>
