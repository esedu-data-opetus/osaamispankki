<?php
echo form_open('sivu/hakutulokset');
$haku = array('value'=> $this->input->post('haku'),'name'=>'haku','id'=>'haku', 'size'=>'40', 'type'=>'text', 'placeholder'=>'Kirjoita haku tähän');
echo '<br>'.form_input($haku);
echo form_submit('submit', 'Haku', 'class="btn btn-success"');
form_close();
echo '</div>';
if($this->input->post('haku') == '')
{
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
$i++;
echo '<div class="panel panel-default">';
echo ' 	<div class="panel panel-default">
    	 <div class="panel-heading" style="">';
    	 echo '<h4 style="margin-top:10px;text-align:center">'.$row->etunimi. ' '. $row->sNimi .'</h4>';
    	 //Profiilikuvan hakeminen
    	 if (!isset($row->pkuva)){echo '<img src="../../images/profiili/default.png" alt="profiilikuva" style="float:left;width:100px;height:100px;border: 5px solid black"> ';} else { echo '<img src="../../images/profiili/'.$row->pkuva.'" alt="profiilikuva" style="float:left;width:100px;height:100px;border: 5px solid black"> ';}

    //echo '<p style="margin-left:120px">';
    //haetaan työkokemus
	$query3 = $this->db->query("SELECT * FROM tyo WHERE sposti ='".$row->sposti."'");
	if($query3->num_rows() > 0)
	{

echo '
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#t'.$i.'">Näytä työkokemukset</button>
  <div id="t'.$i.'" class="collapse">';

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
  </tr>';

  foreach($query4->result() as $row4){
		echo '<tr><td>'. $row4->koulutusnimi . '</td></tr>';
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
     	 Lyhyt kuvaus: '.$row->lyhytKuvaus.'
     	 </div>
   		 </div>';
echo '</div> <br>';
}
?>
