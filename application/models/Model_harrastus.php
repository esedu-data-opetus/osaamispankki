<?php

class model_harrastus extends CI_Model {
public function edit_harrastus($id)
	{

		$data = array(
			'harrastus' => $this->input->post('harrastus'),
			'vapaasana' => $this->input->post('vapaasana'),
			);
			
		$this->db->where('hid', $id);
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
	//Lisää koulutuksen
	public function add_harrastus()
	{

		$data = array(
			'harrastus' => $this->input->post('harrastus'),
			'vapaasana' => $this->input->post('vapaasana'),
			'sposti'    => $this->session->userdata('sposti')
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
	public function delete_harrastus($id)
	{
		

		$this->db->where('hid', $id);
		$this->db->delete('harrastukset');		
	
	}