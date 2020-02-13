<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = array('Laporan', 'Pelanggaran', 'Siswa');
        $this->load->model($model);
        $this->load->helper('tgl_indo');

        if (!$this->session->has_userdata('session_username')) {
            redirect(site_url('login'));
        }

    }

    public function index()
    {
        $data['laporan'] = $this->Laporan->get_laporan();
        $this->load->view('templates/header');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['laporan'] = $this->Laporan->get_laporan();
        $data['pelanggaran'] = $this->Pelanggaran->get_Pelanggaran();
        $data['siswa'] = $this->Siswa->get_Siswa();
        if (isset($_POST) && count($_POST) > 0) {
            $generate = substr(time(), 5);
            $laporan_id = 'LAP-' . $generate;

            $NISN = $this->input->post('NISN');
            $Tanggal = $this->input->post('Tanggal');

            $id_pelanggaran = $this->input->post('id_pelanggaran');
            $data_detail = array();
            for ($i = 0; $i < count($id_pelanggaran); $i++) {
                $data_detail[$i] = array(
                    'detail_laporan_id' => $laporan_id,
                    'detail_pelanggaran_id' => $id_pelanggaran[$i],
                );
            }

            $datalaporan = array(
                'laporan_id' => $laporan_id,
                'laporan_nisn' => $NISN,
                'laporan_tanggal' => $Tanggal,

            );
            $this->Laporan->create_laporan($datalaporan);
            $this->Laporan->create_laporan_detail($data_detail);
            $this->session->set_flashdata('alert', 'create_laporan');
            redirect('laporan');
        }
        $this->load->view('templates/header');
        $this->load->view('laporan/create', $data);
        $this->load->view('templates/footer');
    }

    function view($id)
    {
        $data['laporan'] = $this->Laporan->get_laporan_id($id);
        $data['siswa'] = $this->Siswa->get_siswa_by_nisn($data['laporan']['laporan_nisn']);
        $data['pelanggaran'] = $this->Laporan->get_laporan_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('laporan/view', $data);
        $this->load->view('templates/footer');
    }

    function update($id)
    {
        $data['laporan'] = $this->Laporan->get_laporan_id($id);
        $data['siswa'] = $this->Siswa->get_siswa_by_nisn($data['laporan']['laporan_nisn']);
        $data['pelanggaran'] = $this->Laporan->get_laporan_by_id($id);
        $data['semuapelanggaran'] = $this->Pelanggaran->get_Pelanggaran();

        if (isset($_POST['update'])){
            $id_pelanggaran = $this->input->post('id_pelanggaran');
            $data_detail = array();
            for ($i = 0; $i < count($id_pelanggaran); $i++) {
                $data_detail[$i] = array(
                    'detail_laporan_id' => $id,
                    'detail_pelanggaran_id' => $id_pelanggaran[$i],
                );
            }
            var_dump($data_detail);
            $this->Laporan->create_laporan_detail($data_detail);
            $this->session->set_flashdata('alert', 'update_laporan');
            redirect('laporan/view/'.$id);
        }

        $this->load->view('templates/header');
        $this->load->view('laporan/update', $data);
        $this->load->view('templates/footer');
    }

    function ajaxSiswa($nisn)
    {
        $data = $this->Siswa->get_siswa_by_nisn($nisn);
        echo json_encode($data);
    }

    function cetak($id,$tingkat)
    {
        $data['laporan'] = $this->Laporan->get_laporan_id($id);
        $data['siswa'] = $this->Siswa->get_siswa_by_nisn($data['laporan']['laporan_nisn']);
        $data['pelanggaran'] = $this->Laporan->get_laporan_by_id($id);
        $data['tingkat'] = $tingkat;
        $this->load->view('templates/header');
        $this->load->view('laporan/cetak', $data);
        $this->load->view('templates/footer');
    }
}