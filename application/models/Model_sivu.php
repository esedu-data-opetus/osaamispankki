<?php

class model_sivu extends CI_Model {
	// Tarkistaa sisäänkirjautumisen
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
	
	// Lisää käyttäjän vahvistamattomiinkäyttäjiin
	public function add_temp_user($key)
	{

		$data = array(
				'etunimi'=> $this->input->post('etunimi'),
				'sposti' => $this->input->post('sposti'),
				'salasana' => md5($this->input->post('salasana')),
				'key' => $key
			);
		//Lisää käyttäjän etunimen ja sähköpostin henkilötietoihin ja laittaa käyttäjälle oletusprofiilikuvan
		$data2 = array(
			    'etunimi'=> $this->input->post('etunimi'),
			    'sposti ' => $this->input->post('sposti'),
			    'pkuva' => ('default.png')
		);		
		
		$query = $this->db->insert('henkilotiedot', $data2);
		$query = $this->db->insert('kirjautumistiedot', $data);
		if ($query){
			return true;
		} else {
			return false;
		}

	}

	public function is_key_valid($key)
	{

		$this->db->where('key', $key);
		$query = $this->db->get('vahvistamattomatkayttajat');

		if ($query->num_rows () == 1){
			return true;
		} else return false;
	}

	// Lisää käyttäjän kirjautumistietoihin ja poistaa vahvistamattomistakäyttäjistä kun sähköpostivahvistusta on painettu
	public function add_user($key)
	{

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

	public function tarkistatiedot($sposti)
	{

	$query = $this->db->query("SELECT tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti='".$posti. "'");

		if($query->num_rows() == 1){
			return $query;
		}
		else
		{
			return FALSE;
		}
	}
	


	public function get_tyohistoria($id) {
		$query = $this->db->query("SELECT id, tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE id =".$id);

		foreach ($query->result() as $row){
			$data['id']		   = "$row->id";
			$data['tyopaikka'] = "$row->tyopaikka";
			$data['tehtava']   = "$row->tehtava";
			$data['alkoi'] 	   = "$row->alkoi";
			$data['loppui']    = "$row->loppui";
			$data['kuvaus']    = "$row->kuvaus";

		}

		return $data;
	}

	public function get_koulutukset($id) {
		$query = $this->db->query("SELECT id, koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui FROM koulutukset WHERE id =".$id);

		foreach ($query->result() as $row){
			$data['id']		  		= "$row->id";
			$data['koulutusnimi']	= "$row->koulutusnimi";
			$data['koulutusaste']   = "$row->koulutusaste";
			$data['oppilaitos'] 	= "$row->oppilaitos";
			$data['alkoi']    		= "$row->alkoi";
			$data['loppui']  	    = "$row->alkoi";

		}

		return $data;
	}

	//Muokkaa tyohistoriaa
	public function edit_tyohistoria($id)
	{		

		$data = array(
			'tyopaikka' => $this->input->post('tyopaikka'),
			'tehtava'	=> $this->input->post('tehtava'),
			'alkoi'		=> $this->input->post('alkoi'),
			'loppui'	=> $this->input->post('loppui'),
			'kuvaus'	=> $this->input->post('kuvaus')
			);
			
		$this->db->where('id', $id);
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

	//Lisää tyohistorian
	public function add_tyohistoria()
	{

		$data = array(
			'tyopaikka' => $this->input->post('tyopaikka'),
			'tehtava'	=> $this->input->post('tehtava'),
			'alkoi'		=> $this->input->post('alkoi'),
			'loppui'	=> $this->input->post('loppui'),
			'kuvaus'	=> $this->input->post('kuvaus'),
			'sposti'    => $this->session->userdata('sposti')
			);

		$this->db->insert('tyo', $data);
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}

	//Muokkaa koulutusta
	public function edit_koulutus($id)
	{

		$data = array(
			'koulutusnimi' => $this->input->post('koulutusnimi'),
			'koulutusaste' => $this->input->post('koulutusaste'),
			'oppilaitos'   => $this->input->post('oppilaitos'),
			'alkoi' 	   => $this->input->post('alkoi'),
			'loppui' 	   => $this->input->post('loppui')
			);
			
		$this->db->where('id', $id);
		$this->db->update('koulutukset', $data);
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	//Lisää koulutuksen
	public function add_koulutus()
	{

		$data = array(
			'koulutusnimi' => $this->input->post('koulutusnimi'),
			'koulutusaste' => $this->input->post('koulutusaste'),
			'oppilaitos'   => $this->input->post('oppilaitos'),
			'alkoi' 	   => $this->input->post('alkoi'),
			'loppui' 	   => $this->input->post('loppui'),
			'sposti'       => $this->session->userdata('sposti')
			);
			
		
		$this->db->insert('koulutukset', $data);
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	
	//Muokkaa perustietoja
	public function edit_members()
	{

		$data = array(
			'privSposti' => $this->input->post('privSposti'),
			'etunimi'	 => $this->input->post('etunimi'),
			'sNimi' 	 => $this->input->post('sNimi'),
			'osoite' 	 => $this->input->post('osoite'),
			'postinro' 	 => $this->input->post('postinro'),
			'puhelinnro' => $this->input->post('puhelinnro')
			);
			
		$this->db->where('sposti', $this->session->userdata('sposti'));
		$this->db->update('henkilotiedot', $data);
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	
	//Poistaa tyohistoriarivin
	public function delete_tyohistoria($id)
	{
		
		$this->db->where('id', $id);
		$this->db->delete('tyo');
			
	}

	//Poistaa koulutusrivin
	public function delete_koulutukset($id)
	{
		

		$this->db->where('id', $id);
		$this->db->delete('koulutukset');		
	
	}
	
	public function paivitatiedot()
		{
			$tiedot = array(	'etunimi' 	 => $this->input->post('etunimi'),
								'privSposti' => $this->input->post('privSposti'),
								'sNimi' 	 => $this->input->post('sNimi'),
								'osoite'	 => $this->input->post('osoite'),
								'postinro' 	 => $this->input->post('postinro'),
								'puhelinnro' => $this->input->post('puhelinnro'));
				$this->db->where('sposti', $this->session->userdata('sposti'));
				$this->db->update('henkilotiedot', $tiedot);
				if($this->db->affected_rows() > 0)
				{
				return true;
				}
				else
				{
				return false;
				}
		}
	public function getusertype(){
		$this->db->where('sposti', $this->input->post('sposti'));
		$usertype = $this->db->get('kirjautumistiedot');
		$row = $usertype->row();

		if($row->ktyyppi == 1){
			return 1;
		}
		elseif($row->ktyyppi==2){
			return 2;
		}
		else{
			return 3;
		}
	}

		public function tee_haku() {

		$match = trim($this->input->post('haku'));
		$str = preg_replace( "/\s+/", " ", $match);

		if($str === '' OR $str === ' '){
		$kysely ="
		SELECT DISTINCT henkilotiedot.sposti, henkilotiedot.etunimi, henkilotiedot.sNimi, henkilotiedot.lyhytKuvaus, henkilotiedot.pkuva
		FROM henkilotiedot 
		LEFT JOIN tyo ON henkilotiedot.sposti = tyo.sposti
		LEFT JOIN koulutukset ON henkilotiedot.sposti = koulutukset.sposti
		WHERE henkilotiedot.etunimi 
		LIKE '%%' ESCAPE '!'";
		$query = $this->db->query($kysely);
		return $query->result();
		}
		else
		{
		$haku_explode = explode(' ', $str);
		$kysely="
		SELECT DISTINCT henkilotiedot.sposti, henkilotiedot.etunimi, henkilotiedot.sNimi, henkilotiedot.lyhytKuvaus, henkilotiedot.pkuva
		FROM henkilotiedot 
		LEFT JOIN tyo ON henkilotiedot.sposti = tyo.sposti
		LEFT JOIN koulutukset ON henkilotiedot.sposti = koulutukset.sposti
		WHERE henkilotiedot.etunimi
		REGEXP '".implode("|", $haku_explode)."'
		OR henkilotiedot.sNimi REGEXP'".implode("|", $haku_explode)."'
		OR koulutukset.koulutusnimi REGEXP'".implode("|", $haku_explode)."'
		OR tyo.tyopaikka REGEXP'".implode("|", $haku_explode)."'";
		$query = $this->db->query($kysely);
		
		return $query->result();
	}
}
}
