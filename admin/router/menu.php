<?php 
    include_once 'controller/menu/menu.php';
    $menu = new Menus();
    // thêm menu
    if (isset($_GET['method'])&& $_GET['method']=="add"){
        if (isset($_POST['dang'])){
            $tenmenu = $_POST['tenmenu'];
            $menu -> createMenu($tenmenu);
            
        }else{
            include_once 'view/menu/addmenu.php';
        };
    // lấy danh sách menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="get"){
        if (isset($_GET['search'])){
            $menu -> searchMenu($_GET['search']);
        }else{
            $menu -> showMenu();
        }
    // chỉnh sửa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="edit"){
        if(isset($_GET['idmenu'])){
            if (isset($_POST['capnhat'])){
                $data = $_POST['tenmenu'];
                $menu->edit((int)$_GET['idmenu'], $data);
            }else{
                $menu->showOnemenu((int)$_GET['idmenu']);
            }
        }
    //xóa menu
    }elseif(isset($_GET['method'])&& $_GET['method']=="delete"&&$_GET['idmenu']){
        $menu->delete((int)$_GET['idmenu']);
    }
?>