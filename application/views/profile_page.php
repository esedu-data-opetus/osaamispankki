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
        <?php foreach($User_Info as $User_i) : ?>
          <p>Tervetuloa <?php echo $User_i->Name; ?>!</p>
        <?php endforeach; ?>
        <?php if (isset($_GET['Prof_Edit'])) {
          echo "<div style='float:right;'>";
          echo form_open_multipart('Upload_controller/do_upload');
          echo "<input style='margin-top:-100px;' onChange='check_user();' type='file' id='uploadBox' name='userfile' size='20' class='' accept='image/*'/>";
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
  $Prof_hide = '<a style="float: right; border-top-right-radius: 0; border-bottom-right-radius: 0; height: 34px;" href="'.base_url().'profile/hide/Kylla" class="btn btn-success" title="Näytä profiili hakutuloksissa"><span class="glyphicon glyphicon-globe"></span></a>';
} else {
  $Prof_hide = '<a style="float: right; border-top-right-radius: 0; border-bottom-right-radius: 0; height: 34px;" href="'.base_url().'profile/hide/Ei" class="btn btn-danger" title="Estä profiilin näkyminen hakutuloksissa"><span class="glyphicon glyphicon-globe"></span></a>';
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
    $btn      = '<input style="width: 0; float: right; border-top-right-radius: 0; border-bottom-right-radius: 0; border-top-left-radius: 0; border-bottom-left-radius: 0;" type="submit" id="save_btn" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset"/>
                <a style="width: 0; float: right; border-top-right-radius: 0; border-bottom-right-radius: 0; border-top-left-radius: 0; border-bottom-left-radius: 0;" id="back_btn" class="btn btn-primary" href="'.base_url().'Profile">Takaisin</a>';
  } else {
    $name     = $etunimi." ".$sukunimi;
    $s_posti  = $User->Own_Email;
    $K_Taito  = $User->Kielitaito;
    $osoite   = $User->Osoite;
    $p_num    = $User->Posti_Num;
    $puh      = $User->Puh_Num;
    $kuvaus   = $User->About;
    $kuva     = "";
    $btn      = '<a style="float: right; border-top-right-radius: 0; border-bottom-right-radius: 0; border-top-left-radius: 0; border-bottom-left-radius: 0; height: 34px;" href="'.base_url().'profile/index?Prof_Edit='.$User->User_id.'" class="btn btn-primary" title="Muokkaa profiilia"><span class="glyphicon glyphicon-edit"></a>';
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
  $btn      = '<a style="float: right; border-top-right-radius: 0; border-bottom-right-radius: 0; border-top-left-radius: 0; border-bottom-left-radius: 0; height: 34px;" href="'.base_url().'profile/index?Prof_Edit='.$User->User_id.'" class="btn btn-primary" title="Muokkaa profiilia"><span class="glyphicon glyphicon-pencil"></a>';
}
?>
<form action="<?php echo base_url(); ?>profile/profile_update/<?php echo $User->User_id; ?>" enctype="multipart/form-data" method="post">
  <div class="Profile-Information">
    <div class="Prof-heading">
      <p>
        <b>Tili luotu: <?php echo $C_Day; ?></b>
          <a href="<?php echo base_url(); ?>Profile/PDF/<?php echo $User->User_id; ?>/<?php echo md5($User->Sposti); ?>" style="float: right; border-top-left-radius: 0; border-bottom-left-radius: 0; height: 34px;" class="btn btn-info"><span class="glyphicon glyphicon-print"></span></a>
            <!-- <a class="btn btn-warning" style="float: right; border-top-right-radius: 0; border-bottom-right-radius: 0; border-top-left-radius: 0; border-bottom-left-radius: 0; height: 34px;" href="<?php echo base_url(); ?>profile/share"><span class="glyphicon glyphicon-share-alt" title="Jaa"></span></a> -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#jaa" style="float: right; border-top-right-radius: 0; border-bottom-right-radius: 0; border-top-left-radius: 0; border-bottom-left-radius: 0; height: 34px;"><span class="glyphicon glyphicon-share-alt"></span></button>
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
      <b>Toinen sähköposti:</b>
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
      <b>Vapaasana:</b>
      <?php echo $kuvaus; ?>
    </p>
    <hr>
    </div>
  </div>
