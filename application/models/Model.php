<?php


class Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get($table,$sort = null){
		$this->db->from($table);
		if ($sort == null){
			$query = $this->db->get();
			return $query->result_array();
		} else {
			$this->db->order_by($sort,'DESC');
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function insert($table,$data){
		$this->db->insert($table,$data);
		return $this->db->affected_rows();
	}
}
