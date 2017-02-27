<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop_manage extends CI_Controller {

	public function shop_insert()
	{
		@session_start();
		$shop = array(
			'shop_details' => $this->input->post('shop_details'),
			'shop_zone' => $this->input->post('shop_zone')
		);
		$this->shop_model->shop_insert($shop);
		redirect('shop/shop_list');
	}
	public function shop_update()
	{
		@session_start();
		$shop = array(
			'shop_id' => $this->input->post('shop_id'),
			'shop_details' => $this->input->post('shop_details'),
			'shop_zone' => $this->input->post('shop_zone')
		);
		$this->shop_model->shop_update($shop);
		redirect('shop/shop_list');
	}

}
