<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h1>Profiilin jakaminen</h1>
  </div>
<div class="panel-body">
<?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
<?php echo form_open('profile/share'); ?>
  <p>
    <?php
      $data = array(
      'name'        => 'Sposti',
      'placeholder' => 'Sähköposti',
      'class'       => 'form-control',
      'value'       => 'Sposti',

    );
    ?>
    <?php echo form_input($data); ?>
  </p>
<p>
  <?php
   $data = array(
              'name'    =>    'submit',
              'class'   =>    'btn btn-success btn-lg',
              'value'   =>    'Lähetä'
             );
  ?>
  <?php echo form_submit($data); ?>
</p>
</div>
</div>
<?php echo form_close(); ?>
