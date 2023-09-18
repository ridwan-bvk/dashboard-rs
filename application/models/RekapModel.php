<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rekapmodel extends CI_Model
{
    function getdata_curl($tgl)
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
            CURLOPT_POSTFIELDS => array('tanggal' => $tgl, 'waktu' => 'rs'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $api_data = json_decode($response, true);
        // var_dump($api_data);
        // exit;
        return $api_data;
    }

    function getdata_curl_perbulan($bulan, $tahun)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://simrs.rsukotabanjar.co.id/ws-rsubanjar/dashboardperbln',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('bulan' => $bulan, 'tahun' => $tahun, 'waktu' => 'rs'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $api_data_prbulan = json_decode($response, true);
        return $api_data_prbulan;
    }

    function getdata_dashboard_antrian_tgl($tgl)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://simrs.rsukotabanjar.co.id/ws-rsubanjar/antrianpertanggal',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('tanggal' => $tgl),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $api_data_antrian = json_decode($response, true);
        return $api_data_antrian;
    }
}
