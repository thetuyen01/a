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
    <h3 class="text-center">Danh sách Menu</h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID menu</th>
                    <th>Tên Menu</th>
                    <th>Tên Slug Menu</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (is_array($result)){
                        foreach($result as $item){
                            echo '
                            <tr>
                                <td>'.$item['idmenu'].'</td>
                                <td>'.$item['tenmenu'].'</td>
                                <td>'.$item['slug_menu'].'</td>
                                <td>
                                    <a type="button" href="index.php?action=menu&method=edit&idmenu='.$item['idmenu'].'" class="btn btn-outline-primary">Sửa</a>
                                    <a type="button" href="index.php?action=menu&method=delete&idmenu='.$item['idmenu'].'" class="btn btn-outline-danger">Xóa</a>
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