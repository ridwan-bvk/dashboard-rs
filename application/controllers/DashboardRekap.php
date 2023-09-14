<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardRekap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('RekapModel');
	}

	public function Index()
	{
		$data['app_name'] = 'Dashboard App';
		$data['title'] = 'Rekap Monitoring Pasien';
		$data['data'] = $this->RekapModel->getdata('rekap_pendaftaran')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/rekap', $data);
		$this->load->view('templates/footer');
	}
}
