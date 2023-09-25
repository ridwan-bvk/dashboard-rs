<div class="card">
    <div class="card-header">
        <form action="<?= base_url('DashboardDetail/index') ?>" method='POST' onsubmit="return validateForm()" name="myForm">
            <div class="input-group input-group-sm mb-1 col-sm-4">
                <div class="input-group-prepend ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal</span>
                </div>
                <input type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" d="tgldata" name="tgl_input" value="<?php echo date('Y-m-d'); ?>" required oninvalid="this.setCustomValidity('Tanggal harus diisi.')">
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
            </thead>
            <tbody>
                <?php
                if (!empty($curl)) {
                    $no = 1;
                    foreach ($curl['response'] as $item) {
                ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['norekammedis']; ?></td>
                            <td><?php
                            $jnsknjngn =  $item['jeniskunjungan'];
                            switch  ($jnsknjngn){
                                case '1':
                                    echo 'Rujukan FKTP';
                                   break;
                                case '2':
                                    echo 'Rujukan Internal';
                                    break;
                                case '3':
                                    echo 'Rujukan Antar RS';
                                break;

                            }
                            
                            ?></td>
                            <td><?= $item['nomorreferensi']; ?></td>
                            <td><?= $item['kodebooking']; ?></td>
                            <td><?= $item['nik']; ?></td>
                            <td><?= $item['nokapst']; ?></td>
                            <td><?= $item['noantrean']; ?></td>
                            <td><?= $item['kodepoli']; ?> </td>
                            <td><?= $item['sumberdata']; ?> </td>
                            <td><?php
                                $input = $item['estimasidilayani'];
                                echo  gmdate('H:i:s', $input);
                                ?>
                            </td>

                            <td><?= $item['kodedokter']; ?> </td>
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