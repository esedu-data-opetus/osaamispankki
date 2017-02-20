<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
if (!$Prof_Info || !$Prof_Settings) {
  redirect('Profile/set_profile/c');
}

foreach($Prof_Info as $User) {
  if ($User->Näytä_Profiili == "Ei") {
    $Col = "default";
  } else {
    $Col = "success";
  }
}
?>
<div class="panel-group">
  <div class="panel panel-<?php echo $Col; ?>">
    <div class="panel-heading">
      <?php foreach($Prof_Info as $User) : ?>
        <img style="float: right; max-width: 100px; max-height: 100px;" src="<?php echo base_url(); ?>/images/profiili/<?php echo $User->Prof_Pic; ?>" class="img-responsive img-thumbnail">
        <h1>Oma profiili</h1>
        <p>Tervetuloa <?php echo $User->F_Name; ?></p>
        <?php if (isset($_GET['Prof_Edit'])) {
          echo "<div style='float:right;'>";
          echo form_open_multipart('Upload_controller/do_upload');
          echo "<input style='margin-top:-100px;' onChange='check_user();' type='file' id='uploadBox' name='userfile' size='20' class=''/>";
          echo "<input style='margin-top:10px;' type='submit' id='nappi' name='submit' value='Lataa' class='btn btn-success' disabled/>";
          echo "</form>";
          echo "</div>";
        } else {
          echo "";
        }
        ?>
      <?php endforeach; ?>
    </div>
<div class="panel-body">
<?php foreach($Prof_Info as $User) : ?>
<?php
$C_Day     = $User->Create_date;
$etunimi   = $User->F_Name;
$sukunimi  = $User->L_Name;
if ($User->Näytä_Profiili == "Ei") {
  $Prof_hide = '<a style="float: right;" href="'.base_url().'profile/hide/Kylla/'.$User->User_id.'" class="btn btn-success" title="Näytä profiili hakutuloksissa"><span class="glyphicon glyphicon-globe"></span></a>';
} else {
  $Prof_hide = '<a style="float: right;" href="'.base_url().'profile/hide/Ei/'.$User->User_id.'" class="btn btn-danger" title="Estä profiilin näkyminen hakutuloksissa"><span class="glyphicon glyphicon-globe"></span></a>';
}

if (isset($_GET['Prof_Edit'])) {
  if ($_GET['Prof_Edit'] == $User->User_id) {
    $name     = "<input class='form-control' name='F_Name' type='text' placeholder='Etunimi' value='".$User->F_Name."'> <input class='form-control' name='L_Name' type='text' placeholder='Sukunimi' value='".$User->L_Name."'>";
    $s_posti  = "<input class='form-control' name='email' type='text' value='".$User->Own_Email."'>";
    $K_Taito  = '<input class="form-control" name="kielitaito" type="text" placeholder="Kirjoita mitä kieliä osaat" value='.$User->Kielitaito.'>';
    $osoite   = "<input class='form-control' name='address' type='text' value='".$User->Osoite."'>";
    $p_num    = "<input class='form-control' name='p_num' type='text' value='".$User->Posti_Num."'>";
    $puh      = "<input class='form-control' name='puh' type='text' value='".$User->Puh_Num."'>";
    $kuvaus   = "<textarea class='form-control' name='about' type='text'>".$User->About."</textarea>";
    $kuva     = "<input class='form-control' type='file' id='uploadBox' name='userfile' size='20' class=''/>";
    $btn      = '<input style="float: right;" type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset"/>';
  } else {
    $name     = $etunimi." ".$sukunimi;
    $s_posti  = $User->Own_Email;
    $K_Taito  = $User->Kielitaito;
    $osoite   = $User->Osoite;
    $p_num    = $User->Posti_Num;
    $puh      = $User->Puh_Num;
    $kuvaus   = $User->About;
    $kuva     = "";
    $btn      = '<a style="float: right;" href="'.base_url().'profile/index?Prof_Edit='.$User->User_id.'" class="btn btn-primary" title="Muokkaa profiilia"><span class="glyphicon glyphicon-edit"></a>';
  }
} else {
  $name     = $etunimi." ".$sukunimi;
  $s_posti  = $User->Own_Email;
  $osoite   = $User->Osoite;
  $K_Taito  = $User->Kielitaito;
  $p_num    = $User->Posti_Num;
  $puh      = $User->Puh_Num;
  $kuvaus   = $User->About;
  $kuva     = "";
  $btn      = '<a style="float: right;" href="'.base_url().'profile/index?Prof_Edit='.$User->User_id.'" class="btn btn-primary" title="Muokkaa profiilia"><span class="glyphicon glyphicon-edit"></a>';
}
?>

