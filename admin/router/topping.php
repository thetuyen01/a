<?php 
    include_once 'controller/topping/topping.php';
    $topping = new Topping();
    // thêm menu
    if (isset($_GET['method'])&& $_GET['method']=="add"){
        if (isset($_POST['dang'])){
            $tentp = $_POST['tentp'];
            $giatp = $_POST['giatp'];
            $topping -> createTopping($tentp, $giatp);
        }else{
            include_once 'view/topping/addtopping.php';
        };
    // lấy danh sách menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="get"){
        $topping -> showTopping();
    // chỉnh sửa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="edit"){
        if(isset($_GET['idtopping'])){
            if (isset($_POST['capnhat'])){
                $tentp = $_POST['tentp'];
                $giatp = $_POST['giatp'];
                $topping->edit((int)$_GET['idtopping'], $tentp, $giatp);
            }else{
                $topping->showOneTopping((int)$_GET['idtopping']);
            }
        }
    //xóa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="delete"&&$_GET['idtopping']){
        $topping->delete((int)$_GET['idtopping']);
    }
?>