<?php


class PoliController extends CI_Controller{
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
		$data['poli'] = $this->Model->get('poli','id_poli');
		$this->load->view('templates/header');
		$this->load->view('poli/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		if (isset($_POST['simpan'])) {
			$nama = $this->input->post('nama');
			$keterangan = $this->input->post('keterangan');

			$data = array(
				'id_user' => $this->session->userdata('session_id'),
				'nama_poli' => $nama,
				'status' => 'Aktif',
				'keterangan' => $keterangan,
			);
			$this->Model->insert('poli',$data);
			$this->session->set_flashdata('alert', 'insert');
			redirect('poli');
		} else {
			$this->load->view('templates/header');
			$this->load->view('poli/create');
			$this->load->view('templates/footer');
		}
	}

	public function update($id){
		$data['poli'] = $this->Model->first('poli','id_poli',$id);
		if (isset($_POST['update'])) {
			$nama = $this->input->post('nama');
			$keterangan = $this->input->post('keterangan');
			$status = $this->input->post('status');

			$data = array(
				'id_user' => $this->session->userdata('session_id'),
				'nama_poli' => $nama,
				'status' => $status,
				'keterangan' => $keterangan,
			);
			$this->Model->update('poli','id_poli',$id, $data);
			$this->session->set_flashdata('alert', 'update');
			redirect('poli');
		} else {
			$this->load->view('templates/header');
			$this->load->view('poli/update', $data);
			$this->load->view('templates/footer');
		}
	}

	public function delete($id){
		$this->Model->delete('poli','id_poli',$id);
		$this->session->set_flashdata('alert', 'delete');
		redirect('poli');
	}
}
