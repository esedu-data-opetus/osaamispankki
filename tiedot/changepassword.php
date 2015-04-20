<?php 
include 'core/init.php';

if (empty($_POST) === false) {
		$required_fields = array('current_password', 'salasana', 'password_again');
		foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'Tähdellä merkatut kohdat täytyy täyttää';
			break 1;
			
		}
	}
	
	if (md5($_POST['current_password']) === $user_data['salasana']) {
		if (trim($_POST['salasana']) !== trim($_POST['password_again'])) {
			$errors[] = 'your new passwords do not match';
		} else if (strlen($_POST['salasana']) < 6) {
			$errors[] = 'Salasanasi täytyy olla vähintään 6 merkkiä pitkä';
		}
	}else {
		$errors[] = 'Sinun nykyinen salasanasi on väärä';
	}
	
	
}






?>   
   
<h3>Salasanan vaihto</h3>

<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Salasanan vaihtaminen onnistui';
} else {
if (empty($_POST) === false && empty($errors) === true) {
	change_password($session_userid, $_POST['salasana']);
	header('Location: changepassword.php?success');
}else if(empty($errors) === false) {
	echo output_errors($errors);

}

?>

<form action="" method="post" class="form-inline">
	<ul class="list-unstyled"  class="form-group">
		<li>
			Nykyinen salasana*:<br>
			<input type="password" class="form-control" name="current_password">
		</li>
		<li>
			Uusi salasana*:<br>
			<input type="password" class="form-control" name="salasana">
		</li>
		<li>
			Salasana uudestaan*:<br>
			<input type="password" class="form-control" name="password_again">
		</li>
		<li>
			
			<input type="submit" class="btn btn-default" name="change_password" value="Vaihda salasana">
		</li>
	</ul>
</form>


<?php 
}
