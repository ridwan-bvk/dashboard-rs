<div class="card">
    <div class="card-header">
        <form action="<?= base_url('DashboardDetail/index') ?>" method='POST' onsubmit="return validateForm()" name="myForm">
            <div class="input-group input-group-sm mb-1 col-sm-4">
                <div class="input-group-prepend ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal</span>
                </div>
                <!-- <input type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" d="tgldata" name="tgl_input" value="<?php echo date('Y-m-d'); ?>" required oninvalid="this.setCustomValidity('Tanggal harus diisi.')"> -->
                <input type="text" class="form-control datepicker" data-date-end-date="0d" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="tgl_input" value="<?php
                                                                                                                                                                                $tgl_input = $this->input->post('tgl_input', true);
                                                                                                                                                                                if (isset($tgl_input)) {
                                                                                                                                                                                    echo date("d-m-Y", strtotime($tgl_input));
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo date('d-m-Y');
                                                                                                                                                                                }
                                                                                                                                                                                ?>" required oninvalid="this.setCustomValidity('Tanggal harus diisi.')" readonly>


                <button type="submit" class="btn btn-primary btn-sm ml-2" id="btn_retrieve" name="btn_retrieve">Retrieve</button>
            </div>
        </form>
        <div class="d-flex justify-content-center">
            <div id="loading" class="spinner-border text-primary" role="status">
            </div>
        </div>
        <!-- <h3 class="card-title">DataTable with default features</h3> -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="table-primary">
                    <th id="rowNumber">No</th>
                    <th>No RM</th>
                    <th>Jenis Kunjungan</th>
                    <th>No Referensi</th>
                    <th>KD Booking(s)</th>
                    <th>NIK</th>
                    <th>No kapst</th>
                    <th>No. antrean</th>
                    <th>Poli</th>
                    <th>Sumber Data</th>
                    <th>Estimasi Dilayani</th>
                    <th>Dokter</th>
                    <th>Jam Praktek</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($curl) || (!isset($curl))) {
                    $no = 1;
                    foreach ($curl['response'] as $item) {
                ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['norekammedis']; ?></td>
                            <td><?php
                                $jnsknjngn =  $item['jeniskunjungan'];
                                switch ($jnsknjngn) {
                                    case '1':
                                        echo 'Rujukan FKTP';
                                        break;
                                    case '2':
                                        echo 'Rujukan Internal';
                                        break;
                                    case '3':
                                        echo 'Rujukan Antar RS';
                                        break;
                                    case '4':
                                        echo 'Rujukan RS';
                                        break;
                                }

                                ?></td>
                            <td><?= $item['nomorreferensi']; ?></td>
                            <td><?= $item['kodebooking']; ?></td>
                            <td><?= $item['nik']; ?></td>
                            <td><?= $item['nokapst']; ?></td>
                            <td><?= $item['noantrean']; ?></td>
                            <td>
                                <?php
                                if (($data_poli !== null) && (is_array($data_poli) || is_object($data_poli))) {
                                    $kode_poli = $item['kodepoli'];
                                    foreach ($data_poli as $data) {

                                        if (isset($data['KDPOLI']) && ($data['KDPOLI'] == $kode_poli)) {
                                            $nama_poli = $data['NMPOLI'];
                                            echo "$nama_poli";
                                            break;
                                        }
                                    }
                                } else {
                                    $item['kodepoli'];
                                }


                                ?>
                            </td>
                            <td><?= $item['sumberdata']; ?> </td>
                            <td><?php
                                $timestamp = $item['estimasidilayani'];
                                $timezone = 'Asia/Jakarta'; // Zona waktu GMT+07:00

                                // Mengatur zona waktu default
                                date_default_timezone_set($timezone);

                                $date_string = date('H:i:s', round($timestamp / 1000)); // Bagi dengan 1000 untuk mengonversi dari milidetik ke detik
                                echo $date_string;

                                // $input = $item['estimasidilayani'];
                                // echo  gmdate('H:i:s', $input);
                                ?>
                            </td>

                            <td>
                                <?php

                                $kdDppj = $item['kodedokter'];
                                if (($data_dpjp !== null) && (is_array($data_dpjp) || is_object($data_dpjp))) {


                                    foreach ($data_dpjp as $dpjpitem) {
                                        if ($dpjpitem['KDDPJP'] == $kdDppj) {
                                            echo $dpjpitem['NMDPJP'];
                                            break;
                                        }
                                    }
                                } else {
                                    echo $kdDppj;
                                }
                                ?>
                            </td>
                            <td><?= $item['jampraktek']; ?> </td>
                            <td><?= $item['tanggal']; ?> </td>

                        </tr>

                <?php

                    }
                }
                ?>
            </tbody>

            <!-- <tfoot>
                <tr class="table-primary">
                    <th>No</th>
                    <th>No RM</th>
                    <th>Jenis Kunjungan</th>
                    <th>No Referensi</th>
                    <th>KD Booking(s)</th>
                    <th>nik</th>
                    <th>no kapst</th>
                    <th>noantrean</th>
                    <th>kodepoli</th>
                    <th>sumberdata</th>
                    <th>estimasi dilayani</th>
                    <th>kode dokter</th>
                    <th>jam praktek</th>
                    <th>tanggal</th>
                </tr>
            </tfoot> -->
        </table>
    </div>
    <!-- /.card-body -->
</div>