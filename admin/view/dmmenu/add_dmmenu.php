<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Thêm vào mục danh mục menu</h1>
    <form method="post" action="index.php?action=dmmenu&method=add" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên danh mục menu</label>
            <input type="text" name="tendmmenu" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Ảnh danh mục menu</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Thuộc menu : </label>
            <select name="menu" class="form-select" aria-label="Default select example">
                <?php 
                    if(is_array($result)){
                        foreach($result as $item){
                            echo '
                                <option value="'.$item['idmenu'].'">'.$item['tenmenu'].'</option>
                            ';
                        }
                    }
                    
                ?>
            </select>
        </div>
        <button type="submit" name="dang" class="btn btn-primary">Đăng</button>
    </form>
</div>