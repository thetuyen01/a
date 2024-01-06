<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Thêm vào mục Size</h1>
    <form method="post" action="index.php?action=size&method=add">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên size</label>
            <input type="text" name="tensize" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Giá size</label>
            <input type="text" name="giasize" class="form-control">
        </div>
        <button type="submit" name="dang" class="btn btn-primary">Đăng</button>
    </form>
</div>