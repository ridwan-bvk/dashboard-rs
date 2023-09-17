<div class="card">

    <!-- /.card-header -->
    <div class="card-body">
        <!-- <form class="form-inline ">
            <div class="input-group input-daterange">
                <input type="text" class="form-control" value="2012-04-05">
                <div class="input-group-addon"> to </div>
                <input type="text" class="form-control" value="2012-04-19">
            </div>
        </form> -->
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Booking</th>
                    <th>waktu tunggu admisi</th>
                    <th>Rata -rata akhir waktu tunggu poli/mulai waktu layan polin</th>
                    <th>CSS grade</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($curl as $data1) :
                foreach ($data1 as $data2) :
                    if (is_array($data2) || is_object($data2)) {
                        foreach ($data2 as $value) :
            ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['kdppk'] ?></td>
                                    <td><?php
                                        $input = $value['waktu_task1'] / 1000;
                                        $date = strtotime($input);
                                        echo date('hh:mm:ss', $date);



                                        ?></td>
                                    <td><?= $value['avg_waktu_task4'] ?></td>
                                </tr>
                            </tbody>
            <?php
                        endforeach;
                    }
                endforeach;
            endforeach;
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