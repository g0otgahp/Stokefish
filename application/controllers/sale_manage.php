<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale_manage extends CI_Controller {

	public function sale_list()
	{
		@session_start();
		$barcode = array('barcode' => $this->input->post('barcode'));
		$product_limit_check = $this->stock_model->check_product(@$_SESSION['employees_shop'],$barcode['barcode']);

		if (count($product_limit_check)>0) {
			$data = $this->sale_model->product_select($barcode);

			$num = count(@$_SESSION['product']);
			@$_SESSION['product'][$num]['product_key'] = date('YmdHis');
			@$_SESSION['product'][$num]['product_code'] = $data[0]['product_code'];
			@$_SESSION['product'][$num]['product_name'] = $data[0]['product_name'];
			@$_SESSION['product'][$num]['product_buy'] = $data[0]['product_buy'];
			@$_SESSION['product'][$num]['product_sale'] = $data[0]['product_sale'];
			@$_SESSION['product'][$num]['product_normal_sale'] = $data[0]['product_sale'];
			@$_SESSION['pay_type'] = $_POST['sale_order_detail_pay_type'];

			@$_SESSION['check'] = 0;
			redirect('sale/sale_list');
		} else {
			@$_SESSION['check'] = 1;
			redirect('sale/sale_list');
		}
	}

	public function sale_list_edit()
	{
		@session_start();
		$barcode = array('barcode' => $this->input->post('barcode'));
		$data = $this->sale_model->product_select($barcode);

		$num = count(@$_SESSION['product']);
		@$_SESSION['product'][$num]['product_key'] = date('YmdHis');
		@$_SESSION['product'][$num]['product_code'] = $data[0]['product_code'];
		@$_SESSION['product'][$num]['product_name'] = $data[0]['product_name'];
		@$_SESSION['product'][$num]['product_buy'] = $data[0]['product_buy'];
		@$_SESSION['product'][$num]['product_sale'] = $data[0]['product_sale'];
		@$_SESSION['product'][$num]['product_normal_sale'] = $data[0]['product_sale'];
		@$_SESSION['pay_type'] = $_POST['sale_order_detail_pay_type'];

		redirect($this->agent->referrer(), 'refresh');

	}
	public function sale_member_edit()
	{
		$input = $this->input->post();
		$this->sale_model->sale_member_update($input);
		redirect($this->agent->referrer(), 'refresh');
	}
	public function sale_pay_type_edit()
	{
		$input = $this->input->post();
		$this->sale_model->sale_pay_type_update($input);
		redirect($this->agent->referrer(), 'refresh');
	}
	public function sale_stock_price_edit()
	{
		$input = $this->input->post();
		$this->sale_model->sale_stock_price_update($input);
		redirect($this->agent->referrer(), 'refresh');
	}

	public function stock_item_delete()
	{
		$stock_id = $this->uri->segment(3);
		$this->db->where('stock.stock_id', $stock_id)->delete('stock');
		redirect($this->agent->referrer(), 'refresh');

	}
	public function sale_edit_delete()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$product_key = $this->uri->segment(3);
			for($i=0;$i<30;$i++){
				if(@$_SESSION['product'][$i]['product_key']==$product_key){
					unset($_SESSION['product'][$i]);
					@$_SESSION['unstock'][$i] = $_SESSION['stock'][$i];
					unset($_SESSION['stock'][$i]);
				}
			};
			redirect($this->agent->referrer(), 'refresh');
		} else {
			redirect('login/index');
		}
	}
	public function sale_discount_edit()
	{

		$input = $this->input->post();
		if (!isset($input['sale_order_detail_discount_status'])) {
			$input['sale_order_detail_discount_status'] = 0;
		} else {
			$input['sale_order_detail_discount_status'] = 1;

		}
		if (!isset($input['sale_order_detail_vat_status'])) {
			$input['sale_order_detail_vat_status'] = 0;
		}else {
			$input['sale_order_detail_vat_status'] = 1;

		}

		// $this->debuger->prevalue($input);
		$this->sale_model->sale_pay_type_update($input);
		redirect($this->agent->referrer(), 'refresh');
	}
	public function sale_clear()
	{
		@session_start();
		unset($_SESSION['sale_order_detail_id']);
		unset($_SESSION['product']);
		unset($_SESSION['check']);
		unset($_SESSION['member']);
		unset($_SESSION['pay_type']);
		unset($_SESSION['is_vat']);
		unset($_SESSION['is_discount']);
		unset($_SESSION['discount_value']);
		unset($_SESSION['stock']);
		redirect('sale/sale_list');
	}
	public function sale_insert()
	{
		@session_start();
		if ($_SESSION['is_vat'] = 'checked') {
			$vat = '1';
		}
		if ($_SESSION['is_discount'] = 'checked') {
			$discount = '1';
			$discount_value = @$_SESSION['discount_value'];
			if ($discount_value=='') {
				$discount = '0';
				$discount_value = 0;
			}
		} else {
			$discount = '0';
			$discount_value = 0;
		}
		if (@$_SESSION['pay_type']=='') {
			@$_SESSION['pay_type'] = 1;
		}
		$query =  $this->db
		->get('sale_order_detail')
		->num_rows();

			$InvoiceNo = "IN".sprintf("%05d", ($query+1));
			$sale_order = array(
				'sale_order_detail_no' => $InvoiceNo,
				'sale_order_detail_date' => date('Y-m-d'),
				'sale_order_detail_time' => date('H:i:s'),
				'sale_order_detail_vat' => 0,
				'sale_order_detail_vat_status' => $vat,
				'sale_order_detail_discount' => $discount_value,
				'sale_order_detail_discount_status' => $discount,
				'sale_order_detail_pay_type' => @$_SESSION['pay_type'],
				'sale_order_detail_shop' => @$_SESSION['employees_shop'],
			);
			$this->db->insert('sale_order_detail',$sale_order);
			$sale_order_id = $this->db->insert_id();

			$member = array(
				'member_fullname' => @$_SESSION['member']['member_fullname'],
				'member_address' => @$_SESSION['member']['member_address'],
				'member_phone' => @$_SESSION['member']['member_phone'],
				'member_note' => @$_SESSION['member']['member_note'],
				'sale_order_detail_id	' => $sale_order_id,
			);
			$this->db->insert('member',$member);

			for($i=0;$i<count(@$_SESSION['product']);$i++) {
			$stock = array(
				'stock_product' => @$_SESSION['product'][$i]['product_code'],
				'stock_type' => "out",
				'stock_amount' => 1,
				'stock_date' => date('Y-m-d'),
				'stock_time' => date('H:i:s'),
				'stock_employees' => @$_SESSION['employees_id'],
				'stock_shop' => @$_SESSION['employees_shop'],
				'stock_price' => @$_SESSION['product'][$i]['product_sale'],
				'sale_order_detail_id' => $sale_order_id,
			);
			$this->db->insert('stock',$stock);
		}
		unset($_SESSION['product']);
		unset($_SESSION['member']);
		unset($_SESSION['pay_type']);
		unset($_SESSION['is_vat']);
		unset($_SESSION['is_discount']);
		unset($_SESSION['discount_value']);
		unset($_SESSION['stock']);
		unset($_SESSION['check']);


		redirect('stock/sale_order_detail/'.$sale_order_id);
	}
	public function sale_edit_insert()
	{
		@session_start();
		$input = $this->input->post();
		// $this->debuger->prevalue($input);
		foreach ($_SESSION['product'] as $row) {
			$stock = array(
				'stock_product' => $row['product_code'],
				'stock_type' => "out",
				'stock_amount' => 1,
				'stock_date' => date('Y-m-d'),
				'stock_time' => date('H:i:s'),
				'stock_employees' => @$_SESSION['employees_id'],
				'stock_shop' => @$_SESSION['employees_shop'],
				'stock_price' => $row['product_sale'],
				'sale_order_detail_id' => $input['sale_order_detail_id'],
			);
			$this->db->insert('stock', $stock);
		}

		unset($_SESSION['product']);
		redirect('/stock/sale_order_detail/'.$input['sale_order_detail_id']);
	}
	public function sale_vat()
	{
		@session_start();
		if (@$_SESSION['is_vat']=='') {
			@$_SESSION['is_vat'] = 'checked';
		} elseif (@$_SESSION['is_vat'] = 'checked') {
			@$_SESSION['is_vat'] = '';
		}

		redirect($this->agent->referrer(), 'refresh');
	}
	public function sale_discount()
	{
		@session_start();
		$input = $this->input->post();
		$_SESSION['discount_value'] = $input['discount_value'];

		redirect($this->agent->referrer(), 'refresh');
	}
	public function is_discount()
	{
		@session_start();
		if (@$_SESSION['is_discount']=='') {
			@$_SESSION['is_discount'] = 'checked';
		} elseif (@$_SESSION['is_discount'] = 'checked') {
			@$_SESSION['is_discount'] = '';
		}

		redirect($this->agent->referrer(), 'refresh');
	}
	public function sale_member_fullname()
	{
		@session_start();
		@$_SESSION['member']['member_fullname'] = $_POST['member_fullname'];
		redirect('sale/sale_list');
	}
	public function sale_member_phone()
	{
		@session_start();
		@$_SESSION['member']['member_phone'] = $_POST['member_phone'];
		redirect('sale/sale_list');
	}
	public function sale_member_address()
	{
		@session_start();
		@$_SESSION['member']['member_address'] = $_POST['member_address'];
		redirect('sale/sale_list');
	}
	public function sale_member_note()
	{
		@session_start();
		@$_SESSION['member']['member_note'] = $_POST['member_note'];
		redirect('sale/sale_list');
	}

	public function sale_amount()
	{
		@session_start();
		$i = $this->uri->segment(3);
		@$_SESSION['product'][$i]['product_sale'] = $_POST['sale_amount'];
		redirect('sale/sale_list');
	}

	public function sale_pay_type()
	{
		@session_start();
		@$_SESSION['pay_type'] = $_POST['sale_order_detail_pay_type'];
		redirect('sale/sale_list');
	}
}
