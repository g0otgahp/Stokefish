<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock extends CI_Controller {

	public function stock_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			@$shop_id = $_SESSION['employees_shop'];
			$data['product'] = $this->product_model->product_list_by_shop($shop_id);
			$data['page'] = "stock/stock_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function stock_list_shop()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['employees_shop'] = @$this->input->post('employees_shop');
			$data['shop'] = $this->shop_model->shop_list();
			@$shop_id = $_POST['employees_shop'];
			$data['product'] = $this->product_model->product_list_by_shop($shop_id);
			$data['page'] = "stock/stock_list_shop";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

	public function stock_shop_option()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['employees_shop'] = @$this->input->post('employees_shop');
			$data['shop'] = $this->shop_model->shop_list();
			$data['product'] = $this->product_model->product_list_by_shop($_SESSION['employees_shop']);
			$data['page'] = "stock/stock_shop_option";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

	public function stock_update()
	{
		@session_start();
			$product_id = $this->uri->segment(3);
			$input = $this->input->post();
			$up = $this->db->where('product_limit_id',$product_id)
			->where('product_limit_shop_id',$_SESSION['employees_shop'])
			->update('product_limit',$input);

			redirect('stock/stock_shop_option');
	}
	public function stock_in()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['allproduct'] = $this->product_model->product_list();
			$data['shop'] = $this->shop_model->shop_list();
			$data['product'] = $this->stock_model->stock_in_temp_list_shop($_SESSION['employees_shop']);
			$data['page'] = "stock/stock_in";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function stock_in_insert()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			@$shop_id = $_SESSION['employees_shop'];
			$data = $this->stock_model->stock_in_temp_list_shop($_SESSION['employees_shop']);
			foreach ($data as $row) {
				$product_code = $row['product_code'];
				$amount = $row['warehouse_temp_amount'];
				$price = $row['product_sale']*$amount;
				$input = array(
					'stock_product' => $row['warehouse_temp_product'],
					'stock_type' => "in",
					'stock_amount' => $row['warehouse_temp_amount'],
					'stock_date' => date('Y-m-d'),
					'stock_time' => date('H:i:s'),
					'stock_employees' => @$_SESSION['employees_id'],
					'stock_shop' => $shop_id,
					'stock_price' => $price,
				);
				$this->stock_model->product_insert_limit($shop_id,$product_code);
				$this->stock_model->stock_in($input);
			}
			$this->warehouse_model->stock_temp_remove($_SESSION['employees_shop']);
			redirect('stock/stock_list');
		}else{
			redirect('login/index');
		}
	}

	public function sale_order_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			unset($_SESSION['sale_order_detail_id']);
			$data['sale_order_detail'] = $this->stock_model->sale_order_list($_SESSION['employees_shop']);
			$data['page'] = "sale/sale_order_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

	public function sale_order_detail()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$order_id = $this->uri->segment(3);
			$data['sale_order_detail'] = $this->stock_model->sale_order_detail($order_id);
			$data['page'] = "sale/sale_order_detail";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

	public function stock_cancel()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$order_id = $this->uri->segment(3);
			$this->stock_model->stock_cancel($order_id);
			$data['sale_order_detail'] = $this->stock_model->sale_order_list($_SESSION['employees_shop']);
			$data['page'] = "sale/sale_order_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
}
