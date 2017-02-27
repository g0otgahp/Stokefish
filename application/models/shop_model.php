<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop_model extends CI_Model {


	public function shop_list()
	{
		$this->db->order_by('shop_details','asc');
		$query = $this->db->get('shop');
		return $query->result_array();
	}
	public function shop_insert($shop)
	{
		$this->db->insert('shop',$shop);
	}
	public function shop_detail($shop_id)
	{
		$this->db->where('shop_id',$shop_id);
		$query = $this->db->get('shop');
		return $query->result_array();
	}
	public function shop_update($shop)
	{
		$this->db->where('shop_id',$shop['shop_id']);
		$this->db->update('shop',$shop);
	}
	public function shop_delete($shop_id)
	{
		$this->db->where('shop_id',$shop_id);
		$this->db->delete('shop');
	}

}
