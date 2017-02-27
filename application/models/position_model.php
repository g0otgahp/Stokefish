<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class position_model extends CI_Model {


	public function position_list()
	{
		$query = $this->db->get('position');
		return $query->result_array();
	}
	public function position_insert($position)
	{
		$this->db->insert('position',$position);
	}
	public function position_details($position_id)
	{
		$this->db->where('position_id',$position_id);
		$query = $this->db->get('position');
		return $query->result_array();
	}
	public function position_update($position)
	{
		$this->db->where('position_id',$position['position_id']);
		$this->db->update('position',$position);
	}
	public function position_delete($position_id)
	{
		$this->db->where('position_id',$position_id);
		$this->db->delete('position');
	}
}
