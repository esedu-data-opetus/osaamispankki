<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
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


</style>
<script>
$(function() {
$( ".dp" ).datepicker();
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


</script>



  <title>Haku</title>
</head>
<body>

<center>
<div class="jumbotron">


<h4>HAKU</h4>



  <div class="form-group">
    <label for="Työ">Työ</label>
    <input type="text" class="form-control" id="Työ" placeholder="Työ" name="tyo">
  </div>



  <div class="form-group">
    <label for="Milloin aloittaa">Milloin aloittaa</label>
    <input type="text" class="form-control dp" id="Milloin aloittaa" placeholder="Milloin aloittaa" name="milloinaloittaa">
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
    <label for="Päivätyö">Päivätyö</label>
    <input type="text" class="form-control" id="Päivätyö" placeholder="Päivätyö" name="paivatyo">
  </div>



  <div class="form-group">
    <label for="Iltatyö">Iltatyö</label>
    <input type="checkbox" id="Iltatyö" placeholder="Iltatyö" name="iltatyo">
  </div>



  <div class="form-group">
    <label for="Yötyö">Yötyö</label>
    <input type="checkbox" id="Yötyö" placeholder="Yötyö" name="yotyo">
  </div>



  <div class="form-group">
    <label for="kaksivuorotyö">Kaksivuorotyö</label>
    <input type="checkbox" id="kaksivuorotyö" placeholder="kaksivuorotyö" name="kaksivuorotyo">
  </div>



  <div class="form-group">
    <label for="kolmevuorotyö">Kolmevuorotyö</label>
    <input type="checkbox" id="kolmevuorotyö" placeholder="kolmevuorotyö" name="kolmevuorotyo">
  </div>





  <div class="form-group">
    <label for="Paikkakunta">Paikkakunta</label>
  <input type="text" id="Paikkakunta" class="form-control" placeholder="Paikkakunta" name="paikkakunta">
  </div>

<a href="#"><button type="button" class="btn btn-success">Tallenna tiedot &raquo;</button></a>


</div>
</center>
</body>
