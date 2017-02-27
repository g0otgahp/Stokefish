<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employees_model extends CI_Model {

	public function employees_list()
	{
		$this->db->order_by('employees.employees_id','desc');
		$this->db->join('position','position.position_id = employees.employees_position');
		$query = $this->db->get('employees');
		return $query->result_array();
	}
	public function employees_insert($employees)
	{
		$this->db->insert('employees',$employees);
	}
	public function employees_details($employees_id)
	{
		$this->db->where('employees.employees_id',$employees_id);
		$this->db->join('position','position.position_id = employees.employees_position');
		$this->db->join('shop','shop.shop_id = employees.employees_shop','left');
		$query = $this->db->get('employees');
		return $query->result_array();
	}
	public function employees_update($employees)
	{
		$this->db->where('employees_id',$employees['employees_id']);
		$this->db->update('employees',$employees);
	}
	public function employees_delete($employees_id)
	{
		$this->db->where('employees_id',$employees_id);
		$this->db->delete('employees');
	}
}
