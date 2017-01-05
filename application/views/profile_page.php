<style>
.disabled {
  pointer-events: none;
  cursor: not-allowed;
  opacity: .65;
}
.table td:hover {
  overflow-x: auto;
}
td {
  overflow: hidden;
}
/*top, right, bottom, left*/
.plus {
  margin: -2 -2 0 0;
}

.add-btn {
  float: right;
}

.save-btn {
  margin: -30px 0 0 260px;
}
</style>
<script>
var main = function() {
    $('#luo').click(function() {
        $('.counter').text('50');
        $('#luo').addClass('disabled');
    });
    $('#meta').keyup(function() {
        var postLength = $(this).val().length;
        var charactersLeft = 50 - postLength;
        $('.counter').text(charactersLeft);
        if (charactersLeft < 0) {
            $('#luo').addClass('disabled');
        } else if (charactersLeft == 50) {
            $('#luo').addClass('disabled');
        } else {
            $('#luo').removeClass('disabled');
        }
    });
    $('#luo').addClass('disabled');
};
$(document).ready(main);
</script>

<?php
foreach($User_Info as $User) {
  if ($User->Näytä_Profiili == "Ei") {
    $Col = "default";
  } else {
    $Col = "success";
  }
}
?>
<div class="panel panel-<?php echo $Col; ?>">
<div class="panel-heading">
<?php foreach($User_Info as $User) : ?>
<img style="float: right;" src="<?php echo base_url(); ?>/images/profiili/<?php echo $User->Prof_Pic; ?>" class="img-responsive img-thumbnail" title="<?php echo $User->Prof_Pic; ?>" height="100" width="100">
<h1>Oma profiili</h1>
<p>Tervetuloa <?php echo $User->F_Name; ?>!</p>
<?php endforeach; ?>
</div>

<div class="panel-body">
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
$C_Day     = $User->Create_date;
$etunimi   = $User->F_Name;
$sukunimi  = $User->L_Name;
if ($User->Näytä_Profiili == "Ei") {
  $Prof_hide = '<a style="float: right;" href="'.base_url().'profile/hide/Kylla/'.$User->User_id.'" class="btn btn-success" title="Näytä Profiilisi Kailikke"><span class="glyphicon glyphicon-globe"></span></a>';
} else {
  $Prof_hide = '<a style="float: right;" href="'.base_url().'profile/hide/Ei/'.$User->User_id.'" class="btn btn-danger" title="Estä Muita Näkemästä Profiilisi"><span class="glyphicon glyphicon-globe"></span></a>';
}

