<?php defined('BASEPATH') OR exit('No direct script access allowed');	if ($this->session->userdata('First_login') && $this->uri->segment(2) == "set_profile") { $disabled = "disabled"; } else { $disabled = ""; } ?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
				<a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="margin: 10px" href="<?php echo base_url(); ?>">Osaajapankki</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php if ($this->session->userdata('is_logged_in') !== 1) :?>
        <li><a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px;" href="<?php echo base_url(); ?>Users/Login">Kirjautuminen</a></li>
				<li><a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px;" href="<?php echo base_url(); ?>Users/Register">Luo tili</a></li>
			<?php else : ?>
				<li><a style="padding: 0; margin: 10px;" class="<?php echo $disabled; ?>" href="<?php echo base_url(); ?>Profile"><button class="btn btn-primary btn-lg">Oma profiili</button></a></li>
			<?php if ($this->session->userdata('KT') == 3) :?>
				<li><a style="padding: 0; margin: 10px;" class="<?php echo $disabled; ?>" href="<?php echo base_url(); ?>Haku"><button class="btn btn-success btn-lg"><span class="glyphicon glyphicon-search"></span> Haku</button></a></li>
			<?php endif; ?>
        <li><a style="padding: 0; margin: 10px;" class="<?php echo $disabled; ?>" href="<?php echo base_url(); ?>Loki"><button class="btn btn-info btn-lg"><span class="glyphicon glyphicon-backward"></span> Loki</button></a></li>
      <?php if ($this->session->userdata('KT') == 3) :?>
        <li><a style="padding: 0; margin: 10px;" class="<?php echo $disabled; ?>" href="<?php echo base_url(); ?>Palaute"><button class="btn btn-info btn-lg"><span class="glyphicon glyphicon-list-alt"></span> Palaute</button></a></li>
      <?php else : ?>
        <li><a style="padding: 0; margin: 10px;" class="<?php echo $disabled; ?>" href="<?php echo base_url(); ?>Palaute/hae_palaute_user/<?php echo md5($this->session->userdata('sposti')); ?>"><button class="btn btn-info btn-lg"><span class="glyphicon glyphicon-list-alt"></span> Palautteesi</button></a></li>
      <?php endif; ?>
      <?php endif; ?>
    </ul>

      <!-- <?php if ($this->session->userdata('is_logged_in') !== 1) :?>
				<a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Users/Login">Kirjautuminen</a>
				<a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Users/Register">Luo tili</a>
			<?php else : ?>
				<a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Profile">Oma profiili</a>
			<?php if ($this->session->userdata('KT') == 3) :?>
				<a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Haku"><span class="glyphicon glyphicon-search"></span> Haku</a>
			<?php endif; ?>
        <a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Loki"><span class="glyphicon glyphicon-backward"></span> Loki</a>
      <?php if ($this->session->userdata('KT') == 3) :?>
        <a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Palaute"><span class="glyphicon glyphicon-list-alt"></span> Palaute</a>
      <?php else : ?>
        <a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="margin: 10px;" href="<?php echo base_url(); ?>Palaute/hae_palaute_user/<?php echo md5($this->session->userdata('sposti')); ?>"><span class="glyphicon glyphicon-list-alt"></span> Palautteesi</a>
      <?php endif; ?>
      <?php endif; ?> -->

      <ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('is_logged_in') == 1) :?>
					<a class="btn btn-danger btn-lg <?php echo $disabled; ?>" style="float: right; margin: 10px 30px; 10px 10px" href="<?php echo base_url(); ?>Users/Logout">Kirjaudu ulos</a>
				<?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div style="margin: 0 0 80px 0"></div>
