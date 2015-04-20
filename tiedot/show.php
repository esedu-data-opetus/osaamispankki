
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

<?

/*
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('osaamispankki');

$query = "SELECT * FROM henkilotiedot"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}


echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['eNimi'] . "</td>     <td>" . $row['postiNro'] . "</td>    <td>" . $row['sNimi'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection
?>



</head>
<div class="panel panel-default">
 
  <div class="panel-heading">Panel heading</div>
  <div class="panel-body">
    <p>....</p>
  </div>

  <!-- Table -->
  <table class="table">
     <tr>
    <td>test</td>
    <td>gnrjek</td> 
    <td>gskjgr</td>
  </tr>
  </table>
</div>




<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">
  	
<?
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('osaamispankki');

$query = "SELECT * FROM henkilotiedot"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}


echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<br>" . $row['eNimi'] . "</br>  <br>" .  $row['postiNro'] . "</br>    <br>" . $row['sNimi'] . "</br>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection
?>
  </span>
  <input type="hidden" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
</div>

*/
<dl class="dl-horizontal">
  <dt>Etunimi</dt>
  <dd>wrert</dd>
  <dt>Sukunimi</dt>
  <dd>gerrge</dd>
  <dt>Postinumero</dt>
  <dd>nrgnrkj</dd>
</dl>



<dl class="dl-horizontal">

<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('osaamispankki');

$query = "SELECT * FROM henkilotiedot"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}




while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<dl><dd>" . "<dt>Etunimi</dt>"   . $row['eNimi'] . "</dd>     <dd>" . "<dt>sukunimi</dt>" . $row['sNimi'] . "</dd>    <dd>" . "<dt>Postinumero</dt>" . $row['postiNro'] . "</dd></dlr>";  //$row['index'] the index here is a field name
}


mysql_close(); //Make sure to close out the database connection
?>

</dl>