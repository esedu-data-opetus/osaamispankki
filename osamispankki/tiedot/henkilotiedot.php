<?php
include 'core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Henkilötiedot</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="js/button.js">
<link href="js/popover.js">
<link rel="stylesheet" type="text/css" href="tiedot.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
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

select[multiple], select[size] {
    height: 200px;
}

.help-block{
  font-size: 5px;
}

.hasDatepicker {
    position: relative;
    z-index: 9999;
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




</script>

</head>






<body>

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
            <li><a href="index.php">Minun tietoni</a></li>
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
    <div class="container">

<center>


<div class="jumbotron">
<br>
<h4>Henkilötiedot</h4>


<H1>TÄÄLLÄ NÄYTETÄÄN KÄYTTÄJÄN HENKILÖTIEDOT</H1>



<!--

<form class="form-group" role="form" action"insert.php" method="post">
  <div class="form-group">
    <label for="etunimi">Etunimi</label>
    <input type="text" class="form-control" id="etunimi" placeholder="Etunimi" name="eNimi">
  </div>

<hr>


  <div class="form-group">
    <label for="sukunimi">Sukunimi</label>
    <input type="text" class="form-control" id="sukunimi" placeholder="Sukunimi" name="sNimi">
  </div>


<hr>

  <div class="form-group">
    <label for="Lähiosoite">Lähiosoite</label>
    <input type="text" class="form-control" id="Lähiosoite" placeholder="Lähiosoite" name="kOsoite">
  </div>

<hr>


  <div class="form-group">
    <label for="postitoimipaikka">Postitoimipaikka</label>
    <input type="text" class="form-control" id="postitoimipaikka" placeholder="Postitoimipaikka" name="postiTp">
  </div>

<hr>


  <div class="form-group">
    <label for="postinumero">Postinumero</label>
    <input type="text" class="form-control" id="postinumero" placeholder="Postinumero" name="postiNro">
  </div>


<hr>

  <div class="form-group">
    <label for="Syntymäaika">Syntymäaika</label>
    <input type="text" class="form-control dp" id="Syntymäaika" placeholder="Syntymäaika" name="sAika">
  </div>

<hr>

<label>Sukupuoli</label> <br>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" autocomplete="off" id="Spuolimies" name="sPuolimies"> Mies
  </label>
  <label class="btn btn-primary">
    <input type="radio" autocomplete="off" id="Spuolinainen" name="sPuolinainen"> Nainen
  </label>
</div>

<hr>




<label for="Ajokortti">Ajokortti</label>
<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Voit valita useamman ajokorttiluokan kerralla painamalla Ctrl-näppäintä pohjaan. Sama toimii Macillä Command-näppäimestä. ">?</button>
<div class="form-group">

<select multiple class="form-control" id="Ajokortti" name="ajokortti" style="height=350px">
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


<hr>


  <!--div class="form-group">
    <label for="Ajokorttiluokka">Ajokorttiluokka</label>
    <input type="text" class="form-control" id="Ajokorttiluokka"  placeholder="Ajokorttiluokka" name="ajokorttiluokka">
  </div-->

  <!--hr-->
  
<!--
<label for="exampleInputFile">Valokuva????!?!?!?!??</label>
<input type="file" id="Valokuva" name="paivitetty_valokuva">

<br>

<input type="submit" value="Tallenna" class="btn btn-success">

</form>
-->

</div>
</center>
</body>
</html>