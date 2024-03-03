<div class="container" style="margin-top: 200px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Địa chỉ nhận hàng</th>
                <th scope="col">Chi tiết đơn hàng</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Tình trạng đơn hàng</th>
                <th scope="col">Ngày lập hóa đơn</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if ($history){
                    $trangthai = ["1"=>"Đang sử lý", "2"=>"Đang vận chuyển", "3"=>"Đang trên đường duy chuyển","4","Đã giao thành công"];
                    foreach($history as $index => $item){
                        echo '
                            <tr>
                                <th scope="row">'.($index+1).'</th>
                                <td>#'.$item['idhoadon'].'</td>
                                <td>'.$item['diachi'].'</td>
                                <td><a href="index.php?action=detailhistory&idhistory='.$item['idhoadon'].'">...</a></td>
                                <td>$'.$item['tongtien'].'</td>
                                <td>'.$trangthai[$item['tinhtrang']].'</td>
                                <td>'.$item['ngaylaphd'].'</td>
                            </tr>
                        ';
                    }
                }
            ?>
        </tbody>
    </table>
</div>