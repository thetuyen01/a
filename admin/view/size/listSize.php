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
    <h3 class="text-center">Danh sách Size</h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên size</th>
                    <th>Giá size</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (is_array($result)){
                        foreach($result as $index =>$item){
                            echo '
                            <tr>
                                <td>'.($index+1).'</td>
                                <td>'.$item['tensize'].'</td>
                                <td>'.$item['giasize'].' đ</td>
                                <td>
                                    <a type="button" href="index.php?action=size&method=edit&idsize='.$item['idsize'].'" class="btn btn-outline-primary">Sửa</a>
                                    <a type="button" href="index.php?action=size&method=delete&idsize='.$item['idsize'].'" class="btn btn-outline-danger">Xóa</a>
                                </td>
                            </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>