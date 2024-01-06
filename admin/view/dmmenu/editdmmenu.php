<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <h1 class="text-center mb-2">Cập nhật danh mục menu</h1>
    <form method="post" action="index.php?action=dmmenu&method=edit&id_dmmenu=<?php  echo $_GET['id_dmmenu']?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Tên danh mục menu</label>
            <input type="text" name="tendmmenu" value="<?php echo $result_dmmenu[0]['ten_dmmenu']?>"
                class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Ảnh danh mục menu</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tenmenu" class="form-label">Thuộc menu : </label>
            <select name="menu" class="form-select" aria-label="Default select example">
                <?php 
                    if(is_array($result_menu)){
                        foreach($result_menu as $item){
                            echo '
                                <option value="'.$item['idmenu'].'">'.$item['tenmenu'].'</option>
                            ';
                        }
                    }
                    
                ?>
            </select>
        </div>
        <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
    </form>
</div>