<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category_model extends CI_Model {

	public function category_list()
	{
		$query = $this->db->get('category');
		return $query->result_array();
	}
	public function category_insert($category)
	{
		$this->db->insert('category',$category);
	}
	public function category_details($category_id)
	{
		$this->db->where('category_id',$category_id);
		$query = $this->db->get('category');
		return $query->result_array();
	}
	public function category_update($category)
	{
		$this->db->where('category_id',$category['category_id']);
		$this->db->update('category',$category);
	}
	public function category_delete($category_id)
	{
		$this->db->where('category_id',$category_id);
		$this->db->delete('category');
	}
}
