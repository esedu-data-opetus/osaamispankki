<?php
include 'core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Minä</title>
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
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-arrow-left"> Takaisin</span></a>
        </div>
        
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../logout.php"><button type="button" class="btn btn-danger" style="width:100px; height:25px; text-size:4px; padding:0px;" >Kirjaudu ulos &raquo;</button></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<br>


<center>

<div style="jumbotron">

<h4>Minä</h4>



<form class="form-group" role="form" action"insertmuuta.php" method="post">
  <div class="form-group">
    <label for="Vapaa sana">Vapaa sana</label>
    <input type="text" class="form-control" id="Vapaa sana" placeholder="Vapaa sana" name="vapaasana">
  </div>



  <div class="form-group">
    <label for="Tulevaisuus">Tulevaisuus</label>
    <input type="text" class="form-control" rows="3" id="Tulevaisuus" placeholder="Tulevaisuus" name="tulevaisuus">
  </div>
<br>


<input type="submit" value="Tallenna" class="btn btn-success">

</form>

</div>
</center>
</form>
</body>
</html>
