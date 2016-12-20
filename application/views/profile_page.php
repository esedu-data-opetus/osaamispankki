<style>
.table td:hover {
  overflow-x: auto;
}
td {
  overflow: hidden;
}
.table td input {

}
/*top, right, bottom, left*/
.plus {
  margin: -2 -2 0 0;
}

.add-btn {
  float: right;
}

.save-btn {
  margin: -70px 0 0 260px;
}
.upload-btn {
  margin: 0 0 -10px 0;
}
</style>
<br>
<div class="panel panel-default">
<div class="panel-heading">
<h1>Oma profiili</h1>
<?php foreach($User_Info as $User) : ?>
  <p>Tervetuloa <?php echo $User->F_Name; ?>!</p>
<?php endforeach; ?>
</div>

<div class="panel-body">
<?php foreach($User_Info as $User) : ?>
  <img style="float: left; margin: 0 20px 0 0;" src="<?php echo base_url(); ?>/images/profiili/<?php echo $User->Prof_Pic; ?>" class="img-responsive img-thumbnail" title="<?php echo $User->Prof_Pic; ?>" height="200" width="200">
<?php endforeach; ?>

<!-- <div style="margin-top: 15px;">
<?php
  echo form_open_multipart('Upload_controller/do_upload');
  echo "<input type='file' id='uploadBox' name='userfile' size='20' class=''/>";
  echo '<br>';
  echo "<input type='submit' id='nappi' name='submit' value='Lataa' class='btn btn-success' disabled/> ";
  echo "</form>";
?>
</div> -->

