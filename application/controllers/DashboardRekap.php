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

		if (!empty($tgl_input)) {

			// echo substr($tgl_input, 0, 4);
			// echo substr($tgl_input, 5, 2);
			// die($tgl_input);
			// die($tgl_input);
			$api_data = $this->Rekapmodel->getdata_curl($tgl_input);
		} else {
			$api_data =  $this->Rekapmodel->getdata_curl(date('Y-m_d'));
		}

		$data['app_name'] = 'Dashboard App';
		$data['title'] = 'Dashboard Monitoring Pertanggal';
		$data['curl'] = $api_data;
		$data['status'] = 'rekap';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/rekap', $data);
		$this->load->view('templates/footer');
	}

	public function rekap_perbulan()
	{
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
		} else {
			// $tgl = date('d-m-Y');

			// $tahun =  substr($tgl, 0, 4);
			// $bulan =  substr($tgl, 5, 2);
			// echo $tahun;
			$apidata_prbln = $this->Rekapmodel->getdata_curl_perbulan('01', '2023');;
		}

		$data['app_name'] = 'Dashboard App';
		$data['title'] = 'Dashboard Monitoring Perbulan';
		$data['curl'] = $apidata_prbln;
		$data['status'] = 'rekap';
		// $data['data'] = $this->RekapModel->getdata_curl_perbulan(''
		// var_dump($apidata_prbln);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/rekap_perbulan', $data);
		$this->load->view('templates/footer');
	}
}
