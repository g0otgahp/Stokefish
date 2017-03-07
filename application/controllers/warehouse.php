<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class warehouse extends CI_Controller {

	public function warehouse_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['product'] = $this->product_model->product_list();
			$data['page'] = "warehouse/warehouse_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function warehouse_in()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['product'] = $this->warehouse_model->warehouse_in_temp_list();
			$data['allproduct'] = $this->product_model->product_list();
			$data['page'] = "warehouse/warehouse_in";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function warehouse_in_insert()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data = $this->warehouse_model->warehouse_in_temp_list();
			foreach ($data as $row) {
				$input = array(
					'warehouse_product' => $row['warehouse_temp_product'],
					'warehouse_type' => "in",
					'warehouse_amount' => $row['warehouse_temp_amount'],
					'warehouse_date' => date('Y-m-d'),
					'warehouse_time' => date('H:i:s'),
					'warehouse_employees' => $_SESSION['employees_id'],
				);
				$this->warehouse_model->warehouse_in($input);
			}
			$type = "in";
			$this->warehouse_model->warehouse_temp_remove($type);
			redirect('warehouse/warehouse_in');
		}else{
			redirect('login/index');
		}
	}

	public function warehouse_out_insert()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data = $this->warehouse_model->warehouse_out_temp_list();
			foreach ($data as $row) {
				$date['warehouse_temp_price'] = $row['product_sale']*$row['warehouse_temp_amount'];
				$input = array(
					'warehouse_product' => $row['warehouse_temp_product'],
					'warehouse_type' => "out",
					'warehouse_amount' => $row['warehouse_temp_amount'],
					'warehouse_date' => date('Y-m-d'),
					'warehouse_time' => date('H:i:s'),
					'warehouse_employees' => $_SESSION['employees_id'],
				);
				$this->warehouse_model->warehouse_in($input);

				$input = array(
					'stock_product' => $row['warehouse_temp_product'],
					'stock_type' => "in",
					'stock_amount' => $row['warehouse_temp_amount'],
					'stock_date' => date('Y-m-d'),
					'stock_time' => date('H:i:s'),
					'stock_employees' => $_SESSION['employees_id'],
					'stock_shop' => $row['warehouse_temp_shop'],
					'stock_price' => $date['warehouse_temp_price'],
				);
				$this->stock_model->product_insert_limit($row['warehouse_temp_shop'],$row['warehouse_temp_product']);
				$this->stock_model->stock_in($input);
			}
			$type = "out";
			$this->warehouse_model->warehouse_temp_remove($type);
			redirect('warehouse/warehouse_out');
		}else{
			redirect('login/index');
		}
	}

	public function warehouse_temp_in_remove()
	{
		@session_start();
			$id = $this->uri->segment(3);
			$data['product'] = $this->warehouse_model->warehouse_temp_delete($id);
			redirect('warehouse/warehouse_in');
	}
	public function warehouse_temp_out_remove()
	{
		@session_start();
			$id = $this->uri->segment(3);
			$data['product'] = $this->warehouse_model->warehouse_temp_delete($id);
			redirect('warehouse/warehouse_out');
	}
	public function warehouse_out()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['shop'] = $this->shop_model->shop_list();
			$data['allproduct'] = $this->product_model->product_list();
			$data['product'] = $this->warehouse_model->warehouse_out_temp_list();
			$data['page'] = "warehouse/warehouse_out";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
}
