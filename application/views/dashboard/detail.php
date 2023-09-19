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
                  if (is_array($data1) || is_object($data1)||(!empty($data1))) {
                   // if (is_iterable($data1)) {
                   
                    foreach ($data1 as $value) :
                        $value11 = "jeniskunjungan"; 
                        $index = array_search($value11, $data1);
                        print_r("Index : " . $index);
                        // if (is_iterable($value)) { 
                            // print_r($value);
                            // $value = implode(" ",$value);
                            // if (is_array($value) || is_object($value)||(!empty($value))) {
                                // print_r($value);
                            // exit;
                            // foreach ($value as $value1) :
                            // foreach ($value1 as $value2) :
                                // var_dump($value1);

                        // var_dump($value);
                    // print_r($data1[0]['nomorreferensi']);
                
                // print_r($data1);
                // print_r(count($data1));
                // foreach ($data1 as $data2) :
                    
                //         
                            // var_dump($data2['jeniskunjungan']);
                            // if (is_array($value) || is_object($value)||(!empty($value))) {
                            // foreach ($value as $value1) :
                            
                         
            ?>
                            <tbody>
                                <tr>
                                    <td><?php
                                    

                                    //  $data =  $value['kodebooking'];
                                    //  if (is_array($data) || is_object($data)||(!empty($data))) {
                                        echo $value['ispeserta'];
                                    //  }
                                    
                                   
                                    
                                    ?></td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                            </tbody>
            <?php
                        // endforeach;
                    // }
                    // endforeach;
                    // endforeach;
            // }
                endforeach;
             }
            endforeach;
            ?>
        </table>
    </div>
</div>