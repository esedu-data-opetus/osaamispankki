<?php
if (isset($_GET['test'])) {
  echo '<a onclick="loadDocb()" id="demo">GoBack</a>';
} else {
  echo '<a onclick="loadDoc()">Change Content</a>';
}
?>
<div id="demo">
<a onclick="loadDoc()">Change Content</a>
</div>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "foodstore.php?test", true);
  xhttp.send();
}
function loadDocb() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "foodstore.php?back", true);
  xhttp.send();
}
</script>
