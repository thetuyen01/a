<div class="container" style="margin-top: 200px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Địa chỉ nhận hàng</th>
                <th scope="col">Chi tiết đơn hàng</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày lập hóa đơn</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if ($history){
                    foreach($history as $index => $item){
                        echo '
                            <tr>
                                <th scope="row">'.$index.'</th>
                                <td>#'.$index.'</td>
                                <td>'.$item['diachi'].'</td>
                                <td><a href="index.php?action=detailhistory&idhistory='.$item['idhoadon'].'">...</a></td>
                                <td>$'.$item['tongtien'].'</td>
                                <td>'.$item['ngaylaphd'].'</td>
                            </tr>
                        ';
                    }
                }
            ?>


            <tr>
                <th scope="row">1</th>
                <td>#7893</td>
                <td>Xuân lộc 1</td>
                <td><a href="">...</a></td>
                <td>$160.000</td>
                <td>27/07/2023</td>
            </tr>
        </tbody>
    </table>
</div>