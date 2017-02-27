<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale_manage extends CI_Controller {

	public function sale_list()
	{
		@session_start();
		$barcode = array('barcode' => $this->input->post('barcode'));
		$data = $this->sale_model->product_select($barcode);

		$num = count(@$_SESSION['product']);
		@$_SESSION['product'][$num]['product_key'] = date('YmdHis');
		@$_SESSION['product'][$num]['product_code'] = $data[0]['product_code'];
		@$_SESSION['product'][$num]['product_name'] = $data[0]['product_name'];
		@$_SESSION['product'][$num]['product_sale'] = $data[0]['product_sale'];

		redirect('sale/sale_list');
	}
	public function sale_clear()
	{
		@session_start();
		unset($_SESSION['product']);
		redirect('sale/sale_list');
	}
	public function sale_insert()
	{
		@session_start();
		$query =  $this->db
		->get('sale_order_detail')
		->num_rows();
		$InvoiceNo = "IN".sprintf("%05d", ($query+1));
		$sale_order = array(
			'sale_order_detail_no' => $InvoiceNo,
			'sale_order_detail_date' => date('Y-m-d'),
			'sale_order_detail_time' => date('H:i:s'),
			'sale_order_detail_vat' => 0,
			'sale_order_detail_vat_status' => 0,
			'sale_order_detail_pay_type' => $_POST['sale_order_detail_pay_type'],
			'sale_order_detail_shop' => @$_SESSION['employees_shop'],
		);
		$this->db->insert('sale_order_detail',$sale_order);
		$sale_order_id = $this->db->insert_id();

		$member = array(
			'member_fullname' => $_POST['member_fullname'],
			'member_address' => $_POST['member_address'],
			'member_phone' => $_POST['member_phone'],
			'member_note' => $_POST['member_note'],
			'sale_order_detail_id	' => $sale_order_id,
		);
		$this->db->insert('member',$member);

		$product = $this->product_model->product_list_by_code($_POST['product_code'][0]);
		// $this->debuger->prevalue($product);

		for($i=0;$i<count(@$_POST['product_code']);$i++){
			$product = $this->product_model->product_list_by_code($_POST['product_code'][$i]);
			$stock = array(
				'stock_product' => @$_POST['product_code'][$i],
				'stock_type' => "out",
				'stock_amount' => 1,
				'stock_date' => date('Y-m-d'),
				'stock_time' => date('H:i:s'),
				'stock_employees' => @$_SESSION['employees_id'],
				'stock_shop' => @$_SESSION['employees_shop'],
				'stock_price' => $product[0]['product_sale'],
				'sale_order_detail_id' => $sale_order_id,
			);
			$this->db->insert('stock',$stock);
		}
		@session_start();
		unset($_SESSION['product']);
		redirect('sale/sale_list');
	}

}
