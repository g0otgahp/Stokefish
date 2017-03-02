<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale extends CI_Controller {

	public function sale_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "sale/sale_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function sale_edit()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$order_id = $this->uri->segment(3);
			$data['sale_order_detail'] = $this->stock_model->sale_order_detail($order_id);

			unset($_SESSION['sale_order_detail_id']);
			unset($_SESSION['member']);
			unset($_SESSION['product']);
			unset($_SESSION['stock']);
			unset($_SESSION['unstock']);

			
			@$_SESSION['sale_order_detail_id'] = $data['sale_order_detail'][0]['sale_order_detail_id'];
			@$_SESSION['member']['member_id'] = $data['sale_order_detail'][0]['member_id'];
			@$_SESSION['member']['member_fullname'] = $data['sale_order_detail'][0]['member_fullname'];
			@$_SESSION['member']['member_phone'] = $data['sale_order_detail'][0]['member_phone'];
			@$_SESSION['member']['member_address'] = $data['sale_order_detail'][0]['member_address'];
			@$_SESSION['member']['member_note'] = $data['sale_order_detail'][0]['member_note'];

			foreach ($data['sale_order_detail'] as $row) {
				$num = count(@$_SESSION['product']);
				@$_SESSION['stock'][$num]['stock_id'] = $row['stock_id'];
				@$_SESSION['product'][$num]['product_key'] = date('YmdHis').$num;
				@$_SESSION['product'][$num]['product_code'] = $row['product_code'];
				@$_SESSION['product'][$num]['product_name'] = $row['product_name'];
				@$_SESSION['product'][$num]['product_buy'] = $row['product_buy'];
				@$_SESSION['product'][$num]['product_sale'] = $row['product_sale'];
				@$_SESSION['product'][$num]['product_normal_sale'] = $row['product_sale'];
				@$_SESSION['product'][$num]['product_sale'] = $row['stock_price'];
			}
			redirect('sale_manage/sale_list');
		}else{
			redirect('login/index');
		}
	}
	public function sale_list_delete()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$product_key = $this->uri->segment(3);
			for($i=0;$i<30;$i++){
				if(@$_SESSION['product'][$i]['product_key']==$product_key){
					unset($_SESSION['product'][$i]);
					@$_SESSION['unstock'][$i] = $_SESSION['stock'][$i];
					unset($_SESSION['stock'][$i]);
				}
			};
			$data['page'] = "sale/sale_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

	public function sale_result()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$order_id = $this->uri->segment(3);
			$data['sale_order_detail'] = $this->stock_model->sale_order_detail($order_id);
			$this->load->view('doc_header',$data);
			$this->load->view('sale/sale_result');
			$this->load->view('doc_footer');
		}else{
			redirect('login/index');
		}
	}
}
