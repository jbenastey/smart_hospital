<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Model{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	function get_Siswa(){
	$this->db->from('sbk_siswa');
	$this->db->order_by('siswa_date_created','DESC');
	$query = $this->db->get();
	return $query->result_array();

}
function create_Siswa($datasiswa){
	$this->db->insert('sbk_siswa',$datasiswa);
	return $this->db->affected_rows();
	
}
function get_siswa_by_nisn($nisn){
	$this->db->select('*');
	$this->db->from('sbk_siswa');
	$this->db->where('siswa_nisn',$nisn);
	$query =$this->db->get();
	return $query->row_array();
}
function update_siswa($nisn, $datasiswa)
{
$this->db->where('siswa_nisn', $nisn);
return $this->db->update('sbk_siswa' ,$datasiswa);
}
function hapus_siswa($nisn){
	$this->db->where('siswa_nisn',$nisn);
	return $this->db->delete('sbk_siswa');
}
}