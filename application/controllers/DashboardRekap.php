<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardRekap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rekapmodel');
	}

	public function Index()
	{
		$tgl_input = $this->input->post('tgl_input', true);
		$button = $this->input->post('btn_retrieve', true);
		
		
		if (isset($button)) {
			
			echo $button;
			echo '$tgl_input';

			$tgl_input = $this->input->post('tgl_input', true);
			if (!empty($tgl_input)) {


				// echo substr($tgl_input, 0, 4);
				// echo substr($tgl_input, 5, 2);
				// die($tgl_input);
				// die($tgl_input);
				$api_data = $this->Rekapmodel->getdata_curl($tgl_input);

				if (!empty($api_data) || !empty($api_data['response'])) {

					if (is_array($api_data) || is_object($api_data)) {
						$totalantrean = $this->Rekapmodel->jml_antrean_tgl($api_data);
					}
				} else {
					$totalantrean = 0;
				}
			} else {
				$api_data =  $this->Rekapmodel->getdata_curl(date('Y-m_d'));
				$totalantrean = 0;
			}
		} else {
			$api_data = '';
			$totalantrean = 0;
		}



		$data['app_name'] = 'Dashboard App';
		$data['title'] = 'Dashboard Monitoring Pertanggal';
		$data['curl'] = $api_data;
		$data['total_antrean'] = $totalantrean;
		$data['status'] = 'rekap';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/rekap', $data);
		$this->load->view('templates/footer');
	}

	public function rekap_perbulan()
	{
		$button = $this->input->post('btn_retrieve', true);
		if (isset($button)) {
			$bulan = $this->input->post('databulan', true);
			$tahun = $this->input->post('datatahun', true);

			if (!empty($bulan) || !empty($tahun)) {
				// echo 'ini bulan : ' . $bulan;
				// echo 'ini tahun : ' . $tahun;
				// $tahun =  substr($tgl_input, 0, 4);
				// $bulan =  substr($tgl_input, 5, 2);
				// die($tgl_input);
				// die($tgl_input);
				$apidata_prbln = $this->Rekapmodel->getdata_curl_perbulan($bulan, $tahun);

				// $totalAntreanbln = array_reduce($apidata_prbln['response'], function ($carry, $item) {
				// 	return array([$carry + $item['jumlah_antrean']]);
				// }, 0);
				// echo ($totalAntrean);
				if (!empty($apidata_prbln)) {
					if (is_array($apidata_prbln) || is_object($apidata_prbln)) {
						$totalAntrean =  $this->Rekapmodel->jml_antrean_bln($apidata_prbln);
					}
				} else {
					$totalAntrean = 0;
				}
			} else {
				// $tgl = date('d-m-Y');

				$tahun =   date('Y');
				$bulan =   date('m');
				// echo $tahun;
				$apidata_prbln = $this->Rekapmodel->getdata_curl_perbulan($tahun, $bulan);;
				$totalAntrean = 0;
			}
		} else {
			$apidata_prbln['response'] = '';
			$totalAntrean = 0;
		}

		$data['app_name'] = 'Dashboard App';
		$data['title'] = 'Dashboard Monitoring Perbulan';
		$data['curl'] = $apidata_prbln['response'];
		$data['total_antrean'] = $totalAntrean;
		$data['status'] = 'rekap';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/rekap_perbulan', $data);
		$this->load->view('templates/footer');
	}

	public function rekap_persentase_sep()
	{
		$button = $this->input->post('btn_retrieve', true);
		if (isset($button)) {
			$bulan = $this->input->post('databulan', true);
			$tahun = $this->input->post('datatahun', true);
			if (!empty($bulan) || !empty($tahun)) {

				$apidata_persrentase_sep = $this->Rekapmodel->getdata_persentasesep($tahun, $bulan);
			} else {
				$tahun =   date('Y');
				$bulan =   date('m');
				$apidata_papidata_persrentase_seprbln = $this->Rekapmodel->getdata_persentasesep($tahun, $bulan);;
				$totalAntrean = 0;
			}
		} else {
			$apidata_persrentase_sep['response'] = '';
			$totalAntrean = 0;
		}
		$data['app_name'] = 'Dashboard App';
		$data['title'] = 'Dashboard Rekap Persentase SEP';
		$data['curl'] = $apidata_persrentase_sep['response'];
		// $data['total_antrean'] = $totalAntrean;
		$data['status'] = 'rekap';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/rekap_persentase_sep', $data);
		$this->load->view('templates/footer');
	}
}
