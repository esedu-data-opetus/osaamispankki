<?php 
include 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link href="js/popover.js">

<link rel="shortcut icon" href="favicon.ico">

<title>Osaamispankki</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<!-- <script src="./js/less.js"></script> -->
<!-- Custom styles for this template -->


<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="js/popover.js">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="tiedot.css">
<style type="text/css">

body{
    padding-top: 70px;
}

.help-block{
  font-size: 5px;
}

select[multiple], select[size] {
    height: 200px;
}




</style>


<script>
 $(function() {
$( ".dp" ).datepicker({
changeMonth: true,
changeYear: true
});
});

jQuery(function($){
$.datepicker.regional['fi'] = {
closeText: 'Sulje',
prevText: '&#xAB;Edellinen',
nextText: 'Seuraava&#xBB;',
currentText: 'Tänään',
monthNames: ['Tammikuu','Helmikuu','Maaliskuu','Huhtikuu','Toukokuu','Kesäkuu',
'Heinäkuu','Elokuu','Syyskuu','Lokakuu','Marraskuu','Joulukuu'],
monthNamesShort: ['Tammi','Helmi','Maalis','Huhti','Touko','Kesä',
'Heinä','Elo','Syys','Loka','Marras','Joulu'],
dayNamesShort: ['Su','Ma','Ti','Ke','To','Pe','La'],
dayNames: ['Sunnuntai','Maanantai','Tiistai','Keskiviikko','Torstai','Perjantai','Lauantai'],
dayNamesMin: ['Su','Ma','Ti','Ke','To','Pe','La'],
weekHeader: 'Vk',
dateFormat: 'd.m.yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: ''};
$.datepicker.setDefaults($.datepicker.regional['fi']);
});



$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})









</script>

</head>


<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Osaamispankki</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!--li><a href="index.php">Minun tietoni</a></li-->
            <!--li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="asd">dropdown<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" id="asd">
                <li><a href="tiedot/tyohistoria.php">tyohistoria</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">moi</li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
              </ul>
            </li-->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--li><a href="#">linkki</a></li>
            <li><a href="#">toinen linkki</a></li>
            <li><a href="../logout.php" style="color:red;">Kirjaudu ulos</a></li-->
            <li><a href="../logout.php"><button type="button" class="btn btn-danger" style="width:100px; height:25px; text-size:4px; padding:0px;" >Kirjaudu ulos &raquo;</button></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<!--Tässä alkaa sivun sisältö-->

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
    <h1>Omat tietoni</h1>


<a href="henkilotiedot.php"><button type="button" class="btn btn-primary btn-lg">  
  <span class="glyphicon glyphicon-folder-open"></span> Henkilötiedot  
</button></a>

   <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#henkilotiedotmodal">
   <span class="glyphicon glyphicon-plus"></span>   
</button>

<div class="modal fade" id="henkilotiedotmodal" tabindex="-1" role="dialog" aria-labelledby="henkilotiedotmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="Sulje" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Sulje</span></button>
        <h4 class="modal-title" id="henkilotiedotmodal">Kirjoita tähän lomakkeeseen henkilötietosi.</h4>
      </div>
      <div class="modal-body">


<h4>Henkilötiedot</h4>

<form class="form-group" role="form" action"insert.php" method="post">
  <div class="form-group">
    <label for="etunimi">Etunimi</label>
    <input type="text" class="form-control" id="etunimi" placeholder="Etunimi" name="eNimi">
  </div>




  <div class="form-group">
    <label for="sukunimi">Sukunimi</label>
    <input type="text" class="form-control" id="sukunimi" placeholder="Sukunimi" name="sNimi">
  </div>




  <div class="form-group">
    <label for="Lähiosoite">Lähiosoite</label>
    <input type="text" class="form-control" id="Lähiosoite" placeholder="Lähiosoite" name="kOsoite">
  </div>




  <div class="form-group">
    <label for="postitoimipaikka">Postitoimipaikka</label>
    <input type="text" class="form-control" id="postitoimipaikka" placeholder="Postitoimipaikka" name="postiTp">
  </div>




  <div class="form-group">
    <label for="postinumero">Postinumero</label>
    <input type="text" class="form-control" id="postinumero" placeholder="Postinumero" name="postiNro">
  </div>




  <div class="form-group">
    <label for="Syntymäaika">Syntymäaika</label>
    <input type="text" class="form-control dp" id="Syntymäaika" placeholder="Syntymäaika" name="sAika">
  </div>


<center>

<label>Sukupuoli</label> <br>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" autocomplete="off" id="Spuolimies" name="sPuolimies"> Mies
  </label>
  <label class="btn btn-primary">
    <input type="radio" autocomplete="off" id="Spuolinainen" name="sPuolinainen"> Nainen
  </label>
</div>

</center>




