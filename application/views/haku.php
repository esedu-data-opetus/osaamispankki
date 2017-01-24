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
	$Hakusana = filter_var($this->input->post('haku'), FILTER_SANITIZE_STRING);

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

	$Hakutulokset = array(
		' '.$Prof->F_Name,
		' '.$Prof->L_Name,
	  ' '.$Prof->Sposti,
		' '.$Prof->Puh_Num,
		' '.$Prof->About,
		' '.$Harrastus,
	);
//↓Testausta↓
	foreach($Hakutulokset as $Haut) {
		$pos = strpos($Haut, $Hakusana);
		if ($pos == True) {
			echo '<b>"'.$Hakusana.'" Löyti Täältä<span class="glyphicon glyphicon-chevron-right"></span>|</b>';
			$r_pos = $pos - 1;
			$is = "<b>|<span class='glyphicon glyphicon-chevron-left'></span>".$r_pos." kirjaimen jälkeen!</b>";
			$col = "color: red; font-weight: bold;";
		} else {
			$is = "";
			$col = "";
		}
		echo "<span style='".$col."'>".trim($Haut)."</span>".$is."<br>";
	}
	echo "<br>";
//↑Testausta↑
	if(in_array($Hakusana, $Hakutulokset) || $pos == true) : ?>
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
		</div>
	<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif;?>

<!-- HARRASTUKSET
<div class="panel panel-primary">
<div class="panel-heading">
<h3>Harrastukset</h3>
</div>
<div class="panel-body">
<?php if($Harrastukset) : ?>
<?php	foreach($Harrastukset as $Hobby) : ?>
<?php if($Hobby->User_id == $Prof->User_id) : ?>
<table class="table">
<thead>
<tr>
<th><p>Harrastus</p></th>
<th><p>Vapaasana</p></th>
</tr>
</thead>
<tbody>
<tr>
<td><p><?php echo $Hobby->harrastus; ?></p></td>
<td><p><?php echo $Hobby->vapaasana; ?></p></td>
</tr>
</tbody>
</table>
<?php endif;?>
<?php endforeach; ?>
<?php else : ?>
<p class="error-message">Käyttäjällä ei ole harrastuksia!</p>
<?php endif;?>
</div>
</div> -->

<!-- TYÖHISTORIA
<div class="panel panel-primary">
<div class="panel-heading">
<h3>Työhistoria</h3>
</div>
<div class="panel-body">
<?php if($Tyohistoria) : ?>
<?php	foreach($Tyohistoria as $Tyo) : ?>
<?php if($Tyo->User_id == $Prof->User_id) : ?>
<table class="table">
<thead>
<tr>
<td><p>Työpaikka</p></td>
<td><p>Tehtävä</p></td>
<td><p>Alkoi</p></td>
<td><p>Loppui</p></td>
<td><p>Vapaasana</p></td>
</tr>
</thead>
<tbody>
<tr>
<td><p><?php echo $Tyo->tyopaikka; ?></p></td>
<td><p><?php echo $Tyo->tehtava; ?></p></td>
<td><p><?php echo $Tyo->alkoi; ?></p></td>
<td><p><?php echo $Tyo->loppui; ?></p></td>
<td><p><?php echo $Tyo->kuvaus; ?></p></td>
</tr>
</tbody>
</table>
<?php endif;?>
<?php endforeach; ?>
<?php else : ?>
<p class="error-message">Käyttäjällä ei ole harrastuksia!</p>
<?php endif;?>
</div>
</div> -->
