<?php
include 'core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Työtehtävät</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="js/button.js">
<link rel="stylesheet" type="text/css" href="tiedot.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<!-- <script src="./js/less.js"></script> -->
<!-- Custom styles for this template -->
<meta charset="utf-8">
<style>
.form-group {
  width: 200px;
}

textarea.form-control {
  width: 200px;
  height: 131px;
}

.hasDatepicker {
    position: relative;
    z-index: 9999;
}

</style>
<script>

 $(function() {
$( "#datepicker" ).datepicker();
$( "#anim" ).change(function() {
$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
});
});

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
yearRange: "1950:2016",
yearSuffix: ''};
$.datepicker.setDefaults($.datepicker.regional['fi']);
});






</script>

</head>






<body>

<center>

 <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">

            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-arrow-left"> Takaisin</span></a>
        </div>
        
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../logout.php"><button type="button" class="btn btn-danger" style="width:100px; height:25px; text-size:4px; padding:0px;" >Kirjaudu ulos &raquo;</button></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="jumbotron">

<h4>Työtehtävät(TYÖNANTAJA)</h4> 


<form class="form-horizontal" role="form" action"insert.php" method="post">
  <div class="form-group">
    <label for="Työtehtävä">Työtehtävä</label>
    <input type="text" class="form-control" id="Työtehtävä" placeholder="Työtehtävä" name="tyotehtava">
  </div>





  <div class="form-group">
    <label for="Kuvaus">Kuvaus</label>
    <textarea class="form-control" type="text"  rows="3" id="Kuvaus" placeholder="Kuvaus" name="kuvaus"></textarea>
  </div>




  <div class="form-group">
    <label for="Milloin alkaa">Milloin alkaa</label>
    <input type="text" class="form-control dp" id="Milloin alkaa" placeholder="Milloin alkaa" name="milloinalkaa">
  </div>




  <div class="form-group">
    <label for="Mihin asti">Mihin asti</label>
    <input type="text" class="form-control dp" id="Mihin asti" placeholder="Mihin asti" name="mihinasti">
  </div>



  <div class="form-group">
    <label for="Maksimi viikkotunnit">Maksimi viikkotunnit</label>
    <input type="text" class="form-control" id="Maksimi viikkotunnit" placeholder="Maksimi viikkotunnit" name="maxviikkoh">
  </div>



  <div class="form-group">
    <label for="Minimi viikkotunnit">Minimi viikkotunnit</label>
    <input type="text" class="form-control" id="Minimi viikkotunnit" placeholder="Minimi viikkotunnit" name="minviikkoh">
  </div>








<label>Päivätyö</label> <br>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active"-->
    <input type="checkbox" autocomplete="off" class="form-control" id="Päivätyö" name="paivatyo"> Päivätyö
  </label>
  </div>



<br>


  <label>Yötyö</label> <br>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="checkbox" autocomplete="off" id="Yötyö" name="yotyo"> Yötyö
  </label>
  </div>


<br>


  <label>Kesätyö</label> <br>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="checkbox" autocomplete="off" id="Kesätyö" name="kesatyo"> Kesätyö
  </label>
  </div>

  <br>



   <label>kaksivuorotyö</label> <br>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="checkbox" autocomplete="off" id="kaksivuorotyö" name="kaksivuorotyo"> Kaksivuorotyö
  </label>
  </div>


<br>

  <label>kolmevuorotyö</label> <br>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="checkbox" autocomplete="off" id="kolmevuorotyö" name="sPuolimies"> Kolmevuorotyö
  </label>
  </div>

<br>

<hr>


<div class="form-group">
    <label for="Paikkakunta">Paikkakunta</label>
    <input type="text" class="form-control" id="Paikkakunta" placeholder="Paikkakunta" name="milloinalkaa">
  </div>




<input type="submit" value="Tallenna" class="btn btn-success">



</form>
</div>
</center>
</body>
</html>

