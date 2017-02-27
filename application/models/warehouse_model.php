<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class warehouse_model extends CI_Model {

	public function warehouse_list()
	{
		$this->db->order_by('warehouse_date','desc');
		$query = $this->db->get('warehouse');
		return $query->result_array();
	}
	public function warehouse_in($warehouse)
	{
		$this->db->insert('warehouse',$warehouse);
	}

	public function warehouse_in_temp_list()
	{
		$this->db->order_by('warehouse_temp_date','desc');
		$this->db->where('warehouse_temp_type',"in");
		$this->db->where('warehouse_temp_shop',0);
		$this->db->join('product','product.product_code = warehouse_temp.warehouse_temp_product');
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('warehouse_temp')->result_array();
		return $query;
	}

	public function warehouse_out_temp_list()
	{
		$this->db->order_by('warehouse_temp_date','desc');
		$this->db->where('warehouse_temp_type',"out");
		$this->db->join('shop','shop.shop_id = warehouse_temp.warehouse_temp_shop');
		$this->db->join('product','product.product_code = warehouse_temp.warehouse_temp_product');
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('warehouse_temp')->result_array();
		return $query;
	}
	public function warehouse_temp_insert($warehouse)
	{
		$this->db->insert('warehouse_temp',$warehouse);
	}
	public function warehouse_temp_remove($type)
	{
		$this->db->where('warehouse_temp_type',$type);
		$this->db->delete('warehouse_temp');
	}
	public function stock_temp_remove($shop_id)
	{
		$this->db->where('warehouse_temp_shop',$shop_id);
		$this->db->delete('warehouse_temp');
	}
	public function warehouse_temp_delete($id)
	{
		$this->db->where('warehouse_temp_id',$id);
		$this->db->delete('warehouse_temp');
	}
}
