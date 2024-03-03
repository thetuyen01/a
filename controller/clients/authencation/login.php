<?php 
    class Login{
        public $db;
        function __construct()
        {
            // include_once(__DIR__ . '../../../../model/database.php');
            // $this -> db = new Database();
            // $this -> db ->connect();
            include_once(__DIR__ . '../../../../model/login.php');
            $this -> db = new Login_DB();
        }
        function showFormLogin(){
            include_once "./view/login.php";
        }
        function checkLogin(){
            if (isset($_POST['login'])) {
                // Lấy dữ liệu từ form
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Mảng để chứa các thông báo lỗi
                $msg = array();
                
                if (empty($email) || empty($password) ) {
                    $msg['general'] = "Vui lòng nhập đầy đủ thông tin.";
                }else{
                    $saltF='G45a#?';
                    $saltL='Td23$%';
                    $passnew=md5($saltF.$password.$saltL);
                    $data = $this -> db -> getDataLogin($email, $passnew);
                    if (is_array($data) && isset($data[0])){
                        include 'jwt_encode/jwt_encode.php';
                        
                        $secret_key = 'tuyendeptrai'; // Đặt một key bí mật an toàn
                        // Tạo JWT token
                        $jwtToken = createJwtToken($data, $secret_key);
                        setcookie("auth_token", $jwtToken, time() + 86400, "/");
                        $_SESSION['auth_token'] = $jwtToken;
                        $_SESSION['tenuser'] = $data[0]['tenuser'];
                        $_SESSION['iduser'] = $data[0]['iduser'];
                        $_SESSION['dc'] = $data[0]['dc'];
                        $this ->chuyentrang();
                    }
                    
                    else{
                        $msg['msg'] = "Tài khoản mật khẩu không đúng";
                       return  include './view/login.php';
                    }
                }
            }
            
        }
        function chuyentrang(){
            return header("Location: index.php");
        }
    }
?>