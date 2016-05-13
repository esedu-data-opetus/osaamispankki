<?php

class Model_harrastus extends CI_Model {
public function edit_harrastus($id)
	{

		$data = array(
			'harrastus' => $this->input->post('harrastus'),
			'vapaasana' => $this->input->post('vapaasana')
			);
			
		$this->db->where('id', $id);
		$this->db->update('harrastukset', $data);
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}

	public function get_harrastus($id) {
		$query = $this->db->query("SELECT id, harrastus, vapaasana FROM harrastukset WHERE id =".$id);

		foreach ($query->result() as $row){
			$data['id']	   = "$row->id";
			$data['harrastus'] = "$row->harrastus";
			$data['vapaasana'] = "$row->vapaasana";			

		}

		return $data;
	}

	//Lisää harrastuksen
	public function add_harrastus()
	{

		$data = array(
			'harrastus' => $this->input->post('harrastus'),
			'vapaasana' => $this->input->post('vapaasana'),
			'sposti'    => $this->session->userdata('sposti')
			);
			
		
		$this->db->insert('harrastukset', $data);
		if ($this->db->affected_rows() == 0 || $this->db->affected_rows() == 1)
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	public function delete_harrastus($id)
	{
		

		$this->db->where('id', $id);
		$this->db->delete('harrastukset');		
	
	}
}
