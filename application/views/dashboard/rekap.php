<div class="card">
    <div class="card-header">
        <form action="<?= base_url('DashboardRekap/index/') ?>" method='POST' onsubmit="Loading()" name="myForm" id='formparameter'>
            <div class="input-group input-group-sm mb-1 col-sm-4">
                <div class="input-group-prepend ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal</span>
                </div>
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
        <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead>
                <tr class="table-primary">
                    <th id="rowNumber">No</th>
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
                    foreach ($curl as $data1) :
                        if (is_array($data1) || is_object($data1)) {
                            foreach ($data1 as $data2) :
                                if (is_array($data2) || is_object($data2)) {
                                    foreach ($data2 as $value) :
                ?>
                                        <tr>
                                            <td></td>
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

                            endforeach;
                        }

                    endforeach;
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
            <!-- <tfoot>
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