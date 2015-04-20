<?php
include 'core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
  <title>Harrastus</title>
<meta charset="utf-8">
<style>
form {
  width: 200px;
}
textarea.form-control {
  width: 200px;
  height: 131px;
}
</style>


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
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-arrow-left"> Takaisin</span></a>
        </div>
        
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../logout.php"><button type="button" class="btn btn-danger" style="width:100px; height:25px; text-size:4px; padding:0px;" >Kirjaudu ulos &raquo;</button></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<center>
<div class="jumbotron">

<form class="form" role="form" action"insert.php" method="post">
<h4>Harrastukset</h4>



  <div class="form-group">
    <label for="Harrastus">Harrastukset</label>
    <input type="text" class="form-control" id="Harrastus" placeholder="Harrastus" name="harrastus">
  </div>
  

  <div class="form-group">
    <label for="Kuvaus">Kuvaus</label>
    <textarea class="form-control" type="text" rows="3" id="Kuvaus" placeholder="Kuvaus" name="kuvaus"></textarea>
  </div>


<input type="submit" class="btn btn-success" value="Tallenna">
</form>

</div>
</center>

</body>
</html>
