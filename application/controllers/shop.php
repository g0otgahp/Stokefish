<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop extends CI_Controller {

	public function shop_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['shop'] = $this->shop_model->shop_list();
			$data['page'] = "shop/shop_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function shop_insert()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "shop/shop_insert";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function shop_update()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$shop_id = $this->uri->segment(3);
			$data['shop'] = $this->shop_model->shop_detail($shop_id);
			$data['page'] = "shop/shop_update";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function shop_delete()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$shop_id = $this->uri->segment(3);
			$this->shop_model->shop_delete($shop_id);
			redirect('shop/shop_list');
		}else{
			redirect('login/index');
		}
	}
}
