<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <?php foreach($user_data as $user) : ?>
        <img style="float: right; max-width: 100px; max-height: 100px;" src="<?php echo base_url(); ?>/images/profiili/<?php echo $user->Prof_Pic; ?>" class="img-responsive img-thumbnail">
        <h1 style="margin-bottom:50px;"><?php echo $user->F_Name; ?> profiili</h1>
    </div>
    <div class="Profile-Information">
      <div class="Prof-heading">
      </div>
      <div class="Prof-body">
      <p>
        <b>Nimi:</b><br>
        <?php echo $user->F_Name. ' ' .$user->L_Name; ?>
      </p>

      <p>
        <b>Sähköposti:</b><br>
        <?php echo $user->Sposti; ?>
      </p>

      <p>
        <b>Osoite:</b><br>
        <?php echo $user->Osoite; ?>
      </p>

      <p>
        <b>Postinumero:</b><br>
        <?php echo $user->Posti_Num; ?>
      </p>

      <p>
        <b>Puhelinnumero:</b><br>
        <?php echo $user->Puh_Num; ?>
      </p>

      <p>
        <b>Kuvaus:</b><br>
        <?php echo $user->About; ?>
      </p>

      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
