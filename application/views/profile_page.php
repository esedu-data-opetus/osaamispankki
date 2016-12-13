<style>
.table td:hover {
  overflow-x: auto;
}
td {
  overflow: hidden;
}
.table td input {

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
  <img src="<?php echo base_url()."/images/profiili/"; echo $User->Prof_Pic; ?>" class="img-responsive img-thumbnail" title="<?php echo $User->Prof_Pic; ?>" height="200" width="200">
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
</div>
</div>

<div style="position:relative; margin-left:240px; margin-top:-235px;">
<?php foreach($User_Info as $User) : ?>
  <p>Nimi: <?php echo $User->F_Name." ".$User->L_Name; ?></p>

  <p>Sähköposti: <?php echo $User->Own_Email; ?></p>

  <p>Osoite: <?php echo $User->Osoite; ?></p>

  <p>Postinumero: <?php echo $User->Posti_Num; ?></p>

  <p>Puhelinnumero: <?php echo $User->Puh_Num; ?></p>

  <p>Kuvaus: <?php echo $User->About; ?></p>
<?php endforeach; ?>
<a href="<?php echo base_url(); ?>profile/edit" class="btn btn-primary" style="margin-left: 5px;"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></a><br><br>
</div>

<!--Harrastukset-->
<div class="panel panel-primary">
  <div class=panel-heading>
    <h3 class=panel-title>
      <a href="<?php echo base_url() ?>profile/prototype/Harrastus" class="btn btn-success glyphicon glyphicon-plus"></a>
      <span style="font-size: 22px;">Harrastukset</span>
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
  <h1 style='margin:0;padding:0;color:red;font-weight:bold;'>Harrastuksia ei ole lisätty</h1>
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
      $Save       =   '<a href="'.base_url().'profile/index?Edit='.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>';
    } else {
      // $Save = '<a href="'.base_url().'profile/kokemus_update/'.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>';
      $Harrastus  =   '<input style="max-width: 190px;" name="Loota_1" type="text" value="'.$hobby->Loota_1.'" />';
      $Mielipide  =   '<input name="Mielipide" type="text" value="'.$hobby->Mielipide.'" />';
      $Save       =   '<input type="submit" class="btn btn-primary">';
    }
  } else {
    $Harrastus    =   $hobby->Loota_1;
    $Mielipide    =   $hobby->Mielipide;
    $Save         =   '<a href="'.base_url().'profile/index?Edit='.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>';
  }
?>

<form action="<?php echo base_url(); ?>profile/kokemus_update/<?php echo $hobby->id; ?>" enctype="multipart/form-data" method="post">
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Harrastus; ?></td>
    <td style="padding: 8px 0 0 0; max-width: 80px;"><?php echo $Mielipide; ?></td>
    <td>
    <?php echo $Save; ?>
      <a onclick="return confirm('Oletko Varma!?');" href="<?php echo base_url(); ?>profile/delete/<?php echo $hobby->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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
    <a href="<?php echo base_url() ?>profile/prototype/Tyohistoria" class="btn btn-success glyphicon glyphicon-plus"></a>
    <span style="font-size: 22px;">Työhistoria</span>
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
  <h1 style='margin:0;padding:0;color:red;font-weight:bold;'>Työhistoriaa ei ole lisätty</h1>
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
      $Save       =   '<a href="'.base_url().'profile/index?Edit='.$work_h->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>';
    } else {
      // $Save = '<a href="'.base_url().'profile/kokemus_update/'.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>';
      $Työpaikka  =  '<input style="width: 110px;" name="Loota_1" type="text" value="'.$work_h->Loota_1.'" />';
      $Tehtävä    =  '<input style="width: 95px;" name="Loota_2" type="text" value="'.$work_h->Loota_2.'" />';
      $Alkoi      =  '<input style="width: 95px;" name="Aloitit" type="text" value="'.$work_h->Aloitit.'" />';
      $Loppui     =  '<input style="width: 95px;" name="Lopetit" type="text" value="'.$work_h->Lopetit.'" />';
      $Kuvaus     =  '<input style="width: 95px;" name="Mielipide" type="text" value="'.$work_h->Mielipide.'" />';
      $Save       =  '<input type="submit" class="btn btn-primary">';
    }
  } else {
    $Työpaikka    =   $work_h->Loota_1;
    $Tehtävä      =   $work_h->Loota_2;
    $Alkoi        =   $work_h->Aloitit;
    $Loppui       =   $work_h->Lopetit;
    $Kuvaus       =   $work_h->Mielipide;
    $Save         =   '<a href="'.base_url().'profile/index?Edit='.$work_h->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>';
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
      <a onclick="return confirm('Haluatko varmasti poistaa tuon?');" href="<?php echo base_url(); ?>profile/delete/<?php echo $work_h->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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
      <a href="<?php echo base_url() ?>profile/prototype/Koulutus" class="btn btn-success glyphicon glyphicon-plus"></a>
      <span style="font-size: 22px;">Koulutukset</span>
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
  <h1 style='margin:0;padding:0;color:red;font-weight:bold;'>Koulutuksia ei ole lisätty</h1>
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
      $Save          =  '<a href="'.base_url().'profile/index?Edit='.$koulutus->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>';
    } else {
      // $Save = '<a href="'.base_url().'profile/kokemus_update/'.$hobby->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></a>';
      $Koulutusnimi  =  '<input style="width: 125px;" name="Loota_1" type="text" value="'.$koulutus->Loota_1.'" />';
      $Koulutusaste  =  '<input style="width: 125px;" name="Loota_2" type="text" value="'.$koulutus->Loota_2.'" />';
      $Oppilaitos    =  '<input style="width: 100px;" name="Loota_3" type="text" value="'.$koulutus->Loota_3.'" />';
      $Alkoi         =  '<input style="width: 90px;" name="Aloitit" type="text" value="'.$koulutus->Aloitit.'" />';
      $Loppui        =  '<input style="width: 90px;" name="Lopetit" type="text" value="'.$koulutus->Lopetit.'" />';
      $Save          =  '<input type="submit" class="btn btn-primary">';
    }
  } else {
    $Koulutusnimi    =  $koulutus->Loota_1;
    $Koulutusaste    =  $koulutus->Loota_2;
    $Oppilaitos      =  $koulutus->Loota_3;
    $Alkoi           =  $koulutus->Aloitit;
    $Loppui          =  $koulutus->Lopetit;
    $Save            =  '<a href="'.base_url().'profile/index?Edit='.$koulutus->id.'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>';
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
      <a onclick="return confirm('Haluatko varmasti poistaa tuon?');" href="<?php echo base_url(); ?>profile/delete/<?php echo $koulutus->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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
      <a href="<?php echo base_url(); ?>profile/prototype/Kortit" class="btn btn-success glyphicon glyphicon-plus" style="font-size:1.2em;line-height:22px;height:35px;"></a>
      <span style="font-size: 22px;">Kortit</span>
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
      <h1 style='margin:0;padding:0;color:red;font-weight:bold;'>Kortteja ei ole lisätty</h1>
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
          <a onclick="return confirm('Haluatko varmasti poistaa tuon?');" href="<?php echo base_url(); ?>profile/delete/<?php echo $kortit->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>        </td>
      </tr>
    <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
    </table>
    <?php endif; ?>
</div>
</div>
