<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Thêm vào mục danh mục hình</h1>
    <form method="post" action="index.php?action=dmhinh&method=add" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên danh mục hình</label>
            <input type="text" name="tendmhinh" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Ảnh danh mục hình</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" name="dang" class="btn btn-primary">Đăng</button>
    </form>
</div>