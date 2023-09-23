<div class="card">
    <div class="row row-cols-4">
        <form action="<?= base_url('DashboardDetail/index') ?>" method='POST' onsubmit="return validateForm()" name="myForm">
            <div class="form-row align-items-center">
                <div class="col-auto ">
                    <input type="date" class="form-control date" id="tgldata" name="tgl_input" value="<?php echo date('Y-m-d'); ?>" required oninvalid="this.setCustomValidity('Tanggal harus diisi.')">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2" id="btn_retrieve">Retrieve</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Kunjungan</th>
                    <th>No Referensi</th>
                    <th>KD Booking(s)</th>
                    <th>No RM</th>
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
            <?php
            if (!empty($curl)) {
                $no = 1;
                foreach ($curl['response'] as $item) {
            ?>
                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['jeniskunjungan'] ?></td>
                            <td><?= $item['nomorreferensi']; ?></td>
                            <td><?= $item['kodebooking']; ?></td>
                            <td><?= $item['norekammedis']; ?></td>
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
                    </tbody>
            <?php

                }
            }
            ?>
        </table>
    </div>
</div>