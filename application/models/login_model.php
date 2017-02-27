<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {


	public function login_check($login)
	{
		$this->db->where('employees.username',$login['username']);
		$this->db->where('employees.password',$login['password']);
		$this->db->join('position','position.position_id = employees.employees_position');
		$query = $this->db->get('employees');
		return $query->result_array();
	}
}
