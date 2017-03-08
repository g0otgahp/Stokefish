<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock_manage extends CI_Controller {

	// public function stock_in()
	// {
	// 	@session_start();
	// 	$product_code = $this->input->post('stock_product');
	// 	$amount = $this->input->post('stock_amount');
	// 	@$shop_id = $_SESSION['employees_shop'];
	// 	$data = $this->product_model->product_list_by_code($product_code);
	// 	$price = $data[0]['product_sale']*$amount;
	// 	$stock = array(
	// 		'stock_product' => $product_code,
	// 		'stock_type' => "in",
	// 		'stock_amount' => $amount,
	// 		'stock_date' => date('Y-m-d'),
	// 		'stock_time' => date('H:i:s'),
	// 		'stock_employees' => @$_SESSION['employees_id'],
	// 		'stock_shop' => $shop_id,
	// 		'stock_price' => $price,
	// 	);
	// 	$this->stock_model->product_insert_limit($shop_id,$product_code);
	// 	$this->stock_model->stock_in($stock);
	// 	redirect('stock/stock_list');
	// }

	public function stock_temp_in()
	{
			@session_start();
			date_default_timezone_set("Asia/Bangkok");
			$stock = array(
				'warehouse_temp_product' => $this->input->post('stock_product'),
				'warehouse_temp_type' => "in",
				'warehouse_temp_amount' => $this->input->post('stock_amount'),
				'warehouse_temp_date' => date('Y-m-d'),
				'warehouse_temp_time' => date('H:i:s'),
				'warehouse_temp_shop' => $_SESSION['employees_shop'],
			);
			$this->warehouse_model->warehouse_temp_insert($stock);
		redirect('stock/stock_in');
	}
	// public function warehouse_in()
	// {
	// 	@session_start();
	// 	$warehouse = array(
	// 		'warehouse_product' => $this->input->post('warehouse_product'),
	// 		'warehouse_type' => "in",
	// 		'warehouse_amount' => $this->input->post('warehouse_amount'),
	// 		'warehouse_date' => date('Y-m-d'),
	// 		'warehouse_time' => date('H:i:s'),
	// 		'warehouse_employees' => @$_SESSION['employees_id']
	// 	);
	// 	$this->warehouse_model->warehouse_in($warehouse);
	// 	redirect('warehouse/warehouse_list');
	// }
	// public function warehouse_out()
	// {
	// 	@session_start();
	// 	$warehouse = array(
	// 		'warehouse_product' => $this->input->post('warehouse_product'),
	// 		'warehouse_type' => "out",
	// 		'warehouse_amount' => $this->input->post('warehouse_amount'),
	// 		'warehouse_date' => date('Y-m-d'),
	// 		'warehouse_time' => date('H:i:s'),
	// 		'warehouse_employees' => @$_SESSION['employees_id']
	// 	);
	// 	$this->warehouse_model->warehouse_out($warehouse);

	// 	$stock = array(
	// 		'stock_product' => $this->input->post('warehouse_product'),
	// 		'stock_type' => "in",
	// 		'stock_amount' => $this->input->post('warehouse_amount'),
	// 		'stock_date' => date('Y-m-d'),
	// 		'stock_time' => date('H:i:s'),
	// 		'stock_employees' => @$_SESSION['employees_id'],
	// 		'stock_shop' => $this->input->post('warehouse_shop')
	// 	);
	// 	$this->stock_model->stock_in($stock);
	// 	redirect('warehouse/warehouse_list');
	// }

}
