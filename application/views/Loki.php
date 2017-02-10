<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-info">
  <div class="panel-heading" style="overflow: hidden;">
    <h1 style="float: left; margin:0; padding:0;">Historia</h1>
    <a href="<?php echo base_url(); ?>Loki/Clear/<?php echo $this->session->userdata('user_id'); ?>" title="Tyhjennä tapahtuma historia!" style="float: right;" class="btn btn-danger btn-lg" ><span class="glyphicon glyphicon-trash"></span></a>
  </div>
  <div class="panel-body" style="margin:0; padding:0;">
    <table class="table" style="margin:0; padding:0;">
      <thead>
        <tr>
          <th>Aika</th>
          <th>Päivä</th>
          <th>Tapahtuma</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($Historia as $Loki) : ?>
        <tr>
          <td><?php echo $Loki->Aika; ?></td>
          <td><?php echo $Loki->Paiva; ?></td>
          <td><?php echo $Loki->Toiminta; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
