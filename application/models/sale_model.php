<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale_model extends CI_Model {

	public function product_select($barcode)
	{
		$this->db->select('product_code,product_name,product_sale,product_buy');
		$this->db->where('product_code',$barcode['barcode']);
		$query = $this->db->get('product');
		return $query->result_array();
	}
	public function sale_member_update($input)
	{
		$this->db
		->where('member.member_id', $input['member_id'])
		->update('member', $input);
	}
	public function sale_pay_type_update($input)
	{
		$this->db
		->where('sale_order_detail.sale_order_detail_id', $input['sale_order_detail_id'])
		->update('sale_order_detail', $input);
	}
	public function sale_stock_price_update($input)
	{
		$this->db
		->where('stock.stock_id', $input['stock_id'])
		->update('stock', $input);
	}
}
