<h1>Profiili</h1>
<p>Pitäisi echottaa "Tervetuloa Etunimi Sukunimi"</p>
<?php foreach($User_Info as $User) : ?>
  <p>Tervetuloa <?php echo $User_Info->F_Name." ".$User_Info->L_Name; ?></p>
<?php endforeach; ?>
