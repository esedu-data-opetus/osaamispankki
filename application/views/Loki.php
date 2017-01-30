<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-info">
  <div class="panel-heading">
    <h1 style="margin:0; padding:0;">Loki</h1>
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
