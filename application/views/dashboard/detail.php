<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($curl as $data1) :

                foreach ($data1 as $data2) :
                    if (is_array($data2) || is_object($data2)) {
                        foreach ($data2 as $value) :
                            var_dump($value['nomorreferensi']);
                            exit;
            ?>
                            <tbody>
                                <tr>
                                    <td><?= $value['nomorreferensi'] ?></td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
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