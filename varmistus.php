<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/screen.css">
	<link href="./css/bootstrap.css" type="text/css" rel="stylesheet">
	<script src="js/less.js"></script>

<?php
require 'functions/users.php';

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT hloID,tunnus,eNimi,sNimi FROM henkilotiedot WHERE varmistettu = 0");

?> <form method="post"><?php
echo "<div  class='table-responsive'>";
echo "<table  class='table'>" ;
echo "<tr> <th>Sähköposti</th> <th>Etunimi</th> <th>sukunimi</th></tr>";
        while ($row = mysqli_fetch_array($result)){
           	echo "<tr><td>"; 	
	echo $row['tunnus'];
        ?> <input type="hidden" value="<?php echo $row['hloID']; ?>" name="hloid"> <?php
	echo "</td><td>"; 	
	echo $row['eNimi']; 	
	echo "</td><td>";
	echo $row['sNimi'];
        echo "</td><td>";
	?>  <input type="submit" value="varmistettu" ><?php
	echo "</td></tr>";
	echo "</div>";
	
} 

echo "</table>";
echo "</div>";
    ?>   </form>  <?php 
        if(empty($_POST) === false && empty ($errors) === true) {
        
            $hloid = $_POST['hloid'];
            
            hyvaksy_user($hloid);
            
        }