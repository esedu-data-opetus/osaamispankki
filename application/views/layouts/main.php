<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
<head>
  <title>Osaajapankki</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?=base_url()?>/esedu_logo.ico" type="image/gif">
  <link href="<?php echo base_url();?>bootstrap/css/ownstyles.css" rel="stylesheet">
  <link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>datepicker/css/jquery.datepick.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type='text/javascript' src="<?php echo base_url();?>bootstrap/js/ownjquery.js"></script>
  <script src="http://paja.esedu.fi/data13/riku.ronka/harjoitus/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>datepicker/js/jquery.plugin.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>datepicker/js/jquery.datepick.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>datepicker/js/jquery.datepick-fi.js"></script>
  <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
</head>
<body onload="process()">
  <?php $this->load->view('templates/header'); ?>
  <div class="container">
    <?php $this->load->view('templates/Alerts'); ?>
    <?php $this->load->view($main_content); ?>
  </div>
<?php $this->load->view('templates/footer'); ?>
</body>
</html>