<label for="Ajokortti">Ajokortti</label>
<button type="button" class="btn btn-danger" data-toggle="tooltip"  data-placement="right" title="Voit valita useamman ajokorttiluokan kerralla painamalla Ctrl-näppäintä pohjaan. Sama toimii Macillä Command-näppäimestä. ">?</button>
<div class="form-group">



<select multiple class="form-control" id="Ajokortti" name="ajokortti" style="height=600px">
  <option>En omista</option>
  <option>AM</option>
  <option>A1</option>
  <option>A2</option>
  <option>B1</option>
  <option>B</option>
  <option>C1</option>
  <option>C</option>
  <option>D</option>
  <option>BE</option>
  <option>C1E</option>
  <option>CE</option>
  <option>D1E</option>
  <option>T</option>
  <option>LT</option>
</select>
</div>





  <!--div class="form-group">
    <label for="Ajokorttiluokka">Ajokorttiluokka</label>
    <input type="text" class="form-control" id="Ajokorttiluokka"  placeholder="Ajokorttiluokka" name="ajokorttiluokka">
  </div-->

  <!--hr-->


<label for="exampleInputFile">Valokuva????!?!?!?!??</label>
<input type="file" id="Valokuva" name="paivitetty_valokuva">





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
        <button type="button" class="btn btn-primary test" >Tallenna muutokset</button>
      </div>
    </div>
  </div>
</div>







<!--<a href="#"><button type="button" class="btn btn-primary btn-lg">  
  <span class="glyphicon glyphicon-plus"></span>   
</button></a> -->

<br>
<br>

<a href="harrastus.php"><button type="button" class="btn btn-primary btn-lg">  
  <span class="glyphicon glyphicon-music"></span> Harrastukset  
</button></a> 

<!-- Button trigger modal HARRASTUKSET -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#harrastuksetmodal">
   <span class="glyphicon glyphicon-plus"></span>   
</button>


<!-- Modal HARRASTUS-->
<div class="modal fade" id="harrastuksetmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="Sulje" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Sulje</span></button>
        <h4 class="modal-title" id="myModalLabel">Lisää tähän lomakkeeseen harrastuksiasi.</h4>
      </div>
      <div class="modal-body">
        

      	  <div class="form-group">
    <label for="Harrastus">Harrastukset</label>
    <input type="text" class="form-control" id="Harrastus" placeholder="Harrastus" name="harrastus">
  </div>
  

  <div class="form-group">
    <label for="Kuvaus">Kuvaus</label>
    <textarea class="form-control" type="text"  rows="6" id="Kuvaus" placeholder="Kuvaus" name="kuvaus"></textarea>
  </div>


  <!--div class="form-group">
    <label for="Vapaa">Vapaa</label>
    <input type="text" class="form-control" id="Vapaa" placeholder="Vapaa" name="vapaa">
  </div-->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
        <button type="button" class="btn btn-primary">Tallenna muutokset</button>
      </div>
    </div>
  </div>
</div>





<br>
<br>


<a href="muuta.php"><button type="button" class="btn btn-primary btn-lg">  
  <span class="glyphicon glyphicon-user"></span> Minä  
</button></a>


<!-- Button trigger modal MINÄ-->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#minamodal">
   <span class="glyphicon glyphicon-plus"></span>   
</button>

<!-- Modal MINÄ -->
<div class="modal fade" id="minamodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="Sulje" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Sulje</span></button>
        <h4 class="modal-title" id="myModalLabel">Kerro tässä itsestäsi.</h4>
      </div>
      <div class="modal-body">
        





<form class="form-group" role="form" action"insertmuuta.php" method="post">
  <div class="form-group">
    <label for="Vapaa sana">Vapaa sana</label>
    <textarea class="form-control" type="text"  rows="6" id="Vapaa sana" placeholder="Vapaa sana" name="vapaasana"></textarea>
  </div>



  <div class="form-group">
    <label for="Tulevaisuus">Tulevaisuus</label>
    <textarea class="form-control" type="text"  rows="6" id="Tulevaisuus" placeholder="Tulevaisuus" name="tulevaisuus"></textarea>
  </div>



  <!--div class="form-group">
    <label for="True">True</label>
    <input type="text" class="form-control" id="True" placeholder="True" name="true">
  </div>



  <div class="form-group">
    <label for="False">False</label>
    <input type="text" class="form-control" id="False" placeholder="False" name="false">
  </div-->







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
        <button type="button" class="btn btn-primary">Tallenna muutokset</button>
      </div>
    </div>
  </div>
</div>



<br>



<!-- Button trigger modal TYÖHISTORIA-->



<!-- modal TYÖHISTORIA -->

<br>


<a href="tyohistoria.php"><button type="button" class="btn btn-primary btn-lg">  
  <span class="glyphicon glyphicon-list-alt"></span> Työhistoria  
</button></a>




