<?php
	if ($this->session->userdata('First_login') && $this->uri->segment(2) == "set_profile") {
		$disabled = "disabled";
	} else {
		$disabled = "";
	}
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">

<?php
	$num = "?";
	$n = 1;
if (isset($Palautteet)) {
 	foreach($Palautteet as $Palaute) {
		$num = $n++;
	}
}
?>

<div class="btn-group">
  <a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="margin: 10px 0 10px 10px;" href="<?php echo base_url(); ?>">Osaajapankki</a>
  <button style="margin: 10px 10px 10px 0;" type="button" class="btn btn-info btn-lg dropdown-toggle <?php echo $disabled; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url(); ?>Loki"><span class="glyphicon glyphicon-backward"></span> Loki</a></li>
	<?php if ($this->session->userdata('KT') == 3) :?>
		<li><a href="<?php echo base_url(); ?>Palaute"><span class="glyphicon glyphicon-list-alt"></span> Palaute <?php echo $num; ?>!</a></li>
	<?php else : ?>
		<li><a href="<?php echo base_url(); ?>Palaute/hae_palaute_user/<?php echo md5($this->session->userdata('sposti')); ?>"><span class="glyphicon glyphicon-list-alt"></span> Palautteesi</a></li>
	<?php endif; ?>
    <li role="separator" class="divider"></li>
    <li><a href="http://www.esedu.fi" target="_blank">@ESEDU</a></li>
  </ul>
</div>

	</div>
	<div class="navbar-right">
		<?php if ($this->session->userdata('is_logged_in') == 1) :?>
			<a class="btn btn-danger btn-lg <?php echo $disabled; ?>" style="float: right; margin: 10px 30px; 10px 10px" href="<?php echo base_url(); ?>Users/Logout">Kirjaudu ulos</a>
		<?php endif; ?>
	</div>
	<div class="Container">
<?php if ($this->session->userdata('is_logged_in') !== 1) :?>
		<a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Users/Login">Kirjautuminen</a>
		<a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Users/Register">Luo tili</a>
<?php else : ?>
		<a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Profile">Oma profiili</a>
<?php if ($this->session->userdata('KT') == 3) :?>
		<a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Haku"><span class="glyphicon glyphicon-search"></span> Haku</a>
<?php endif; ?>
<?php endif; ?>
</div>
</nav>

	<div style="margin: 0 0 30px 0"></div>
