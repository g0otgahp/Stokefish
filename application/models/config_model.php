<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class config_model extends CI_Model {


	public function config()
	{
		$query = $this->db->get('config');
		return $query->result_array();
	}

	public function config_update($input)
	{
		$this->db->where('config_id',$input['config_id']);
		$this->db->update('config',$input);
	}

}
