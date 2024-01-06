<?php 
    include_once 'controller/sanpham/sanpham.php';
    $sanpham = new Sanpham();
    // thêm menu
    if (isset($_GET['method'])&& $_GET['method']=="add"){
        if (isset($_POST['dang'])) {
            $tensp = $_POST['tensp'];
            $giasp = $_POST['giasp'];
            $mtasp = $_POST['mtasp'];
            $menu = $_POST['menu'];
            $topping = $_POST['topping'];
            $size = $_POST['size'];
            $anh = $_POST['anh'];
            $sanpham ->createSP($tensp, $giasp, $mtasp, $menu, $topping, $size, $anh);
            
        }
        else{
            $sanpham -> showFormAdd();
        };
    // lấy danh sách menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="get"){
        $sanpham->showSanpham();
        // include_once 'view/sanpham/list_products.php';
    // chỉnh sửa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="edit"){
        if(isset($_GET['idsanpham'])){
            echo "tuyen";
            if (isset($_POST['capnhat'])){
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mtasp = $_POST['mtasp'];
                $menu = $_POST['menu'];
                $topping = $_POST['topping'];
                $size = $_POST['size'];
                $anh = $_POST['anh'];
                $sanpham ->edit_SP($tensp, $giasp, $mtasp, $menu, $topping, $size, $anh, (int)$_GET['idsanpham']);
            }else{
                $sanpham -> showFormEdit((int)$_GET['idsanpham']);
            }
        }
    //xóa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="delete"&&$_GET['idsanpham']){
       $dmhinh ->delete((int)$_GET['idsanpham']);
    }
?>