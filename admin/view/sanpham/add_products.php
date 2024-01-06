<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Thêm sản phẩm</h1>
    <form method="post" action="index.php?action=sanpham&method=add" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên sản phẩm</label>
            <input type="text" name="tensp" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Giá sản phẩm</label>
            <input type="number" name="giasp" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Mô tả sản phẩm</label>
            <input type="text" name="mtasp" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Thuộc menu : </label>
            <select name="menu" class="form-select" aria-label="Default select example">
                <?php 
                    if(is_array($result_dmmenu)){
                        foreach($result_dmmenu as $item){
                            echo '
                                <option value="'.$item['id'].'">'.$item['ten_dmmenu'].'</option>
                            ';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Topping : </label>
            <select name="topping[]" class="form-select" aria-label="Default select example" multiple>
                <?php 
                    if(is_array($result_topping)){
                        foreach($result_topping as $item){
                            echo '
                            <option value="'.$item['idtopping'].'">'.$item['tentp'].' + '.$item['giatp'].' đ</option>
                            ';
                        }
                    }
                    
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Ảnh : </label>
            <select name="anh[]" class="form-select" aria-label="Default select example" multiple>
                <?php 
                    if(is_array($result_hinh)){
                        foreach($result_hinh as $item){
                            echo '
                                <option value="'.$item['id'].'">'.$item['ten'].'</option>
                            ';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Size : </label>
            <select name="size[]" class="form-select" aria-label="Default select example" multiple>
                <?php 
                    if(is_array($result_size)){
                        foreach($result_size as $item){
                            echo '
                                <option value="'.$item['idsize'].'">'.$item['tensize'].' + '.$item['giasize'].' đ</option>
                            ';
                        }
                    }
                    
                ?>
            </select>
        </div>
        <button type="submit" name="dang" class="btn btn-primary">Đăng</button>
    </form>
</div>