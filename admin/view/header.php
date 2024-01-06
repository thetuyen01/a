<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">



            <!-- Divider -->
            <hr class="sidebar-divider">


            <!--  Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?action=menu&method=add">Thêm Menu</a>
                        <a class="collapse-item" href="index.php?action=menu&method=get">Danh sách Menu</a>
                    </div>
                </div>
            </li>
            <!-- end menu -->

            <!--  dmmenu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwotopping"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Danh mục menu</span>
                </a>
                <div id="collapseTwotopping" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?action=dmmenu&method=add">Thêm danh mục menu</a>
                        <a class="collapse-item" href="index.php?action=dmmenu&method=get">Danh sách danh mục menu</a>
                    </div>
                </div>
            </li>
            <!-- end dmmenu -->

            <!-- topping -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwotopping1"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Topping</span>
                </a>
                <div id="collapseTwotopping1" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?action=topping&method=add">Thêm Topping</a>
                        <a class="collapse-item" href="index.php?action=topping&method=get">Danh sách Topping</a>
                    </div>
                </div>
            </li>
            <!-- end toppiong -->

            <!-- size -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwosize"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Size</span>
                </a>
                <div id="collapseTwosize" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?action=size&method=add">Thêm size</a>
                        <a class="collapse-item" href="index.php?action=size&method=get">Danh sách size</a>
                    </div>
                </div>
            </li>
            <!-- end size -->

            <!-- dmhinh -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwohinh"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Danh mục hình</span>
                </a>
                <div id="collapseTwohinh" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?action=dmhinh&method=add">Thêm hình</a>
                        <a class="collapse-item" href="index.php?action=dmhinh&method=get">Danh sách hình</a>
                    </div>
                </div>
            </li>
            <!-- end dmhinh -->

            <!-- sanpham -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwosp"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Danh mục sản phẩm</span>
                </a>
                <div id="collapseTwosp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?action=sanpham&method=add">Thêm sản phẩm</a>
                        <a class="collapse-item" href="index.php?action=sanpham&method=get">Danh sách sản phẩm</a>
                    </div>
                </div>
            </li>
            <!-- end sanpham -->

        </ul>
        <!-- End of Sidebar -->