</form>
<div id="jaa" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1>Profiilin jakaminen</h1>
      </div>
      <div class="modal-body">
        <?php echo validation_errors('<b class="text-danger bg-danger">','</b><br>'); ?>
        <?php echo form_open('profile/share'); ?>
          <?php
          foreach($Prof_Info as $Prof) {
            $Name = $Prof->F_Name." ".$Prof->L_Name;
          }
            $data = array(
            'name'    =>  'Lahettaja',
            'style'   =>  'display: none;',
            'value'   =>   $Name,
          );
          ?>
          <?php echo form_input($data); ?>
            <?php
              $data = array(
              'name'        =>  'Sposti',
              'placeholder' =>  'Sähköposti',
              'style'       =>  'width: 60%; display: inline;',
              'class'       =>  'form-control',
              'value'       =>  set_value('Sposti'),

            );
            ?>
            <?php echo form_input($data); ?>
          <?php
           $data = array(
                      'name'  =>  'submit',
                      'style' =>  'display: inline;',
                      'class' =>  'btn btn-success',
                      'value' =>  'Lähetä'
                     );
          ?>
          <?php echo form_submit($data); ?>
        <?php echo form_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

  <div class="Profile-Information">
    <div class="Prof-body">
      <p>
        <b>Suosittelijat: </b>
        <?php foreach($suosittelijat as $suosijat) :?>
        <?php if($suosijat->Show == "Kylla") : ?>
          <?php
            $eye = "close";
            $fact = "Ei";
          ?>
        <?php else : ?>
          <?php
            $eye = "open";
            $fact = "Kylla";
          ?>
        <?php endif; ?>
        <?php endforeach;?>
        <?php if (empty($fact) || empty($eye)) {
          $eye = "open";
          $fact = "Kylla";
        } ?>
        <a href="<?php echo base_url(); ?>Profile/suos_hide/<?php echo $fact; ?>/<?php echo md5($this->session->userdata('sposti')) ?>"><span class="glyphicon glyphicon-eye-<?php echo $eye; ?>"></span></a>
        <div class="panel panel-default">
          <div class="panel-body">
            <?php foreach($suosittelijat as $suosijat) :?>
              <?php
                if($suosijat->Show == "Kylla") {
                  $btn_c = "primary";
                } else {
                  $btn_c = "default";
                }
              ?>
              <button type="button" class="btn btn-<?php echo $btn_c ?>" data-toggle="modal" data-target="#1<?php echo str_replace('.', '', str_replace('@', '', $suosijat->Suosittelija)); ?>"><?php echo $suosijat->Suosittelija; ?></button>
              <div id="1<?php echo str_replace('.', '', str_replace('@', '', $suosijat->Suosittelija)); ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Suosittelija: <?php echo $suosijat->Suosittelija; ?></h4>
                    </div>
                    <div class="modal-body">
                      <a href="<?php echo base_url(); ?>Haku/User/<?php echo $suosijat->User_id; ?>/<?php echo md5($suosijat->Suosittelija); ?>" class="btn btn-primary">Mene profiiliin</a>
                    <?php if($suosijat->Show == "Kylla") : ?>
                      <a href="<?php echo base_url(); ?>Profile/suos_hide/Ei/<?php echo $suosijat->id; ?>" class="btn btn-warning">Piilota</a>
                    <?php else : ?>
                      <a href="<?php echo base_url(); ?>Profile/suos_hide/Kylla/<?php echo $suosijat->id; ?>" class="btn btn-success">Näytä</a>
                    <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </p>
      <p>
        <b>Suosittelet:</b>
        <div class="panel panel-default">
          <div class="panel-body">
            <?php foreach($suositeltu as $suosittu) :?>
              <?php
                if($suosittu->Show == "Kylla") {
                  $btn_c = "primary";
                } else {
                  $btn_c = "default";
                }
              ?>
              <button type="button" class="btn btn-<?php echo $btn_c ?>" data-toggle="modal" data-target="#<?php echo str_replace('.', '', str_replace('@', '', $suosittu->Suositeltu)); ?>"><?php echo $suosittu->Suositeltu; ?></button>
              <div id="<?php echo str_replace('.', '', str_replace('@', '', $suosittu->Suositeltu)); ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Suositeltu: <?php echo $suosittu->Suositeltu; ?></h4>
                    </div>
                    <div class="modal-body">
                      <a href="<?php echo base_url(); ?>Haku/User/<?php echo $suosittu->User_id; ?>/<?php echo md5($suosittu->Suositeltu); ?>" class="btn btn-primary">Mene profiiliin</a>
                      <?php if($suosittu->Show == "Kylla") : ?>
                        <a href="<?php echo base_url(); ?>Profile/suos_hide/Ei/<?php echo $suosittu->id; ?>" class="btn btn-warning">Piilota</a>
                      <?php else : ?>
                        <a href="<?php echo base_url(); ?>Profile/suos_hide/Kylla/<?php echo $suosittu->id; ?>" class="btn btn-success">Näytä</a>
                      <?php endif; ?>
                      <a href="<?php echo base_url(); ?>Profile/suos_del/<?php echo $suosittu->id; ?>" class="btn btn-danger">Älä suosittele</a>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </p>
    </div>
  </div>
