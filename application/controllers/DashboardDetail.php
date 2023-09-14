<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardDetail extends CI_Controller
{
    public function Index()
    {
        $data['app_name'] = 'Dashboard App';
        $data['title'] = 'Detail Monitoring Pasien';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail', $data);
        $this->load->view('templates/footer');
    }
}
