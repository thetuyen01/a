<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Cập nhật mục topping</h1>
    <form method="post" action="index.php?action=topping&method=edit&idtopping=<?php echo $result[0]['idtopping']?>">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên topping</label>
            <input type="text" name="tentp" value="<?php echo $result[0]['tentp']?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Giá topping</label>
            <input type="text" name="giatp" value="<?php echo $result[0]['giatp']?>" class="form-control">
        </div>
        <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
    </form>
</div>