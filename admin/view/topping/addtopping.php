<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Thêm vào mục topping</h1>
    <form method="post" action="index.php?action=topping&method=add">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên topping</label>
            <input type="text" name="tentp" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Giá topping</label>
            <input type="text" name="giatp" class="form-control">
        </div>
        <button type="submit" name="dang" class="btn btn-primary">Đăng</button>
    </form>
</div>