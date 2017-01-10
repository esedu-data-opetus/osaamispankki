<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php echo form_open('users/palaute'); ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <p style="float: right; margin: 12px 10px 20px 0;">
    <?php
    	$data = array('name'    =>    'submit',
    								'class'   =>    'btn btn-success btn-lg',
    								'value'   =>    'Lähetä Palaute'
                   );
    ?>
    <?php echo form_submit($data); ?>
    </p>
    <h1>Palaute</h1>
  </div>
  <div class="panel-body">
    <?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<?php if($this->session->userdata('is_logged_in')) : ?>
  <p style="width: 100px;">
  <?php echo form_label('Sähköposti:'); ?>
    <?php
      $data = array(
      'name'        => 'Sposti',
      'placeholder' => 'Sähköposti',
      'readonly'    => 'readonly',
      'value'       => $this->session->userdata('sposti'),

    );
    ?>
    <?php echo form_input($data); ?>
  </p>
<?php else : ?>
<p style="width: 100px;">
<?php echo form_label('Sähköposti:'); ?>
  <?php
    $data = array(
    'name'        => 'Sposti',
    'placeholder' => 'Sähköposti',
    'value'       => set_value('Sposti'),
  );
  ?>
  <?php echo form_input($data); ?>
</p>
<?php endif; ?>
<p style="width: 100px;">
<?php echo form_label('palaute:'); ?>
<?php
	$data = array('name'        => 'Palaute',
								'value'       => set_value('Palaute'),
                'style'       => 'max-width: 1101',
                'placeholder' => 'Kirjoita palaute tähän'
              );
	?>
<?php echo form_textarea($data); ?>
</p>
</div>
</div>
<?php echo form_close(); ?>