<?php if ($this->session->userdata('KT') == 3) : ?>
  <a class="btn btn-warning" style="float: right;" href="<?php echo base_url(); ?>Users/test"><span class="glyphicon glyphicon-send"></span></a>
<?php endif; ?>
<form action="<?php echo base_url(); ?>profile/profile_update/<?php echo $User->User_id; ?>" enctype="multipart/form-data" method="post">
  <div class="Profile-Information">
    <div class="Prof-heading">
      <p>
        <b>Tili luotu: <?php echo $C_Day; ?></b>
          <?php echo $btn; ?>
          <?php echo $Prof_hide; ?>
      </p>
    </div>
    <hr>
    <div class="Prof-body">
    <p>
      <b>Nimi:</b>
      <?php echo $name; ?>
    </p>
    <hr>
    <p>
      <b>Sähköposti:</b>
      <?php echo $s_posti; ?>
    </p>
    <hr>
    <p>
      <b>Osoite:</b>
      <?php echo $osoite; ?>
    </p>
    <hr>
    <p>
      <b>Kielitaito:</b>
      <?php echo $K_Taito; ?>
    </p>
    <hr>
    <p>
      <b>Postinumero:</b>
      <?php echo $p_num; ?>
    </p>
    <hr>
    <p>
      <b>Puhelinnumero:</b>
      <?php echo $puh; ?>
    </p>
    <hr>
    <p>
      <b>Vapaasana:</b><br>
      <?php echo $kuvaus; ?>
    </p>
    <hr>
    <?php if($this->session->userdata('KT') == 3) : ?>
    <p>
      <b>Suosittelija testi!:</b><br>
      <div class="panel panel-default" style="padding: 10px;">
        <a href="<?php echo base_url(); ?>Haku/User/<?php echo $User->User_id; ?>/<?php echo md5($User->Sposti); ?>">@<?php echo $User->F_Name." ".$User->L_Name; ?></a>
      </div>
    </p>
  <?php endif; ?>
    </div>
  </div>
</form>
<?php endforeach; ?>
<?php if(isset($Prof_Settings)) : ?>
  <?php
    foreach ($Prof_Settings as $P_Sets) {
      if($P_Sets->Del_Vahvistus == True) {
        $Vahvistus = "Päällä";
      }
    }
  ?>
