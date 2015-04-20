<?php 
include '/core/init.php';
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

$('#modal').on('show', function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
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

            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Osaamispankki</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
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

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
    <h1>Omat tietoni</h1>
   








<!-- modal TYÖHISTORIA -->

<br>


<a href="tyohistoria.php"><button type="button" class="btn btn-primary btn-lg">  
  <span class="glyphicon glyphicon-list-alt"></span> Työhistoria  
</button></a>




<!-- Modal TYÖHISTORIA -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="datapick">Kerro tässä itsestäsi</h4>
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




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- modal /TYÖHISTORIA-->


<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tyohistoriamodal">
   <span class="glyphicon glyphicon-plus"></span>   
</button>








  <!--  <p>Tervetuloa käyttäjä <?php echo $_SESSION['user']; ?>!</p> -->




   
  

</div> <!-- /container -->

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








<script>
  $("#asd").click(function(){
    $(".dropdown-menu").toggle(300);
  });
  
  
  $("#asd").blur(function(){
    $(".dropdown-menu").hide(300);
  });
</script> 

</div>
</div>  
</html>
</body>
</html>