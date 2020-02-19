<?php


class KunjunganController extends CI_Controller
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
		if (isset($_POST['lihat'])) {
			$tahun = $this->input->post('tahun');

			redirect('kunjungan/view/'.$tahun);
		}
		$this->load->view('templates/header');
		$this->load->view('kunjungan/tahun');
		$this->load->view('templates/footer');
	}

	public function view($tahun)
	{
		$data = array(
			'tahun' => $tahun,
			'kunjungan' => $this->Model->getKunjungan($tahun)
		);
		$this->load->view('templates/header');
		$this->load->view('kunjungan/view',$data);
		$this->load->view('templates/footer');
	}

	public function create($tahun)
	{
		if (isset($_POST['simpan'])){
			$data = array(
				'id_user' => $this->session->userdata('session_id'),
				'id_poli' => $this->input->post('poli'),
				'tahun' => $tahun,
				'bulan' => $this->input->post('bulan'),
				'jumlah_kunjungan' => $this->input->post('jumlah'),
			);
			$cekPoli = $this->Model->cekKunjunganPoli($tahun,$data['bulan'],$data['id_poli']);
			if (count($cekPoli) == 0){
				$this->Model->insert('kunjungan',$data);
				$this->session->set_flashdata('alert', 'insert');
				redirect('kunjungan/view/'.$tahun);
			}else{
				$this->session->set_flashdata('alert', 'month exist');
				redirect('kunjungan/view/'.$tahun);
			}
		}
		$data = array(
			'tahun' => $tahun,
			'poli' => $this->Model->get('poli','id_poli'),
		);

		$this->load->view('templates/header');
		$this->load->view('kunjungan/create',$data);
		$this->load->view('templates/footer');
	}

	public function update($id){
		$data['kunjungan'] = $this->Model->first('kunjungan','id_kunjungan',$id);
		$data['poli'] = $this->Model->get('poli','id_poli');
		if (isset($_POST['update'])) {
			$dataKunjungan = array(
				'id_poli' => $this->input->post('poli'),
				'bulan' => $this->input->post('bulan'),
				'jumlah_kunjungan' => $this->input->post('jumlah'),
			);
			$this->Model->update('kunjungan','id_kunjungan',$id, $dataKunjungan);
			$this->session->set_flashdata('alert', 'update');
			redirect('kunjungan/view/'.$data['kunjungan']['tahun']);
		} else {
			$this->load->view('templates/header');
			$this->load->view('kunjungan/update', $data);
			$this->load->view('templates/footer');
		}
	}

	public function delete($id){
		$data = $this->Model->first('kunjungan','id_kunjungan',$id);
		$this->Model->delete('kunjungan','id_kunjungan',$id);
		$this->session->set_flashdata('alert', 'delete');
		redirect('kunjungan/view/'.$data['tahun']);
	}
}
