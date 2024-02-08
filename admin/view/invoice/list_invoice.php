<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <?php 
        if(isset($_COOKIE['update_msg'])){
            echo '
            <div class="alert alert-success" role="alert">
                '.$_COOKIE['update_msg'].'
            </div>
            ';
        }
    ?>
    <h3 class="text-center">Danh sách hóa đơn</h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Tổng tiền</th>
                    <th>Ngày lập hóa đơn</th>
                </tr>

            </thead>
            <tbody>
                <?php 
                    if (is_array($result)){
                        foreach($result as $index=>$item){
                            $ab = "";
                            foreach($tinhtrang as $in=>$ite){
                                if($in == $item['tinhtrang']){
                                    $ab.='<option value="'.$in.'" selected>'.$ite.'</option>';
                                }else{
                                    $ab.='<option value="'.$in.'" >'.$ite.'</option>';
                                }
                            }
;                            echo '
                            <tr>
                                <td>'.($index+1).'</td>
                                <td>'.$item['idhoadon'].'</td>
                                <td>'.$item['tenuser'].'</td>
                                <td>'.$item['diachi'].'</td>
                                <td >
                                    <form action="index.php?action=invoice&method=edit&idinvoice='.$item['idhoadon'].'" method="POST">
                                        <select class="form-select" name="tinhtrang" aria-label="Default select example">
                                            '.$ab.'
                                        </select>
                                        <button type="submit" name="capnhat" class="mt-2 btn-primary">Cập nhật</button>
                                    </form>
                                </td>
                                <td >'.$item['tongtien'].'</td>
                                <td >'.$item['ngaylaphd'].'</td>
                            </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>