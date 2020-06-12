<?php

require 'vendor/autoload.php';

class PrediksiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		$this->load->helper('tgl_indo_helper');

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

	public function cetak(){
		$nama = json_decode($this->input->post('nama'));
		$hasil = json_decode($this->input->post('hasil'));
		$ket = json_decode($this->input->post('ket'));
		$saran = json_decode($this->input->post('saran'));

		$prediksi = array();

		foreach ($nama as $key=>$value) {
			array_push($prediksi,array(
				'nama' => $value,
				'hasil' => $this->cekMinus($hasil[$key]),
				'ket' => $ket[$key],
				'saran' => $saran[$key],
			));
		}

		$dompdf = new Dompdf\Dompdf();

		$path = FCPATH.'asset/image/bengkalis.jpeg';
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$foto = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($foto);

		$html = '';
		$html .= '
			<div>
				<img src="'.$base64.'" width="100" height="140" style="float:left; margin-right: -110px"/>
				<h3 style="text-align: center; margin-bottom: -10px">PEMERINTAH KABUPATEN BENGKALIS</h3>
				<h3 style="text-align: center; margin-bottom: -10px">RUMAH SAKIT UMUM DAERAH</h3>
				<h3 style="text-align: center; margin-bottom: -10px">KECAMATAN MANDAU</h3>
				<h4 style="text-align: center; margin-bottom: -10px">Jl. Stadion No.10 Telp. (0765) 696380 Fax. (0765) 696348</h4>
				<h4 style="text-align: center">D U R I - 28884 email. rsud.mandau@bengkaliskab.go.id</h4>
				<hr>
			</div>
			<div>
				<h4 style="text-align: center">Hasil Prediksi Jumlah Kunjungan Pasien Rawat Jalan Bulan '. bulan(date('m')).' '. date('Y') .'</h4>
				<table cellspacing="0" border="1" width="100%" style="text-align: center">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Poli</th>
						<th>Hasil Prediksi</th>
						<th>Keterangan</th>
						<th>Saran</th>
					</tr>
					</thead>
					<tbody>';
					foreach ($prediksi as $key=>$value) {
					$html.='<tr>
						<td>'.($key+1).'</td>
						<td>'.$value['nama'].'</td>
						<td>'.round($value['hasil']).'</td>
						<td>'.$value['ket'].'</td>
						<td>'.$value['saran'].'</td>
						</tr>';
					}
					$html.='</tbody>
				</table>
			</div>
			';

		$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
		$dompdf->render();

// Output the generated PDF to Browser
		$dompdf->stream('Hasil Prediksi Jumlah Kunjungan Pasien Rawat Jalan' ,array('Attachment'=>0));
	}

	function cekMinus($Y) {
		$hasil = 0;
		if ($Y < 0) {
			$hasil = 0;
		} else {
			$hasil = $Y;
		}
		return $hasil;
	}
}
