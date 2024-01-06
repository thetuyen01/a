<div class="container" style="margin-top: 200px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Image</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Topping & size</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">Ngày mua</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                if ($cthd){
                    $total = 0;
                    foreach($cthd as $index => $item){
                        echo '
                            <tr>
                                <th scope="row">'.($index+1).'</th>
                                <td >
                                <img style="height: 100px; width: 100px;"
                                src="http://localhost/project/public/media/upload_img/'.$item['images'].'" />
                                </td>
                                <td>'.$item['tensp'].'</td>
                                <td>'.$item['topping_size'].'</td>
                                <td>x'.$item['soluong'].'</td>
                                <td>$'.$item['thanhtien'].'</td>
                                <td>'.$item['ngaylaphd'].'</td>
                            </tr>
                        ';
                        $total+=(int)$item['thanhtien'];
                    }
                }
            ?>

            <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td>Tổng tiền : </td>
                <td>$<?php echo $total?>.000</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>