<?php if ($this->session->flashdata('error') || $this->session->flashdata('success')) : ?>
  <script>
  var main = function() {
    $('#F_MSG').delay(5000).fadeOut(1000);
  };
  $(document).ready(main);
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
  <div id="F_MSG" class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Virhe:</span>
    <?php echo $this->session->flashdata('error'); ?>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')) : ?>
  <div id="F_MSG" class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
    <span class="sr-only">Onnistui:</span>
    <?php echo $this->session->flashdata('success'); ?>
  </div>
<?php endif; ?>
