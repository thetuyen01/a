<?php 
    class ForGotPw{
        public $db;
        function __construct()
        {
            // include_once(__DIR__ . '../../../../model/database.php');
            // $this -> db = new Database();
            // $this -> db ->connect();
            include_once(__DIR__ . '../../../../model/forgotpw.php');
            $this -> db = new DB_ForgetPW();
        }

        function showFormFG(){
            include_once  'view/forgotpw.php';
        }

        function forget(){
            if (isset($_POST['forgot'])){
                if (isset($_POST['email']) && $_POST['email']){
                    $id_user = $this->db->getEmail(trim($_POST['email']));
                    if ($id_user){
                        $_SESSION['user_id'] = $id_user[0]['iduser'];
                        include 'view/resetpw.php';
                    }else{
                        $msg['msg'] = "Email không tồn tại";
                        return  include_once  'view/forgotpw.php';
                    }
                }else{
                    $msg['msg'] = "Vui lòng nhập email";
                    return  include_once  'view/forgotpw.php';
                }
            }else{
                $msg['msg'] = "Vui lòng nhập email";
                return  include_once  'view/forgotpw.php';
            }
            
        }

        function resetpw(){
            if (isset($_POST['reset'])){
                if (isset($_POST['password']) && $_POST['password'] && isset($_POST['cfpassword']) && $_POST['cfpassword']){
                    if ($_POST['password'] == $_POST['cfpassword']){
                        $user_id = $_SESSION['user_id'];
                        $saltF='G45a#?';
                        $saltL='Td23$%';
                        $passnew=md5($saltF.trim($_POST['password']).$saltL);
                        $result = $this->db->resetpw($user_id, $passnew);
                        if ($result){
                            $msg['msg'] = "Cập nhật thành công mời bạn đăng nhập";
                            return include_once 'view/login.php';
                        }else{
                            $msg['msg'] = "Cập nhật thất bại";
                            return  include_once  'view/forgotpw.php';
                        }
                    }else{
                        $msg['msg'] = "Password không khớp";
                        return  include_once  'view/resetpw.php';
                    }
                }else{
                    $msg['msg'] = "Vui lòng nhập password";
                    return  include_once  'view/resetpw.php';
                }
            }else{
                $msg['msg'] = "Vui lòng nhập password";
                return  include_once  'view/resetpw.php';
            }
        }
    }
?>