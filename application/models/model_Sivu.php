<?php

class Model_sivu extends CI_Model {

	public function can_log_in()
	{
		$this->db->where('sposti', $this->input->post('sposti'));
		$this->db->where('salasana', md5($this->input->post('salasana')));
		$query = $this->db->get('kirjautumistiedot');

		if ($query->num_rows() == 1){
			return true;	
		} else {
			return false;
		}
	}

	public function add_tyokokemus(){

		$data = array(
			'tyopaikka' => $this->input->post('tyopaikka'),
			'tehtava'	=> $this->input->post('tehtava'),
			'alkoi'		=> $this->input->post('alkoi'),
			'loppui'	=> $this->input->post('loppui'),
			'kuvaus'	=> $this->input->post('kuvaus')
			);
			
		$query = $this->db->insert('tyo', $data);
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	

	public function add_temp_user($key){

		$data = array(
				'etunimi'=> $this->input->post('etunimi'),
				'sposti' => $this->input->post('sposti'),
				'salasana' => md5($this->input->post('salasana')),
				'key' => $key
			);


		$query = $this->db->insert('vahvistamattomatkayttajat', $data);
		if ($query){
			return true;
		} else {
			return false;
		}

	}

	public function is_key_valid($key){
		$this->db->where('key', $key);
		$query = $this->db->get('vahvistamattomatkayttajat');

		if ($query->num_rows () == 1){
			return true;
		} else return false;
	}

	public function add_user($key){

		$this->db->where('key', $key);
		$temp_user = $this->db->get('vahvistamattomatkayttajat');

		if ($temp_user){
			$row = $temp_user->row();

			$data = array(
					'etunimi'=> $row->etunimi,
					'sposti' => $row->sposti,
					'salasana' => $row->salasana
				);

				$did_add_user = $this->db->insert('kirjautumistiedot', $data);
		}

		if ($did_add_user){
			$this->db->where('key', $key);
			$this->db->delete('vahvistamattomatkayttajat');
			return $data['sposti'];
		} return false;
	}
}