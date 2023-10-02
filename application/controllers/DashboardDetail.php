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

        $button = $this->input->post('btn_retrieve', true);
        if (isset($button)) {
            $tgl_input = $this->input->post('tgl_input', true);
            $tgl_input = date("Y-m-d", strtotime($tgl_input));
            if (!empty($tgl_input)) {
                $api_data_antrian = $this->Rekapmodel->getdata_dashboard_antrian_tgl($tgl_input);
                if (empty ($api_data_antrian['response'] )){
                    $api_data_antrian = '';
                }
            } else {
                $api_data_antrian = $this->Rekapmodel->getdata_dashboard_antrian_tgl(date('Y-m-d'));
            }
        } else {
            $api_data_antrian = '';
        }

       
        $data['app_name'] = 'Dashboard App';
        $data['title'] = 'Detail Monitoring Antrian';
        $data['status'] = 'detail';

        $data['curl'] = $api_data_antrian;
        $data['status'] = 'detail';
        // var_dump($api_data_antrian);
        // exit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail', $data);
        $this->load->view('templates/footer');
    }
}
