<div class="card">
    <div class="card-header">
        <form action="<?= base_url('DashboardRekap/rekap_persentase_sep') ?>" method='POST' onsubmit="Loading()" name="myForm" class="form-inline">
            <div class="input-group input-group-sm mb-1 col-sm-4">
                <div class="input-group-prepend ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Bulan</span>
                </div>
                <!-- <select id="input_bulan" name="databulan" class="form-control">
                    <option value='01' <?php if ($databulan == "01") {
                                            echo 'Selected';
                                        } ?>>Januari</option>
                    <option value="02" <?php if ($databulan == "02") {
                                            echo 'Selected';
                                        } ?>>Februari</option>
                    <option value="03" <?php if ($databulan == "03") {
                                            echo 'Selected';
                                        } ?>>Maret</option>
                    <option value="04" <?php if ($databulan == "04") {
                                            echo 'Selected';
                                        } ?>>April</option>
                    <option value="05" <?php if ($databulan == "05") {
                                            echo 'Selected';
                                        } ?>>Mei</option>
                    <option value="06" <?php if ($databulan == "06") {
                                            echo 'Selected';
                                        } ?>>Juni</option>
                    <option value="07" <?php if ($databulan == "07") {
                                            echo 'Selected';
                                        } ?>>Juli</option>
                    <option value="08" <?php if ($databulan == "08") {
                                            echo 'Selected';
                                        } ?>>Agustus</option>
                    <option value="09" <?php if ($databulan == "09") {
                                            echo 'Selected';
                                        } ?>>September</option>
                    <option value="10" <?php if ($databulan == "10") {
                                            echo 'Selected';
                                        } ?>>Oktober</option>
                    <option value="11" <?php if ($databulan == "11") {
                                            echo 'Selected';
                                        } ?>>November</option>
                    <option value="12" <?php if ($databulan == "12") {
                                            echo 'Selected';
                                        } ?>>Desember</option>

                </select> -->
                <select id="input_bulan" name="databulan" class="form-control">
                    <?php
                    $currentMonth = date('m'); // Mengambil bulan saat ini dalam format dua digit (misalnya "01" untuk Januari)
                    if (!isset($databulan)) {
                        $databulan =  $currentMonth; // Nilai default saat halaman pertama kali dimuat
                    }
                    $months = array(
                        '01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'Mei',
                        '05' => 'Juni',
                        '06' => 'Juli',
                        '07' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember',

                    );

                    foreach ($months as $monthCode => $monthName) {
                        $selected = ($databulan == $monthCode) ? 'selected' : '';
                        echo "<option value='$monthCode' $selected>$monthName</option>";
                    }
                    ?>
                </select>

                <div class="input-group-prepend ml-5">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Tahun</span>
                </div>
                <!-- <select id="input_tahun" name="datatahun" class="form-control">
                    <option <?php if ($datatahun == "2023") {
                                echo 'Selected';
                            } ?>>2023</option>
                    <option <?php if ($datatahun == "2019") {
                                echo 'Selected';
                            } ?>>2019</option>
                    <option <?php if ($datatahun == "2020") {
                                echo 'Selected';
                            } ?>>2020</option>
                    <option <?php if ($datatahun == "2021") {
                                echo 'Selected';
                            } ?>>2021</option>
                    <option <?php if ($datatahun == "2022") {
                                echo 'Selected';
                            } ?>>2022</option>
                    <option <?php if ($datatahun == "2023") {
                                echo 'Selected';
                            } ?>>2023</option>
                    <option <?php if ($datatahun == "2024") {
                                echo 'Selected';
                            } ?>>2024</option>
                    <option <?php if ($datatahun == "2025") {
                                echo 'Selected';
                            } ?>>2025</option>
                    <option <?php if ($datatahun == "2026") {
                                echo 'Selected';
                            } ?>>2026</option>
                    <option <?php if ($datatahun == "2027") {
                                echo 'Selected';
                            } ?>>2027</option>
                    <option <?php if ($datatahun == "2028") {
                                echo 'Selected';
                            } ?>>2028</option>
                    <option <?php if ($datatahun == "2029") {
                                echo 'Selected';
                            } ?>>2029</option>
                    <option <?php if ($datatahun == "2030") {
                                echo 'Selected';
                            } ?>>2030</option>

                </select> -->
                <select id="input_tahun" name="datatahun" class="form-control">
                    <?php
                    $currentYear = date('Y');
                    if (!isset($datatahun)) {
                        $datatahun = $currentYear; // Nilai default saat halaman pertama kali dimuat
                    }
                    $startYear = 2019; // Tahun awal
                    $endYear = $currentYear; // Tahun akhir

                    for ($year = $startYear; $year <= $endYear; $year++) {
                        $selected = ($datatahun == $year) ? 'selected' : '';
                        echo "<option value='$year' $selected>$year</option>";
                    }
                    ?>

                </select>

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
                    <th>Tanggal</th>
                    <th>Jumlah Antrian Online</th>
                    <th>Jumlah SEP</th>
                    <th>Persentase SEP</th>


                </tr>
            </thead>
            <tbody>
                <?php
                global $total_antrol, $total_sep, $persentase;
                if (!empty($curl)) {
                    $no = 1;
                    $total_antrol = 0;
                    $total_sep = 0;
                    if (is_array($curl) || is_object($curl)) {
                        foreach ($curl as $value) :

                ?>
                            <tr>
                                <td></td>
                                <td><?= $value['Tanggal'] ?></td>
                                <td><?= $value['JumlahAntrol'] ?></td>
                                <td><?= $value['JumlahSEP'] ?></td>
                                <td><?php
                                    if (($value['JumlahSEP'] > 0) && ($value['JumlahAntrol'] > 0)) {
                                        $persentase = round($value['JumlahAntrol'] / $value['JumlahSEP']  * 100, 1) . ' %';
                                    } else {
                                        $persentase = 0;
                                    }
                                    echo $persentase;
                                    ?>
                                </td>

                            </tr>
                <?php

                            $total_antrol = $total_antrol + $value['JumlahAntrol'];
                            $total_sep = $total_sep +  $value['JumlahSEP'];


                        endforeach;
                    }
                }
                ?>
            </tbody>
            <tr class="table-info">
                <td> Jumlah Antrian</td>
                <td></td>
                <td><?= empty($total_antrol) ? 0 : $total_antrol ?></td>
                <td><?= empty($total_sep) ? 0 : $total_sep  ?></td>
                <td><?php
                    $persentase = 0;
                    if (($total_antrol > 0) && ($total_sep > 0)) {
                        $persentase = round($total_antrol / $total_sep  * 100, 1) . ' %';
                    } else {
                        $persentase = 0;
                    }
                    echo $persentase;
                    ?>
                </td>

            </tr>
            <!-- <tfoot>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Bridging</th>
                    <th>Jumlah SEP</th>
                    <th>Persentase</th>
                </tr>
            </tfoot> -->
        </table>
    </div>
    <!-- /.card-body -->
</div>


<div id="accordion">

    <div class="card">
        <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                Keterangan Task
            </a>
        </div>
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-borderless">
                    <thead>
                        <!-- <tr> -->
                        <!-- <th></th>
                            <th></th>
                            <th></th> -->
                        <!-- </tr> -->
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <dl>
                                    <dt>
                                        <p class="font-weight-bold">Jumlah Antrian Online :</p>
                                    </dt>
                                    <dd>
                                        <p class="font-italic"> Diambil dari server BPJS terkait antrian online.</p>
                                    </dd>
                                </dl>
                            </td>
                            <td>
                                <dl>
                                    <dt>
                                        <p class="font-weight-bold">Jumlah SEP :</p>
                                    </dt>
                                    <dd>
                                        <p class="font-italic"> Diambil dari server SIMRS yang berhasil buat SEP di aplikasi SIMRS.</p>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
