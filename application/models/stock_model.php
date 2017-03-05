<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock_model extends CI_Model {


	public function stock_in($stock)
	{
		$this->db->insert('stock',$stock);
	}
	public function report_sale($input)
	{
		$this->db->where('sale_order_detail.sale_order_detail_date >=',$input['date_start']);
		$this->db->where('sale_order_detail.sale_order_detail_date <=',$input['date_end']);

		if($input['shop']!=""){
			$this->db->where('sale_order_detail.sale_order_detail_shop',$input['shop']);
		}

		$this->db->join('stock','stock.sale_order_detail_id = sale_order_detail.sale_order_detail_id');
		$this->db->where('stock.stock_type',"out");
		$this->db->join('product','product.product_code = stock.stock_product');
		$this->db->join('shop','shop.shop_id = stock.stock_shop');
		$query = $this->db->get('sale_order_detail');
		return $query->result_array();
	}

	public function report_in($input)
	{
		$this->db->where('warehouse.warehouse_type',"in");
		$this->db->where('warehouse.warehouse_date >=',$input['date_start']);
		$this->db->where('warehouse.warehouse_date <=',$input['date_end']);
		$this->db->join('product','product.product_code = warehouse.warehouse_product');
		$query = $this->db->get('warehouse');
		return $query->result_array();
	}

	public function report_out($input)
	{
		$this->db->where('warehouse.warehouse_type',"out");
		$this->db->where('warehouse.warehouse_date >=',$input['date_start']);
		$this->db->where('warehouse.warehouse_date <=',$input['date_end']);
		$this->db->join('product','product.product_code = warehouse.warehouse_product');
		$query = $this->db->get('warehouse');
		return $query->result_array();
	}

	public function product_insert_limit($shop_id,$product_code)
	{
		$this->db->where('product_limit_shop_id',$shop_id);
		$this->db->where('product_limit_product_code',$product_code);
		$query = $this->db->get('product_limit')->result_array();

		if (count($query)<1) {
			$input['product_limit_shop_id'] = $shop_id;
			$input['product_limit_product_code'] = $product_code;
			$this->db->insert('product_limit',$input);
		}
	}

	public function stock_in_temp_list_shop($shop_id)
	{
		$this->db->order_by('warehouse_temp_date','desc');
		$this->db->where('warehouse_temp_type',"in");
		$this->db->where('warehouse_temp_shop',$shop_id);
		$this->db->join('product','product.product_code = warehouse_temp.warehouse_temp_product');
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('warehouse_temp')->result_array();
		// $this->debuger->prevalue($query);
		return $query;
	}

	public function sale_order_list($shop_id)
	{
		$this->db->where('sale_order_detail_shop', $shop_id);
		$this->db->join('member','member.sale_order_detail_id = sale_order_detail.sale_order_detail_id');
		$this->db->order_by('sale_order_detail_date', 'DESC');
		$this->db->order_by('sale_order_detail_time', 'DESC');
		$query = $this->db->get('sale_order_detail')->result_array();
		// $this->debuger->prevalue($query);
		return $query;
	}

	public function stock_cancel($order_id)
	{
		$status['sale_order_detail_status'] = 0;
		$this->db->where('sale_order_detail_id',$order_id);
		$this->db->update('sale_order_detail',$status);
	}

	public function sale_order_detail($order_id)
	{
		$this->db->order_by('sale_order_detail_date','desc');
		$this->db->where('sale_order_detail.sale_order_detail_id',$order_id);
		$this->db->join('stock','stock.sale_order_detail_id = sale_order_detail.sale_order_detail_id');
		$this->db->join('member','member.sale_order_detail_id = sale_order_detail.sale_order_detail_id');
		$this->db->join('product','product.product_code = stock.stock_product');
		$query = $this->db->get('sale_order_detail')->result_array();
		return $query;
	}

	public function order_detail($order_id)
	{
		$this->db->order_by('sale_order_detail_date','desc');
		$this->db->where('sale_order_detail.sale_order_detail_id', $order_id);
		$this->db->join('member','member.sale_order_detail_id = sale_order_detail.sale_order_detail_id');
		$query = $this->db->get('sale_order_detail')->result_array();
		return $query;
	}

	public function order_item($order_id)
	{
		$this->db->where('stock.sale_order_detail_id',$order_id);
		$this->db->join('product','stock.stock_product = product.product_code');
		$query = $this->db->get('stock')->result_array();
		return $query;
	}
}
