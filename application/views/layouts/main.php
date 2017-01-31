<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
<head>
  <meta charset="utf-8">
  <title>Osaajapankki</title>
  <link rel="icon" href="<?=base_url()?>/esedu_logo.ico" type="image/gif">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>bootstrap/css/ownstyles.css" rel="stylesheet">
  <script type='text/javascript' src="<?php echo base_url();?>bootstrap/js/ownjquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
  <script src="http://paja.esedu.fi/data13/riku.ronka/harjoitus/js/jquery.js"></script> -->
</head>
<body>

  <?php if ($this->session->flashdata('error') || $this->session->flashdata('success')) : ?>
  <script>
  var main = function() {
    $('#F_MSG').delay(5000).fadeOut(1000);
  };
  $(document).ready(main);
  </script>
  <?php endif; ?>

  <div style="padding-top: 60px;"></div>

  <?php if ($this->session->flashdata('error')) : ?>
    <div id="F_MSG" style="position: fixed; margin: 0 0 0 45%; top: 70px; box-shadow: 0 0 20px;" class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Virhe:</span>
      <?php echo $this->session->flashdata('error'); ?>
    </div>
  <?php endif; ?>

  <?php if ($this->session->flashdata('success')) : ?>
    <div id="F_MSG" style="position: fixed; margin: 0 0 0 45%; top: 70px; box-shadow: 0 0 20px;" class="alert alert-success" role="alert">
      <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
      <span class="sr-only">Onnistui:</span>
      <?php echo $this->session->flashdata('success'); ?>
    </div>
  <?php endif; ?>

  <?php $this->load->view('templates/header'); ?>
  <div class="container">
    <?php $this->load->view($main_content); ?>
  </div>
<?php $this->load->view('templates/footer'); ?>
</body>
</html>
