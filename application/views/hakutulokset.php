<?php
echo form_open('sivu/hakutulokset');
$haku = array('value'=> $this->input->post('haku'),'name'=>'haku','id'=>'haku', 'size'=>'40', 'type'=>'text', 'placeholder'=>'Kirjoita haku tähän');
echo '<br>'.form_input($haku);
echo form_submit('submit', 'Hae', 'class="btn btn-success"');
form_close();
echo '</div>';
//Näytetään kaikki tulokset jos haku on tyhjä tai sisältää pelkkiä välilyöntejä

  $match = trim($this->input->post('haku'));
  $str = preg_replace( "/\s+/", " ", $match);

    if($str === '' OR $str === ' '){
echo '<h1>Näytetään kaikki tulokset</h1>';
}
else{
echo '<h1>Tulokset haulla "'.$this->input->post('haku'). '"</h1>';
}

?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="panel-group">
<?php

  

$i=0;
foreach ($query as $row){
 if($row->aktiivisuus == 1){
$i++;


echo '<div class="panel panel-default">';
echo ' 	<div class="panel panel-default">
    	 <div class="panel-heading" style="">';
    	 echo '<h4 style="margin-top:10px;text-align:center">'.$row->etunimi. ' '. $row->sNimi .'</h4>';
    	 //Profiilikuvan hakeminen
    	 if (!isset($row->pkuva)){echo '<img src="../../images/profiili/default.png" alt="profiilikuva" style="float:left;width:100px;height:100px;border: 5px solid black"> ';} else { echo '<img src="../../images/profiili/'.$row->pkuva.'" alt="profiilikuva" style="float:left;width:100px;height:100px;border: 5px solid black"> ';}

    //echo '<p style="margin-left:120px">';

      //haetaan harrastukset
  $query3 = $this->db->query("SELECT * FROM harrastukset WHERE sposti ='".$row->sposti."'");
  if($query3->num_rows() > 0)
  {

echo '
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#t'.$i.'">Näytä harrastukset</button>
  <div id="t'.$i.'" class="collapse">';

echo '
<table class="table table-striped">
 <tr>
    <th>Harrastus</th>
    <th>Kuvaus</th>     
  </tr>';

  foreach($query3->result() as $row3){
    echo '<tr><td>'. $row3->harrastus .'</td><td>'. $row3->vapaasana .'</td></tr>';
    }

echo '</table></div>';
    
  }
      echo '<br><br>';
 

    //haetaan työkokemus
	$query3 = $this->db->query("SELECT * FROM tyo WHERE sposti ='".$row->sposti."'");
	if($query3->num_rows() > 0)
	{

echo '
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#h'.$i.'">Näytä työkokemukset</button>
  <div id="h'.$i.'" class="collapse">';

echo '
<table class="table table-striped">
 <tr>
    <th>Tehtävä</th>
    <th>Työpaikka</th>		
    <th>Alku</th>
    <th>Loppu</th>

  </tr>';

  foreach($query3->result() as $row3){
		echo '<tr><td>'. $row3->tehtava .'</td><td>'. $row3->tyopaikka .'</td><td>' .$row3->alkoi .'</td><td>' .$row3->loppui .'</td>' . '</tr>';
		}

echo '</table></div>';
		
	}
    	echo '<br><br>';


 //haetaan koulutus
	$query4 = $this->db->query("SELECT * FROM koulutukset WHERE sposti ='".$row->sposti."'");
	if($query4->num_rows() > 0)
	{

echo '
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#k'.$i.'">Näytä koulutus</button>
  <div id="k'.$i.'" class="collapse">';

echo '
<table class="table table-striped">
 <tr>
    	<th>Koulutuksen nimi</th>
	<th>Koulutusaste</th>
    	<th>Oppilaitos</th>
    	<th>Alkoi</th>
    	<th>Loppui</th>
  </tr>';

  foreach($query4->result() as $row4){
		echo '<tr><td>'. $row4->koulutusnimi . '</td><td>'. $row4->koulutusaste . '</td><td>'. $row4->oppilaitos .'</td><td>'. $row4->alkoi . '</td><td>'. $row4->loppui . '</td>'.'</tr>';
		}

echo '</table></div>';
}
else
{
echo '<br><br>';
}

echo'
    	</p><br>';
		echo'</div>';
		echo '<div class="panel-body">
     	 <b>Sähköposti:</b> '.$row->privSposti.'<br>
       <b>Etunimi:</b> '.$row->etunimi.'<br>
       <b>Sukunimi:</b> '.$row->sNimi.'<br>
       <b>Osoite:</b> '.$row->osoite.'<br>
       <b>Postinumero:</b> '.$row->postinro.'<br>
       <b>Puhelinnumero:</b> '.$row->puhelinnro.'<br>
       <b>Lyhyt kuvaus:</b> '.$row->lyhytKuvaus.'

     	 </div>
   		 </div>';
echo '</div> <br>';
}
}
?>
