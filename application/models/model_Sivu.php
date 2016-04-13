<?php

class model_sivu extends CI_Model {

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
	

	public function add_temp_user($key){

		$data = array(
				'etunimi'=> $this->input->post('etunimi'),
				'sposti' => $this->input->post('sposti'),
				'salasana' => md5($this->input->post('salasana')),
				'key' => $key
			);
		$data2 = array(
				'sposti' => $this->input->post('sposti')
				);

		$query = $this->db->insert('tyo', $data2);
		$query = $this->db->insert('kirjautumistiedot', $data);
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


	public function tarkistatiedot($sposti){

	$query = $this->db->query("SELECT tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti='".$posti. "'");

		if($query->num_rows() == 1){
			return $query;
		}
		else
		{
			return FALSE;
		}
	}
	function add_tyohistoria()
	{

		$data = array(
			'tyopaikka' => $this->input->post('tyopaikka'),
			'tehtava'	=> $this->input->post('tehtava'),
			'alkoi'		=> $this->input->post('alkoi'),
			'loppui'	=> $this->input->post('loppui'),
			'kuvaus'	=> $this->input->post('kuvaus')
			);
			
		$this->db->where('sposti', $this->session->userdata('sposti'));
		$this->db->update('tyo', $data);
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function checkpassword()
	{
		$this->db->where('sposti', $this->session->userdata('sposti'));
		$this->db->where('salasana', md5($this->input->post('currentpwd')));
		$query = $this->db->get('kirjautumistiedot');
			if($query->num_rows() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
	}

		public function changepassword()
		{
		$passwdtomd5 = md5($this->input->post('newpwd'));
		$data = array(
               'salasana' => $passwdtomd5
               );
		$this->db->where('sposti', $this->session->userdata('sposti'));
		$this->db->update('kirjautumistiedot', $data);

			if($this->db->affected_rows() == 1)
			{
			return true;
			}
			else
			{
			return false;
			}
		}

		public function tarkistasposti()
		{
		$this->db->where('sposti', $this->input->post('sposti'));
		$query = $this->db->get('kirjautumistiedot');
			if($query->num_rows() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

	public function passwordresetkey($key){
			$data = array(
				'key' => $key
			);
		$this->db->where('sposti', $this->input->post('sposti'));
		$this->db->update('kirjautumistiedot', $data);

		$this->db->where('sposti', $this->input->post('sposti'));

		if ($this->db->affected_rows() == 1){
			return true;
		} else {
			return false;
		}
	}

	public function check_key($key){

		$this->db->where('key', $key);
		$query =	$this->db->get('kirjautumistiedot');

		if($query->num_rows() == 1)
			{
				return true;
			}
			else
			{
				return false;
			}


/*		Haettiin sähköpostiosoite keyn perusteella, mutta eihän tuota tarvinnutkaan. Olkoon nyt siinä.
		if ($keycheck){
			$row = $keycheck->row();

			$data = array(
					'sposti' => $row->sposti
				);
			return $keycheck->row('sposti');
			}
			*/
	}

			public function changeforgottenpassword($newkey)
		{
		$passwdtomd5 = md5($this->input->post('newpwd'));
		$data = array(
               'salasana' => $passwdtomd5, 'key' => $newkey);
		$this->db->where('key', $this->input->post('keyfield'));
		$this->db->update('kirjautumistiedot', $data);

			if($this->db->affected_rows() == 1)
			{
			return true;
			}
			else
			{
			return false;
			}
		}

}
