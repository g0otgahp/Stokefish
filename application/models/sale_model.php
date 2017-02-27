<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale_model extends CI_Model {

	public function product_select($barcode)
	{
		$this->db->select('product_code,product_name,product_sale');
		$this->db->where('product_code',$barcode['barcode']);
		$query = $this->db->get('product');
		return $query->result_array();
	}


}
