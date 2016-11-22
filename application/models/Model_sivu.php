<?php

class model_sivu extends CI_Model {
	// Tarkistaa sisäänkirjautumisen
	public function can_log_in()
	{
		$this->db->where('sposti', $this->input->post('sposti'));
		$this->db->where('salasana', md5($this->input->post('salasana')));


		$query = $this->db->get('kirjautumistiedot');
		if ($query->num_rows() == 1){
			$time = array(
				'lastlogin' => date('d.n.Y H:i', strtotime('+1 hour'))
			);
		$this->db->where('sposti', $this->input->post('sposti'));
		$this->db->update('kirjautumistiedot', $time);
			return true;
		} else {
			return false;
		}
	}

	public function last_login3()
	{

			$time = array(
				'lasttlogin' => date('d.n.Y H:i', strtotime('+1 hour')),
				'sposti' => $this->session->userdata('sposti')
			);

		$this->db->where('sposti', $this->input->post('sposti'));
		$this->db->insert('last_login', $time);


	}

	public function last_login2()
	{

			$time = array(
				'lasttlogin' => date('d.n.Y H:i', strtotime('+1 hour')),
				'sposti' => $this->session->userdata('sposti')
			);

		$this->db->where('sposti', $this->input->post('sposti'));
		$this->db->insert('last_login', $time);
		$this->db->update('last_login', $time);
		$query = $this->db->query("DELETE FROM last_login WHERE sposti ='".$this->session->userdata('sposti'). "'");



	}

	// Lisää käyttäjän vahvistamattomiinkäyttäjiin
	public function add_temp_user($key)
	{

		$data = array(
				'etunimi'=> $this->input->post('etunimi'),
				'sposti' => $this->input->post('sposti'),
				'salasana' => md5($this->input->post('salasana')),
				'ktyyppi' => ('1'),
				'luotu'   => (date('d.n.Y H:i', strtotime('+1 hour'))),
				'key' => $key
			);
		//Lisää käyttäjän etunimen ja sähköpostin henkilötietoihin ja laittaa käyttäjälle oletusprofiilikuvan
		$data2 = array(
			    'etunimi'=> $this->input->post('etunimi'),
			    'sposti ' => $this->input->post('sposti'),
			    'ktyyppi' => ('1'),
			    'pkuva' => ('default.png')
		);

		$data3 = array(
			    'sposti ' => $this->input->post('sposti')
		);
		
		$query = $this->db->insert('henkilotiedot', $data2);
		$query = $this->db->insert('kirjautumistiedot', $data);
		$query = $this->db->insert('last_login', $data3);
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
			'puhelinnro' => $this->input->post('puhelinnro'),
			'lyhytKuvaus' => $this->input->post('lyhytKuvaus'),
			'aktiivisuus' => $this->input->post('aktiivisuus')
			);

		$this->db->where('sposti', $this->session->userdata('sposti'));
		$this->db->update('henkilotiedot', $data);


		$hakusanat = explode(" ", $this->input->post('hakusanat'));

		//Poistetaan aikaisemmat hakusanat
		$this->db->query("DELETE FROM hakusanat WHERE sposti ='".$this->session->userdata('sposti')."'");

		//Lisätään uudet hakusanat
		$kysely = "INSERT INTO hakusanat (sposti, hakusana) VALUES ('".$this->session->userdata('sposti')."', ";
		foreach($hakusanat as $row)
		{
			//Varmistetaan että samaa hakusanaa ei lisätä kahdesti
 			$testquery = $this->db->query("SELECT * from hakusanat WHERE sposti='".$this->session->userdata('sposti')."' AND hakusana='".$row."'");
 			if($testquery->num_rows() == 0 )
 			{
				$kysely .= "'".$row."')";
				$query = $this->db->query($kysely);
				$kysely = "INSERT INTO hakusanat (sposti, hakusana) VALUES ('".$this->session->userdata('sposti')."', ";
			}
		}
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{return true;}
		else
		{return false;}
	}


	//Hakee kortit
	public function get_kortit(){

	$query = $this->db->query('SELECT * FROM kortit');

		return $query->result();
	}
	//Lisää kortin
	public function add_kortti()
	{

		$data = array(
			'knimi'  => $this->input->post('knimi'),
			'voimassa'  => $this->input->post('voimassa'),
			'kommentti'  => $this->input->post('kommentti'),
			'sposti' => $this->session->userdata('sposti')
			);

		$this->db->where('sposti', $this->session->userdata('sposti'));
		$this->db->insert('opiskelijakortit', $data);
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//Poistaa kortin
	public function delete_kortti($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('opiskelijakortit');

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
		$query = $this->db->get('kirjautumistiedot');
		if($query->num_rows() == 1)
		{
	   		foreach ($query->result() as $row){
	    	return $row->ktyyppi;
	    	}
		}
   		else
   		{
   			return 1;
   		}

	}

		public function tee_haku() {

		$match = trim($this->input->post('haku'));
		$str = preg_replace( "/\s+/", " ", $match);

		if($str === '' OR $str === ' '){
		$kysely ="
		SELECT DISTINCT henkilotiedot.sposti, henkilotiedot.privSposti, henkilotiedot.etunimi, henkilotiedot.osoite, henkilotiedot.postinro, henkilotiedot.puhelinnro, henkilotiedot.sNimi, henkilotiedot.lyhytKuvaus, henkilotiedot.pkuva, henkilotiedot.aktiivisuus
		FROM henkilotiedot
		LEFT JOIN tyo ON henkilotiedot.sposti = tyo.sposti
		LEFT JOIN koulutukset ON henkilotiedot.sposti = koulutukset.sposti
		WHERE henkilotiedot.aktiivisuus = 1
		LIKE '%%' ESCAPE '!'";
		$query = $this->db->query($kysely);
		return $query->result();
		}
		else
		{
		$haku_explode = explode(' ', $str);
		$kysely="
		SELECT DISTINCT henkilotiedot.sposti, henkilotiedot.privSposti, henkilotiedot.etunimi, henkilotiedot.osoite, henkilotiedot.postinro, henkilotiedot.puhelinnro, henkilotiedot.sNimi,  henkilotiedot.lyhytKuvaus, henkilotiedot.pkuva, henkilotiedot.aktiivisuus
		FROM henkilotiedot
		LEFT JOIN tyo ON henkilotiedot.sposti = tyo.sposti
		LEFT JOIN koulutukset ON henkilotiedot.sposti = koulutukset.sposti
		LEFT JOIN hakusanat ON henkilotiedot.sposti = hakusanat.sposti
		LEFT JOIN harrastukset ON henkilotiedot.sposti = harrastukset.sposti
		WHERE henkilotiedot.etunimi REGEXP '".implode("|", $haku_explode)."'
		OR henkilotiedot.sNimi REGEXP'".implode("|", $haku_explode)."'
		OR koulutukset.koulutusnimi REGEXP'".implode("|", $haku_explode)."'
		OR tyo.tyopaikka REGEXP'".implode("|", $haku_explode)."'
		OR harrastukset.harrastus REGEXP'".implode("|", $haku_explode)."'
		OR hakusanat.hakusana REGEXP'".implode("|", $haku_explode)."'";


		$query = $this->db->query($kysely);

		return $query->result();
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
