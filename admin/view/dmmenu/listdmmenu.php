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
    <h3 class="text-center">Danh sách danh mục menu</h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID menu</th>
                    <th>Tên danh mục menu</th>
                    <th>Tên Slug Menu</th>
                    <th>Ảnh danh mục menu</th>
                    <th>Thuộc loại menu</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (is_array($result)){
                        foreach($result as $index => $item){
                            echo '
                            <tr>
                                <td>'.$index.'</td>
                                <td>'.$item['ten_dmmenu'].'</td>
                                <td>'.$item['slug_dmmenu'].'</td>
                                <td><img height="100" width="100" src="http://localhost/project/public/media/upload_img/'.$item['images'].'" alt=""></td>
                                <td>'.$item['tenmenu'].'</td>
                                <td>
                                    <a type="button" href="index.php?action=dmmenu&method=edit&id_dmmenu='.$item['id'].'" class="btn btn-outline-primary">Sửa</a>
                                    <a type="button" href="index.php?action=dmmenu&method=delete&id_dmmenu='.$item['id'].'" class="btn btn-outline-danger">Xóa</a>
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