<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Cập nhật mục Size</h1>
    <form method="post" action="index.php?action=size&method=edit&idsize=<?php echo $result[0]['idsize']?>">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên topping</label>
            <input type="text" name="tensize" value="<?php echo $result[0]['tensize']?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Giá topping</label>
            <input type="text" name="giasize" value="<?php echo $result[0]['giasize']?>" class="form-control">
        </div>
        <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
    </form>
</div>