<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Model{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	function get_Pelanggaran(){
	$this->db->from('sbk_pelanggaran');
	$this->db->order_by('pelanggaran_date_created','DESC');
	$query = $this->db->get();
	return $query->result_array();

}
function get_bentuk_pelanggaran($bentuk){
$this->db->select('*');
$this->db->from('sbk_pelanggaran');
$this->db->where('pelanggaran_bentuk',$bentuk);
$query = $this->db->get();
	return $query->result_array();
}
function create_Pelanggaran($datapelanggaran){
	$this->db->insert('sbk_pelanggaran',$datapelanggaran);
	return $this->db->affected_rows();
	
}
function get_Pelanggaran_by_id($id){
	$this->db->select('*');
	$this->db->from('sbk_pelanggaran');
	$this->db->where('pelanggaran_id',$id);
	$query =$this->db->get();
	return $query->row_array();
}
function update_Pelanggaran($id, $datapelanggaran)
{
$this->db->where('pelanggaran_id', $id);
return $this->db->update('sbk_pelanggaran' ,$datapelanggaran);
}
function hapus_Pelanggaran($id){
	$this->db->where('pelanggaran_id',$id);
	return $this->db->delete('sbk_pelanggaran');
}
}