if (isset($_GET['Prof_Edit'])) {
  if ($_GET['Prof_Edit'] == $User->User_id) {
    $s_posti  = "<input name='email' type='text' value='".$User->Own_Email."'>";
    $osoite   = "<input name='address' type='text' value='".$User->Osoite."'>";
    $p_num    = "<input name='p_num' type='text' value='".$User->Posti_Num."'>";
    $puh      = "<input name='puh' type='text' value='".$User->Puh_Num."'>";
    $kuvaus   = "<textarea name='about' type='text'>".$User->About."</textarea>";
    $kuva     = "<input type='file' id='uploadBox' name='userfile' size='20' class=''/>";
    $btn      = '<input style="float: right;" type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset"/>';
  } else {
    $s_posti  = $User->Own_Email;
    $osoite   = $User->Osoite;
    $p_num    = $User->Posti_Num;
    $puh      = $User->Puh_Num;
    $kuvaus   = $User->About;
    $kuva     = "";
    $btn      = '<a style="float: right;" href="'.base_url().'profile/index?Prof_Edit='.$User->User_id.'" class="btn btn-primary" title="Muokkaa profiilia"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
} else {
  $s_posti  = $User->Own_Email;
  $osoite   = $User->Osoite;
  $p_num    = $User->Posti_Num;
  $puh      = $User->Puh_Num;
  $kuvaus   = $User->About;
  $kuva     = "";
  $btn      = '<a style="float: right;" href="'.base_url().'profile/index?Prof_Edit='.$User->User_id.'" class="btn btn-primary" title="Muokkaa profiilia"><span class="glyphicon glyphicon-cog"></span></a>';
}
?>
<form action="<?php echo base_url(); ?>profile/profile_update/<?php echo $User->User_id; ?>" enctype="multipart/form-data" method="post">
  <table class="table">
    <thead>
      <tr>
        <th>Tili luotu:</th>
        <th><?php echo $C_Day; ?></th>
        <th><?php echo $btn; ?><?php echo $Prof_hide; ?></th>
      </tr>
    </thead>
      <tbody>
        <tr>
          <td>Nimi:</td>
          <td colspan="2"><?php echo $etunimi." ".$sukunimi; ?></td>
        </tr>
        <tr>
          <td>Sähköposti:</td>
          <td colspan="2"><?php echo $s_posti; ?></td>
        </tr>
        <tr>
          <td>Osoite:</td>
          <td colspan="2"><?php echo $osoite; ?></td>
        </tr>
        <tr>
          <td>Postinumero:</td>
          <td colspan="2"><?php echo $p_num; ?></td>
        </tr>
        <tr>
          <td>Puhelinnumero:</td>
          <td colspan="2"><?php echo $puh; ?></td>
        </tr>
        <tr>
          <td>Kuvaus:</td>
          <td colspan="2"><?php echo $kuvaus; ?></td>
        </tr>
      </tbody>
    </table>
</form>
<?php endforeach; ?>
<div class="panel panel-default">
  <div class="panel-heading">
<?php if (isset($_GET['select'])) : ?>
  <a href="<?php echo base_url(); ?>profile" class="btn btn-primary" style="float: right; display: inline;"><span class="glyphicon glyphicon-arrow-left"></span></a>
<?php if ($_GET['select'] == 'all') : ?>
  <a onclick="return confirm('Haluatko Poitaa Kaikki Metatiedot?');" href="<?php echo base_url(); ?>profile/delete_all_meta/<?php echo $this->session->userdata('user_id'); ?>" class="btn btn-danger" style="float: left;"><span class="glyphicon glyphicon-trash"></span></a>
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
  <div class="panel-boody" style="padding: 10px;">
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
  <h1 style='margin:0;padding:0;color:red;font-weight:bold;font-size:25px;'>Metatietoja ei ole lisätty</h1>
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
              </a>
              ';
            } else {
              echo '
              <a href="'.base_url().'profile?select='.$meta->id.'">
                <div '.$style.' >
                  <p '.$sel.' >'.$meta->Tieto.'</p>
                  </div>
              </a>
              ';
            }
          } else {
            echo '
            <a href="'.base_url().'profile?select='.$meta->id.'">
              <div '.$style.' >
                <p '.$sel.' >'.$meta->Tieto.'</p>
              </div>
            </a>
            ';
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
      <a href="<?php echo base_url() ?>profile/Harrastus" class="btn btn-success add-btn" title="Lisää harrastus"><span class="glyphicon glyphicon-plus plus"></span></a>
    </h3>
  </div>
  <div class=panel-body>
    <?php foreach($harrastus as $hobby) : ?>
      <?php if ($hobby->User_id == $this->session->userdata('user_id')) {
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
<?php foreach($harrastus as $hobby) : ?>
  <tr>
<?php
  if (isset($_GET['Edit'])) {
    if ($_GET['Edit'] !== $hobby->id) {
      $Harrastus  =   $hobby->harrastus;
      $Mielipide  =   $hobby->vapaasana;
      $Save       =   '<a href="'.base_url().'profile/index?Edit='.$hobby->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
    } else {
      $Harrastus  =   '<input style="max-width: 180px;" name="harrastus" type="text" value="'.$hobby->harrastus.'" />';
      $Mielipide  =   '<input name="vapaasana" type="text" value="'.$hobby->vapaasana.'" />';
      $Save       =   '<input type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset">';
    }
  } else {
    $Harrastus    =   $hobby->harrastus;
    $Mielipide    =   $hobby->vapaasana;
    $Save         =   '<a href="'.base_url().'profile/index?Edit='.$hobby->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
?>
<form action="<?php echo base_url(); ?>profile/harrastus_update/<?php echo $hobby->id; ?>" enctype="multipart/form-data" method="post">
    <td><?php echo $Harrastus; ?></td>
    <td style="max-width: 350px; hover: overflow: auto;"><?php echo $Mielipide; ?></td>
    <td>
      <?php echo $Save; ?>
      <a onclick="return confirm('Haluatko Poistaa Harrastuksen <?php echo $hobby->harrastus; ?>?');" href="<?php echo base_url(); ?>profile/harrastus_delete/<?php echo $hobby->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </form>
  </tr>
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
<?php foreach($tyohistoria as $work_h) : ?>
  <tr>
<?php
  if (isset($_GET['Edit'])) {
    if ($_GET['Edit'] !== $work_h->id) {
      $Työpaikka  =   $work_h->tyopaikka;
      $Tehtävä    =   $work_h->tehtava;
      $Alkoi      =   $work_h->alkoi;
      $Loppui     =   $work_h->loppui;
      $Kuvaus     =   $work_h->kuvaus;
      $Save       =   '<a href="'.base_url().'profile/index?Edit='.$work_h->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
      $width      =   "max-width: 100px;";
    } else {
      $width      =   "max-width: 220px;";
      $Työpaikka  =   '<input style="width: 110px;" name="tyopaikka" type="text" value="'.$work_h->tyopaikka.'" />';
      $Tehtävä    =   '<input style="width: 95px;" name="tehtava" type="text" value="'.$work_h->tehtava.'" />';
      $Alkoi      =   '<input style="width: 95px;" name="Aloitit" type="text" value="'.$work_h->alkoi.'" />';
      $Loppui     =   '<input style="width: 95px;" name="Lopetit" type="text" value="'.$work_h->loppui.'" />';
      $Kuvaus     =   '<input style="width: 95px;" name="vapaasana" type="text" value="'.$work_h->kuvaus.'" />';
      $Save       =   '<input type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset">';
    }
  } else {
    $width = "max-width: 220px;";
    $Työpaikka  =   $work_h->tyopaikka;
    $Tehtävä    =   $work_h->tehtava;
    $Alkoi      =   $work_h->alkoi;
    $Loppui     =   $work_h->loppui;
    $Kuvaus     =   $work_h->kuvaus;
    $Save         =   '<a href="'.base_url().'profile/index?Edit='.$work_h->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
?>
<form action="<?php echo base_url(); ?>profile/tyohistoria_update/<?php echo $work_h->id; ?>" enctype="multipart/form-data" method="post">
    <td><?php echo $Työpaikka; ?></td>
    <td><?php echo $Tehtävä; ?></td>
    <td><?php echo $Alkoi; ?></td>
    <td><?php echo $Loppui; ?></td>
    <td style="<?php echo $width; ?> hover: overflow: auto;"><?php echo $Kuvaus; ?></td>
    <td>
    <?php echo $Save; ?>
      <a onclick="return confirm('Haluatko Poistaa Työhistorian <?php echo $work_h->tyopaikka; ?>?');" href="<?php echo base_url(); ?>profile/tyohistoria_delete/<?php echo $work_h->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </form>
  </tr>
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
<?php foreach($koulutus as $koulut) : ?>
  <tr>
<?php
  if (isset($_GET['Edit'])) {
    if ($_GET['Edit'] !== $koulut->id) {
      $Koulutusnimi  =  $koulut->koulutusnimi;
      $Koulutusaste  =  $koulut->koulutusaste;
      $Oppilaitos    =  $koulut->oppilaitos;
      $Alkoi         =  $koulut->alkoi;
      $Loppui        =  $koulut->loppui;
      $Save          =  '<a href="'.base_url().'profile/index?Edit='.$koulut->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
    } else {
      // $Save = '<a href="'.base_url().'profile/kokemus_update/'.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>';
      $Koulutusnimi  =  '<input style="width: 125px;" name="koulutusnimi" type="text" value="'.$koulut->koulutusnimi.'" />';
      $Koulutusaste  =  '<input style="width: 125px;" name="koulutusaste" type="text" value="'.$koulut->koulutusaste.'" />';
      $Oppilaitos    =  '<input style="width: 100px;" name="oppilaitos" type="text" value="'.$koulut->oppilaitos.'" />';
      $Alkoi         =  '<input style="width: 90px;"  name="alkoi" type="text" value="'.$koulut->alkoi.'" />';
      $Loppui        =  '<input style="width: 90px;"  name="loppui" type="text" value="'.$koulut->loppui.'" />';
      $Save          =  '<input type="submit" class="btn btn-primary" value="Tallenna" title="Tallenna muutokset">';
    }
  } else {
    $Koulutusnimi  =  $koulut->koulutusnimi;
    $Koulutusaste  =  $koulut->koulutusaste;
    $Oppilaitos    =  $koulut->oppilaitos;
    $Alkoi         =  $koulut->alkoi;
    $Loppui        =  $koulut->loppui;
    $Save            =  '<a href="'.base_url().'profile/index?Edit='.$koulut->id.'" class="btn btn-primary" title="Muokkaa"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
?>
<form action="<?php echo base_url(); ?>profile/koulutus_update/<?php echo $koulut->id; ?>" enctype="multipart/form-data" method="post">
  <td><?php echo $Koulutusnimi; ?></td>
  <td><?php echo $Koulutusaste; ?></td>
  <td><?php echo $Oppilaitos; ?></td>
  <td><?php echo $Alkoi; ?></td>
  <td><?php echo $Loppui; ?></td>
    <td>
    <?php echo $Save; ?>
      <a onclick="return confirm('Haluatko Poistaa Koulutuksen <?php echo $koulut->koulutusnimi; ?>?');" href="<?php echo base_url(); ?>profile/koulutus_delete/<?php echo $koulut->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
  </form>
  </tr>
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
      <a href="<?php echo base_url(); ?>profile/kortit" class="btn btn-success add-btn" title="Lisää kortti"><span class="glyphicon glyphicon-plus plus"></span></a>
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
    <?php foreach($kortit as $kortti) : ?>
      <tr>
        <td><p><?php echo $kortti->kortti; ?></p></td>
        <td><p><?php echo $kortti->loppuu; ?></p></td>
        <td style="max-width: 86px"><p><?php echo $kortti->vapaasana; ?></p></td>
        <td>
          <a onclick="return confirm('Haluatko Poistaa Kortin <?php echo $kortti->kortti; ?>?');" href="<?php echo base_url(); ?>profile/kortit_delete/<?php echo $kortti->id; ?>" class="btn btn-danger" title="Poista"><span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <?php endif; ?>
</div>
</div>
