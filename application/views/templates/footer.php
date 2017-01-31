<?php defined('BASEPATH') OR exit('No direct script access allowed');	if ($this->session->userdata('First_login') && $this->uri->segment(2) == "set_profile") { $disabled = "disabled"; } else { $disabled = ""; } ?>
<div style="margin: 75px 0 0 0"></div>
<footer class="footer">
<nav class="navbar navbar-default navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
			<a href="http://www.esedu.fi/" target="_blank" >
				<img src="<?php echo base_url(); ?>pictures/esedu_logo.png" style="height: 60px; float: left;" />
			</a>
		</div>
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('is_logged_in') == 1) :?>
					<a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="float: right; margin: 10px 10px; 0 0;" href="<?php echo base_url(); ?>Palaute/Palautteesi">Anna palautetta!</a>
				<?php endif; ?>
			</ul>
		<span class="text-muted">
			<p style="text-align: center; margin: 0;"><b>Tekijät:</b> Riku, Miika, Valtteri, Joonas & Marko</p>
		</span>
  </div>
</nav>
