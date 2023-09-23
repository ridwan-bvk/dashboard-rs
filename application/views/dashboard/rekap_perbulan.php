<div class="card">
    <div class="card-header">
        <form action="<?= base_url('DashboardRekap/rekap_perbulan') ?>" method='POST' onsubmit="return validateForm()" name="myForm" class="form-inline">
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
                    <th>PPK</th>
                    <th>Poli</th>
                    <th>Jumlah Antrian</th>
                    <th scope="col">Waktu Task 1</th>
                    <th scope="col">Waktu Task 2</th>
                    <th scope="col">Waktu Task 3</th>
                    <th scope="col">Waktu Task 4</th>
                    <th scope="col">Waktu Task 5</th>
                    <th scope="col">Waktu Task 6</th>
                    <th scope="col">Rata-rata Task 1</th>
                    <th scope="col">Rata-rata Task 2</th>
                    <th scope="col">Rata-rata Task 3</th>
                    <th scope="col">Rata-rata Task 4</th>
                    <th scope="col">Rata-rata Task 5</th>
                    <th scope="col">Rata-rata Task 6</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($curl)) {
                    $no = 1;
                    if (is_array($curl) || is_object($curl)) {
                        foreach ($curl as $value) :


                ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nmppk'] ?></td>
                                <td><?= $value['namapoli'] ?></td>
                                <td><?= $value['jumlah_antrean'] ?></td>
                                <td><?php
                                    $input = round($value['waktu_task1']);
                                    echo  gmdate('H:i:s', $input);

                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['waktu_task2']);
                                    echo  gmdate('H:i:s', $input);

                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['waktu_task3']);
                                    echo  gmdate('H:i:s', $input);

                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['waktu_task4']);
                                    echo  gmdate('H:i:s', $input);

                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['waktu_task5']);
                                    echo  gmdate('H:i:s', $input);

                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['waktu_task6']);
                                    echo  gmdate('H:i:s', $input);

                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['avg_waktu_task1']);
                                    echo  gmdate('H:i:s', $input);
                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['avg_waktu_task2']);
                                    echo  gmdate('H:i:s', $input);
                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['avg_waktu_task3']);
                                    echo  gmdate('H:i:s', $input);
                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['avg_waktu_task4']);
                                    echo  gmdate('H:i:s', $input);
                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['waktu_task5']);
                                    echo  gmdate('H:i:s', $input);
                                    ?>
                                </td>
                                <td><?php
                                    $input = round($value['avg_waktu_task6']);
                                    echo  gmdate('H:i:s', $input);
                                    ?>
                                </td>
                            </tr>
                <?php

                        endforeach;
                    }
                }
                ?>
            </tbody>
            <tr class="table-info">
                <td colspan="3"> Jumlah Antrian</td>
                <td><?= $total_antrean ?> </td>
                <?php for ($i = 1; $i <= 12; $i++) { ?>
                    <td></td>
                <?php };
                ?>
            </tr>
            <tfoot>
                <tr class="table-primary">
                    <th>No</th>
                    <th>PPK</th>
                    <th>Poli</th>
                    <th>Jumlah Antrian</th>
                    <th scope="col">Waktu Task 1</th>
                    <th scope="col">Waktu Task 2</th>
                    <th scope="col">Waktu Task 3</th>
                    <th scope="col">Waktu Task 4</th>
                    <th scope="col">Waktu Task 5</th>
                    <th scope="col">Waktu Task 6</th>
                    <th scope="col">Rata-rata Task 1</th>
                    <th scope="col">Rata-rata Task 2</th>
                    <th scope="col">Rata-rata Task 3</th>
                    <th scope="col">Rata-rata Task 4</th>
                    <th scope="col">Rata-rata Task 5</th>
                    <th scope="col">Rata-rata Task 6</th>
                </tr>
            </tfoot>
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
        <div id="collapseOne" class="collapse" data-parent="#accordion">
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
                                    <dt>Task 1</dt>
                                    <dd>- mulai waktu tunggu admisi</dd>
                                    <dt>Task 2</dt>
                                    <dd>- akhir waktu tunggu admisi/mulai waktu layan admisi</dd>
                                    <dt>Task 3</dt>
                                    <dd>- akhir waktu layan admisi/mulai waktu tunggu poli</dd>
                                </dl>
                            </td>
                            <td>
                                <dl>
                                    <dt>Task 4</dt>
                                    <dd>- akhir waktu tunggu poli/mulai waktu layan poli</dd>
                                    <dt>Task 5</dt>
                                    <dd>- akhir waktu layan poli/mulai waktu tunggu farmasi</dd>
                                    <dt>Task 6</dt>
                                    <dd>- akhir waktu tunggu farmasi/mulai waktu layan farmasi membuat obat</dd>
                                </dl>
                            </td>
                            <td>
                                <dl>
                                    <dt>Task 7</dt>
                                    <dd>- akhir waktu obat selesai dibuat</dd>
                                    <dt>Task 99</dt>
                                    <dd>- tidak hadir/batal</dd>

                                </dl>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>