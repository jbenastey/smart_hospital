<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelanggaranController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggaran');

        if (!$this->session->has_userdata('session_username')) {
            redirect(site_url('login'));
        }
    }

    public function index()
    {
        $data['pelanggaran'] = $this->Pelanggaran->get_Pelanggaran();
        $this->load->view('templates/header');
        $this->load->view('pelanggaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function index2($bentuk)
    {
        $data['pelanggaran'] = $this->Pelanggaran->get_bentuk_pelanggaran($bentuk);
        $this->load->view('templates/header');
        $this->load->view('pelanggaran/index', $data);
        $this->load->view('templates/footer');
    }


    public function create()
    {
        $data['pelanggaran'] = $this->Pelanggaran->get_Pelanggaran();
        if (isset($_POST)) {
            $Bentukpelanggaran = $this->input->post('bentukpelanggaran');
            $Poin = $this->input->post('poin');
            $Keterangan = $this->input->post('keterangan');

            $datapelanggaran = array(
                'pelanggaran_bentuk' => $Bentukpelanggaran,
                'pelanggaran_poin' => $Poin,
                'pelanggaran_keterangan' => $Keterangan,
            );
            $this->Pelanggaran->create_Pelanggaran($datapelanggaran);
            $this->session->set_flashdata('alert', 'Tambahpelanggaran');
            redirect('pelanggaran');

        } else {
            $this->load->view('templates/header');
            $this->load->view('pelanggaran/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function update($id)
    {
        $data['pelanggaran'] = $this->Pelanggaran->get_pelanggaran_by_id($id);
        if (isset($_POST) && count($_POST) > 0) {
            $Bentukpelanggaran = $this->input->post('bentukpelanggaran');
            $Poin = $this->input->post('poin');
            $Keterangan = $this->input->post('keterangan');

            $datapelanggaran = array(
                'pelanggaran_bentuk' => $Bentukpelanggaran,
                'pelanggaran_poin' => $Poin,
                'pelanggaran_keterangan' => $Keterangan,
            );
            $this->Pelanggaran->update_pelanggaran($id, $datapelanggaran);
            $this->session->set_flashdata('alert', 'update_pelanggaran');
            redirect('pelanggaran');
        } else {
            $this->load->view('templates/header');
            $this->load->view('pelanggaran/update', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapus($id)
    {
        $this->Pelanggaran->hapus_pelanggaran($id);
        $this->session->set_flashdata('alert', 'delete_pelanggaran');
        redirect('pelanggaran');
    }
}

	