<?php endif; ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <?php if (isset($_GET['select'])) : ?>
      <a href="<?php echo base_url(); ?>profile" class="btn btn-primary" style="float: right; display: inline;"><span class="glyphicon glyphicon-arrow-left"></span></a>
      <?php if ($_GET['select'] == 'all') : ?>
        <?php if($Vahvistus == "Päällä") : ?>
          <a onclick="return confirm('Haluatko poistaa kaikki metatiedot?');" href="<?php echo base_url(); ?>profile/delete_all_meta/<?php echo $this->session->userdata('user_id'); ?>" class="btn btn-danger" style="float: left;"><span class="glyphicon glyphicon-trash"></span></a>
        <?php else : ?>
          <a href="<?php echo base_url(); ?>profile/delete_all_meta/<?php echo $this->session->userdata('user_id'); ?>" class="btn btn-danger" style="float: left;"><span class="glyphicon glyphicon-trash"></span></a>
        <?php endif; ?>
      <?php else : ?>
        <a href="<?php echo base_url(); ?>profile/delete_meta/<?php echo $_GET['select']; ?>" class="btn btn-danger" style="float: left;"><span class="glyphicon glyphicon-trash"></span></a>
      <?php endif; ?>

    <?php elseif (isset($_GET['add_meta'])) : ?>
      <a href="<?php echo base_url(); ?>profile" class="btn btn-primary" style="float: left; display: inline;"><span class="glyphicon glyphicon-arrow-left"></span></a>
      <a href="<?php echo base_url(); ?>profile" class="btn btn-primary" style="float: right; display: inline;"><span class="glyphicon glyphicon-arrow-left"></span></a>
    <?php else : ?>
      <?php if (empty($meta_tieto)) : ?>
        <a href="<?php echo base_url(); ?>profile?add_meta" class="btn btn-success" style="float: left; display: inline;"><span class="glyphicon glyphicon-plus"></span></a>
      <?php else : ?>
        <a href="<?php echo base_url(); ?>profile?select=all" class="btn btn-primary" style="float: left; display: inline;"><span class="glyphicon glyphicon-th"></span></a>
      <?php endif; ?>
      <a href="<?php echo base_url(); ?>profile?add_meta" class="btn btn-success" style="float: right; display: inline;"><span class="glyphicon glyphicon-plus"></span></a>
    <?php endif; ?>
    <h1 style="text-align: center; margin: 0; padding: 0;">Metatieto!</h1>
    </div>
    <div class="panel-body">
      <?php if (isset($_GET['add_meta'])) : ?>
        <div style="padding: 10px;">
          <form action="<?php echo base_url(); ?>profile/add_meta" method="post" enctype="multipart/form-data">
            <input id="meta" autofocus type="text" name="Tieto" maxlength="50">
            <input id="luo" type="submit" value="Luo">
            <p style="display: inline;" class="counter">50</p>
          </form>
          <hr>
        </div>
      <?php endif; ?>
      <?php if (empty($meta_tieto)) : ?>
        <h1 class="error-message">Metatietoja ei ole lisätty</h1>
      <?php else : ?>
        <?php
        foreach ($meta_tieto as $meta) {
          if (isset($_GET['select'])) {
            if ($_GET['select'] == $meta->id) {
              $style  = 'class="btn btn-primary" style="margin: 0 0 5px 0; padding: 4px 10px 4px 10px;"';
              $sel    = 'style="color: white; margin: 0; display: inline;"';
            } else if ($_GET['select'] == 'all') {
              $style  = 'class="btn btn-primary" style="margin: 0 0 5px 0; padding: 4px 10px 4px 10px;"';
              $sel    = 'style="color: white; margin: 0; display: inline;"';
            } else {
              $style  = 'class="btn btn-default" style="margin: 0 0 5px 0; padding: 4px 10px 4px 10px;"';
              $sel    = 'style="color: black; margin: 0;"';
            }
          } else {
            $style = 'class="btn btn-default" style="margin: 0 0 5px 0; padding: 4px 10px 4px 10px;"';
            $sel   = 'style="color: black; margin: 0;"';
          }

            if (isset($_GET['select'])) {
              if ($_GET['select'] == $meta->id) {
                echo '
                <a href="'.base_url().'profile">
                  <div '.$style.' >
                    <p '.$sel.' >'.$meta->Tieto.'</p>
                    <a '.$sel.' href="'.base_url().'profile/delete_meta/'.$meta->id.'"><span class="glyphicon glyphicon-remove"></span></a>
                  </div>
                </a>';
              } else {
                echo '
              <a href="'.base_url().'profile?select='.$meta->id.'">
                <div '.$style.' >
                  <p '.$sel.' >'.$meta->Tieto.'</p>
                </div>
              </a>';
              }
              } else {
                echo '
              <a href="'.base_url().'profile?select='.$meta->id.'">
                <div '.$style.' >
                  <p '.$sel.' >'.$meta->Tieto.'</p>
                </div>
              </a>';
            }
          }
          ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!--Harrastukset-->
