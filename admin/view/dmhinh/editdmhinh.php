<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Cập nhật danh mục hình</h1>
    <form method="post" action="index.php?action=dmhinh&method=edit&id_dmhinh=<?php  echo $_GET['id_dmhinh']?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên danh mục hình</label>
            <input type="text" name="tendmhinh" value="<?php echo $result_dmmenu[0]['ten']?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Chỉnh sửa ảnh danh mục hinh</label>
            <input type="file" name="image" value="<?php echo $result_dmmenu[0]['duongdan']?>" class="form-control">
        </div>
        <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
    </form>
</div>