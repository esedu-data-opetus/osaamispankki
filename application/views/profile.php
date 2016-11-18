<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<?php
  echo '<a role="button" id="osaamispankki"  href="'.base_url().'">Osaamispankki</a>';
  echo '<a href="haku" class="btn btn-success" style="text-decoration:none;font-size:1.5em;" id="confirm-delete" ><span class="glyphicon glyphicon-search">Hakuun</span></a>';
  echo '<a id="kirjauduulos" style="float:right;" href="'.base_url().'users/logout" >Kirjaudu ulos</a>';
  echo '</b>';
  echo '</nav>';
?>

<!-- Modal HARRASTUKSET -->
<div class="modal fade" id="myModalHarrastukset">
 <div class="vertical-alignment-helper">
  <div class="modal-dialog vertical-align-center modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
      </div>
        <?php

        $query = $this->db->query("SELECT id, harrastus, vapaasana FROM harrastukset WHERE sposti ='".$this->session->userdata('sposti'). "'");


  foreach ($query->result() as $row)
  {
    $id 	   = "$row->id";
    $harrastus = "$row->harrastus";
    $vapaasana   = "$row->vapaasana";

       }
        ?>
      <div class="modal-footer">

      <?php
       echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_harrastukset/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
       ?>
      <button type="button" class="btn btn-default"  data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
      </div>
    </div>
   </div>
  </div>
</div>

<!-- Modal TYOHISTORIA -->
<div class="modal fade" id="myModalTyohistoria">
 <div class="vertical-alignment-helper">
  <div class="modal-dialog vertical-align-center modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
      </div>
        <?php

        $query = $this->db->query("SELECT id, tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

  foreach ($query->result() as $row)
  {
    $id 	   = "$row->id";
    $tyopaikka = "$row->tyopaikka";
    $tehtava   = "$row->tehtava";
    $alkoi     = "$row->alkoi";
    $loppui    = "$row->loppui";
    $kuvaus    = "$row->kuvaus";
  }

        ?>
      <div class="modal-footer">

      <?php
       echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_tyohistoria/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
       ?>
      <button type="button" class="btn btn-default"  data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
      </div>
    </div>
   </div>
  </div>
</div>

<!-- Modal KOULUTUKSET -->
<div class="modal fade" id="myModalKoulutukset">
 <div class="vertical-alignment-helper">
  <div class="modal-dialog vertical-align-center modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
      </div>
        <?php


      $query = $this->db->query("SELECT id, koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

  foreach ($query->result() as $row)
  {
    $id 		  = "$row->id";
    $koulutusnimi = "$row->koulutusnimi";
    $koulutusaste = "$row->koulutusaste";
    $oppilaitos   = "$row->oppilaitos";
    $alkoi2 	  = "$row->alkoi";
    $loppui2 	  = "$row->loppui";
  }

        ?>
      <div class="modal-footer">
      <?php
       echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_koulutukset/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
       ?>
        <button type="button" class="btn btn-default" data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
      </div>
    </div>
   </div>
  </div>
</div>

<!-- Modal KORTIT -->
<div class="modal fade" id="myModalKortit">
 <div class="vertical-alignment-helper">
  <div class="modal-dialog vertical-align-center modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
      </div>
        <?php


      $query = $this->db->query("SELECT id, knimi, voimassa, kommentti, sposti FROM opiskelijakortit WHERE sposti ='".$this->session->userdata('sposti'). "'");

  foreach ($query->result() as $row)
  {
    $id 	= "$row->id";
    $knimi 	 = "$row->knimi";
    $voimassa = "$row->voimassa";
    $kommentti = "$row->kommentti";

  }

        ?>
      <div class="modal-footer">
      <?php
       echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_kortit/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
       ?>
        <button type="button" class="btn btn-default" data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
      </div>
    </div>
   </div>
  </div>
</div>

<?php
$query = $this->db->query("SELECT etunimi FROM kirjautumistiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result() as $row){
		$etunimi = "$row->etunimi";

	}
?>

	<?php
		echo '<center>';
		echo '<div class="col-xs-4 col-md-8 col-md-offset-2">';
		//Jos nimen viimeinen kirjain on 's' printtaa ksen profiili
		if (substr($etunimi, -1) == 's')
		{																					//Poistaa nimestä s:n
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".rtrim($etunimi, "s")."</h1>";?><h1 style="display:inline;"><b>ksen profiili</b></h1><br><?php
		}
		//Jos nimen viimeinen kirjain on 'n' tai 'l' tai 'k' tai 'r' printtaa in profiili
		elseif (substr($etunimi, -1) == 'n' ||
				substr($etunimi, -1) == 'l' ||
				substr($etunimi, -1) == 'k' ||
				substr($etunimi, -1) == 'r' ||
				substr($etunimi, -1) == 'd')
		{
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>in profiili</b></h1><br><?php
		}
		//Jos nimen kaksi viimeistä kirjainta on 'ax'  tai 'ex' printtaa in profiili
		elseif (substr($etunimi, -2) == 'ax' ||
				substr($etunimi, -2) == 'ex' ||
				substr($etunimi, -2) == 'ng')
		{
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>in profiili</b></h1><br><?php
		}
		//Jos nimen viimeinen kirjain on 'x' printtaa en profiili
		elseif (substr($etunimi, -1) == 'x' ||
			    substr($etunimi, -1) == 'g')
		{
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>en profiili</b></h1><br><?php
		}

		//Jos nimi päättyy 'u'  tai 'i' tai 'e' tai 'o' tai 'u' tai 'ö' printtaa n profiili
	 	elseif (substr($etunimi, -1) == 'u' ||
	 		substr($etunimi, -1) == 'i' ||
	 		substr($etunimi, -1) == 'e' ||
	 		substr($etunimi, -1) == 'o' ||
	 		substr($etunimi, -1) == 'u' ||
	 		substr($etunimi, -1) == 'ö' ||
	 		substr($etunimi, -1) == 'a')
	 	{
		 	echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>n profiili</b></h1><br><?php
		}
		echo '</center><br><br><br><br>';
		echo '</div><br>'


?>
