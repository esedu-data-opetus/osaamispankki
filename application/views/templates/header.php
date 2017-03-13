<?php defined('BASEPATH') OR exit('No direct script access allowed');	if ($this->uri->segment(2) == "set_profile") { $disabled = "disabled"; } else { $disabled = ""; } ?>
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
				<li><a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px;" href="<?php echo base_url(); ?>Users/Login">Kirjautuminen</a><li>
				<li><a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px;" href="<?php echo base_url(); ?>Users/Register">Luo tili</a><li>
			<?php else : ?>
        <?php if($this->session->userdata('KT') == 3) : ?>
        <li><div class="btn-group">
          <a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px 0 10px 10px;" href="<?php echo base_url(); ?>Profile">Oma profiili</a>
          <a href="<?php echo base_url(); ?>Profile/Settings/<?php echo $this->session->userdata('user_id'); ?>" class="btn btn-primary" style="padding: 15px 10px 15px 10px; margin: 10px 10px 10px 0;"><span class="glyphicon glyphicon-cog"></span></a>
        </div></li>
      <?php else : ?>
        <li><a class="btn btn-primary btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px 0 10px 10px;" href="<?php echo base_url(); ?>Profile">Oma profiili</a></li>
      <?php endif; ?>
			<?php if ($this->session->userdata('KT') >= 1) :?>
        <li><div class="btn-group">
        <a class="btn btn-success btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px 0 10px 10px;" href="<?php echo base_url(); ?>Haku"><span class="glyphicon glyphicon-search"></span> Haku</a>
        <?php if($this->session->userdata('sposti') == "joonas.myllarinen@esedulainen.fi") : ?>
          <a href="<?php echo base_url(); ?>Haku/haku_proto/" class="btn btn-success btn-lg" style="padding: 15px 10px 15px 10px; margin: 10px 10px 10px 0;"><span class="glyphicon glyphicon-wrench"></span></a>
        <?php endif; ?>
      </div></li>
      <?php endif; ?>
        <li><a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px;" href="<?php echo base_url(); ?>Loki"><span class="glyphicon glyphicon-backward"></span> Loki</a></li>
      <?php if ($this->session->userdata('KT') == 3) :?>
        <li><a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px;" href="<?php echo base_url(); ?>Palaute"><span class="glyphicon glyphicon-list-alt"></span> Palaute</a></li>
      <?php else : ?>
        <li><a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="color: white; margin: 10px;" href="<?php echo base_url(); ?>Palaute/hae_palaute_user/<?php echo md5($this->session->userdata('sposti')); ?>"><span class="glyphicon glyphicon-list-alt"></span> Palautteesi</a></li>
      <?php endif; ?>
      <?php endif; ?>
    </ul>
      <ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('is_logged_in') == 1) :?>
					<a class="btn btn-danger btn-lg <?php echo $disabled; ?>" style="float: right; margin: 10px 30px; 10px 10px" href="<?php echo base_url(); ?>Users/Logout">Kirjaudu ulos</a>
				<?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div style="margin: 0 0 90px 0"></div>
