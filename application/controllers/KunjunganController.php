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

			redirect('kunjungan/laporan/'.$tahun);
		}
		$this->load->view('templates/header');
		$this->load->view('kunjungan/tahun');
		$this->load->view('templates/footer');
	}

	public function data_kunjungan()
	{
		if (isset($_POST['lihat'])) {
			$poli = $this->input->post('poli');
			$tahun = $this->input->post('tahun');

			redirect('data-kunjungan/'.$poli.'/'.$tahun);
		}
		$data = array(
			'poli' => $this->Model->get('poli')
		);
		$this->load->view('templates/header');
		$this->load->view('kunjungan/poli',$data);
		$this->load->view('templates/footer');
	}

	public function view($poli,$tahun)
	{
		$data = array(
			'poli' => $this->Model->first('poli','id_poli',$poli),
			'tahun' => $tahun,
			'kunjungan' => $this->Model->getKunjunganPoli($poli,$tahun)
		);
		$this->load->view('templates/header');
		$this->load->view('kunjungan/view',$data);
		$this->load->view('templates/footer');
	}

	public function create($poli,$tahun)
	{
		if (isset($_POST['simpan'])){
			$data = array(
				'id_user' => $this->session->userdata('session_id'),
				'id_poli' => $poli,
				'tahun' => $tahun,
				'bulan' => $this->input->post('bulan'),
				'jumlah_kunjungan' => $this->input->post('jumlah'),
			);
			$cekPoli = $this->Model->cekKunjunganPoli($tahun,$data['bulan'],$data['id_poli']);
			if (count($cekPoli) == 0){
				$this->Model->insert('kunjungan',$data);
				$this->session->set_flashdata('alert', 'insert');
				redirect('data-kunjungan/'.$poli.'/'.$tahun);
			}else{
				$this->session->set_flashdata('alert', 'month exist');
				redirect('data-kunjungan/'.$poli.'/'.$tahun);
			}
		}
		$data = array(
			'tahun' => $tahun,
			'poli' => $poli,
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
//				'id_poli' => $this->input->post('poli'),
//				'bulan' => $this->input->post('bulan'),
				'jumlah_kunjungan' => $this->input->post('jumlah'),
			);
			$this->Model->update('kunjungan','id_kunjungan',$id, $dataKunjungan);
			$this->session->set_flashdata('alert', 'update');
			redirect('data-kunjungan/'.$data['kunjungan']['id_poli'].'/'.$data['kunjungan']['tahun']);
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
		redirect('data-kunjungan/'.$data['id_poli'].'/'.$data['tahun']);
	}

	public function laporan($tahun){
		$data = array(
			'tahun' => $tahun,
			'kunjungan' => $this->Model->getKunjungan($tahun),
			'poli' => $this->Model->getPoli($tahun),
			'bulan' => array(
				'jan' => array(),
				'feb' => array(),
				'mar' => array(),
				'apr' => array(),
				'mei' => array(),
				'jun' => array(),
				'jul' => array(),
				'ags' => array(),
				'sep' => array(),
				'okt' => array(),
				'nov' => array(),
				'des' => array(),
			)
		);
		
		foreach ($data['kunjungan'] as $value){
			if ($value['bulan'] == 'Januari'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['jan'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'Februari'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['feb'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'Maret'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['mar'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'April'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['apr'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'Mei'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['mei'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'Juni'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['jun'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'Juli'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['jul'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'Agustus'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['ags'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'September'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['sep'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'Oktober'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['okt'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'November'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['nov'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}elseif ($value['bulan'] == 'Desember'){
				foreach ($data['poli'] as $datum) {
					if ($datum['nama_poli'] == $value['nama_poli']){
						$data['bulan']['des'] += array(
							$value['nama_poli'] => $value['jumlah_kunjungan']
						);
					}
				}
			}
		}

		$this->load->view('templates/header');
		$this->load->view('kunjungan/tahun',$data);
		$this->load->view('templates/footer');
	}
}
