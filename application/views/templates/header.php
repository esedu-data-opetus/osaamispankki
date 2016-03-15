<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">

<nav class="navbar navbar-default" style="margin-top:-60px; >
  <div class="container-fluid" style="margin-top:-150px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Osaamispankki</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><?php echo '<a href="'.base_url().'index.php/sivu/login'.'"><button type="button" class="btn btn-success" style="margin-top:-10px;width:100px; height:40px; text-size:4px; padding:0px; float: left;" >Kirjautuminen</button></a></li>'?>
        <li class="active"><?php echo '<a href="'.base_url().'index.php/sivu/register'.' "><button type="button" class="btn btn-success" style="margin-top:-10px;width:100px; height:40px; text-size:4px; padding:0px; float: left;" >Luo tili</button></a></li>'?>
        
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
<!-- /.container-fluid -->
</nav>
