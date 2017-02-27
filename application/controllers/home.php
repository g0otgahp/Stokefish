<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "index";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
		
	}
	public function chart()
	{
		$this->load->view('chart');
	}
}
