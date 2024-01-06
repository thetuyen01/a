<?php
    include "./controller/clients/header.php";
    include_once 'controller/clients/menu.php';
    $menu = new Menu();
    $menu ->getMenu();
    $header = new Header();
    $header ->getAllMenu();
    if (isset($_GET['action'])){
        include_once 'controller/index.php';
    }else{
        include "controller/clients/home.php"; 
        $home = new Home();
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $home ->getHome((int)$_GET['page']);
        } else {
            $home ->getHome(1);
        }
    }

    include "./view/footer.php"
?>