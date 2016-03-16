<?php if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class Sivu2 extends CI_Controller
	 {
		public function first_login(){
		$this->load->model('Model_sivu');
		$this->load->template("perustiedot");
	}
}
