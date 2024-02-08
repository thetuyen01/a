<?php 
    include_once 'controller/invoice/all_voice.php';
    $invoice = new Invoice();
    // thêm invoice
    if (isset($_GET['method'])&& $_GET['method']=="add"){
        if (isset($_POST['dang'])){
            $tenmenu = $_POST['tenmenu'];
            
        }else{
            include_once 'view/menu/addmenu.php';
        };
    // lấy danh sách voice
    }elseif(isset($_GET['method'])&& $_GET['method']=="get"){
        if (isset($_GET['search'])){
            $menu -> searchMenu($_GET['search']);
        }else{
            $invoice -> show_all_invoice();
        }
    // chỉnh sửa invoice
    }elseif(isset($_GET['method'])&& $_GET['method']=="edit"){
        if(isset($_GET['idinvoice'])){
            if (isset($_POST['capnhat'])){
                $data = $_POST['tinhtrang'];
                $invoice->edit((int)$_GET['idinvoice'], (int)$data);
            }
        }
    //xóa invoice
    }elseif(isset($_GET['method'])&& $_GET['method']=="delete"&&$_GET['idmenu']){
        $menu->delete((int)$_GET['idmenu']);
    }
?>