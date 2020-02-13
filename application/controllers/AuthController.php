<?php
/**
 * Created by PhpStorm.
 * User: jbenastey
 * Date: 26-Feb-19
 * Time: 21:52
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $model = array('User','Laporan');
        $this->load->model($model);
    }

    public function index()
    {
        $this->load->view('login/login');
    }

    public function login()
    {
        if ($this->session->has_userdata('session_username')) {
            $this->session->set_flashdata('alert', 'sudah_login');
            redirect(base_url());
        }
        if (isset($_POST['login'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = array(
                'user_nip_nisn' => $username,
                'user_pass' => md5($password)
            );

            $validate = $this->User->get_users($user)->num_rows();
            $admin = $this->User->get_user_account($user);
            $idAdmin = $admin['user_id'];
            $levelAdmin = $admin['user_hak_akses'];
            $namaAdmin = $admin['user_name'];
            $nipNisn = $admin['user_nip_nisn'];
            $data['levelPengguna'] = $admin['level'];
            if ($validate > 0) {
                $data_session = array(
                    'session_id' => $idAdmin,
                    'session_username' => $username,
                    'session_name' => $namaAdmin,
                    'session_status' => 'login',
                    'session_level' => $levelAdmin,
                    'session_nip_nisn' => $nipNisn
                );
                $this->session->set_flashdata('alert', 'success_login');
                $this->session->set_userdata($data_session);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('alert', 'gagalLogin');
                redirect(base_url('login'));
            }
        } else {
            $this->load->view('login/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function uploadBukti(){
    	if (isset($_POST['upload'])){
			$config['upload_path'] = './asset/image/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('buktiupload')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

				$data = array(
					'bukti_gambar' => $foto
				);

				$this->Laporan->upload_bukti($data);
				$this->session->set_flashdata('alert', 'upload_bukti');
				redirect('login');
			}
		}
	}

	public function lihat_bukti(){
		$data['bukti'] = $this->Laporan->get_bukti();
		$this->load->view('templates/header');
		$this->load->view('bukti/index', $data);
		$this->load->view('templates/footer');
	}
}