<div class="panel panel-primary">
  <div class=panel-heading>
    <h3 class=panel-title>
      <span style="font-size: 22px;">Harrastukset</span>
      <a href="<?php echo base_url() ?>profile/Harrastus" class="btn btn-success add-btn" title="Lisää harrastus"><span class="glyphicon glyphicon-plus plus"></span></a>
    </h3>
  </div>
  <div class=panel-body>
    <?php foreach($harrastus as $hobby) : ?>
      <?php
      if ($hobby->User_id == $this->session->userdata('user_id')) {
        $hobbyexists = TRUE;
      }
      ?>
<?php endforeach; ?>
<?php if(!isset($hobbyexists)) : ?>
  <h1 class="error-message">Harrastuksia ei ole lisätty</h1>
<?php else : ?>
  <div class="Profile-Information">
      <?php foreach($harrastus as $hobby) : ?>
      <?php
        if (isset($_GET['EditHobby'])) {
          if ($_GET['EditHobby'] !== $hobby->id) {
            $Harrastus  =   $hobby->harrastus;
            $Mielipide  =   $hobby->vapaasana;
            $Save       =   '<a href="'.base_url().'profile/index?EditHobby='.$hobby->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
          } else {
            $Harrastus  =   '<input class="form-control" name="harrastus" type="text" value="'.$hobby->harrastus.'" />';
            $Mielipide  =   '<textarea class="form-control" name="vapaasana" type="text" value="'.$hobby->vapaasana.'">'.$hobby->vapaasana.'</textarea>';
            $Save       =   '<input class="btn btn-primary" type="submit" value="Tallenna" title="Tallenna muutokset">';
          }
        } else {
          $Harrastus    =   $hobby->harrastus;
          $Mielipide    =   $hobby->vapaasana;
          $Save         =   '<a href="'.base_url().'profile/index?EditHobby='.$hobby->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
        }
      ?>
      <form action="<?php echo base_url(); ?>profile/harrastus_update/<?php echo $hobby->id; ?>" enctype="multipart/form-data" method="post">
        <h3>Asetukset: </h3><?php echo $Save; ?><?php if($Vahvistus == "Päällä") : ?><a onclick="return confirm('Haluatko poistaa harrastuksen <?php echo $hobby->harrastus; ?>?');" href="<?php echo base_url(); ?>profile/harrastus_delete/<?php echo $hobby->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a><?php else : ?><a href="<?php echo base_url(); ?>profile/harrastus_delete/<?php echo $hobby->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a><?php endif; ?>
        <br><h3>Harrastus: </h3><?php echo $Harrastus; ?>
        <br><h3>Kuvaus: </h3><br><span style="max-width: 350px; hover: overflow: auto;"><?php echo $Mielipide; ?></span>
      </form>
      <hr>
      <?php endforeach; ?>
      </div>
      <?php endif; ?>
  </div>
</div>


<!--Työhistoria-->
<div class="panel panel-primary">
  <div class=panel-heading>
   <h3 class=panel-title>
    <span style="font-size: 22px;">Työhistoria</span>
    <a href="<?php echo base_url() ?>profile/Tyohistoria" class="btn btn-success add-btn" title="Lisää työhistoria"><span class="glyphicon glyphicon-plus plus"></span></a>
  </h3>
</div>
<div class=panel-body>
  <?php foreach($tyohistoria as $work_h) : ?>
    <?php if ($work_h->User_id == $this->session->userdata('user_id')) {
      $work_hexists = TRUE;
    }
    ?>
<?php endforeach; ?>
<?php if(!isset($work_hexists)) : ?>
  <h1 class="error-message">Työhistorioita ei ole lisätty</h1>
