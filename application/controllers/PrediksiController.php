<?php


class PrediksiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');

		if (!$this->session->has_userdata('session_username')) {
			redirect(site_url('login'));
		}
	}

	public function index(){
		$dataKunjungan = $this->Model->get('kunjungan');
		$tahun = array();
		foreach ($dataKunjungan as $value) {
			array_push($tahun,$value['tahun']);
		}
		$data = array(
			'tahun' => 	max($tahun)+1
		);
		$this->load->view('templates/header');
		$this->load->view('prediksi/index', $data);
		$this->load->view('templates/footer');
	}

	public function praproses(){
		$dataPoli = $this->Model->get('poli');
		$dataKunjungan = $this->Model->get('kunjungan');
		$poli = array();
		foreach ($dataPoli as $key => $value) {
			if ($value['status'] == 'Aktif') {
				array_push($poli,array(
					'id_poli' => $value['id_poli'],
					'nama_poli' => $value['nama_poli'],
					'praproses' => array()
				));
			}
		}
		foreach ($dataKunjungan as $key => $value){
			foreach ($poli as $key2 => $value2){
				if ($value['id_poli'] == $value2['id_poli']){
					array_push($poli[$key2]['praproses'],
						 $value['jumlah_kunjungan']
					);
				}
			}
		}
		echo json_encode($poli);
	}

}
