<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Thêm vào mục Menu</h1>
    <form method="post" action="index.php?action=menu&method=add">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên Menu</label>
            <input type="text" name="tenmenu" class="form-control">
        </div>
        <button type="submit" name="dang" class="btn btn-primary">Đăng</button>
    </form>
</div>