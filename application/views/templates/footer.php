 <body>
<footer class="footer">

<div class="footer navbar-fixed-bottom">
	<a href="http://www.esedu.fi/" target="_blank" >
	<?php
	echo '<img src="'.base_url().'pictures/esedu_logo.png" style="width:２０0px;height:90px;"></a>';

	$test = $this->session->userdata('');
	if($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria")
			{
				
			}
			elseif( $this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_english")
			{
			
			
			}
			elseif($this->uri->segment(2) == "login")
			{
				echo '<a href ="'.base_url().'index.php/sivu/login_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';	
			}
			elseif($this->uri->segment(2) == "login_english")
			{
				echo '<a href ="'.base_url().'index.php/sivu/login"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			
			}
			elseif($this->uri->segment(2) == "login_validation")
			{
				echo '<a href ="'.base_url().'index.php/sivu/login_validation_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->uri->segment(2) == "login_validation_english")
			{
				echo '<a href ="'.base_url().'index.php/sivu/login_validation"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';	
			}
			elseif($this->uri->segment(2) == "register")
			{
				echo '<a href ="'.base_url().'index.php/sivu/register_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';								 														
			}
			elseif($this->uri->segment(2) == "register_english")
			{
				echo '<a href ="'.base_url().'index.php/sivu/register"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';					 														
			}
			elseif($this->uri->segment(2) == "register_validation")
			{
				echo '<a href ="'.base_url().'index.php/sivu/register_validation_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';						 														
			}
			elseif($this->uri->segment(2) == "register_validation_english")
			{
				echo '<a href ="'.base_url().'index.php/sivu/register_validation"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';						 														
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "welcome_message")
			{
				echo '<a href ="'.base_url().'index.php/sivu/welcome_message_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "welcome_message_english")
			{
				echo '<a href ="'.base_url().'index.php/sivu/welcome_message"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			/*elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_tyohistoria")
			{
				echo '<a href ="'.base_url().'index.php/sivu/edit_tyohistoria_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_tyohistoria_english")
			{
				echo '<a href ="'.base_url().'index.php/sivu/edit_tyohistoria"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}

			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_koulutukset")
			{
				echo '<a href ="'.base_url().'index.php/sivu/edit_koulutukset_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "edit_koulutukset_english")
			{
				echo '<a href ="'.base_url().'index.php/sivu/edit_koulutukset"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_lisaus")
			{
				echo '<a href ="'.base_url().'index.php/sivu/tyohistoria_lisaus_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "tyohistoria_lisaus_english")
			{
				echo '<a href ="'.base_url().'index.php/sivu/tyohistoria_lisaus"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "koulutukset_lisaus")
			{
				
			}
			elseif($this->session->userdata('is_logged_in') == 1 && $this->uri->segment(2) == "koulutukset_lisaus_english")
			{
			
			}*/

			elseif($this->uri->segment(2) == "welcome_message")
			{
				echo '<a href ="'.base_url().'index.php/sivu/welcome_message_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->uri->segment(2) == "welcome_message_english")
			{	
				echo '<a href ="'.base_url().'index.php/sivu/welcome_message"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->uri->segment(2) == "members")
			{
				echo '<a href ="'.base_url().'index.php/sivu/members_english"><img src="'.base_url().'pictures/English_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
			elseif($this->uri->segment(2) == "members_english")
			{	
				echo '<a href ="'.base_url().'index.php/sivu/members"><img src="'.base_url().'pictures/Finnish_flag.png" class="col-md-5" style="width:75px;height:30px;float:right;"></a>';
			}
	?>
	<span class="text-muted">ページ rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></span><span class="text-muted"><br><p style="margin-left:227px;margin-top:-30px;"> <b>Tekijät:</b> リク, ミーカ ja ティキ</p></span>
	

</div>
</footer>
</body>
</html>