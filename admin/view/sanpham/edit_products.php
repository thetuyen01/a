<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Edit sản phẩm</h1>
    <form method="post" action="index.php?action=sanpham&method=edit&idsanpham=<?php echo $_GET['idsanpham']?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên sản phẩm</label>
            <input type="text" name="tensp" value="<?php echo $arr['sanpham'][0]['tensp']?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Giá sản phẩm</label>
            <input type="number" name="giasp" value="<?php echo $arr['sanpham'][0]['giasp']?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Mô tả sản phẩm</label>
            <input type="text" name="mtasp" value="<?php echo $arr['sanpham'][0]['mota']?>" class="form-control">
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
        <div data-mdb-input-init class=" mb-4">
            <label class="form-label" for="customFile">Chọn ảnh San pham</label>
            <input type="file" name="images[]" multiple="multiple" class="form-control" id="customFile" />
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
        <button type="submit" name="capnhat" class="btn btn-primary">Đăng</button>
    </form>
</div>