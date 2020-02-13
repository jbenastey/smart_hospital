<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa');
        if (!$this->session->has_userdata('session_username')) {
            redirect(site_url('login'));
        }
    }

    public function index()
    {
        $data['siswa'] = $this->Siswa->get_Siswa();
        $this->load->view('templates/header');
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['siswa'] = $this->Siswa->get_Siswa();
        if (isset($_POST)) {
            $NISN = $this->input->post('nisn');
            $Nama = $this->input->post('nama');
            $Alamat = $this->input->post('alamat');
            $Jurusan = $this->input->post('Jurusan');
            $Kelas = $this->input->post('Kelas');
            $Agama = $this->input->post('Agama');
            $JenisKelamin = $this->input->post('jeniskelamin');
            $NamaOrangtua = $this->input->post('namaorangtua');
            $AlamatOrangtua = $this->input->post('alamatortu');
            $NoHp = $this->input->post('hportu');

            $datasiswa = array(
                'siswa_nisn' => $NISN,
                'siswa_nama' => $Nama,
                'siswa_alamat' => $Alamat,
                'siswa_jurusan' => $Jurusan,
                'siswa_kelas' => $Kelas,
                'siswa_agama' => $Agama,
                'siswa_jenis_kelamin' => $JenisKelamin,
                'siswa_orang_tua' => $NamaOrangtua,
                'siswa_alamat_ortu' => $AlamatOrangtua,
                'siswa_nohp_ortu' => $NoHp,


            );
            $this->Siswa->create_Siswa($datasiswa);
            $this->session->set_flashdata('alert', 'create_siswa');
            redirect('siswa');

        } else {
            $this->load->view('templates/header');
            $this->load->view('siswa/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function update($nisn)

    {
        $data['siswa'] = $this->Siswa->get_siswa_by_nisn($nisn);
        if (isset($_POST) && count($_POST) > 0) {
            $NISN = $this->input->post('nisn');
            $Nama = $this->input->post('nama');
            $Alamat = $this->input->post('alamat');
            $Jurusan = $this->input->post('Jurusan');
            $Kelas = $this->input->post('Kelas');
            $Agama = $this->input->post('Agama');
            $JenisKelamin = $this->input->post('jeniskelamin');
            $NamaOrangtua = $this->input->post('namaorangtua');
            $AlamatOrangtua = $this->input->post('alamatortu');
            $NoHp = $this->input->post('hportu');

            $datasiswa = array(
                'siswa_nisn' => $NISN,
                'siswa_nama' => $Nama,
                'siswa_alamat' => $Alamat,
                'siswa_jurusan' => $Jurusan,
                'siswa_kelas' => $Kelas,
                'siswa_agama' => $Agama,
                'siswa_jenis_kelamin' => $JenisKelamin,
                'siswa_orang_tua' => $NamaOrangtua,
                'siswa_alamat_ortu' => $AlamatOrangtua,
                'siswa_nohp_ortu' => $NoHp,
            );
            $this->Siswa->update_siswa($nisn, $datasiswa);
            $this->session->set_flashdata('alert', 'update_siswa');
            redirect('siswa');

        } else {
            $this->load->view('templates/header');
            $this->load->view('siswa/update', $data);
            $this->load->view('templates/footer');

        }

    }

    public function hapus($nisn)
    {
        $this->Siswa->hapus_siswa($nisn);
        $this->session->set_flashdata('alert', 'hapus_siswa');
        redirect('siswa');
    }

    public function view($nisn)
    {
        $data['siswa'] = $this->Siswa->get_siswa_by_nisn($nisn);
        $this->load->view('templates/header');
        $this->load->view('siswa/view', $data);
        $this->load->view('templates/footer');
    }
}

	