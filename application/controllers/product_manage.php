<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_manage extends CI_Controller {

	public function category_insert()
	{
		$category = array(
			'category_name' => $this->input->post('category_name'),
			'category_details' => $this->input->post('category_details'),
			'category_status' => 1
		);
		$this->category_model->category_insert($category);
		redirect('product/category_list');
	}
	public function category_update()
	{
		$category = array(
			'category_id' => $this->input->post('category_id'),
			'category_name' => $this->input->post('category_name'),
			'category_name' => $this->input->post('category_name'),
			'category_details' => $this->input->post('category_details'),
			'category_status' => $this->input->post('category_status')
		);
		$this->category_model->category_update($category);
		redirect('product/category_list');
	}
	public function product_insert()
	{
		$product = array(
			'product_code' => $this->input->post('product_code'),
			'product_name' => $this->input->post('product_name'),
			'product_category' => $this->input->post('product_category'),
			'product_buy' => $this->input->post('product_buy'),
			'product_sale' => $this->input->post('product_sale'),
			'product_max' => $this->input->post('product_max'),
			'product_unit' => $this->input->post('product_unit'),
			'product_note' => $this->input->post('product_note'),
			'product_status' => 1,
		);
		$this->product_model->product_insert($product);
		redirect('product/product_list');
	}
	public function product_update()
	{
		$product = array(
			'product_id' => $this->input->post('product_id'),
			'product_code' => $this->input->post('product_code'),
			'product_name' => $this->input->post('product_name'),
			'product_category' => $this->input->post('product_category'),
			'product_buy' => $this->input->post('product_buy'),
			'product_sale' => $this->input->post('product_sale'),
			'product_max' => $this->input->post('product_max'),
			'product_unit' => $this->input->post('product_unit'),
			'product_note' => $this->input->post('product_note'),
			'product_status' => 1,
		);
		$this->product_model->product_update($product);
		redirect('product/product_list');
	}
}
