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
        <div data-mdb-input-init class=" mb-4">
            <label class="form-label" for="customFile">Chọn ảnh menu</label>
            <input type="file" name="images[]" multiple="multiple" class="form-control" id="customFile" />
        </div>
        <ul id="imageListContainer"></ul>
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
<script>
$(document).ready(function() {
    // Xử lý sự kiện chọn file
    $('input[name="images[]"]').change(function() {
        // Lấy danh sách các tệp đã chọn
        var files = $(this)[0].files;

        // Hiển thị ảnh đã chọn
        showSelectedImages(files);
    });

    // Hàm hiển thị ảnh đã chọn
    function showSelectedImages(files) {
        // Lấy phần tử chứa danh sách ảnh đã chọn
        var imageListContainer = $('#imageListContainer');

        // Xóa nội dung cũ
        imageListContainer.empty();

        // Hiển thị ảnh đã chọn
        $.each(files, function(index, file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Tạo phần tử img để hiển thị ảnh
                var image = $('<img>').attr('src', e.target.result);

                // Thêm ảnh vào danh sách
                imageListContainer.append(image);
            };

            // Đọc tệp tin hình ảnh
            reader.readAsDataURL(file);
        });
    }
});
</script>