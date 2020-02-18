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
		$model = array('User');
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
				'username' => $username,
				'password' => md5($password)
			);

			$validate = $this->User->get_users($user)->num_rows();
			$admin = $this->User->get_user_account($user);
			if ($validate > 0) {
				$data_session = array(
					'session_id' => $admin['id_user'],
					'session_username' => $admin['username'],
					'session_name' => $admin['nama'],
					'session_status' => 'login',
					'session_level' => $admin['jenis_pengguna'],
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
}
