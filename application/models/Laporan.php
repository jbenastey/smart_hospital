<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	function get_Laporan()
	{
		$this->db->from('sbk_laporan');
		$this->db->join('sbk_siswa', 'sbk_siswa.siswa_nisn = sbk_laporan.laporan_nisn');
		$this->db->order_by('laporan_tanggal', 'DESC');
		$query = $this->db->get();
		return $query->result_array();

	}

	function create_laporan($data)
	{
		$this->db->insert('sbk_laporan', $data);
	}

	function create_laporan_detail($data)
	{
		return $this->db->insert_batch('sbk_laporan_detail', $data);
	}

	function get_laporan_id($id)
	{
		$this->db->select('*');
		$this->db->from('sbk_laporan');
		$this->db->where('laporan_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function get_laporan_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('sbk_laporan_detail');
		$this->db->join('sbk_laporan', 'sbk_laporan.laporan_id = sbk_laporan_detail.detail_laporan_id');
		$this->db->join('sbk_pelanggaran', 'sbk_pelanggaran.pelanggaran_id = sbk_laporan_detail.detail_pelanggaran_id');
		$this->db->where('laporan_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_bukti(){
		$this->db->from('sbk_bukti');
		$this->db->order_by('bukti_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function upload_bukti($data){
		$this->db->insert('sbk_bukti', $data);
	}
}
