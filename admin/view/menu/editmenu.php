<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Cập nhật mục Menu</h1>
    <form method="post" action="index.php?action=menu&method=edit&idmenu=<?php echo $result[0]['idmenu']?>">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên menu</label>
            <input type="text" name="tenmenu" value="<?php echo $result[0]['tenmenu']?>" class="form-control">
        </div>
        <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
    </form>
</div>