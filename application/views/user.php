<div class="share-prof-info">
<?php foreach($user_data as $user) : ?>
<div class="panel panel-default">
  <div style="overflow:auto;" class="panel-heading">
      <img style="float: right; max-width: 100px; max-height: 100px;" src="<?php echo base_url(); ?>/images/profiili/<?php echo $user->Prof_Pic; ?>" class="img-responsive img-thumbnail">
      <h1><?php echo $user->F_Name.' '.$user->L_Name; ?></h1>
      <?php if($this->session->userdata('KT') >= 2) : ?>
        <a href="<?php echo base_url(); ?>Profile/PDF/<?php echo $user->User_id; ?>/<?php echo md5($user->Sposti); ?>" class="btn btn-info"><span class="glyphicon glyphicon-print"></span></a>
      <?php endif; ?>
      <?php foreach($suositukset as $suos) : ?>
        <?php if($suos->Suositeltu == $user->Sposti) : ?>
          <?php if($this->session->userdata('sposti') == $suos->Suosittelija) : ?>
            <?php $suositeltu = 'Kylla'; ?>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; ?>
  <?php if(!isset($suositeltu) && $this->session->userdata('sposti') && $this->session->userdata('sposti') !== $user->Sposti) : ?>
  <?php echo form_open('Profile/suosittelija'); ?>
  <?php
  $data = array(
    'name'        => 'suosittelija',
    'style'       => 'display: none;',
    'placeholder' => 'Suosittelijan sähköposti',
    'class' 			=> 'form-control',
    'readonly'    => 'readonly',
    'value'       => $user->Sposti,
  );
  ?>
  <?php echo form_input($data); ?>
  <?php
  $data = array(
    'name'  => 'submit',
    'value' => "Suosittele",
    'class' => 'btn btn-success',
  );
  ?>
  <?php echo form_submit($data); ?>
  <?php echo form_close(); ?>
  <?php endif; ?>
</div>
<?php if($this->session->userdata('is_logged_in') !== true) : ?>
  <div class="panel-body">
    <div class="Prof-body">
    <h3>
      <b>Sähköposti:</b>
    </h3>
      <p><?php echo $user->Sposti; ?></p>
    <h3>
    </div>
  <?php else : ?>
    <div class="panel-body">
      <div class="Prof-body">
      <h3>
        <b>Sähköposti:</b>
      </h3>
        <p><?php echo $user->Own_Email; ?></p>
      <h3>
        <b>Kielitaito:</b>
      </h3>
        <p><?php echo $user->Kielitaito; ?></p>
      <h3>
        <b>Osoite:</b>
      </h3>
        <p><?php echo $user->Osoite; ?></p>
      <h3>
        <b>Postinumero:</b>
      </h3>
      <p><?php echo $user->Posti_Num; ?></p>
      <h3>
        <b>Puhelinnumero:</b>
      </h3>
        <p><?php echo $user->Puh_Num; ?></p>
      <h3>
        <b>Vapaasana:</b>
      </h3>
      <p><?php echo $user->About; ?></p>

      <?php if (isset($harrastus)) : ?>
        <?php foreach($harrastus as $hobby) : ?>
          <?php if ($hobby->User_id == $this->uri->segment(3)) : ?>
          <?php $hobby_here = true; ?>
        <?php endif; ?>
      <?php endforeach; ?>
      <?php if(isset($hobby_here)) : ?>
      <h3>
        <b>Harrastukset:</b>
      </h3>
      <?php foreach($harrastus as $hobby) : ?>
        <p><b>Harrastus:</b> <?php echo $hobby->harrastus; ?></p>
        <p><b>Vapaasana:</b> <?php echo $hobby->vapaasana; ?></p>
        <hr>
      <?php endforeach; ?>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($tyohistoria)) : ?>
    <?php foreach($tyohistoria as $tyo) : ?>
      <?php if ($tyo->User_id == $this->uri->segment(3)) : ?>
      <?php $tyo_here = true; ?>
    <?php endif; ?>
  <?php endforeach; ?>
  <?php if(isset($tyo_here)) : ?>
  <h3>
    <b>Työhistoria:</b>
  </h3>
  <?php foreach($tyohistoria as $tyo) : ?>
    <p><b>Työpaikka:</b> <?php echo $tyo->tyopaikka; ?></p>
    <p><b>Tehtävä:</b> <?php echo $tyo->tehtava; ?></p>
    <p><b>Alkoi:</b> <?php echo $tyo->alkoi; ?></p>
    <p><b>Loppui:</b> <?php echo $tyo->loppui; ?></p>
    <p><b>Kuvaus:</b> <?php echo $tyo->kuvaus; ?></p>
    <hr>
  <?php endforeach; ?>
  <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($koulutus)) : ?>
    <?php foreach($koulutus as $koulu) : ?>
      <?php if ($koulu->User_id == $this->uri->segment(3)) : ?>
      <?php $koulu_here = true; ?>
    <?php endif; ?>
  <?php endforeach; ?>
  <?php if(isset($koulu_here)) : ?>
  <h3>
    <b>Koulutukset:</b>
  </h3>
  <?php foreach($koulutus as $koulu) : ?>
    <p><b>Koulutusnimi:</b> <?php echo $koulu->koulutusnimi; ?></p>
    <p><b>Koulutusaste:</b> <?php echo $koulu->koulutusaste; ?></p>
    <p><b>Oppilaitos:</b> <?php echo $koulu->oppilaitos; ?></p>
    <p><b>Alkoi:</b> <?php echo $koulu->alkoi; ?></p>
    <p><b>Loppui:</b> <?php echo $koulu->loppui; ?></p>
    <p><b>Vapaasana:</b> <?php echo $koulu->vapaasana; ?></p>
    <hr>
  <?php endforeach; ?>
  <?php endif; ?>
  <?php endif; ?>

  <?php if (isset($kortit)) : ?>
    <?php foreach($kortit as $kortti) : ?>
      <?php if ($kortti->User_id == $this->uri->segment(3)) : ?>
      <?php $kortti_here = true; ?>
    <?php endif; ?>
  <?php endforeach; ?>
  <?php if(isset($kortti_here)) : ?>
  <h3>
    <b>Kortit:</b>
  </h3>
  <?php foreach($kortit as $kortti) : ?>
    <p><b>Kortti:</b> <?php echo $kortti->kortti; ?></p>
    <p><b>Loppuu:</b> <?php echo $kortti->loppuu; ?></p>
    <p><b>vapaasana:</b> <?php echo $kortti->vapaasana; ?></p>
    <hr>
  <?php endforeach; ?>
  <?php endif; ?>
  <?php endif; ?>
      </div>
  <?php endif; ?>
  </div>
</div>
<?php endforeach; ?>
</div>
