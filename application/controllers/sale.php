<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale extends CI_Controller {

	public $user = array();
	public function sale_list()
	{
		@session_start();
		$data['config'] = $this->config_model->config();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "sale/sale_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function sale_edit()
	{
		$order_id = $this->uri->segment(3);
		@session_start();
		$data['config'] = $this->config_model->config();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "sale/sale_edit";
			$data['order_detail'] = $this->stock_model->order_detail($order_id);
			$data['order_item'] = $this->stock_model->order_item($order_id);
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function sale_list_delete()
	{
		@session_start();
		$data['config'] = $this->config_model->config();
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
		$data['config'] = $this->config_model->config();
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
