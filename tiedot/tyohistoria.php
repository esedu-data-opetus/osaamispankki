<?php
include 'core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Työhistoria</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="js/popover.js">
<!-- <script src="./js/less.js"></script> -->
<!-- Custom styles for this template -->
<meta charset="utf-8">
<style>
.form-group {
  width: 200px;
}

.help-block{
  font-size: 5px;
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
yearRange: "1950:2014",
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
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-arrow-left"> Takaisin</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
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

<center>

<div class="container">

<div class="jumbotron">



<h4>Työhistoria</h4>



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
    <textarea class="form-control" type="text"  rows="3" id="Työtehtävät" placeholder="Työtehtävät" name="tyotehtava"></textarea>
  </div>




 <div class="form-group">
    <label for="Kuvaus">Kuvaus</label>
    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Kerro tässä esimerkiksi oliko työkokemus TOPP-jakso, TET-jakso, Kesätyö tms.">?</button>
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



<input type="submit" class="btn btn-success">
</form>

</div>
</div>
</center>
</form>
</body>
</html>
