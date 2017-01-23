<?php
	if ($this->session->userdata('First_login') && $this->uri->segment(2) == "set_profile") {
		$disabled = "disabled";
	} else {
		$disabled = "";
	}
?>
<div style="margin: 70px 0 0 0;">
<footer class="footer">
  <div class="footer navbar-fixed-bottom">
  	  <a href="http://www.esedu.fi/" target="_blank" >
        <img src="<?php echo base_url(); ?>pictures/esedu_logo.png" style="height: 90px;" />
      </a>
      <span class="text-muted"><br>
        <p style="text-align: center; margin-top:-30px;"><b>Tekijät:</b> Riku, Miika, Valtteri, Joonas & Marko</p>
      </span>
      <div class="footer navbar-fixed-bottom">
          <a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="float: right; margin: 10px 30px; 10px 10px;" href="<?php echo base_url(); ?>Palaute/Palautteesi">Anna palautetta!</a>
      </div>
    </div>
</footer>
