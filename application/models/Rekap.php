<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Model{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_rekap($tanggal){
        $this->db->select('*');
        $this->db->from('sbk_laporan');
        $this->db->join('sbk_siswa', 'sbk_siswa.siswa_nisn = sbk_laporan.laporan_nisn');
        $this->db->like('laporan_tanggal', $tanggal);
        $query = $this->db->get();
        return $query->result_array();
    }
}