<br>

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
      <a href="<?php echo base_url(); ?>Profile" class="btn btn-primary" style="float: right; display: inline;"><span class="glyphicon glyphicon-arrow-left"></span></a>
      <?php if ($_GET['select'] == 'all') : ?>
        <?php if($Vahvistus == "Päällä") : ?>
          <a onclick="return confirm('Haluatko poistaa kaikki metatiedot?');" href="<?php echo base_url(); ?>profile/delete_all_meta/<?php echo $this->session->userdata('user_id'); ?>" class="btn btn-danger" style="float: left;"><span class="glyphicon glyphicon-trash"></span></a>
        <?php else : ?>
          <a href="<?php echo base_url(); ?>Profile/delete_all_meta/<?php echo $this->session->userdata('user_id'); ?>" class="btn btn-danger" style="float: left;"><span class="glyphicon glyphicon-trash"></span></a>
        <?php endif; ?>
      <?php else : ?>
        <a href="<?php echo base_url(); ?>Profile/delete_meta/<?php echo $_GET['select']; ?>" class="btn btn-danger" style="float: left;"><span class="glyphicon glyphicon-trash"></span></a>
      <?php endif; ?>

    <?php elseif (isset($_GET['add_meta'])) : ?>
      <a href="<?php echo base_url(); ?>Profile" class="btn btn-primary" style="float: left; display: inline;"><span class="glyphicon glyphicon-arrow-left"></span></a>
      <a href="<?php echo base_url(); ?>Profile" class="btn btn-primary" style="float: right; display: inline;"><span class="glyphicon glyphicon-arrow-left"></span></a>
    <?php else : ?>
      <?php if (empty($meta_tieto)) : ?>
        <a href="<?php echo base_url(); ?>Profile?add_meta" class="btn btn-success" style="float: left; display: inline;"><span class="glyphicon glyphicon-plus"></span></a>
      <?php else : ?>
        <a href="<?php echo base_url(); ?>Profile?select=all" class="btn btn-primary" style="float: left; display: inline;"><span class="glyphicon glyphicon-th"></span></a>
      <?php endif; ?>
      <a href="<?php echo base_url(); ?>Profile?add_meta" class="btn btn-success" style="float: right; display: inline;"><span class="glyphicon glyphicon-plus"></span></a>
    <?php endif; ?>
    <div class="input-text" style="text-align: center;"><h1 style="text-align: center; margin: 0; padding: 0; display: inline;">Metatieto </h1></div>
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
            $Alkoi      =   '<input class="form-control" id="alkoi" name="Aloitit" type="text" value="'.$work_h->alkoi.'" />';
            $Loppui     =   '<input class="form-control" id="loppui" name="Lopetit" type="text" value="'.$work_h->loppui.'" />';
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
            $Alkoi         =  '<input class="form-control" id="alkoi" name="alkoi" type="text" value="'.$koulut->alkoi.'" />';
            $Loppui        =  '<input class="form-control" id="loppui" name="loppui" type="text" value="'.$koulut->loppui.'" />';
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
