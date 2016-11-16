<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
<head>
  <meta charset="utf-8">
  <title>ETURIVIN TAITAJAT - Osaajapankki</title>
  <link rel="icon" href="<?=base_url()?>/esedu_logo.ico" type="image/gif">
  <link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>bootstrap/css/ownstyles.css" rel="stylesheet">
  <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
</head>
<body>
  
  <div style="padding-top: 60px;"></div>

  <?php $this->load->view('templates/header'); ?>

  <div class="container">
    <?php $this->load->view($main_content); ?>
  </div>

<footer class="footer">
  <div class="footer navbar-fixed-bottom">
  	  <a href="http://www.esedu.fi/" target="_blank" >
        <img src="<?php echo base_url(); ?>pictures/esedu_logo.png" style="width:２０0px; height:90px;" />
      </a>
      <a href ="<?php echo base_url(); ?>sivu/welcome_message_english">
        <img src="<?php echo base_url(); ?>pictures/English_flag.png" class="col-md-5" style="width:75px; height:30px; float:right;" />
      </a>
      <span class="text-muted"><br>
        <p style="text-align: center; margin-top:-30px;"><b>Tekijät:</b> Riku, Miika ja Valtteri</p>
      </span>
    </div>
</footer>
</body>
</html>