<?php else : ?>
  <div class="Profile-Information">
      <?php foreach($tyohistoria as $work_h) : ?>
      <?php
        if (isset($_GET['EditTyo'])) {
          if ($_GET['EditTyo'] !== $work_h->id) {
            $Työpaikka  =   $work_h->tyopaikka;
            $Tehtävä    =   $work_h->tehtava;
            $Alkoi      =   $work_h->alkoi;
            $Loppui     =   $work_h->loppui;
            $Kuvaus     =   $work_h->kuvaus;
            $Save       =   '<a href="'.base_url().'profile/index?EditTyo='.$work_h->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
          } else {
            $Työpaikka  =   '<input class="form-control" name="tyopaikka" type="text" value="'.$work_h->tyopaikka.'" />';
            $Tehtävä    =   '<input class="form-control" name="tehtava" type="text" value="'.$work_h->tehtava.'" />';
            $Alkoi      =   '<input class="form-control" readonly name="Aloitit" type="text" value="'.$work_h->alkoi.'" />';
            $Loppui     =   '<input class="form-control" readonly name="Lopetit" type="text" value="'.$work_h->loppui.'" />';
            $Kuvaus     =   '<textarea class="form-control" name="vapaasana" type="text">'.$work_h->kuvaus.'</textarea>';
            $Save       =   '<input type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset">';
          }
        } else {
          $Työpaikka  =   $work_h->tyopaikka;
          $Tehtävä    =   $work_h->tehtava;
          $Alkoi      =   $work_h->alkoi;
          $Loppui     =   $work_h->loppui;
          $Kuvaus     =   $work_h->kuvaus;
          $Save       =   '<a href="'.base_url().'profile/index?EditTyo='.$work_h->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
        }
      ?>
      <form action="<?php echo base_url(); ?>profile/tyohistoria_update/<?php echo $work_h->id; ?>" enctype="multipart/form-data" method="post">
          <h3>Asetukset: </h3><?php echo $Save; ?><?php if($Vahvistus == "Päällä") : ?><a onclick="return confirm('Haluatko poistaa työhistorian <?php echo $work_h->tyopaikka; ?>?');" href="<?php echo base_url(); ?>profile/tyohistoria_delete/<?php echo $work_h->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a><?php else : ?><a href="<?php echo base_url(); ?>profile/tyohistoria_delete/<?php echo $work_h->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a><?php endif; ?>
          <br><h3>Työpaikka: </h3><?php echo $Työpaikka; ?>
          <br><h3>Tehtävä: </h3><?php echo $Tehtävä; ?>
          <br><h3>Alkoi: </h3><?php echo $Alkoi; ?>
          <br><h3>Loppui: </h3><?php echo $Loppui; ?>
          <br><h3>Kuvaus: </h3><br><?php echo $Kuvaus; ?>
        </form>
        <hr>
      <?php endforeach; ?>
      </div>
      <?php endif; ?>
  </div>
</div>

<!--Koulutukset-->
<div class="panel panel-primary">
  <div class=panel-heading>
    <h3 class=panel-title>
      <span style="font-size: 22px;">Koulutukset</span>
      <a href="<?php echo base_url() ?>profile/Koulutus" class="btn btn-success add-btn" title="Lisää koulutus"><span class="glyphicon glyphicon-plus plus"></span></a>
    </h3>
  </div>
  <div class=panel-body>
    <?php foreach($koulutus as $koulut) : ?>
      <?php if ($koulut->User_id == $this->session->userdata('user_id')) {
        $koulutusexists = TRUE;
      }
      ?>
  <?php endforeach; ?>
<?php if(!isset($koulutusexists)) : ?>
  <h1 class="error-message">Koulutuksia ei ole lisätty</h1>
