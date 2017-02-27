<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	public function category_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['category'] = $this->category_model->category_list();
			$data['page'] = "product/category_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function category_insert()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "product/category_insert";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function category_update()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$category_id = $this->uri->segment(3);
			$data['category'] = $this->category_model->category_details($category_id);
			$data['page'] = "product/category_update";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function category_delete()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$category_id = $this->uri->segment(3);
			$this->category_model->category_delete($category_id);
			redirect('product/category_list');
		}else{
			redirect('login/index');
		}
	}
	public function product_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['product'] = $this->product_model->product_list();
			$data['page'] = "product/product_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function product_insert()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['category'] = $this->category_model->category_list();
			$data['page'] = "product/product_insert";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function product_update()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$product_id = $this->uri->segment(3);
			$data['category'] = $this->category_model->category_list();
			$data['product'] = $this->product_model->product_details($product_id);
			$data['page'] = "product/product_update";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function product_delete()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$product_id = $this->uri->segment(3);
			$this->product_model->product_delete($product_id);
			redirect('product/product_list');
		}else{
			redirect('login/index');
		}
	}
	public function product_barcode()
	{
		$product_id = $this->uri->segment(3);
		$data['product'] = $this->product_model->product_details($product_id);
		$this->load->view('product/product_barcode',$data);
	}
}
