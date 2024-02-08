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
                      // Kiểm tra xem đã tồn tại mảng 'codes' trong session chưa
                        if (!isset($_SESSION['codes'])) {
                            // Nếu chưa tồn tại, tạo mảng và gán vào session
                            $_SESSION['codes'] = [];
                        }

                        do {
                            // Tạo giá trị ngẫu nhiên
                            $code = random_int(1000, 10000);

                            // Kiểm tra xem giá trị đã tồn tại trong danh sách chưa
                        } while (in_array($code, $_SESSION['codes']));

                        // Thêm giá trị mới vào danh sách
                        $_SESSION['codes'][] = $code;

                        // Lưu thông tin khác vào session
                        $_SESSION['user_id'] = $id_user[0]['iduser'];
                        $_SESSION['email'] = ['code' => $code, 'email' => $id_user[0]['email']];
                        include_once "controller/clients/email/class.smtp.php";
                        include_once "controller/clients/email/class.phpmailer.php";
                        $mail = new PHPMailer();
                        $mail->CharSet = "utf-8";
                        $mail->IsSMTP();
                        // enable SMTP authentication
                        $mail->SMTPAuth = true;
                        // GMAIL username to:
                        // $mail->Username = "php22023@gmail.com";//
                        $mail->Username = "tuyentuyen16aa@gmail.com"; //
                        // GMAIL password
                        // $mail->Password = "php22023ngoc";
                        $mail->Password = "gwxxoyvyscattkky"; //Phplytest20@php
                        $mail->SMTPSecure = "tls";  // ssl
                        // sets GMAIL as the SMTP server
                        $mail->Host = "smtp.gmail.com";
                        // set the SMTP port for the GMAIL server
                        $mail->Port = "587"; // 465
                        $mail->From = 'tuyentuyen16aa@gmail.com';
                        $mail->FromName = 'The Tuyen';
                        // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                        $mail->AddAddress($id_user[0]['email'], 'reciever_name');
                        $mail->Subject = 'Reset Password';
                        $mail->IsHTML(true);
                        $mail->Body = 'Cấp lại mã code ' . $code . '';
                        if ($mail->Send()) {
                            echo '<script> alert("Check Your Email and Click on the
                                link sent to your email");</script>';
                                include_once 'view/check_code.php';
                        } else {
                            echo "Mail Error - >" . $mail->ErrorInfo;
                            include "./View/forgetpassword.php";
                        }
                        
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

        function check_code(){
            if(isset($_POST['gui']) && $_POST['code'] && isset($_POST['code'])){
                if (trim($_POST['code'])== $_SESSION['email']['code']){
                    return include_once "view/resetpw.php";
                }

                $msg['msg'] = "Mã code của bạn không đúng";
                return include_once 'view/check_code.php';
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