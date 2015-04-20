<?php
include 'core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Kortit</title>
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
yearRange: "1950:2025",
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



<h4>Kortit</h4>


<form class="form-horizontal" role="form" action"insert.php" method="post">
  <div class="form-group">
    <label for="Kortti">Kortti</label>
    <input type="text" class="form-control" id="kortti" placeholder="Kortti" name="kortti">
  </div>

<div class="form-group">
    <label for="Voimassa">Voimassa</label>
    <input type="text" class="form-control dp" id="voimassa" placeholder="Voimassa" name="voimassa">
  </div>


<input type="submit" value="Tallenna" class="btn btn-success">

</form>




</div>
</center>
</body>
</html>