<!-- Modal TYÖHISTORIA -->
<div class="modal fade" id="tyohistoriamodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="Sulje" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Sulje</span></button>
        <h4 class="modal-title" id="datapick">Kerro tässä lomakkeessa työhistoriastasi.</h4>
      </div>
      <div class="modal-body">
        

      	<form class="form-horizontal" role="form" action"insert.php" method="post">
  <div class="form-group">
    <label for="Työnantaja">Työnantaja</label>
    <input type="text" class="form-control" id="Työnantaja" placeholder="Työnantaja" name="tyonantaja">
  </div>




  <div class="form-group">
    <label for="Työpaikka">Työpaikka</label>
    <input type="text" class="form-control" id="Työpaikka" placeholder="Työpaikka" name="tyopaikka">
  </div>



  <div class="form-group">
    <label for="Toimipaikka">Toimipaikka</label>
    <input type="text" class="form-control" id="Toimipaikka" placeholder="Toimipaikka" name="toimipiste">
  </div>



  <div class="form-group">
    <label for="Työtehtävä">Työtehtävät</label>
    <textarea class="form-control" type="text"  rows="6" id="Työtehtävät" placeholder="Työtehtävät" name="tyotehtava"></textarea>
  </div>




<div class="form-group">
    <label for="Kuvaus">Kuvaus</label>
    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Kerro tässä kohdassa esimerkiksi oliko työkokemuksesi TOPP-jakso, TET-jakso, Kesätyö tms.">?</button>
    <input type="text" class="form-control" id="Kuvaus" placeholder="Kuvaus" name="kuvaus">


  </div>




  <div class="form-group">
    <label for="Alkoi">Alkoi</label>
    <input type="text" class="form-control dp" placeholder="Alkoi" name="alkoi">
  </div>


  <div class="form-group">
    <label for="Loppui">Loppui</label>
    <input type="text" class="form-control dp" placeholder="Loppui" name="loppui">
  </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
        <button type="button" class="btn btn-primary">Tallenna muutokset</button>
      </div>
    </div>
  </div>
</div>
<!-- modal /TYÖHISTORIA-->


<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tyohistoriamodal">
   <span class="glyphicon glyphicon-plus"></span>   
</button>






<br>
<br>

<a href="tyotehtavat.php"><button type="button" class="btn btn-primary btn-lg">  
  <span class="glyphicon glyphicon-wrench"></span> Työtehtävät(ta) 
</button></a>

<br>
<br>


<!--									KORTIT													-->


<a href="kortit.php"><button type="button" class="btn btn-primary btn-lg">  
  <span class="glyphicon glyphicon-credit-card"></span> Kortit  
</button></a>



<!-- Button trigger modal KORTIT -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#kortitmodal">
   <span class="glyphicon glyphicon-plus"></span>   
</button>





<!-- Modal KORTIT -->
<div class="modal fade" id="kortitmodal" tabindex="-1" role="dialog" aria-labelledby="kortitmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="Sulje" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Sulje</span></button>
        <h4 class="modal-title" id="kortitmodal">Kerro tässä korteistasi. Kortteja voivat olla esim. Hygieniapassi tai anniskelupassi.</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action"insertkortti.php" method="post">
          <div class="form-group">
            <label for="Kortti">Kortti</label>
            <input type="text" class="form-control" id="Kortti" placeholder="Kortti" name="kortti">
          </div>

        <div class="form-group">
            <label for="Voimassa">Voimassa</label>
            <input type="text" class="form-control dp" id="Voimassa" placeholder="Voimassa" name="voimassa">
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
        <button type="button" class="btn btn-primary test">Tallenna muutokset</button>
      </div>
    </div>
  </div>
  </form>
</div>








</div> <!-- /container -->





<!--script>
  
//callback handler for form submit
$("#ajaxform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            //data: return data from server
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //if fails     
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
});
 
$("#ajaxform").submit(); //Submit  the FORM

</script-->




<script>
  $("#asd").click(function(){
    $(".dropdown-menu").toggle(300);
  });
  
  
  $("#asd").blur(function(){
    $(".dropdown-menu").hide(300);
  });

$('#ui-datepicker-div').addClass('blockMsg');


</script>

<button class="btn btn-default">Ei alert</button>
<button class="btn btn-default test">Alert</button>
<button class="btn btn-default">Ei alert</button>

<script>


$(document).ready(function(){

  $( ".test" ).click(function() {
    alert('yritys');
    $.get("test1.php", function( data ) {
      alert( "Data Loaded: " + data );
      
    });
  });
});










</script>





</div>
</div>  
</html>
</body>
</html>
<!--
<ul class="nav nav-pills">

  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" id="asd" role="button" aria-expanded="false">
      Dropdown <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
      <li><a href="tiedot/tyohistoria.php">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">moi</li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
    </ul>
  </li>
  </ul>
 -->