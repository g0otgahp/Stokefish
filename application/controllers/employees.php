<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employees extends CI_Controller {

	public function position_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['position'] = $this->position_model->position_list();
			$data['page'] = "employees/position_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function position_insert()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "employees/position_insert";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function position_update()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$position_id = $this->uri->segment(3);
			$data['position'] = $this->position_model->position_details($position_id);
			$data['page'] = "employees/position_update";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function position_delete()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$position_id = $this->uri->segment(3);
			$this->position_model->position_delete($position_id);
			redirect('employees/position_list');
		}else{
			redirect('login/index');
		}
	}
	public function employees_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['employees'] = $this->employees_model->employees_list();
			$data['page'] = "employees/employees_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function employees_insert()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['position'] = $this->position_model->position_list();
			$data['shop'] = $this->shop_model->shop_list();
			$data['page'] = "employees/employees_insert";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function employees_update()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$employees_id = $this->uri->segment(3);
			$data['position'] = $this->position_model->position_list();
			$data['shop'] = $this->shop_model->shop_list();
			$data['employees'] = $this->employees_model->employees_details($employees_id);
			$data['page'] = "employees/employees_update";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function employees_delete()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$employees_id = $this->uri->segment(3);
			$this->employees_model->employees_delete($employees_id);
			redirect('employees/employees_list');
		}else{
			redirect('login/index');
		}
	}
}
