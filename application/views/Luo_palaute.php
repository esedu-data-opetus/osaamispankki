<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h1>Palaute</h1>
  </div>
<div class="panel-body">
<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<?php echo form_open('Palaute/Palautteesi'); ?>
<?php if($this->session->userdata('is_logged_in')) : ?>
  <p>
    <?php
      $data = array(
      'name'        => 'Sposti',
      'readonly'    => 'readonly',
      'placeholder' => 'Sähköposti',
      'class'       => 'form-control',
      'value'       => $this->session->userdata('sposti'),
      'style'       => 'display: none',

    );
    ?>
    <?php echo form_input($data); ?>
  </p>
<?php else : ?>
<p>
  <?php
    $data = array(
    'name'        => 'Sposti',
    'placeholder' => 'Sähköposti',
    'class'       => 'form-control',
    'value'       => set_value('Sposti'),
  );
  ?>
  <?php echo form_input($data); ?>
</p>
<?php endif; ?>
<p>
	<select name="Aihe" id="select" onchange="validateDropdown();" class="form-control">
    <option disabled selected value="0">Valitse Aihe</option>
    <option name="knimi" value="Negativinen">Negativinen</option>
    <option name="knimi" value="Positiivinen">Positiivinen</option>
    <option name="knimi" value="Parantaa">Parantaa</option>
    <option name="knimi" value="Salsana">Salasana</option>
    <option name="knimi" value="Profiili">Profiili</option>
    <option name="knimi" value="Kortit">Kortit</option>
    <option name="knimi" value="Koulutus">Koulutus</option>
    <option name="knimi" value="Tyohistoria">Työhistoria</option>
    <option name="knimi" value="Harrastukset">Harrastukset</option>
	</select>
</p>
<p>
<?php
	$data = array(
                'rows'        => '5',
                'name'        => 'Palaute',
                'class'       => 'form-control',
                'value'       => set_value('Palaute'),
                'placeholder' => 'Kirjoita palaute tähän',
              );
	?>
<?php echo form_textarea($data); ?>
</p>
<p>
  <?php
   $data = array(
              'name'    =>    'submit',
              'class'   =>    'btn btn-success btn-lg',
              'value'   =>    'Lähetä Palaute'
             );
  ?>
  <?php echo form_submit($data); ?>
</p>
</div>
</div>
<?php echo form_close(); ?>
