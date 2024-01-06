<?php
    class Register{
        public $db;
        function __construct()
        {
            // include_once(__DIR__ . '../../../../model/database.php');
            // $this -> db = new Database();
            // $this -> db ->connect();
            include_once(__DIR__ . '../../../../model/login.php');
            $this -> db = new Login_DB();
        }

        function showFormRegister(){
            include_once "./view/register.php";
        }

        function createAccount(){
            if (isset($_POST['register'])) {
                // Lấy dữ liệu từ form
                $email = $_POST['email'];
                $sodt = $_POST['sodt'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $diachi = $_POST['diachi'];
                // Mảng để chứa các thông báo lỗi
                $msg = array();

                // Kiểm tra xem có dữ liệu bị bỏ trống không
                if (empty($email) || empty($sodt) || empty($username) || empty($password) || empty($diachi)) {
                    $msg['general'] = "Vui lòng nhập đầy đủ thông tin.";
                }

                // Kiểm tra định dạng email hợp lệ
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $msg['email'] = "Email không hợp lệ.";
                }

                // Kiểm tra độ dài số điện thoại
                if (strlen($sodt) != 10 && strlen($sodt) != 11) {
                    $msg['sodt'] = "Số điện thoại phải có 10 hoặc 11 số.";
                }

                // Kiểm tra xem địa chỉ có chứa số và chữ không
                if (!preg_match('/[0-9]/', $diachi) || !preg_match('/[a-zA-Z]/', $diachi)) {
                    $msg['diachi'] = "Địa chỉ phải chứa cả số và chữ.";
                }

                if (!empty($msg)) {
                    include_once './view/register.php';
                } else {
                    $saltF='G45a#?';
                    $saltL='Td23$%';
                    $passnew=md5($saltF.$password.$saltL);
                    $result = $this -> db -> insertDataUser($email, $sodt, $username, $passnew, $diachi);
                    if($result){
                        $msg['msg'] = "Đăng kí thành công mời bạn đăng nhập";
                        return include_once 'view/login.php';
                    }
                }

                
            }else{
                return include_once "view/register.php";
            }
            
            
        }
    }
?>