<!-- 1 (mulai waktu tunggu admisi), 
                2 (akhir waktu tunggu admisi/mulai waktu layan admisi), 
                3 (akhir waktu layan admisi/mulai waktu tunggu poli), 
                4 (akhir waktu tunggu poli/mulai waktu layan poli),  
                5 (akhir waktu layan poli/mulai waktu tunggu farmasi), 
                6 (akhir waktu tunggu farmasi/mulai waktu layan farmasi membuat obat), 
                7 (akhir waktu obat selesai dibuat),
                99 (tidak hadir/batal) -->
<div class="card">

    <!-- /.card-header -->
    <div class="card-body">
        <!-- <div class="row row-cols-4">
        <form action="<?= base_url('DashboardRekap/index') ?>" method='POST' onsubmit="return validateForm()" name="myForm">
            <div class="form-row align-items-center">
                <div class="col-auto ">
                    <input type="date" class="form-control date" id="tgldata" name="tgl_input" value="<?php echo date('Y-m-d'); ?>" required oninvalid="this.setCustomValidity('Tanggal harus diisi.')">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2" id="btn_retrieve">Retrieve</button>
                </div>
            </div>
        </form>
    </div> -->
        <form action="<?= base_url('DashboardRekap/rekap_perbulan') ?>" method='POST' onsubmit="return validateForm()" name="myForm">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="input_bulan">Bulan</label>
                    <select id="input_bulan" name="databulan" class="form-control">
                        <?php for ($i = 1; $i <= 9; $i++) { ?>
                            <option><?= '0' . $i ?></option>
                        <?php } ?>

                        <!-- <option>2</option> -->
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="input_tahun">Tahun</label>
                    <select id="input_tahun" name="datatahun" class="form-control">
                        <?php for ($i = 5; $i <= 9; $i++) { ?>
                            <option><?= '201' . $i ?></option>
                        <?php } ?>
                        <?php for ($i = 0; $i <= 9; $i++) { ?>
                            <option><?= '202' . $i ?></option>
                        <?php } ?>
                        <!-- <option>2</option> -->
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2" id="btn_retrieve">Retrieve</button>
                </div>
            </div>
        </form>
        <table id="example1" class="table table-bordered table-striped table-responsive">
            <!-- class="table table-bordered table-striped"> -->
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Kode PPK</th>
                    <th scope="col">Nama PPK</th>
                    <th scope="col">Poli</th>
                    <th scope="col">Jumlah Antrian</th>
                    <th scope="col">Waktu Tunggu Admisi</th>
                    <th scope="col">Rata-rata akhir tunggu poli (mulai waktu layan poli)</th>
                    <th scope="col">Akhir Layan Admisi (mulai waktu tunggu poli)</th>
                    <th scope="col">Rata-Rata akhir waktu tunggu farmasi(mulai waktu layan farmasi membuat obat)</th>
                    <th scope="col">akhir waktu layan poli(mulai waktu tunggu farmasi)</th>
                    <th scope="col">akhir waktu tunggu admisi/mulai waktu layan admisi</th>
                    <th scope="col">mulai waktu tunggu admisi</th>


                </tr>
            </thead>
            <?php
            if (!empty($curl)) {
                $no = 1;
                foreach ($curl as $data1) :
                    if (is_array($data1) || is_object($data1)) {
                        foreach ($data1 as $data2) :
                            if (is_array($data2) || is_object($data2)) {
                                foreach ($data2 as $value) :
            ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value['kdppk'] ?></td>
                                            <td><?= $value['nmppk'] ?></td>
                                            <td><?= $value['namapoli'] ?></td>
                                            <td><?= $value['jumlah_antrean'] ?></td>
                                            <td><?php
                                                $input = round($value['waktu_task1']);
                                                echo  gmdate('H:i:s', $input);

                                                ?>
                                            </td>
                                            <td><?php
                                                $input = round($value['avg_waktu_task4']);
                                                echo  gmdate('H:i:s', $input);
                                                ?>
                                            </td>
                                            <td><?php
                                                $input = round($value['avg_waktu_task3']);
                                                echo  gmdate('H:i:s', $input);
                                                ?>
                                            </td>
                                            <td><?php
                                                $input = round($value['avg_waktu_task6']);
                                                echo  gmdate('H:i:s', $input);
                                                ?>
                                            </td>
                                            <td><?php
                                                $input = round($value['avg_waktu_task5']);
                                                echo  gmdate('H:i:s', $input);
                                                ?>
                                            </td>
                                            <td><?php
                                                $input = round($value['avg_waktu_task2']);
                                                echo  gmdate('H:i:s', $input);
                                                ?>
                                            </td>
                                            <td><?php
                                                $input = round($value['avg_waktu_task1']);
                                                echo  gmdate('H:i:s', $input);
                                                ?>
                                            </td>



                                    </tbody>
            <?php
                                endforeach;
                            }
                        endforeach;
                    }
                endforeach;
            }
            ?>
        </table>
    </div>
</div>

<!-- <script>
var url = 'https://simrs.rsukotabanjar.co.id/ws-rsubanjar/dashboardpertgl';
var formData = new FormData();
formData.append('tanggal', '2023-09-15');
formData.append('waktu', 'rs');


fetch(url, {
    method: 'POST',
    body: formData
})
.then(function(response) {
    return response.json();
})
.then(function(body) {
    // console.log(body);
    document.cookie = 'data' + body;
});
</script> -->