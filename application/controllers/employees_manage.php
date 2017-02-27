<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employees_manage extends CI_Controller {

	public function position_insert()
	{
		$position = array(
			'position_name' => $this->input->post('position_name'),
			'position_details' => $this->input->post('position_details'),
			'position_status' => $this->input->post('position_status')
		);
		$this->position_model->position_insert($position);
		redirect('employees/position_list');
	}
	public function position_update()
	{
		$position = array(
			'position_id' => $this->input->post('position_id'),
			'position_name' => $this->input->post('position_name'),
			'position_name' => $this->input->post('position_name'),
			'position_details' => $this->input->post('position_details'),
			'position_status' => $this->input->post('position_status')
		);
		$this->position_model->position_update($position);
		redirect('employees/position_list');
	}
	public function employees_insert()
	{
		$employees = array(
			'employees_code' => $this->input->post('employees_code'),
			'employees_name' => $this->input->post('employees_name'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'employees_shop' => $this->input->post('employees_shop'),
			'employees_position' => $this->input->post('employees_position'),
			'employees_status' => 1
		);
		$this->employees_model->employees_insert($employees);
		redirect('employees/employees_list');
	}
	public function employees_update()
	{
		$password = $this->input->post('password');
		if($password!=""){
			$employees = array(
				'employees_id' => $this->input->post('employees_id'),
				'employees_code' => $this->input->post('employees_code'),
				'employees_name' => $this->input->post('employees_name'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'employees_shop' => $this->input->post('employees_shop'),
				'employees_position' => $this->input->post('employees_position')
			);
		}else{
			$employees = array(
				'employees_id' => $this->input->post('employees_id'),
				'employees_code' => $this->input->post('employees_code'),
				'employees_name' => $this->input->post('employees_name'),
				'username' => $this->input->post('username'),
				'employees_shop' => $this->input->post('employees_shop'),
				'employees_position' => $this->input->post('employees_position')
			);
		}
		$this->employees_model->employees_update($employees);
		redirect('employees/employees_list');
	}
}
