<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	public function login_check()
	{
		$login = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		$data_login = $this->login_model->login_check($login);
		if(count($data_login)>0){
			@session_start();
			@$_SESSION['employees_id'] = $data_login[0]['employees_id'];
			@$_SESSION['employees_code'] = $data_login[0]['employees_code'];
			@$_SESSION['employees_name'] = $data_login[0]['employees_name'];
			@$_SESSION['employees_shop'] = $data_login[0]['employees_shop'];
			@$_SESSION['position_name'] = $data_login[0]['position_name'];
			@$_SESSION['position_status'] = $data_login[0]['position_status'];
			redirect('home/index');
		}else{
			redirect('login/index/error');
		}
	}
	public function logout()
	{
		@session_start();
		@session_destroy();
		redirect('login/index');
	}
}
