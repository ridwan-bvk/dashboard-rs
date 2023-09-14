<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Booking</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($data as $dt) : ?>
                <tbody>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $dt->kd_booking ?>
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>