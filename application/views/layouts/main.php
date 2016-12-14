<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
<head>
  <meta charset="utf-8">
  <title>Osaajapankki</title>
  <link rel="icon" href="<?=base_url()?>/esedu_logo.ico" type="image/gif">
  <link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>bootstrap/css/ownstyles.css" rel="stylesheet">
  <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://paja.esedu.fi/data13/riku.ronka/harjoitus/js/jquery.js"></script>
</head>
<body>
  <div style="padding-top: 60px;"></div>
  <?php $this->load->view('templates/header'); ?>
  <div class="container">
    <?php $this->load->view($main_content); ?>
  </div>
<div style="padding-top: 70px;"></div>
<?php $this->load->view('templates/footer'); ?>
</body>
</html>
