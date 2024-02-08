<?php
    ob_start(); 
    session_start();
    if(!isset($_SESSION['carts'])) $_SESSION['carts']=[];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.pinimg.com/736x/7c/9f/da/7c9fda53515f835cad0e467acf8cccd4.jpg" type="image/x-icon">
    <title>The coffer house</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
.active {
    color: rgb(229, 34, 34) !important;
}

body {
    margin-top: 130px;
}
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary fixed-top">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Toggle button -->
            <button data-mdb-collapse-init class="navbar-toggler" type="button"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
                    <img src="https://brademar.com/wp-content/uploads/2022/10/The-Coffee-House-Logo-PNG-2.png"
                        height="100" alt="MDB Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav m-auto ">
                    <!-- <li class="nav-item">
                        <a href="" class="nav-link h6 text-black">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link h6 text-black">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link h6 text-black">Contact</a>
                    </li> -->
                    <?php 
                      
                        foreach ($arr as $item) {
                            if (is_array($item['dmmenu'])) {
                                $ItemDm = "";
                                foreach ($item['dmmenu'] as $dmh) {
                                    $ItemDm .= '
                                        <li>
                                            <a class="dropdown-item h6" href="index.php?action=' . $item['slug_menu'] . '&dmmenu=' . $dmh['slug_dmmenu'] . '&idmenu='.$item['idmenu'].'">' . $dmh['ten_dmmenu'] . '</a>
                                        </li>
                                    ';
                                }
                        
                                echo '
                                    <li class="nav-item dropdown">
                                        <a data-mdb-dropdown-init class="nav-link dropdown-toggle h1 text-black" href="' . $item['tenmenu'] . '"
                                            id="navbarDropdownMenuLink' . $item['tenmenu'] . '" role="button" aria-expanded="false">
                                            ' . $item['tenmenu'] . '
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink' . $item['tenmenu'] . '">
                                           ' . $ItemDm . '
                                        </ul>
                                    </li>';
                            } else {
                                echo '
                                    <li class="nav-item">
                                        <a class="nav-link h1 text-black " aria-current="index.php" href="index.php?action=' . $item['slug_menu'] . '">' . $item['tenmenu'] . '</a>
                                    </li>
                                ';
                            }
                        }
                        
                    ?>

                    <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <?php 
                $token = isset($_COOKIE['auth_token']) ? $_COOKIE['auth_token'] : null;
                $tenuser = isset($_SESSION['tenuser'])?  $_SESSION['tenuser']: null;
                if($token != null){
                    echo '
                    <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href="index.php?action=addcarts">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
    
                    <!-- Notifications -->
                    <div class="dropdown">
                        <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#"
                            id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Some news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                            id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                            <i class="fas fa-user-tie text-black"></i>('.($tenuser).')
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?action=history">Lịch sử mua hàng</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?action=logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Right elements -->
                    ';
                }else{
                    echo '
                    <div class="d-flex align-items-center">
                    <a href="index.php?action=login" type="button" class="btn btn-outline-success me-2" data-mdb-ripple-init
                        data-mdb-ripple-color="dark">Login</a>
                    <a href="index.php?action=register" type="button" class="btn btn-outline-warning me-2"
                        data-mdb-ripple-init data-mdb-ripple-color="dark">Register</a>
                </div>
                    ';
                }
            ?>

        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->