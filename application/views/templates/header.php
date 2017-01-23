<?php
	if ($this->session->userdata('First_login') && $this->uri->segment(2) == "set_profile") {
		$disabled = "disabled";
	} else {
		$disabled = "";
	}
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>">Osaajapankki</a>
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
		<a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>profile">Oma profiili</a>
<?php if ($this->session->userdata('KT') == 3) :?>
		<a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>users/haku"><span class="glyphicon glyphicon-search"></span> Haku</a>
<?php
	$num = "?";
	$n = 1;
if (isset($Palautteet)) {
 	foreach($Palautteet as $Palaute) {
		$num = $n++;
	}
}
?>
		<a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Palaute/hae_palaute"><span class="glyphicon glyphicon-list-alt"></span> Palaute <?php echo $num; ?>!</a>
<?php else : ?>
		<a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Palaute/hae_palaute_user/<?php echo md5($this->session->userdata('sposti')); ?>"><span class="glyphicon glyphicon-list-alt"></span> Palautteesi</a>
<?php endif; ?>
<?php endif; ?>
</div>
</nav>

	<div style="margin: 0 0 30px 0"></div>
