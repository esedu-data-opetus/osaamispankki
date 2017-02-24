<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function file_view(){
		$this->load->view('profile_page', array('error' => ' ' ));
	}

	public function do_upload(){
		$config = array(
			'upload_path' => "./images/profiili/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' =>  md5($this->session->userdata('sposti')),
			'overwrite' => TRUE,
			'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "",
			'max_width' => "",
		);
		$this->load->library('upload', $config);

		if($this->upload->do_upload())
		{
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];
			$data = array(
					//			md5 häshätään		tiedoston nimi			tiedoston pääte
					//'pkuva' => md5($this->session->userdata('sposti')).'.'. end((explode(".", $_FILES['userfile']['name'])))
					'Prof_Pic' => $file_name
			);

			$this->db->where('Sposti', $this->session->userdata('sposti'));
			$this->db->update('profile',$data);
			//print_r($this->upload->data());
			// redirect('profile/index');
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			// redirect('profile/index');
		}
	}
}
?>
