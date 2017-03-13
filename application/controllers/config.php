<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class config extends CI_Controller {

	public function index()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['config'] = $this->config_model->config();
			$data['page'] = "config/config";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

	public function EditConfig()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){

			if ($_FILES["config_logo"]["name"]!='') {
				$ext = pathinfo($_FILES["config_logo"]["name"],PATHINFO_EXTENSION);
				$new_file = 'logo'.'.'.$ext;
				copy($_FILES["config_logo"]["tmp_name"],"images/".$new_file);
			} else {
				$new_file = $_POST['config_logo_old'];
			}
			$input = array(
				'config_id' => $_POST['config_id'],
				'config_shop_name' => $_POST['config_shop_name'],
				'config_phone' => $_POST['config_phone'],
				'config_address' => $_POST['config_address'],
				'config_detail' => $_POST['config_detail'],
				'config_tax' => $_POST['config_tax'],
				'config_logo' => $new_file,
			);
			// $this->debuger->prevalue($input);
			$this->config_model->config_update($input);
			redirect('config/config');
		}else{
			redirect('login/index');
		}
	}
}
