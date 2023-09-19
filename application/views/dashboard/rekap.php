<div class="card">

    <!-- /.card-header -->
    <div class="card-body">
        <!-- <div class="container mr-0"> -->
        <div class="row row-cols-4">
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
        </div>
        <!-- </div> -->
        <table id="example1" class="table table-bordered table-striped">
            <!-- class="table table-bordered table-striped"> -->
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Kode PPK</th>
                    <th scope="col">Poli</th>
                    <th scope="col">Jumlah Antrian</th>
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
                    <!-- <th scope="col">akhir waktu layan poli(mulai waktu tunggu farmasi)</th>
                    <th scope="col">akhir waktu tunggu admisi/mulai waktu layan admisi</th>
                    <th scope="col">mulai waktu tunggu admisi</th> -->


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

    <table class="table">
        <thead class="thead-light">
            <tr class="colspan">
                <th scope="col">Keterangan</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Keterangan</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>task1</td>
                <td> 1 (mulai waktu tunggu admisi)</td>

            </tr>
            <tr>
                <th scope="row">2</th>
                <td>task2</td>
                <td> 2 (akhir waktu tunggu admisi/mulai waktu layan admisi)</td>

            </tr>
            <tr>
                <th scope="row">3</th>
                <td>task2</td>
                <td> 3 (akhir waktu layan admisi/mulai waktu tunggu poli)</td>

            </tr>
            <tr>
                <th scope="row">4</th>
                <td>task2</td>
                <td> 4 (akhir waktu tunggu poli/mulai waktu layan poli)</td>

            </tr>

        </tbody>
    </table>

</div>
<script>
    function validateForm() {

        var x = document.forms["myForm"]["fname"].value;
        console.log('ada');
        if (x == null) {
            console.log('ada');
            alert("Name must be filled out");
            return false;
        }
    }
</script>

<!-- 1 (mulai waktu tunggu admisi), 
                2 (akhir waktu tunggu admisi/mulai waktu layan admisi), 
                3 (akhir waktu layan admisi/mulai waktu tunggu poli), 
                4 (akhir waktu tunggu poli/mulai waktu layan poli),  
                5 (akhir waktu layan poli/mulai waktu tunggu farmasi), 
                6 (akhir waktu tunggu farmasi/mulai waktu layan farmasi membuat obat), 
                7 (akhir waktu obat selesai dibuat),
                99 (tidak hadir/batal) -->
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