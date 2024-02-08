<?php 
    if (isset($_GET['dmmenu'])){
        //đường dẫn tới chi tiết sản phẩm khi có idsp đó
        if (isset($_GET['idsp'])){
            include_once 'controller/clients/products/detailCategory.php';
            $detailCategory = new detailCategory;
            $detailCategory ->showDetailCategory();
        }else{ // nếu không có id thì dẫn tới danh mục menu chứa tất cả sản phẩm đó
            include_once "controller/clients/products/collections.php";
            $collections = new Collections();
            $collections ->getAllProduct($_GET['dmmenu'],$_GET['idmenu']);
        }   
        
    }else{
        switch ($_GET['action']) {
            case 'login':
                include_once 'controller/clients/authencation/login.php';
                $login = new Login();
                $login -> showFormLogin();
                break;
            case 'logout':
                include_once 'controller/clients/authencation/logout.php';
                $logout = new Logout();
                $logout -> logout();
                break;
            case 'checklogin':
                include_once 'controller/clients/authencation/login.php';
                $login = new Login();
                $login -> checkLogin();
                break;
            case 'register':
                include_once 'controller/clients/authencation/register.php';
                $register = new Register();
                $register -> showFormRegister();
                break;
            case 'addregister':
                include_once 'controller/clients/authencation/register.php';
                $register = new Register();
                $register -> createAccount();
                break;
            case 'forgotpw':
                include_once 'controller/clients/authencation/forgotPw.php';
                $forgotpw = new ForGotPw();
                $forgotpw ->showFormFG();
                break;
            case 'checkemail':
                include_once 'controller/clients/authencation/forgotPw.php';
                $forgotpw = new ForGotPw();
                $forgotpw ->forget();
                break;
            case 'checkcode':
                include_once 'controller/clients/authencation/forgotPw.php';
                $forgotpw = new ForGotPw();
                $forgotpw ->check_code();
                break;
            case 'restpw':
                include_once 'controller/clients/authencation/forgotPw.php';
                $forgotpw = new ForGotPw();
                $forgotpw ->resetpw();
                break;
            case 'carts':
                include_once 'controller/clients/authencation/isLogin.php';
                $isLogin = new isLogin();
                $check = $isLogin -> showIsLogin();
                if ($check){
                    include_once "controller/clients/cart/carts.php";
                    $cart = new Carts();
                    $cart -> showCart();
                    break;
                }else{
                    header("Location: index.php?action=login");
                    break;
                }
                
            case 'addcarts':
                include_once 'controller/clients/authencation/isLogin.php';
                $isLogin = new isLogin();
                $check = $isLogin -> showIsLogin();
                if ($check){
                    include_once "controller/clients/cart/carts.php";
                    $cart = new Carts();
                    $cart -> addCart();
                    break;
                }else{
                    header("Location: index.php?action=login");
                    break;
                }
                break;
            case 'update_cart':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $product_id = $_POST['product_id'];
                    $new_quantity = $_POST['new_quantity'];
                
                    // // Cập nhật số lượng trong giỏ hàng
                    $_SESSION['carts'][$product_id]['quantity'] = $new_quantity;
                
                }
                break;

            case 'checkout':
                include_once 'view/clients/checkout.php';
                break;
            case 'payment':
                include_once 'controller/clients/other/payment.php';
                $payment = new Payment();
                $payment ->setHoaDon();
                break;
            case 'history':
                include_once 'controller/clients/history/history_products.php';
                $hoadon = new History();
                $hoadon->showAllhistory();
                break;
                
            case 'detailhistory':
                include_once 'controller/clients/history/history_products.php';
                $hoadon = new History();
                $hoadon->showDetalhistory();
                break;
            case 'deleteCart':
                include_once "controller/clients/cart/carts.php";
                if (isset($_POST['delete'])){
                    $id = $_POST['id'];
                    $cart = new Carts();
                    $cart -> delete((int)$id);
                };
                
                break;
            case 'aa':
                include_once 'controller/clients/authencation/isLogin.php';
                $isLogin = new isLogin();
                $isLogin ->showIsLogin();
                break;
            default:
                include_once './view/errorr.php';
                break;
        }
    }
?>