<?php else : ?>
  <div class="Profile-Information">
      <?php foreach($koulutus as $koulut) : ?>
      <?php
        if (isset($_GET['EditKoulutus'])) {
          if ($_GET['EditKoulutus'] !== $koulut->id) {
            $Koulutusnimi  =  $koulut->koulutusnimi;
            $Koulutusaste  =  $koulut->koulutusaste;
            $Oppilaitos    =  $koulut->oppilaitos;
            $Alkoi         =  $koulut->alkoi;
            $Loppui        =  $koulut->loppui;
            $K_vapaasana   =  $koulut->vapaasana;
            $Save          =  '<a href="'.base_url().'profile/index?EditKoulutus='.$koulut->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
          } else {
            $Koulutusnimi  =  '<input class="form-control" name="koulutusnimi" type="text" value="'.$koulut->koulutusnimi.'" />';
            $Koulutusaste  =  '<input class="form-control" name="koulutusaste" type="text" value="'.$koulut->koulutusaste.'" />';
            $Oppilaitos    =  '<input class="form-control" name="oppilaitos" type="text" value="'.$koulut->oppilaitos.'" />';
            $Alkoi         =  '<input class="form-control" readonly name="alkoi" type="text" value="'.$koulut->alkoi.'" />';
            $Loppui        =  '<input class="form-control" readonly name="loppui" type="text" value="'.$koulut->loppui.'" />';
            $K_vapaasana   =  '<input class="form-control" name="K_vapaasana" type="text" value="'.$koulut->vapaasana.'" />';
            $Save          =  '<input type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset">';
          }
        } else {
          $Koulutusnimi  =  $koulut->koulutusnimi;
          $Koulutusaste  =  $koulut->koulutusaste;
          $Oppilaitos    =  $koulut->oppilaitos;
          $Alkoi         =  $koulut->alkoi;
          $Loppui        =  $koulut->loppui;
          $K_vapaasana   =  $koulut->vapaasana;
          $Save          =  '<a href="'.base_url().'profile/index?EditKoulutus='.$koulut->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
        }
      ?>
      <form action="<?php echo base_url(); ?>profile/koulutus_update/<?php echo $koulut->id; ?>" enctype="multipart/form-data" method="post">
        <h3>Asetukset: </h3><?php echo $Save; ?><?php if($Vahvistus == "Päällä") : ?><a onclick="return confirm('Haluatko poistaa koulutuksen <?php echo $koulut->koulutusnimi; ?>?');" href="<?php echo base_url(); ?>profile/koulutus_delete/<?php echo $koulut->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a><?php else : ?><a href="<?php echo base_url(); ?>profile/koulutus_delete/<?php echo $koulut->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a><?php endif; ?>
        <br><h3>Koulutusnimi: </h3><?php echo $Koulutusnimi; ?>
        <br><h3>Koulutusaste: </h3><?php echo $Koulutusaste; ?>
        <br><h3>Oppilaitos: </h3><?php echo $Oppilaitos; ?>
        <br><h3>Alkoi: </h3><?php echo $Alkoi; ?>
        <br><h3>Loppui: </h3><?php echo $Loppui; ?>
        <br><h3>Vapaasana: </h3><br><?php echo $K_vapaasana; ?>
      </form>
      <hr>
      <?php endforeach; ?>
      </div>
      <?php endif; ?>
  </div>
</div>

<!--Kortit-->
<div class="panel panel-primary">
  <div class=panel-heading>
    <h3 class=panel-title>
      <span style="font-size: 22px;">Kortit</span>
      <a href="<?php echo base_url(); ?>profile/Kortit" class="btn btn-success add-btn" title="Lisää kortti"><span class="glyphicon glyphicon-plus plus"></span></a>
    </h3>
  </div>
  <div class=panel-body>
    <?php foreach($kortit as $kortti) : ?>
      <?php
      if($kortti->User_id == $this->session->userdata('user_id')) {
        $Kortitexists = TRUE;
      }
      ?>
    <?php endforeach; ?>
    <?php if(!isset($Kortitexists)) : ?>
      <h1 class="error-message">Kortteja ei ole lisätty</h1>
    <?php else : ?>
      <div class="Profile-Information">
          <?php foreach($kortit as $kortti) : ?>
              <h3>Asetukset: </h3><?php if($Vahvistus == "Päällä") : ?><a onclick="return confirm('Haluatko poistaa kortin <?php echo $kortti->kortti; ?>?');" href="<?php echo base_url(); ?>profile/kortit_delete/<?php echo $kortti->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a></td><?php else : ?><a href="<?php echo base_url(); ?>profile/kortit_delete/<?php echo $kortti->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a></td><?php endif; ?>
              <br><h3>Kortti: </h3><?php echo $kortti->kortti; ?>
              <br><h3>Vanhenemispäivä: </h3><?php echo $kortti->loppuu; ?>
              <br><h3>Kuvaus: </h3><br><?php echo $kortti->vapaasana; ?>
            <hr>
          <?php endforeach; ?>
          </div>
          <?php endif; ?>
    </div>
  </div>
</div>
