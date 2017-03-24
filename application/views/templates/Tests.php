<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php foreach($Prof_Info as $Prof) : ?>
<a style="text-decoration: none;" class="u_prof" href="<?php echo base_url(); ?>Haku/User/<?php echo $Prof->User_id; ?>/<?php md5($Prof->Sposti); ?>"><div class="panel panel-default u_prof">
  <div class="panel-heading">
  <h4><?php echo $Prof->L_Name .' '. $Prof->F_Name; ?></h4>
  </div>
    <div class="prof">
      <div class="prof-info panel-body">
      <img class="img-rounded prof-img img-thumbnail" src="<?php echo base_url(); ?>images/profiili/<?php echo $Prof->Prof_Pic; ?>" />
        <p><?php echo $Prof->Sposti; ?></p>
      </div>
  </div>
</div>
</a>
<?php endforeach; ?>
