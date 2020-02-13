<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RekapController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekap');
        $this->load->model('Laporan');

        if (!$this->session->has_userdata('session_username')) {
            redirect(site_url('login'));
        }
    }

    public function index(){
        $data['tahun'] = date('Y');

        $this->load->view('templates/header');
        $this->load->view('rekap/index',$data);
        $this->load->view('templates/footer');
    }
    public function view($tahun,$bulan){
        $tanggal = $tahun.'-'.$bulan;
        $rekap = $this->Rekap->get_rekap($tanggal);

        $dataPoin = array();
        foreach ($rekap as $key=> $value) {
            $detail = $this->Laporan->get_laporan_by_id($value['laporan_id']);
            $poin = 0;
            foreach ($detail as $keys=>$item) {
                if ($item['detail_laporan_id'] == $value['laporan_id']){
                    $poin = $poin + (int)$item['pelanggaran_poin'];
                }
            }
            $dataPoin[$key] = $poin;
            $rekap[$key] += array(
                'jumlah_poin' => $dataPoin[$key]
            );
        }
        echo json_encode($rekap);
    }
}