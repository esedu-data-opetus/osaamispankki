<?php defined('BASEPATH') OR exit('No direct script access allowed');	if ($this->uri->segment(2) == "set_profile") { $disabled = "disabled"; } else { $disabled = ""; } ?>

<div class="break"></div>
<style>
@media screen and (min-width: 480px) {
  .my-style {
    left: 0;
    right: 0;
    bottom: 0;
    position: fixed;
  }
  .break {
    margin: 80px 0 0 0;
  }
}
</style>

<footer style="margin: 0;" class="navbar navbar-default my-style" role="navbar">
  <span style="position: absolute; left:0; right:0; bottom: 0;" class="text-muted">
    <p style="text-align: center; margin: 0;"><b>Tekijät:</b> Riku, Miika, Valtteri, Joonas & Marko</p>
  </span>
     <a class="pull-left" href="http://www.esedu.fi/" target="_blank" >
       <img src="<?php echo base_url(); ?>pictures/esedu_logo.png" style="height: 60px; float: left;" />
     </a>
     <div class="pull-right">
         <ul class="list-inline" style="margin: 0 0 10px 0;">
            <li><a class="btn btn-info btn-lg <?php echo $disabled; ?>" style="float: right; margin: 10px 10px; 0 0;" href="<?php echo base_url(); ?>Palaute/Palautteesi">Anna palautetta!</a></li>
         </ul>
     </div>
   </footer>
