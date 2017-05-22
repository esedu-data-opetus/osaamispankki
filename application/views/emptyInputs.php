<div class="panel panel-info">
  <div class="panel-heading">
    <h1>Sinulta puuttuu nämä perustiedot.</h1>
  </div>
  <div class="panel-body">
    <?php
     foreach ($Prof_Info as $Prof) {
       if (empty($Prof->spv) || empty($Prof->skk) || empty($Prof->svs)) {
         $bd = 'inline';
         if (empty($Prof->spv)) {
           $spv = set_value('spv');
         } else {
           $spv = $Prof->spv;
         }
         if (empty($Prof->skk)) {
           $skk = set_value('skk');
         } else {
           $skk = $Prof->skk;
         }
         if (empty($Prof->svs)) {
           $svs = set_value('svs');
         } else {
           $svs = $Prof->svs;
         }
       } else {
         $bd = 'none';
         $spv = $Prof->spv;
         $skk = $Prof->skk;
         $svs = $Prof->svs;
       }
       if (empty($Prof->Kielitaito)) {
         $Kt = 'inline';
         $kielt = set_value('kielitaito');
       } else {
         $Kt = 'none';
         $kielt = $Prof->Kielitaito;
       }
       if (empty($Prof->F_Name) || empty($Prof->L_Name)) {
         $NM = 'inline';
         if (empty($Prof->F_Name)) {
           $F_Name = set_value('F_Name');
         } else {
           $F_Name = $Prof->F_Name;
         }
         if (empty($Prof->L_Name)) {
           $L_Name = set_value('L_Name');
         } else {
           $L_Name = $Prof->L_Name;
         }
       } else {
         $NM = 'none';
         $F_Name = $Prof->F_Name;
         $L_Name = $Prof->L_Name;
      }
      if (empty($Prof->Osoite)) {
        $Os = 'inline';
        $Osoite = set_value('address');
      } else {
        $Os = 'none';
        $Osoite = $Prof->Osoite;
      }
      if (empty($Prof->Puh_Num)) {
        $Pn = 'inline';
        $Puh_Num = set_value('puh');
      } else {
        $Pn = 'none';
        $Puh_Num = $Prof->Puh_Num;
      }
      if (empty($Prof->Posti_Num)) {
        $np = 'inline';
        $Posti_Num = set_value('p_num');
      } else {
        $np = 'none';
        $Posti_Num = $Prof->Posti_Num;
      }
      if (empty($Prof->Own_Email)) {
        $Oe = 'inline';
        $Own_Email = set_value('email');
      } else {
        $Oe = 'none';
        $Own_Email = $Prof->Own_Email;
      }
      if (empty($Prof->About)) {
        $at = 'inline';
        $about = set_value('about');
      } else {
        $at = 'none';
        $about = $Prof->About;
      }
    }
    ?>
    <?php echo form_open('profile/profile_update/'.$this->session->userdata('user_id').''); ?>
    <span class="text-muted" style="display: <?php echo $bd; ?>">
      Syntymäpäivä:<br>
      <input name="spv" class="form-control" type="number" value="<?php echo $spv; ?>" placeholder="Päivä" style="display: inline; width: 30%;">
      <input name="skk" class="form-control" type="number" value="<?php echo $skk; ?>" placeholder="Kuukausi" style="display: inline; width: 30%;">
      <input name="svs" class="form-control" type="number" value="<?php echo $svs; ?>" placeholder="Vuosi" style="display: inline; width: 30%;">
    <hr>
  </span>
    <span class="text-muted" style="display: <?php echo $Kt; ?>">Kielitaito:<br>
      <input name="kielitaito" class="form-control" type="text" value="<?php echo $kielt; ?>" placeholder="Kielitaito">
    <hr>
    </span>
  <span class="text-muted" style="display: <?php echo $Oe; ?>">Toinen sähköpostiosoite:<br>
      <?php
      $data = array(
        'name'        => 'email',
        'class'       => 'form-control',
        'placeholder' => 'Henkilökohtainen sähköposti',
        'value'       =>  $Own_Email,
      );
      ?>
      <?php echo form_input($data); ?>
      <hr>
    </span>
  <span class="text-muted" style="display: <?php echo $NM; ?>">Nimi:<br>
    	<?php
    	$data = array(
    		'name'        =>  'F_Name',
        'class'       =>  'form-control',
        'placeholder' =>  'Etunimi',
    		'value'       =>  $F_Name,
        'style'       =>  'display: inline; width: 40%;',
    	);
    	?>
    	<?php echo form_input($data); ?>
    	<?php
    	$data = array(
    		'name'        =>  'L_Name',
        'class'       =>  'form-control',
        'placeholder' =>  'Sukunimi',
    		'value'       =>  $L_Name,
        'style'       =>  'display: inline; width: 40%;',
    	);
    	?>
    	<?php echo form_input($data); ?>
      <hr>
    </span>
  <span class="text-muted" style="display: <?php echo $Os; ?>">Osoite:<br>
    	<?php
    	$data = array(
    		'name'        => 'address',
        'class'       => 'form-control',
        'placeholder' => 'Osoite',
    		'value'       => $Osoite,
    	);
    	?>
    	<?php echo form_input($data); ?>
      <hr>
    </span>
  <span class="text-muted" style="display: <?php echo $np; ?>">Postinumero:<br>
    	<?php
    	$data = array(
    		'name'        => 'p_num',
        'class'       => 'form-control',
        'placeholder' => 'Postinumero',
    		'value'       => $Posti_Num,
    	);
    	?>
    	<?php echo form_input($data); ?>
      <hr>
    </span>
  <span class="text-muted" style="display: <?php echo $Pn; ?>">Puhelinnumero:<br>
      <?php
      $data = array(
        'name'        => 'puh',
        'class'       => 'form-control',
        'placeholder' => 'Puhelinnumero',
        'value'       =>  $Puh_Num,
      );
      ?>
      <?php echo form_input($data); ?>
      <hr>
    </span>
  <span class="text-muted" style="display: <?php echo $at; ?>">Vapaasana:<br>
      <?php
      $data = array(
        'name'        => 'about',
        'class'       => 'form-control',
        'placeholder' => 'vapaasana',
        'value'       =>  $about,
      );
      ?>
      <?php echo form_textarea($data); ?>
      <hr>
    </span>
    <?php
      $data = array(
        'name' => 'submit',
        'class' => 'btn btn-success',
        'value' => 'Lisää!',
      );
      echo form_submit($data);
    ?>
    <?php echo form_close(); ?>
  </div>
</div>
