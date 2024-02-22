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
                //   

        if (count($data) > 0) {
            $totalAntrean = 0;
            if (isset($data['response']['list'])) {
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
            CURLOPT_POSTFIELDS => array('tahun' => $tahun, 'bulan' => $bulan, 'waktu' => 'rs'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $api_prsnts_sep = json_decode($response, true);

        return $api_prsnts_sep;
        // echo $response;
    }

    function getpoli()
    {
        $file_path = FCPATH . 'assets/db/master_refpoli.txt'; //appath
        // echo $file_path;
        // base_url('master_refpoli.txt');//tidak bisa karena url
        // echo getcwd();

        if (file_exists($file_path)) {
            $file_contents = file_get_contents($file_path);
            // $file_contents = file($file_path, FILE_IGNORE_NEW_LINES);
            $datapoli = $file_contents; //str_replace("'", "\"", $file_contents);
            $datapoli = json_decode($datapoli, true);
        } else {
            $datapoli = '';
        }
        // print_r($datapoli);
        return  $datapoli;
    }

    function getDPJP()
    {
        $filepathdpjp = FCPATH . 'assets/db/master_dpjp.txt';
        if (file_exists($filepathdpjp)) {
            $file_contents = file_get_contents($filepathdpjp);
            $dataDPJP = json_decode($file_contents, true);
        } else {
            $dataDPJP = '';
        }
        // var_dump($dataDPJP);
        return $dataDPJP;
    }
}
