<?php 
echo '<div class="col-md-6 col-md-offset-5">';

echo form_open('sivu/hakutulokset');
$haku = array('name'=>'haku','id'=>'haku', 'size'=>'40', 'type'=>'text', 'placeholder'=>'Kirjoita haku tähän');
echo '<br>'.form_input($haku);
echo form_submit('submit', 'Hae', 'class="btn btn-success"');
form_close();
echo '</div>';
