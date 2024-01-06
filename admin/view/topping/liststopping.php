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
    <h3 class="text-center">Danh sách topping</h3>
    <div class="table-responsive">
        <div class="row m-3">
            <div class="col-9">

            </div>
            <div class="col-3">
                <form action="index.php?action=menu&method=get&search" class="row" method="post">
                    Tìm kiếm :<input type="text" name="search" placeholder="Nhập từ khóa"
                        class="form-control form-control-sm">
                    <input type="submit" name="timkiem" value="tìm kiếm">
                </form>
            </div>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên topping</th>
                    <th>Giá topping</th>
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
                                <td>'.$item['tentp'].'</td>
                                <td>'.$item['giatp'].'</td>
                                <td>
                                    <a type="button" href="index.php?action=topping&method=edit&idtopping='.$item['idtopping'].'" class="btn btn-outline-primary">Sửa</a>
                                    <a type="button" href="index.php?action=topping&method=delete&idtopping='.$item['idtopping'].'" class="btn btn-outline-danger">Xóa</a>
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