<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardDetail extends CI_Controller
{
    public function __construct()

    
    {
        parent::__construct();
        $this->load->model('Rekapmodel');
    }
    public function Index()
    {
        $api_data_antrian = $this->Rekapmodel->getdata_dashboard_antrian_tgl('2023-09-15');
        $data['app_name'] = 'Dashboard App';
        $data['title'] = 'Detail Monitoring Antrian';
        $data['status'] = 'detail';
        $data['curl'] = $api_data_antrian;
        // var_dump($api_data_antrian);
        // exit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail', $data);
        $this->load->view('templates/footer');
    }
}
