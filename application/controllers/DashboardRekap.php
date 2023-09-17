<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardRekap extends CI_Controller
{

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	// $this->load->model('RekapModel');
	// }

	public function Index()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://simrs.rsukotabanjar.co.id/ws-rsubanjar/dashboardpertgl',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('tanggal' => '2023-09-15', 'waktu' => 'rs'),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$api_data = json_decode($response, true);
		// echo $response;
		// print_r($api_data);


		$data['app_name'] = 'Dashboard App';
		$data['title'] = 'Rekap Monitoring Pasien';
		$data['curl'] = $api_data;
		// $data['data'] = $this->RekapModel->getdata('rekap_pendaftaran')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/rekap', $data);
		$this->load->view('templates/footer');
	}
}