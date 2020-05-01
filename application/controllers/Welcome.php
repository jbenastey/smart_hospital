<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Model');
        if (!$this->session->has_userdata('session_username')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
    	$prediksi = $this->Model->get('poli');
    	$tahun = $this->Model->tahun();
    	$data = array(
    		'prediksi' => 0,
			'tahun' => count($tahun)
		);
		foreach ($prediksi as $value) {
			if ($value['status'] == 'Aktif'){
				$data['prediksi']++;
			}
    	}
        $this->load->view('templates/header');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
    }
}
