<div class="card">
    <div class="card-header">
        <form action="<?= base_url('DashboardRekap/rekap_persentase_sep') ?>" method='POST' onsubmit="return validateForm()" name="myForm" class="form-inline">
            <div class="input-group input-group-sm mb-1 col-sm-4">
                <div class="input-group-prepend ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Bulan</span>
                </div>
                <select id="input_bulan" name="databulan" class="form-control">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>

                </select>

                <div class="input-group-prepend ml-5">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Tahun</span>
                </div>
                <select id="input_tahun" name="datatahun" class="form-control">
                    <option selected>2023</option>
                    <option>2019</option>
                    <?php for ($i = 0; $i <= 9; $i++) { ?>
                        <option>><?= '202' . $i ?></option>
                    <?php } ?>
                    <?php for ($i = 0; $i <= 9; $i++) { ?>
                        <option><?= '203' . $i ?></option>
                    <?php } ?>

                </select>
                <button type="submit" class="btn btn-primary btn-sm ml-2" id="btn_retrieve" name="btn_retrieve">Retrieve</button>
            </div>
        </form>
        <!-- <h3 class="card-title">DataTable with default features</h3> -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Bridging</th>
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
                                <td><?= $no++ ?></td>
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
            <tfoot>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Bridging</th>
                    <th>Jumlah SEP</th>
                    <th>Persentase</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>