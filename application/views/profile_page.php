<h1>Oma profiili</h1>
<?php foreach($User_Info as $User) : ?>
  <p>Tervetuloa <?php echo $User->F_Name; ?>!</p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <img src="../images/profiili/<?php echo $User->Prof_Pic; ?>" class="img-thumbnail" title="<?php echo $User->Prof_Pic; ?>" height="200" width="200">
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Nimi: <?php echo $User->F_Name." ".$User->L_Name; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Osoite: <?php echo $User->Osoite; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Postinumero: <?php echo $User->Posti_Num; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Puhelinnumero: <?php echo $User->Puh_Num; ?></p>
<?php endforeach; ?>

<?php foreach($User_Info as $User) : ?>
  <p>Lyhyt kuvaus: <?php echo $User->About; ?></p>
<?php endforeach; ?>
