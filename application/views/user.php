<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <?php foreach($user_data as $user) : ?>
        <img style="float: right; max-width: 100px; max-height: 100px;" src="<?php echo base_url(); ?>/images/profiili/<?php echo $user->Prof_Pic; ?>" class="img-responsive img-thumbnail">
        <?php
          echo '<h1 style="margin-bottom:50px;">';
          //Jos nimen viimeinen kirjain on 's' printtaa ksen profiili
      		if (substr($user->F_Name, -1) == 's')
      		{																					//Poistaa nimestä s:n
      			echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>ksen profiili</h1><br><?php
      		}
      		//Jos nimen viimeinen kirjain on 'n' tai 'l' tai 'k' tai 'r' printtaa in profiili
      		elseif (substr($user->F_Name, -1) == 'n' ||
      				substr($user->F_Name, -1) == 'l' ||
      				substr($user->F_Name, -1) == 'k' ||
      				substr($user->F_Name, -1) == 'r' ||
      				substr($user->F_Name, -1) == 'd')
      		{
      			echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>in profiili</h1><br><?php
      		}
      		//Jos nimen kaksi viimeistä kirjainta on 'ax'  tai 'ex' printtaa in profiili
      		elseif (substr($user->F_Name, -2) == 'ax' ||
      				substr($user->F_Name, -2) == 'ex' ||
      				substr($user->F_Name, -2) == 'ng')
      		{
      			echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>in profiili</h1><br><?php
      		}
      		//Jos nimen viimeinen kirjain on 'x' printtaa en profiili
      		elseif (substr($user->F_Name, -1) == 'x' ||
      			    substr($user->F_Name, -1) == 'g')
      		{
      			echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>en profiili</h1><br><?php
      		}

      		//Jos nimi päättyy 'ö' printtaa n profiili
      	 	elseif (substr($user->F_Name, -1) == 'ö')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>n profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'kki' printtaa kin profiili
      	 	elseif (substr($user->F_Name, -3) == 'kki')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "ki");?>kin profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'tti' printtaa tin profiili
      	 	elseif (substr($user->F_Name, -3) == 'tti')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "ti");?>tin profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'i' printtaa n profiili
      	 	elseif (substr($user->F_Name, -1) == 'i')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>n profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'kku' printtaa kun profiili
      	 	elseif (substr($user->F_Name, -3) == 'kku')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "ku");?>kun profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'u' printtaa n profiili
      	 	elseif (substr($user->F_Name, -1) == 'u')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>n profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'kka' printtaa kan profiili
      	 	elseif (substr($user->F_Name, -3) == 'kka')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "ka");?>kan profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'a' printtaa n profiili
      	 	elseif (substr($user->F_Name, -1) == 'a')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>n profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'kko' printtaa kon profiili
      	 	elseif (substr($user->F_Name, -3) == 'kko')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "ko");?>kon profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'tto' printtaa ton profiili
      	 	elseif (substr($user->F_Name, -3) == 'tto')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "to");?>ton profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'o' printtaa n profiili
      	 	elseif (substr($user->F_Name, -1) == 'o')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>n profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'tte' printtaa eten profiili
      	 	elseif (substr($user->F_Name, -3) == 'tte')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "te");?>eten profiili</h1><br><?php
      		}

          //Jos nimi päättyy 'e' printtaa n profiili
      	 	elseif (substr($user->F_Name, -1) == 'e')
      	 	{
      		 	echo "<h1 style='margin-bottom:50px;'>".rtrim($user->F_Name, "s");?>n profiili</h1><br><?php
      		}
        ?>
    </div>
    <div class="Profile-Information">
      <div class="Prof-heading">
      </div>
      <div class="Prof-body">
      <p>
        <b>Nimi:</b><br>
        <?php echo $user->F_Name. ' ' .$user->L_Name; ?>
      </p>

      <p>
        <b>Sähköposti:</b><br>
        <?php echo $user->Sposti; ?>
      </p>

      <p>
        <b>Osoite:</b><br>
        <?php echo $user->Osoite; ?>
      </p>

      <p>
        <b>Postinumero:</b><br>
        <?php echo $user->Posti_Num; ?>
      </p>

      <p>
        <b>Puhelinnumero:</b><br>
        <?php echo $user->Puh_Num; ?>
      </p>

      <p>
        <b>Kuvaus:</b><br>
        <?php echo $user->About; ?>
      </p>

      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