<?php foreach($User_Info as $User) : ?>
<?php
if (isset($_GET['Prof_Edit'])) {
  if ($_GET['Prof_Edit'] == $User->User_id) {
    $nimi = "<input type='text' value='".$User->F_Name."'> <input type='text' value='".$User->L_Name."'>";
    $s_posti = "<input type='text' value='".$User->Own_Email."'>";
    $osoite = "<input type='text' value='".$User->Osoite."'>";
    $p_num = "<input type='text' value='".$User->Posti_Num."'>";
    $puh = "<input type='text' value='".$User->Puh_Num."'>";
    $kuvaus = "<input type='text' value='".$User->About."'>";
    $kuva = "<input type='file' id='uploadBox' name='userfile' size='20' class=''/></br>
            <input type='submit' id='nappi' name='submit' value='Lataa' class='btn btn-success upload-btn' disabled/>";
    $btn = '<a href="'.base_url().'profile/index" class="btn btn-primary save-btn" title="Tallenna muutokset">Tallenna</a>';
  } else {
    $nimi = $User->F_Name." ".$User->L_Name;
    $s_posti = $User->Own_Email;
    $osoite = $User->Osoite;
    $p_num = $User->Posti_Num;
    $puh = $User->Puh_Num;
    $kuvaus = $User->About;
    $kuva = "";
    $btn = '<a href="'.base_url().'profile/index?Prof_Edit='.$User->User_id.'" class="btn btn-primary" title="Muokkaa profiilia"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
} else {
  $nimi = $User->F_Name." ".$User->L_Name;
  $s_posti = $User->Own_Email;
  $osoite = $User->Osoite;
  $p_num = $User->Posti_Num;
  $puh = $User->Puh_Num;
  $kuvaus = $User->About;
  $kuva = "";
  $btn = '<a href="'.base_url().'profile/index?Prof_Edit='.$User->User_id.'" class="btn btn-primary" title="Muokkaa profiilia"><span class="glyphicon glyphicon-pencil"></span></a>';
}
?>
  <p>Nimi: <?php echo $nimi; ?></p>

  <p>Sähköposti: <?php echo $s_posti; ?></p>

  <p>Osoite: <?php echo $osoite; ?></p>

  <p>Postinumero: <?php echo $p_num; ?></p>

  <p>Puhelinnumero: <?php echo $puh; ?></p>

  <p>Kuvaus: <?php echo $kuvaus; ?></p>

  <p><?php echo $kuva; ?></p>
<?php echo $btn; ?>
<?php endforeach; ?>
<div class="panel panel-default" style="margin: 20px 0 0 0;">
  <div class="panel-heading">
    <?php if (isset($_GET['select'])) : ?>
    <a href="<?php echo base_url(); ?>profile?add_meta" class="btn btn-success" style="float: right; display: inline;"><span class="glyphicon glyphicon-plus"></span></a>
    <a href="<?php echo base_url(); ?>profile/delete_meta/<?php echo $_GET['select']; ?>" class="btn btn-danger" style="float: left;"><span class="glyphicon glyphicon-trash"></span></a>
<?php else : ?>
  <a href="<?php echo base_url(); ?>profile?add_meta" class="btn btn-success" style="float: left; display: inline;"><span class="glyphicon glyphicon-plus"></span></a>
  <a href="<?php echo base_url(); ?>profile?add_meta" class="btn btn-success" style="float: right; display: inline;"><span class="glyphicon glyphicon-plus"></span></a>
<?php endif; ?>
    <h1 style="text-align: center; margin: 0; padding: 0;">Metatieto!</h1>
  </div>
  <div class="panel-boody" style="padding: 10px;">
    <?php if (isset($_GET['add_meta'])) : ?>
    <div style="padding: 10px;">
      <form action="<?php echo base_url(); ?>profile/add_meta" method="post" enctype="multipart/form-data">
        <input autofocus type="text" name="Tieto">
        <input type="submit" value="Luo">
      </form>
      <hr>
    </div>
  <?php endif; ?>
<?php if (empty($meta_tieto)) : ?>
  <h1 style='margin:0;padding:0;color:red;font-weight:bold;font-size:25px;'>Metatietoja ei ole lisätty</h1>
<?php else : ?>
    <?php
    foreach ($meta_tieto as $meta) {
        if (isset($_GET['select'])) {
          if ($_GET['select'] == $meta->id) {
            $this->session->set_userdata('selected', $meta->id);
            $style = 'style="background-color: #337ab7; text-decoration: none; color: white; padding: 0 4px 0 4px; border: 1px solid black; border-radius: 10px;"';
          } else {
            $style = 'style="text-decoration: none; color: black; padding: 0 4px 0 4px; border: 1px solid black; border-radius: 10px;"';
          }
        } else {
          $style = 'style="text-decoration: none; color: black; padding: 0 4px 0 4px; border: 1px solid black; border-radius: 10px;"';
        }

          if (isset($_GET['select'])) {
            if ($_GET['select'] == $meta->id) {
              echo '<a '.$style.' href="'.base_url().'profile">'.$meta->Tieto.'</a>';
            } else {
              echo '<a '.$style.' href="'.base_url().'profile?select='.$meta->id.'">'.$meta->Tieto.'</a>';
            }
          } else {
            echo '<a '.$style.' href="'.base_url().'profile?select='.$meta->id.'">'.$meta->Tieto.'</a>';
          }
        }
    ?>
  <?php endif; ?>
  </div>
</div>
</div>
</div>
<br>

<!--Harrastukset-->
<div class="panel panel-primary">
  <div class=panel-heading>
    <h3 class=panel-title>
      <span style="font-size: 22px;">Harrastukset</span>
      <a href="<?php echo base_url() ?>profile/prototype/Harrastus" class="btn btn-success add-btn" title="Lisää harrastus"><span class="glyphicon glyphicon-plus plus"></span></a>
    </h3>
  </div>
  <div class=panel-body>
<?php foreach($kokemus as $check) : ?>
  <?php if($check->Aihe == "Harrastus") {
    $hobbyexists = TRUE;
  }
  ?>
<?php endforeach; ?>
<?php if(!isset($hobbyexists)) : ?>
  <h1 style='margin:0;padding:0;color:red;font-weight:bold;font-size:25px;'>Harrastuksia ei ole lisätty</h1>
<?php else : ?>
<table class="table">
<thead>
  <tr>
    <th>Harrastus</th>
    <th>Vapaa sana</th>
    <th>Settings</th>
  </tr>
</thead>
<tbody>
<?php foreach($kokemus as $hobby) : ?>
  <?php if ($hobby->Aihe == 'Harrastus') : ?>
  <tr>
<?php
  if (isset($_GET['Edit'])) {
    if ($_GET['Edit'] !== $hobby->id) {
      $Harrastus  =   $hobby->Loota_1;
      $Mielipide  =   $hobby->Mielipide;
      $Save       =   '<a href="'.base_url().'profile/index?Edit='.$hobby->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
    } else {
      // $Save = '<a href="'.base_url().'profile/kokemus_update/'.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>';
      $Harrastus  =   '<input style="max-width: 180px;" name="Loota_1" type="text" value="'.$hobby->Loota_1.'" />';
      $Mielipide  =   '<input name="Mielipide" type="text" value="'.$hobby->Mielipide.'" />';
      $Save       =   '<input type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset">';
    }
  } else {
    $Harrastus    =   $hobby->Loota_1;
    $Mielipide    =   $hobby->Mielipide;
    $Save         =   '<a href="'.base_url().'profile/index?Edit='.$hobby->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
?>

<form action="<?php echo base_url(); ?>profile/kokemus_update/<?php echo $hobby->id; ?>" enctype="multipart/form-data" method="post">
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Harrastus; ?></td>
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Mielipide; ?></td>
    <td>
    <?php echo $Save; ?>
      <a onclick="return confirm('Oletko Varma!?');" href="<?php echo base_url(); ?>profile/delete/<?php echo $hobby->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </form>
  </tr>
<?php endif; ?>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</div>
</div>
<br>

<!--Työhistoria-->
<div class="panel panel-primary">
  <div class=panel-heading>
   <h3 class=panel-title>
    <span style="font-size: 22px;">Työhistoria</span>
    <a href="<?php echo base_url() ?>profile/prototype/Tyohistoria" class="btn btn-success add-btn" title="Lisää työhistoria"><span class="glyphicon glyphicon-plus plus"></span></a>
  </h3>
</div>
<div class=panel-body>
  <?php foreach($kokemus as $check) : ?>
    <?php if($check->Aihe == "Tyohistoria") {
      $tyohistoryexists = TRUE;
    }
    ?>
  <?php endforeach; ?>
<?php if(!isset($tyohistoryexists)) : ?>
  <h1 style='margin:0;padding:0;color:red;font-weight:bold;font-size:25px;'>Työhistoriaa ei ole lisätty</h1>
<?php else : ?>
<table class="table">
<thead>
  <tr>
    <th>Työpaikka</th>
    <th>Tehtävä</th>
    <th>Alkoi</th>
    <th>Loppui</th>
    <th>Kuvaus</th>
    <th style="min-width: 110px;">Settings</th>
  </tr>
</thead>
<tbody>
<?php foreach($kokemus as $work_h) : ?>
  <?php if ($work_h->Aihe == 'Tyohistoria') : ?>
  <tr>
<?php
  if (isset($_GET['Edit'])) {
    if ($_GET['Edit'] !== $work_h->id) {
      $Työpaikka  =   $work_h->Loota_1;
      $Tehtävä    =   $work_h->Loota_2;
      $Alkoi      =   $work_h->Aloitit;
      $Loppui     =   $work_h->Lopetit;
      $Kuvaus     =   $work_h->Mielipide;
      $Save       =   '<a href="'.base_url().'profile/index?Edit='.$work_h->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
    } else {
      // $Save = '<a href="'.base_url().'profile/kokemus_update/'.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>';
      $Työpaikka  =  '<input style="width: 110px;" name="Loota_1" type="text" value="'.$work_h->Loota_1.'" />';
      $Tehtävä    =  '<input style="width: 95px;" name="Loota_2" type="text" value="'.$work_h->Loota_2.'" />';
      $Alkoi      =  '<input style="width: 95px;" name="Aloitit" type="text" value="'.$work_h->Aloitit.'" />';
      $Loppui     =  '<input style="width: 95px;" name="Lopetit" type="text" value="'.$work_h->Lopetit.'" />';
      $Kuvaus     =  '<input style="width: 95px;" name="Mielipide" type="text" value="'.$work_h->Mielipide.'" />';
      $Save       =  '<input type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset">';
    }
  } else {
    $Työpaikka    =   $work_h->Loota_1;
    $Tehtävä      =   $work_h->Loota_2;
    $Alkoi        =   $work_h->Aloitit;
    $Loppui       =   $work_h->Lopetit;
    $Kuvaus       =   $work_h->Mielipide;
    $Save         =   '<a href="'.base_url().'profile/index?Edit='.$work_h->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
?>
<form action="<?php echo base_url(); ?>profile/kokemus_update/<?php echo $work_h->id; ?>" enctype="multipart/form-data" method="post">
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Työpaikka; ?></td>
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Tehtävä; ?></td>
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Alkoi; ?></td>
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Loppui; ?></td>
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Kuvaus; ?></td>
    <td>
    <?php echo $Save; ?>
      <a onclick="return confirm('Haluatko varmasti poistaa tuon?');" href="<?php echo base_url(); ?>profile/delete/<?php echo $work_h->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </form>
  </tr>
<?php endif; ?>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</div>
</div>
<br>

<!--Koulutukset-->
<div class="panel panel-primary">
  <div class=panel-heading>
    <h3 class=panel-title>
      <span style="font-size: 22px;">Koulutukset</span>
      <a href="<?php echo base_url() ?>profile/prototype/Koulutus" class="btn btn-success add-btn" title="Lisää koulutus"><span class="glyphicon glyphicon-plus plus"></span></a>
    </h3>
  </div>
  <div class=panel-body>
  <?php foreach($kokemus as $check) : ?>
    <?php if($check->Aihe == "Koulutus") {
      $koulutusexists = TRUE;
    }
    ?>
  <?php endforeach; ?>
<?php if(!isset($koulutusexists)) : ?>
  <h1 style='margin:0;padding:0;color:red;font-weight:bold;font-size:25px;'>Koulutuksia ei ole lisätty</h1>
<?php else : ?>
<table class="table">
<thead>
  <tr>
    <th>Koulutusnimi</th>
    <th>Koulutusaste</th>
    <th>Oppilaitos</th>
    <th>Alkoi</th>
    <th>Loppui</th>
    <th style="min-width: 110px;">Settings</th>
  </tr>
</thead>
<tbody>
<?php foreach($kokemus as $koulutus) : ?>
  <?php if ($koulutus->Aihe == 'Koulutus') : ?>
  <tr>
<?php
  if (isset($_GET['Edit'])) {
    if ($_GET['Edit'] !== $koulutus->id) {
      $Koulutusnimi  =  $koulutus->Loota_1;
      $Koulutusaste  =  $koulutus->Loota_2;
      $Oppilaitos    =  $koulutus->Loota_3;
      $Alkoi         =  $koulutus->Aloitit;
      $Loppui        =  $koulutus->Lopetit;
      $Save          =  '<a href="'.base_url().'profile/index?Edit='.$koulutus->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
    } else {
      // $Save = '<a href="'.base_url().'profile/kokemus_update/'.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>';
      $Koulutusnimi  =  '<input style="width: 125px;" name="Loota_1" type="text" value="'.$koulutus->Loota_1.'" />';
      $Koulutusaste  =  '<input style="width: 125px;" name="Loota_2" type="text" value="'.$koulutus->Loota_2.'" />';
      $Oppilaitos    =  '<input style="width: 100px;" name="Loota_3" type="text" value="'.$koulutus->Loota_3.'" />';
      $Alkoi         =  '<input style="width: 90px;" name="Aloitit" type="text" value="'.$koulutus->Aloitit.'" />';
      $Loppui        =  '<input style="width: 90px;" name="Lopetit" type="text" value="'.$koulutus->Lopetit.'" />';
      $Save          =  '<input type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset">';
    }
  } else {
    $Koulutusnimi    =  $koulutus->Loota_1;
    $Koulutusaste    =  $koulutus->Loota_2;
    $Oppilaitos      =  $koulutus->Loota_3;
    $Alkoi           =  $koulutus->Aloitit;
    $Loppui          =  $koulutus->Lopetit;
    $Save            =  '<a href="'.base_url().'profile/index?Edit='.$koulutus->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
?>
<form action="<?php echo base_url(); ?>profile/kokemus_update/<?php echo $koulutus->id; ?>" enctype="multipart/form-data" method="post">
  <td style="padding: 8px 0 0 0; max-width: 85px;"><?php echo $Koulutusnimi; ?></td>
  <td style="padding: 8px 0 0 0; max-width: 85px;"><?php echo $Koulutusaste; ?></td>
  <td style="padding: 8px 0 0 0; max-width: 85px;"><?php echo $Oppilaitos; ?></td>
  <td style="padding: 8px 0 0 0; max-width: 86px;"><?php echo $Alkoi; ?></td>
  <td style="padding: 8px 0 0 0; max-width: 86px;"><?php echo $Loppui; ?></td>
    <td>
    <?php echo $Save; ?>
      <a onclick="return confirm('Haluatko varmasti poistaa tuon?');" href="<?php echo base_url(); ?>profile/delete/<?php echo $koulutus->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </form>
  </tr>
<?php endif; ?>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</div>
</div>
<br>

<!--Kortit-->
<div class="panel panel-primary">
  <div class=panel-heading>
    <h3 class=panel-title>
      <span style="font-size: 22px;">Kortit</span>
      <a href="<?php echo base_url(); ?>profile/prototype/Kortit" class="btn btn-success add-btn" title="Lisää kortti"><span class="glyphicon glyphicon-plus plus"></span></a>
    </h3>
  </div>
  <div class=panel-body>
    <?php foreach($kokemus as $check) : ?>
      <?php if($check->Aihe == "Kortit") {
        $Kortitexists = TRUE;
      }
      ?>
    <?php endforeach; ?>
    <?php if(!isset($Kortitexists)) : ?>
      <h1 style='margin:0;padding:0;color:red;font-weight:bold;font-size:25px;'>Kortteja ei ole lisätty</h1>
    <?php else : ?>
    <table class="table">
    <thead>
      <tr>
        <th style="min-width:150px">Kortti</th>
        <th style="min-width:150px">Vanhenemispäivä</th>
        <th style="min-width:150px">Kommentti</th>
        <th style="min-width:81px">Settings</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($kokemus as $kortit) : ?>
      <?php if ($kortit->Aihe == 'Kortit') : ?>
      <tr>
        <td style="max-width: 86px"><p><?php echo $kortit->Loota_1; ?></p></td>
        <td style="max-width: 86px"><p><?php echo $kortit->Lopetit; ?></p></td>
        <td style="max-width: 86px"><p><?php echo $kortit->Mielipide; ?></p></td>
        <td>
          <a onclick="return confirm('Haluatko varmasti poistaa tuon?');" href="<?php echo base_url(); ?>profile/delete/<?php echo $kortit->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
    <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
    </table>
    <?php endif; ?>
</div>
</div>
