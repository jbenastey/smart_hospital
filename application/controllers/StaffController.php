<?php


class StaffController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');

		if (!$this->session->has_userdata('session_username')) {
			redirect(site_url('login'));
		}
	}

	public function index()
	{
		$data['staff'] = $this->Model->get('user','id_user');
		$this->load->view('templates/header');
		$this->load->view('staff/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		if (isset($_POST['simpan'])) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('username')),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'alamat' => $this->input->post('alamat'),
				'jenis_pengguna' => 'Staff RM',
				'status' => 'Aktif',
			);
			$this->Model->insert('user',$data);
			$this->session->set_flashdata('alert', 'insert');
			redirect('staff');
		} else {
			$this->load->view('templates/header');
			$this->load->view('staff/create');
			$this->load->view('templates/footer');
		}
	}

	public function update($id){
		$data['staff'] = $this->Model->first('user','id_user',$id);
		if (isset($_POST['update'])) {
			$data = array(
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'alamat' => $this->input->post('alamat'),
				'status' => $this->input->post('status'),
			);
			$this->Model->update('user','id_user',$id, $data);
			$this->session->set_flashdata('alert', 'update');
			redirect('staff');
		} else {
			$this->load->view('templates/header');
			$this->load->view('staff/update', $data);
			$this->load->view('templates/footer');
		}
	}

	public function delete($id){
		$this->Model->delete('user','id_user',$id);
		$this->session->set_flashdata('alert', 'delete');
		redirect('staff');
	}
}
