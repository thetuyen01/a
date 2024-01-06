<?php 
    include_once 'controller/size/size.php';
    $size = new Size();
    // thêm menu
    if (isset($_GET['method'])&& $_GET['method']=="add"){
        if (isset($_POST['dang'])){
            $tensize = $_POST['tensize'];
            $giasize = $_POST['giasize'];
            $size->createSize($tensize, $giasize);
            
        }else{
            include_once 'view/size/addSize.php';
        };
    // lấy danh sách menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="get"){
        $size->getListSize();
    // chỉnh sửa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="edit"){
        if(isset($_GET['idsize'])){
            if (isset($_POST['capnhat'])){
                $tensize = $_POST['tensize'];
                $giasize = $_POST['giasize'];
                $size->edit((int)$_GET['idsize'], $tensize, $giasize);
            }else{
                $size->showOneSize((int)$_GET['idsize']);
            }
        }
    //xóa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="delete"&&$_GET['idsize']){
        $size->delete((int)$_GET['idsize']);
    }
?>