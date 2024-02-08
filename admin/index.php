<?php
    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'menu':
                include_once 'router/menu.php';
                break;
            case 'dmmenu':
                include_once 'router/dmmenu.php';
                break;
            case 'topping':
                include_once 'router/topping.php';
                break;
            case 'size':
                include_once 'router/size.php';
                break;
            case 'dmhinh':
                include_once 'router/dmhinh.php';
                break;
            case 'sanpham':
                include_once 'router/sanpham.php';
                break;
            case 'invoice':
                include_once 'router/invoice.php';
                break;
            default:
                
                break;
        }
    }else{
        include_once 'view/header.php';
        include_once 'controller/home.php';
    }
    
    include_once 'view/footer.php';
?>