<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rekapmodel extends CI_Model
{
    function getdata_curl($tgl)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => url_api . 'dashboardpertgl',
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
            CURLOPT_URL => url_api . 'dashboardperbln',
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
            CURLOPT_URL => url_api . 'antrianpertanggal',
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

    function jml_antrean_tgl($data)
    {
        // {     "metaData": {"code": "200", "message": "OK" },       
        //     "response": { "list": [   { "jumlah_antrean": 2,},] }
        // }
        // foreach ($list as $item) {
        // 	$totalAntrean += $item['jumlah_antrean'];
        // }
        //     $list = $data['response']['list'];
        //     // var_dump($list);
        //     $totalAntrean = array_reduce($list, function ($carry, $item) {
        //     return $carry + $item['jumlah_antrean'];
        // }, 0);


        if (count($data) > 0) {
            $totalAntrean = 0;
            if (count($data['response']['list']) > 0) {
                foreach ($data['response']['list'] as $item) {

                    if (!isset($item['jumlah_antrean'])) {
                        $item['jumlah_antrean'] = 0;
                    }
                    $totalAntrean = $totalAntrean + $item['jumlah_antrean'];
                }
            }
        } else {

            $totalAntrean = 0;
        }
        return $totalAntrean;
    }

    function jml_antrean_bln($data_list)
    {
        // {     "metaData": {"code": "200", "message": "OK" },       
        //     "response":  [   { "jumlah_antrean": 2,},] 
        // }
        // $list = $data_list['response'];

        // $totalAntreanbln = array_reduce($list, function ($carry, $item) {
        //     return $carry + $item['jumlah_antrean'];
        // }, 0);
        // var_dump($data_list);
        // $jumlahAntreanArray = array_column($data_list['response'], 'jumlah_antrean');
        // $totalAntrean = array_sum($jumlahAntreanArray);
        if (count($data_list) > 0) {
            $totalAntrean = 0;

            $totalAntrean = array_reduce($data_list['response'], function ($carry, $item) {
                return $carry + $item['jumlah_antrean'];
            }, 0);
            // foreach ($data_list['response'] as $item) {
            //     // $totalAntrean = $totalAntrean + $item['jumlah_antrean'];
            // }
        } else {
            $totalAntrean = 0;
        }


        return $totalAntrean;
    }
    function getdata_persentasesep($tahun, $bulan)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => url_api . 'persenantrolsep',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('tahun' => '2023', 'bulan' => '09', 'waktu' => 'rs'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $api_prsnts_sep = json_decode($response, true);

        return $api_prsnts_sep;
        // echo $response;
    }
}
