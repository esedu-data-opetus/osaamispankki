<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h1>Asetukset</h1>
  </div>
  <div class="panel-body">
    <?php
        $U_Id = $this->session->userdata('user_id');
        $U_Sposti = $this->session->userdata('sposti');
      echo "<a href= ".base_url()."users/new_password/".md5($U_Sposti).">Vaihda salasana</a>"
    ?>
    <?php echo form_open('Profile/Settings/'.$U_Id.''); ?>
    <p>
      <?php echo form_label('Vahvista poistot: ');
        $data = array(
          'name'  =>  'del_vahvistus',
        );
      echo form_checkbox($data); ?>
    </p>
    <p>
      <?php echo form_label('Tallenna loki: ');
        $data = array(
          'name'  =>  'save_loki',
        );
      echo form_checkbox($data); ?>
    </p>
    <p>
      <?php
        $data = array(
          'name'  =>  'submit',
          'value' =>  'Tallenna!',
          'class' =>  'btn btn-success btn-lg',
        );
      echo form_submit($data); ?>
    </p>
    <?php echo form_close(); ?>
  </div>
</div>
