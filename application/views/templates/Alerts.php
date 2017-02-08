<?php if ($this->session->flashdata('error')) : ?>
  <div id="F_MSG" class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Virhe:</span>
    <?php echo $this->session->flashdata('error'); ?>
    <a onclick="MyAlert()" class="alert-danger alert-right"><span class="glyphicon glyphicon-remove"></span></a>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')) : ?>
  <div id="F_MSG" class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
    <span class="sr-only">Onnistui:</span>
    <?php echo $this->session->flashdata('success'); ?>
    <a onclick="MyAlert()" class="alert-success alert-right"><span class="glyphicon glyphicon-remove"></span></a>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error-Prof_Hide')) : ?>
  <div id="F_MSG" class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    <span class="sr-only">Virhe:</span>
    <?php echo $this->session->flashdata('error-Prof_Hide'); ?>
    <a onclick="MyAlert()" class="alert-success alert-right"><span class="glyphicon glyphicon-remove"></span></a>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success-Prof_Hide')) : ?>
  <div id="F_MSG" class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
    <span class="sr-only">Onnistui:</span>
    <?php echo $this->session->flashdata('success-Prof_Hide'); ?>
    <a onclick="MyAlert()" class="alert-success alert-right"><span class="glyphicon glyphicon-remove"></span></a>
  </div>
<?php endif; ?>
