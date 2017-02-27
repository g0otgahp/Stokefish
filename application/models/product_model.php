<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model {

	public function product_list()
	{
		$this->db->order_by('product.product_id','desc');
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('product');
		return $query->result_array();
	}

	public function product_list_by_code($product_code)
	{
		$this->db->order_by('product.product_id','desc');
		$this->db->where('product_code',$product_code);
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('product');
		return $query->result_array();
	}

	public function product_list_by_shop($shop_id)
	{
		$this->db->order_by('product.product_id','desc');
		$this->db->join('product','product.product_code = product_limit.product_limit_product_code');
		$this->db->where('product_limit_shop_id',$shop_id);
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('product_limit');
		return $query->result_array();
	}

	public function report_product_list($input)
	{
		$product = $this->product_list();
		$i=0;
		foreach ($product as $row) {
			$this->db->select_sum('stock_amount');
			$this->db->select_sum('stock_price');
			$this->db->where('stock_product',$row['product_code']);
			$this->db->where('stock.stock_type',"out");
			$this->db->where('stock.stock_date >=',$input['date_start']);
			$this->db->where('stock.stock_date <=',$input['date_end']);
			$query = $this->db->get('stock')->result_array();
			if ($query[0]['stock_amount']>0) {
				$product[$i]['sum_stock'] = $query[0];
			} else {
				unset($product[$i]);
			}
			$i++;

		}
		// $this->debuger->prevalue($product);
		return $product;
	}

	public function product_insert($product)
	{
		$this->db->insert('product',$product);
	}
	public function product_details($product_id)
	{
		$this->db->where('product.product_id',$product_id);
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('product');
		return $query->result_array();
	}
	public function product_update($product)
	{
		$this->db->where('product_id',$product['product_id']);
		$this->db->update('product',$product);
	}
	public function product_delete($product_id)
	{
		$this->db->where('product_id',$product_id);
		$this->db->delete('product');
	}
}
