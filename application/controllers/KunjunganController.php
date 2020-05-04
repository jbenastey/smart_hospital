<?php

require 'vendor/autoload.php';

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

	public function cetak($tahun){
		$dompdf = new Dompdf\Dompdf();

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

		$path = FCPATH.'asset/image/bengkalis.jpeg';
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$foto = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($foto);

		$html = '';
		$html .= '
			<div>
				<img src="'.$base64.'" width="110" height="150" style="float:left; margin-right: -110px"/>
				<h3 style="text-align: center; margin-bottom: -10px">PEMERINTAH KABUPATEN BENGKALIS</h3>
				<h3 style="text-align: center; margin-bottom: -10px">RUMAH SAKIT UMUM DAERAH</h3>
				<h3 style="text-align: center; margin-bottom: -10px">KECAMATAN MANDAU</h3>
				<h4 style="text-align: center; margin-bottom: -10px">Jl. Stadion No.10 Telp. (0765) 696380 Fax. (0765) 696348</h4>
				<h4 style="text-align: center">D U R I - 28884 email. rsud.mandau@bengkaliskab.go.id</h4>
				<hr>
			</div>
			<div>
				<h4 style="text-align: center;">JUMLAH KUNJUNGAN RAWAT JALAN RSUD KEC. MANDAU TAHUN '.$tahun.'</h4>
				<table cellspacing="0" border="1" width="100%" style="text-align: center">
				<thead class="text-center">
					<tr>
						<th rowspan="2" width="2%">No</th>
						<th rowspan="2">Bulan</th>
						<th colspan="'.count($data['poli']).'">Poliklinik</th>
						<th rowspan="2">Jumlah</th>
					</tr>
					<tr>';
						$jumlahPoli = array();
						foreach ($data['poli'] as $key => $value):
							$jumlahPoli += array(
								$value['nama_poli'] => 0
							);
							$html.='<th>'. $value['nama_poli'].'</th>';
						endforeach;
					$html .= '</tr>
					</thead>
					<tbody>
					<tr>
						<td>1</td>
						<td>Januari</td>';
						$jumlah = 0;
						$jumlahKunjungan = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['jan'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['jan'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['jan'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Februari</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['feb'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['feb'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['feb'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Maret</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['mar'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['mar'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['mar'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>4</td>
						<td>April</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['apr'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['apr'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['apr'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Mei</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['mei'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['mei'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['mei'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>6</td>
						<td>Juni</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['jun'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['jun'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['jun'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>7</td>
						<td>Juli</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['jul'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['jul'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['jul'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>8</td>
						<td>Agustus</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['ags'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['ags'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['ags'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>9</td>
						<td>September</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['sep'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['sep'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['sep'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>10</td>
						<td>Oktober</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['okt'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['okt'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['okt'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>11</td>
						<td>November</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['nov'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['nov'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['nov'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					<tr>
						<td>12</td>
						<td>Desember</td>';
						$jumlah = 0;
						foreach ($data['poli'] as $key => $value):
							$html.='<td>'. $data['bulan']['des'][$value['nama_poli']].'</td>';
							$jumlah += $data['bulan']['des'][$value['nama_poli']];
							$jumlahPoli[$value['nama_poli']] += $data['bulan']['des'][$value['nama_poli']];
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<td>'. $jumlah .'</td>
					</tr>
					</tbody>
					<tfoot>
					<tr class="text-center">
						<th colspan="2">Total</th>';
						foreach ($data['poli'] as $key => $value):
							$html.='<th>'.$jumlahPoli[$value['nama_poli']] .'</th>';
						endforeach;
						$jumlahKunjungan += $jumlah;
						$html.='<th>'.$jumlahKunjungan.'</th>
					</tr>
					</tfoot>
				</table>
			</div>
			';
		$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
		$dompdf->render();

// Output the generated PDF to Browser
		$dompdf->stream('JUMLAH KUNJUNGAN RAWAT JALAN RSUD KEC. MANDAU TAHUN '.$tahun,array('Attachment'=>0));
	}
}
