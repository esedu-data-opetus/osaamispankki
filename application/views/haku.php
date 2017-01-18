<?php echo form_open('users/haku'); ?>
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


<h1>↓H↓A↓K↓U↓T↓U↓L↓O↓K↓S↓E↓T↓</h1>
<?php if($Profile) : ?>
<?php	foreach($Profile as $Prof) : ?>
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
<div class="panel-body">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3>Harrastukset</h3>
	</div>
	<div class="panel-body">
<?php if($Harrastukset) : ?>
	<?php	foreach($Harrastukset as $Hobby) : ?>
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
	<?php endforeach; ?>
<?php else : ?>
	<h1 class="error-message">Käyttäjällä ei ole harrastuksia!</h1>
<?php endif;?>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
<?php endif;?>
