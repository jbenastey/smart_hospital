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

	public function first($table,$key,$id){
		$this->db->from($table);
		$this->db->where($key,$id);
		return $this->db->get()->row_array();
	}

	public function insert($table,$data){
		$this->db->insert($table,$data);
		return $this->db->affected_rows();
	}

	public function update($table,$key,$id,$data){
		$this->db->where($key,$id);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}

	public function delete($table,$key,$id){
		$this->db->where($key,$id);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

	public function getKunjungan($tahun){
		$this->db->from('kunjungan');
		$this->db->join('poli','poli.id_poli = kunjungan.id_poli');
		$this->db->where('tahun',$tahun);
		$this->db->order_by('id_kunjungan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getKunjunganPoli($poli,$tahun){
		$this->db->from('kunjungan');
		$this->db->join('poli','poli.id_poli = kunjungan.id_poli');
		$this->db->where('poli.id_poli',$poli);
		$this->db->where('tahun',$tahun);
		$this->db->order_by('id_kunjungan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cekKunjunganBulan($tahun,$bulan){
		$this->db->from('kunjungan');
		$this->db->join('poli','poli.id_poli = kunjungan.id_poli');
		$this->db->where('tahun',$tahun);
		$this->db->where('bulan',$bulan);
		$this->db->order_by('id_kunjungan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cekKunjunganPoli($tahun,$bulan,$idPoli){
		$this->db->from('kunjungan');
		$this->db->join('poli','poli.id_poli = kunjungan.id_poli');
		$this->db->where('tahun',$tahun);
		$this->db->where('bulan',$bulan);
		$this->db->where('kunjungan.id_poli',$idPoli);
		$this->db->order_by('id_kunjungan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getPoli($tahun){
		$this->db->distinct();
		$this->db->select('poli.nama_poli');
		$this->db->from('kunjungan');
		$this->db->join('poli','poli.id_poli = kunjungan.id_poli');
		$this->db->where('tahun',$tahun);
		$this->db->order_by('id_kunjungan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
}
