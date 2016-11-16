<?php
class User_model extends CI_Model {
  public function create_member() {
    echo "User: ".$_POST['etunimi']."<br>";
    echo "Email: ".$_POST['sposti']."<br>";
    echo "Password: ".md5($_POST['salasana'])."<br>";
    echo "<a href=".base_url().">Go Home Ur Drunk</a>";
  }
}
