<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="panel panel-default">
  <div class=panel-heading>
    <h1>Palaute</h1>
  </div>
<div class=panel-body>
<table class="table">
  <thead>
  <tr>
    <th>SähköPosti</th>
    <th>Aihe</th>
    <th>palaute</th>
    <th>Options</th>
  </tr>
</thead>
<tbody>
<?php foreach($Palautteet as $Palaute) : ?>
  <tr>
    <td><p><?php echo $Palaute->Sposti; ?></p></td>
    <td><p><?php echo $Palaute->Aihe; ?></p></td>
    <td><p><?php echo $Palaute->Palaute; ?></p></td>
    <td>
      <a class="btn btn-warning" title="Luettu!"><span class="glyphicon glyphicon-pushpin"></span></a>
      <a class="btn btn-success" title="Korjattu!"><span class="glyphicon glyphicon-ok"></span></a>
      <a onclick="return confirm('Halutako Poistaa Palautteen?');" class="btn btn-danger" title="Posta!"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
